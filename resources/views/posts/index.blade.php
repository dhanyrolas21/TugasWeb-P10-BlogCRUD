@extends('layouts.app')

@section('title', 'Daftar Artikel Blog')

@section('content')
    <div class="flex justify-between items-center mb-8 border-b border-nvidia-border pb-4">
        <h1 class="text-3xl font-black uppercase tracking-wide text-white">Daftar Artikel</h1>
    </div>

    @if($posts->count() > 0)
        <div class="grid gap-6">
            @foreach ($posts as $post)
                <div class="bg-nvidia-card border border-nvidia-border hover:border-nvidia-green transition duration-300 p-6 shadow-2xl relative group">
                    <div class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-nvidia-green transition duration-300"></div>
                    
                    <h2 class="text-2xl font-bold text-white mb-2 group-hover:text-nvidia-green transition">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="text-xs text-gray-400 mb-4 tracking-wide uppercase">
                        By <span class="text-nvidia-green font-semibold">{{ $post->author }}</span> &bull; {{ $post->created_at->diffForHumans() }}
                    </p>
                    <p class="text-gray-300 mb-6 leading-relaxed">{{ Str::limit($post->body, 150) }}</p>
                    
                    <div class="flex items-center gap-3 border-t border-nvidia-border/60 pt-4">
                        <a href="{{ route('posts.show', $post) }}" class="text-xs font-bold uppercase tracking-wider bg-neutral-800 hover:bg-neutral-700 px-4 py-2 text-white transition">Baca Detail</a>
                        <a href="{{ route('posts.edit', $post) }}" class="text-xs font-bold uppercase tracking-wider bg-amber-600 hover:bg-amber-500 px-4 py-2 text-white transition">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-bold uppercase tracking-wider bg-rose-700 hover:bg-rose-600 px-4 py-2 text-white transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @else
        <div class="bg-nvidia-card border border-nvidia-border p-12 text-center text-gray-400">
            Belum ada artikel. Klik tombol <strong class="text-nvidia-green">+ POST BARU</strong> untuk membuat artikel pertama!
        </div>
    @endif
@endsection