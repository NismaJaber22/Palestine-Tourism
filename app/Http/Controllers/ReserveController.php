<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReserveController extends Controller
{
    public function BookNow($id)
    {
        $places = Place::findOrfail($id);
        return view('user.BookNow', compact('places'));
    }

    // reserve


    public function reserve(Request $request)
    {
        $data = $request->validate([
            'peoplenum' => 'required|numeric',
            // 'total' => 'required|numeric',
            // 'end' => 'required|numeric',
            'phone' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'place_id' => 'required|exists:places,id',
         ]);

        $reserve = Reserve::create($data);
         return redirect(url("Myreservations"));
    }


    public function Ticket($id)
    {
        $reserves = Reserve::findOrfail($id);
        return view('user.Ticket', compact('reserves'));
    }
}
