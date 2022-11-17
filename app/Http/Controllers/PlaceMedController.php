<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Storage;
class PlaceMedController extends Controller
{


    // public function dashboards(){
    //     $places=Place::get();
    //     return view('admin.dashboards',compact('places'));
    //   }


      public function showMedical(){
        $places=Place::get();
        return view('admin.dashboard.MedicalDashboard',compact('places'));
    }


    public function showMedTours(){
        $places=Place::paginate(5);
        return view('user.MedicalTours',compact('places'));
      }


// -------------------------------------------------------------------------------------

        public function destroy($id){
            $places=Place::findOrfail($id);
            Storage::delete($places->image);

            $places->delete();
            session()->flash('success',' delete successfuly');
            return redirect(url('MedicalDashboard'));

        }

// -------------------------------------------------------------------------------------


        public function edit($id){
            return $id;
                $places=Place::findOrFail($id);
                 return view('admin.dashboard.MedicalDashboard',['places'=>$places]);
            }

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
                return redirect(url('MedicalDashboard'));
               }


// --------------search----------------------------------------------------

    public function search(Request $request){

        $search = $request->input('search');

        $places = Place::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('location', 'LIKE', "%{$search}%")
        ->get();

        return view('admin.search', compact('places'));

 }

}
