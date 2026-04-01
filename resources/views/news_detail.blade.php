@extends('layouts.app')

@section('title', $article->title . ' - SMKS Mahaputra Cerdas Utama')

@section('content')
<div class="bg-white min-h-screen pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex mb-8 text-sm font-medium" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-blue-600 transition-colors">Beranda</a>
                </li>
                <li class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <a href="{{ route('news') }}" class="text-gray-400 hover:text-blue-600 transition-colors">Berita</a>
                </li>
                <li class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-gray-900">Detail Berita</span>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Content Area (Left) -->
            <div class="lg:col-span-8">

                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('news') }}" 
                       class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white border border-gray-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-blue-500/20 group" 
                       title="Kembali ke Daftar Berita">
                        <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Featured Image -->
                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl mb-10 aspect-video group">
                    @if($article->featured_image)
                        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                        <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute bottom-6 left-6">
                        <span class="px-4 py-2 bg-blue-600 text-white text-[10px] font-bold rounded-lg uppercase tracking-widest shadow-lg">{{ $article->category }}</span>
                    </div>
                </div>

                <!-- Article Header -->
                <div class="mb-10">
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-[#0F172A] leading-[1.2] mb-6 tracking-tight">
                        {{ $article->title }}
                    </h1>
                    
                    <div class="flex flex-wrap items-center gap-6 text-sm text-gray-400 font-medium">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>Oleh : <span class="text-gray-900 font-bold">{{ $article->author->name ?? 'Admin Mahaputra' }}</span></span>
                        </div>
                        <div class="flex items-center gap-2 border-l border-gray-100 pl-6">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2 border-l border-gray-100 pl-6">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span>{{ number_format($article->views_count ?? 0) }} Dilihat</span>
                        </div>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="prose prose-lg prose-blue max-w-none text-gray-600 leading-relaxed space-y-8 font-medium">
                    <style>
                        .article-body blockquote {
                            border-left: 4px solid #3b82f6;
                            padding-left: 1.5rem;
                            font-style: italic;
                            color: #1e293b;
                            background: #f8fafc;
                            border-radius: 0 1rem 1rem 0;
                            padding: 1.5rem 2rem;
                            margin: 2rem 0;
                        }
                        .article-body img {
                            border-radius: 2rem;
                            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                        }
                    </style>
                    <div class="article-body">
                        {!! $article->content !!}
                    </div>
                </div>

                <!-- Article Footer (Tags & Share) -->
                <div class="mt-16 pt-8 border-t border-gray-100 flex flex-wrap items-center justify-between gap-8">
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tags:</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-bold rounded-full hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-default">{{ $article->category }}</span>
                            <span class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-bold rounded-full hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-default">PPLG</span>
                            <span class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-bold rounded-full hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-default">Industri</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Bagikan:</span>
                        <div class="flex items-center gap-3">
                            <a href="#" class="w-9 h-9 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                            <a href="#" class="w-9 h-9 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-400 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                            <a href="#" class="w-9 h-9 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-gray-800 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                @if($article->allow_comments)
                <!-- Comments Section -->
                <div class="mt-20 p-10 bg-gray-50 rounded-[3rem] border border-gray-100 shadow-sm" x-data="{
                    newComment: '',
                    comments: [
                        { name: 'Ahmad Fauzi', date: '24 MEI 2026 - 14:20', body: 'Kegiatan yang sangat bermanfaat untuk menambah wawasan siswa tentang dunia kerja nyata!' },
                        { name: 'Siswa Teladan', date: '25 MEI 2026 - 09:15', body: 'Terima kasih informasinya, sangat memotivasi kami para junior!' }
                    ],
                    addComment() {
                        if (this.newComment.trim() === '') return;
                        const now = new Date();
                        const months = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'];
                        const dateStr = now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();
                        const timeStr = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
                        
                        this.comments.push({
                            name: 'Pengunjung Mahaputra',
                            date: dateStr + ' - ' + timeStr,
                            body: this.newComment
                        });
                        this.newComment = '';
                    }
                }">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 rounded-2xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-extrabold text-[#0F172A]">Komentar (<span x-text="comments.length"></span>)</h2>
                    </div>

                    <div class="space-y-8 mb-12">
                        <template x-for="(comment, index) in comments" :key="index">
                            <div class="flex flex-col sm:flex-row gap-6 p-6 bg-white rounded-3xl shadow-sm border border-gray-50 transition-all duration-500 hover:shadow-md">
                                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center shrink-0">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-bold text-[#0F172A]" x-text="comment.name"></h4>
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest" x-text="comment.date"></span>
                                    </div>
                                    <p class="text-gray-500 text-sm leading-relaxed" x-text="comment.body"></p>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Comment Form -->
                    <div class="space-y-6">
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Tinggalkan Komentar</h3>
                        <div class="relative group">
                            <textarea x-model="newComment" placeholder="Tulis komentar Anda di sini..." class="w-full bg-white border border-gray-200 rounded-3xl p-6 h-32 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none text-gray-700 placeholder:text-gray-300"></textarea>
                        </div>
                        <button @click="addComment()" class="px-8 py-3.5 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 hover:scale-105 active:scale-95 transition-all shadow-xl shadow-blue-500/20">
                            Kirim Komentar
                        </button>
                    </div>
                </div>
                @endif

            </div>

            <!-- Sidebar Area (Right) -->
            <aside class="lg:col-span-4 space-y-10">
                

                <!-- Popular News Card -->
                <div class="p-8 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#0F172A]">Berita Terpopuler</h3>
                    </div>
                    
                    <div class="space-y-8">
                        @foreach($relatedArticles as $pop)
                        <a href="{{ route('news.detail', $pop->slug) }}" class="flex gap-4 group/item">
                            <div class="w-20 h-20 rounded-2xl overflow-hidden shrink-0 shadow-sm group-hover/item:scale-105 transition-all duration-500">
                                @if($pop->featured_image)
                                    <img src="{{ asset('storage/' . $pop->featured_image) }}" alt="{{ $pop->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-blue-50 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-blue-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="text-sm font-bold text-[#0F172A] line-clamp-2 leading-snug mb-1 group-hover/item:text-blue-600 transition-colors">{{ $pop->title }}</h4>
                                <span class="text-[10px] font-bold text-gray-400">{{ $pop->published_at ? $pop->published_at->format('d M Y') : $pop->created_at->format('d M Y') }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="p-8 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group">
                    <h3 class="text-xl font-bold text-[#0F172A] mb-8">Kategori</h3>
                    <div class="space-y-3">
                        @php
                            $catCounts = [
                                'Kegiatan Sekolah' => 12,
                                'Prestasi Siswa' => 8,
                                'Info Pendaftaran' => 4,
                                'Artikel Edukasi' => 15
                            ];
                        @endphp
                        @foreach($catCounts as $name => $count)
                        <a href="#" class="flex items-center justify-between p-4 rounded-2xl bg-gray-50 hover:bg-blue-600 hover:text-white group/cat transition-all duration-300">
                            <span class="text-sm font-bold text-gray-600 group-hover/cat:text-white transition-colors">{{ $name }}</span>
                            <span class="w-7 h-7 rounded-lg bg-white flex items-center justify-center text-[10px] font-black text-blue-600 shadow-sm">{{ $count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- CTA Card -->
                <div class="relative p-8 rounded-[2.5rem] bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden shadow-2xl shadow-blue-500/40 group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16 blur-3xl transition-transform duration-700 group-hover:scale-150"></div>
                    <div class="relative z-10 space-y-4">
                        <h3 class="text-xl font-black leading-tight">Ingin Bergabung Bersama Kami?</h3>
                        <p class="text-sm text-blue-100/80 leading-relaxed font-medium">Pendaftaran Peserta Didik Baru (PPDB) TA 2026/2027 telah dibuka secara resmi. Segera amankan kuota Anda!</p>
                        <a href="{{ route('registration') }}" class="block w-full py-4 bg-white text-blue-600 text-center rounded-2xl font-black text-sm shadow-xl hover:bg-blue-50 hover:scale-[1.02] active:scale-[0.98] transition-all">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</div>
@endsection
