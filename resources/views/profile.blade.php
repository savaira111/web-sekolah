@extends('layouts.app')

@section('title', 'Profil Sekolah - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative h-[450px] lg:h-[550px] flex items-center justify-center overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/gedung-sekolah.jpg') }}" alt="Gedung SMKS Mahaputra" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"></div>
    </div>

    <!-- Hero Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <div class="inline-flex items-center px-6 py-2 rounded-full bg-[#F97316] text-white text-xs lg:text-sm font-bold tracking-widest uppercase">
            INSTITUSI PENDIDIKAN TERAKREDITASI A
        </div>
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight">
            Membangun Karakter, <br>
            <span class="text-blue-400">Mengukir Masa Depan</span>
        </h1>
        
        <p class="text-base lg:text-lg text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
            Profil Institusi SMKS Mahaputra Cerdas Utama - Dedikasi tiada henti dalam mencetak generasi unggul yang siap kerja dan berwirausaha.
        </p>
        
        <div class="flex flex-wrap justify-center gap-4 pt-4">
            <a href="{{ route('jurusan') }}" class="px-8 py-4 bg-[#1D82F6] text-white rounded-xl font-bold text-lg hover:bg-blue-600 transition-all">
                Jelajahi Program
            </a>
            <a href="https://www.instagram.com/reel/DT_68DBAYuB/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" target="_blank" class="px-8 py-4 bg-white/10 backdrop-blur-md border-2 border-white/30 text-white rounded-xl font-bold text-lg hover:bg-white/20 transition-all">
                Tonton Video Profil
            </a>
        </div>
    </div>
</section>

