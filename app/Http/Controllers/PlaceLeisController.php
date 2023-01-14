<?php


namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Place;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlaceLeisController extends Controller
{
    public function showLeisure()
    {
        $city=City::select('id','cityName')->get();

        $places = Place::paginate(30)->where('type','Leisure');
        return view('admin.dashboard.LeisureDashboard', compact('places','city'));
    }

    public function showLeisTours()
    {
        $places = Place::get();
        $city=City::get();
        $randomPlaces = Place::inRandomOrder()->limit(9)->get();
        return view('user.LeisureTours')->with(compact('places', 'randomPlaces','city'));
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
    // ---------------------------------------

    public function CustomersRes($id)
    {
         $places = Place::findOrfail($id);
        $Myreservations = Reserve::get();
        return view('admin.dashboard.Reservations', compact('places', 'Myreservations'));

    }
    // --------------search----------------------------------------------------

    public function Leisearch(Request $request)
    {
        $city = City::get();
        $search = $request->input('search');

        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('cities_id', 'LIKE', "%{$search}%")
            ->get()->where('type', 'Leisure');

        return view('admin.dashboard.LeisureDashboard', compact('places','city'));
    }


    public function searchToures(Request $request)
    {

        $randomPlaces = Place::get();
        $search = $request->input('search');
        $places = Place::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get()->where('type', 'Leisure');

        return view('user.LeisureTours', compact('places', 'randomPlaces'));
    }
}
