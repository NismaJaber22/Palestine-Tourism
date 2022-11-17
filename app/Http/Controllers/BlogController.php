<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function BlogsHome(){
            $blogs=Blog::get();
            return view('user.BlogsHome',compact('blogs'));

    }


    public function storeBlog(Request $request){

        $data=$request->validate([
            'title'=>'required|min:5|max:100',
            'text'=>'required|min:20',
            'image'=>'mimes:png,jpg,gif',
            'user_id'=>"required|exists:users,id",

        ]);
        // return $data;
        Blog::create($request->all());
        return $request->user_id ;


        //      $FileName=Storage::putFile("blogimage",$data['image']);
        //      $data['image'] = $FileName ;

            //   $blogs=Blog::create($request->all());
        // //     //  return view('user.BlogsHome',compact('blog'));


        //      return $request->user_id;
        //   return redirect(url('BlogsHome'));

               }


    public function BlogDashboard (){
        $blogs=Blog::get();
        return view('admin.dashboard.BlogDashboard',compact('blogs'));

    }

// --------------------------------

    public function showBlog(){
        $blogs=Blog::get();
        return view('admin.dashboard.BlogDashboard',compact('blogs'));
    }


// -----------delete----------------

    public function destroy($id){
        $blogs=Blog::findOrfail($id);
        Storage::delete($blogs->image);

        $blogs->delete();
        return redirect(url('BlogDashboard'));

    }

//------------------------------------
    public function update(Request $request,$id){

        $data=$request->validate([

            'title'=>'required',
            'text'=>'required',
            'image'=>'mimes:png,jpg,gif',
            'status'
        ]);

        $blogs=Blog::findOrfail($id);
            if($request->has('image')){
            Storage::delete($blogs->image);

            $FileName=Storage::putFile("blogimage",$data['image']);
            $data['image'] = $FileName ;

         $blogs->update($data);

        // return $data;
        return redirect(url('BlogDashboard'));
        }

    }


    // checkbox

    // public function editstatus(Request $request,$id){

        // $data=$request->validate([

        //     'status'
        // ]);

        // $blogs=Blog::findOrfail($id);
        //     if($request->has('status')){
        //     // Storage::delete($blogs->status);

        //     $blogs->update($data);

        //     dd($request->all());
        //     }

        // $project->update($request->all());
        //  $blogs = blog::findOrfail($id);

        //  $blogs->update($request->status);

        // if( $request->has('status') ){

        //     $blogs->update($request->status);
        //     "{{($blog->status == 1}}";


            // return 'hhhh';
        // }
//

        // if($request['status'])
        //     return "Checkbox is checked";
        // else
        //     return "Checkbox is not checked";

        //  if (blog::get('status') == '1'){
        //         return 'ssssss';
        //     }else{
        //         return 'dddddd';
        //     }
        // return view('edit',['users'=>$users]);
    // }

    // public function edit_status(){
    //     return "ppppppppppp";
    // }
}

