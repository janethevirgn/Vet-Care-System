@extends('layouts.app')
@section('content')

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Pet Photo Gallery</h1>
                <p class="text-xs text-pink-500 font-medium">Memory lane and snapshots of your beloved pets.</p>
            </div>
            <div>
                <button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200⁠ text-xs font-semibold rounded-xl shadow-md shadow-pink-200 transition flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Upload Photo
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=500&auto=format&fit=crop&q=80" alt="Mila" class="w-full h-48 object-cover rounded-2xl shadow-sm mb-3">
                <div class="px-2">
                    <h3 class="text-xs font-bold text-gray-800">Mila's Day Out</h3>
                    <p class="text-[11px] text-gray-400">Captured on September 2026</p>
                </div>
            </div>
        </div>
    </main>
@endsection