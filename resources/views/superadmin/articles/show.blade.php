@extends('layouts.superadmin.app')
@section('title', ($article->title ?? 'Detail Artikel') . ' - Admin Mahput')

@section('content')
<div class="px-8 pb-16 flex-1 w-full transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#0F172A]' : 'bg-[#F3F4F6]'">

    {{-- BREADCRUMB --}}
    <div class="flex items-center gap-2 py-6 text-[12.5px] font-semibold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
        <a href="{{ route('superadmin.articles.index') }}" class="hover:text-blue-500 transition-colors">Artikel & Berita</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'" class="truncate max-w-xs">{{ $article->title }}</span>
    </div>

    <div class="max-w-4xl mx-auto">

        {{-- HEADER CARD --}}
        <div class="rounded-3xl overflow-hidden mb-8 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827]' : 'bg-white'">

            {{-- Hero: Featured Image or Gradient --}}
            @if($article->featured_image)
            <div class="w-full aspect-[21/8] overflow-hidden">
                <img src="{{ asset('storage/' . $article->featured_image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-full object-cover">
            </div>
            @else
            <div class="w-full aspect-[21/8] flex items-center justify-center"
                 :class="$store.theme.darkMode ? 'bg-gradient-to-br from-blue-900/40 to-purple-900/30' : 'bg-gradient-to-br from-blue-50 to-indigo-100'">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     :class="$store.theme.darkMode ? 'text-blue-400/40' : 'text-blue-300'">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            @endif

            {{-- Article Meta --}}
            <div class="p-8 pb-6">
                {{-- Category + Status badges --}}
                <div class="flex flex-wrap items-center gap-2.5 mb-5">
                    <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase"
                          :class="$store.theme.darkMode ? 'bg-blue-500/10 text-blue-400' : 'bg-blue-50 text-blue-600'">
                        {{ $article->category }}
                    </span>
                    @if($article->is_published)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase"
                          :class="$store.theme.darkMode ? 'bg-emerald-500/10 text-emerald-400' : 'bg-emerald-50 text-emerald-600'">
                        <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span> Terbit
                    </span>
                    @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase"
                          :class="$store.theme.darkMode ? 'bg-gray-700/60 text-gray-400' : 'bg-gray-100 text-gray-500'">
                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Draft
                    </span>
                    @endif
                </div>

                {{-- Title --}}
                <h1 class="text-[28px] lg:text-[34px] font-black leading-tight tracking-tight mb-6 transition-colors duration-300"
                    :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">
                    {{ $article->title }}
                </h1>

                {{-- Author + Timestamps Row --}}
                <div class="flex flex-wrap items-center justify-between gap-5 pb-6 border-b transition-colors duration-300"
                     :class="$store.theme.darkMode ? 'border-gray-700/60' : 'border-gray-100'">

                    {{-- Author --}}
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl overflow-hidden shrink-0" :class="$store.theme.darkMode ? 'bg-gray-700' : 'bg-gray-100'">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($article->author->name ?? 'User') }}&background=DBEAFE&color=1d4ed8&size=80"
                                 alt="Avatar" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-[13.5px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-100' : 'text-gray-800'">
                                {{ $article->author->name ?? 'Admin' }}
                            </p>
                            <p class="text-[11px] font-medium" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Penulis Artikel</p>
                        </div>
                    </div>

                    {{-- Timestamps --}}
                    <div class="flex flex-wrap items-center gap-6 text-[12.5px] font-semibold"
                         :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Dibuat: {{ $article->created_at->format('d M Y · H:i') }} WIB</span>
                        </div>
                        @if($article->published_at)
                        <div class="flex items-center gap-2 text-emerald-500">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Terbit: {{ $article->published_at->format('d M Y · H:i') }} WIB</span>
                        </div>
                        @endif
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>{{ number_format($article->views_count ?? 0) }} views</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ARTICLE CONTENT CARD --}}
        <div class="rounded-3xl p-8 mb-8 shadow-sm transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827]' : 'bg-white'">
            <div class="prose prose-lg max-w-none transition-colors duration-300"
                 :class="$store.theme.darkMode ? 'prose-invert text-gray-300' : 'text-gray-700'">
                <div class="leading-relaxed text-[15.5px] article-content" style="word-break: break-word;">{!! $article->content !!}</div>
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('superadmin.articles.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border text-[13px] font-bold transition-all duration-200 hover:-translate-y-0.5"
               :class="$store.theme.darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-700/50' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>

            <a href="{{ route('superadmin.articles.edit', $article->id) }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-[13px] font-bold transition-all duration-200 hover:-translate-y-0.5 shadow-lg shadow-blue-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                Edit Artikel
            </a>

            {{-- Slug / Public URL (only if published) --}}
            @if($article->is_published && $article->slug)
            <a href="{{ route('news.detail', $article->slug) }}" target="_blank"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-[13px] font-bold transition-all duration-200 hover:-translate-y-0.5 shadow-lg shadow-emerald-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                Lihat di Website
            </a>
            @endif
        </div>

    </div>
</div>
@endsection


