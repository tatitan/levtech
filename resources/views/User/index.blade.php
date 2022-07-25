<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>My Blog</h1>
        <div class='own_posts'>
            @foreach($own_posts as $post)
                <div crass='post'>
                    <a href="/posts/{{ $post ->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    <small>{{ $post->user->name }}</small>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <div class 'paginate'>
            {{$own_posts->links()}}
        </div>
    </body>
</html>
@endsection
