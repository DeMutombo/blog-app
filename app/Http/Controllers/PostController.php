<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrfail($id);
        return view('layouts.blog-post')->with(['post' => $post]);
    }
}
