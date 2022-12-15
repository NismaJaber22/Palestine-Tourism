<?php


namespace App\Http\Controllers;
use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class PlaceMedController extends Controller
{


    // public function dashboards(){
    //     $places=Place::get();
    //     return view('admin.dashboards',compact('places'));
    //   }


      public function showMedical(){
        $places=Place::paginate(5);
        return view('admin.dashboard.MedicalDashboard',compact('places'));
    }


    public function showMedTours(){
        $places=Place::get();
        $randomPlaces=Place::inRandomOrder()->limit(9)->get();
        return view('user.MedicalTours')->with(compact('places','randomPlaces')) ;

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



// --------------search----------------------------------------------------

//     public function search(Request $request){

//         $search = $request->input('search');

//         $places = Place::query()
//         ->where('name', 'LIKE', "%{$search}%")
//         ->orWhere('location', 'LIKE', "%{$search}%")
//         ->get();

//         return view('admin.search', compact('places'));

//  }

}
