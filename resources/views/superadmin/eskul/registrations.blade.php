@extends('layouts.superadmin.app')

@section('title', 'Data Pendaftar Eskul - EduAdmin Pro')

@section('content')
<div x-data="{ 
    searchQuery: '',
    currentFilter: 'Semua',
    applicants: [
        {
            id: 'ESKUL-2026-B5D697',
            name: 'GA ND',
            eskul: 'Futsal Putra',
            kelas: 'X PPLG 1',
            date: 'Mar 12, 2026',
            status: 'Diterima',
            image: 'https://ui-avatars.com/api/?name=GA+ND&background=DBEAFE&color=2563EB'
        },
        {
            id: 'ESKUL-2026-22188F',
            name: 'Andi Saputra',
            eskul: 'Rohis',
            kelas: 'X DKV 1',
            date: 'Mar 12, 2026',
            status: 'Ditolak',
            image: 'https://ui-avatars.com/api/?name=Andi+Saputra&background=111827&color=fff'
        }
    ],

    get filteredApplicants() {
        return this.applicants.filter(app => {
            const matchesSearch = app.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                 app.id.toLowerCase().includes(this.searchQuery.toLowerCase());
            const matchesStatus = this.currentFilter === 'Semua' || 
                                 (this.currentFilter === 'Pending' && app.status === 'Menunggu Review') ||
                                 app.status === this.currentFilter;
            return matchesSearch && matchesStatus;
        });
    },

    getStatusClass(status) {
        switch(status) {
            case 'Menunggu Review': return 'bg-amber-50 text-amber-600 border-amber-100';
            case 'Diterima': return 'bg-emerald-50 text-emerald-600 border-emerald-100';
            case 'Ditolak': return 'bg-rose-50 text-rose-600 border-rose-100';
            default: return 'bg-gray-50 text-gray-600 border-gray-100';
        }
    },

    getStatusDot(status) {
        switch(status) {
            case 'Menunggu Review': return 'bg-amber-500';
            case 'Diterima': return 'bg-emerald-500';
            case 'Ditolak': return 'bg-rose-500';
            default: return 'bg-gray-500';
        }
    }
}" class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-8 mb-8 gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">
                <span>Manajemen Eskul</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span :class="darkMode ? 'text-blue-400' : 'text-blue-600'">Pendaftar</span>
            </div>
            <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Data Pendaftar</h2>
            <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Verifikasi dan kelola pendaftaran ekstrakurikuler siswa sekolah.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <div class="relative">
                <input type="text" x-model="searchQuery" placeholder="Cari pendaftar (Nama, ID...)" class="pl-10 pr-4 py-2.5 rounded-xl text-sm border focus:ring-2 transition-all outline-none w-64" :class="darkMode ? 'bg-[#1E293B] border-gray-700 text-white focus:ring-blue-500/20' : 'bg-white border-gray-200 text-gray-900 focus:ring-blue-500/10'">
                <svg class="w-4 h-4 absolute left-3.5 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <button class="p-2.5 rounded-xl border flex items-center justify-center transition-all bg-white border-gray-200 text-gray-600 hover:bg-gray-50 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-700 text-gray-400 hover:text-white' : ''">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 01.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            </button>

            <button class="px-5 py-2.5 bg-[#0F172A] text-white text-sm font-bold rounded-xl hover:bg-black transition-colors duration-300 shadow-md flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Ekspor Data
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        {{-- Total --}}
        <div class="rounded-3xl p-6 shadow-sm border transition-all duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center" :class="darkMode ? 'bg-blue-500/10' : 'bg-blue-50'">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <span class="text-xs font-bold text-gray-400">Total</span>
            </div>
            <p class="text-xs font-bold uppercase tracking-wider mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Pendaftar</p>
            <h3 class="text-3xl font-extrabold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="applicants.length"></h3>
        </div>

        {{-- Waitlist --}}
        <div class="rounded-3xl p-6 shadow-sm border transition-all duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center" :class="darkMode ? 'bg-amber-500/10' : 'bg-amber-50'">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-xs font-bold text-amber-500">Waitlist</span>
            </div>
             <p class="text-xs font-bold uppercase tracking-wider mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Menunggu Review</p>
            <h3 class="text-3xl font-extrabold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="applicants.filter(a => a.status === 'Menunggu Review').length"></h3>
        </div>

        {{-- Diterima --}}
        <div class="rounded-3xl p-6 shadow-sm border transition-all duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center" :class="darkMode ? 'bg-emerald-500/10' : 'bg-emerald-50'">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-xs font-bold text-emerald-500">Diterima</span>
            </div>
            <p class="text-xs font-bold uppercase tracking-wider mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Diterima</p>
            <h3 class="text-3xl font-extrabold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="applicants.filter(a => a.status === 'Diterima').length"></h3>
        </div>

        {{-- Ditolak --}}
        <div class="rounded-3xl p-6 shadow-sm border transition-all duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center" :class="darkMode ? 'bg-red-500/10' : 'bg-red-50'">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-xs font-bold text-red-500">Ditolak</span>
            </div>
            <p class="text-xs font-bold uppercase tracking-wider mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Ditolak</p>
            <h3 class="text-3xl font-extrabold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="applicants.filter(a => a.status === 'Ditolak').length"></h3>
        </div>
    </div>

    <!-- Main Content Table -->
    <div class="rounded-[2.5rem] p-8 shadow-sm border mb-4 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
        <div class="flex items-center gap-8 mb-8 pb-4 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
             <button @click="currentFilter = 'Semua'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Semua' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Semua Pendaftar</button>
            <button @click="currentFilter = 'Pending'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Pending' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Pending</button>
            <button @click="currentFilter = 'Diterima'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Diterima' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Diterima</button>
            <button @click="currentFilter = 'Ditolak'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Ditolak' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Ditolak</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[1000px]">
                <thead>
                    <tr class="border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider pl-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">ID & Nama Pendaftar</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Eskul</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Kelas</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Tanggal Daftar</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Status</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider text-right pr-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-[13px]">
                    <template x-for="app in filteredApplicants" :key="app.id">
                        <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                            <td class="py-5 pl-2 transition-colors duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0 border transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-100'">
                                        <img :src="app.image" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <div class="font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="app.name"></div>
                                        <div class="text-[11px] font-bold px-1.5 py-0.5 rounded inline-block mt-0.5 transition-colors duration-300" :class="darkMode ? 'text-blue-400 bg-blue-500/10' : 'text-blue-600 bg-blue-50'" x-text="app.id"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" x-text="app.eskul"></td>
                            <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-800'" x-text="app.kelas"></td>
                            <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" x-text="app.date"></td>
                            <td class="py-5">
                                <span class="px-3 py-1 font-bold text-[10px] rounded-full uppercase border inline-flex items-center gap-1.5 transition-colors duration-300" :class="getStatusClass(app.status)">
                                    <span class="w-1.5 h-1.5 rounded-full" :class="getStatusDot(app.status)"></span>
                                    <span x-text="app.status"></span>
                                </span>
                            </td>
                            <td class="py-5 text-right pr-2">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors border border-transparent hover:border-blue-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                    <button class="p-2 text-rose-500 hover:bg-rose-50 rounded-lg transition-colors border border-transparent hover:border-rose-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex items-center justify-between">
            <p class="text-[13px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Menampilkan 1 sampai <span x-text="filteredApplicants.length"></span> dari <span x-text="applicants.length"></span> pendaftar</p>
            <div class="flex items-center gap-2">
                <button class="w-10 h-10 rounded-xl border flex items-center justify-center disabled:opacity-30 disabled:cursor-not-allowed transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <div class="flex items-center gap-1">
                    <button class="w-10 h-10 rounded-xl bg-[#0F172A] text-white text-xs font-bold shadow-lg">1</button>
                    <button class="w-10 h-10 rounded-xl border text-xs font-bold transition-all" :class="darkMode ? 'border-gray-800 text-gray-400 hover:bg-gray-800' : 'border-gray-100 text-gray-600 hover:bg-gray-50'">2</button>
                </div>
                <button class="w-10 h-10 rounded-xl border flex items-center justify-center transition-all" :class="darkMode ? 'border-gray-800 text-gray-400 hover:bg-gray-800' : 'border-gray-100 text-gray-400 hover:bg-gray-50'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
