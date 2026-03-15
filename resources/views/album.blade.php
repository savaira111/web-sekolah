@extends('layouts.app')

@section('title', 'Galeri Kegiatan - SMKS Mahaputra Cerdas Utama')

@section('content')
<div x-data="{ 
    activeFilter: 'Semua',
    albums: [
        {
            title: 'Wisuda Angkatan 2023',
            category: 'Akademik',
            date: '25 MEI 2023',
            photos: 120,
            image: '{{ asset('images/gedung-sekolah.jpg') }}',
            desc: 'Perayaan kelulusan siswa-siswi kelas XII di gedung utama dengan penuh khidmat dan kegembiraan.'
        },
        {
            title: 'Turnamen Futsal Cup',
            category: 'Kesiswaan',
            date: '10 MARET 2023',
            photos: 85,
            image: 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=1000',
            desc: 'Kompetisi olahraga antar kelas tahunan untuk menjunjung tinggi sportivitas dan kerjasama tim.'
        },
        {
            title: 'Praktikum Kimia',
            category: 'Akademik',
            date: '15 FEBRUARI 2023',
            photos: 45,
            image: 'https://images.unsplash.com/photo-1532187875605-1ef6c237f142?q=80&w=1000',
            desc: 'Kegiatan belajar mengajar di laboratorium untuk menguji teori kimia secara langsung.'
        },
        {
            title: 'Bakti Sosial Masyarakat',
            category: 'Kesiswaan',
            date: '20 JANUARI 2023',
            photos: 62,
            image: 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=1000',
            desc: 'Kepedulian siswa SMKS Mahaputra terhadap lingkungan sekitar melalui bantuan sembako.'
        },
        {
            title: 'Workshop Robotik',
            category: 'Fasilitas',
            date: '12 DESEMBER 2022',
            photos: 38,
            image: 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=1000',
            desc: 'Pelatihan teknologi masa depan untuk mengasah kreativitas dan inovasi digital siswa.'
        },
        {
            title: 'Lomba Debat Nasional',
            category: 'Prestasi',
            date: '05 NOVEMBER 2022',
            photos: 54,
            image: 'https://images.unsplash.com/photo-1475721027187-402ad2989a3b?q=80&w=1000',
            desc: 'Perwakilan tim debat sekolah yang berhasil meraih juara dalam kompetisi tingkat nasional.'
        }
    ],
    get filteredAlbums() {
        if (this.activeFilter === 'Semua') return this.albums;
        return this.albums.filter(album => album.category === this.activeFilter);
    }
}">
    <!-- Hero Section -->
    <section class="pt-20 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-[#0F172A] mb-6">
                Galeri Kegiatan & <br>
                <span class="text-blue-600">Dokumentasi</span>
            </h1>
            <p class="text-gray-500 max-w-2xl mx-auto mb-10 text-sm lg:text-base leading-relaxed">
                Melihat kembali momen-momen berharga dan prestasi yang diukir oleh civitas akademika di SMKS Mahaputra Cerdas Utama.
            </p>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-16">
                <template x-for="filter in ['Semua', 'Akademik', 'Kesiswaan', 'Prestasi', 'Fasilitas']">
                    <button 
                        @click="activeFilter = filter"
                        :class="activeFilter === filter ? 'bg-blue-600 text-white' : 'bg-gray-50 text-gray-500 hover:bg-gray-100'"
                        class="px-6 py-2.5 rounded-full text-xs font-bold transition-all duration-300 min-w-[100px]"
                        x-text="filter">
                    </button>
                </template>
            </div>
        </div>
    </section>

    <!-- Album Grid -->
    <section class="pb-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="(album, index) in filteredAlbums" :key="index">
                    <div class="group bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col">
                        <!-- Image Container -->
                        <div class="aspect-[4/3] relative overflow-hidden">
                            <img :src="album.image" :alt="album.title" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <!-- Photo Count Badge -->
                            <div class="absolute top-5 right-5">
                                <div class="px-3 py-1.5 bg-blue-600/90 backdrop-blur-sm rounded-lg flex items-center gap-2 text-white shadow-lg">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-[10px] font-black tracking-wider uppercase" x-text="album.photos + ' Foto'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8 flex-1 flex flex-col">
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
                                <a href="#" class="inline-flex items-center justify-center gap-2 w-full py-3 px-6 border-2 border-blue-600 rounded-xl text-blue-600 font-bold text-xs hover:bg-blue-600 hover:text-white transition-all duration-300">
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
