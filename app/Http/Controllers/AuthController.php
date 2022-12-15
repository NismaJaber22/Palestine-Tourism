<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function register(Request $request){

        $data = $request->validate([
            'userfname' => 'required|min:2|max:10|',
            'userlname' => 'required|min:2|max:20|',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|min:8|max:30|confirmed',
            'liveIn',
            'is_admin'=>'required',
            'image' => 'image|mimes:png,jpg,gif',
        ]);

        // $fileName = Storage::putFile("placeimage", $data['image']);
        // $data['image'] = $fileName;

        if ($request->has('image')) {
            $fileName = Storage::putFile("placeimage", $data['image']);
            $data['image'] = $fileName;
        }

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);

        session()->flash('success', ' inserted successfuly');
        // return redirect(url('login'));

        if($data['is_admin']==0){
            return redirect(url('login'));
        }else if($data['is_admin']==1){
            return redirect(url('/admin/dashboards'));
        }
    }
          
    


    public function signup()
    {
        return view('user.register');
    }


    public function login(Request $request)
    {
       
    
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:30',
            'is_admin'=>'required'
        ]);

        $isLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin'=>$request->is_admin]);
        if ($data['is_admin']=="1" && $isLogin == true) {
            return redirect(url('admin/dashboards'));
            }else if ($data['is_admin']=="0" && $isLogin == true) {
                return redirect(url('/'));
            }
         else {
            return redirect(url('login'));
        

    }
    }

    public function logout()
    {

        Auth::logout();
        return redirect(url('/'));
    }

    public function Myprofile(){

        $blogs = Blog::get();
        return view('user.MyProfile',compact('blogs'));
    }

    //-----edit in profile user -----
    public function updatemyprofile(Request $request, $id)
    {

        $data = $request->validate([
            'userfname' => 'min:2|max:10|',
            'userlname' => 'min:2|max:20|',
            // 'email'=>'email|unique:Users,email',
            'password' => 'min:8|max:30|confirmed',
            'liveIn',
            'image' => 'image|mimes:png,jpg,gif'
        ]);
        // $id = Auth::user()->id;

        $user = User::findOrfail($id);

        if ($request->has('image')) {
            Storage::delete($user->image);
            $fileName = Storage::putFile("placeimage", $data['image']);
            $data['image'] = $fileName;
        }

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);


        $user->update($data);

        // session()->flash('success',' inserted successfuly');

        // return redirect(url('Myprofile'));
        //  return $request->id;
        return $data;
    }
}
