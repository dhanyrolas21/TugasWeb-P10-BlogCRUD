@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-800 border border-gray-700 rounded-xl p-8 shadow-xl">
        <a href="{{ route('posts.index') }}" class="text-sm text-indigo-400 hover:underline mb-4 inline-block">&larr; Kembali ke daftar artikel</a>
        <h1 class="text-3xl font-bold mb-2 text-white">{{ $post->title }}</h1>
        <p class="text-xs text-gray-400 mb-6 border-b border-gray-700 pb-4">Penulis: <span class="text-gray-200 font-medium">{{ $post->author }}</span> | Dibuat: {{ $post->created_at->format('d M Y, H:i') }}</p>
        
        <div class="prose prose-invert max-w-none text-gray-300 whitespace-pre-line mb-8 leading-relaxed">
            {{ $post->body }}
        </div>

        <div class="flex gap-3 border-t border-gray-700 pt-6">
            <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-lg text-sm font-medium">Edit Post</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-sm font-medium">Hapus</button>
            </form>
        </div>
    </div>
@endsection