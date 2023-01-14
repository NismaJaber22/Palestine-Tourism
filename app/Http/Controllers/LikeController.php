<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // public function showLike(){
    //     $like=Like::select('id','like')->get();

    // }


    public function show(Request $request ,$id)
    {
        $dislike_user = Like::where(
            ['user_id'=>Auth::user()->id,
            'article_id' => $id]
        )->first();

        $like_user = Like::where(
            ['user_id'=>Auth::user()->id,
            'article_id' => $id]
        )->first();

        $rating = 0;
        if ($like_user !== null) {
            $rating = 1;
        }
        if ($dislike_user !== null) {
            $rating = -1;
        }
        return view('article', compact('article', 'rating'));
    }

    public function like(Request $request){

        // $data = $request->validate([
        //     'like' => 'required|min:5|max:100',
        //     'user_id' => "required|exists:users,id",
        //     'blog_id' => "required|exists:blogs,id"

        // ]);

         $likes = Like::create($request->all());
         return redirect()->back();
}
}
