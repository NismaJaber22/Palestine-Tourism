<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Place;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlaceCulController extends Controller
{
    public function showCultural()
    {
        $city=City::select('id','cityName')->get();

        $places = Place::paginate(30)->where('type','Cultural');
        return view('admin.dashboard.CulturalDashboard', compact('places','city'));
    }

    public function showCulTours()
    {
        $places = Place::get();
        ;
        $randomPlaces = Place::inRandomOrder()->limit(9)->get();
        return view('user.CulturalTours')->with(compact('places', 'randomPlaces'));
    }

    public function create()
    {
        return view('admin.create');
    }
    // -------------------------------------------------------------------------------------
    public function destroy($id)
    {
        $places = Place::findOrfail($id);
        Storage::delete($places->image);

        $places->delete();
        session()->flash('success', ' delete successfuly');
        return redirect(url('CulturalDashboard'));
    }

    // -------edit------------------------------------------------------------------------------
    public function edit($id)
    {
        return $id;
        $places = Place::findOrFail($id);
        return view('admin.CulturalDashboard', ['places' => $places]);
    }

    // -----------------------------------
    public function CustomersRes($id)
    {
         $places = Place::findOrfail($id);
        $Myreservations = Reserve::get();
        return view('admin.dashboard.Reservations', compact('places', 'Myreservations'));

    }

    // --------------search----------------------------------------------------
    public function Culsearch(Request $request)
    {
        $city = City::get();
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('cities_id', 'LIKE', "%{$search}%")
            ->get()->where('type','Cultural');

        return view('admin.dashboard.CulturalDashboard', compact('places','city'));
    }

    public function searchToures(Request $request)
    {

        $randomPlaces = Place::get();
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get()->where('type', 'Cultural');

        return view('user.CulturalTours', compact('places', 'randomPlaces'));
    }
}
