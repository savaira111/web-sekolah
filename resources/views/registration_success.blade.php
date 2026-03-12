@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil - SMKS Mahaputra')

@section('content')
<section x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)" class="min-h-screen bg-[#0F172A]/90 flex items-center justify-center p-4">
    <div x-show="show" 
         x-transition:enter="transition ease-out duration-700"
         x-transition:enter-start="opacity-0 scale-90 translate-y-12"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         class="max-w-md w-full bg-white rounded-[3rem] p-10 shadow-2xl space-y-8 text-center relative overflow-hidden">
        
        <!-- Animated Background Decor -->
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-green-50 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-blue-50 rounded-full blur-3xl opacity-50"></div>

        <!-- Close/Home Button -->
        <a href="{{ route('home') }}" class="absolute top-6 right-6 w-12 h-12 bg-gray-50 text-gray-400 hover:bg-gray-100 hover:text-[#0F172A] rounded-full flex items-center justify-center transition-all z-20 group" title="Kembali ke Beranda">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
        </a>

        <!-- Success Icon -->
        <div class="relative z-10">
            <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto shadow-xl shadow-green-200 animate-bounce">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
            </div>
        </div>

        <!-- Text Content -->
        <div class="space-y-3 relative z-10">
            <h1 class="text-2xl lg:text-3xl font-bold text-[#0F172A]">Pendaftaran Berhasil!</h1>
            <p class="text-gray-500 text-sm">Terima kasih, data Anda telah kami terima dengan ID Pendaftaran:</p>
            <div class="bg-blue-50 py-3 rounded-2xl border border-blue-100">
                <span class="text-xl font-black text-blue-600 tracking-wider">REG-{{ date('Y') }}{{ strtoupper(substr(md5(time()), 0, 4)) }}</span>
            </div>
        </div>

        <!-- Status Card -->
        <div class="bg-gray-50 rounded-3xl p-6 flex items-center gap-6 border border-gray-100 relative z-10">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div class="text-left space-y-1">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Status Berkas</p>
                <p class="text-sm font-bold text-[#0F172A]">Menunggu Verifikasi Admin</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4 relative z-10">
            <button class="w-full py-4 bg-blue-600 text-white rounded-[1.5rem] font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all flex items-center justify-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Unduh Bukti Pendaftaran
            </button>
            <a href="{{ route('home') }}" class="block text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors">Kembali ke Beranda</a>
        </div>

        <!-- Footer Note -->
        <p class="text-[10px] text-gray-400 relative z-10">Butuh bantuan? <a href="#" class="text-blue-600 font-bold underline">Hubungi Admin PPDB</a></p>
    </div>
</section>
@endsection
