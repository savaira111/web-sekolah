@extends('layouts.superadmin.app')

@section('title', 'Buat Eskul Baru - Admin Mahput')

@section('content')
<div class="px-8 pb-8 flex-1 w-full overflow-x-auto" x-data="eskulForm()">
    
    <!-- Top Breadcrumbs -->
    <div class="flex items-center gap-2 mb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
        <a href="{{ route('superadmin.eskul.index') }}" class="hover:text-blue-600 transition-colors">Manajemen Eskul</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="text-blue-600">Tambah Baru</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-[28px] font-extrabold tracking-tight transition-colors duration-300 mb-1" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Buat Ekstrakurikuler Baru</h1>
            <p class="text-[14px] font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Siapkan program kegiatan baru untuk semester akademik mendatang.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button @click="submitForm()" class="flex items-center gap-2 px-8 py-3 bg-blue-600 text-white rounded-2xl text-[15px] font-black shadow-xl shadow-blue-500/20 hover:bg-blue-700 hover:-translate-y-0.5 transition-all active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                Simpan & Publis
            </button>
        </div>
    </div>

    <form x-ref="form" action="{{ route('superadmin.eskul.store') }}" method="POST" @submit.prevent="submitForm()" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- Left column --}}
            <div class="lg:col-span-8 space-y-8">
                <!-- Basic Info Card -->
                <div class="rounded-[2.5rem] p-8 lg:p-10 shadow-sm border transition-all duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-blue-50 text-blue-600">
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h2 class="text-xl font-black transition-colors" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Informasi Dasar</h2>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Nama Ekstrakurikuler</label>
                            <input type="text" name="name" required placeholder="Contoh: Club Fotografi" 
                                class="w-full px-6 py-4 rounded-2xl border font-bold text-[15px] transition-all duration-300 outline-none focus:ring-4 focus:ring-blue-500/10"
                                :class="$store.theme.darkMode ? 'bg-black/20 border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'">
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Kategori</label>
                                <div class="relative">
                                    <select name="category" required 
                                        class="w-full px-6 py-4 rounded-2xl border font-bold text-[15px] transition-all duration-300 outline-none appearance-none focus:ring-4 focus:ring-blue-500/10"
                                        :class="$store.theme.darkMode ? 'bg-black/20 border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Target Siswa</label>
                                <input type="text" value="Semua Jenjang" readonly
                                    class="w-full px-6 py-4 rounded-2xl border font-bold text-[15px] transition-all duration-300 opacity-60"
                                    :class="$store.theme.darkMode ? 'bg-black/20 border-gray-800 text-white' : 'bg-gray-50 border-gray-100 text-[#111827]'">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Jadwal Kegiatan</label>
                            <input type="text" name="schedule_info" placeholder="Contoh: Sabtu, 08:00 - 11:00" 
                                class="w-full px-6 py-4 rounded-2xl border font-bold text-[15px] transition-all duration-300 outline-none focus:ring-4 focus:ring-blue-500/10"
                                :class="$store.theme.darkMode ? 'bg-black/20 border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'">
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Deskripsi Kegiatan</label>
                            <textarea name="description" rows="6" required placeholder="Jelaskan mengenai kegiatan ini, tujuan, dan apa yang akan dipelajari siswa..." 
                                class="w-full px-6 py-4 rounded-3xl border font-semibold text-[15px] leading-relaxed transition-all duration-300 outline-none focus:ring-4 focus:ring-blue-500/10"
                                :class="$store.theme.darkMode ? 'bg-black/20 border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right column --}}
            <div class="lg:col-span-4 space-y-8">
                <!-- Status & Image Card -->
                <div class="rounded-[2.5rem] p-8 shadow-sm border transition-all duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Foto Utama</label>
                    <div class="relative group aspect-[4/3] rounded-[2rem] overflow-hidden border-2 border-dashed transition-all" :class="$store.theme.darkMode ? 'border-gray-800 bg-black/20' : 'border-gray-100 bg-gray-50'">
                        <template x-if="!imagePreview">
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6">
                                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                </div>
                                <p class="text-xs font-bold transition-colors" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Klik untuk unggah foto eskul</p>
                            </div>
                        </template>
                        <template x-if="imagePreview">
                            <img :src="imagePreview" class="w-full h-full object-cover">
                        </template>
                        <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" @change="handleImage($event)">
                    </div>
                </div>

                <div class="rounded-[2.5rem] p-8 shadow-sm border transition-all duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Visibilitas</label>
                    <div class="flex items-center justify-between p-4 rounded-2xl transition-colors" :class="$store.theme.darkMode ? 'bg-black/20' : 'bg-gray-50'">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]"></div>
                            <span class="text-sm font-bold" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Langsung Aktif</span>
                        </div>
                        <div class="w-12 h-6 bg-blue-600 rounded-full relative">
                            <div class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full"></div>
                        </div>
                    </div>
                    <p class="text-[11px] font-medium text-gray-500 mt-4 leading-relaxed italic text-center px-2">Eskul akan langsung muncul di halaman depan setelah disimpan.</p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function eskulForm() {
        return {
            imagePreview: null,
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
                if (!form.name.value || !form.category.value || !form.description.value) {
                    Swal.fire({ 
                        icon: 'warning', 
                        title: 'Data belum lengkap', 
                        text: 'Mohon lengkapi nama, kategori, dan deskripsi.',
                        confirmButtonColor: '#3B82F6',
                    });
                    return;
                }

                Swal.fire({
                    title: 'Sedang Menyimpan...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading() }
                });

                const formData = new FormData(form);
                
                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message || 'Eskul berhasil dibuat!',
                            confirmButtonColor: '#3B82F6',
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
            }
        }
    }
</script>
@endpush


