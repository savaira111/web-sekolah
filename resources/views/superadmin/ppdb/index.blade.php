@extends('layouts.superadmin.app')
@section('title', 'Manajemen PPDB - EduAdmin Pro')

@section('content')
<div x-data="{ 
    searchQuery: '',
    currentFilter: 'Semua',
    applicants: {{ $applicants->map(fn($a) => [
        'id' => $a->registration_number,
        'db_id' => $a->id,
        'name' => $a->full_name,
        'nisn' => $a->nisn,
        'school' => $a->school_origin ?? '-',
        'date' => $a->created_at->format('M d, Y'),
        'status' => $a->status,
        'image' => $a->profile_image ? asset('storage/' . $a->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($a->full_name) . '&background=0D8ABC&color=fff',
        'docs' => [
            'kk' => $a->doc_kk ? asset('storage/' . $a->doc_kk) : null,
            'akta' => $a->doc_akta ? asset('storage/' . $a->doc_akta) : null,
            'ijazah' => $a->doc_ijazah ? asset('storage/' . $a->doc_ijazah) : null,
            'raport' => $a->doc_raport ? asset('storage/' . $a->doc_raport) : null,
        ]
    ])->toJson() }},

    get filteredApplicants() {
        return this.applicants.filter(app => {
            const matchesSearch = app.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                 app.id.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                 app.nisn.includes(this.searchQuery);
            const matchesStatus = this.currentFilter === 'Semua' || app.status === this.currentFilter;
            return matchesSearch && matchesStatus;
        });
    },

    getStatusClass(status) {
        switch(status) {
            case 'Menunggu Review': return 'bg-amber-50 text-amber-600 border-amber-100';
            case 'Diterima': return 'bg-emerald-50 text-emerald-600 border-emerald-100';
            case 'Ditolak': return 'bg-red-50 text-red-600 border-red-100';
            default: return 'bg-gray-50 text-gray-600 border-gray-100';
        }
    },

    getStatusDot(status) {
        switch(status) {
            case 'Menunggu Review': return 'bg-amber-500';
            case 'Diterima': return 'bg-emerald-500';
            case 'Ditolak': return 'bg-red-500';
            default: return 'bg-gray-500';
        }
    }
}" class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-8 mb-8 gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">
                <span>Manajemen PPDB</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span :class="darkMode ? 'text-blue-400' : 'text-blue-600'">Pendaftar</span>
            </div>
            <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Data Pendaftar</h2>
            <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Verifikasi dan kelola calon siswa baru sekolah.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <div class="relative">
                <input type="text" x-model="searchQuery" placeholder="Cari pendaftar (Nama, ID, NISN)..." class="pl-10 pr-4 py-2.5 rounded-xl text-sm border focus:ring-2 transition-all outline-none w-64" :class="darkMode ? 'bg-[#1E293B] border-gray-700 text-white focus:ring-blue-500/20' : 'bg-white border-gray-200 text-gray-900 focus:ring-blue-500/10'">
                <svg class="w-4 h-4 absolute left-3.5 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <button class="p-2.5 rounded-xl border flex items-center justify-center transition-all bg-white border-gray-200 text-gray-600 hover:bg-gray-50 shadow-sm">
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
            <button @click="currentFilter = 'Menunggu Review'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Menunggu Review' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Pending</button>
            <button @click="currentFilter = 'Diterima'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Diterima' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Diterima</button>
            <button @click="currentFilter = 'Ditolak'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Ditolak' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Ditolak</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[1000px]">
                <thead>
                    <tr class="border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider pl-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">ID & Nama Pendaftar</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">NISN</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Asal Sekolah</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Tanggal Masuk</th>
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
                            <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" x-text="app.nisn"></td>
                            <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-800'" x-text="app.school"></td>
                            <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" x-text="app.date"></td>
                            <td class="py-5">
                                <span class="px-3 py-1 font-bold text-[10px] rounded-full uppercase border inline-flex items-center gap-1.5 transition-colors duration-300" :class="getStatusClass(app.status)">
                                    <span class="w-1.5 h-1.5 rounded-full" :class="getStatusDot(app.status)"></span>
                                    <span x-text="app.status"></span>
                                </span>
                            </td>
                            <td class="py-5 text-right pr-2">
                                <div class="flex items-center justify-end gap-2">
                                    <div class="flex items-center gap-1 mr-2 border-r pr-2 transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                                        <template x-if="app.docs.kk">
                                            <a :href="app.docs.kk" target="_blank" title="KK" class="p-1.5 rounded-lg text-blue-500 hover:bg-blue-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            </a>
                                        </template>
                                        <template x-if="app.docs.ijazah">
                                            <a :href="app.docs.ijazah" target="_blank" title="Ijazah" class="p-1.5 rounded-lg text-emerald-500 hover:bg-emerald-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                                            </a>
                                        </template>
                                    </div>
                                    <a :href="'{{ url('superadmin/ppdb') }}/' + app.db_id" class="px-4 py-2 border rounded-xl text-xs font-bold transition-all shadow-sm" :class="darkMode ? 'bg-gray-800 border-gray-700 text-gray-300 hover:bg-gray-700' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'">Detail</a>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- Pagination Mock -->
        <div class="mt-8 flex items-center justify-between">
            <p class="text-[13px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Menampilkan 1 sampai 4 dari 24 pendaftar</p>
            <div class="flex items-center gap-2">
                <button class="w-10 h-10 rounded-xl border flex items-center justify-center disabled:opacity-30 disabled:cursor-not-allowed transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <div class="flex items-center gap-1">
                    <button class="w-10 h-10 rounded-xl bg-[#0F172A] text-white text-xs font-bold shadow-lg">1</button>
                    <button class="w-10 h-10 rounded-xl border text-xs font-bold transition-all" :class="darkMode ? 'border-gray-800 text-gray-400 hover:bg-gray-800' : 'border-gray-100 text-gray-600 hover:bg-gray-50'">2</button>
                    <button class="w-10 h-10 rounded-xl border text-xs font-bold transition-all" :class="darkMode ? 'border-gray-800 text-gray-400 hover:bg-gray-800' : 'border-gray-100 text-gray-600 hover:bg-gray-50'">3</button>
                </div>
                <button class="w-10 h-10 rounded-xl border flex items-center justify-center transition-all" :class="darkMode ? 'border-gray-800 text-gray-400 hover:bg-gray-800' : 'border-gray-100 text-gray-400 hover:bg-gray-50'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
