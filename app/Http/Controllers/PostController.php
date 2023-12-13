<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\StoreAs;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        $posts = Post::latest()->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        // dd($request->all());
        //validate form
        $this->validate($request,
        [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'title' =>'required|min:3',
            'content'   => 'required|min:10',
        ]);

        //upload file
        $image = $request->file('image');
        $image->storeAs('public/posts/', $image->hashName());

        //simpan ke database
        Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //validate form
        $this->validate($request,[
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'title' =>'required|min:3',
            'content'   => 'required|min:10',
        ]);

        //update
        $post = Post::findOrFail($id);

        //cek upload image
        if ($request->hasFile('image'))
        {
            //delete file image
            Storage::delete('public/posts/' . $post->image);

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/posts/', $image->hashName());

            //simpan database
            $post->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'content' => $request->content,
            ]);
        } else {
            //simpan database
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //cari id posts
        $post = Post::findOrFail($id);

        //delete file image
        Storage::delete('public/posts/' . $post->image);

        //delete row data
        $post->delete();

        return redirect()->route('posts.index');

    }
}
