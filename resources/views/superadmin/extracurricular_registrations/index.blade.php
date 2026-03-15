@extends('layouts.superadmin.app')

@section('title', 'Manajemen Pendaftaran Ekstrakurikuler')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Pendaftaran Ekstrakurikuler</h1>
    </div>

    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-[#1E293B] dark:text-green-400 font-medium" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- Table -->
    <div class="bg-white dark:bg-[#1E293B] rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-[#0F172A]/50 border-b border-gray-100 dark:border-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">TGL DAFTAR</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">NAMA & KELAS</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">ESKUL</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">MOTIVASI</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-center">STATUS</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($registrations as $reg)
                    <tr class="hover:bg-gray-50 dark:hover:bg-[#0F172A]/50 transition-colors">
                        <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                            {{ $reg->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-bold text-gray-900 dark:text-white">{{ $reg->name }}</div>
                            <div class="text-[10px] font-bold tracking-wider uppercase text-gray-500">{{ $reg->class }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400">
                                {{ $reg->extracurricular }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-500 text-xs leading-relaxed max-w-xs" title="{{ $reg->motivation }}">{{ \Illuminate\Support\Str::limit($reg->motivation, 50) }}</p>
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            @if($reg->status === 'approved')
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900/30 dark:text-green-400">Diterima</span>
                            @elseif($reg->status === 'rejected')
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900/30 dark:text-red-400">Ditolak</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900/30 dark:text-yellow-400">Tertunda</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <form action="{{ route('superadmin.extracurricular-registrations.status', $reg->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="p-2 text-green-600 bg-green-50 hover:bg-green-100 dark:bg-green-500/10 dark:hover:bg-green-500/20 rounded-lg transition-colors" title="Terima">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </form>
                                <form action="{{ route('superadmin.extracurricular-registrations.status', $reg->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 dark:bg-red-500/10 dark:hover:bg-red-500/20 rounded-lg transition-colors" title="Tolak">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-gray-50 dark:bg-gray-800 rounded-2xl flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-1">Belum Ada Pendaftar</h3>
                                <p class="text-xs text-gray-400">Data pendaftaran ekstrakurikuler akan muncul di sini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
