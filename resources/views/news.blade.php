@extends('layouts.app')

@section('title', 'Berita & Artikel - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            KABAR MAHAPUTRA
        </div>
        <h1 class="text-4xl lg:text-6xl font-bold text-[#0F172A] leading-tight">
            Berita & <span class="text-blue-600">Artikel</span> Terbaru
        </h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
            Ikuti perkembangan terbaru, prestasi siswa, dan berbagai kegiatan edukatif di lingkungan SMKS Mahaputra Cerdas Utama.
        </p>
    </div>
</section>

<!-- Featured Article -->
<section class="pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Category Filter -->
            <div class="flex flex-wrap gap-4" id="news-filters">
                <button onclick="filterNews('all')" class="filter-btn px-6 py-3 bg-blue-600 text-white shadow-lg shadow-blue-200 rounded-xl font-bold transition-all active-filter" data-filter="all">Semua</button>
                <button onclick="filterNews('Kegiatan')" class="filter-btn px-6 py-3 bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Kegiatan">Kegiatan</button>
                <button onclick="filterNews('Pengumuman')" class="filter-btn px-6 py-3 bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Pengumuman">Pengumuman</button>
                <button onclick="filterNews('Prestasi')" class="filter-btn px-6 py-3 bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Prestasi">Prestasi</button>
                <button onclick="filterNews('Akademik')" class="filter-btn px-6 py-3 bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Akademik">Akademik</button>
            </div>

            @if(request('search'))
            <div class="p-6 bg-blue-50 border border-blue-100 rounded-3xl flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase">Hasil Pencarian</p>
                        <p class="text-xl font-bold text-[#0F172A]">"{{ request('search') }}"</p>
                    </div>
                </div>
                <a href="{{ route('news') }}" class="text-blue-600 font-bold hover:underline text-sm">Hapus Pencarian</a>
            </div>
            @endif

            <!-- News Grid -->
            <div class="grid md:grid-cols-2 gap-10" id="news-grid">
                @php
                    $categoryColors = [
                        'Kegiatan' => 'bg-purple-600',
                        'Pengumuman' => 'bg-orange-600',
                        'Prestasi' => 'bg-blue-600',
                        'Akademik' => 'bg-green-600'
                    ];
                    $categoryBg = [
                        'Kegiatan' => 'bg-purple-50',
                        'Pengumuman' => 'bg-orange-50',
                        'Prestasi' => 'bg-blue-50',
                        'Akademik' => 'bg-green-50'
                    ];
                @endphp

                @forelse($articles as $article)
                <article class="news-card group space-y-6 transition-all duration-500" data-category="{{ $article->category }}">
                    <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden relative">
                        @if($article->featured_image)
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full {{ $categoryBg[$article->category] ?? 'bg-gray-50' }} flex flex-col items-center justify-center p-10">
                                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg mb-4">
                                    <svg class="w-12 h-12 {{ str_replace('bg', 'text', $categoryColors[$article->category] ?? 'text-gray-600') }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            </div>
                        @endif
                        <span class="absolute top-6 left-6 px-4 py-2 {{ $categoryColors[$article->category] ?? 'bg-gray-600' }} text-white text-[10px] font-bold rounded-full uppercase tracking-wider">{{ $article->category }}</span>
                    </div>
                    <div class="space-y-4 px-2">
                        <div class="flex items-center gap-4 text-xs text-gray-400 font-bold">
                            <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                            <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 5 mnt</span>
                        </div>
                        <a href="{{ route('news.detail', $article->slug) }}">
                            <h3 class="text-2xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors leading-tight uppercase line-clamp-2">{{ $article->title }}</h3>
                        </a>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                        <div class="pt-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-[10px] font-bold">
                                {{ substr($article->author->name ?? 'A', 0, 1) }}
                            </div>
                            <span class="text-xs font-bold text-gray-900">{{ $article->author->name ?? 'Admin' }}</span>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-2 text-center py-20 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200">
                    <p class="text-gray-500 font-bold italic">Belum ada artikel yang ditemukan.</p>
                </div>
                @endforelse
            </div>

                <div class="mt-8">
                    {{ $articles->links() }}
                </div>
            </div>

        <!-- Sidebar -->
        <div class="space-y-12">
            <!-- Search -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                <h4 class="font-bold flex items-center gap-2 mb-6"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg> Cari Artikel</h4>
                <form action="{{ route('news') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Masukkan kata kunci..." class="w-full py-4 px-6 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm">
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>

            <!-- Trending -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                <h4 class="font-bold flex items-center gap-2 mb-8 text-blue-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> Sedang Tren</h4>
                <div class="space-y-8">
                    @forelse($trendingArticles as $trend)
                    <div class="space-y-2 group">
                        <a href="{{ route('news.detail', $trend->slug) }}">
                            <h5 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors leading-tight uppercase text-sm line-clamp-2">{{ $trend->title }}</h5>
                        </a>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">{{ $trend->published_at ? $trend->published_at->format('d M Y') : $trend->created_at->format('d M Y') }}</p>
                    </div>
                    @empty
                    <p class="text-xs text-gray-400 italic">Belum ada data tren.</p>
                    @endforelse
                </div>
            </div>

            <!-- Archive -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                <h4 class="font-bold flex items-center gap-2 mb-8"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2"></path></svg> Arsip Berita</h4>
                <div class="space-y-4 font-bold">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-900 capitalize">Oktober 2023</span>
                        <span class="px-2 py-0.5 bg-gray-50 rounded text-[10px] text-gray-400">12</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-900 capitalize">September 2023</span>
                        <span class="px-2 py-0.5 bg-gray-50 rounded text-[10px] text-gray-400">08</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-900 capitalize">Agustus 2023</span>
                        <span class="px-2 py-0.5 bg-gray-50 rounded text-[10px] text-gray-400">15</span>
                    </div>
                </div>
            </div>

            <!-- Hubungi Humas -->
            <div class="bg-blue-600 p-8 rounded-[2.5rem] text-white space-y-8 shadow-xl shadow-blue-200">
                <h4 class="text-xl font-bold">Hubungi Humas</h4>
                <p class="text-blue-100 text-sm">Punya informasi menarik atau ingin liputan kegiatan sekolah?</p>
                <a href="https://wa.me/message/AKIGOHHXFZGWB1?src=qr" class="flex items-center justify-center gap-2 w-full py-4 bg-white text-blue-600 rounded-2xl font-bold hover:bg-blue-50 transition-all uppercase text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                    Kirim Pesan
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    function filterNews(category) {
        const cards = document.querySelectorAll('.news-card');
        const buttons = document.querySelectorAll('.filter-btn');
        
        // Update button styles
        buttons.forEach(btn => {
            if (btn.getAttribute('data-filter') === category) {
                btn.classList.add('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-200');
                btn.classList.remove('bg-gray-100', 'text-gray-500', 'hover:bg-gray-200');
            } else {
                btn.classList.remove('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-200');
                btn.classList.add('bg-gray-100', 'text-gray-500', 'hover:bg-gray-200');
            }
        });

        // Filter cards
        cards.forEach(card => {
            const categories = card.getAttribute('data-category').split(' ');
            if (category === 'all' || categories.includes(category)) {
                card.style.display = 'block';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                }, 10);
            } else {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    }
</script>
@endsection
