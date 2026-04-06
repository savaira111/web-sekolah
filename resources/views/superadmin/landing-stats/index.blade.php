@extends('layouts.superadmin.app')
@section('title', 'Statistik Landing Page - Admin Mahput')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
@if(session('success'))
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3B82F6',
        timer: 3000,
        timerProgressBar: true,
    });
});
@endif
</script>
@endpush

@section('content')
<div class="px-8 pb-8 flex-1 w-full overflow-x-auto" x-data="{ isDeleteModalOpen: false, statToDelete: null }">
    
    <div class="flex items-center gap-2 mt-8 mb-6 text-[13px] font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">
        <a href="/superadmin/dashboard" class="hover:text-blue-600 transition-colors">Dashboard</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="font-bold" :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'">Statistik Landing Page</span>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8 mt-2">
        <div class="max-w-xl">
            <h2 class="text-[32px] font-extrabold tracking-tight transition-colors duration-300 mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Statistik Landing Page</h2>
            <p class="text-[15px] font-medium transition-colors duration-300 leading-relaxed" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola data statistik yang muncul di halaman depan website sekolah.</p>
        </div>
        
        <div class="flex items-center gap-4">
            <a href="{{ route('superadmin.landing-stats.create') }}" class="px-6 py-2.5 bg-[#3B82F6] hover:bg-[#2563EB] text-white text-sm font-bold rounded-full transition-all duration-300 shadow-lg shadow-blue-500/30 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Statistik
            </a>
        </div>
    </div>

    <div class="rounded-[2rem] p-6 lg:p-8 transition-colors duration-300 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="border-b transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest pl-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Urutan</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Ikon</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Judul</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Nilai</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Tema Warna</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Status</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest text-right pr-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-[14px]">
                    @forelse($stats as $stat)
                    <tr class="border-b last:border-0 transition-colors group" :class="$store.theme.darkMode ? 'border-gray-800 hover:bg-black/20/50' : 'border-gray-50 hover:bg-gray-50/50'">
                        <td class="py-5 pl-2">
                            <span class="font-bold" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">{{ $stat->order }}</span>
                        </td>
                        <td class="py-5">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center transition-colors duration-300" 
                                 :class="$store.theme.darkMode ? 'bg-{{ $stat->color }}-500/20 text-{{ $stat->color }}-400' : 'bg-{{ $stat->color }}-50 text-{{ $stat->color }}-600'">
                                @if($stat->icon)
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat->icon }}"></path>
                                    </svg>
                                @else
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @endif
                            </div>
                        </td>
                        <td class="py-5">
                            <span class="font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">{{ $stat->title }}</span>
                        </td>
                        <td class="py-5">
                            <span class="font-black text-lg transition-colors duration-300" :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'">{{ $stat->value }}</span>
                        </td>
                        <td class="py-5 text-center">
                            <span class="inline-block px-3 py-1 font-black text-[10px] rounded-full uppercase tracking-widest transition-colors duration-300" 
                                  :class="$store.theme.darkMode ? 'bg-{{ $stat->color }}-500/10 text-{{ $stat->color }}-400' : 'bg-{{ $stat->color }}-50 text-{{ $stat->color }}-600'">
                                {{ $stat->color }}
                            </span>
                        </td>
                        <td class="py-5">
                            @if($stat->is_active)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase" :class="$store.theme.darkMode ? 'bg-emerald-500/10 text-emerald-400' : 'bg-emerald-50 text-emerald-600'">
                                <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span> Aktif
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase" :class="$store.theme.darkMode ? 'bg-gray-700/60 text-gray-400' : 'bg-gray-100 text-gray-500'">
                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Nonaktif
                            </span>
                            @endif
                        </td>
                        <td class="py-5 text-right pr-2">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('superadmin.landing-stats.edit', $stat->id) }}" class="w-8 h-8 rounded-full border flex items-center justify-center transition-colors" :class="$store.theme.darkMode ? 'border-gray-700 text-blue-400 hover:bg-gray-800' : 'border-gray-200 text-blue-600 hover:bg-blue-50'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>

                                <button @click="isDeleteModalOpen = true; statToDelete = {{ $stat->id }}" class="w-8 h-8 rounded-full border flex items-center justify-center transition-colors" :class="$store.theme.darkMode ? 'border-gray-700 text-red-400 hover:bg-gray-800' : 'border-gray-200 text-red-500 hover:bg-red-50'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                <p class="text-[14px] font-bold">Belum ada data statistik.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div x-show="isDeleteModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="isDeleteModalOpen = false"></div>
        <div class="relative w-full max-w-md rounded-2xl p-6 md:p-8 shadow-2xl transition-all duration-300 transform" :class="$store.theme.darkMode ? 'bg-[#111827] border border-gray-800' : 'bg-white shadow-xl'">
            <div class="w-12 h-12 rounded-full bg-red-100/10 flex items-center justify-center mb-6 border-2 border-red-500/20 mx-auto">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            
            <div class="text-center mb-8">
                <h3 class="text-xl font-extrabold mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Hapus Statistik?</h3>
                <p class="text-sm font-medium" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Tindakan ini tidak dapat dibatalkan. Statistik ini akan dihilangkan dari landing page.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button @click="isDeleteModalOpen = false; statToDelete = null" type="button" class="flex-1 px-4 py-3 rounded-full text-sm font-bold shadow-sm transition-all duration-300 hover:-translate-y-0.5" :class="$store.theme.darkMode ? 'text-gray-300 bg-[#334155] hover:bg-[#475569]' : 'text-gray-700 bg-gray-100 hover:bg-gray-200'">Batal</button>
                <form :action="'/superadmin/landing-stats/' + statToDelete" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-3 rounded-full text-white text-sm font-bold bg-red-500 hover:bg-red-600 transition-colors shadow-lg shadow-red-500/20">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
