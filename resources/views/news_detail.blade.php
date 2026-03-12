@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
        <!-- Enhanced Back Button -->
        <div class="absolute left-4 sm:left-6 lg:left-8 top-0 lg:top-4">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white border border-gray-100 text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all shadow-sm group" title="Kembali">
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
        </div>

        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            BERITA TERBARU
        </div>
        <h1 class="text-3xl lg:text-5xl font-bold text-[#0F172A] leading-tight max-w-4xl mx-auto">
            {{ $article->title }}
        </h1>
        <div class="flex items-center gap-3 justify-center">
            <span class="px-4 py-1.5 bg-blue-50 text-blue-600 text-xs font-bold rounded-full uppercase tracking-wider">{{ $article->category }}</span>
        </div>

        <!-- Meta -->
        <div class="flex flex-wrap items-center gap-6 pt-4 border-t border-gray-100 justify-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                    {{ substr($article->author->name ?? 'A', 0, 1) }}
                </div>
                <div class="text-sm text-left">
                    <p class="font-bold text-[#0F172A]">{{ $article->author->name ?? 'Admin' }}</p>
                    <p class="text-gray-400 capitalize">{{ $article->author->role ?? 'Staf Sekolah' }}</p>
                </div>
            </div>
            <div class="flex items-center gap-6 text-sm text-gray-500">
                <span class="flex items-center gap-2 font-medium">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                    {{ $article->published_at ? $article->published_at->format('d F Y') : $article->created_at->format('d F Y') }}
                </span>
                <span class="flex items-center gap-2 font-medium">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    {{ number_format($article->views_count ?? 0) }} Views
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Featured Image -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
    <div class="aspect-[21/9] rounded-[3rem] overflow-hidden shadow-2xl bg-gray-100">
        @if($article->featured_image)
            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-300">
                <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        @endif
    </div>
</section>

<!-- Article Content -->
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-32">
    <div class="grid lg:grid-cols-1 gap-16">
        <div class="prose prose-lg max-w-none text-gray-700 space-y-8 leading-relaxed">
            {!! nl2br(e($article->content)) !!}
            
            <!-- Share -->
            <div class="pt-16 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex items-center gap-4">
                    <span class="text-sm font-bold text-gray-400">BAGIKAN ARTIKEL:</span>
                    <div class="flex items-center gap-3">
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($article->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-700 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' ' . url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-green-500 hover:text-white transition-all">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.56 5.338-11.891 11.893-11.891 3.181 0 6.167 1.24 8.407 3.488 2.239 2.248 3.471 5.232 3.471 8.403 0 6.561-5.338 11.892-11.892 11.892-2.003 0-3.963-.505-5.707-1.467l-6.309 1.684zm6.031-4.573l.363.216c1.554.919 3.328 1.405 5.152 1.405 5.564 0 10.089-4.529 10.089-10.1 0-2.695-1.047-5.23-2.951-7.133-1.903-1.903-4.435-2.951-7.134-2.951-5.565 0-10.093 4.532-10.093 10.101 0 1.956.563 3.868 1.626 5.524l.237.373-.974 3.561 3.684-.985z"/></svg>
                        </a>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-sm font-bold text-gray-400 uppercase tracking-widest">
                    DIUNGGAH DALAM: <span class="text-blue-600">{{ $article->category }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relatedArticles->count() > 0)
<!-- Related News -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-16">
            <h2 class="text-3xl font-bold text-[#0F172A]">Berita Terkait</h2>
            <a href="{{ route('home') }}#news" class="text-blue-600 font-bold hover:gap-3 transition-all flex items-center gap-2">
                Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            @php
                $categoryStyles = [
                    'Kegiatan' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'icon' => '<svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>'],
                    'Pengumuman' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-600', 'icon' => '<svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>'],
                    'Prestasi' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-600', 'icon' => '<svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>'],
                    'Akademik' => ['bg' => 'bg-green-50', 'text' => 'text-green-600', 'icon' => '<svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>'],
                ];
            @endphp

            @foreach($relatedArticles as $related)
            @php
                $style = $categoryStyles[$related->category] ?? $categoryStyles['Kegiatan'];
            @endphp
            <article class="group bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500">
                <a href="{{ route('news.detail', $related->slug) }}" class="block h-full">
                    <div class="aspect-video relative overflow-hidden">
                        @if($related->featured_image)
                            <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full {{ $style['bg'] }} flex items-center justify-center">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-md">
                                    {!! $style['icon'] !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-8 space-y-4">
                        <span class="text-[10px] font-bold {{ $style['text'] }} uppercase tracking-widest">{{ $related->category }}</span>
                        <h3 class="text-xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors uppercase leading-tight line-clamp-2">{{ $related->title }}</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">{{ $related->published_at ? $related->published_at->format('d M Y') : $related->created_at->format('d M Y') }}</p>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
