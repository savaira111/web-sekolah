@extends('layouts.superadmin.app')

@section('title', 'Manajemen Eskul - EduAdmin Pro')

@section('content')
<div class="p-8 flex-1 w-full overflow-x-auto transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]' : 'bg-[#F3F4F6]'">
    
    <!-- Top Breadcrumbs -->
    <div class="flex items-center gap-2 mb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
        <a href="/superadmin/dashboard" class="hover:text-blue-600 transition-colors">Dashboard</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="text-blue-600">Manajemen Eskul</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-[28px] font-extrabold tracking-tight transition-colors duration-300 mb-1" :class="darkMode ? 'text-white' : 'text-[#111827]'">Manajemen Eskul</h1>
            <p class="text-[14px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola dan pantau seluruh kegiatan ekstrakurikuler sekolah.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-3">
            <a href="{{ route('superadmin.eskul.create') }}" class="flex items-center gap-2 px-6 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 hover:bg-blue-700 hover:-translate-y-0.5 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Eskul Baru
            </a>
        </div>
    </div>

    {{-- Quick Info Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="rounded-3xl p-6 transition-all duration-300 flex items-center justify-between shadow-sm border" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold text-gray-400 tracking-widest uppercase mb-4">TOTAL ESKUL</p>
                <h3 class="text-3xl font-black transition-colors duration-300 leading-none" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ $extracurriculars->count() }}</h3>
            </div>
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-blue-50 text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
        </div>
        <div class="rounded-3xl p-6 transition-all duration-300 flex items-center justify-between shadow-sm border" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold text-gray-400 tracking-widest uppercase mb-4">AKTIF</p>
                <h3 class="text-3xl font-black transition-colors duration-300 leading-none" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ $activeCount }}</h3>
            </div>
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-emerald-50 text-emerald-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <div class="rounded-3xl p-6 transition-all duration-300 flex items-center justify-between shadow-sm border" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold text-gray-400 tracking-widest uppercase mb-4">NON-AKTIF</p>
                <h3 class="text-3xl font-black transition-colors duration-300 leading-none" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ $inactiveCount }}</h3>
            </div>
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-rose-50 text-rose-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>

    {{-- Eskul Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
        @foreach($extracurriculars as $eskul)
        <div class="rounded-[2.5rem] overflow-hidden shadow-sm transition-all duration-500 group border" :class="darkMode ? 'bg-[#1E293B] border-gray-800 hover:shadow-blue-500/10' : 'bg-white border-gray-100 hover:shadow-xl hover:shadow-blue-500/5'">
            {{-- Card Image --}}
            <div class="relative h-56 overflow-hidden">
                <img src="{{ $eskul->image ? asset('storage/' . $eskul->image) : 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop' }}" 
                     alt="{{ $eskul->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="absolute top-5 left-5">
                    <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md rounded-xl text-[10px] font-black text-blue-600 uppercase tracking-widest shadow-lg">{{ $eskul->category }}</span>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="p-8 flex flex-col">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="text-xl font-black transition-colors duration-300 mb-1" :class="darkMode ? 'text-white' : 'text-[#111827]'">{{ $eskul->name }}</h3>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full {{ $eskul->is_active ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                            <p class="text-xs font-bold uppercase tracking-widest" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">{{ $eskul->is_active ? 'Status: Aktif' : 'Status: Non-Aktif' }}</p>
                        </div>
                    </div>
                    
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="p-2 transition-colors rounded-xl" :class="darkMode ? 'hover:bg-gray-800 text-gray-400' : 'hover:bg-gray-50 text-gray-400'">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                             class="absolute right-0 mt-2 w-48 rounded-2xl shadow-2xl border py-2 z-10 transition-all origin-top-right overflow-hidden"
                             :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                            <a href="{{ route('superadmin.eskul.edit', $eskul) }}" class="flex items-center px-5 py-3 text-sm font-bold transition-colors" :class="darkMode ? 'text-gray-300 hover:bg-blue-500/10 hover:text-blue-400' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600'">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit Eskul
                            </a>
                            <form action="{{ route('superadmin.eskul.destroy', $eskul) }}" method="POST" class="w-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus eskul ini?')" class="flex items-center w-full px-5 py-3 text-sm font-bold text-rose-500 hover:bg-rose-50 transition-colors">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Hapus Eskul
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <p class="text-sm font-medium leading-relaxed line-clamp-2 mb-8 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                    {{ $eskul->description }}
                </p>

                <div class="mt-auto flex items-center justify-between pt-6 border-t transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-50'">
                    <div class="flex items-center gap-2">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-blue-100 flex items-center justify-center text-[10px] font-bold text-blue-600">S</div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-emerald-100 flex items-center justify-center text-[10px] font-bold text-emerald-600">A</div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-amber-100 flex items-center justify-center text-[10px] font-bold text-amber-600">+</div>
                        </div>
                        <span class="text-[10px] font-black tracking-widest uppercase transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">24 Siswa</span>
                    </div>
                    
                    <button type="button" 
                            @click="fetch('{{ route('superadmin.eskul.toggle', $eskul) }}', {method: 'POST', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}})
                                   .then(() => window.location.reload())"
                            class="w-12 h-6 rounded-full transition-all relative flex items-center"
                            :class="{{ $eskul->is_active ? 'true' : 'false' }} ? 'bg-emerald-500' : 'bg-gray-300'">
                        <span class="absolute w-4 h-4 bg-white rounded-full transition-all shadow-sm" :class="{{ $eskul->is_active ? 'translate-x-7' : 'translate-x-1' }}"></span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Add New Card --}}
        <a href="{{ route('superadmin.eskul.create') }}" 
           class="group rounded-[2.5rem] border-2 border-dashed transition-all duration-300 p-8 flex flex-col items-center justify-center text-center min-h-[400px]"
           :class="darkMode ? 'border-gray-800 hover:border-blue-500/50 hover:bg-blue-500/5' : 'border-gray-200 hover:border-blue-400 hover:bg-blue-50/50'">
            <div class="w-16 h-16 rounded-3xl flex items-center justify-center transition-all duration-500 mb-4 shadow-sm" 
                 :class="darkMode ? 'bg-gray-800 group-hover:bg-blue-600 group-hover:scale-110' : 'bg-white group-hover:bg-blue-600 group-hover:scale-110'">
                <svg class="w-8 h-8 group-hover:text-white transition-colors" :class="darkMode ? 'text-gray-500' : 'text-blue-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            </div>
            <h4 class="text-xl font-black transition-colors duration-300 mb-2" :class="darkMode ? 'text-white' : 'text-[#111827]'">Tambah Eskul</h4>
            <p class="text-[13px] font-medium transition-colors duration-300 max-w-[200px]" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Buat daftar kegiatan ekstrakurikuler baru untuk sekolah.</p>
        </a>
    </div>
</div>
@endsection
