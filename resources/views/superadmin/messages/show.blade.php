@extends('layouts.superadmin.app')

@section('title', 'Detail Pesan - Mahaputra')

@section('content')
<div class="px-8 pb-8 flex-1 w-full max-w-7xl mx-auto mt-8">
    
    @if(session('success'))
    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-600 font-bold text-sm flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 text-red-600 font-bold text-sm flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        {{ session('error') }}
    </div>
    @endif
    
    <!-- Breadcrumb & Header Box -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-6 border-b transition-colors duration-300 gap-4" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-200'">
        <div class="flex items-center gap-4">
            <a href="{{ route('superadmin.messages.index') }}" 
               class="inline-flex items-center justify-center w-10 h-10 rounded-xl transition-all duration-300 shadow-sm border group" 
               :class="$store.theme.darkMode ? 'bg-gray-800 border-gray-700 text-gray-400 hover:text-white' : 'bg-white border-gray-200 text-gray-500 hover:text-blue-600'"
               title="Kembali">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <div class="flex items-center gap-2 text-xs font-medium mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">
                    <a href="/superadmin/dashboard" class="hover:text-blue-500 transition-colors">Dashboard</a>
                    <span>›</span>
                    <a href="/superadmin/messages" class="hover:text-blue-500 transition-colors">Pesan Masuk</a>
                    <span>›</span>
                    <span :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'">Detail Pesan</span>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight leading-none transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Detail Pesan Masuk</h2>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <form action="{{ route('superadmin.messages.destroy', $message->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')" class="px-8 py-2.5 bg-red-500 text-white text-sm font-bold rounded-xl hover:bg-red-600 transition-colors duration-300 shadow-md shadow-red-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Hapus Pesan
                </button>
            </form>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Left Column (Message Content) -->
        <div class="flex-1 space-y-8">
            <div class="rounded-[2.5rem] overflow-hidden transition-colors duration-300 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827] border border-gray-800' : 'bg-white border-gray-100'">
                <div class="p-10 lg:p-14">
                    <h1 class="text-3xl sm:text-4xl lg:text-3xl font-black tracking-tight leading-[1.1] mb-8 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $message->subject }}</h1>
                    
                    <!-- Article Meta -->
                    <div class="flex flex-wrap items-center gap-6 pb-8 mb-8 border-b transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-200'">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-gray-800 text-white' : 'bg-blue-100 text-blue-600'">
                                {{ substr($message->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-500'">Dari</p>
                                <p class="text-sm font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $message->name }}</p>
                            </div>
                        </div>
                        <div class="w-px h-10 transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-gray-800' : 'bg-gray-200'"></div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-500'">Diterima</p>
                            <div class="flex items-center gap-2 text-sm font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $message->created_at->format('d M Y, H:i') }} WIB
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Blocks -->
                    <article class="prose prose-lg max-w-none transition-colors duration-300" :class="$store.theme.darkMode ? 'prose-invert text-gray-300 prose-p:text-gray-300 prose-headings:text-white' : 'text-gray-700'">
                        <p>{!! nl2br(e($message->message)) !!}</p>
                    </article>

                    <div id="reply-form" class="mt-16 pt-12 border-t transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-200'">
                        <h3 class="text-xl font-bold mb-6 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Kirim Balasan</h3>
                        <form action="{{ route('superadmin.messages.reply', $message->id) }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <textarea name="reply_message" rows="6" class="w-full p-5 rounded-2xl border transition-all duration-300 outline-none focus:ring-4 focus:ring-blue-500/10" :class="$store.theme.darkMode ? 'bg-gray-800 border-gray-700 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 focus:border-blue-400'" placeholder="Tulis balasan Anda di sini..." required></textarea>
                            </div>
                            <button type="submit" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl shadow-blue-500/20 flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                Kirim Balasan Ke {{ $message->email }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column (Sidebar Details) -->
        <div class="w-full lg:w-[22rem] space-y-6">
            <div class="rounded-[1.5rem] p-8 transition-colors duration-300 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827] border border-gray-800' : 'bg-white border-gray-100'">
                <h3 class="text-sm font-extrabold tracking-widest uppercase mb-8 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-800'">
                    INFORMASI PENGIRIM
                </h3>

                <div class="space-y-6">
                    <!-- Detail Item -->
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-500'">Status</p>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            <span class="text-sm font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-900'">Sudah Dibaca</span>
                        </div>
                    </div>
                    
                    <hr class="transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                    
                    <!-- Detail Item -->
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-500'">Nama Pengirim</p>
                        <span class="font-medium text-sm transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $message->name }}</span>
                    </div>
                    
                    <hr class="transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">

                    <!-- Detail Item -->
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-500'">Email</p>
                        <div class="font-medium text-sm transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-700'">
                            <a href="mailto:{{ $message->email }}" class="text-blue-500 hover:underline">{{ $message->email }}</a>
                        </div>
                    </div>

                    <hr class="transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">

                    <!-- Detail Item -->
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-500'">Tanggal & Waktu</p>
                        <p class="text-sm font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-900'">{{ $message->created_at->format('d M Y') }}</p>
                        <p class="text-xs text-gray-500">{{ $message->created_at->format('H:i:s') }} WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
