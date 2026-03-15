@extends('layouts.superadmin.app')
@section('title', 'Manajemen Album Foto - Admin Mahput')

@section('content')
<div x-data="{ 
    darkMode: false,
    searchQuery: '',
    currentCategory: 'Semua Kategori',
    albums: [
        { 
            id: 1, 
            title: 'Wisuda Angkatan 2023', 
            category: 'WISUDA', 
            date: '15 Juni 2023', 
            count: 124, 
            image: '{{ asset('images/gedung-sekolah.jpg') }}',
            badgeClass: 'bg-amber-100 text-amber-700'
        },
        { 
            id: 2, 
            title: 'Turnamen Futsal Cup', 
            category: 'ESKUL', 
            date: '10 Mei 2023', 
            count: 45, 
            image: '{{ asset('images/extracurriculars/futsal.jpg') }}',
            badgeClass: 'bg-emerald-100 text-emerald-700'
        },
        { 
            id: 3, 
            title: 'Praktikum Kimia Terpadu', 
            category: 'KEGIATAN AKADEMIK', 
            date: '22 April 2023', 
            count: 32, 
            image: '{{ asset('images/pplg/lab-komputer.jpg') }}',
            badgeClass: 'bg-blue-100 text-blue-700'
        },
        { 
            id: 4, 
            title: 'Orientasi Siswa Baru', 
            category: 'PPDB', 
            date: '12 Maret 2023', 
            count: 88, 
            image: '{{ asset('images/gedung-sekolah.jpg') }}',
            badgeClass: 'bg-orange-100 text-orange-700'
        }
    ]
}" class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-8 mb-10 gap-4">
        <div>
            <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Manajemen Album Foto</h2>
            <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola galeri kegiatan dan dokumentasi sekolah Mahaputra.</p>
        </div>
        
        <a href="{{ route('superadmin.albums.create') }}" class="px-6 py-3 bg-[#3B82F6] text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-all duration-300 shadow-lg shadow-blue-500/25 flex items-center gap-2">
            <div class="w-5 h-5 rounded-full border-2 border-white flex items-center justify-center">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v12m6-6H6"></path></svg>
            </div>
            Tambah Album Baru
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-8 flex flex-col md:flex-row items-center gap-4" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
        <!-- Search Input -->
        <div class="relative flex-1 w-full">
            <input type="text" x-model="searchQuery" placeholder="Cari album kegiatan..." class="w-full pl-12 pr-4 py-3 rounded-xl text-sm border-none bg-gray-50/50 focus:ring-2 focus:ring-blue-500/10 transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] text-white' : 'bg-gray-50/50 text-gray-900'">
            <svg class="w-5 h-5 absolute left-4 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <!-- Category Dropdown -->
            <div class="relative flex-1 md:w-48">
                <button class="w-full px-4 py-3 rounded-xl text-sm font-bold flex items-center justify-between border-none transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] text-gray-300' : 'bg-gray-50/50 text-gray-700'">
                    <span x-text="currentCategory"></span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
            </div>

            <!-- Filter Settings Icon -->
            <button class="p-3 rounded-xl bg-gray-50/50 hover:bg-gray-100 transition-colors" :class="darkMode ? 'bg-[#0F172A] hover:bg-gray-800 text-gray-400' : 'bg-gray-50/50 text-gray-500'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M3 8h18M3 12H13M3 16H13M3 20H13"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Album Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
        <template x-for="album in albums" :key="album.id">
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 flex flex-col" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                <!-- Album Thumbnail -->
                <div class="h-56 relative overflow-hidden">
                    <img :src="album.image" :alt="album.title" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-500"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest shadow-sm" :class="album.badgeClass" x-text="album.category"></span>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-6">
                    <h3 class="text-lg font-extrabold mb-4 transition-colors duration-300 line-clamp-1" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="album.title"></h3>
                    
                    <div class="flex items-center justify-between text-gray-400">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs font-bold" x-text="album.date"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs font-bold" x-text="album.count + ' Foto'"></span>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Pagination Footer -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-6 py-6 border-t" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
        <p class="text-sm font-bold text-gray-400 transition-colors duration-300">
            Menampilkan <span class="text-gray-900" :class="darkMode ? 'text-white' : 'text-gray-900'">1-4</span> dari <span class="text-gray-900" :class="darkMode ? 'text-white' : 'text-gray-900'">24</span> album
        </p>

        <div class="flex items-center gap-2">
            <button class="w-10 h-10 rounded-xl flex items-center justify-center border transition-all hover:bg-gray-50" :class="darkMode ? 'border-gray-800 hover:bg-gray-800 text-gray-500' : 'border-gray-100 hover:bg-gray-50 text-gray-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black bg-[#3B82F6] text-white shadow-lg shadow-blue-500/30">1</button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black hover:bg-gray-50 transition-all" :class="darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-500 hover:bg-gray-50'">2</button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black hover:bg-gray-50 transition-all" :class="darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-500 hover:bg-gray-50'">3</button>
            <span class="px-2 text-gray-300 font-bold">...</span>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black hover:bg-gray-50 transition-all" :class="darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-500 hover:bg-gray-50'">6</button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center border transition-all hover:bg-gray-50" :class="darkMode ? 'border-gray-800 hover:bg-gray-800 text-gray-500' : 'border-gray-100 hover:bg-gray-50 text-gray-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
