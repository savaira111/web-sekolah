@extends('layouts.superadmin.app')
@section('title', 'Artikel & Berita - EduAdmin Pro')

@section('content')
        <!-- Page Content -->
        <div class="flex-1 overflow-y-auto p-8">
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Pesan -->
                <div class="rounded-xl shadow-sm border p-6 hover:shadow-md transition-shadow transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-700' : 'bg-white border-gray-200'">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Total Pesan</p>
                            <h3 class="text-3xl font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">{{ $messages->total() ?? '1,284' }}</h3>
                            <p class="text-xs font-medium mt-2 flex items-center gap-1 text-green-600">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414-1.414L13.586 7H12z" clip-rule="evenodd"></path></svg>
                                +12% bulan ini
                            </p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Belum Terbaca -->
                <div class="rounded-xl shadow-sm border p-6 hover:shadow-md transition-shadow transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-700' : 'bg-white border-gray-200'">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Belum Terbaca</p>
                            <h3 class="text-3xl font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">{{ $messages->count() ?? '42' }}</h3>
                            <p class="text-xs font-medium mt-2 text-blue-600">Perlu direspon</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a6 6 0 01.78-2.812l2.03-2.808A6 6 0 0112 3c2.92 0 5.64-1.05 7.78-2.908l2.03 2.808c.5.693.78 1.556.78 2.83V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 11l6.75 4.5M21 11l-6.75 4.5"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status Keamanan -->
                <div class="rounded-xl shadow-sm border p-6 hover:shadow-md transition-shadow transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-700' : 'bg-white border-gray-200'">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Status Keamanan</p>
                            <h3 class="text-3xl font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Aktif</h3>
                            <p class="text-xs font-medium mt-2 text-purple-600">Enkripsi 100%</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Table -->
            <div class="rounded-xl shadow-sm border overflow-hidden transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-700' : 'bg-white border-gray-200'">
                <!-- Table Header -->
                <div class="px-8 py-6 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-200'">
                    <h2 class="text-lg font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Daftar Pesan Masuk</h2>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-opacity-50 transition-colors duration-300" :class="darkMode ? 'border-gray-700 bg-[#0F172A]' : 'border-gray-200 bg-gray-50'">
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Pengirim</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Waktu</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Kontak / Email</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Subjek</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Tanggal</th>
                                <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-right transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y transition-colors duration-300" :class="darkMode ? 'divide-gray-700' : 'divide-gray-200'">
                            @forelse($messages as $msg)
                            <tr class="transition-colors duration-300" :class="darkMode ? 'hover:bg-[#0F172A]' : 'hover:bg-gray-50'">
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm">
                                            {{ substr($msg->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">{{ substr($msg->name, 0, 20) }}</p>
                                            <p class="text-xs mt-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">{{ $msg->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-4">
                                    <span class="inline-block px-2 py-1 text-[11px] font-bold rounded {{ !$msg->is_read ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600' }}">
                                        {{ !$msg->is_read ? 'BARU' : 'BACA' }}
                                    </span>
                                </td>
                                <td class="px-8 py-4 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">
                                    {{ $msg->email }}
                                </td>
                                <td class="px-8 py-4 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">
                                    <span class="truncate max-w-[250px] block">{{ substr($msg->subject, 0, 50) }}</span>
                                </td>
                                <td class="px-8 py-4 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    {{ $msg->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-8 py-4 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('superadmin.messages.show', $msg->id) }}" class="flex items-center gap-1 text-blue-600 hover:text-blue-700 font-medium text-sm transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            View
                                        </a>
                                        <button @click="isDeleteModalOpen = true; messageToDelete = {{ $msg->id }}" class="flex items-center gap-1 text-red-600 hover:text-red-700 font-medium text-sm transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-8 py-12 text-center">
                                    <svg class="w-12 h-12 mx-auto mb-4 transition-colors duration-300" :class="darkMode ? 'text-gray-600' : 'text-gray-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Belum ada pesan yang masuk.</p>
                                    <p class="text-sm mt-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Pesan dari pengunjung akan muncul di sini.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-8 py-6 border-t flex items-center justify-between transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-200'">
                    <p class="text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                        Showing 1 to 10 of {{ $messages->total() ?? '1,284' }} entries
                    </p>
                    <div class="flex items-center gap-2">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Delete Modal -->
    <div x-cloak x-show="isDeleteModalOpen" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="rounded-xl shadow-2xl max-w-md w-full p-8 transform transition-all transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B]' : 'bg-white'">
            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <h3 class="text-xl font-bold text-center mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Konfirmasi Penghapusan</h3>
            <p class="text-sm text-center mb-6 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dibatalkan dan semua data terkait akan hilang permanen.
            </p>
            
            <div class="flex gap-3">
                <button @click="isDeleteModalOpen = false; messageToDelete = null" class="flex-1 px-4 py-3 rounded-lg border font-medium transition-colors duration-300" :class="darkMode ? 'border-gray-600 text-gray-300 hover:bg-gray-700' : 'border-gray-300 text-gray-700 hover:bg-gray-50'">
                    Batal
                </button>
                <form :action="'/superadmin/messages/' + messageToDelete" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-3 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 transition-colors">
                        Ya, Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
@endsection
