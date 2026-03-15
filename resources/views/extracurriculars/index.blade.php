@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative pt-20 pb-24 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Side: Text Content -->
            <div class="space-y-10">
                <div class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gray-50 text-gray-400 text-[11px] font-bold tracking-widest uppercase border border-gray-100 shadow-sm">
                    Sarana & Prasarana
                </div>
                <div class="space-y-6">
                    <h1 class="text-5xl lg:text-7xl font-black text-[#0F172A] leading-tight">
                        Apa itu <br>
                        <span class="text-blue-600 tracking-tight">Ekstrakurikuler?</span>
                    </h1>
                    <p class="text-lg text-gray-500 max-w-xl leading-relaxed font-medium">
                        Ekstrakurikuler di SMKS Mahaputra Cerdas Utama dirancang untuk mengembangkan karakter, kepemimpinan, dan keterampilan khusus siswa di luar lingkungan kelas tradisional. Kami percaya pada pertumbuhan holistik melalui minat dan latihan.
                    </p>
                </div>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('extracurriculars.registration') }}" class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-black shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all uppercase tracking-wide">Daftar sekarang</a>
                    <a href="{{ route('profile') }}" class="px-10 py-5 bg-gray-100 text-[#0F172A] rounded-2xl font-black hover:bg-gray-200 transition-all uppercase tracking-wide">Profil Sekolah</a>
                </div>
            </div>

            <!-- Right Side: Poster Card Image -->
            <div class="relative group lg:justify-self-end">
                <div class="relative z-10 w-full lg:w-[536px] aspect-square rounded-[3rem] overflow-hidden shadow-2xl shadow-blue-900/10 border-8 border-white">
                    <img src="{{ asset('images/extracurriculars/hero-poster.png') }}" alt="Extracurricular Poster" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -top-12 -right-12 w-64 h-64 bg-blue-600/5 rounded-full blur-3xl -z-0"></div>
                <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-indigo-600/5 rounded-full blur-3xl -z-0"></div>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section id="explore" class="py-24 bg-white" x-data="{ active: 'semua' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="text-center space-y-4">
            <h2 class="text-4xl font-bold text-[#0F172A]">Jelajahi Ekstrakurikuler</h2>
            <p class="text-gray-400 text-sm">Pilih kategori untuk melihat kegiatan yang sesuai dengan minat dan bakatmu.</p>
        </div>

        <!-- Categories -->
        <div class="flex flex-wrap justify-center gap-4">
            <button @click="active = 'semua'" :class="active === 'semua' ? 'bg-blue-50 text-blue-600 shadow-sm' : 'bg-gray-50 text-gray-500'" class="px-8 py-3 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">Semua</button>
            <button @click="active = 'olahraga'" :class="active === 'olahraga' ? 'bg-blue-50 text-blue-600 shadow-sm' : 'bg-gray-50 text-gray-500'" class="px-8 py-3 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">olahraga</button>
            <button @click="active = 'umum'" :class="active === 'umum' ? 'bg-blue-50 text-blue-600 shadow-sm' : 'bg-gray-50 text-gray-500'" class="px-8 py-3 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">umum</button>
        </div>

        <!-- Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach($extracurriculars as $eskul)
            <a href="{{ route('extracurriculars.show', $eskul->id) }}" 
               x-show="active === 'semua' || active === '{{ strtolower(explode(' ', $eskul->category)[0] == 'Sports' ? 'olahraga' : 'umum') }}'"
               class="group space-y-6">
                <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-xl relative">
                    <img src="{{ $eskul->image ? asset('storage/' . $eskul->image) : asset('images/extracurriculars/thumbs/default.png') }}" alt="{{ $eskul->name }}" class="w-full h-full object-cover transition-transform duration-700 font-medium group-hover:scale-105">
                    <div class="absolute top-6 left-6 px-4 py-2 bg-white/90 backdrop-blur-sm rounded-full text-[10px] font-bold text-blue-600 uppercase tracking-widest shadow-sm">{{ $eskul->category }}</div>
                </div>
                <div class="space-y-2 pl-2">
                    <h3 class="text-2xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors">{{ $eskul->name }}</h3>
                    <p class="text-sm text-gray-400 leading-relaxed line-clamp-2">{{ $eskul->description }}</p>
                    <div class="flex items-center justify-between pt-4">
                        <span class="text-[10px] font-bold text-gray-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                            {{ $eskul->schedule_info }}
                        </span>
                        <span class="text-xs font-bold text-blue-600 flex items-center gap-2 transition-all">
                            Lihat Detail 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>

<!-- Call to Action Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-12">
        <div class="space-y-4">
            <h2 class="text-4xl font-bold text-[#0F172A] leading-tight">Ingin Melihat Kegiatan Kami Secara Langsung?</h2>
            <p class="text-gray-500 max-w-xl mx-auto">Kami mengadakan open house setiap hari Sabtu. Daftarkan diri Anda untuk tur kampus bersama tim akademik kami.</p>
        </div>
        <div class="flex flex-col md:flex-row justify-center gap-6">
            <a href="https://wa.me/6281234567890" class="px-12 py-5 bg-white border border-gray-100 rounded-[2rem] font-bold shadow-sm transition-all">Tanya Lewat WhatsApp</a>
        </div>
    </div>
</section>
@endsection