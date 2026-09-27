<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog CRUD') - Tugas P10</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nvidia: {
                            green: '#76b900',
                            hover: '#8be000',
                            dark: '#000000',
                            card: '#121212',
                            border: '#222222'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-black text-white min-h-screen flex flex-col font-sans antialiased">
    <!-- Navbar Nvidia Style -->
    <nav class="bg-black border-b border-nvidia-border py-4 px-6 mb-8 sticky top-0 z-50">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="text-xl font-extrabold tracking-wider text-white flex items-center gap-2">
                <span class="w-3 h-6 bg-nvidia-green inline-block rounded-sm"></span>
                GEFORCE <span class="text-nvidia-green">BLOG</span>
            </a>
            <a href="{{ route('posts.create') }}" class="bg-nvidia-green hover:bg-nvidia-hover text-black px-5 py-2 rounded-none font-bold text-sm uppercase tracking-wider transition">
                + Post Baru
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-4 flex-1 w-full">
        <x-alert />
        @yield('content')
    </main>

    <!-- Footer Nvidia Style -->
    <footer class="bg-black border-t border-nvidia-border py-6 text-center text-xs text-gray-500 mt-16 uppercase tracking-widest">
        Dhany Rolas &copy; 2026 — Powered by <span class="text-nvidia-green font-bold">NVIDIA GeForce</span> Style
    </footer>
</body>
</html>