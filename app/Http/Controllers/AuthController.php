<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function register(Request $request){

        $data=$request->validate([
           'userfname'=>'required|min:2|max:10|',
           'userlname'=>'required|min:2|max:20|',
           'email'=>'required|email|unique:Users,email',
           'password'=>'required|min:8|max:30|confirmed',
           'liveIn',
           'image'=>'image|mimes:png,jpg,gif',
        //    'password'=>['required','max:30','confirmed',password::min(8)-> mixedCase()],


        ]);

        $fileName=Storage::putFile("placeimage",$data['image']);
        $data['image'] = $fileName ;

      $data['password']=bcrypt($data['password']);
      $user=User::create($data);


       Auth::login($user);

      session()->flash('success',' inserted successfuly');
      return redirect(url('login'));

      }


    public function signup(){
            return view('user.register');
        }


    public function login(Request $request){
        $data=$request->validate([
                'email'=>'required|email',
                'password'=>'required|min:8|max:30',
        ]);

        $isLogin=Auth::attempt(['email' =>$request-> email, 'password' =>$request-> password]);
        if($isLogin == true){
            return redirect(url('/'));
        }else{
            return redirect(url('login'));

        }

  }

    public function logout(){

      Auth::logout();
      return redirect(url('/'));

  }

    public function Myprofile(){
        $blogs=Blog::get();
        return view('user.Myprofile',compact('blogs'));
    }




//-----edit in profile user -----
public function updatemyprofile(Request $request,$id){

    $data=$request->validate([
        'userfname'=>'required|min:2|max:10|',
        'userlname'=>'min:2|max:20|',
        'email'=>'email|unique:Users,email',
        'password'=>'min:8|max:30|confirmed',
        'liveIn',
        // 'image'=>'image|mimes:png,jpg,gif'
    ]);


    $user=Auth::findOrfail($id);

    // if($request->has('image')){
    //      Storage::delete($user->image);
    //      $fileName=Storage::putFile("placeimage",$data['image']);
    //      $data['image'] = $fileName ;
    // }

    $user->update($data);


    // return redirect(url('Myprofile'));

    // $id = Auth::user()->id;
    // $user = User::find($id);

    return 'sss';

}


}

