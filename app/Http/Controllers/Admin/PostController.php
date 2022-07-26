<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('id', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Post::create($data);

        session()->flash('flash.banner', 'El artículo se creó con éxito');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post){
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->update($data);

        session()->flash('flash.banner', 'El artículo se actualizó con éxito');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.posts.edit', $post);

    }
}
