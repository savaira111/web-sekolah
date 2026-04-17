@extends('layouts.app')

@section('title', $article->title . ' - SMKS Mahaputra Cerdas Utama')

@section('content')
<div class="bg-white min-h-screen pt-4 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Main Content Area (Left) -->
            <div class="lg:col-span-8">

                <div class="flex items-start gap-4 mb-8">
                    <!-- Back Button -->
                    <div class="shrink-0 pt-2">
                        <a href="{{ route('news') }}" 
                           class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white border border-gray-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-blue-500/20 group" 
                           title="Kembali ke Daftar Berita">
                            <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Featured Image -->
                    <div class="flex-1 relative rounded-[1.5rem] overflow-hidden shadow-2xl aspect-video group">
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
                </div>

                <!-- Article Header -->
                <div class="mb-10">
                    <h1 class="text-2xl lg:text-2xl font-extrabold text-[#0F172A] leading-[1.2] mb-6 tracking-tight">
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
                <div class="prose prose-lg prose-blue max-w-none article-body">
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
                <div class="mt-10 pt-8 border-t border-gray-100 flex flex-wrap items-center justify-between gap-8">
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tags:</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-bold rounded-full hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-default">{{ $article->category }}</span>
                            <span class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-bold rounded-full hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-default">PPLG</span>
                            <span class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-bold rounded-full hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-default">Industri</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4" x-data="{ 
                        showToast: false,
                        copyLink() {
                            navigator.clipboard.writeText(window.location.href);
                            this.showToast = true;
                            setTimeout(() => this.showToast = false, 3000);
                        }
                    }">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Bagikan:</span>
                        <div class="flex items-center gap-3 relative">
                            <!-- Toast Notification -->
                            <div x-show="showToast" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 transform translate-y-0"
                                 x-transition:leave-end="opacity-0 transform translate-y-2"
                                 class="absolute -top-12 left-1/2 -translate-x-1/2 px-4 py-2 bg-gray-900 text-white text-[10px] font-bold rounded-xl shadow-xl whitespace-nowrap z-50">
                                Link berhasil disalin!
                            </div>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-400 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                            <button @click="copyLink()" class="w-9 h-9 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-gray-800 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

                @if($article->allow_comments)
                <!-- Comments Section -->
                <script>
                    function commentSystem() {
                        return {
                            name: '',
                            email: '',
                            newComment: '',
                            isSubmitting: false,
                            showSuccess: false,
                            showError: false,
                            errorMessage: '',
                            comments: @json($comments ?? []) || [],
                            addComment() {
                                if (!this.name || !this.email || !this.newComment) {
                                    this.errorMessage = 'Mohon isi semua field (Nama, Email, dan Komentar)';
                                    this.showError = true;
                                    setTimeout(() => this.showError = false, 5000);
                                    return;
                                }
                                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                if (!emailPattern.test(this.email)) {
                                    this.errorMessage = 'Format email tidak valid!';
                                    this.showError = true;
                                    setTimeout(() => this.showError = false, 5000);
                                    return;
                                }
                                this.isSubmitting = true;
                                fetch(`{{ route('news.comments.store', $article->id) }}`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        name: this.name,
                                        email: this.email,
                                        body: this.newComment
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    this.isSubmitting = false;
                                    if (data.success) {
                                        this.showSuccess = true;
                                        this.name = '';
                                        this.email = '';
                                        this.newComment = '';
                                        setTimeout(() => this.showSuccess = false, 5000);
                                    } else {
                                        this.errorMessage = data.message || 'Terjadi kesalahan saat mengirim komentar.';
                                        this.showError = true;
                                        setTimeout(() => this.showError = false, 5000);
                                    }
                                })
                                .catch(error => {
                                    this.isSubmitting = false;
                                    this.errorMessage = 'Terjadi kesalahan koneksi. Silakan coba lagi.';
                                    this.showError = true;
                                    setTimeout(() => this.showError = false, 5000);
                                });
                            }
                        }
                    }
                </script>
                <div class="mt-20 p-8 bg-gray-50 rounded-[2rem] border border-gray-100 shadow-sm" x-cloak x-data="commentSystem()">
                    <!-- Error Popup Notification -->
                    <div x-show="showError" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="fixed top-24 left-1/2 -translate-x-1/2 z-[100] w-[90%] max-w-md p-4 bg-red-600 text-white rounded-2xl shadow-2xl flex items-center gap-4 border border-red-500">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-black uppercase tracking-tight">Opps! Terjadi Kesalahan</h4>
                            <p class="text-xs font-medium text-white/90" x-text="errorMessage"></p>
                        </div>
                        <button @click="showError = false" class="p-1 hover:bg-white/10 rounded-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 rounded-2xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-extrabold text-[#0F172A]">Komentar (<span x-text="comments ? comments.length : 0"></span>)</h2>
                    </div>

                    <div class="space-y-4 mb-12">
                        <template x-for="(comment, index) in comments" :key="index">
                            <div class="flex flex-col sm:flex-row gap-6 p-6 bg-white rounded-3xl shadow-sm border border-gray-50 transition-all duration-500 hover:shadow-md">
                                <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center shrink-0">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-bold text-[#0F172A]" x-text="comment.name"></h4>
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest" x-text="new Date(comment.created_at).toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'}) + ' - ' + new Date(comment.created_at).toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'})"></span>
                                    </div>
                                    <p class="text-gray-500 text-sm leading-relaxed" x-text="comment.body"></p>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Comment Form -->
                    <form @submit.prevent="addComment()" class="space-y-6 pt-8 border-t border-gray-200/60">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-[#0F172A]">Tinggalkan Komentar</h3>
                            <p class="text-xs text-gray-400 font-medium italic">Email Anda tidak akan dipublikasikan. Komentar akan ditinjau oleh admin sebelum ditampilkan.</p>
                        </div>

                        <!-- Success Message -->
                        <div x-show="showSuccess" x-transition class="p-6 bg-green-50 border border-green-100 rounded-3xl flex items-center gap-4 text-green-700 shadow-sm">
                            <div class="w-10 h-10 bg-green-600 text-white rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-black uppercase">Berhasil Dikirim!</h4>
                                <p class="text-xs font-semibold opacity-80">Komentar Anda sedang menunggu persetujuan admin.</p>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-2">Nama Lengkap</label>
                                <input type="text" x-model="name" placeholder="Nama Anda" class="w-full bg-white border border-gray-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none text-sm font-medium">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-2">Alamat Email</label>
                                <input type="email" x-model="email" placeholder="nama@email.com" class="w-full bg-white border border-gray-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none text-sm font-medium">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-2">Isi Komentar</label>
                            <textarea x-model="newComment" placeholder="Tulis komentar Anda di sini..." class="w-full bg-white border border-gray-200 rounded-[1.5rem] p-6 h-32 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none text-sm font-medium"></textarea>
                        </div>

                        <button :disabled="isSubmitting"
                                type="submit"
                                class="inline-flex items-center justify-center gap-3 px-10 py-5 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:scale-100 transition-all shadow-xl shadow-blue-500/20 min-w-[240px] uppercase tracking-widest text-sm relative z-30">
                            
                            <div x-show="!isSubmitting" class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                <span class="font-bold">Kirim Komentar</span>
                            </div>

                            <div x-show="isSubmitting" style="display: none;" class="flex items-center gap-3">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                <span class="font-bold">Memproses...</span>
                            </div>
                        </button>
                    </form>
                </div>

                @endif
            </div>

            <!-- Sidebar Area (Right) -->
            <aside class="lg:col-span-4 space-y-10">
                
                <!-- Search Card -->
                <div class="p-6 bg-white rounded-[1.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group relative z-50">
                    <h3 class="text-xl font-bold text-[#0F172A] mb-8 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Cari Artikel
                    </h3>
                    <form action="{{ route('news') }}" method="GET" class="relative group pointer-events-auto z-20">
                        <input type="text" name="search" placeholder="Ketik judul berita..." 
                               class="w-full py-4 pl-6 pr-14 bg-gray-50 rounded-2xl border-2 border-transparent focus:border-blue-100 focus:bg-white focus:ring-0 transition-all text-sm font-medium relative z-10">
                        <button type="submit" title="Cari" class="absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all group-hover:scale-105 active:scale-95 z-50 cursor-pointer pointer-events-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Popular News Card -->
                <div class="p-6 bg-white rounded-[1.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#0F172A]">Berita Terpopuler</h3>
                    </div>
                    
                    <div class="space-y-4">
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



                <!-- CTA Card -->
                <div class="relative p-6 rounded-[1.5rem] bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden shadow-2xl shadow-blue-500/40 group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-10 blur-3xl transition-transform duration-700 group-hover:scale-150"></div>
                    <div class="relative z-10 space-y-4">
                        <h3 class="text-xl font-black leading-tight">Ingin Bergabung Bersama Kami?</h3>
                        <p class="text-sm text-blue-100/80 leading-relaxed font-medium">Pendaftaran Peserta Didik Baru (PPDB) TA 2026/2027 telah dibuka secara resmi. Segera amankan kuota Anda!</p>
                        <a href="{{ route('enrollment.guide') }}" class="block w-full py-4 bg-white text-blue-600 text-center rounded-2xl font-black text-sm shadow-xl hover:bg-blue-50 hover:scale-[1.02] active:scale-[0.98] transition-all">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</div>
@endsection
