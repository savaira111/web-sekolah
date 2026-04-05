<?php $__env->startSection('title', 'Beranda - SMKS Mahaputra Cerdas Utama'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative overflow-hidden pt-4 pb-16 lg:pt-6 lg:pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
            <div class="space-y-4">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Pendaftaran Siswa Baru T.A 2026/2027
                </div>
                <h1 class="text-2xl lg:text-2xl font-bold text-[#0F172A] leading-tight leading-[1.1]">
                    Membangun Masa Depan <br>
                    <span class="text-blue-600 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Digital & Kreatif</span>
                </h1>
                <p class="text-base text-gray-600 max-w-xl leading-relaxed">
                    SMKS Mahaputra Cerdas Utama menghadirkan kurikulum yang diselaraskan dengan kebutuhan industri masa kini. Pilih jurusan yang sesuai dengan minat bakatmu dan jadilah tenaga ahli profesional.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo e(route('registration')); ?>" class="px-6 py-3.5 bg-blue-600 text-white rounded-xl font-bold text-base hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-200 transition-all">Daftar Sekarang</a>
                    <a href="<?php echo e(route('profile')); ?>" class="px-6 py-3.5 bg-white text-gray-700 border border-gray-200 rounded-xl font-bold text-base hover:bg-gray-50 transition-all flex items-center gap-2">Profil Sekolah</a>
                </div>
                
                <div class="flex items-center gap-8 pt-4">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-[#0F172A]">200+</span>
                        <span class="text-gray-500 text-xs">Siswa Aktif</span>
                    </div>
                    <div class="h-10 w-px bg-gray-200"></div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-[#0F172A]">98%</span>
                        <span class="text-gray-500 text-xs">Lulusan Bekerja</span>
                    </div>
                    <div class="h-10 w-px bg-gray-200"></div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-[#0F172A]">20+</span>
                        <span class="text-gray-500 text-xs">Mitra Industri</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-20 -right-20 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-72 h-72 bg-indigo-400/10 rounded-full blur-3xl"></div>
                <div class="relative z-10 bg-white p-3 rounded-[1.5rem] shadow-2xl overflow-hidden group">
                    <img src="<?php echo e(asset('images/logo-mahaputra.jpg')); ?>" alt="Logo SMKS Mahaputra Cerdas Utama" class="rounded-[1.5rem] w-full h-[350px] sm:h-[300px] object-contain transition-transform duration-1000 group-hover:scale-105 p-12">
                </div>
                
                <div class="absolute -bottom-6 -right-6 z-20 bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4 max-w-[240px]">
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
</section>

<!-- Stats Grid -->
<section class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-3 gap-8">
            <div class="p-6 rounded-3xl bg-blue-50 border border-blue-100 text-center transition-all group">
                <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-5 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-2">200+</h3>
                <p class="text-gray-500 font-medium">Siswa Aktif</p>
            </div>
            <div class="p-6 rounded-3xl bg-indigo-50 border border-indigo-100 text-center transition-all group">
                <div class="w-12 h-12 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 mx-auto mb-5 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-2">98%</h3>
                <p class="text-gray-500 font-medium">Lulusan Bekerja</p>
            </div>
            <div class="p-6 rounded-3xl bg-orange-50 border border-orange-100 text-center transition-all group">
                <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center text-orange-600 mx-auto mb-5 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-2">20+</h3>
                <p class="text-gray-500 font-medium">Mitra Industri</p>
            </div>

        </div>
    </div>
</section>

<!-- Principal Welcome -->
<section class="pt-10 pb-24 bg-gray-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 items-center lg:gap-16">
            <div class="relative mx-auto max-w-[350px] lg:max-w-[420px] w-full">
                <div class="aspect-square rounded-[2rem] overflow-hidden shadow-2xl bg-white border-8 border-white p-2">
                    <img src="<?php echo e(asset('images/kepala-sekolah.png')); ?>" alt="Kepala Sekolah" class="w-full h-full object-contain rounded-[1.5rem]">
                </div>
                <div class="absolute -bottom-10 -right-10 bg-white p-6 rounded-3xl shadow-xl border border-gray-100 hidden md:block max-w-[320px]">
                    <p class="text-blue-600 font-bold mb-2">Atas penugasan jabatan</p>
                    <p class="text-gray-900 font-bold text-lg mb-1">Kepala Sekolah</p>
                    <p class="text-gray-500 text-sm">SMKS Mahaputra Cerdas Utama</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="space-y-2">
                    <p class="text-blue-600 font-bold tracking-wider uppercase text-xs">Sambutan Pimpinan</p>
                    <h2 class="text-2xl lg:text-2xl font-bold text-[#0F172A]">Sambutan Kepala Sekolah</h2>
                </div>
                <div class="prose prose-lg text-gray-600 leading-relaxed">
                    <p>
                        Selamat datang di SMKS Mahaputra Cerdas Utama! Sekolah ini bukan sekadar tempat menuntut ilmu, tetapi ruang bagi setiap individu untuk tumbuh dan berkolaborasi dalam mencapai misi yang luar biasa. Kami mengajak Bapak/Ibu semua untuk menjadi inspirasi bagi sesama, menciptakan lingkungan belajar yang mendukung, inovatif, dan penuh semangat bagi seluruh siswa kita semua.
                    </p>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-[#0F172A]">Siti Robiah Adawiyah, S.Pd</h4>
                    <p class="text-blue-600 font-semibold tracking-wide mt-1 uppercase text-xs">Kepala Sekolah</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Programs -->
<section class="pt-16 pb-10 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-8 space-y-3">
            <h2 class="text-2xl lg:text-3xl font-bold text-[#0F172A]">Program Keahlian Unggulan</h2>
            <p class="text-base text-gray-500">Pilih program keahlian yang paling sesuai dengan passion dan impian karirmu di masa depan.</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 lg:gap-16">
            <!-- DKV -->
            <div class="group relative bg-white rounded-[1.5rem] border border-gray-100 overflow-hidden transition-all duration-500">
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
                <div class="p-6 space-y-4">
                    <h3 class="text-2xl font-bold text-[#0F172A]">Desain Komunikasi Visual (DKV)</h3>
                    <p class="text-gray-500 text-base leading-relaxed">
                        Fokus pada pengembangan kreativitas dalam menyampaikan pesan visual melalui desain grafis, fotografi, videografi, dan ilustrasi digital.
                    </p>
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="<?php echo e(route('jurusan.dkv')); ?>" class="text-blue-600 font-bold text-lg hover:underline transition-all">Lihat Detail Program</a>
                        <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PPLG -->
            <div class="group relative bg-white rounded-[1.5rem] border border-gray-100 overflow-hidden transition-all duration-500">
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
                <div class="p-6 space-y-4">
                    <h3 class="text-2xl font-bold text-[#0F172A]">PPLG & Gim</h3>
                    <p class="text-gray-500 text-base leading-relaxed">
                        Ciri khas lulusan kami adalah cerdas secara logika dan memiliki kemampuan IT yang kuat dalam pengembangan perangkat lunak maupun pengembangan gim.
                    </p>
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="<?php echo e(route('jurusan.pplg')); ?>" class="text-blue-600 font-bold text-lg hover:underline transition-all">Lihat Detail Program</a>
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
<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-8">
            <div class="space-y-3 max-w-2xl">
                <h2 class="text-2xl lg:text-2xl font-bold text-[#0F172A]">Fasilitas Standar Industri</h2>
                <p class="text-base text-gray-500 leading-relaxed">Kami menyediakan ekosistem pembelajaran yang dirancang khusus untuk mengasah kreativitas dan keterampilan teknis siswa sesuai kebutuhan dunia kerja masa kini.</p>
            </div>
            <a href="<?php echo e(route('facilities')); ?>" class="px-8 py-4 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-all">Lihat Semua Fasilitas</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group relative aspect-[4/5] rounded-[1.5rem] overflow-hidden shadow-lg">
                <img src="<?php echo e(asset('images/fasilitas/lab dkv.png')); ?>" alt="Lab DKV" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Lab DKV</h4>
                </div>
            </div>
            <div class="group relative aspect-[4/5] rounded-[1.5rem] overflow-hidden shadow-lg">
                <img src="<?php echo e(asset('images/fasilitas/lab pplg.png')); ?>" alt="Lab PPLG" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Lab PPLG</h4>
                </div>
            </div>
            <div class="group relative aspect-[4/5] rounded-[1.5rem] overflow-hidden shadow-lg">
                <img src="<?php echo e(asset('images/fasilitas/parkiran.png')); ?>" alt="Parkiran" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Parkiran</h4>
                </div>
            </div>
            <div class="group relative aspect-[4/5] rounded-[1.5rem] overflow-hidden shadow-lg">
                <img src="<?php echo e(asset('images/fasilitas/bale mahaputra.png')); ?>" alt="Aula" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8">
                    <h4 class="text-xl font-bold text-white mb-2">Bale Mahaputra</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery/Albums -->
<section class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-8">
            <div class="space-y-3 max-w-2xl text-center md:text-left">
                <h2 class="text-2xl lg:text-2xl font-bold text-[#0F172A]">Galeri Kegiatan & Dokumentasi</h2>
                <p class="text-base text-gray-500 leading-relaxed">Melihat kembali momen-momen berharga dan prestasi yang diukir oleh civitas akademika di SMKS Mahaputra Cerdas Utama.</p>
            </div>
            <a href="<?php echo e(route('album')); ?>" class="px-8 py-4 bg-blue-50 text-blue-600 font-bold rounded-xl hover:bg-blue-100 transition-all flex items-center gap-2">
                Lihat Semua Galeri
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group bg-white rounded-[1.5rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col">
                <div class="aspect-[4/3] relative overflow-hidden">
                    <?php
                        $firstPhoto = $album->photos->first();
                        $imagePath = $firstPhoto ? asset('storage/' . $firstPhoto->path) : asset('images/gedung-sekolah.jpg');
                    ?>
                    <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($album->title); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute top-5 right-5">
                        <div class="px-3 py-1.5 bg-blue-600/90 backdrop-blur-sm rounded-lg flex items-center gap-2 text-white shadow-lg">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-[10px] font-black tracking-wider uppercase"><?php echo e($album->photos->count()); ?> Foto</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 text-blue-600 mb-4 px-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-[11px] font-black uppercase tracking-widest text-[#94A3B8]"><?php echo e(\Carbon\Carbon::parse($album->event_date)->translatedFormat('d F Y')); ?></span>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F172A] mb-3 px-1 leading-tight group-hover:text-blue-600 transition-colors"><?php echo e($album->title); ?></h3>
                    <p class="text-gray-400 text-xs px-1 leading-relaxed mb-6"><?php echo e(Str::limit(strip_tags($album->description), 100)); ?></p>
                    <div class="mt-auto">
                        <a href="<?php echo e(route('album.show', $album->id)); ?>" class="inline-flex items-center justify-center gap-2 w-full py-3 px-6 border-2 border-blue-600 rounded-xl text-blue-600 font-bold text-xs hover:bg-blue-600 hover:text-white transition-all duration-300">
                            Lihat Semua Foto
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-8 bg-gray-50 rounded-[1.5rem] border-2 border-dashed border-gray-200">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <p class="text-gray-500 font-bold italic">Belum ada album kegiatan yang dipublikasikan.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Latest News -->
<section id="news" class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 space-y-3">
            <h2 class="text-2xl lg:text-2xl font-bold text-[#0F172A]">Kabar Terbaru Mahaputra</h2>
            <p class="text-base text-gray-500">Ikuti perkembangan terbaru mengenai prestasi siswa dan kegiatan akademik kami.</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <?php
                $categoryStyles = [
                    'Kegiatan' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'btn' => 'bg-purple-50', 'icon' => '<svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>'],
                    'Pengumuman' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-600', 'btn' => 'bg-orange-50', 'icon' => '<svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>'],
                    'Prestasi' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-600', 'btn' => 'bg-blue-50', 'icon' => '<svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>'],
                    'Akademik' => ['bg' => 'bg-green-50', 'text' => 'text-green-600', 'btn' => 'bg-green-50', 'icon' => '<svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>'],
                ];
            ?>

            <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $style = $categoryStyles[$article->category] ?? $categoryStyles['Kegiatan'];
            ?>
            <div class="group bg-white rounded-[1.5rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500">
                <div class="aspect-video relative overflow-hidden">
                    <?php if($article->featured_image): ?>
                        <img src="<?php echo e(asset('storage/' . $article->featured_image)); ?>" alt="<?php echo e($article->title); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <?php else: ?>
                        <div class="w-full h-full <?php echo e($style['bg']); ?> flex flex-col items-center justify-center p-6">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-lg mb-4 transition-transform duration-500 group-hover:rotate-12">
                                <?php echo $style['icon']; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="absolute top-6 left-6">
                        <span class="px-4 py-2 <?php echo e(str_replace('text', 'bg', $style['text'])); ?> text-white text-[10px] font-bold rounded-full uppercase tracking-widest shadow-lg">
                            <?php echo e($article->category); ?>

                        </span>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center gap-4 text-xs text-gray-400 font-bold">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                            <?php echo e(($article->published_at ?? $article->created_at)->format('d M Y')); ?>

                        </span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            5 Min Baca
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors line-clamp-2 leading-tight uppercase">
                        <?php echo e($article->title); ?>

                    </h3>
                    <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed">
                        <?php echo e(Str::limit(strip_tags($article->content), 100)); ?>

                    </p>
                    <div class="pt-6 border-t border-gray-50 flex items-center justify-between">
                        <a href="<?php echo e(route('news.detail', ['slug' => $article->slug])); ?>" class="inline-flex items-center gap-2 text-blue-600 font-bold text-sm tracking-wide group/link">
                            BACA SELENGKAPNYA 
                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-center py-8 bg-gray-50 rounded-[1.5rem] border-2 border-dashed border-gray-200">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6"></path></svg>
                </div>
                <p class="text-gray-500 font-bold italic">Belum ada artikel yang diterbitkan.</p>
            </div>
            <?php endif; ?>
        </div>

        <div class="mt-10 text-center">
            <a href="<?php echo e(route('news')); ?>" class="inline-flex items-center gap-2 text-gray-600 font-bold hover:text-blue-600 transition-all underline">Lihat Semua Berita & Artikel</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    <div class="relative bg-[#0F172A] rounded-[2rem] p-8 lg:p-12 overflow-hidden shadow-2xl">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/10 blur-3xl rounded-full"></div>
        <div class="absolute bottom-0 left-0 w-1/3 h-full bg-indigo-600/10 blur-3xl rounded-full"></div>
        
        <div class="relative z-10 grid lg:grid-cols-2 gap-10 items-center">
            <div class="space-y-5">
                <h2 class="text-2xl lg:text-3xl font-bold text-white leading-tight">
                    Siap Bergabung Menjadi Bagian dari Masa Depan?
                </h2>
                <p class="text-base text-gray-400 leading-relaxed">
                    Pendaftaran siswa baru tahun ajaran 2026/2027 telah dibuka. Segera amankan kursimu di jurusan impian dan mulai langkah besarmu hari ini.
                </p>
                <div class="flex flex-wrap gap-3 pt-2">
                    <a href="<?php echo e(route('registration')); ?>" class="px-6 py-3 bg-blue-600 text-white rounded-xl font-bold text-sm hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-900 transition-all uppercase tracking-wide">Daftar Sekarang</a>
                    <a href="<?php echo e(route('contact')); ?>" class="px-6 py-3 bg-white/5 border border-white/10 text-white rounded-xl font-bold text-sm hover:bg-white/10 transition-all uppercase tracking-wide">Hubungi Kami</a>
                </div>
            </div>
            <div class="lg:flex justify-end hidden">
                <div class="space-y-3">
                    <div class="flex items-center gap-4 bg-white/5 p-4 pr-12 rounded-xl border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-500 group">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center font-bold text-white text-sm shadow-lg shadow-blue-500/50">1</div>
                        <div>
                            <p class="text-white font-bold text-base">Isi Formulir</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-white/5 p-4 pr-12 rounded-xl border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-500 translate-x-4 group">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center font-bold text-white text-sm shadow-lg shadow-blue-500/50">2</div>
                        <div>
                            <p class="text-white font-bold text-base">Verifikasi</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-white/5 p-4 pr-12 rounded-xl border border-white/10 backdrop-blur-md hover:bg-white/10 transition-all duration-500 translate-x-8 group">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center font-bold text-white text-sm shadow-lg shadow-blue-500/50">3</div>
                        <div>
                            <p class="text-white font-bold text-base">Psikotes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/index.blade.php ENDPATH**/ ?>