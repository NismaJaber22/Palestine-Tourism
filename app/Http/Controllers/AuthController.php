<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // my reservation
    public function Myreservations()
    {
        $Myreservations = Reserve::get();
        return view('user.Myreservations', compact('Myreservations'));
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'userfname' => 'required|min:2|max:10|',
            'userlname' => 'required|min:2|max:20|',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|min:8|max:30|confirmed',
            'liveIn',
<<<<<<< HEAD
            'is_admin' => 'required',
            'image' => 'image|mimes:png,jpg,gif',
        ]);

=======
            'is_admin'=>'required',
            'image' => 'image|mimes:png,jpg,gif',
        ]);

        // $fileName = Storage::putFile("placeimage", $data['image']);
        // $data['image'] = $fileName;

>>>>>>> d2af0258d7f47faa004d5267dd22f3d8999a4cde
        if ($request->has('image')) {
            $fileName = Storage::putFile("placeimage", $data['image']);
            $data['image'] = $fileName;
        }

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);

        session()->flash('success', ' inserted successfuly');
        // return redirect(url('login'));
<<<<<<< HEAD
=======

        if($data['is_admin']==0){
            return redirect(url('login'));
        }else if($data['is_admin']==1){
            return redirect(url('/admin/dashboards'));
        }
    }
          
    
>>>>>>> d2af0258d7f47faa004d5267dd22f3d8999a4cde

        if ($data['is_admin'] == 0) {
            return redirect(url('login'));
        } else if ($data['is_admin'] == 1) {
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
<<<<<<< HEAD
            'is_admin' => 'required'
        ]);

        $isLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => $request->is_admin]);
        if ($data['is_admin'] == "1" && $isLogin == true) {
            return redirect(url('admin/dashboards'));
        } else if ($data['is_admin'] == "0" && $isLogin == true) {
            return redirect(url('/'));
        } else {
=======
            'is_admin'=>'required'
        ]);

        $isLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin'=>$request->is_admin]);
        if ($data['is_admin']=="1" && $isLogin == true) {
            return redirect(url('admin/dashboards'));
            }else if ($data['is_admin']=="0" && $isLogin == true) {
                return redirect(url('/'));
            }
         else {
>>>>>>> d2af0258d7f47faa004d5267dd22f3d8999a4cde
            return redirect(url('login'));
        

    }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }

<<<<<<< HEAD
    public function Myprofile()
    {
        $blogs = Blog::get();
        return view('user.MyProfile', compact('blogs'));
    }
=======
    public function Myprofile(){

        $blogs = Blog::get();
        return view('user.MyProfile',compact('blogs'));
    }

>>>>>>> d2af0258d7f47faa004d5267dd22f3d8999a4cde
    //-----edit in profile user -----
    public function updatemyprofile(Request $request, $id)
    {
        $data = $request->validate([
            'userfname' => 'min:2|max:10|',
            'userlname' => 'min:2|max:20|',
            'email' => 'email',
            'password' => 'min:8|max:30|confirmed',
            'liveIn',
            'image' => 'image|mimes:png,jpg,gif'
        ]);

        $user = User::findOrfail($id);

        if ($request->has('image')) {
            Storage::delete($user->image);
            $fileName = Storage::putFile("placeimage", $data['image']);
            $data['image'] = $fileName;
        }

        $data['password'] = bcrypt($data['password']);

        $user->update($data);
        return redirect(url('Myprofile'));
    }

    // update blog in myprofile
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'min:5|max:100',
            'text' => 'min:20',
            'image' => 'mimes:png,jpg,gif',
            'user_id',
        ]);

        $blogs = Blog::findOrfail($id);

        if ($request->has('image')) {
            Storage::delete($blogs->image);
            $FileName = Storage::putFile("blogimage", $data['image']);
            $data['image'] = $FileName;
        }
        $blogs->update($data);
        return redirect(url('Myprofile'));
    }

    // deleteblog in myprofile
    public function destroy($id)
    {
        $blogs = Blog::findOrfail($id);
        Storage::delete($blogs->image);
        $blogs->delete();
        return redirect(url('Myprofile'));
    }
}