<!-- Visi & Misi Header -->
<section class="pt-24 pb-6 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-blue-600 font-bold tracking-[0.2em] uppercase text-sm mb-4">FILOSOFI PENDIDIKAN</p>
        <h2 class="text-2xl lg:text-2xl font-black text-[#0F172A] relative inline-block">
            Visi & Misi Sekolah
            <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 w-24 h-1.5 bg-[#F97316] rounded-full"></div>
        </h2>
    </div>
</section>

<!-- Visi & Misi Content -->
<section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Visi Card -->
            <div class="bg-blue-50/50 p-6 lg:p-8 rounded-[1.5rem] relative overflow-hidden group">
                <div class="absolute top-8 right-8 w-24 h-24 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
                <div class="relative z-10 space-y-4">
                    <div class="w-10 h-10 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-black text-[#0F172A]">Visi Kami</h3>
                    <p class="text-gray-600 leading-relaxed font-bold uppercase text-xs lg:text-sm">
                        Menjadi Penyelenggara Pendidikan Kejuruan Berkarakter Religius dan Berakhlak Mulia yang Melahirkan Tenaga Ahli Kreatif, Inovatif dan Berpengetahuan Global yang Ramah Lingkungan.
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="bg-gray-50/50 p-6 lg:p-8 rounded-[1.5rem] relative overflow-hidden group">
                <div class="absolute top-8 right-8 w-24 h-24 bg-orange-100 rounded-full blur-3xl opacity-50"></div>
                <div class="relative z-10 space-y-4">
                    <div class="w-10 h-10 bg-[#F97316] rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="Mflag M3 4h13a1 1 0 011 1v9a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z M3 4v16"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a1 1 0 011-1h13a1 1 0 011 1v9a1 1 0 01-1 1H4a1 1 0 01-1-1z"></path></svg>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-black text-[#0F172A]">Misi Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 w-5 h-5 bg-orange-100 rounded-full flex items-center justify-center shrink-0">
                                <span class="text-[#F97316] font-black text-[10px]">1</span>
                            </div>
                            <span class="text-gray-600 text-xs lg:text-sm font-bold uppercase">Menyelenggarakan pendidikan kejuruan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 w-5 h-5 bg-orange-100 rounded-full flex items-center justify-center shrink-0">
                                <span class="text-[#F97316] font-black text-[10px]">2</span>
                            </div>
                            <span class="text-gray-600 text-xs lg:text-sm font-bold uppercase">Melahirkan tenaga ahli tingkat menengah.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 w-5 h-5 bg-orange-100 rounded-full flex items-center justify-center shrink-0">
                                <span class="text-[#F97316] font-black text-[10px]">3</span>
                            </div>
                            <span class="text-gray-600 text-xs lg:text-sm font-bold uppercase">Mewujudkan tenaga kreatif inovatif dan berpengalaman.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 w-5 h-5 bg-orange-100 rounded-full flex items-center justify-center shrink-0">
                                <span class="text-[#F97316] font-black text-[10px]">4</span>
                            </div>
                            <span class="text-gray-600 text-xs lg:text-sm font-bold uppercase">Menyediakan sarana prasarana pendukung kegiatan pembelajaran yang berwawasan global dan lingkungan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 w-5 h-5 bg-orange-100 rounded-full flex items-center justify-center shrink-0">
                                <span class="text-[#F97316] font-black text-[10px]">5</span>
                            </div>
                            <span class="text-gray-600 text-xs lg:text-sm font-bold uppercase">Mewujudkan lingkungan sekolah yang bersih, hijau dan sehat.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 w-5 h-5 bg-orange-100 rounded-full flex items-center justify-center shrink-0">
                                <span class="text-[#F97316] font-black text-[10px]">6</span>
                            </div>
                            <span class="text-gray-600 text-xs lg:text-sm font-bold uppercase">Menerapkan kesadaran warga sekolah berperilaku hidup yang berbudaya lingkungan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="mt-0.5 w-5 h-5 bg-orange-100 rounded-full flex items-center justify-center shrink-0">
                                <span class="text-[#F97316] font-black text-[10px]">7</span>
                            </div>
                            <span class="text-gray-600 text-xs lg:text-sm font-bold uppercase">Menjalin kemitraan dan kerjasama yang harmonis dengan masyarakat dan instansi terkait.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section Placeholder (Line 96 - 128 Unchanged) -->

<!-- History Section Header -->
<section class="pt-24 pb-12 bg-gray-50/50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-10">
            <div class="space-y-4">
                <p class="text-blue-600 font-bold tracking-widest uppercase text-xs">JEJAK LANGKAH</p>
                <h2 class="text-2xl lg:text-2xl font-black text-[#0F172A]">Sejarah & Milestone Sekolah</h2>
                <p class="text-gray-500 max-w-2xl text-sm font-medium">Perjalanan panjang kami dalam dunia pendidikan, bertransformasi dari sebuah gagasan kecil menjadi salah satu SMK unggulan di Indonesia.</p>
            </div>
        </div>

        <!-- Vertical Timeline Container -->
        <div class="relative max-w-5xl mx-auto">
            <!-- Center Line -->
            <div class="absolute left-1/2 -translate-x-1/2 top-0 bottom-0 w-0.5 bg-gray-200"></div>

            <div class="space-y-12 lg:space-y-20">
                <!-- 2014 Milestone (Left) -->
                <div class="relative flex items-center justify-between lg:justify-start lg:flex-row-reverse group">
                    <div class="w-full lg:w-1/2 lg:pr-16">
                        <div class="bg-white p-6 lg:p-6 rounded-[1.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all text-right">
                            <span class="text-[#F97316] font-black text-xl lg:text-2xl block mb-1">22 Agustus 2016.</span>
                            <span class="text-gray-400 font-bold text-[10px] uppercase block mb-3">Tahun Pendirian</span>
                            <p class="text-gray-500 text-[11px] leading-relaxed font-medium">Berdirinya Yayasan Mahaputra dengan visi awal menyediakan akses pendidikan terjangkau bagi masyarakat sekitar.</p>
                        </div>
                    </div>
                    <!-- Timeline Dot (Blue) -->
                    <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-white border-4 border-blue-500 rounded-full z-10 shadow-[0_0_10px_rgba(59,130,246,0.3)]"></div>
                </div>

                <!-- 2016 Milestone (Right) -->
                <div class="relative flex items-center justify-between lg:justify-end group">
                    <div class="w-full lg:w-1/2 lg:pl-16">
                        <div class="bg-white p-6 lg:p-6 rounded-[1.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all">
                            <span class="text-blue-600 font-black text-xl lg:text-2xl block mb-1">2016</span>
                            <span class="text-gray-400 font-bold text-[10px] uppercase block mb-3">Akreditasi Pertama</span>
                            <p class="text-gray-500 text-[11px] leading-relaxed font-medium">SMKS Mahaputra Cerdas Utama secara resmi mendapatkan izin operasional dan akreditasi awal dari Dinas Pendidikan.</p>
                        </div>
                    </div>
                    <!-- Timeline Dot (Orange) -->
                    <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-white border-4 border-[#F97316] rounded-full z-10 shadow-[0_0_10px_rgba(249,115,22,0.3)]"></div>
                </div>

                <!-- 2018 Milestone (Left) -->
                <div class="relative flex items-center justify-between lg:justify-start lg:flex-row-reverse group">
                    <div class="w-full lg:w-1/2 lg:pr-16">
                        <div class="bg-white p-6 lg:p-6 rounded-[1.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all text-right">
                            <span class="text-[#F97316] font-black text-xl lg:text-2xl block mb-1">2018</span>
                            <span class="text-gray-400 font-bold text-[10px] uppercase block mb-3">Ekspansi Kemitraan Industri</span>
                            <p class="text-gray-500 text-[11px] leading-relaxed font-medium">Menjalin kerjasama dengan 50+ perusahaan multinasional untuk program magang dan penyaluran kerja lulusan.</p>
                        </div>
                    </div>
                    <!-- Timeline Dot (Blue) -->
                    <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-white border-4 border-blue-500 rounded-full z-10 shadow-[0_0_10px_rgba(59,130,246,0.3)]"></div>
                </div>

                <!-- 2023 Milestone (Right) -->
                <div class="relative flex items-center justify-between lg:justify-end group">
                    <div class="w-full lg:w-1/2 lg:pl-16">
                        <div class="bg-white p-6 lg:p-6 rounded-[1.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all">
                            <span class="text-blue-600 font-black text-xl lg:text-2xl block mb-1">2023</span>
                            <span class="text-gray-400 font-bold text-[10px] uppercase block mb-3">Pusat Keunggulan (COE)</span>
                            <p class="text-gray-500 text-[11px] leading-relaxed font-medium">Ditetapkan sebagai SMK Pusat Keunggulan oleh Kemendikbudristek RI untuk bidang Teknologi Informasi.</p>
                        </div>
                    </div>
                    <!-- Timeline Dot (Orange) -->
                    <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 bg-white border-4 border-[#F97316] rounded-full z-10 shadow-[0_0_10px_rgba(249,115,22,0.3)]"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-[#1D82F6] py-8 lg:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-8 text-center items-center">
            <!-- Stat 1 -->
            <div class="space-y-2">
                <div class="text-2xl lg:text-2xl font-black text-white">15+</div>
                <div class="text-white/80 font-bold text-xs lg:text-sm tracking-widest uppercase">Tahun Berbakti</div>
            </div>
            <!-- Stat 2 -->
            <div class="space-y-2">
                <div class="text-2xl lg:text-2xl font-black text-white">3.5k+</div>
                <div class="text-white/80 font-bold text-xs lg:text-sm tracking-widest uppercase">Alumni Sukses</div>
            </div>
            <!-- Stat 3 -->
            <div class="space-y-2">
                <div class="text-2xl lg:text-2xl font-black text-white">85+</div>
                <div class="text-white/80 font-bold text-xs lg:text-sm tracking-widest uppercase">Mitra Industri</div>
            </div>
            <!-- Stat 4 -->
            <div class="space-y-2">
                <div class="text-2xl lg:text-2xl font-black text-white">42</div>
                <div class="text-white/80 font-bold text-xs lg:text-sm tracking-widest uppercase">Ruang Lab Modern</div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-gradient-to-br from-[#0F172A] to-blue-900 rounded-[1.5rem] p-6 lg:p-20 text-center space-y-10 relative overflow-hidden shadow-2xl">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(white 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="relative z-10 space-y-10">
            <h2 class="text-2xl lg:text-2xl font-bold text-white leading-tight">Mari Wujudkan Masa Depan <br> Digital Bersama Kami</h2>
            <div class="flex flex-wrap justify-center gap-5">
                <a href="{{ route('registration') }}" class="px-10 py-5 bg-blue-600 text-white rounded-[1.5rem] font-bold text-xl hover:bg-blue-700 transition-all">Daftar Sekarang</a>
                <a href="{{ asset('images/brosur-sekolah.jpg') }}" download="Brosur-SMKS-Mahaputra.jpg" class="px-10 py-5 bg-white/5 border border-white/20 text-white rounded-[1.5rem] font-bold text-xl hover:bg-white/10 transition-all text-center">Lihat Brosur Sekolah</a>
            </div>
        </div>
    </div>
</section>

<!-- Brochure Modal -->
<div id="brochureModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="toggleModal('brochureModal')"></div>
    
    <!-- Modal Content -->
    <div class="relative w-full max-w-4xl max-h-[90vh] bg-white rounded-3xl overflow-hidden shadow-2xl transform transition-all">
        <!-- Close Button -->
        <button onclick="toggleModal('brochureModal')" class="absolute top-4 right-4 z-50 p-2 bg-black/20 hover:bg-black/40 text-white rounded-full transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <!-- Image Container -->
        <div class="overflow-y-auto max-h-[90vh]">
            <img src="{{ asset('images/brosur-sekolah.jpg') }}" alt="Brosur SMKS Mahaputra" class="w-full h-auto">
        </div>
    </div>
</div>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }
    }

    // Close modal on Escape key
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const modal = document.getElementById('brochureModal');
            if (modal && !modal.classList.contains('hidden')) {
                toggleModal('brochureModal');
            }
        }
    });
</script>
@endsection
