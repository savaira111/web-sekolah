@extends('layouts.app')

@section('title', 'Paskibra (Pasukan Pengibar Bendera) - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative h-[600px] flex items-center overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://smksmahaputra.sch.id/storage/images/berita/paskibra-mahaputra-meraih-juara-umum-lkbb-tingkat-jawa-barat_thumb.jpg" alt="Paskibra Hero" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#0F172A]/80 backdrop-blur-sm"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="mb-8">
            <a href="{{ route('extracurriculars') }}" class="inline-flex items-center justify-center w-12 h-12 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-full hover:bg-white/30 transition-all shadow-lg" title="Kembali">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </a>
        </div>
        <div class="space-y-8 max-w-4xl">
            <div class="space-y-4">
                <span class="inline-block px-4 py-1.5 bg-blue-600 text-white text-[10px] font-bold rounded-lg uppercase tracking-wider">Official Organization</span>
                <h1 class="text-6xl lg:text-8xl font-black text-white leading-tight">
                    Paskibra (Pasukan <br>
                    <span class="text-blue-500">Pengibar Bendera)</span>
                </h1>
                <p class="text-xl text-gray-300 max-w-2xl leading-relaxed">
                    Menumbuhkan jiwa kepemimpinan, kedisiplinan, dan rasa nasionalisme tinggi melalui formasi baris-berbaris yang presisi.
                </p>
            </div>

            <div class="flex flex-wrap gap-4 pt-4">
                <a href="{{ route('registration') }}" class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-black text-xl shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all uppercase">
                    Gabung Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-16">
            
            <!-- Left Side: Information -->
            <div class="lg:col-span-8 space-y-20">
                
                <!-- About & Stats -->
                <div class="space-y-12">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                            <h2 class="text-4xl font-black text-[#0F172A]">Tentang Paskibra</h2>
                        </div>
                        <p class="text-lg text-gray-500 leading-relaxed">
                            Paskibra SMKS Mahaputra Cerdas Utama merupakan wadah pembinaan generasi muda untuk meningkatkan kedisiplinan, ketangkasan fisik, serta rasa cinta tanah air. Anggota dilatih untuk memiliki ketahanan fisik yang kuat, mental baja, dan etika yang luhur dalam menjalankan tugas negara di tingkat sekolah maupun wilayah.
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
                                <p class="text-3xl font-black text-[#0F172A] tracking-tight">45 Siswa</p>
                            </div>
                        </div>
                        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-4 group transition-all duration-500">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Penghargaan</p>
                                <p class="text-3xl font-black text-[#0F172A] tracking-tight">25+ Trophy</p>
                            </div>
                        </div>
                        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-4 group transition-all duration-500">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Berdiri</p>
                                <p class="text-3xl font-black text-[#0F172A] tracking-tight">Sejak 2010</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirements -->
                 <div class="space-y-12">
                     <div class="flex items-center gap-4">
                        <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                        <h2 class="text-4xl font-black text-[#0F172A]">Syarat Masuk & Seleksi</h2>
                    </div>
                    <div class="space-y-8">
                        <div class="flex gap-8 group">
                            <div class="w-14 h-14 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-center text-xl font-black text-blue-600 shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">1</div>
                            <div class="space-y-2">
                                <h4 class="text-xl font-bold text-[#0F172A]">Kriteria Fisik Utama</h4>
                                <p class="text-gray-500">Tinggi minimal 170cm (Putra) dan 165cm (Putri) dengan berat badan proporsional. Tidak berkacamata tebal dan memiliki postur tubuh yang tegak.</p>
                            </div>
                        </div>
                        <div class="flex gap-8 group">
                            <div class="w-14 h-14 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-center text-xl font-black text-blue-600 shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">2</div>
                            <div class="space-y-2">
                                <h4 class="text-xl font-bold text-[#0F172A]">Kesehatan & Stamina</h4>
                                <p class="text-gray-500">Lulus tes kesehatan fisik, tidak memiliki riwayat penyakit asma atau jantung kronis, serta memiliki stamina untuk latihan fisik intensif.</p>
                            </div>
                        </div>
                        <div class="flex gap-8 group">
                            <div class="w-14 h-14 bg-white border border-gray-100 rounded-2xl shadow-sm flex items-center justify-center text-xl font-black text-blue-600 shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">3</div>
                            <div class="space-y-2">
                                <h4 class="text-xl font-bold text-[#0F172A]">Integritas & Akademik</h4>
                                <p class="text-gray-500">Menunjukkan perilaku yang baik di sekolah, rata-rata nilai akademik memenuhi standar, serta mendapat izin tertulis dari orang tua.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Schedule -->
                <div class="space-y-12">
                     <div class="flex items-center gap-4">
                        <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                        <h2 class="text-4xl font-black text-[#0F172A]">Jadwal Latihan Rutin</h2>
                    </div>
                    <div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100">
                                    <th class="px-8 py-6 text-sm font-black text-gray-400 uppercase tracking-widest">Hari</th>
                                    <th class="px-8 py-6 text-sm font-black text-gray-400 uppercase tracking-widest">Waktu</th>
                                    <th class="px-8 py-6 text-sm font-black text-gray-400 uppercase tracking-widest">Materi Latihan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr class="hover:bg-blue-50/30 transition-colors">
                                    <td class="px-8 py-6 font-bold text-[#0F172A]">Selasa</td>
                                    <td class="px-8 py-6 text-gray-500">15:30 - 17:30</td>
                                    <td class="px-8 py-6 text-gray-500 font-bold">PBB Dasar & Fisik</td>
                                </tr>
                                <tr class="hover:bg-blue-50/30 transition-colors">
                                    <td class="px-8 py-6 font-bold text-[#0F172A]">Kamis</td>
                                    <td class="px-8 py-6 text-gray-500">15:30 - 17:30</td>
                                    <td class="px-8 py-6 text-gray-500 font-bold">Variasi & Formasi</td>
                                </tr>
                                <tr class="hover:bg-blue-50/30 transition-colors">
                                    <td class="px-8 py-6 font-bold text-[#0F172A]">Sabtu</td>
                                    <td class="px-8 py-6 text-gray-500">08:00 - 12:00</td>
                                    <td class="px-8 py-6 text-gray-500 font-bold">Pemantapan & Simulasi</td>
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
                        @for ($i = 1; $i <= 6; $i++)
                        <div class="aspect-square rounded-[2.5rem] overflow-hidden group cursor-pointer border border-gray-100 shadow-sm relative">
                            <img src="https://smksmahaputra.sch.id/storage/images/berita/paskibra-mahaputra-meraih-juara-umum-lkbb-tingkat-jawa-barat_thumb.jpg" class="w-full h-full object-cover transition-transform duration-700">
                            <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Achievements -->
                <div class="space-y-12 pb-12">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-10 bg-blue-600 rounded-full"></div>
                            <h2 class="text-4xl font-black text-[#0F172A]">Jelajahi Prestasi</h2>
                        </div>
                        <a href="{{ route('news') }}" class="text-blue-600 font-bold hover:underline text-sm">Lihat Semua Berita</a>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="group space-y-4">
                            <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-lg border border-gray-100">
                                <img src="https://smksmahaputra.sch.id/storage/images/berita/paskibra-mahaputra-meraih-juara-umum-lkbb-tingkat-jawa-barat_thumb.jpg" class="w-full h-full object-cover transition-transform duration-500">
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-4 text-[10px] font-bold text-gray-400 uppercase">
                                    <span>24 Okt 2023</span>
                                    <span>•</span>
                                    <span>5 Min Read</span>
                                </div>
                                <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors leading-snug">Juara 1 Lomba Ketangkasan Baris Berbaris Tingkat Provinsi</h3>
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
                                <img src="https://smksmahaputra.sch.id/storage/images/berita/paskibra-mahaputra-meraih-juara-umum-lkbb-tingkat-jawa-barat_thumb.jpg" class="w-full h-full object-cover transition-transform duration-500">
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-4 text-[10px] font-bold text-gray-400 uppercase">
                                    <span>15 Sep 2023</span>
                                    <span>•</span>
                                    <span>3 Min Read</span>
                                </div>
                                <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors leading-snug">Pelatihan Kepemimpinan Anggota Baru Paskibra Tahun 2023</h3>
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
                <div class="bg-blue-600 rounded-[3rem] p-10 text-center space-y-8 shadow-2xl shadow-blue-500/20 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 blur-3xl rounded-full translate-x-12 -translate-y-12"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 blur-2xl rounded-full -translate-x-12 translate-y-12"></div>
                    
                    <div class="relative z-10 space-y-4">
                        <h4 class="text-3xl font-black text-white leading-tight uppercase">Siap Bergabung?</h4>
                        <p class="text-sm text-blue-100">Jadilah bagian dari pasukan elit sekolah. Pendaftaran gelombang baru sedang dibuka sekarang!</p>
                    </div>

                    <div class="relative z-10 p-6 bg-white/10 backdrop-blur-md rounded-[2rem] border border-white/20">
                        <a href="{{ route('registration') }}" class="block w-full py-5 bg-white text-blue-600 rounded-2xl font-black text-lg uppercase shadow-xl transition-all">
                            Daftar Sekarang
                        </a>
                        <p class="text-[10px] text-blue-100 font-bold mt-4 uppercase tracking-widest">Berlaku Sejak 12-03-2024</p>
                    </div>
                </div>

                <!-- Staff/Coaches -->
                <div class="bg-white rounded-[3rem] border border-gray-100 p-10 space-y-8 shadow-sm">
                    <h4 class="text-xl font-bold text-[#0F172A] border-l-4 border-blue-600 pl-4">Pembimbing & Ketua</h4>
                    <div class="space-y-6">
                        <div class="flex items-center gap-6 group">
                            <div class="relative">
                                <img src="https://static.republika.co.id/uploads/images/inpicture_slide/pemanah-anak-ilustrasi-_181023155823-145.jpg" class="w-16 h-16 rounded-2xl object-cover shadow-lg transition-transform duration-500">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div class="space-y-1">
                                <p class="font-bold text-[#0F172A]">Pak Ahmad Setiawan</p>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pembina Utama</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group">
                            <div class="relative">
                                <img src="https://static.republika.co.id/uploads/images/inpicture_slide/pemanah-anak-ilustrasi-_181023155823-145.jpg" class="w-16 h-16 rounded-2xl object-cover shadow-lg transition-transform duration-500">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div class="space-y-1">
                                <p class="font-bold text-[#0F172A]">Rina Rahayu</p>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Ketua Paskibra</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Map -->
                <div class="bg-white rounded-[3rem] border border-gray-100 p-10 space-y-6 shadow-sm">
                    <div class="space-y-1">
                        <h4 class="text-xl font-bold text-[#0F172A] leading-tight">Lokasi Latihan</h4>
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
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-[#0F172A] rounded-[4rem] p-12 lg:p-24 overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/10 blur-3xl rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-1/3 h-full bg-indigo-600/10 blur-3xl rounded-full"></div>
            
            <div class="relative z-10 text-center space-y-8">
                <h2 class="text-5xl lg:text-7xl font-black text-white leading-tight">
                    Mulai Langkahmu <br>
                    <span class="text-blue-500">Bersama Kami!</span>
                </h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                    Bergabunglah dengan organisasi yang akan merubah masa depanmu menjadi lebih disiplin dan kompeten.
                </p>
                <div class="flex justify-center pt-8">
                     <a href="{{ route('registration') }}" class="px-16 py-6 bg-blue-600 text-white rounded-2xl font-black text-2xl uppercase shadow-xl shadow-blue-900 transition-all hover:bg-blue-700">
                        Daftar Paskibra
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
