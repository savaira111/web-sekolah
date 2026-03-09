@extends('layouts.app')

@section('title', 'Beranda - SMKS Mahaputra Cerdas Utama')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-12 pb-24 lg:pt-16 lg:pb-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Pendaftaran Siswa Baru T.A 2024/2025
                </div>
                <h1 class="text-4xl lg:text-6xl font-bold text-[#0F172A] leading-tight leading-[1.1]">
                    Membangun Masa Depan <br>
                    <span class="text-blue-600 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Digital & Kreatif</span>
                </h1>
                <p class="text-base text-gray-600 max-w-xl leading-relaxed">
                    SMKS Mahaputra Cerdas Utama menghadirkan kurikulum yang diselaraskan dengan kebutuhan industri masa kini. Pilih jurusan yang sesuai dengan minat bakatmu dan jadilah tenaga ahli profesional.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('registration') }}" class="px-6 py-3.5 bg-blue-600 text-white rounded-xl font-bold text-base hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-200 transition-all">Daftar Sekarang</a>
                    <a href="{{ route('profile') }}" class="px-6 py-3.5 bg-white text-gray-700 border border-gray-200 rounded-xl font-bold text-base hover:bg-gray-50 transition-all flex items-center gap-2">Profil Sekolah</a>
                </div>
                
                <div class="flex items-center gap-8 pt-4">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-[#0F172A]">1,200+</span>
                        <span class="text-gray-500 text-xs">Siswa Aktif</span>
                    </div>
                    <div class="h-10 w-px bg-gray-200"></div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-[#0F172A]">98%</span>
                        <span class="text-gray-500 text-xs">Lulusan Bekerja</span>
                    </div>
                    <div class="h-10 w-px bg-gray-200"></div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-[#0F172A]">50+</span>
                        <span class="text-gray-500 text-xs">Mitra Industri</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-20 -right-20 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-72 h-72 bg-indigo-400/10 rounded-full blur-3xl"></div>
                <div class="relative z-10 bg-white p-3 rounded-[2rem] shadow-2xl overflow-hidden group">
                    <img src="{{ asset('images/logo-mahaputra.jpg') }}" alt="Logo SMK Mahaputra" class="rounded-[1.5rem] w-full h-[450px] object-contain transition-transform duration-1000 group-hover:scale-105 p-8">
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4 max-w-[240px]">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Terakreditasi A</p>
                            <p class="text-xs text-gray-500">Unggul & Kompeten</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Grid -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="p-6 rounded-3xl bg-blue-50 border border-blue-100 text-center transition-all group">
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-5 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-[#0F172A] mb-2">1,200+</h3>
                <p class="text-gray-500 font-medium">Siswa Aktif</p>
            </div>
            <div class="p-6 rounded-3xl bg-indigo-50 border border-indigo-100 text-center transition-all group">
                <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 mx-auto mb-5 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-[#0F172A] mb-2">98%</h3>
                <p class="text-gray-500 font-medium">Lulusan Bekerja</p>
            </div>
            <div class="p-6 rounded-3xl bg-orange-50 border border-orange-100 text-center transition-all group">
                <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-orange-600 mx-auto mb-5 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-[#0F172A] mb-2">50+</h3>
                <p class="text-gray-500 font-medium">Mitra Industri</p>
            </div>
            <div class="p-6 rounded-3xl bg-purple-50 border border-purple-100 text-center transition-all group">
                <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-600 mx-auto mb-5 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-[#0F172A] mb-2">24</h3>
                <p class="text-gray-500 font-medium">Program Extra</p>
            </div>
        </div>
    </div>
</section>

<!-- Principal Welcome -->
<section class="py-16 bg-gray-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div class="relative">
                <div class="aspect-square rounded-[3rem] overflow-hidden shadow-2xl bg-white border-8 border-white p-4">
                    <img src="{{ asset('images/kepala-sekolah.png') }}" alt="Kepala Sekolah" class="w-full h-full object-contain">
                </div>
                <div class="absolute -bottom-10 -right-10 bg-white p-8 rounded-3xl shadow-xl border border-gray-100 hidden md:block max-w-[320px]">
                    <p class="text-blue-600 font-bold mb-2">Atas penugasan jabatan</p>
                    <p class="text-gray-900 font-bold text-lg mb-1">Kepala Sekolah</p>
                    <p class="text-gray-500 text-sm">SMKS Mahaputra Cerdas Utama</p>
                </div>
            </div>
            <div class="space-y-8">
                <div class="space-y-2">
                    <p class="text-blue-600 font-bold tracking-wider uppercase text-xs">Sambutan Pimpinan</p>
                    <h2 class="text-3xl lg:text-4xl font-bold text-[#0F172A]">Sambutan Kepala Sekolah</h2>
                </div>
                <div class="prose prose-lg text-gray-600 leading-relaxed">
                    <p>
                        Selamat datang di SMK Mahaputra Cerdas Utama! Sekolah ini bukan sekadar tempat menuntut ilmu, tetapi ruang bagi setiap individu untuk tumbuh dan berkolaborasi dalam mencapai misi yang luar biasa. Kami mengajak Bapak/Ibu semua untuk menjadi inspirasi bagi sesama, menciptakan lingkungan belajar yang mendukung, inovatif, dan penuh semangat bagi seluruh siswa kita semua.
                    </p>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-[#0F172A]">Siti Robiah Adawiyah, S.Pd</h4>
                    <p class="text-blue-600 font-semibold tracking-wide mt-1 uppercase text-xs">Kepala Sekolah</p>
                </div>
                <div class="flex gap-4">
                    <a href="#" class="inline-flex items-center gap-2 text-blue-600 font-bold transition-all">
                        Baca Selengkapnya
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Programs -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <h2 class="text-3xl lg:text-4xl font-bold text-[#0F172A]">Program Keahlian Unggulan</h2>
            <p class="text-base text-gray-500">Pilih program keahlian yang paling sesuai dengan passion dan impian karirmu di masa depan.</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-10">
            <!-- DKV -->
            <div class="group relative bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden transition-all duration-500">
                <div class="aspect-video relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1000" alt="DKV" class="w-full h-full object-cover transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex items-center gap-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-white font-bold text-lg">Kreatif</span>
                    </div>
                </div>
                <div class="p-8 space-y-6">
                    <h3 class="text-2xl font-bold text-[#0F172A]">Desain Komunikasi Visual (DKV)</h3>
                    <p class="text-gray-500 text-base leading-relaxed">
                        Fokus pada pengembangan kreativitas dalam menyampaikan pesan visual melalui desain grafis, fotografi, videografi, dan ilustrasi digital.
                    </p>
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('jurusan.dkv') }}" class="text-blue-600 font-bold text-lg hover:underline transition-all">Lihat Detail Program</a>
                        <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PPLG -->
            <div class="group relative bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden transition-all duration-500">
                <div class="aspect-video relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=1000" alt="PPLG" class="w-full h-full object-cover transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex items-center gap-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <span class="text-white font-bold text-lg">Teknologi</span>
                    </div>
                </div>
                <div class="p-8 space-y-6">
                    <h3 class="text-2xl font-bold text-[#0F172A]">PPLG & Gim</h3>
                    <p class="text-gray-500 text-base leading-relaxed">
                        Ciri khas lulusan kami adalah cerdas secara logika dan memiliki kemampuan IT yang kuat dalam pengembangan perangkat lunak maupun pengembangan gim.
                    </p>
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('jurusan.pplg') }}" class="text-blue-600 font-bold text-lg hover:underline transition-all">Lihat Detail Program</a>
                        <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
            <div class="space-y-3 max-w-2xl">
                <h2 class="text-3xl lg:text-4xl font-bold text-[#0F172A]">Fasilitas Standar Industri</h2>
                <p class="text-base text-gray-500 leading-relaxed">Kami menyediakan ekosistem pembelajaran yang dirancang khusus untuk mengasah kreativitas dan keterampilan teknis siswa sesuai kebutuhan dunia kerja masa kini.</p>
            </div>
            <a href="{{ route('facilities') }}" class="px-8 py-4 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-all">Lihat Semua Fasilitas</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group relative aspect-[4/5] rounded-[2rem] overflow-hidden shadow-lg">
                <img src="{{ asset('images/fasilitas/lab dkv.png') }}" alt="Lab DKV" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Lab DKV</h4>
                </div>
            </div>
            <div class="group relative aspect-[4/5] rounded-[2rem] overflow-hidden shadow-lg">
                <img src="{{ asset('images/fasilitas/lab pplg.png') }}" alt="Lab PPLG" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Lab PPLG</h4>
                </div>
            </div>
            <div class="group relative aspect-[4/5] rounded-[2rem] overflow-hidden shadow-lg">
                <img src="{{ asset('images/fasilitas/parkiran.png') }}" alt="Parkiran" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Parkiran</h4>
                </div>
            </div>
            <div class="group relative aspect-[4/5] rounded-[2rem] overflow-hidden shadow-lg">
                <img src="{{ asset('images/fasilitas/bale mahaputra.png') }}" alt="Aula" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Bale Mahaputra</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <h2 class="text-3xl lg:text-4xl font-bold text-[#0F172A]">Kabar Terbaru Mahaputra</h2>
            <p class="text-base text-gray-500">Ikuti perkembangan terbaru mengenai prestasi siswa dan kegiatan akademik kami.</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="group">
                <div class="aspect-video rounded-3xl overflow-hidden mb-6">
                    <img src="https://smksmahaputra.sch.id/storage/images/berita/siswa-pplg-smk-mahaputra-meraih-prestasi_thumb.jpg" alt="Berita 1" class="w-full h-full object-cover transition-transform duration-500">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full font-bold">Prestasi</span>
                        <span>12 Okt 2023</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors">Siswa PPLG SMK Mahaputra Meraih Prestasi...</h3>
                    <p class="text-gray-500 line-clamp-2">Prestasi membanggakan kembali diukir oleh siswa jurusan Pengembangan Perangkat Luna...</p>
                    <a href="{{ route('news') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold">Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
                </div>
            </div>
            
            <div class="group">
                <div class="aspect-video rounded-3xl overflow-hidden mb-6">
                    <img src="https://smksmahaputra.sch.id/storage/images/berita/seminar-industri-menyiapkan-karir-di-era-digital_thumb.jpg" alt="Berita 2" class="w-full h-full object-cover transition-transform duration-500">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full font-bold">Kegiatan</span>
                        <span>10 Okt 2023</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors">Seminar Industri: Menyiapkan Karir di Era...</h3>
                    <p class="text-gray-500 line-clamp-2">Mendatangkan praktisi dari perusahaan IT ternama untuk berbagi insight mengenai tren...</p>
                    <a href="{{ route('news') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold">Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
                </div>
            </div>

            <div class="group">
                <div class="aspect-video rounded-3xl overflow-hidden mb-6">
                    <img src="https://smksmahaputra.sch.id/storage/images/berita/pameran-karya-siswa-akhir-tahun_thumb.jpg" alt="Berita 3" class="w-full h-full object-cover transition-transform duration-500">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full font-bold">Akademik</span>
                        <span>08 Okt 2023</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors">Pameran Karya Siswa Akhir Tahun Mahaputra...</h3>
                    <p class="text-gray-500 line-clamp-2">Menampilkan karya-karya terbaik siswa dari berbagai program keahlian sebagai bentuk...</p>
                    <a href="{{ route('news') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold">Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
                </div>
            </div>
        </div>

        <div class="mt-16 text-center">
            <a href="{{ route('news') }}" class="inline-flex items-center gap-2 text-gray-600 font-bold hover:text-blue-600 transition-all underline">Lihat Semua Berita & Artikel</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
    <div class="relative bg-[#0F172A] rounded-[3rem] p-10 lg:p-16 overflow-hidden shadow-2xl">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/10 blur-3xl rounded-full"></div>
        <div class="absolute bottom-0 left-0 w-1/3 h-full bg-indigo-600/10 blur-3xl rounded-full"></div>
        
        <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                    Siap Bergabung Menjadi Bagian dari Masa Depan?
                </h2>
                <p class="text-lg text-gray-400 leading-relaxed">
                    Pendaftaran siswa baru tahun ajaran 2024/2025 telah dibuka. Segera amankan kursimu di jurusan impian dan mulai langkah besarmu hari ini.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('registration') }}" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold text-lg hover:bg-blue-700 hover:shadow-xl hover:shadow-blue-900 transition-all uppercase">Daftar Sekarang</a>
                    <a href="{{ route('contact') }}" class="px-8 py-4 bg-white/5 border border-white/10 text-white rounded-2xl font-bold text-lg hover:bg-white/10 transition-all uppercase">Hubungi Kami</a>
                </div>
            </div>
            <div class="lg:flex justify-end hidden">
                <div class="space-y-6">
                    <div class="flex items-center gap-6 bg-white/5 p-6 rounded-2xl border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-500 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center font-bold text-white shadow-lg shadow-blue-500/50">1</div>
                        <div>
                            <p class="text-white font-bold text-lg">Isi Formulir Online</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-6 bg-white/5 p-6 rounded-2xl border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-500 translate-x-4 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center font-bold text-white shadow-lg shadow-blue-500/50">2</div>
                        <div>
                            <p class="text-white font-bold text-lg">Verifikasi Dokumen</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-6 bg-white/5 p-6 rounded-2xl border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-500 translate-x-8 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center font-bold text-white shadow-lg shadow-blue-500/50">3</div>
                        <div>
                            <p class="text-white font-bold text-lg">Seleksi & Wawancara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
