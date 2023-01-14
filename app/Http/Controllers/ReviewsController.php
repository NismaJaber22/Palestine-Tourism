<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    public function review(Request $request)
    {
        $data = $request->validate([
            'opinion' => 'required|string|min:15',
            'user_id' => 'required|exists:users,id',
        ]);
        $reviews = Reviews::create($data);

        return redirect()->back();
    }



}
