@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="max-w-2xl mx-auto bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-xl">
        <h1 class="text-xl font-bold mb-6 text-amber-400">Edit Artikel</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-300">Judul Post</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500 text-white">
                @error('title') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-300">Penulis (Author)</label>
                <input type="text" name="author" value="{{ old('author', $post->author) }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500 text-white">
                @error('author') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-300">Isi Artikel</label>
                <textarea name="body" rows="6" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500 text-white">{{ old('body', $post->body) }}</textarea>
                @error('body') <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-700">
                <a href="{{ route('posts.show', $post) }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-sm font-medium text-gray-200">Batal</a>
                <button type="submit" class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-lg text-sm font-medium">Update Post</button>
            </div>
        </form>
    </div>
@endsection