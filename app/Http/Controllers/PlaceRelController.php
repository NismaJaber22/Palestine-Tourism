<?php

namespace App\Http\Controllers;
use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class PlaceRelController extends Controller
{
    public function showReligious(){
        $places=Place::paginate(5);
        return view('admin.dashboard.ReligiousDashboard',compact('places'));
    }


    // public function showRelTours(){
    //     $select=Place::select('location')->get();
    //     return view('user.ReligiousTours',compact('select'));
    //   }
    public function showRelTours(){
        $places=Place::get();
        return view('user.ReligiousTours',compact('places'));
      }

    public function create(){
        return view('admin.create');
    }



// ------------------Delete-------------------------------------------------------------------

        public function destroy($id){
            $places=Place::findOrfail($id);
            Storage::delete($places->image);

            $places->delete();
            session()->flash('success',' delete successfuly');
            return redirect(url('ReligiousDashboard'));

        }

// -------------------------------------------------------------------------------------

       public function edit($id){
        return $id;
            $places=Place::findOrFail($id);
             return view('admin.ReligiousDashboard',['places'=>$places]);
        }


// --------------search------------------------------

//     public function search(Request $request){

//             $search = $request->input('search');

//             $places = Place::query()
//             ->where('name', 'LIKE', "%{$search}%")
//             ->orWhere('location', 'LIKE', "%{$search}%")
//             ->get();

//             return view('admin.search', compact('places'));

//  }


//  ---------------

public function CustomersRes(){

    return 'aaa';
  }

}
