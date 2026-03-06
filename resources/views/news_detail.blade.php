@extends('layouts.app')

@section('title', 'Siswa PPLG SMK Mahaputra Meraih Prestasi - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
        <!-- Enhanced Back Button -->
        <div class="absolute left-4 sm:left-6 lg:left-8 top-0 lg:top-4">
            <a href="{{ route('news') }}" class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white border border-gray-100 text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all shadow-sm group" title="Kembali">
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
        </div>

        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            BERITA TERBARU
        </div>
        <h1 class="text-3xl lg:text-5xl font-bold text-[#0F172A] leading-tight">
            {{ $news->title ?? 'Judul Berita Mahaputra' }}
        </h1>
        <div class="flex items-center gap-3 justify-center">
            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-full uppercase tracking-wider">Prestasi</span>
        </div>

        <!-- Meta -->
        <div class="flex flex-wrap items-center gap-6 pt-4 border-t border-gray-100 justify-center">
            <div class="flex items-center gap-3">
                <img src="https://i.pravatar.cc/150?u=budo" alt="Author" class="w-10 h-10 rounded-full">
                <div class="text-sm">
                    <p class="font-bold text-[#0F172A]">Budo Santoso</p>
                    <p class="text-gray-400">Tim Humas</p>
                </div>
            </div>
            <div class="flex items-center gap-6 text-sm text-gray-500">
                <span class="flex items-center gap-2 font-medium">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                    12 Oktober 2023
                </span>
                <span class="flex items-center gap-2 font-medium">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    5 Menit Baca
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Featured Image -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
    <div class="aspect-[21/9] rounded-[3rem] overflow-hidden shadow-2xl">
        <img src="https://smksmahaputra.sch.id/storage/images/berita/siswa-pplg-smk-mahaputra-meraih-prestasi_thumb.jpg" alt="Featured Image" class="w-full h-full object-cover">
    </div>
</section>

<!-- Article Content -->
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-32">
    <div class="grid lg:grid-cols-1 gap-16">
        <div class="prose prose-lg max-w-none text-gray-600 space-y-8">
            <p class="leading-relaxed">
                Prestasi membanggakan kembali diukir oleh siswa jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) SMK Mahaputra Cerdas Utama dalam ajang National Software Development Competition 2023 yang diselenggarakan secara online pada pekan lalu.
            </p>

            <p class="leading-relaxed">
                Tim yang terdiri dari tiga siswa kelas XII PPLG ini berhasil meraih juara kedua dengan inovasi aplikasi mereka yang dinamakan "EduTrack", sebuah solusi manajemen tugas sekolah berbasis gamifikasi. Aplikasi ini dirancang untuk membantu siswa mengelola waktu belajar dengan lebih efisien dan menyenangkan.
            </p>

            <blockquote class="border-l-4 border-blue-600 pl-8 py-4 bg-blue-50 rounded-r-2xl text-[#0F172A] font-bold text-xl leading-relaxed">
                "Kami sangat tidak menyangka aplikasi ini bisa bersaing dengan sekolah-sekolah unggulan lainnya. Ini adalah hasil kerja keras tim dan bimbingan penuh dari bapak/ibu guru di sekolah," ujar salah satu anggota tim.
            </blockquote>

            <h3 class="text-2xl font-bold text-[#0F172A] pt-8">Inovasi dan Kreativitas Tanpa Batas</h3>
            <p class="leading-relaxed">
                Kepala Jurusan PPLG menyatakan bahwa pencapaian ini membuktikan bahwa kualitas pembelajaran di SMK Mahaputra sudah selaras dengan standar industri. Kurikulum yang berbasis proyek (Project-Based Learning) memungkinkan siswa untuk terbiasa memecahkan masalah nyata melalui teknologi.
            </p>

            <div class="grid grid-cols-2 gap-8 py-8">
                <img src="https://smksmahaputra.sch.id/storage/images/fasilitas/lab-rpl_thumb.jpg" alt="Process" class="rounded-3xl shadow-lg border border-gray-100">
                <img src="https://smksmahaputra.sch.id/storage/images/fasilitas/lab-dkv_thumb.jpg" alt="Process" class="rounded-3xl shadow-lg border border-gray-100">
            </div>

            <p class="leading-relaxed">
                Selain meraih trofi dan piagam penghargaan, para siswa juga mendapatkan tawaran magang dari beberapa perusahaan teknologi ternama yang menjadi sponsor acara tersebut. Hal ini tentunya menjadi nilai tambah bagi portofolio mereka setelah lulus nanti.
            </p>

            <p class="leading-relaxed">
                Pihak sekolah berharap prestasi ini dapat memotivasi siswa lainnya untuk terus bereksperimen dan berani mencoba hal-hal baru di bidang teknologi maupun bidang lainnya. SMK Mahaputra akan terus memberikan dukungan penuh bagi setiap potensi yang dimiliki oleh para siswanya.
            </p>

            <!-- Share -->
            <div class="pt-16 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex items-center gap-4">
                    <span class="text-sm font-bold text-gray-400">BAGIKAN ARTIKEL:</span>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-700 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-500 hover:text-white transition-all">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-sm font-bold text-gray-400">
                    DIUNGGAH DALAM: <span class="text-blue-600">PRESTASI, AKADEMIK</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related News -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-16">
            <h2 class="text-3xl font-bold text-[#0F172A]">Berita Terkait</h2>
            <a href="{{ route('news') }}" class="text-blue-600 font-bold hover:gap-3 transition-all flex items-center gap-2">
                Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <!-- Related 1 -->
            <article class="group bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500">
                <div class="aspect-video relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1000" alt="News 1" class="w-full h-full object-cover transition-transform duration-700">
                </div>
                <div class="p-8 space-y-4">
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Seminar Industri</span>
                    <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors uppercase leading-tight line-clamp-2">Seminar Industri: Menyiapkan Karir di Era AI</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase">10 Okt 2023</p>
                </div>
            </article>

            <!-- Related 2 -->
            <article class="group bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500">
                <div class="aspect-video relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1000" alt="News 2" class="w-full h-full object-cover transition-transform duration-700">
                </div>
                <div class="p-8 space-y-4">
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Akademik</span>
                    <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors uppercase leading-tight line-clamp-2">Penerapan Kurikulum Project-Based Learning</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase">08 Okt 2023</p>
                </div>
            </article>

            <!-- Related 3 -->
            <article class="group bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500">
                <div class="aspect-video relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1000" alt="News 3" class="w-full h-full object-cover transition-transform duration-700">
                </div>
                <div class="p-8 space-y-4">
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Pengumuman</span>
                    <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors uppercase leading-tight line-clamp-2">Pendaftaran Siswa Baru Jalur Prestasi</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase">05 Okt 2023</p>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
