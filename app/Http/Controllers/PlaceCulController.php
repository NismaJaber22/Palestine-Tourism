<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlaceCulController extends Controller
{
    public function showCultural()
    {
        $places = Place::paginate(30);
        return view('admin.dashboard.CulturalDashboard', compact('places'));
    }

    public function showCulTours()
    {
        $places = Place::get();
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

    // --------------search----------------------------------------------------
    public function Culsearch(Request $request)
    {
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.dashboard.CulturalDashboard', compact('places'));
    }
}
