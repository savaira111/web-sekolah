@extends('layouts.app')

@section('title', 'Mitra Industri - SMKS Mahaputra Cerdas Utama')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-4 pb-20 lg:pt-8 lg:pb-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8 text-center lg:text-left">
                <h1 class="text-5xl lg:text-6xl font-black text-[#0F172A] leading-tight">
                    Sinergi <span class="text-blue-600">Eksklusif</span> <br class="hidden lg:block">
                    Dunia Industri.
                </h1>
                <p class="text-lg text-gray-500 max-w-xl mx-auto lg:mx-0 leading-relaxed font-medium">
                    Menghubungkan talenta digital masa depan dengan raksasa teknologi dan inovator global melalui ekosistem pendidikan yang terintegrasi.
                </p>
                
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-2">
                    <div class="flex items-center gap-3 px-5 py-2.5 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-sm font-bold shadow-sm">
                        <div class="w-2.5 h-2.5 rounded-full bg-blue-600 animate-pulse"></div>
                        150+ Mitra Aktif
                    </div>
                    <div class="flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100 text-orange-700 text-sm font-bold shadow-sm">
                        <div class="w-6 h-6 rounded-lg bg-orange-200 flex items-center justify-center text-[12px]">💼</div>
                        98% Serapan Kerja
                    </div>
                </div>
            </div>

            <div class="relative">
                <!-- Decorative Elements -->
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-60"></div>
                
                <!-- Hero Image Container -->
                <div class="relative z-10">
                    <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-2xl border-[12px] border-white ring-1 ring-gray-100">
                        <img src="{{ asset('images/mitra-hero.png') }}" alt="Sinergi Industri" class="w-full h-full object-cover">
                        <!-- Glass Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-black/20 to-transparent"></div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-10 lg:-left-20 z-20 bg-orange-600 p-6 lg:p-8 rounded-[2rem] shadow-2xl max-w-[220px] transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                        <div class="text-white">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] mb-2 opacity-80">INDUSTRY STANDARD</p>
                            <p class="text-sm lg:text-base font-bold leading-tight uppercase tracking-tight">Kurikulum yang disusun bersama praktisi industri terkemuka.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Listing Section -->
<section class="py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-6 bg-white p-4 rounded-3xl shadow-sm border border-gray-100">
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('mitra', ['category' => 'all']) }}" 
                   class="px-6 py-3 rounded-full text-sm font-extrabold transition-all {{ ($request->category ?? 'all') === 'all' ? 'bg-[#1E3A8A] text-white shadow-lg' : 'text-gray-500 hover:bg-gray-100' }}">
                   Semua Industri
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('mitra', ['category' => $cat]) }}" 
                   class="px-6 py-3 rounded-full text-sm font-extrabold transition-all {{ ($request->category ?? '') === $cat ? 'bg-[#1E3A8A] text-white shadow-lg' : 'text-gray-500 hover:bg-gray-100' }}">
                   {{ $cat }}
                </a>
                @endforeach
            </div>
            
            <div class="text-sm font-bold text-gray-400 px-4">
                Menampilkan <span class="text-gray-900">{{ $partners->count() }}</span> Perusahaan
            </div>
        </div>

        <!-- Partners Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($partners as $partner)
            <a href="{{ route('mitra.show', $partner->id) }}" class="group bg-white rounded-[2rem] p-8 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-50 flex flex-col h-full">
                <!-- Card Header -->
                <div class="flex items-start justify-between mb-8">
                    <div class="w-16 h-16 rounded-2xl bg-gray-50 p-3 border border-gray-100 flex items-center justify-center overflow-hidden shrink-0">
                        @if($partner->logo)
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                        @else
                        <div class="text-white bg-blue-600 w-full h-full rounded-xl flex items-center justify-center font-black text-xl shadow-lg shadow-blue-200">
                            {{ strtoupper(substr($partner->name, 0, 2)) }}
                        </div>
                        @endif
                    </div>
                    
                    @php
                        $badges = ['MAGANG', 'PENEMPATAN KERJA', 'GURU TAMU', 'PRACTICE'];
                        $badgeIdx = array_rand($badges);
                        $badge = $badges[$badgeIdx]; 
                        $badgeColorClasses = [
                            'bg-blue-50 text-blue-600',
                            'bg-orange-50 text-orange-600',
                            'bg-purple-50 text-purple-600',
                            'bg-emerald-50 text-emerald-600',
                        ];
                    @endphp
                    <span class="px-3 py-1 rounded-lg text-[9px] font-black tracking-widest uppercase {{ $badgeColorClasses[$badgeIdx % 4] }}">
                        {{ $badge }}
                    </span>
                </div>

                <!-- Card Content -->
                <div class="flex-1">
                    <h3 class="text-xl font-black text-[#0F172A] mb-2 group-hover:text-blue-600 transition-colors leading-tight">{{ $partner->name }}</h3>
                    <p class="text-[13px] text-gray-400 font-bold leading-relaxed mb-6">
                        {{ $partner->category }} &bull; {{ Str::limit($partner->description, 60) }}
                    </p>
                </div>

                <!-- Card Footer -->
                <div class="pt-6 border-t border-gray-50 flex items-center gap-2 text-gray-400">
                    <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-xs font-bold tracking-tight">{{ $partner->location ?? 'Bandung, Indonesia' }}</span>
                </div>
            </a>
            @empty
            <div class="col-span-full py-20 text-center">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-sm mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Belum Ada Mitra Terdaftar</h3>
                <p class="text-gray-500 mt-2">Kami sedang memperluas jaringan kerja sama kami.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-br from-[#0256B3] to-[#014188] rounded-[3rem] p-12 lg:p-20 overflow-hidden shadow-2xl text-center">
            <!-- Decorative Glow -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400/20 blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500/10 blur-[100px] rounded-full"></div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-8">
                <h2 class="text-4xl lg:text-5xl font-black text-white leading-tight uppercase tracking-tight">
                    Siap Mencetak Generasi Unggul Bersama?
                </h2>
                <p class="text-lg text-blue-100/80 leading-relaxed font-bold">
                    Jadilah bagian dari perjalanan transformasi digital kami. Berkolaborasi, berinovasi, dan temukan talenta terbaik untuk masa depan industri Anda.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-6">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-10 py-5 bg-white text-blue-700 rounded-2xl font-black text-base shadow-xl shadow-blue-900/20 hover:bg-blue-50 transition-all active:scale-95 uppercase tracking-wide">
                        Mulai Kemitraan
                    </a>
                    <a href="#" class="w-full sm:w-auto px-10 py-5 bg-transparent border-2 border-white/30 text-white rounded-2xl font-black text-base hover:bg-white/10 transition-all uppercase tracking-wide">
                        Unduh Proposal Kerjasama
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap');
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>
@endpush
@endsection
