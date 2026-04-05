@extends('layouts.app')

@section('title', $album->title . ' - Galeri')

@section('content')
<div class="bg-white min-h-screen">
    <!-- Breadcrumbs & Header -->
    <div class="pt-20 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs font-bold mb-8 uppercase tracking-widest text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('album') }}" class="hover:text-blue-600 transition-colors">Galeri</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                <span class="text-blue-600">Detail Album</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-start lg:items-center gap-8">
                <!-- Back Button on LEFT -->
                <a href="{{ route('album') }}" class="w-12 h-12 flex items-center justify-center bg-white border border-slate-200 rounded-full text-[#0F172A] hover:bg-slate-50 hover:border-blue-200 transition-all shadow-sm group" title="Kembali">
                    <svg class="w-8 h-8 text-slate-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 40 40">
                        <circle cx="20" cy="20" r="19" stroke-width="2"/>
                        <path d="M23 14l-6 6 6 6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                <div class="flex-1">
                    <h1 class="text-2xl lg:text-2xl font-black text-[#0F172A] mb-4 leading-tight tracking-tight">
                        {{ $album->title }}
                    </h1>
                    
                    <div class="flex flex-wrap items-center gap-6 text-blue-600 font-bold text-sm">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>{{ $album->category }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>{{ \Carbon\Carbon::parse($album->event_date)->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>{{ $album->photos->count() }} Foto</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Description Card -->
    <div class="mb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-blue-50/40 border-l-[6px] border-blue-600 rounded-[1.5rem] p-6 md:p-12">
                <h2 class="text-xl font-black text-slate-800 mb-6 flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    Tentang Album Ini
                </h2>
                <div class="text-[#64748B] leading-relaxed text-lg font-medium max-w-5xl">
                    {{ $album->description ?? 'Tidak ada deskripsi untuk album ini.' }}
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($album->photos as $photo)
                    <div x-data="{ open: false }" class="group">
                        <div @click="open = true" class="aspect-[4/3] rounded-[1.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-700 cursor-zoom-in relative">
                            <img src="{{ asset('storage/' . $photo->path) }}" alt="Dokumentasi SMKS Mahaputra" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <!-- Litebox Modal -->
                        <div x-show="open" 
                             x-cloak
                             @keydown.escape.window="open = false" 
                             class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-[#0F172A]/95 backdrop-blur-md"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95">
                            
                            <button @click="open = false" class="absolute top-8 right-8 w-12 h-12 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white/20 transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>

                            <img :src="'{{ asset('storage/' . $photo->path) }}'" class="max-w-full max-h-[85vh] rounded-3xl shadow-2xl border-4 border-white/10">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Fake Pagination Mockup to match the UI Design -->
            @if($album->photos->count() > 8)
            <div class="mt-20 flex items-center justify-center gap-3">
                <button class="w-12 h-12 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button class="w-12 h-12 rounded-2xl bg-blue-600 text-white font-black shadow-lg shadow-blue-200">1</button>
                <button class="w-12 h-12 rounded-2xl border border-slate-100 text-slate-500 font-black hover:bg-slate-50 transition-colors">2</button>
                <button class="w-12 h-12 rounded-2xl border border-slate-100 text-slate-500 font-black hover:bg-slate-50 transition-colors">3</button>
                <button class="w-12 h-12 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
