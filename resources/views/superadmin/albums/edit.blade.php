@extends('layouts.superadmin.app')
@section('title', 'Edit Album - Admin Mahput')

@section('content')
<div x-data="albumForm()" class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    <form x-ref="form" @submit.prevent="submitForm()" action="#" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <!-- Breadcrumbs & Header -->
    <div class="flex items-center justify-between mt-6 mb-4">
        <div class="flex items-center gap-2 text-xs font-medium text-gray-400">
            <a href="{{ route('superadmin.albums.index') }}" class="hover:text-blue-500 transition-colors">Manajemen Album</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-900" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Edit Album</span>
        </div>
    </div>

    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('superadmin.albums.index') }}" 
           class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 border"
           :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 text-gray-400 hover:text-white hover:border-gray-600' : 'bg-white border-gray-200 text-gray-400 hover:text-blue-500 hover:border-blue-500 shadow-sm'">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h2 class="text-2xl font-extrabold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Edit Album: {{ $album->title }}</h2>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Left Column: Form -->
        <div class="flex-1 space-y-8">
            <div class="rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center" :class="$store.theme.darkMode ? 'bg-orange-500/10' : 'bg-orange-50'">
                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Informasi Album</h3>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Nama Album</label>
                        <input type="text" name="title" value="{{ $album->title }}" required class="w-full px-5 py-3.5 rounded-xl border outline-none transition-all duration-300" :class="$store.theme.darkMode ? 'bg-black border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Kategori</label>
                            <div class="relative">
                                <select name="category" required class="w-full px-5 py-3.5 rounded-xl border outline-none appearance-none transition-all duration-300" :class="$store.theme.darkMode ? 'bg-black border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                    <option value="Akademik" {{ $album->category == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                    <option value="Kesiswaan" {{ $album->category == 'Kesiswaan' ? 'selected' : '' }}>Kesiswaan</option>
                                    <option value="Prestasi" {{ $album->category == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                                    <option value="Fasilitas" {{ $album->category == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                                </select>
                                <svg class="w-4 h-4 absolute right-5 top-4.5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tanggal Acara</label>
                            <div class="relative">
                                <input type="date" name="event_date" value="{{ $album->event_date }}" required x-ref="dateInput" class="w-full px-5 py-3.5 rounded-xl border outline-none transition-all duration-300 custom-date-input" :class="$store.theme.darkMode ? 'bg-black border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                <svg @click="$refs.dateInput.showPicker()" class="w-4 h-4 absolute right-5 top-4.5 text-gray-400 cursor-pointer hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Deskripsi Album</label>
                        <textarea name="description" required rows="4" class="w-full px-5 py-3.5 rounded-xl border outline-none transition-all duration-300 resize-none" :class="$store.theme.darkMode ? 'bg-black border-gray-700 text-white focus:border-blue-500' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">{{ $album->description }}</textarea>
                    </div>

                    <div class="flex items-center justify-between p-4 rounded-2xl transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-black border border-gray-700' : 'bg-gray-50/50'">
                        <div>
                            <p class="text-sm font-extrabold" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Tampilkan di Landing Page</p>
                        </div>
                        <input type="hidden" name="is_visible" :value="isToggled ? 1 : 0">
                        <button type="button" @click="isToggled = !isToggled" 
                                class="w-12 h-6 rounded-full transition-colors duration-300 relative" 
                                :class="isToggled ? 'bg-blue-600' : ($store.theme.darkMode ? 'bg-gray-800' : 'bg-gray-300')">
                            <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full transition-transform duration-300" :class="isToggled ? 'translate-x-6' : ''"></div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Upload Card -->
            <div class="rounded-[2rem] p-8 shadow-sm border transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center" :class="$store.theme.darkMode ? 'bg-blue-500/10' : 'bg-blue-50'">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Tambah Foto Baru</h3>
                </div>

                <div class="border-2 border-dashed rounded-[2rem] p-12 flex flex-col items-center justify-center transition-colors duration-300 relative group" :class="$store.theme.darkMode ? 'border-gray-800 bg-black/20' : 'border-gray-200 bg-gray-50/30'">
                    <input type="file" name="photos[]" multiple @change="handlePhotos($event)" class="absolute inset-0 opacity-0 cursor-pointer z-20" accept="image/*">
                    <div class="w-16 h-16 rounded-3xl bg-orange-50 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform" :class="$store.theme.darkMode ? 'bg-orange-500/10' : 'bg-orange-50'">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                    </div>
                    <p class="text-base font-extrabold mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Klik atau tarik foto baru di sini</p>
                    <button class="px-8 py-3 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 transition-all shadow-sm relative z-10" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700 text-gray-300 hover:bg-gray-800' : ''">Pilih File</button>
                </div>
            </div>
        </div>

        <!-- Right Column: Photos Sidebar -->
        <div class="w-full lg:w-[380px]">
            <div class="rounded-[2rem] p-8 shadow-sm border sticky top-28 transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-lg font-extrabold" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Review Foto</h3>
                    <span class="px-3 py-1 rounded-full text-[10px] font-black" :class="$store.theme.darkMode ? 'bg-gray-800 text-gray-400' : 'bg-gray-100 text-gray-500'" x-text="uploadedPhotos.length + ' Foto'"></span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <template x-for="photo in uploadedPhotos" :key="photo.id">
                        <div class="aspect-square rounded-2xl overflow-hidden border shadow-sm transition-all hover:scale-[1.03] group relative" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                            <img :src="photo.src" class="w-full h-full object-cover">
                            <button type="button" @click="removePhoto(photo.id)" class="absolute top-2 right-2 w-7 h-7 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-12 pt-8 border-t flex items-center justify-end gap-4" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
        <button type="submit" class="px-12 py-4 bg-blue-600 text-white font-bold rounded-2xl shadow-xl hover:bg-blue-700 transition-all">Update Album</button>
    </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function albumForm() {
        return {
            isToggled: {{ $album->is_visible ? 'true' : 'false' }},
            uploadedPhotos: [
                @foreach($album->photos as $photo)
                { id: {{ $photo->id }}, src: '{{ asset('storage/' . $photo->path) }}', isOld: true },
                @endforeach
            ],
            handlePhotos(e) {
                const files = Array.from(e.target.files);
                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        this.uploadedPhotos.push({
                            id: Date.now() + Math.random(),
                            src: event.target.result,
                            file: file,
                            isOld: false
                        });
                    };
                    reader.readAsDataURL(file);
                });
            },
            removePhoto(id) {
                this.uploadedPhotos = this.uploadedPhotos.filter(p => p.id !== id);
                // In a real app, you'd also track deleted old photos to delete them from server
            },
            async submitForm() {
                const form = this.$refs.form;
                Swal.fire({ title: 'Memperbarui Album...', text: 'Mohon tunggu sebentar', allowOutsideClick: false, didOpen: () => { Swal.showLoading(); } });

                const formData = new FormData(form);
                formData.delete('photos[]');
                this.uploadedPhotos.forEach(photo => {
                    if (!photo.isOld) {
                        formData.append('photos[]', photo.file);
                    }
                });

                try {
                    const response = await fetch("{{ route('superadmin.albums.update', $album) }}", {
                        method: 'POST', // Laravel using method override for PUT
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    const data = await response.json();
                    if (response.ok) {
                        Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message, confirmButtonColor: '#3B82F6', timer: 2000, showConfirmButton: false }).then(() => {
                            window.location.href = data.redirect;
                        });
                    } else {
                        Swal.fire({ icon: 'error', title: 'Gagal', text: data.message, confirmButtonColor: '#3B82F6' });
                    }
                } catch (error) {
                    Swal.fire({ icon: 'error', title: 'System Error', text: 'Gagal menghubungkan ke server.' });
                }
            }
        }
    }
</script>
@endpush
