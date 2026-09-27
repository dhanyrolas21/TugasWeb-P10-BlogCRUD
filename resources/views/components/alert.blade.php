@if (session('success'))
    <div class="bg-emerald-900/80 border border-emerald-500 text-emerald-200 px-4 py-3 rounded-lg mb-6 flex justify-between items-center shadow-lg">
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="bg-rose-900/80 border border-rose-500 text-rose-200 px-4 py-3 rounded-lg mb-6 flex justify-between items-center shadow-lg">
        <span>{{ session('error') }}</span>
    </div>
@endif