<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // $posts = Post::All();
        $posts = auth()->user()->posts()->latest()->paginate(8);
        return view('admin.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'slug' => 'required|min:10|max:120',
        ]);

        $user = Auth::user();

        // $post = new Post();
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->slug = request('slug');

        if ($request->hasFile('post_image')) {
            $filename = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->move(public_path('images'), $filename);
            // $post->post_image = $filename;
            $inputs['post_image'] = $filename;
        }

        $user->posts()->create($inputs);
        // dd($inputs);
        return redirect()->route('home')->with('success', 'Post created sucecessfully');
    }

    public function edit(Post $post)
    {
        return view('admin.edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'slug' => 'required|min:10|max:120',
        ]);

        $post->title = request('title');
        $post->body = request('body');
        $post->slug = request('slug');

        if ($request->hasFile('post_image')) {
            $filename = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->move(public_path('images'), $filename);
            $post->post_image = $filename;
        }
        // $this->authorize('update', $post);
        $user->posts()->save($post);

        return redirect(route('admin.index'))->with('update-success', 'Post updated successfully');
        // dd($post);
        dd($post);
    }
    public function destroy(Post $post)
    {
        // $post = Post::findOrFail($post_id);
        $user = Auth::user();

        // // Deleting only posts for the log in user
        // $user->posts()->where('id', $post_id)->delete();

        // Delete any post
        $post->delete();
        return redirect(route('admin.index'))->with('status', 'Post deleted successfully');
    }
}
