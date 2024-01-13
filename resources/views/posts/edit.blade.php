<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Comics</title>
    </head>
    </x-slot>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <input type="submit" value="保存" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
        </form>
        
    </body>
    </x-app-layout>
</html>