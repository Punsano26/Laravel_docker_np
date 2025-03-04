<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    //Then, define the logic for fetching and displaying posts in the PostController
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'Laravel 8 is Released!', 'posted_by' => 'Tania Rascia'],
            ['id' => 2, 'title' => 'The Road to Vue 3: Vite', 'posted_by' => 'Lachlan Miller'],
            ['id' => 3, 'title' => 'The Road to Vue 3: Vue Router', 'posted_by' => 'Lachlan Miller'],
            ['id' => 4, 'title' => 'The Road to Vue 3: Vue 3', 'posted_by' => 'Lachlan Miller'],
        ];

        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'posted_by' => 'required'
        ]);

        Post::create($request->all());

        return redirect()->route('posts.message')->with('success', 'Post created successfully.');
    }
    public function message()
    {
        $posts = Post::paginate(6); // Adjust the number of items per page as needed
        return view('posts.message', compact('posts'));
    }
}
