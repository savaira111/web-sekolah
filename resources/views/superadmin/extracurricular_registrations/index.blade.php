@extends('layouts.superadmin.app')

@section('title', 'Manajemen Pendaftaran Eskul')

@section('content')
<div class="p-8 flex-1 w-full bg-gray-50/50">
    
    @if(session('success'))
    <div class="p-4 mb-6 text-sm text-green-800 rounded-2xl bg-green-50/50 border border-green-100 font-semibold" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- Page Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8">
        <div class="shrink-0">
            <h1 class="text-[26px] font-bold text-[#0F172A] tracking-tight mb-1.5">Manajemen Pendaftaran Eskul</h1>
            <p class="text-[14px] font-medium text-gray-500">Kelola dan tinjau semua registrasi eskul</p>
        </div>

        <!-- Search in Middle -->
        <div class="relative flex-1 max-w-xl mx-auto w-full">
            <input type="text" placeholder="Cari nama siswa atau eskul..." class="w-full pl-10 pr-4 py-2.5 rounded-full text-sm bg-white border border-gray-100 text-gray-700 outline-none focus:ring-2 focus:ring-blue-50 focus:border-blue-100 shadow-sm transition-all focus:max-w-full">
            <svg class="w-4 h-4 absolute left-4 top-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>

        <button class="shrink-0 px-6 py-2.5 bg-[#2563EB] text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-sm flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Data
        </button>
    </div>

    @php
        $totalPendaftar = $registrations->count();
        $pendaftarBaru = $registrations->where('created_at', '>=', now()->subDays(7))->count();
        $popular = $registrations->countBy('extracurricular')->sortDesc()->keys()->first() ?? '-';
        $kuota = 120;
    @endphp

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Pendaftar -->
        <div class="bg-white rounded-[20px] p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-[150px]">
            <div class="flex items-start justify-between">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-lg">+12%</span>
            </div>
            <div>
                <p class="text-[13px] font-bold text-gray-400 mb-1">Total Pendaftar</p>
                <h3 class="text-[28px] font-extrabold text-[#0F172A] leading-none">{{ $totalPendaftar }}</h3>
            </div>
        </div>

        <!-- Pendaftar Baru -->
        <div class="bg-white rounded-[20px] p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-[150px]">
             <div class="flex items-start justify-between">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-lg">+5%</span>
            </div>
            <div>
                <p class="text-[13px] font-bold text-gray-400 mb-1">Pendaftar Baru</p>
                <h3 class="text-[28px] font-extrabold text-[#0F172A] leading-none">{{ $pendaftarBaru }}</h3>
            </div>
        </div>

        <!-- Eskul Terpopuler -->
        <div class="bg-white rounded-[20px] p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-[150px]">
             <div class="flex items-start justify-between">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.978 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.57-1.838-.197-1.54-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.98 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.518-4.674z"></path></svg>
                </div>
            </div>
            <div>
                <p class="text-[13px] font-bold text-gray-400 mb-1">Eskul Terpopuler</p>
                <h3 class="text-[25px] font-extrabold text-[#0F172A] leading-none truncate" title="{{ $popular }}">{{ $popular }}</h3>
            </div>
        </div>

        <!-- Kuota Tersisa -->
        <div class="bg-white rounded-[20px] p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-[150px]">
            <div class="flex items-start justify-between">
                <div class="w-12 h-12 rounded-2xl bg-rose-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                 <span class="px-2 py-1 bg-rose-50 text-rose-600 text-xs font-bold rounded-lg">-8%</span>
            </div>
            <div>
                <p class="text-[13px] font-bold text-gray-400 mb-1">Kuota Tersisa</p>
                <h3 class="text-[28px] font-extrabold text-[#0F172A] leading-none">{{ $kuota }}</h3>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-8">
        <!-- Table Header & Controls -->
        <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-50">
            <h3 class="text-[18px] font-bold text-[#0F172A]">Daftar Pengajuan Eskul</h3>
            
            <div class="flex items-center gap-3">
                <button class="px-4 py-2.5 bg-gray-50 text-gray-600 text-sm font-semibold rounded-xl border border-gray-100 flex items-center gap-2 hover:bg-gray-100 transition-colors">
                    Filter by Eskul
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <button class="px-4 py-2.5 bg-white text-gray-600 text-sm font-semibold rounded-xl border border-gray-200 flex items-center gap-2 hover:bg-gray-50 transition-colors shadow-sm">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Range Tanggal
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead>
                    <tr class="border-b border-gray-100 bg-white">
                        <th class="py-4 px-6 text-[11px] font-extrabold text-gray-400 uppercase tracking-widest">Nama Siswa</th>
                        <th class="py-4 px-6 text-[11px] font-extrabold text-gray-400 uppercase tracking-widest">Kelas</th>
                        <th class="py-4 px-6 text-[11px] font-extrabold text-gray-400 uppercase tracking-widest">Eskul Terpilih</th>
                        <th class="py-4 px-6 text-[11px] font-extrabold text-gray-400 uppercase tracking-widest">Tanggal Daftar</th>
                        <th class="py-4 px-6 text-[11px] font-extrabold text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="py-4 px-6 text-[11px] font-extrabold text-gray-400 uppercase tracking-widest text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $reg)
                        <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors group">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0 border border-gray-200 bg-gray-50">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($reg->name) }}&background=random" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div class="font-bold text-[#0F172A] text-sm">{{ $reg->name }}</div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-sm font-semibold text-gray-600">{{ $reg->class }}</td>
                            <td class="py-4 px-6">
                                @php
                                    $eskulColors = [
                                        'Coding' => 'bg-orange-100/50 text-orange-600',
                                        'Pramuka' => 'bg-emerald-100/50 text-emerald-600',
                                        'Futsal' => 'bg-blue-100/50 text-blue-600',
                                        'PMR' => 'bg-rose-100/50 text-rose-600'
                                    ];
                                    $defaultColor = 'bg-gray-100 text-gray-600';
                                    
                                    // Match by containing string if not exact
                                    $eskulClass = $defaultColor;
                                    foreach($eskulColors as $key => $color) {
                                        if (stripos($reg->extracurricular, $key) !== false) {
                                            $eskulClass = $color;
                                            break;
                                        }
                                    }
                                    if($eskulClass == $defaultColor) {
                                        // Pick a pseudo-random color based on string length
                                        $colors = array_values($eskulColors);
                                        $eskulClass = $colors[strlen($reg->extracurricular) % count($colors)];
                                    }
                                @endphp
                                <span class="{{ $eskulClass }} rounded-lg px-3 py-1 text-xs font-bold inline-block max-w-[150px] truncate" title="{{ $reg->extracurricular }}">
                                    {{ $reg->extracurricular }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-500">{{ $reg->created_at->format('d M Y') }}</td>
                            <td class="py-4 px-6">
                                @if($reg->status === 'approved')
                                    <span class="bg-emerald-50 text-emerald-600 px-3 py-1 font-bold text-[11px] rounded-lg tracking-wide">Diterima</span>
                                @elseif($reg->status === 'rejected')
                                    <span class="bg-rose-50 text-rose-600 px-3 py-1 font-bold text-[11px] rounded-lg tracking-wide">Ditolak</span>
                                @else
                                    <span class="bg-orange-50 text-orange-600 px-3 py-1 font-bold text-[11px] rounded-lg tracking-wide">Menunggu</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="text-gray-400 hover:text-blue-500 transition-colors" title="Lihat Motivasi" onclick="alert('Motivasi: {{ addslashes($reg->motivation) }}')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                    <form action="{{ route('superadmin.extracurricular-registrations.status', $reg->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="text-gray-400 hover:text-emerald-500 transition-colors" title="Terima">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('superadmin.extracurricular-registrations.status', $reg->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="text-gray-400 hover:text-rose-500 transition-colors" title="Tolak">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-500 text-sm">
                                Belum ada data pendaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer / Pagination -->
        <div class="px-6 py-4 flex items-center justify-between border-t border-gray-50 bg-white">
            <p class="text-[13px] font-medium text-gray-500">Menampilkan {{ min(4, $totalPendaftar) }} dari {{ $totalPendaftar }} data</p>
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-colors">Previous</button>
                <div class="flex items-center gap-1">
                    <button class="w-9 h-9 rounded-xl bg-[#2563EB] text-white text-sm font-bold shadow-sm">1</button>
                    <button class="w-9 h-9 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-all">2</button>
                    <button class="w-9 h-9 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-all">3</button>
                </div>
                <button class="px-4 py-2 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-colors">Next</button>
            </div>
        </div>
    </div>
    
    <div class="text-center pt-8 pb-4">
        <p class="text-[13px] font-medium text-gray-400">© 2023 SMKS Mahaputra Cerdas Utama - Extracurricular Management System</p>
    </div>
</div>
@endsection
