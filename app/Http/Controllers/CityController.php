<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function showCity(){
        return view('admin.dashboard.AddCity');
    }
    public function storeCity(Request $request){
        $data=$request->validate([
         'cityName' => "required|string|min:2|max:30|unique:Cities,cityName",
        //  'activity' => "required|in:1,2 "
        ]);
        // return $request->all();
        $city = City::create($request->all());
        return redirect()->back();

        session()->flash('success', ' inserted successfuly');
    }
}
