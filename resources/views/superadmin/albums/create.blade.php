@extends('layouts.superadmin.app')
@section('title', 'Tambah Album - Admin Mahput')

@section('content')
<div x-data="{ 
    darkMode: localStorage.getItem('darkMode') === 'true',
    isToggled: true,
    uploadedPhotos: [
        { id: 1, src: '{{ asset('images/gedung-sekolah.jpg') }}' },
        { id: 2, src: '{{ asset('images/gedung-sekolah.jpg') }}' },
        { id: 3, src: '{{ asset('images/gedung-sekolah.jpg') }}' },
        { id: 4, src: '{{ asset('images/gedung-sekolah.jpg') }}' },
        { id: 5, src: '{{ asset('images/gedung-sekolah.jpg') }}' },
        { id: 6, src: '{{ asset('images/gedung-sekolah.jpg') }}' }
    ]
}" class="px-8 pb-8 flex-1 w-full max-w-[1400px]">

    <!-- Breadcrumbs & Header -->
    <div class="flex items-center justify-between mt-6 mb-4">
        <div class="flex items-center gap-2 text-xs font-medium text-gray-400">
            <a href="{{ route('superadmin.albums.index') }}" class="hover:text-blue-500 transition-colors">Manajemen Album</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-900" :class="darkMode ? 'text-white' : 'text-gray-900'">Tambah Album</span>
        </div>
        
        <div class="flex items-center gap-4">
            <button class="p-2 text-gray-400 hover:text-blue-500 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </button>
            <button class="p-2 text-gray-400 hover:text-blue-500 transition-colors relative">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white" :class="darkMode ? 'border-[#0F172A]' : 'border-white'"></span>
            </button>
        </div>
    </div>

    <h2 class="text-2xl font-extrabold mb-8 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Tambah Album Baru</h2>

    <a href="{{ route('superadmin.albums.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-gray-400 hover:text-blue-500 transition-colors mb-8">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar
    </a>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Left Column: Form -->
        <div class="flex-1 space-y-8">
            <!-- Information Card -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center" :class="darkMode ? 'bg-orange-500/10' : 'bg-orange-50'">
                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold" :class="darkMode ? 'text-white' : 'text-gray-900'">Informasi Album</h3>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Nama Album</label>
                        <input type="text" placeholder="Masukkan nama album..." class="w-full px-5 py-3.5 rounded-xl border outline-none transition-all duration-300" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Kategori</label>
                            <div class="relative">
                                <select class="w-full px-5 py-3.5 rounded-xl border outline-none appearance-none transition-all duration-300" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Wisuda">Wisuda</option>
                                    <option value="Eskul">Eskul</option>
                                    <option value="Akademik">Kegiatan Akademik</option>
                                    <option value="PPDB">PPDB</option>
                                </select>
                                <svg class="w-4 h-4 absolute right-5 top-4.5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tanggal Acara</label>
                            <div class="relative">
                                <input type="text" placeholder="DD/MM/YYYY" class="w-full px-5 py-3.5 rounded-xl border outline-none transition-all duration-300" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                <svg class="w-4 h-4 absolute right-5 top-4.5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Deskripsi Album</label>
                        <textarea rows="4" placeholder="Tuliskan deskripsi lengkap album kegiatan di sini..." class="w-full px-5 py-3.5 rounded-xl border outline-none transition-all duration-300 resize-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'"></textarea>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-gray-50/50 rounded-2xl transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]' : 'bg-gray-50/50'">
                        <div>
                            <p class="text-sm font-extrabold" :class="darkMode ? 'text-white' : 'text-gray-900'">Tampilkan di Website</p>
                            <p class="text-xs font-bold text-gray-400 mt-1">Album akan terlihat secara publik oleh pengunjung</p>
                        </div>
                        <button @click="isToggled = !isToggled" 
                                class="w-12 h-6 rounded-full transition-colors duration-300 relative" 
                                :class="isToggled ? 'bg-orange-500' : 'bg-gray-300'">
                            <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full transition-transform duration-300" :class="isToggled ? 'translate-x-6' : ''"></div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Upload Card -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center" :class="darkMode ? 'bg-blue-500/10' : 'bg-blue-50'">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold" :class="darkMode ? 'text-white' : 'text-gray-900'">Unggah Foto Baru</h3>
                </div>

                <div class="border-2 border-dashed rounded-[2rem] p-12 flex flex-col items-center justify-center transition-colors duration-300" :class="darkMode ? 'border-gray-800 bg-[#0F172A]' : 'border-gray-200 bg-gray-50/30'">
                    <div class="w-16 h-16 rounded-3xl bg-orange-50 flex items-center justify-center mb-6" :class="darkMode ? 'bg-orange-500/10' : 'bg-orange-50'">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                    </div>
                    <p class="text-base font-extrabold mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Tarik dan lepas foto di sini</p>
                    <p class="text-xs font-bold text-gray-400 mb-8 uppercase tracking-widest">Format JPG, PNG atau WEBP (Maks. 5MB per file)</p>
                    <button class="px-8 py-3 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 transition-all shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-700 text-gray-300 hover:bg-gray-800' : ''">Pilih File</button>
                </div>
            </div>
        </div>

        <!-- Right Column: Photos Sidebar -->
        <div class="w-full lg:w-[380px]">
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border sticky top-28 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center" :class="darkMode ? 'bg-orange-500/10' : 'bg-orange-50'">
                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="text-lg font-extrabold" :class="darkMode ? 'text-white' : 'text-gray-900'">Foto Terunggah</h3>
                    </div>
                    <span class="px-3 py-1 bg-gray-100 rounded-full text-[10px] font-black text-gray-500" :class="darkMode ? 'bg-gray-800 text-gray-400' : 'bg-gray-100 text-gray-500'">12 Foto</span>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <template x-for="photo in uploadedPhotos" :key="photo.id">
                        <div class="aspect-square rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition-all hover:scale-[1.03]" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                            <img :src="photo.src" class="w-full h-full object-cover">
                        </div>
                    </template>
                </div>

                <button class="w-full py-4 rounded-xl bg-blue-50 text-blue-600 text-sm font-bold hover:bg-blue-100 transition-all" :class="darkMode ? 'bg-blue-500/10 text-blue-400 hover:bg-blue-500/20' : 'bg-blue-50 text-blue-600'">Lihat Semua Foto</button>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons Footer -->
    <div class="mt-12 pt-8 border-t flex items-center justify-end gap-4" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
        <a href="{{ route('superadmin.albums.index') }}" class="px-8 py-4 font-bold text-gray-400 hover:text-gray-700 transition-colors">Batal</a>
        <button class="px-12 py-4 bg-[#0F172A] text-white font-bold rounded-2xl shadow-xl hover:bg-black transition-all">Simpan Album</button>
    </div>

</div>
@endsection

@push('scripts')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
