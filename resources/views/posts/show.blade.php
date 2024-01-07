<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    </x-slot>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div>
            <p>{{ $post->user->name }}</p>
        </div>
        <div class="content">
            <div class="content__post">
                <h3></h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <span>
        <img src="{{asset('img/likebutton.png')}}" width="30px">
 
        <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
        @if($like)
        <!-- 「いいね」取消用ボタンを表示 -->
	        <a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm">
		        いいね
		        <!-- 「いいね」の数を表示 -->
		        <span class="badge">
			        {{ $post->likes->count() }}
		        </span>
	        </a>
        @else
        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
    	    <a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
	    	    いいね
		        <!-- 「いいね」の数を表示 -->
		        <span class="badge">
		        	{{ $post->likes->count() }}
		        </span>
	        </a>
        @endif
        </span>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="body">
                <h2></h2>
                <textarea name="comment[body]" placeholder="コメントする"></textarea>
            </div>
            <input type="hidden" name="comment[user_id]" value="{{ Auth::user()->id }}">
            <input type="hidden" name="comment[post_id]" value="{{ $post->id }}">
            <input type="submit" value="store"/>
        </form>
        <div>
            @foreach ($post->comments as $comment)
                <div class='post'>
                    <p class='body'>{{ $comment->body }}</p>
                    <p class='body'>{{ $comment->user->name }}</p>
                </div>
            @endforeach
   　　  </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>
