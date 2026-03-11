@extends('layouts.superadmin.app')
@section('title', 'Artikel & Berita - EduAdmin Pro')

@section('content')
<div class="p-8 flex-1 w-full overflow-x-auto transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]' : 'bg-[#F3F4F6]'">
    
    <div class="flex items-center gap-2 mb-6 text-[13px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
        <a href="/superadmin/dashboard" class="hover:text-blue-600 transition-colors">Dashboard</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="font-bold" :class="darkMode ? 'text-blue-400' : 'text-blue-600'">Manajemen Artikel</span>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8">
        <div class="max-w-xl">
            <h1 class="text-[28px] font-extrabold tracking-tight transition-colors duration-300 mb-2" :class="darkMode ? 'text-white' : 'text-[#111827]'">Artikel & Berita</h1>
            <p class="text-[15px] font-medium transition-colors duration-300 leading-relaxed" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola dan publikasikan berita resmi sekolah serta artikel komunikasi.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-4">
            <div class="flex items-center p-1.5 rounded-full border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-700' : 'bg-white border-gray-200'">
                <button class="px-6 py-2 rounded-full text-sm font-bold transition-all" :class="darkMode ? 'bg-[#0F172A] text-white shadow' : 'bg-gray-900 text-white shadow'">Semua Postingan</button>
                <button class="px-6 py-2 rounded-full text-sm font-medium transition-all" :class="darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'">Diterbitkan</button>
                <button class="px-6 py-2 rounded-full text-sm font-medium transition-all" :class="darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-600 hover:text-gray-900'">Draf</button>
            </div>

            <a href="/superadmin/articles/create" class="px-6 py-2.5 bg-[#3B82F6] hover:bg-[#2563EB] text-white text-sm font-bold rounded-full transition-all duration-300 shadow-lg shadow-blue-500/30 flex items-center justify-center gap-2 shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Buat Artikel
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="darkMode ? 'bg-[#1E293B] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-blue-500 text-white shadow-lg shadow-blue-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-400'">TOTAL ARTIKEL</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ number_format($total ?? 0) }}</h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="darkMode ? 'bg-[#1E293B] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-emerald-500 text-white shadow-lg shadow-emerald-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-400'">DITERBITKAN</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ number_format($published ?? 0) }}</h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="darkMode ? 'bg-[#1E293B] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-orange-500 text-white shadow-lg shadow-orange-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-400'">DRAF</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ number_format($drafts ?? 0) }}</h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="darkMode ? 'bg-[#1E293B] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-purple-500 text-white shadow-lg shadow-purple-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-400'">TOTAL DILIHAT</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ number_format($views ?? 0) }}</h3>
            </div>
        </div>
    </div>

    <div class="rounded-[2rem] p-6 lg:p-8 transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] shadow-black/20' : 'bg-white shadow-gray-200/50'">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 pb-6 border-b transition-colors duration-300 gap-4" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
            <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                <h3 class="text-xl font-black transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-[#111827]'">Postingan Terbaru</h3>
                <div class="flex items-center gap-3">
                    <button class="px-5 py-2.5 rounded-full text-[13.5px] font-bold flex items-center gap-2.5 transition-all duration-300 shadow-sm border border-gray-100 hover:shadow hover:-translate-y-0.5" :class="darkMode ? 'bg-[#111827] text-gray-300 hover:bg-[#1E293B] border-gray-800 shadow-black/20' : 'bg-white text-gray-700 hover:border-gray-200'">
                        <svg class="w-4 h-4 ml-0.5" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg> 
                        Kategori
                    </button>
                    <button class="px-5 py-2.5 rounded-full text-[13.5px] font-bold flex items-center gap-2.5 transition-all duration-300 shadow-sm border border-gray-100 hover:shadow hover:-translate-y-0.5" :class="darkMode ? 'bg-[#111827] text-gray-300 hover:bg-[#1E293B] border-gray-800 shadow-black/20' : 'bg-white text-gray-700 hover:border-gray-200'">
                        <svg class="w-4 h-4 ml-0.5" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25"></path></svg> 
                        Tanggal
                    </button>
                </div>
            </div>
            <p class="text-[13px] font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-400'">Menampilkan {{ $articles->firstItem() ?? 0 }}-{{ $articles->lastItem() ?? 0 }} dari {{ number_format($articles->total() ?? 0) }} artikel</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest pl-2 transition-colors duration-300 w-2/5" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Judul Artikel</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Kategori</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Penulis</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Status</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest text-right pr-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'"></th>
                    </tr>
                </thead>
                <tbody class="text-[14px]">
                    @forelse($articles as $article)
                    <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                        <td class="py-5 transition-colors duration-300 pl-2">
                            <div class="flex items-center gap-4">
                                @if($article->featured_image)
                                <div class="w-14 h-14 rounded-full overflow-hidden shrink-0 border-[3px]" :class="darkMode ? 'border-[#1E293B]' : 'border-gray-100'">
                                    <img src="{{ asset('storage/' . $article->featured_image) }}" class="w-full h-full object-cover opacity-90" alt="{{ $article->title }}">
                                </div>
                                @else
                                <div class="w-14 h-14 rounded-full overflow-hidden shrink-0 flex items-center justify-center border-[3px]" :class="darkMode ? 'border-[#1E293B] bg-[#0F172A] text-blue-400' : 'border-gray-100 bg-[#EBF1FF] text-[#2563EB]'">
                                    <svg class="w-6 h-6 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                </div>
                                @endif
                                <div>
                                    <a href="{{ route('superadmin.articles.show', $article->id) }}" class="font-bold text-[15.5px] hover:text-blue-600 transition-colors duration-300 block mb-0.5 truncate max-w-[350px]" :class="darkMode ? 'text-white' : 'text-[#111827]'" title="{{ $article->title }}">{{ $article->title }}</a>
                                    <p class="text-[13px] transition-colors duration-300 font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Diperbarui {{ $article->updated_at->diffForHumans() }} • {{ number_format($article->views_count ?? 0) }} kali dilihat</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-5">
                            <span class="inline-block px-3 py-1 font-black text-[10px] rounded-full uppercase tracking-widest transition-colors duration-300" :class="darkMode ? 'bg-blue-500/10 text-blue-400' : 'bg-[#EBF1FF] text-[#2563EB]'">{{ $article->category }}</span>
                        </td>
                        <td class="py-5">
                            <div class="flex items-center gap-3 font-bold text-[14px] transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-[#111827]'">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center overflow-hidden shrink-0 border-2" :class="darkMode ? 'border-[#1E293B] bg-gray-500/20' : 'border-gray-50 bg-gray-100'">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($article->author->name ?? 'User') }}&background=E5E7EB&color=374151" alt="Avatar" class="w-full h-full object-cover">
                                </div>
                                <div class="leading-tight">
                                    @php
                                        $nameParts = explode(' ', $article->author->name ?? 'User');
                                        $firstName = array_shift($nameParts);
                                        $lastName = implode(' ', $nameParts);
                                    @endphp
                                    {{ $firstName }}<br>@if($lastName)<span class="font-semibold text-gray-500 text-[13px]">{{ $lastName }}</span>@endif
                                </div>
                            </div>
                        </td>
                        <td class="py-5">
                            @if($article->is_published)
                            <div class="inline-flex items-center gap-2 font-black text-[11px] uppercase tracking-widest" :class="darkMode ? 'text-emerald-400' : 'text-[#059669]'">
                                <span class="w-2.5 h-2.5 rounded-full" :class="darkMode ? 'bg-emerald-400' : 'bg-[#059669]'"></span> DITERBITKAN
                            </div>
                            @else
                            <div class="inline-flex items-center gap-2 font-black text-[11px] uppercase tracking-widest" :class="darkMode ? 'text-gray-500' : 'text-[#9CA3AF]'">
                                <span class="w-2.5 h-2.5 rounded-full" :class="darkMode ? 'bg-gray-600' : 'bg-[#D1D5DB]'"></span> DRAF
                            </div>
                            @endif
                        </td>
                        <td class="py-5 text-right pr-2 w-24">
                            <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('superadmin.articles.edit', $article->id) }}" class="w-8 h-8 rounded-full border flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors" :class="darkMode ? 'border-gray-700 text-blue-400 hover:bg-gray-800' : 'border-gray-200'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                <button @click="isDeleteModalOpen = true; articleToDelete = {{ $article->id }}" class="w-8 h-8 rounded-full border flex items-center justify-center text-red-500 hover:bg-red-50 transition-colors" :class="darkMode ? 'border-gray-700 text-red-400 hover:bg-gray-800' : 'border-gray-200'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                <p class="text-[14px] font-bold">Tidak ada artikel ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($articles->hasPages())
        <div class="mt-8 pt-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
            @if ($articles->onFirstPage())
            <button disabled class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 opacity-50 cursor-not-allowed" :class="darkMode ? 'border-gray-700 text-gray-500' : 'border-gray-200 text-gray-400'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Sebelumnya
            </button>
            @else
            <a href="{{ $articles->previousPageUrl() }}" class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 hover:bg-gray-50" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-[#111827]'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Sebelumnya
            </a>
            @endif

            <div class="flex items-center gap-1.5 font-bold">
                @php
                    $start = max($articles->currentPage() - 2, 1);
                    $end = min($articles->currentPage() + 2, $articles->lastPage());
                @endphp
                
                @if($start > 1)
                    <a href="{{ $articles->url(1) }}" class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 hover:bg-gray-100" :class="darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-600'">1</a>
                    @if($start > 2)
                        <span class="w-10 h-10 flex items-center justify-center" :class="darkMode ? 'text-gray-600' : 'text-gray-400'">...</span>
                    @endif
                @endif

                @foreach ($articles->getUrlRange($start, $end) as $page => $url)
                    @if ($page == $articles->currentPage())
                    <button class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 bg-[#111827] text-white" :class="darkMode ? 'bg-white text-[#0F172A]' : 'bg-[#111827] text-white'">{{ $page }}</button>
                    @else
                    <a href="{{ $url }}" class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 hover:bg-gray-100" :class="darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-600'">{{ $page }}</a>
                    @endif
                @endforeach

                @if($end < $articles->lastPage())
                    @if($end < $articles->lastPage() - 1)
                        <span class="w-10 h-10 flex items-center justify-center" :class="darkMode ? 'text-gray-600' : 'text-gray-400'">...</span>
                    @endif
                    <a href="{{ $articles->url($articles->lastPage()) }}" class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 hover:bg-gray-100" :class="darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-600'">{{ $articles->lastPage() }}</a>
                @endif
            </div>

            @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}" class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 hover:bg-gray-50" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-[#111827]'">
                Berikutnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            @else
            <button disabled class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 opacity-50 cursor-not-allowed" :class="darkMode ? 'border-gray-700 text-gray-500' : 'border-gray-200 text-gray-400'">
                Berikutnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
            @endif
        </div>
        @endif
    </div>

    <div x-show="isDeleteModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="isDeleteModalOpen = false"></div>
        <div class="relative w-full max-w-md rounded-2xl p-6 md:p-8 shadow-2xl transition-all duration-300 transform" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white shadow-xl'">
            <div class="w-12 h-12 rounded-full bg-red-100/10 flex items-center justify-center mb-6 border-2 border-red-500/20 mx-auto">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            
            <div class="text-center mb-8">
                <h3 class="text-xl font-extrabold mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Konfirmasi Penghapusan</h3>
                <p class="text-sm font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan dan semua data terkait akan hilang permanen.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button @click="isDeleteModalOpen = false; articleToDelete = null" type="button" class="flex-1 px-4 py-3 rounded-full text-sm font-bold shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md" :class="darkMode ? 'text-gray-300 bg-[#334155] hover:bg-[#475569]' : 'text-gray-700 bg-gray-100 hover:bg-gray-200'">Batal</button>
                <button @click="isDeleteModalOpen = false; isSuccessModalOpen = true; articleToDelete = null" type="button" class="flex-1 px-4 py-3 rounded-full text-white text-sm font-bold bg-red-500 hover:bg-red-600 transition-colors duration-300 shadow-lg shadow-red-500/20">Ya, Hapus Artikel</button>
            </div>
        </div>
    </div>

    <div x-show="isSuccessModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="isSuccessModalOpen = false"></div>
        <div class="relative w-full max-w-sm rounded-2xl p-6 shadow-2xl transition-all duration-300 transform" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white shadow-xl'" x-init="$watch('isSuccessModalOpen', value => { if(value) setTimeout(() => isSuccessModalOpen = false, 3000) })">
            <div class="w-12 h-12 rounded-full bg-emerald-100/10 flex items-center justify-center mb-4 border-2 border-emerald-500/20 mx-auto">
                <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <div class="text-center">
                <h3 class="text-lg font-extrabold mb-1" :class="darkMode ? 'text-white' : 'text-gray-900'">Berhasil!</h3>
                <p class="text-sm font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Data artikel telah berhasil dihapus dari sistem.</p>
            </div>
        </div>
    </div>
</div>
@endsection