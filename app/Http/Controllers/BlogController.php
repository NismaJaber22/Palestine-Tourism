<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{



    // public function dashboards(){
    //     $blogs = Blog::get();
    //     return view('admin.dashboard.dashboards',compact('blogs'));
    //   }


    public function BlogsHome()
    {
        $blogs = Blog::get();
        return view('user.BlogsHome', compact('blogs'));
    }

    // public function showBlogDashboard()
    // {
    //     $blogs = Blog::get();
    //     return view('admin.dashboard.BlogDashboard', compact('blogs'));
    // }



    public function showuserProfile()
    {
        $blogs = Blog::get();
        return view('user.Myprofile', compact('blogs'));
    }


    public function storeBlog(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|min:5|max:100',
            'text' => 'required|min:20',
            'image' => 'required|image|mimes:png,jpg,gif',
            'user_id' => "required|exists:users,id"

        ]);

        $FileName = Storage::putFile("blogimage", $data['image']);
        $data['image'] = $FileName;


        $blogs = Blog::create($data);
          return $data;


        // return redirect(url('BlogsHome'));
    }


    public function BlogDashboard()
    {
        $blogs = Blog::get();
        return view('admin.dashboard.BlogDashboard', compact('blogs'));
    }

    // --------------------------------

    public function showBlog()
    {
        $blogs = Blog::get();
        return view('admin.dashboard.BlogDashboard', compact('blogs'));
    }


    // -----------delete----------------

    public function destroy($id)
    {
        $blogs = Blog::findOrfail($id);
        Storage::delete($blogs->image);

        $blogs->delete();
        return redirect(url('BlogDashboard'));
    }

    //------------------------------------
    public function updateblog(Request $request, $id)
    {

        $data = $request->validate([
            'title' => 'min:5|max:100',
            'text' => 'min:20',
            'image' => 'mimes:png,jpg,gif'

        ]);

        $blogs = Blog::findOrfail($id);

        if ($request->has('image')) {
            Storage::delete($blogs->image);

            $FileName = Storage::putFile("blogimage", $data['image']);
            $data['image'] = $FileName;
        }

        $blogs->update($data);

        return 'qqq';
        // return redirect(url('Myprofile'));
    }




// ---------------------------------------------------------------------------------------
    // checkbox

    public function editstatus(Request $request, $id)
    {

        // dd('Is checked: ' . $request->isChecked . ' , id: ' . $id);

        try {
            $blog = Blog::findOrfail($id);

            $status = $request->isChecked=="true" ? 1:0;

            $blog->update(['status' => $status]);
            // dd($blog);

            return response()->json(['success' => 'true']);
        } catch (Exception $e) {
            return response()->json(['success' => 'false', 'error'=> $e->getMessage()]);

    }


    }
}
