<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post, Comment $comment)
    {
        //return view('posts.show')->with(['post' => $post]);
        $like=Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        return view('posts.show', compact('post', 'like'));
    }
    

    public function create()
    {
        return view('posts.create');
    }

    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $input['user_id'] = \Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
    return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }
}
