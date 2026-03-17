@extends('layouts.app')

@section('title', 'Hubungi Kami - SMKS Mahaputra Cerdas Utama')

@section('content')
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            HUBUNGI KAMI
        </div>
        <h1 class="text-4xl lg:text-6xl font-bold text-[#0F172A] leading-tight">
            Mari <span class="text-blue-600">Terhubung</span> <br>
            Dengan Kami
        </h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
            Punya pertanyaan mengenai pendaftaran atau fasilitas sekolah? Tim kami siap membantu memberikan informasi yang Anda butuhkan.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-24 items-start">
            <!-- Contact Form -->
            <div class="bg-white rounded-[3.5rem] p-8 lg:p-12 shadow-2xl shadow-blue-900/5 border border-gray-50">
                @if (session('success'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-2xl">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-2xl">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-sm font-bold text-gray-700">Nama Lengkap</label>
                            <div class="relative">
                                <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </span>
                                <input type="text" name="name" placeholder="Nama Lengkap Anda" class="w-full pl-14 pr-8 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="space-y-3">
                            <label class="text-sm font-bold text-gray-700">Alamat Email</label>
                            <div class="relative">
                                <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"></path></svg>
                                </span>
                                <input type="email" name="email" placeholder="contoh@email.com" class="w-full pl-14 pr-8 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <label class="text-sm font-bold text-gray-700">Subjek</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            </span>
                            <input type="text" name="subject" placeholder="Tujuan pesan anda" class="w-full pl-14 pr-8 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm" value="{{ old('subject') }}">
                        </div>
                    </div>
                    <div class="space-y-3">
                        <label class="text-sm font-bold text-gray-700">Pesan Anda</label>
                        <div class="relative">
                            <span class="absolute left-6 top-8 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            </span>
                            <textarea name="message" placeholder="Ceritakan bagaimana kami dapat membantu anda..." class="w-full pl-14 pr-8 py-6 h-48 bg-gray-50 rounded-3xl border-none focus:ring-2 focus:ring-blue-100 text-sm">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="w-full py-5 bg-blue-600 text-white rounded-[2rem] font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all flex items-center justify-center gap-3">
                        Kirim Pesan
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
                    </button>
                </form>
            </div>

            <!-- Contact Channels -->
            <div class="space-y-12">
                <div class="bg-blue-50 p-12 rounded-[4rem] space-y-12 border border-blue-100 shadow-sm">
                    <h3 class="text-2xl font-bold text-blue-900 flex items-center gap-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        Hubungi Kami
                    </h3>

                    <div class="space-y-8">
                        <div class="flex gap-6 group">
                            <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-blue-600 shadow-sm shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h5 class="font-bold text-blue-900 lowercase first-letter:uppercase">Kampus Kami</h5>
                                <p class="text-sm text-blue-700/70 leading-relaxed">Jl. Terusan Katapang Kulon No.24, Katapang, Kec. Katapang, Kabupaten Bandung, Jawa Barat 40971</p>
                            </div>
                        </div>

                        <div class="flex gap-6 group">
                            <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-blue-600 shadow-sm shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h5 class="font-bold text-blue-900 lowercase first-letter:uppercase">Layanan Telepon</h5>
                                <p class="text-sm text-blue-700 font-bold">+62 22 589 1234</p>
                                <p class="text-[10px] text-blue-700/50 font-medium">Senin-Jumat: 08:00 - 16:00 WIB</p>
                            </div>
                        </div>

                        <div class="flex gap-6 group">
                            <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-blue-600 shadow-sm shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h5 class="font-bold text-blue-900 lowercase first-letter:uppercase">Pertanyaan via Email</h5>
                                <a href="mailto:smkmahaputracerdasutama@gmail.com" class="text-sm text-blue-700 font-bold hover:underline">smkmahaputracerdasutama@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <a href="#" class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm hover:shadow-lg">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm hover:shadow-lg">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.07 4.849-.149 3.227-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm hover:shadow-lg">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Maps Section -->
<section class="h-[600px] w-full bg-gray-100 relative grayscale hover:grayscale-0 transition-all duration-1000">
    <iframe 
        src="https://maps.google.com/maps?q=SMKS%20MAHAPUTRA%20CERDAS%20UTAMA&t=&z=15&ie=UTF8&iwloc=&output=embed" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>
@endsection
