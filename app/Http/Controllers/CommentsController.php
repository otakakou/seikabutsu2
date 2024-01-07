<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class CommentsController extends Controller
{
    public function index(Comment $comment)
    {
        return view('posts.index')->with(['comments' => $comment->get()]);
    }
    
    public function store(Request $request,Comment $comment)
    {
        $input = $request['comment'];

        $comment->fill($input)->save();
        return redirect('/');
    }
    
}
