@extends('layouts.superadmin.app')
@section('title', 'Manajemen Komentar - Admin Mahput')

@section('content')
<div class="px-8 pb-8 flex-1 w-full mt-8" x-data="{ isDeleteModalOpen: false, commentToDelete: null, isApproveModalOpen: false, commentToApprove: null, isRejectModalOpen: false, commentToReject: null }">
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Komentar -->
                <div class="rounded-xl shadow-sm border p-6 hover:shadow-md transition-shadow transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Total Komentar</p>
                            <h3 class="text-3xl font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $totalComments ?? '154' }}</h3>
                            <p class="text-xs font-medium mt-2 flex items-center gap-1 text-green-600">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414-1.414L13.586 7H12z" clip-rule="evenodd"></path></svg>
                                +5% minggu ini
                            </p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Menunggu Persetujuan -->
                <div class="rounded-xl shadow-sm border p-6 hover:shadow-md transition-shadow transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Menunggu Persetujuan</p>
                            <h3 class="text-3xl font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $pendingComments ?? '12' }}</h3>
                            <p class="text-xs font-medium mt-2 text-orange-600 font-bold uppercase tracking-widest">Perlu Review</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status Sistem -->
                <div class="rounded-xl shadow-sm border p-6 hover:shadow-md transition-shadow transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Filter Kata Kasar</p>
                            <h3 class="text-3xl font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Aktif</h3>
                            <p class="text-xs font-medium mt-2 text-purple-600">Terlindungi 100%</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments Table -->
            <div class="rounded-xl shadow-sm border overflow-hidden transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <!-- Table Header -->
                <div class="px-8 py-6 border-b transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700' : 'border-gray-200'">
                    <h2 class="text-lg font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Review Komentar Berita</h2>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse font-medium">
                        <thead>
                            <tr class="border-b bg-opacity-50 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700 bg-black/20' : 'border-gray-200 bg-gray-50'">
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Pengirim</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Status</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Komentar</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Pada Berita</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Tanggal</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-right transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y transition-colors duration-300" :class="$store.theme.darkMode ? 'divide-gray-700' : 'divide-gray-200'">
                            @forelse($comments as $comment)
                            <tr class="transition-colors duration-300" :class="$store.theme.darkMode ? 'hover:bg-black/20' : 'hover:bg-gray-50'">
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm shrink-0 uppercase">
                                            {{ substr($comment->name, 0, 1) }}
                                        </div>
                                        <div class="max-w-[150px]">
                                            <p class="font-bold transition-colors duration-300 truncate" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $comment->name }}</p>
                                            <p class="text-[11px] mt-0.5 transition-colors duration-300 truncate" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">{{ $comment->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-4">
                                    @if($comment->status === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-orange-100 text-orange-600 uppercase tracking-widest whitespace-nowrap">
                                            PENDING
                                        </span>
                                    @elseif($comment->status === 'approved')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-600 uppercase tracking-widest whitespace-nowrap">
                                            APPROVED
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-red-100 text-red-600 uppercase tracking-widest whitespace-nowrap">
                                            REJECTED
                                        </span>
                                    @endif
                                </td>
                                <td class="px-8 py-4">
                                    <p class="text-sm transition-colors duration-300 line-clamp-2 min-w-[200px]" :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-700'">
                                        {{ $comment->body }}
                                    </p>
                                </td>
                                <td class="px-8 py-4">
                                    <a href="{{ route('news.detail', $comment->article->slug) }}" target="_blank" class="text-xs font-bold text-blue-600 hover:text-blue-700 line-clamp-1 max-w-[180px]">
                                        {{ $comment->article->title }}
                                    </a>
                                </td>
                                <td class="px-8 py-4 text-sm transition-colors duration-300 whitespace-nowrap" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    {{ $comment->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-8 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-3">
                                        @if($comment->status === 'pending')
                                        <button type="button" @click="isApproveModalOpen = true; commentToApprove = {{ $comment->id }}" class="p-2 bg-green-100 text-green-600 rounded-lg hover:bg-green-600 hover:text-white transition-all shadow-sm" title="Approve">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </button>
                                        @endif
                                        
                                        @if($comment->status !== 'rejected')
                                        <button type="button" @click="isRejectModalOpen = true; commentToReject = {{ $comment->id }}" class="p-2 bg-orange-100 text-orange-600 rounded-lg hover:bg-orange-600 hover:text-white transition-all shadow-sm" title="Reject / Cancel">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                        @endif
                                        <button type="button" @click="isDeleteModalOpen = true; commentToDelete = {{ $comment->id }}" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all shadow-sm" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-8 py-12 text-center">
                                    <svg class="w-12 h-12 mx-auto mb-4 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-600' : 'text-gray-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                    </svg>
                                    <p class="font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-900'">Belum ada komentar.</p>
                                    <p class="text-xs mt-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Semua komentar dari pengunjung akan muncul di sini untuk dimoderasi.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($comments->hasPages())
                <div class="px-8 py-6 border-t flex items-center justify-between transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700' : 'border-gray-200'">
                    <p class="text-sm transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">
                        Menampilkan {{ $comments->firstItem() }} ke {{ $comments->lastItem() }} dari {{ $comments->total() }} data
                    </p>
                    <div class="flex items-center gap-2">
                        {{ $comments->links() }}
                    </div>
                </div>
                @endif
            </div>

        </div>

    <!-- Approve Modal -->
    <div x-cloak x-show="isApproveModalOpen" x-transition class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="rounded-2xl shadow-2xl max-w-md w-full p-8 transform transition-all transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827]' : 'bg-white'">
            <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-500/20">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <h3 class="text-xl font-black text-center mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Persetujuan Komentar</h3>
            <p class="text-sm text-center mb-8 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">
                Komentar ini akan langsung tampil di halaman detail berita. Lanjutkan persetujuan?
            </p>
            
            <div class="flex gap-4">
                <button type="button" @click="isApproveModalOpen = false; commentToApprove = null" class="flex-1 px-6 py-3.5 rounded-xl border-2 font-bold text-sm transition-all duration-300" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-400 hover:bg-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    Batal
                </button>
                <form :action="'/superadmin/comments/' + commentToApprove + '/approve'" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full px-6 py-3.5 rounded-xl bg-green-600 text-white font-bold text-sm hover:bg-green-700 transition-all shadow-lg shadow-green-500/30">
                        Setujui
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div x-cloak x-show="isRejectModalOpen" x-transition class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="rounded-2xl shadow-2xl max-w-md w-full p-8 transform transition-all transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827]' : 'bg-white'">
            <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center mx-auto mb-6 shadow-lg shadow-orange-500/20">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            
            <h3 class="text-xl font-black text-center mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Tolak Komentar</h3>
            <p class="text-sm text-center mb-8 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">
                Komentar ini akan ditandai sebagai ditolak dan tidak akan muncul di website. Lanjutkan?
            </p>
            
            <div class="flex gap-4">
                <button type="button" @click="isRejectModalOpen = false; commentToReject = null" class="flex-1 px-6 py-3.5 rounded-xl border-2 font-bold text-sm transition-all duration-300" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-400 hover:bg-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    Batal
                </button>
                <form :action="'/superadmin/comments/' + commentToReject + '/reject'" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full px-6 py-3.5 rounded-xl bg-orange-600 text-white font-bold text-sm hover:bg-orange-700 transition-all shadow-lg shadow-orange-500/30">
                        Tolak
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div x-cloak x-show="isDeleteModalOpen" x-transition class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="rounded-2xl shadow-2xl max-w-md w-full p-8 transform transition-all transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827]' : 'bg-white'">
            <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-500/20">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </div>
            
            <h3 class="text-xl font-black text-center mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Hapus Komentar?</h3>
            <p class="text-sm text-center mb-8 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">
                Tindakan ini permanen. Komentar yang dihapus tidak bisa dikembalikan lagi ke website.
            </p>
            
            <div class="flex gap-4">
                <button type="button" @click="isDeleteModalOpen = false; commentToDelete = null" class="flex-1 px-6 py-3.5 rounded-xl border-2 font-bold text-sm transition-all duration-300" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-400 hover:bg-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    Batal
                </button>
                <form :action="'/superadmin/comments/' + commentToDelete" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-6 py-3.5 rounded-xl bg-red-600 text-white font-bold text-sm hover:bg-red-700 transition-all shadow-lg shadow-red-500/30">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
