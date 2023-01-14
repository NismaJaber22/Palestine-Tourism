<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Place;
use App\Models\Reserve;

use App\Models\Reviews;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    // user index
    public function home()
    {
        $places = Place::get();
        $lasttours = Place::orderBy('created_at', 'desc')->get()->take(4);
        $randomPlaces = Place::inRandomOrder()->limit(9)->get();
        $reviews = Reviews::orderBy('created_at', 'desc')->select('id','opinion','user_id')->get()->take(15);
        return view('user.index')->with(compact('places', 'randomPlaces','lasttours','reviews'));
    }
    // admin dashboard function
    public function dashboards()
    {
        $places = Place::get();
        $relcount = Place::where('type', 'Religious')->count();
        $culcount = Place::where('type', 'Cultural')->count();
        $leicount = Place::where('type', 'leisure')->count();
        $medcount = Place::where('type', 'Medical')->count();
        $blogs = Blog::get();
        return view('admin.dashboard.dashboards', compact('places', 'relcount', 'culcount', 'leicount', 'medcount', 'blogs'));
    }

    // my reservation
    public function Myreservations()
    {
        $places = Place::get();
        return view('user.Myreservations', compact('places'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | min:2 | max:20|string',
            'description' => 'required | min:5 | max:100',
            'type' => 'required',
            'cities_id' => 'required',
            'start' => 'required',
            'Price' => 'required|numeric',
            'date' => 'required',
            'start' => 'required',
            'AddRem1' => 'required',
            'close' => 'required',
            'AddRem2' => 'required',
            'image' => 'required|image|mimes:png,jpg,gif'
        ]);

        $FileName = Storage::putFile("placeimage", $data['image']);
        $data['image'] = $FileName;

        $places = Place::create($data);

        session()->flash('success', ' inserted successfuly');

        if ($data['type'] == 'Religious')
            return redirect(url('ReligiousDashboard'));
        elseif ($data['type'] == 'Cultural')
            return redirect(url('CulturalDashboard'));
        elseif ($data['type'] == 'Leisure')
            return redirect(url('LeisureDashboard'));
        elseif ($data['type'] == 'Medical')
            return redirect(url('MedicalDashboard'));
    }
    // admin add blog
    public function adminStoreBlog(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:100',
            'text' => 'required|min:20',
            'image' => 'required|image|mimes:png,jpg,gif',
            'user_id' => "required|exists:users,id"

        ]);
        $FileName = Storage::putFile("blogimage", $data['image']);
        $data['image'] = $FileName;

        $blogs = Blog::create($data);

        return redirect(url('BlogDashboard'));
    }

    // admindestroyblog
    public function admindestroyblog($id)
    {
        $blogs = Blog::findOrfail($id);
        Storage::delete($blogs->image);
        $blogs->delete();
        return redirect(url('BlogDashboard'));
    }

    // ------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required | min:2 | max:20 |string',
            'description' => 'required | min:5 | max:100',
            'type' => 'required',
            'cities_id' => 'required',
            'Price' => 'required|numeric',
            'start' => 'required',
            'AddRem1' => 'required',
            'close' => 'required',
            'AddRem2' => 'required',
            'image' => 'image|mimes:png,jpg,gif'
        ]);

        $places = Place::findOrfail($id);
        if ($request->has('image')) {
            Storage::delete($places->image);
            $fileName = Storage::putFile("placeimage", $data['image']);
            $data['image'] = $fileName;
        }
        $places->update($data);

        session()->flash('success', 'updated successfuly');

        if ($data['type'] == 'Religious')
            return redirect(url('ReligiousDashboard'));
        elseif ($data['type'] == 'Cultural')
            return redirect(url('CulturalDashboard'));
        elseif ($data['type'] == 'Leisure')
            return redirect(url('LeisureDashboard'));
        elseif ($data['type'] == 'Medical')
            return redirect(url('MedicalDashboard'));
    }

}
