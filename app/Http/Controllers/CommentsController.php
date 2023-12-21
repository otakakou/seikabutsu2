<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post,Comment $comment)
    {
        $input = $request['post'];
        $input += ['post_id' => 1];
        $input += ['user_id' => 1];
        $comment->fill($input)->save();
        return redirect('/comments/' . $post->id);
    }
}
