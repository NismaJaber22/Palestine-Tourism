<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request)
    {

        $data = $request->validate([
            'comment' => "min:2",
            'user_id' => "required|exists:users,id",
            'blog_id' => "required|exists:blogs,id"
        ]);

        $comment = Comment::create($data);
        return redirect('/BlogsHome');
        // return  $comment;
        // Comment::create([
        //     'comment'=>$request->comment,
        //     'user_id' => $request-> user_id,
        //     'blog_id' => $request->blog_id
        // ]);

    }

    public function destroy($id)
    {
        $comment = Comment::findOrfail($id)->delete();
        return redirect(url('BlogsHome'));
    }

}
