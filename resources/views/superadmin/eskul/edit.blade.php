@extends('layouts.superadmin.app')

@section('title', 'Edit Eskul - EduAdmin Pro')

@section('content')
<div class="p-8 flex-1 w-full overflow-x-auto transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]' : 'bg-[#F3F4F6]'" x-data="editEskulForm()">
    
    <!-- Top Breadcrumbs -->
    <div class="flex items-center gap-2 mb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
        <a href="{{ route('superadmin.eskul.index') }}" class="hover:text-blue-600 transition-colors">Manajemen Eskul</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="text-blue-600">Edit Eskul</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-[28px] font-extrabold tracking-tight transition-colors duration-300 mb-1" :class="darkMode ? 'text-white' : 'text-[#111827]'">Perbarui Eskul</h1>
            <p class="text-[14px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Ubah detail informasi kegiatan ekstrakurikuler sekolah.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button @click="submitForm()" class="flex items-center gap-2 px-8 py-3 bg-blue-600 text-white rounded-2xl text-[15px] font-black shadow-xl shadow-blue-500/20 hover:bg-blue-700 hover:-translate-y-0.5 transition-all active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
        </div>
    </div>

    <form x-ref="form" action="{{ route('superadmin.eskul.update', $eskul) }}" method="POST" @submit.prevent="submitForm()" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- Left column --}}
            <div class="lg:col-span-8 space-y-8">
                <!-- Basic Info Card -->
                <div class="rounded-[2.5rem] p-8 lg:p-10 shadow-sm border transition-all duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-blue-50 text-blue-600">
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h2 class="text-xl font-black transition-colors" :class="darkMode ? 'text-white' : 'text-[#111827]'">Informasi Umum</h2>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Nama Ekstrakurikuler</label>
                            <input type="text" name="name" value="{{ $eskul->name }}" required placeholder="Contoh: Club Fotografi" 
                                class="w-full px-6 py-4 rounded-2xl border font-bold text-[15px] transition-all duration-300 outline-none focus:ring-4 focus:ring-blue-500/10"
                                :class="darkMode ? 'bg-[#0F172A] border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'">
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Kategori</label>
                                <div class="relative">
                                    <select name="category" required 
                                        class="w-full px-6 py-4 rounded-2xl border font-bold text-[15px] transition-all duration-300 outline-none appearance-none focus:ring-4 focus:ring-blue-500/10"
                                        :class="darkMode ? 'bg-[#0F172A] border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'">
                                        @foreach($categories as $id => $name)
                                            <option value="{{ $id }}" {{ $eskul->category == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Jadwal Singkat</label>
                                <input type="text" name="schedule_info" value="{{ $eskul->schedule_info }}" placeholder="Contoh: Selasa & Kamis 15:30"
                                    class="w-full px-6 py-4 rounded-2xl border font-bold text-[15px] transition-all duration-300 outline-none focus:ring-4 focus:ring-blue-500/10"
                                    :class="darkMode ? 'bg-[#0F172A] border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Deskripsi Kegiatan</label>
                            <textarea name="description" rows="6" required placeholder="Jelaskan mengenai kegiatan ini..." 
                                class="w-full px-6 py-4 rounded-3xl border font-semibold text-[15px] leading-relaxed transition-all duration-300 outline-none focus:ring-4 focus:ring-blue-500/10"
                                :class="darkMode ? 'bg-[#0F172A] border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 text-[#111827] focus:border-blue-500'">{{ $eskul->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right column --}}
            <div class="lg:col-span-4 space-y-8">
                <!-- Status & Image Card -->
                <div class="rounded-[2.5rem] p-8 shadow-sm border transition-all duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Foto Utama</label>
                    <div class="relative group aspect-[4/3] rounded-[2rem] overflow-hidden border transition-all shadow-inner" :class="darkMode ? 'border-gray-800 bg-[#0F172A]' : 'border-gray-100 bg-gray-50'">
                        <img :src="imagePreview || '{{ $eskul->image ? asset('storage/' . $eskul->image) : 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop' }}'" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <label class="px-6 py-3 bg-white text-gray-900 font-bold rounded-xl cursor-pointer hover:bg-gray-100 transition-colors">
                                Ganti Foto
                                <input type="file" name="image" class="hidden" @change="handleImage($event)">
                            </label>
                        </div>
                    </div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center mt-4">JPG, PNG atau WebP (Maks. 5MB)</p>
                </div>

                <div class="rounded-[2.5rem] p-8 shadow-sm border transition-all duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Visibilitas</label>
                    <div class="flex items-center justify-between p-4 rounded-2xl transition-colors" :class="darkMode ? 'bg-[#0F172A]' : 'bg-gray-50'">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full transition-all duration-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]" :class="isActive ? 'bg-emerald-500' : 'bg-gray-400 shadow-none'"></div>
                            <span class="text-sm font-bold" :class="darkMode ? 'text-white' : 'text-[#111827]'" x-text="isActive ? 'Status: Aktif' : 'Status: Draft'"></span>
                        </div>
                        <button type="button" @click="isActive = !isActive" 
                                class="w-12 h-6 rounded-full relative transition-all"
                                :class="isActive ? 'bg-blue-600' : 'bg-gray-300'">
                            <div class="absolute w-4 h-4 bg-white rounded-full transition-all top-1" :class="isActive ? 'right-1' : 'left-1'"></div>
                        </button>
                        <input type="hidden" name="is_active" :value="isActive ? '1' : '0'">
                    </div>
                    <p class="text-[11px] font-medium text-gray-500 mt-4 leading-relaxed italic text-center px-2">Aktifkan untuk menampilkan eskul di landing page dan membuka pendaftaran.</p>
                </div>
            </div>
        </div>
    </form>
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
                        method: 'POST',
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
