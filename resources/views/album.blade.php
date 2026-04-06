@extends('layouts.app')

@section('title', 'Galeri Kegiatan - SMKS Mahaputra Cerdas Utama')

@section('content')
@php
    $formattedAlbums = $albums->map(function($album) {
        return [
            'id' => $album->id,
            'title' => $album->title,
            'category' => $album->category,
            'date' => \Carbon\Carbon::parse($album->event_date)->translatedFormat('d F Y'),
            'photos' => $album->photos->count(),
            'image' => $album->photos->isNotEmpty() ? asset('storage/' . $album->photos->first()->path) : asset('images/gedung-sekolah.jpg'),
            'desc' => \Illuminate\Support\Str::limit(strip_tags($album->description), 100)
        ];
    })->values()->all();
@endphp
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('albumGallery', () => ({
            activeFilter: 'Semua',
            albums: @json($formattedAlbums),
            get filteredAlbums() {
                if (this.activeFilter === 'Semua') return this.albums;
                return this.albums.filter(album => album.category === this.activeFilter);
            }
        }));
    });
</script>
<div x-data="albumGallery()">
    <!-- Hero Section -->
    <section class="pt-6 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-[#0F172A] mb-6">
                Galeri Kegiatan & <br>
                <span class="text-blue-600">Dokumentasi</span>
            </h1>
            <p class="text-base lg:text-lg text-gray-500 max-w-3xl mx-auto mb-10 leading-relaxed">
                Melihat kembali momen-momen berharga dan prestasi yang diukir oleh civitas akademika di SMKS Mahaputra Cerdas Utama.
            </p>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-4">
                <template x-for="filter in ['Semua', 'Akademik', 'Kesiswaan', 'Prestasi', 'Fasilitas']">
                    <button 
                        @click="activeFilter = filter"
                        :class="activeFilter === filter ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-gray-50 text-gray-500 hover:bg-gray-100'"
                        class="px-8 py-3.5 rounded-full text-sm font-bold transition-all duration-300 min-w-[120px]"
                        x-text="filter">
                    </button>
                </template>
            </div>
        </div>
    </section>

    <!-- Album Grid -->
    <section class="pb-16 bg-white min-h-[400px]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Empty State -->
            <template x-if="filteredAlbums.length === 0">
                <div class="flex flex-col items-center justify-center py-20 animate-fade-in" x-transition>
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Konten tidak ditemukan</h3>
                    <p class="text-gray-500">Belum ada dokumentasi untuk kategori <span class="font-bold font-blue-600" x-text="activeFilter"></span>.</p>
                </div>
            </template>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="album in filteredAlbums" :key="album.id">
                    <div 
                        x-show="true"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 translate-y-12 scale-90"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        class="group bg-white rounded-[1.5rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col"
                    >
                        <!-- Image Container -->
                        <div class="aspect-[4/3] relative overflow-hidden">
                            <img :src="album.image" :alt="album.title" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            
                            <!-- Badges -->
                            <div class="absolute top-5 left-5 right-5 flex justify-between items-start">
                                <!-- Category Label -->
                                <div class="px-3 py-1.5 bg-white/90 backdrop-blur-sm rounded-lg flex items-center shadow-sm">
                                    <span class="text-[10px] font-black tracking-widest uppercase text-blue-600" x-text="album.category"></span>
                                </div>

                                <!-- Photo Count Badge -->
                                <div class="px-3 py-1.5 bg-blue-600/90 backdrop-blur-sm rounded-lg flex items-center gap-2 text-white shadow-lg">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-[10px] font-black tracking-wider uppercase" x-text="album.photos + ' Foto'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex-1 flex flex-col">
                            <!-- Date -->
                            <div class="flex items-center gap-2 text-blue-600 mb-4 px-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-[11px] font-black uppercase tracking-widest text-[#94A3B8]" x-text="album.date"></span>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-[#0F172A] mb-3 px-1 leading-tight group-hover:text-blue-600 transition-colors" x-text="album.title"></h3>
                            
                            <!-- Description -->
                            <p class="text-gray-400 text-xs px-1 leading-relaxed mb-6" x-text="album.desc"></p>

                            <!-- Button -->
                            <div class="mt-auto">
                                <a :href="'/album/' + album.id" class="inline-flex items-center justify-center gap-2 w-full py-3 px-6 border-2 border-blue-600 rounded-xl text-blue-600 font-bold text-xs hover:bg-blue-600 hover:text-white transition-all duration-300">
                                    Lihat Semua Foto
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Load More -->
            <div class="mt-20 flex justify-center">
                <button class="inline-flex items-center gap-2 px-8 py-3 bg-gray-50 text-gray-900 rounded-xl font-bold text-sm hover:bg-gray-100 transition-all group">
                    Muat Lebih Banyak
                    <svg class="w-4 h-4 transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>
</div>
@endsection
