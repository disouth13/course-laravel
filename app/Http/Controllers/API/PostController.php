<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::latest()->get();
        return new PostResource(True, 'Daftar Post', $posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate form
         $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
             'title' =>'required|min:3',
             'content'   => 'required|min:10',
         ]);

         //check if validation
         if ($validator->fails() ){
            return response()->json($validator->errors(),422);
         }

         //upload file
         $image = $request->file('image');
         $image->storeAs('public/posts/', $image->hashName());
 
         //simpan ke database
         $post = Post::create([
             'image' => $image->hashName(),
             'title' => $request->title,
             'content' => $request->content,
         ]);
 

         //return response
         return new PostResource(True, 'Create Post', $post);
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        // $post = Post::findOrFail($id);

        //return response
        return new PostResource(True, 'Show Post Detail', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         //validate form
         $validator = Validator::make($request->all(), [
            // 'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
             'title' =>'required|min:3',
             'content'   => 'required|min:10',
         ]);

         //check if validation
         if ($validator->fails() ){
            return response()->json($validator->errors(),422);
         }

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
 
 

         //return response
         return new PostResource(True, 'Update Post', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //cari id posts
        $post = Post::findOrFail($id);

        //delete file image
        Storage::delete('public/posts/' . $post->image);

        //delete row data
        $post->delete();

        //return response
        return new PostResource(True, 'Delete Post', $post);
    }
}
