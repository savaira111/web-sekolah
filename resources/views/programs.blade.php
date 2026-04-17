@extends('layouts.app')

@section('title', 'Program Keahlian - SMKS Mahaputra Cerdas Utama')

@section('content')
<!-- Hero Section -->
<section class="relative bg-[#0F172A] py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-transparent to-indigo-600/20"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center reveal">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 text-blue-400 text-xs font-semibold mb-6">
            PROGRAM KEAHLIAN
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
            Membangun Masa Depan <br>
            Melalui <span class="text-blue-500">Keahlian Digital</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-400 max-w-4xl mx-auto leading-relaxed">
            SMKS Mahaputra Cerdas Utama menawarkan kurikulum yang diselaraskan dengan kebutuhan industri masa kini. Pilih jurusan yang sesuai dengan minat bakatmu dan jadilah tenaga ahli profesional.
        </p>
    </div>
</section>

<!-- Cards Area -->

<!-- Program Cards -->
<section class="py-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
        <!-- DKV Card -->
        <div class="group bg-white rounded-[1.5rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500 reveal reveal-left">
            <div class="aspect-video relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1000" alt="DKV" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-x-0 bottom-0 p-5 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center text-white">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="text-white text-[10px] font-bold tracking-widest uppercase">Kreatif</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-1">Desain Komunikasi Visual (DKV)</h3>
                </div>
            </div>
            <div class="p-5 space-y-4">
                <p class="text-gray-500 text-sm leading-relaxed">
                    Mengasah kemampuan dalam menyampaikan pesan secara visual melalui desain grafis, fotografi, videografi, dan ilustrasi digital. Siswa akan belajar menguasai software standar industri dan teknik kreatif terkini.
                </p>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">Graphic Design</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">Photography</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">2D & 3D Illustration</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">UI/UX Design Basics</span>
                    </div>
                </div>
                <div class="pt-6 border-t border-gray-100">
                    <a href="{{ route('jurusan.dkv') }}" class="block w-full text-center py-3 px-4 border border-gray-100 rounded-xl font-bold text-sm text-gray-900 hover:bg-gray-50 hover:border-blue-200 hover:text-blue-600 transition-all">Lihat Detail Program</a>
                </div>
            </div>
        </div>

        <!-- PPLG Card -->
        <div class="group bg-white rounded-[1.5rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500 reveal reveal-right">
            <div class="aspect-video relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=1000" alt="PPLG" class="w-full h-full object-cover transition-transform duration-700">
                <div class="absolute inset-x-0 bottom-0 p-5 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center text-white">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                    <span class="text-white text-[10px] font-bold tracking-widest uppercase">Teknologi</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-1">Pengembangan Perangkat Lunak (PPLG)</h3>
                </div>
            </div>
            <div class="p-5 space-y-4">
                <p class="text-gray-500 text-sm leading-relaxed">
                    Fokus pada pengembangan aplikasi web, mobile, dan pembuatan gim interaktif. Siswa didorong untuk memahami logika pemrograman mendalam, struktur data, dan manajemen basis data modern.
                </p>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">Web & Mobile Dev</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">Game Logic</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">Cybersecurity</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                        <span class="line-clamp-1">Cloud Computing</span>
                    </div>
                </div>
                <div class="pt-6 border-t border-gray-100">
                    <a href="{{ route('jurusan.pplg') }}" class="block w-full text-center py-3 px-4 border border-gray-100 rounded-xl font-bold text-sm text-gray-900 hover:bg-gray-50 hover:border-blue-200 hover:text-blue-600 transition-all">Lihat Detail Program</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-10 space-y-3">
            <h2 class="text-2xl lg:text-2xl font-bold text-[#0F172A]">Mengapa Memilih SMKS Mahaputra?</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center space-y-4 reveal reveal-scale">
                <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mx-auto shadow-lg shadow-blue-100">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A]">Kurikulum Adaptif</h3>
                <p class="text-gray-500 leading-relaxed">Materi pembelajaran selalu diperbarui mengikuti standar industri global setiap tahunnya agar lulusan tetap relevan.</p>
            </div>
            <div class="text-center space-y-4 reveal reveal-scale" style="transition-delay: 100ms">
                <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mx-auto shadow-lg shadow-blue-100">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A]">Fasilitas Lab Modern</h3>
                <p class="text-gray-500 leading-relaxed">Dukungan perangkat keras berspesifikasi tinggi untuk kelancaran praktik siswa di setiap jurusan (High-end PC & Tablet).</p>
            </div>
            <div class="text-center space-y-4 reveal reveal-scale" style="transition-delay: 200ms">
                <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mx-auto shadow-lg shadow-blue-100">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A]">Penyaluran Kerja</h3>
                <p class="text-gray-500 leading-relaxed">Bekerja sama dengan puluhan mitra industri ternama untuk menjamin masa depan karier lulusan yang cemerlang.</p>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic CTA Section -->
<section class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    <div class="bg-gradient-to-br from-[#0F172A] to-blue-900 rounded-[2rem] p-10 lg:p-16 text-center relative overflow-hidden shadow-2xl reveal">
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="relative z-10 space-y-6">
            <h2 class="text-3xl lg:text-4xl font-bold text-white leading-tight">
                Siap Bergabung dengan <br> Keluarga SMKS Mahaputra Cerdas Utama?
            </h2>
            <p class="text-base md:text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Pendaftaran siswa baru tahun ajaran 2026/2027 telah dibuka. Segera amankan kursimu di jurusan impian dan mulai langkah besarmu hari ini.
            </p>
            <div class="flex flex-wrap justify-center gap-4 pt-6">
                <a href="{{ route('enrollment.guide') }}" class="px-6 py-3.5 bg-blue-600 text-white rounded-xl font-bold text-sm hover:bg-blue-700 hover:shadow-xl hover:shadow-blue-900 transition-all uppercase tracking-wide">Daftar Online Sekarang</a>
                <a href="{{ route('enrollment.guide') }}" class="px-6 py-3.5 bg-white/5 border border-white/20 text-white rounded-xl font-bold text-sm hover:bg-white/10 transition-all uppercase tracking-wide">Panduan Pendaftaran</a>
            </div>
        </div>
    </div>
</section>
@endsection
