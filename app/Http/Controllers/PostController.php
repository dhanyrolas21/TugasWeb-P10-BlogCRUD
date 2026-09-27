<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'body' => 'required',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . Str::random(5);

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'body' => 'required',
        ]);

        if ($request->title !== $post->title) {
            $validated['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        }

        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Artikel berhasil dihapus!');
    }
}