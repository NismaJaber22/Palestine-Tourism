<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Place;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function store(Request $request){

        $data=$request->validate([
                    'name'=>'required | min:2 | max:20',
                    'description'=>'required | min:5 | max:100',
                    'type'=>'required',
                    'location'=>'required',
                    'Price'=>'required|numeric' ,
                    'start'=>'required',
                    'AddRem1'=>'required',
                    'close'=>'required',
                    'AddRem2'=>'required',
                    'image'=>'required|image|mimes:png,jpg,gif'
                ]);

                $FileName=Storage::putFile("placeimage",$data['image']);
                $data['image'] = $FileName ;

                $places=Place::create($data);

                 session()->flash('success',' inserted successfuly');

                 if($data['type']==1)
                    return redirect(url('ReligiousDashboard'));
                    elseif($data['type']==2)
                    return redirect(url('CulturalDashboard'));
                    elseif($data['type']==3)
                    return redirect(url('LeisureDashboard'));
                    elseif($data['type']==4)
                    return redirect(url('MedicalDashboard'));
            }

// index admin
            public function index(){

                $places=Place::paginate(5);
                return view('admin.index',compact('places'));
            }
}
