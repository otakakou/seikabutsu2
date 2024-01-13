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
        <div class="edit"><a href="/posts/{{ $post->id }}/edit"></a>
        <a href="/posts/{{ $post->id }}/edit" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
        編集</a>
        </div>
        
        <span>
        
 
        <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
        @if($like)
        <!-- 「いいね」取消用ボタンを表示 -->
	        <a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm">
		        
		        <!-- 「いいね」の数を表示 -->
		        <a href="{{ route('unlike', $post) }}" class="relative inline-flex items-center justify-center inline-block p-4 px-5 py-3 overflow-hidden font-medium text-indigo-600 rounded-lg shadow-2xl group">
                <span class="absolute top-0 left-0 w-40 h-40 -mt-10 -ml-3 transition-all duration-700 bg-red-500 rounded-full blur-md ease"></span>
                <span class="absolute inset-0 w-full h-full transition duration-700 group-hover:rotate-180 ease">
                <span class="absolute bottom-0 left-0 w-24 h-24 -ml-10 bg-purple-500 rounded-full blur-md"></span>
                <span class="absolute bottom-0 right-0 w-24 h-24 -mr-10 bg-pink-500 rounded-full blur-md"></span>
                </span>
                <span class="relative text-white">いいね</span>
                </a>
                <span class="badge">
			        {{ $post->likes->count() }}
		        </span>
	        </a>
        @else
        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
    	    <a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
	    	    
		        <!-- 「いいね」の数を表示 -->
		        
		  　<a href="{{ route('like', $post) }}" class="relative inline-flex items-center justify-center inline-block p-4 px-5 py-3 overflow-hidden font-medium text-indigo-600 rounded-lg shadow-2xl group">
            <span class="absolute top-0 left-0 w-40 h-40 -mt-10 -ml-3 transition-all duration-700 bg-red-500 rounded-full blur-md ease"></span>
            <span class="absolute inset-0 w-full h-full transition duration-700 group-hover:rotate-180 ease">
            <span class="absolute bottom-0 left-0 w-24 h-24 -ml-10 bg-purple-500 rounded-full blur-md"></span>
            <span class="absolute bottom-0 right-0 w-24 h-24 -mr-10 bg-pink-500 rounded-full blur-md"></span>
            </span>
            <span class="relative text-white">いいね</span>
            </a>
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
            <input type="submit" value="保存" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}"/>
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
            <a href="/"></a>
            <a href="/" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
            戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>
