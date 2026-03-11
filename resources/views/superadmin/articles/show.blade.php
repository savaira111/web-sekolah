@extends('layouts.superadmin.app')

@section('title', 'Pratinjau Artikel - EduAdmin Pro')

@section('content')
<div class="p-8 flex-1 w-full max-w-7xl mx-auto">

    {{-- Breadcrumb & Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-6 border-b transition-colors duration-300 gap-4" :class="darkMode ? 'border-gray-800' : 'border-gray-200'">
        <div>
            <div class="flex items-center gap-2 text-xs font-medium mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                <a href="/superadmin/dashboard" class="hover:text-blue-500 transition-colors">Dashboard</a>
                <span>›</span>
                <a href="/superadmin/articles" class="hover:text-blue-500 transition-colors">Artikel / Berita</a>
                <span>›</span>
                <span :class="darkMode ? 'text-blue-400' : 'text-blue-600'">Detail Artikel</span>
            </div>
            <h2 class="text-3xl font-extrabold tracking-tight leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Pratinjau Artikel</h2>
        </div>

        <div class="flex items-center gap-4">
            <a href="/superadmin/articles" class="flex items-center gap-2 text-sm font-bold transition-colors duration-300 hover:text-blue-500" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <a href="/superadmin/articles/edit/1" class="px-5 py-2.5 font-bold text-sm border rounded-xl transition-colors duration-300 shadow-sm flex items-center gap-2" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                Edit Artikel
            </a>
            <button class="px-8 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Publikasikan
            </button>
        </div>
    </div>

    {{-- Content Layout --}}
    <div class="flex flex-col lg:flex-row gap-8">

        {{-- Left Column (Article Content) --}}
        <div class="flex-1">
            <div class="rounded-[2rem] overflow-hidden shadow-md transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">

                {{-- Article Hero Image --}}
                <div class="relative w-full aspect-[21/9] overflow-hidden">
                    <img src="{{ asset('images/news-1.jpg') }}"
                        class="w-full h-full object-cover"
                        onerror="this.src='https://picsum.photos/seed/article/1200/514'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-8">
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-blue-600/90 text-white shadow-lg backdrop-blur-sm">Kegiatan Sekolah</span>
                    </div>
                </div>

                {{-- Article Content Box --}}
                <div class="p-10 lg:p-14">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-[1.1] mb-8 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">
                        Hari Olahraga Nasional 2024: Semangat Atlet Muda Sekolah
                    </h1>

                    {{-- Article Meta --}}
                    <div class="flex flex-wrap items-center gap-6 pb-8 mb-8 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-200'">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/guru-1.jpg') }}" class="w-10 h-10 rounded-full border-2 object-cover transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-200'" alt="Avatar">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Oleh</p>
                                <p class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Admin Utama</p>
                            </div>
                        </div>
                        <div class="w-px h-10 transition-colors duration-300" :class="darkMode ? 'bg-gray-800' : 'bg-gray-200'"></div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Diterbitkan</p>
                            <div class="flex items-center gap-2 text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                12 Mei 2024, 14:30 WIB
                            </div>
                        </div>
                        <div class="w-px h-10 transition-colors duration-300" :class="darkMode ? 'bg-gray-800' : 'bg-gray-200'"></div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Views</p>
                            <div class="flex items-center gap-2 text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                1,248x dilihat
                            </div>
                        </div>
                    </div>

                    {{-- Content Blocks --}}
                    <article class="prose prose-lg max-w-none transition-colors duration-300" :class="darkMode ? 'prose-invert text-gray-300 prose-p:text-gray-300 prose-headings:text-white' : 'text-gray-700'">
                        <p>Udara dipenuhi dengan kegembiraan dan warna-warni cerah dari empat rumah sekolah kami saat kami merayakan Hari Olahraga Nasional. Siswa dari semua kelas berpartisipasi dengan antusiasme yang luar biasa, menunjukkan sportivitas sejati dan kehebatan atletik.</p>

                        <p>Acara dimulai dengan pawai megah oleh dewan siswa, diikuti oleh berbagai nomor lintasan termasuk sprint 100m, lari estafet, dan lompat jauh. Orang tua dan guru bersorak dari pinggir lapangan saat rekor baru dipecahkan dan bakat-bakat baru muncul.</p>

                        <blockquote class="border-l-4 pl-6 italic my-8 transition-colors duration-300" :class="darkMode ? 'border-blue-500 text-gray-200 space-y-2' : 'border-blue-500 text-gray-900 space-y-2'">
                            <p class="text-xl font-medium">"Ini bukan hanya tentang menang; ini tentang berpartisipasi dan belajar menangani kemenangan dan kekalahan dengan anggun."</p>
                            <footer class="text-sm font-bold tracking-widest text-blue-500 uppercase">— Kepala Sekolah</footer>
                        </blockquote>

                        <h3>Highlight Acara Utama</h3>
                        <ul>
                            <li>Lomba lari estafet 4x100m yang sangat mendebarkan</li>
                            <li>Pertandingan tarik tambang persahabatan antara guru dan siswa</li>
                            <li>Upacara penyerahan medali yang khidmat</li>
                        </ul>

                        <p>Kami mengucapkan terima kasih kepada semua panitia, guru, dan staf yang telah bekerja keras memastikan kelancaran acara ini. Semangat hari itu benar-benar luar biasa dan akan dikenang sepanjang tahun akademik.</p>
                    </article>
                </div>
            </div>
        </div>

        {{-- Right Column (Sidebar Details) --}}
        <div class="w-full lg:w-[22rem] space-y-6">
            <div class="rounded-3xl p-8 border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                <h3 class="text-sm font-extrabold tracking-widest uppercase mb-8 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-800'">
                    INFORMASI ARTIKEL
                </h3>

                <div class="space-y-6">
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Status</p>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            <span class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-200' : 'text-gray-900'">Dipublikasi</span>
                        </div>
                    </div>

                    <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Kategori</p>
                        <span class="inline-block px-3 py-1 font-bold text-xs rounded-full transition-colors duration-300 bg-blue-500/10 text-blue-500">Kegiatan Sekolah</span>
                    </div>

                    <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Penulis</p>
                        <div class="flex items-center gap-3 font-bold text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-200' : 'text-gray-700'">
                            <img src="{{ asset('images/guru-1.jpg') }}" class="w-8 h-8 rounded-full object-cover">
                            Admin Utama
                        </div>
                    </div>

                    <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Tanggal Buat</p>
                            <p class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-900'">10 Mei 2024</p>
                            <p class="text-xs text-gray-500">09:00 WIB</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Visibilitas</p>
                            <p class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-900'">Publik</p>
                        </div>
                    </div>

                    <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">URL Slug</p>
                        <a href="#" class="text-sm font-medium transition-colors duration-300 text-blue-500 hover:text-blue-600 truncate block bg-blue-500/5 p-2 rounded-lg border border-blue-500/10">/berita/hari-olahraga-nasional</a>
                    </div>

                    <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Tags</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Olahraga</span>
                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Sekolah</span>
                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Prestasi</span>
                            <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Acara</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
