<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index') -> with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        //dd($post);
        return view('posts/show') -> with(['post' => $post]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' =>$category->get()]);
    }

    public function store(Post $post, PostRequest $request)
    {
        //dd($request->all());
        $input = $request['post'];
        $input +=['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

     public function edit(Post $post)
    {
        return view('posts/edit') -> with(['post' => $post]);
    }

     public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
