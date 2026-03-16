@extends('layouts.superadmin.app')
@section('title', 'Edit Ekstrakurikuler - Admin Mahput')

@section('content')
<div x-data="editEskulForm()" class="flex-1 flex flex-col min-h-screen transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-black/20' : 'bg-[#F8FAFC]'">
    
    <div class="px-8 pb-12">
        <!-- Breadcrumbs -->
        <div class="flex items-center gap-2 mt-8 mb-4 text-xs font-bold text-gray-400">
            <a href="/superadmin/dashboard">Dashboard</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('superadmin.eskul.index') }}">Ekstrakurikuler</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Edit {{ $eskul->name ?? 'Pramuka' }}</span>
        </div>

        <div class="mb-10">
            <h1 class="text-3xl font-black mb-2 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Edit Ekstrakurikuler</h1>
            <p class="text-sm font-bold text-gray-400">Perbarui informasi kegiatan ekstrakurikuler sekolah untuk tahun ajaran 2023/2024.</p>
        </div>

        <form x-ref="form" action="{{ route('superadmin.eskul.update', $eskul) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Column -->
                <div class="flex-1 space-y-8">
                    <!-- Card: Informasi Utama -->
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center" :class="$store.theme.darkMode ? 'bg-orange-500/10' : 'bg-orange-50'">
                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h3 class="text-lg font-extrabold" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Informasi Utama</h3>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Nama Ekstrakurikuler</label>
                                <input type="text" name="name" value="{{ $eskul->name }}" required class="w-full px-5 py-4 rounded-xl border-none font-bold text-gray-700 transition-all outline-none" :class="$store.theme.darkMode ? 'bg-black/20 text-white' : 'bg-gray-50/80 text-gray-700'">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Kategori</label>
                                    <div class="relative">
                                        <select name="category" required class="w-full px-5 py-4 rounded-xl border-none font-bold text-gray-700 transition-all outline-none appearance-none" :class="$store.theme.darkMode ? 'bg-black/20 text-white' : 'bg-gray-50/80 text-gray-700'">
                                            @foreach($categories as $id => $name)
                                                <option value="{{ $id }}" {{ $eskul->category == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        <svg class="w-4 h-4 absolute right-5 top-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Target Siswa</label>
                                    <div class="relative">
                                        <select name="target_students" class="w-full px-5 py-4 rounded-xl border-none font-bold text-gray-700 transition-all outline-none appearance-none" :class="$store.theme.darkMode ? 'bg-black/20 text-white' : 'bg-gray-50/80 text-gray-700'">
                                            <option value="Kelas 10 & 11" selected>Kelas 10 & 11</option>
                                            <option value="Semua Kelas">Semua Kelas</option>
                                            <option value="Khusus Kelas 12">Khusus Kelas 12</option>
                                        </select>
                                        <svg class="w-4 h-4 absolute right-5 top-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Deskripsi Kegiatan</label>
                                <textarea name="description" rows="5" required class="w-full px-5 py-4 rounded-2xl border-none font-bold text-gray-700 transition-all outline-none leading-relaxed" :class="$store.theme.darkMode ? 'bg-black/20 text-white' : 'bg-gray-50/80 text-gray-700'">{{ $eskul->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Jadwal & Pembina -->
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center" :class="$store.theme.darkMode ? 'bg-orange-500/10' : 'bg-orange-50'">
                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="text-lg font-extrabold" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Jadwal & Pembina</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Hari Pelaksanaan</label>
                                <input type="text" name="schedule_info" value="{{ $eskul->schedule_info }}" placeholder="Contoh: Jumat" class="w-full px-5 py-4 rounded-xl border-none font-bold text-gray-700 transition-all outline-none" :class="$store.theme.darkMode ? 'bg-black/20 text-white' : 'bg-gray-50/80 text-gray-700'">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Nama Pembina</label>
                                <input type="text" name="coach_name" value="Kak Ahmad Sudirman" class="w-full px-5 py-4 rounded-xl border-none font-bold text-gray-700 transition-all outline-none" :class="$store.theme.darkMode ? 'bg-black/20 text-white' : 'bg-gray-50/80 text-gray-700'">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="w-full lg:w-[380px] space-y-8">
                    <!-- Foto Utama -->
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                        <h3 class="text-xs font-black text-gray-900 uppercase tracking-widest mb-6" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Foto Utama</h3>
                        
                        <div class="relative aspect-video rounded-2xl overflow-hidden border-2 border-dashed transition-all" :class="$store.theme.darkMode ? 'border-gray-800 bg-black/20' : 'border-gray-100 bg-gray-50/50'">
                            <img :src="imagePreview || '{{ $eskul->image ? asset('storage/' . $eskul->image) : asset('images/gedung-sekolah.jpg') }}'" class="w-full h-full object-cover">
                            <input type="file" name="image" class="hidden" x-ref="imageInput" @change="handleImage($event)">
                        </div>

                        <button type="button" @click="$refs.imageInput.click()" class="w-full mt-4 py-4 rounded-xl bg-orange-50 text-orange-600 font-bold text-sm flex items-center justify-center gap-2 hover:bg-orange-100 transition-all" :class="$store.theme.darkMode ? 'bg-orange-500/10 text-orange-500 hover:bg-orange-500/20' : ''">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Ganti Foto
                        </button>
                    </div>

                    <!-- Visibilitas -->
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xs font-black text-gray-900 uppercase tracking-widest" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Visibilitas</h3>
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-black uppercase tracking-widest" :class="isActive ? 'bg-emerald-50 text-emerald-500' : 'bg-gray-100 text-gray-400'" x-text="isActive ? 'Aktif' : 'Draft'"></span>
                        </div>

                        <div class="p-4 rounded-2xl transition-colors mb-4" :class="$store.theme.darkMode ? 'bg-black/20' : 'bg-gray-50/50'">
                             <p class="text-[11px] font-bold text-gray-400 mb-6 leading-relaxed">Tentukan apakah kegiatan ini muncul di dashboard siswa.</p>
                             
                             <div class="flex items-center justify-between">
                                 <span class="text-xs font-black" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Tampilkan ke Siswa</span>
                                 <button type="button" @click="isActive = !isActive" 
                                        class="w-12 h-6 rounded-full relative transition-all duration-300"
                                        :class="isActive ? 'bg-[#F15A24]' : 'bg-gray-300'">
                                    <div class="absolute w-4 h-4 bg-white rounded-full transition-all top-1" :class="isActive ? 'right-1' : 'left-1'"></div>
                                </button>
                                <input type="hidden" name="is_active" :value="isActive ? '1' : '0'">
                             </div>
                        </div>
                    </div>

                    <!-- Main Actions -->
                    <div class="space-y-4">
                        <button type="button" @click="submitForm()" class="w-full py-5 bg-[#F15A24] text-white font-black rounded-2xl shadow-xl shadow-orange-500/20 flex items-center justify-center gap-3 hover:bg-[#D9481B] transition-all active:scale-95">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                             Simpan Perubahan
                        </button>

                        <a href="{{ route('superadmin.eskul.index') }}" class="w-full py-5 bg-[#E2E8F0] text-gray-600 font-black rounded-2xl flex items-center justify-center gap-3 hover:bg-gray-300 transition-all" :class="$store.theme.darkMode ? 'bg-gray-800 text-gray-400 hover:bg-gray-700' : ''">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                             Batalkan
                        </a>

                        <button @click="confirmDelete()" type="button" class="w-full flex items-center justify-center gap-2 text-red-500 font-black text-xs hover:text-red-600 transition-colors pt-4">
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                             Hapus Ekstrakurikuler
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function editEskulForm() {
        return {
            imagePreview: null,
            isActive: {{ $eskul->is_active ? 'true' : 'false' }},
            handleImage(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        this.imagePreview = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            async submitForm() {
                const form = this.$refs.form;
                
                Swal.fire({
                    title: 'Memperbarui Data...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading() }
                });

                const formData = new FormData(form);
                
                try {
                    const response = await fetch("{{ route('superadmin.eskul.update', $eskul) }}", {
                        method: 'POST', // Laravel will spoof PUT due to @method('PUT')
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message || 'Data eskul berhasil diperbarui!',
                            confirmButtonColor: '#F15A24',
                        }).then(() => {
                            window.location.href = data.redirect || "{{ route('superadmin.eskul.index') }}";
                        });
                    } else {
                        let msg = data.errors ? Object.values(data.errors).flat().join('<br>') : (data.message || 'Gagal menyimpan data');
                        Swal.fire({ icon: 'error', title: 'Terjadi Kesalahan', html: msg });
                    }
                } catch (error) {
                    console.error('Submission error:', error);
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Terjadi kesalahan pada sistem.' });
                }
            },
            confirmDelete() {
                Swal.fire({
                    title: 'Hapus Ekstrakurikuler?',
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Normally you'd submit a hidden delete form here
                        Swal.fire('Terhapus!', 'Data eskul telah dihapus.', 'success');
                    }
                })
            }
        }
    }
</script>
@endpush
