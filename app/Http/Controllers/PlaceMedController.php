<?php


namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Place;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlaceMedController extends Controller
{
    public function showMedical()
    {
        $city = City::select('id', 'cityName')->get();

        $places = Place::paginate(30)->where('type', 'Medical');
        return view('admin.dashboard.MedicalDashboard', compact('places', 'city'));
    }

    public function showMedTours()
    {
        $places = Place::get();
        $randomPlaces = Place::inRandomOrder()->limit(9)->get();
        return view('user.MedicalTours')->with(compact('places', 'randomPlaces'));
    }
    // -------------------------------------------------------------------------------------
    public function destroy($id)
    {
        $places = Place::findOrfail($id);
        Storage::delete($places->image);

        $places->delete();
        session()->flash('success', ' delete successfuly');
        return redirect(url('MedicalDashboard'));
    }
    // -------------------------------------------------------------------------------------
    public function edit($id)
    {
        return $id;
        $places = Place::findOrFail($id);
        return view('admin.dashboard.MedicalDashboard', ['places' => $places]);
    }

    // -----------------------------

    public function CustomersRes($id)
    {
        $places = Place::findOrfail($id);
        $Myreservations = Reserve::get();
        return view('admin.dashboard.Reservations', compact('places', 'Myreservations'));
    }
    // --------------search----------------------------------------------------
    public function Medsearch(Request $request)
    {
        $city = City::get();
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('cities_id', 'LIKE', "%{$search}%")
            ->get()->where('type', 'Medical');
        return view('admin.dashboard.MedicalDashboard', compact('places', 'city'));
    }

    public function searchToures(Request $request)
    {

        $randomPlaces = Place::get();
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get()->where('type', 'Medical');

        return view('user.MedicalTours', compact('places', 'randomPlaces'));
    }
}
