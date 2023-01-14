<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Place;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlaceRelController extends Controller
{
    public function showReligious()
    {
        $city = City::get();

        $places = Place::get()->where('type', 'Religious');
        // $places=City::select('id','cityName')->get();
        return view('admin.dashboard.ReligiousDashboard', compact('places', 'city'));
    }


    public function CustomersRes($id)
    {
        $places = Place::findOrfail($id);
        $Myreservations = Reserve::get();
        return view('admin.dashboard.Reservations', compact('places', 'Myreservations'));
    }
    public function showRelTours()
    {
        $places = Place::get();
        $places=Place::get();

        $randomPlaces = Place::inRandomOrder()->limit(9)->get();
        return view('user.ReligiousTours')->with(compact('places', 'randomPlaces'));
    }

    // CustomersRes
    // public function showRelTours(){
    //     $select=Place::select('location')->get();
    //     return view('user.ReligiousTours',compact('select'));
    //   }

    // public function showRelTours(Request $request)
    // {
    //     $citysearch = $request->input('search');
    //     $city = Place::query()
    //         // ->where('name', 'LIKE', "%{$search}%")
    //         ->orWhere('cities_id', 'LIKE', "%{$citysearch}%")
    //         ->get();


    //     $places = Place::get();

    //     $randomPlaces = Place::inRandomOrder()->limit(9)->get();
    //     return view('user.ReligiousTours')->with(compact('places', 'randomPlaces','city'));
    // }

    public function create()
    {
        return view('admin.create');
    }
    // -------------Delete-------------------------------------------------------------------
    public function destroy($id)
    {
        $places = Place::findOrfail($id);
        Storage::delete($places->image);

        $places->delete();
        session()->flash('success', ' delete successfuly');
        return redirect(url('ReligiousDashboard'));
    }
    // --------------edit----------------------------------------------------------------------
    public function edit($id)
    {
        return $id;
        $places = Place::findOrFail($id);
        return view('admin.ReligiousDashboard', ['places' => $places]);
    }
    // --------------search------------------------------
    public function Relsearch(Request $request)
    {
        $city = City::get();
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('cities_id', 'LIKE', "%{$search}%")
            ->get()->where('type', 'Religious');
        return view('admin.dashboard.ReligiousDashboard', compact('places', 'city'));
    }


    public function searchToures(Request $request)
    {

        $randomPlaces = Place::get();
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get()->where('type', 'Religious');

        return view('user.ReligiousTours', compact('places', 'randomPlaces'));
    }
    // public function citySearch(Request $request)
    // {
    //     $citysearch = $request->input('search');
    //     $city = Place::query()
    //         // ->where('name', 'LIKE', "%{$search}%")
    //         ->orWhere('location', 'LIKE', "%{$citysearch}%")
    //         ->get();
    //         return view('user.ReligiousTours');
    //     // return view('admin.dashboard.ReligiousDashboard', compact('places'));
    // }

    // public function getLocation($location) {
    //     switch($location){
    //         case '0': break;
    //         case '0': break;
    //         case '0': break;
    //         case '0': break;
    //     }

    // }
}
