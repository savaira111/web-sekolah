@extends('layouts.superadmin.app')
@section('title', 'Detail Album - Admin Mahput')

@section('content')
<div class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    <!-- Breadcrumbs & Header -->
    <div class="flex items-center justify-between mt-6 mb-4">
        <div class="flex items-center gap-2 text-xs font-medium text-gray-400">
            <a href="{{ route('superadmin.albums.index') }}" class="hover:text-blue-500 transition-colors">Manajemen Album</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-900" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Detail Album</span>
        </div>
    </div>

    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('superadmin.albums.index') }}" 
               class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 border"
               :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 text-gray-400 hover:text-white hover:border-gray-600' : 'bg-white border-gray-200 text-gray-400 hover:text-blue-500 hover:border-blue-500 shadow-sm'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-extrabold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $album->title }}</h2>
                <p class="text-sm font-bold text-gray-400 mt-1 uppercase tracking-widest">{{ $album->category }} • {{ \Carbon\Carbon::parse($album->event_date)->translatedFormat('d F Y') }}</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('superadmin.albums.edit', $album) }}" class="px-6 py-3 rounded-xl bg-blue-600 text-white font-bold text-sm shadow-lg hover:bg-blue-700 transition-all">Edit Album</a>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        @foreach($album->photos as $photo)
            <div class="aspect-square rounded-[2rem] overflow-hidden border transition-all hover:scale-[1.03] group relative shadow-sm" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                <img src="{{ asset('storage/' . $photo->path) }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>
        @endforeach
    </div>

    <div class="mt-12 p-8 rounded-[2rem] border transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
        <h3 class="text-lg font-extrabold mb-4" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Deskripsi Album</h3>
        <p class="text-gray-400 leading-relaxed font-medium">{{ $album->description }}</p>
    </div>
</div>
@endsection
