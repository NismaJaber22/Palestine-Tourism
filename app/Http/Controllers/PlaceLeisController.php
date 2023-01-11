<?php


namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlaceLeisController extends Controller
{
    public function showLeisure()
    {
        $places = Place::paginate(30);
        return view('admin.dashboard.LeisureDashboard', compact('places'));
    }

    public function showLeisTours()
    {
        $places = Place::get();
        $randomPlaces = Place::inRandomOrder()->limit(9)->get();
        return view('user.LeisureTours')->with(compact('places', 'randomPlaces'));
    }
    // -------------------------------------------------------------------------------------
    public function destroy($id)
    {
        $places = Place::findOrfail($id);
        Storage::delete($places->image);

        $places->delete();
        session()->flash('success', ' delete successfuly');
        return redirect(url('LeisureDashboard'));
    }
    // -------------------------------------------------------------------------------------
    public function edit($id)
    {
        return $id;
        $places = Place::findOrFail($id);
        return view('admin.dashboard.LeisureDashboard', ['places' => $places]);
    }
    // --------------search----------------------------------------------------

    public function Leisearch(Request $request)
    {
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->where('type', 'LIKE', "leisure")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.dashboard.LeisureDashboard', compact('places'));
    }
}
