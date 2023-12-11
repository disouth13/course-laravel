<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
class PostController extends Controller
{
    //index
    public function index():View
    {
        $posts = Post::latest();
        return view('post.index', compact('posts'));
    }
}
