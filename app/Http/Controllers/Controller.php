<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Place;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    public function store(Request $request){

        $data=$request->validate([
                    'name'=>'required | min:2 | max:20',
                    'description'=>'required | min:5 | max:100',
                    'type'=>'required',
                    'location'=>'required',
                    'Price'=>'required|numeric' ,
                    'start'=>'required',
                    'AddRem1'=>'required',
                    'close'=>'required',
                    'AddRem2'=>'required',
                    'image'=>'required|image|mimes:png,jpg,gif'
                ]);

                $FileName=Storage::putFile("placeimage",$data['image']);
                $data['image'] = $FileName ;

                $places=Place::create($data);

                 session()->flash('success',' inserted successfuly');

                 if($data['type']==1)
                    return redirect(url('ReligiousDashboard'));
                    elseif($data['type']==2)
                    return redirect(url('CulturalDashboard'));
                    elseif($data['type']==3)
                    return redirect(url('LeisureDashboard'));
                    elseif($data['type']==4)
                    return redirect(url('MedicalDashboard'));


            }

// index admin
            public function index(){

                $places=Place::paginate(5);
                return view('admin.index',compact('places'));
            }




            public function storeBlogadmin(Request $request)
            {
                    //  return 'ssssssssss';
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


// ------------------------------------------------------------

    public function update(Request $request,$id){

                $data=$request->validate([
                    'name'=>'required | min:2 | max:20',
                    'description'=>'required | min:5 | max:100',
                    'type'=>'required',
                    'location'=>'required',
                    'Price'=>'required|numeric' ,
                    'start'=>'required',
                    'AddRem1'=>'required',
                    'close'=>'required',
                    'AddRem2'=>'required',
                    'image'=>'image|mimes:png,jpg,gif'
                ]);

                $places=Place::findOrfail($id);
                if($request->has('image')){
                     Storage::delete($places->image);
                     $fileName=Storage::putFile("placeimage",$data['image']);
                     $data['image'] = $fileName ;
                }
                $places->update($data);


                session()->flash('success','updated successfuly');
                // return redirect(url('ReligiousDashboard'));

                if($data['type']==1)
                return redirect(url('ReligiousDashboard'));
                elseif($data['type']==2)
                return redirect(url('CulturalDashboard'));
                elseif($data['type']==3)
                return redirect(url('LeisureDashboard'));
                elseif($data['type']==4)
                return redirect(url('MedicalDashboard'));
        }

// search
        public function search(Request $request){


            $search = $request->input('search');

            $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->get();
if($request->type==1)
            return view('admin.rel_search', compact('places'));
 }



 public function addBlog(Request $request){

      $data = $request->validate([
        'title' => 'required|min:5|max:100',
        'text' => 'required|min:20',
        'image' => 'image|mimes:png,jpg,gif',
        // 'image' ,
        'user_id' => "required|exists:users,id"
    ]);


    return $data ;

    $FileName = Storage::putFile("blogimage", $data['image']);
    $data['image'] = $FileName;

     $blogs = Blog::create($request->all());
      return $blogs;

    //   return view('admin.dashboard.Blogdashboard', compact('blogs'));

 }
}









//     // return redirect(url('BlogsHome'));
