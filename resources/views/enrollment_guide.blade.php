@extends('layouts.app')

@section('title', 'Panduan Pendaftaran & Biaya - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            PPDB ONLINE 2026/2027
        </div>
        <h1 class="text-4xl lg:text-6xl font-bold text-[#0F172A] leading-tight">
            Panduan <span class="text-blue-600">Pendaftaran</span> <br>
            Siswa Baru
        </h1>
        <p class="text-lg text-gray-500 max-w-3xl mx-auto leading-relaxed">
            Informasi lengkap mengenai alur pendaftaran, persyaratan dokumen, hingga jadwal seleksi masuk SMKS Mahaputra Cerdas Utama.
        </p>
    </div>
</section>

<section class="relative pt-16 pb-24 bg-white overflow-hidden reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1 space-y-8">


                <div class="bg-green-50 p-8 rounded-[2.5rem] border border-green-100 space-y-6">
                    <h4 class="font-bold text-green-900">Butuh Bantuan?</h4>
                    <p class="text-green-700 text-sm">Tim CS kami siap membantu proses pendaftaran Anda.</p>
                    <a href="https://wa.me/6282260337300?text=Halo%20Admin%20Mahaputra%2C%20saya%20butuh%20bantuan%20terkait%20proses%20pendaftaran." target="_blank" class="flex items-center justify-center gap-3 w-full py-4 bg-green-500 text-white rounded-2xl font-bold hover:bg-green-600 transition-all uppercase text-xs">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Chat Sekarang
                    </a>

                </div>

                <div class="bg-[#0F172A] p-8 rounded-[2.5rem] text-white space-y-6 shadow-xl shadow-blue-900/10">
                    <h4 class="font-bold">Brosur Digital</h4>
                    <p class="text-gray-400 text-sm">Unduh informasi lengkap kurikulum & biaya.</p>
                    <a href="{{ asset('images/brosur-sekolah.jpg') }}" download="Brosur_SPMB_SMKS_Mahaputra_2026.jpg" class="flex items-center justify-center gap-2 w-full py-4 bg-white/10 border border-white/20 text-white rounded-2xl font-bold uppercase text-xs hover:bg-white/20 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download PDF
                    </a>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Flowchart Section -->
                <div class="bg-white p-12 rounded-[3rem] border-2 border-blue-600 space-y-12 reveal">
                    <h3 class="text-2xl font-bold text-blue-600 flex items-center gap-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Alur Pendaftaran (Flowchart)
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 relative">
                        <div class="space-y-4 relative z-10">
                            <div class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg">1</div>
                            <h5 class="font-bold">Pendaftaran</h5>
                            <p class="text-xs text-gray-400">Lengkapi formulir online secara lengkap.</p>
                        </div>
                        <div class="space-y-4 relative z-10">
                            <div class="w-14 h-14 bg-gray-100 text-gray-400 border border-gray-200 rounded-2xl flex items-center justify-center font-bold text-xl">2</div>
                            <h5 class="font-bold">Verifikasi</h5>
                            <p class="text-xs text-gray-400">Validasi dokumen oleh tim panitia.</p>
                        </div>
                        <div class="space-y-4 relative z-10">
                            <div class="w-14 h-14 bg-gray-100 text-gray-400 border border-gray-200 rounded-2xl flex items-center justify-center font-bold text-xl">3</div>
                            <h5 class="font-bold">Tes Seleksi</h5>
                            <p class="text-xs text-gray-400">Ujian akademik & wawancara.</p>
                        </div>
                         <div class="space-y-4 relative z-10">
                            <div class="w-14 h-14 bg-gray-100 text-gray-400 border border-gray-200 rounded-2xl flex items-center justify-center font-bold text-xl">4</div>
                            <h5 class="font-bold">Pengumuman</h5>
                            <p class="text-xs text-gray-400">Cek hasil seleksi di dashboard.</p>
                        </div>
                         <div class="space-y-4 relative z-10">
                            <div class="w-14 h-14 bg-gray-100 text-gray-400 border border-gray-200 rounded-2xl flex items-center justify-center font-bold text-xl">5</div>
                            <h5 class="font-bold">Daftar Ulang</h5>
                            <p class="text-xs text-gray-400">Finalisasi administrasi masuk.</p>
                        </div>
                    </div>
                </div>

                <!-- Accordion Container -->
                <div class="space-y-4">
                    <!-- 1. Biaya Masuk Awal -->
                    <div x-data="{ isOpen: false }" class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all" :class="isOpen ? 'ring-2 ring-blue-600/10 border-blue-600/20' : ''">
                        <button @click="isOpen = !isOpen" class="w-full p-8 flex justify-between items-center text-left transition-colors" :class="isOpen ? 'bg-blue-50/30' : ''">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600 transition-transform duration-300" :class="isOpen ? 'scale-110' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-bold text-gray-900 text-lg uppercase tracking-wide">Biaya Masuk Awal</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="isOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="isOpen" 
                             x-transition:enter="transition ease-out duration-300 origin-top" 
                             x-transition:enter-start="opacity-0 scale-y-95 -translate-y-2" 
                             x-transition:enter-end="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200 origin-top"
                             x-transition:leave-start="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-y-95 -translate-y-2"
                             class="px-8 pb-8">
                            <div class="bg-blue-600 rounded-[2.5rem] p-10 text-center text-white relative overflow-hidden shadow-xl mt-2">
                                <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-white/5 to-transparent"></div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.2em] mb-4 opacity-80">Penerimaan Peserta Didik Baru 2026 - 2027</p>
                                <div class="flex items-baseline justify-center gap-2 mb-4">
                                    <span class="text-xl font-bold opacity-60">Rp</span>
                                    <span class="text-6xl font-bold leading-none tracking-tight">3.500.000,-</span>
                                </div>
                                <p class="text-blue-100 text-xs font-medium">Hanya dengan 3,5 Juta sudah bisa masuk di SMK Mahaputra Cerdas Utama</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Gebyar Diskon -->
                    <div x-data="{ isOpen: false }" class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all" :class="isOpen ? 'ring-2 ring-blue-600/10 border-blue-600/20' : ''">
                        <button @click="isOpen = !isOpen" class="w-full p-8 flex justify-between items-center text-left transition-colors" :class="isOpen ? 'bg-blue-50/30' : ''">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600 transition-transform duration-300" :class="isOpen ? 'scale-110' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5a2 2 0 10-2 2h2zm0 0h3l4 9v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4l4-9h3z"></path></svg>
                                <span class="font-bold text-gray-900 text-lg uppercase tracking-wide">Gebyar Diskon Spesial</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="isOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="isOpen" 
                             x-transition:enter="transition ease-out duration-300 origin-top" 
                             x-transition:enter-start="opacity-0 scale-y-95 -translate-y-2" 
                             x-transition:enter-end="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200 origin-top"
                             x-transition:leave-start="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-y-95 -translate-y-2"
                             class="px-8 pb-8">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-2">
                                <!-- Gratis -->
                                <div class="group relative bg-blue-600 p-6 rounded-[2rem] text-white text-center shadow-lg overflow-hidden cursor-pointer h-40 flex flex-col justify-center transition-all duration-500 hover:bg-blue-700">
                                    <div class="space-y-2 transition-all duration-500 group-hover:scale-50 group-hover:-translate-y-10 group-hover:opacity-0">
                                        <p class="text-[9px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                                        <h4 class="text-4xl font-bold">GRATIS</h4>
                                        <p class="text-[10px] font-medium opacity-80">Hafiz Quran 30 Juz</p>
                                    </div>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 opacity-0 translate-y-10 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                        <p class="text-[10px] font-bold opacity-60 line-through">Rp 3.500.000</p>
                                        <div class="h-px w-8 bg-white/20 my-2"></div>
                                        <p class="text-2xl font-black">Rp 0</p>
                                        <p class="text-[9px] font-bold uppercase tracking-widest mt-2 bg-white/20 px-3 py-1 rounded-full">Lunas!</p>
                                    </div>
                                </div>

                                <!-- 75% -->
                                <div class="group relative bg-blue-600 p-6 rounded-[2rem] text-white text-center shadow-lg overflow-hidden cursor-pointer h-40 flex flex-col justify-center transition-all duration-500 hover:bg-blue-700">
                                    <div class="space-y-2 transition-all duration-500 group-hover:scale-50 group-hover:-translate-y-10 group-hover:opacity-0">
                                        <p class="text-[9px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                                        <h4 class="text-4xl font-bold">75%</h4>
                                        <p class="text-[10px] font-medium opacity-80">Hafiz Quran 20 Juz</p>
                                    </div>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 opacity-0 translate-y-10 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                        <p class="text-[10px] font-bold opacity-60 line-through">Rp 3.500.000</p>
                                        <div class="h-px w-8 bg-white/20 my-2"></div>
                                        <p class="text-2xl font-black">Rp 875.000</p>
                                        <p class="text-[9px] font-bold uppercase tracking-widest mt-2 bg-white/20 px-3 py-1 rounded-full">Hemat 75%</p>
                                    </div>
                                </div>

                                <!-- 50% -->
                                <div class="group relative bg-blue-600 p-6 rounded-[2rem] text-white text-center shadow-lg overflow-hidden cursor-pointer h-40 flex flex-col justify-center transition-all duration-500 hover:bg-blue-700">
                                    <div class="space-y-2 transition-all duration-500 group-hover:scale-50 group-hover:-translate-y-10 group-hover:opacity-0">
                                        <p class="text-[9px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                                        <h4 class="text-4xl font-bold">50%</h4>
                                        <p class="text-[10px] font-medium opacity-80">Hafiz Quran 10 Juz</p>
                                    </div>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 opacity-0 translate-y-10 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                        <p class="text-[10px] font-bold opacity-60 line-through">Rp 3.500.000</p>
                                        <div class="h-px w-8 bg-white/20 my-2"></div>
                                        <p class="text-2xl font-black">Rp 1.750.000</p>
                                        <p class="text-[9px] font-bold uppercase tracking-widest mt-2 bg-white/20 px-3 py-1 rounded-full">Hemat 50%</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                                <!-- 25% -->
                                <div class="group relative bg-blue-500 p-6 rounded-[2rem] text-white text-center shadow-lg overflow-hidden cursor-pointer h-40 flex flex-col justify-center transition-all duration-500 hover:bg-blue-600">
                                    <div class="space-y-2 transition-all duration-500 group-hover:scale-50 group-hover:-translate-y-10 group-hover:opacity-0">
                                        <p class="text-[9px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                                        <h4 class="text-4xl font-bold">25%</h4>
                                        <p class="text-[10px] font-medium opacity-80">Hafiz Quran 5 Juz</p>
                                    </div>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 opacity-0 translate-y-10 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                        <p class="text-[10px] font-bold opacity-60 line-through">Rp 3.500.000</p>
                                        <div class="h-px w-8 bg-white/20 my-2"></div>
                                        <p class="text-2xl font-black">Rp 2.625.000</p>
                                        <p class="text-[9px] font-bold uppercase tracking-widest mt-2 bg-white/20 px-3 py-1 rounded-full">Hemat 25%</p>
                                    </div>
                                </div>

                                <!-- 50% Yatim Piatu -->
                                <div class="group relative bg-blue-500 p-6 rounded-[2rem] text-white text-center shadow-lg overflow-hidden cursor-pointer h-40 flex flex-col justify-center transition-all duration-500 hover:bg-blue-600">
                                    <div class="space-y-2 transition-all duration-500 group-hover:scale-50 group-hover:-translate-y-10 group-hover:opacity-0">
                                        <p class="text-[9px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                                        <h4 class="text-4xl font-bold">50%</h4>
                                        <p class="text-[10px] font-medium opacity-80">Yatim Piatu</p>
                                    </div>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 opacity-0 translate-y-10 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                        <p class="text-[10px] font-bold opacity-60 line-through">Rp 3.500.000</p>
                                        <div class="h-px w-8 bg-white/20 my-2"></div>
                                        <p class="text-2xl font-black">Rp 1.750.000</p>
                                        <p class="text-[9px] font-bold uppercase tracking-widest mt-2 bg-white/20 px-3 py-1 rounded-full">Khusus Yatim Piatu</p>
                                    </div>
                                </div>

                                <!-- 25% Yatim/Piatu -->
                                <div class="group relative bg-blue-500 p-6 rounded-[2rem] text-white text-center shadow-lg overflow-hidden cursor-pointer h-40 flex flex-col justify-center transition-all duration-500 hover:bg-blue-600">
                                    <div class="space-y-2 transition-all duration-500 group-hover:scale-50 group-hover:-translate-y-10 group-hover:opacity-0">
                                        <p class="text-[9px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                                        <h4 class="text-4xl font-bold">25%</h4>
                                        <p class="text-[10px] font-medium opacity-80">Yatim atau Piatu</p>
                                    </div>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 opacity-0 translate-y-10 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                        <p class="text-[10px] font-bold opacity-60 line-through">Rp 3.500.000</p>
                                        <div class="h-px w-8 bg-white/20 my-2"></div>
                                        <p class="text-2xl font-black">Rp 2.625.000</p>
                                        <p class="text-[9px] font-bold uppercase tracking-widest mt-2 bg-white/20 px-3 py-1 rounded-full">Khusus Yatim/Piatu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- 3. Persyaratan Dokumen -->
                    <div x-data="{ isOpen: false }" class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all" :class="isOpen ? 'ring-2 ring-blue-600/10 border-blue-600/20' : ''">
                        <button @click="isOpen = !isOpen" class="w-full p-8 flex justify-between items-center text-left transition-colors" :class="isOpen ? 'bg-blue-50/30' : ''">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600 transition-transform duration-300" :class="isOpen ? 'scale-110' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                <span class="font-bold text-gray-900">Persyaratan Dokumen</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="isOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="isOpen" 
                             x-transition:enter="transition ease-out duration-300 origin-top" 
                             x-transition:enter-start="opacity-0 scale-y-95 -translate-y-2" 
                             x-transition:enter-end="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200 origin-top"
                             x-transition:leave-start="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-y-95 -translate-y-2"
                             class="px-8 pb-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-8 mt-4">
                                <!-- Column 1 -->
                                <div class="space-y-6">
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">01</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Formulir Pendaftaran</p>
                                            <p class="text-[10px] text-gray-400">Sudah diisi secara online / offline</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">02</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Surat Pernyataan</p>
                                            <p class="text-[10px] text-gray-400">Dibubuhi Materai Rp 10.000</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">03</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy SKL SMP/MTs</p>
                                            <p class="text-[10px] text-gray-400">Dilegalisir - 2 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">04</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy SHUN / Hasil Ujian</p>
                                            <p class="text-[10px] text-gray-400">Dilegalisir - 2 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">05</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy Ijazah SMP/MTs</p>
                                            <p class="text-[10px] text-gray-400">Dilegalisir - 2 Lembar</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Column 2 -->
                                <div class="space-y-6">
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">06</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy Ijazah SD/MI</p>
                                            <p class="text-[10px] text-gray-400">Arsip - 1 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">07</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy Akte Kelahiran</p>
                                            <p class="text-[10px] text-gray-400">Arsip - 2 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">08</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy Kartu Keluarga</p>
                                            <p class="text-[10px] text-gray-400">Arsip - 2 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">09</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy Keterangan Domisili</p>
                                            <p class="text-[10px] text-gray-400">(★★) - 2 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">10</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Copy KTP Orang Tua</p>
                                            <p class="text-[10px] text-gray-400">Ayah & Ibu - Total 4 Lembar</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Column 3 -->
                                <div class="space-y-6">
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">11</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Surat Kesehatan Badan</p>
                                            <p class="text-[10px] text-gray-400">(★★★) - 1 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">12</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Surat Kesehatan Mata</p>
                                            <p class="text-[10px] text-gray-400">(★★★) - 1 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">13</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Pas Foto 3x4</p>
                                            <p class="text-[10px] text-gray-400">Kertas Dove - 3 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">14</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">PIP / KIP / Ket. Kematian</p>
                                            <p class="text-[10px] text-gray-400">(*) Jalur Khusus - 1 Lembar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">15</div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">Sertifikat / Piagam</p>
                                            <p class="text-[10px] text-gray-400">Opsional (Prestasi)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 pt-6 border-t border-gray-50 flex flex-col gap-3">
                                <p class="text-[10px] text-gray-400 leading-relaxed italic"><span class="text-blue-600 font-bold">(*)</span> Bagi pendaftar dari keluarga tidak mampu mendaftarkan melalui jalur afirmasi.</p>
                                <p class="text-[10px] text-gray-400 leading-relaxed italic"><span class="text-blue-600 font-bold">(★★)</span> Apabila calon peserta didik baru bertempat tinggal tidak sesuai Kartu Keluarga.</p>
                                <p class="text-[10px] text-gray-400 leading-relaxed italic"><span class="text-blue-600 font-bold">(★★★)</span> Surat Keterangan Sehat (Badan & Mata/Tidak Buta Warna) dapat diperoleh dari Puskesmas atau dokter praktik berizin.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2. Cara Pembayaran -->
                    <div x-data="{ isOpen: false }" class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all" :class="isOpen ? 'ring-2 ring-blue-600/10 border-blue-600/20' : ''">
                        <button @click="isOpen = !isOpen" class="w-full p-8 flex justify-between items-center text-left transition-colors" :class="isOpen ? 'bg-blue-50/30' : ''">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600 transition-transform duration-300" :class="isOpen ? 'scale-110' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                <span class="font-bold text-gray-900">Cara Pembayaran</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="isOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="isOpen" 
                             x-transition:enter="transition ease-out duration-300 origin-top" 
                             x-transition:enter-start="opacity-0 scale-y-95 -translate-y-2" 
                             x-transition:enter-end="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200 origin-top"
                             x-transition:leave-start="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-y-95 -translate-y-2"
                             class="px-8 pb-8 space-y-4">
                            <div class="p-6 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                                <p class="text-xs text-blue-800 font-medium leading-relaxed mb-4">Seluruh proses pembayaran pendaftaran dilakukan melalui Admin Mahaputra Cerdas Utama untuk keamanan dan verifikasi dana secara langsung.</p>
                                <a href="https://wa.me/6282260337300?text=Halo%20Admin%20Mahaputra%20Cerdas%20Utama%2C%20saya%20mau%20tanya%20soal%20pendaftaran%20sekolah%20sampai%20dengan%20detail%20pembayarannya.%20Mohon%20infonya%20ya%2C%20terima%20kasih." target="_blank" class="inline-flex items-center gap-3 px-6 py-4 bg-[#25D366] text-white rounded-xl font-bold text-[11px] uppercase tracking-wider hover:bg-[#20ba59] transition-all shadow-lg shadow-green-100 group">
                                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                    Hubungi Admin (WhatsApp)
                                </a>
                            </div>
                        </div>
                    </div>
 
                    <!-- 3. Jadwal Penting -->
                    <div x-data="{ isOpen: false }" class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all" :class="isOpen ? 'ring-2 ring-blue-600/10 border-blue-600/20' : ''">
                        <button @click="isOpen = !isOpen" class="w-full p-8 flex justify-between items-center text-left transition-colors" :class="isOpen ? 'bg-blue-50/30' : ''">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600 transition-transform duration-300" :class="isOpen ? 'scale-110' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                                <span class="font-bold text-gray-900">Jadwal Operasional Pelayanan</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="isOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="isOpen" 
                             x-transition:enter="transition ease-out duration-300 origin-top" 
                             x-transition:enter-start="opacity-0 scale-y-95 -translate-y-2" 
                             x-transition:enter-end="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200 origin-top"
                             x-transition:leave-start="opacity-100 scale-y-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-y-95 -translate-y-2"
                             class="px-8 pb-8 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="p-5 bg-gray-50 rounded-2xl border border-gray-100 group hover:border-blue-200 transition-all">
                                    <p class="text-[10px] font-bold text-blue-400 uppercase tracking-widest mb-2">Hari Kerja</p>
                                    <p class="font-bold text-gray-900 text-lg">Senin - Sabtu</p>
                                </div>
                                <div class="p-5 bg-gray-50 rounded-2xl border border-gray-100 group hover:border-blue-200 transition-all">
                                    <p class="text-[10px] font-bold text-blue-400 uppercase tracking-widest mb-2">Jam Pelayanan</p>
                                    <p class="font-bold text-gray-900 text-lg">07:30 - 15:30 WIB</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 p-4 bg-orange-50 rounded-2xl border border-orange-100">
                                <svg class="w-5 h-5 text-orange-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p class="text-xs text-orange-800 leading-relaxed"><span class="font-bold uppercase tracking-wider text-[10px]">Catatan:</span> Khusus hari <span class="font-bold">Sabtu</span>, pelayanan administrasi dan pendaftaran hanya sampai pukul <span class="font-bold">13:00 WIB</span>.</p>
                            </div>
                        </div>
                    </div>
                </div>


                </div>
            </div>
        </div>

        <!-- Final CTA - Centered & Compact -->
        <div class="max-w-5xl mx-auto bg-blue-600 rounded-[2.5rem] p-10 lg:p-14 text-center space-y-8 shadow-2xl shadow-blue-200 mt-20 relative overflow-hidden reveal reveal-scale">
             <!-- Decorative elements -->
             <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
             <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 opacity-20 rounded-full -ml-40 -mb-40 blur-3xl"></div>
             
             <div class="relative z-10 space-y-5">
                <h3 class="text-3xl lg:text-5xl font-bold text-white leading-tight">Sudah Paham Alurnya?</h3>
                <p class="text-blue-100 text-base max-w-2xl mx-auto leading-relaxed">
                    Mulai pendaftaran Anda sekarang juga secara online dan raih masa depan digital Anda bersama kami di SMKS Mahaputra Cerdas Utama.
                </p>
                <div class="pt-4">
                    <a href="{{ route('registration') }}" class="inline-flex py-4 px-10 bg-white text-blue-600 rounded-2xl font-bold text-xl hover:scale-105 active:scale-95 transition-all shadow-xl shadow-blue-900/10">
                        Daftar Online Sekarang
                    </a>
                </div>
             </div>
        </div>
    </div>
</section>
@endsection
