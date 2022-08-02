<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
        preg_match_all($re_extractImages, $data['body'], $matches);
        $images = $matches[1];

        foreach ($images as $image) {
            $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);

            $post->images()->create([
                'image_url' => $image_url,
            ]);
        }

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

        $images_antiguas = $post->images->pluck('image_url')->toArray();

        $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
        preg_match_all($re_extractImages, $data['body'], $matches);
        $images_nuevas = $matches[1];

        foreach ($images_nuevas as $image) {
            $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);

            $clave = array_search($image_url, $images_antiguas);

            if ($clave === false) {

                $post->images()->create([
                    'image_url' => $image_url,
                ]);

            } else {

                unset($images_antiguas[$clave]);

            }
        }

        foreach ($images_antiguas as $image) {
            Storage::delete($image);
            $post->images()->where('image_url', $image)->delete();
        }


        session()->flash('flash.banner', 'El artículo se actualizó con éxito');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.posts.edit', $post);

    }
}
