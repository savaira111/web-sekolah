@extends('layouts.app')

@section('title', 'Panahan (Archery) - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-start pt-16 lg:pt-20 overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/extracurriculars/thumbs/archery.png') }}" alt="Hero" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#0F172A]/80 backdrop-blur-sm"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="space-y-6 max-w-4xl">
            <span class="inline-block px-4 py-1.5 bg-blue-600 text-white text-[10px] font-bold rounded-lg uppercase tracking-wider">Olahraga</span>
            
            <div class="flex items-center gap-6">
                <a href="{{ route('extracurriculars.index') }}" class="inline-flex items-center justify-center w-12 h-12 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-full hover:bg-white/30 transition-all shadow-lg shrink-0" title="Kembali">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-5xl lg:text-7xl font-black text-white leading-tight">
                    Panahan <span class="text-blue-500">(Archery)</span>
                </h1>
            </div>
                    <p class="text-xl text-gray-300 max-w-3xl leading-relaxed font-medium">
                        Melatih fokus dan presisi melalui teknik memanah tradisional maupun modern bagi seluruh siswa.
                    </p>
            </div>

            <div class="flex flex-wrap gap-4 pt-10">
                <a href="{{ route('extracurriculars.registration') }}" class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-black text-xl shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all uppercase">
                    Gabung Sekarang
                </a>
                <a href="https://wa.me/6282260337300?text=Halo%20Admin%2C%20saya%20ingin%20tanya%20seputar%20ekstrakurikuler%20Panahan" target="_blank" class="px-10 py-5 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-2xl font-black text-xl hover:bg-white/20 transition-all uppercase flex items-center gap-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.996-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.224-3.82l.303.18c1.397.83 3.009 1.269 4.655 1.269l.006.001c5.236 0 9.503-4.265 9.505-9.501.002-2.538-.99-4.923-2.791-6.726s-4.188-2.793-6.722-2.793c-5.238 0-9.503 4.267-9.506 9.505-.001 1.714.463 3.391 1.341 4.866l.197.33-1.003 3.666 3.755-.986zm11.455-6.533c-.301-.15-1.777-.878-2.053-.977-.275-.099-.475-.15-.675.15-.199.301-.776.977-.951 1.178-.175.199-.35.226-.65.075-.3-.15-1.265-.466-2.411-1.487-.893-.797-1.493-1.782-1.67-2.083-.175-.301-.018-.464.133-.613.135-.133.301-.35.45-.526.15-.175.199-.301.301-.502.1-.199.05-.376-.026-.526-.075-.15-.675-1.628-.925-2.23-.244-.582-.493-.504-.675-.513-.175-.01-.375-.011-.575-.011s-.525.075-.8.376c-.275.301-1.05 1.026-1.05 2.507 0 1.481 1.075 2.909 1.225 3.109.15.199 2.113 3.227 5.122 4.526.716.309 1.274.494 1.708.632.716.228 1.369.196 1.885.118.574-.087 1.777-.726 2.028-1.43.25-.702.25-1.305.175-1.43-.075-.124-.275-.199-.576-.349z"/></svg>
                    Hubungi Admin
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-16">
            
            <!-- Left Side: Information -->
            <div class="lg:col-span-8 space-y-12">
                
                <!-- About & Stats -->
                <div class="space-y-12">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                            <h2 class="text-3xl font-black text-[#0F172A]">Tentang Panahan</h2>
                        </div>
                        <p class="text-base text-gray-500 leading-relaxed">
                            Panahan SMKS Mahaputra Cerdas Utama merupakan wadah pembinaan generasi muda untuk mengembangkan potensi, bakat, dan semangat positif. Anggota dilatih untuk memiliki karakter unggul, kedisiplinan, dan etika yang baik serta berprestasi dalam berbagai kegiatan.
                        </p>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-4 group transition-all duration-500">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Anggota Aktif</p>
                                <p class="text-2xl font-black text-[#0F172A] tracking-tight">30 Siswa</p>
                            </div>
                        </div>
                        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-4 group transition-all duration-500">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Penghargaan</p>
                                <p class="text-2xl font-black text-[#0F172A] tracking-tight">10+ Trophy</p>
                            </div>
                        </div>
                        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-4 group transition-all duration-500">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Berdiri</p>
                                <p class="text-2xl font-black text-[#0F172A] tracking-tight">Sejak 2015</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirements -->
                 <div class="space-y-12">
                     <div class="flex items-center gap-4">
                        <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                        <h2 class="text-3xl font-black text-[#0F172A]">Syarat Masuk & Seleksi</h2>
                    </div>
                    <div class="space-y-8">
                        <div class="flex gap-8 group">
                            <div class="w-12 h-12 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-center text-lg font-black text-blue-600 shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">1</div>
                            <div class="space-y-2">
                                <h4 class="text-lg font-bold text-[#0F172A]">Fokus & Ketelitian</h4>
                                <p class="text-sm text-gray-500">Memiliki tingkat konsentrasi dan kefokusan yang tinggi, serta ketelitian yang mumpuni dalam setiap proses latihan memanah.</p>
                            </div>
                        </div>
                        <div class="flex gap-8 group">
                            <div class="w-12 h-12 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-center text-lg font-black text-blue-600 shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">2</div>
                            <div class="space-y-2">
                                <h4 class="text-lg font-bold text-[#0F172A]">Kesehatan & Postur</h4>
                                <p class="text-sm text-gray-500">Memiliki postur tubuh yang baik dan kesehatan fisik yang stabil untuk mendukung keakuratan saat menarik busur panah.</p>
                            </div>
                        </div>
                        <div class="flex gap-8 group">
                            <div class="w-12 h-12 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-center text-lg font-black text-blue-600 shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">3</div>
                            <div class="space-y-2">
                                <h4 class="text-lg font-bold text-[#0F172A]">Integritas & Akademik</h4>
                                <p class="text-sm text-gray-500">Menunjukkan perilaku yang baik di sekolah, rata-rata nilai akademik memenuhi standar, serta mendapat izin tertulis dari orang tua.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Schedule -->
                <div class="space-y-12">
                     <div class="flex items-center gap-4">
                        <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                        <h2 class="text-3xl font-black text-[#0F172A]">Jadwal Latihan Rutin</h2>
                    </div>
                    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100">
                                    <th class="px-8 py-6 text-xs font-black text-gray-400 uppercase tracking-widest">Hari</th>
                                    <th class="px-8 py-6 text-xs font-black text-gray-400 uppercase tracking-widest">Waktu</th>
                                    <th class="px-8 py-6 text-xs font-black text-gray-400 uppercase tracking-widest">Materi Latihan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr class="hover:bg-blue-50/30 transition-colors">
                                    <td class="px-8 py-6 font-bold text-[#0F172A]">Sabtu</td>
                                    <td class="px-8 py-6 text-gray-500">08:00 - 11:00</td>
                                    <td class="px-8 py-6 text-gray-500 font-bold">Teknik Dasar & Latihan Fokus</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Gallery -->
                <div class="space-y-12">
                    <div class="flex items-center gap-4">
                        <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                        <h2 class="text-4xl font-black text-[#0F172A]">Galeri Kegiatan</h2>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="aspect-square rounded-[1.5rem] overflow-hidden group cursor-pointer border border-gray-100 shadow-sm relative">
                            <img src="{{ asset('images/extracurriculars/panahan/panahan_1.png') }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                            <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        <div class="aspect-square rounded-[1.5rem] overflow-hidden group cursor-pointer border border-gray-100 shadow-sm relative">
                            <img src="{{ asset('images/extracurriculars/thumbs/archery.png') }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                            <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        <div class="aspect-square rounded-[1.5rem] overflow-hidden group cursor-pointer border border-gray-100 shadow-sm relative">
                            <img src="{{ asset('images/extracurriculars/panahan/card 3.jpg') }}" class="w-full h-full object-cover transition-transform duration-700">
                            <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        <div class="aspect-square rounded-[1.5rem] overflow-hidden group cursor-pointer border border-gray-100 shadow-sm relative">
                            <img src="{{ asset('images/extracurriculars/panahan/card 4.jpg') }}" class="w-full h-full object-cover transition-transform duration-700">
                            <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        <div class="aspect-square rounded-[1.5rem] overflow-hidden group cursor-pointer border border-gray-100 shadow-sm relative">
                            <img src="{{ asset('images/extracurriculars/panahan/card 5.jpg') }}" class="w-full h-full object-cover transition-transform duration-700">
                            <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        <div class="aspect-square rounded-[1.5rem] overflow-hidden group cursor-pointer border border-gray-100 shadow-sm relative">
                            <img src="{{ asset('images/extracurriculars/panahan/card 6.jpg') }}" class="w-full h-full object-cover transition-transform duration-700">
                            <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Achievements -->
                <div class="space-y-12 pb-12">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                            <h2 class="text-3xl font-black text-[#0F172A]">Jelajahi Prestasi</h2>
                        </div>
                        <a href="{{ route('news') }}" class="text-blue-600 font-bold hover:underline text-sm">Lihat Semua Berita</a>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="group space-y-4">
                            <div class="aspect-[4/3] rounded-[2rem] overflow-hidden shadow-lg border border-gray-100">
                                <img src="{{ asset('images/extracurriculars/panahan/panahan_1.png') }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-4 text-[10px] font-bold text-gray-400 uppercase">
                                    <span>24 Okt 2023</span>
                                    <span>•</span>
                                    <span>5 Min Read</span>
                                </div>
                                <h3 class="text-lg font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors leading-snug">Prestasi Gemilang Panahan Tingkat Provinsi</h3>
                                <div class="flex items-center gap-3 pt-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08c-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                                    </div>
                                    <span class="text-xs font-bold text-gray-500">Admin Mahaputra</span>
                                </div>
                            </div>
                        </div>
                        <div class="group space-y-4">
                            <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-lg border border-gray-100">
                                <img src="{{ asset('images/extracurriculars/thumbs/archery.png') }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-4 text-[10px] font-bold text-gray-400 uppercase">
                                    <span>15 Sep 2023</span>
                                    <span>•</span>
                                    <span>3 Min Read</span>
                                </div>
                                <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors leading-snug">Agenda Tahunan & Pelatihan Anggota Baru Panahan</h3>
                                <div class="flex items-center gap-3 pt-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08c-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                                    </div>
                                    <span class="text-xs font-bold text-gray-500">Admin Mahaputra</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side: Sidebar -->
            <div class="lg:col-span-4 space-y-8">
                
                <!-- Registration CTA Card -->
                <div class="bg-blue-600 rounded-[2rem] py-12 px-8 text-center space-y-8 shadow-2xl shadow-blue-500/20 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 blur-3xl rounded-full translate-x-12 -translate-y-12"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 blur-2xl rounded-full -translate-x-12 translate-y-12"></div>
                    
                    <div class="relative z-10 space-y-3">
                        <h4 class="text-2xl font-black text-white leading-tight uppercase">Siap Bergabung?</h4>
                        <p class="text-xs text-blue-100">Jadilah bagian dari pasukan elit sekolah. Pendaftaran gelombang baru sedang dibuka sekarang!</p>
                    </div>

                    <div class="relative z-10 p-6 bg-white/10 backdrop-blur-md rounded-[2rem] border border-white/20">
                        <a href="{{ route('extracurriculars.registration') }}" class="block w-full py-4 bg-white text-blue-600 rounded-2xl font-black text-base uppercase shadow-xl transition-all">
                            Daftar Sekarang
                        </a>
                        <p class="text-[10px] text-blue-100 font-bold mt-4 uppercase tracking-widest">Berlaku Sejak 12-03-2024</p>
                    </div>
                </div>

                <!-- Staff/Coaches -->
                <div class="bg-white rounded-[2rem] border border-gray-100 p-8 space-y-6 shadow-sm">
                    <h4 class="text-xl font-bold text-[#0F172A] border-l-4 border-blue-600 pl-4">Pembimbing & Ketua</h4>
                    <div class="space-y-6">
                        <div class="flex items-center gap-6 group">
                            <div class="relative">
                                <img src="{{ asset('images/Sample_User_Icon.png') }}" class="w-16 h-16 rounded-2xl object-cover shadow-lg transition-transform duration-500">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div class="space-y-1">
                                <p class="font-bold text-[#0F172A]">Pak Ahmad Setiawan</p>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pembina Utama</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group">
                            <div class="relative">
                                <img src="{{ asset('images/Sample_User_Icon.png') }}" class="w-16 h-16 rounded-2xl object-cover shadow-lg transition-transform duration-500">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div class="space-y-1">
                                <p class="font-bold text-[#0F172A]">Siswa Terpilih</p>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Ketua Panahan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Map -->
                <div class="bg-white rounded-[2rem] border border-gray-100 p-8 space-y-6 shadow-sm">
                    <div class="space-y-1">
                        <h4 class="text-lg font-bold text-[#0F172A] leading-tight">Lokasi Latihan</h4>
                        <p class="text-[10px] text-gray-400">Kampus A SMK Mahaputra Cerdas Utama</p>
                    </div>
                    <div class="relative aspect-square rounded-[2rem] overflow-hidden border border-gray-100 group">
                        <img src="https://www.google.com/maps/vt/pb=!1m4!1m3!1i15!2i26214!3i12288!2m3!1e0!2sm!3i388172593!3m8!2sen!2sus!5e1105!12m4!1e68!2m2!1sset!2sRoadmap!4e0!5m1!1f2!23i1301875" class="w-full h-full object-cover transition-transform duration-1000">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2 pt-2">
                        <p class="text-sm font-bold text-[#0F172A]">Lapangan Upacara Utama</p>
                        <p class="text-[10px] text-gray-500 leading-relaxed">Gedung A, Lt.1, Jl. Raya Cilampeni No.19, Katapang, Kabupaten Bandung.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Footer Overlay CTA (Optional matching UI) -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-[#0F172A] rounded-[2.5rem] p-12 lg:p-16 overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/10 blur-3xl rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-1/3 h-full bg-indigo-600/10 blur-3xl rounded-full"></div>
            
            <div class="relative z-10 text-center space-y-8">
                <h2 class="text-4xl lg:text-5xl font-black text-white leading-tight">
                    Mulai Langkahmu <br>
                    <span class="text-blue-500">Bersama Kami!</span>
                </h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Bergabunglah dengan organisasi yang akan merubah masa depanmu menjadi lebih disiplin dan kompeten.
                </p>
                <div class="flex justify-center pt-8">
                     <a href="{{ route('extracurriculars.registration') }}" class="px-12 py-4 bg-blue-600 text-white rounded-2xl font-black text-lg uppercase shadow-xl shadow-blue-900 transition-all hover:bg-blue-700">
                        Daftar Panahan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
