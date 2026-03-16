@extends('layouts.app')

@section('title', 'Panduan Pendaftaran & Biaya - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            PPDB ONLINE 2024/2025
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

<section class="relative pt-16 pb-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-6">
                    <h4 class="font-bold text-gray-900">Navigasi</h4>
                    <a href="#" class="flex items-center gap-3 text-blue-600 font-bold bg-blue-50 p-4 rounded-2xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Alur Pendaftaran
                    </a>
                </div>

                <div class="bg-green-50 p-8 rounded-[2.5rem] border border-green-100 space-y-6">
                    <h4 class="font-bold text-green-900">Butuh Bantuan?</h4>
                    <p class="text-green-700 text-sm">Tim CS kami siap membantu proses pendaftaran Anda.</p>
                    <a href="#" class="flex items-center justify-center gap-3 w-full py-4 bg-green-500 text-white rounded-2xl font-bold hover:bg-green-600 transition-all uppercase text-xs">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Chat Sekarang
                    </a>
                    <button class="w-full py-4 bg-green-600 text-white rounded-2xl font-bold uppercase text-xs">Chat Sekarang</button>
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
            <div class="lg:col-span-2 space-y-12">
                <!-- Biaya Section -->
                <div class="space-y-8">
                    <h3 class="text-2xl font-bold text-blue-600">BIAYA MASUK AWAL</h3>
                    <div class="bg-blue-600 rounded-[3rem] p-12 text-center text-white relative overflow-hidden shadow-2xl shadow-blue-200">
                        <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-white/5 to-transparent"></div>
                        <p class="text-sm font-bold uppercase tracking-[0.2em] mb-4">Penerimaan Peserta Didik Baru 2025 - 2026</p>
                        <div class="flex items-baseline justify-center gap-2 mb-4">
                            <span class="text-2xl font-bold opacity-60">Rp</span>
                            <span class="text-7xl font-bold leading-none">3.500.000,-</span>
                        </div>
                        <p class="text-blue-100 text-sm">Hanya dengan 3,5 Juta sudah bisa masuk di SMK Mahaputra Cerdas Utama</p>
                    </div>
                </div>

                <!-- Diskon Section -->
                <div class="space-y-8">
                    <h3 class="text-2xl font-bold text-[#0F172A]">GEBYAR DISKON!!!</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-blue-600 p-8 rounded-[2.5rem] text-white text-center space-y-4 shadow-lg">
                            <p class="text-[10px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                            <h4 class="text-4xl font-bold">GRATIS</h4>
                            <p class="text-xs font-medium opacity-80">Hafiz Quran 30 Juz</p>
                        </div>
                        <div class="bg-blue-600 p-8 rounded-[2.5rem] text-white text-center space-y-4 shadow-lg">
                             <p class="text-[10px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                            <h4 class="text-4xl font-bold">75%</h4>
                            <p class="text-xs font-medium opacity-80">Hafiz Quran 20 Juz</p>
                        </div>
                         <div class="bg-blue-600 p-8 rounded-[2.5rem] text-white text-center space-y-4 shadow-lg">
                             <p class="text-[10px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                            <h4 class="text-4xl font-bold">50%</h4>
                            <p class="text-xs font-medium opacity-80">Hafiz Quran 10 Juz</p>
                        </div>
                         <div class="bg-blue-500 p-8 rounded-[2.5rem] text-white text-center space-y-4 shadow-lg">
                             <p class="text-[10px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                            <h4 class="text-4xl font-bold">25%</h4>
                            <p class="text-xs font-medium opacity-80">Hafiz Quran 5 Juz</p>
                        </div>
                         <div class="bg-blue-500 p-8 rounded-[2.5rem] text-white text-center space-y-4 shadow-lg">
                             <p class="text-[10px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                            <h4 class="text-4xl font-bold">50%</h4>
                            <p class="text-xs font-medium opacity-80">Yatim Piatu</p>
                        </div>
                         <div class="bg-blue-500 p-8 rounded-[2.5rem] text-white text-center space-y-4 shadow-lg">
                             <p class="text-[10px] font-bold uppercase tracking-widest opacity-60">DISKON</p>
                            <h4 class="text-4xl font-bold">25%</h4>
                            <p class="text-xs font-medium opacity-80">Yatim atau Piatu</p>
                        </div>
                    </div>
                </div>

                <!-- Flowchart Section -->
                <div class="bg-white p-12 rounded-[3rem] border-2 border-blue-600 space-y-12">
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

                <!-- Accordion / Detail Info -->
                <div class="space-y-4">
                    <div class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all">
                        <button class="w-full p-8 flex justify-between items-center text-left">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                <span class="font-bold">Persyaratan Dokumen</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-8 pb-8 text-sm text-gray-500 space-y-3">
                            <p>• Scan Ijazah SMP/MTs Sederajat (Asli/Legalisir)</p>
                            <p>• Scan Akta Kelahiran & Kartu Keluarga</p>
                            <p>• Pas Foto Berwarna Terbaru (3x4)</p>
                            <p>• Scan Rapor Semester 1-5</p>
                            <p>• Sertifikat Prestasi (Jika ada)</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all">
                        <button class="w-full p-8 flex justify-between items-center text-left">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                <span class="font-bold">Cara Pembayaran</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </div>

                    <div class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:border-blue-100 transition-all">
                        <button class="w-full p-8 flex justify-between items-center text-left">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                                <span class="font-bold">Jadwal Penting</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- FAQ Footer -->
                <div class="pt-12">
                     <h3 class="text-2xl font-bold text-[#0F172A] mb-8">FAQ - Pertanyaan Umum</h3>
                     <div class="grid md:grid-cols-2 gap-12">
                        <div class="space-y-4">
                            <h6 class="font-bold text-blue-600">Kapan batas akhir pendaftaran Gelombang 1?</h6>
                            <p class="text-xs text-gray-500">Batas akhir pendaftaran Gelombang 1 adalah tanggal 30 Mei 2025. Segera daftar sebelum kuota penuh.</p>
                        </div>
                        <div class="space-y-4">
                            <h6 class="font-bold text-blue-600">Apakah ada biaya pendaftaran?</h6>
                            <p class="text-xs text-gray-500">Biaya pendaftaran sebesar Rp 150.000 untuk penggantian biaya administrasi dan modul tes seleksi.</p>
                        </div>
                        <div class="space-y-4">
                            <h6 class="font-bold text-blue-600">Bagaimana jika saya lupa password akun?</h6>
                            <p class="text-xs text-gray-500">Gunakan fitur 'Lupa Password' pada halaman Login atau hubungi admin via WhatsApp untuk reset akun.</p>
                        </div>
                        <div class="space-y-4">
                            <h6 class="font-bold text-blue-600">Apa saja pilihan jurusan yang tersedia?</h6>
                            <p class="text-xs text-gray-500">Kami memiliki 4 kompetensi keahlian: PPLG, DKV, Multimedia, dan Akuntansi Pemasaran.</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>

        <!-- Final CTA - Expanded and Full Width -->
        <div class="bg-blue-600 rounded-[3rem] p-12 lg:p-20 text-center space-y-10 shadow-2xl shadow-blue-200 mt-20 relative overflow-hidden">
             <!-- Decorative elements -->
             <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
             <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 opacity-20 rounded-full -ml-40 -mb-40 blur-3xl"></div>
             
             <div class="relative z-10 space-y-6">
                <h3 class="text-4xl lg:text-6xl font-bold text-white leading-tight">Sudah Paham Alurnya?</h3>
                <p class="text-blue-100 text-lg lg:text-xl max-w-3xl mx-auto leading-relaxed">
                    Mulai pendaftaran Anda sekarang juga secara online dan raih masa depan digital Anda bersama kami di SMKS Mahaputra Cerdas Utama.
                </p>
                <div class="pt-8">
                    <a href="{{ route('registration') }}" class="inline-flex py-6 px-16 bg-white text-blue-600 rounded-[2.5rem] font-bold text-2xl hover:scale-105 active:scale-95 transition-all shadow-xl shadow-blue-900/20">
                        Daftar Online Sekarang
                    </a>
                </div>
             </div>
        </div>
    </div>
</section>
@endsection
