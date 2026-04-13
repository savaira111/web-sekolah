@extends('layouts.superadmin.app')

@section('title', 'Tambah Mitra Industri - Admin Mahput')

@section('content')
<div class="p-8 -mt-2 flex-1 w-full" :class="$store.theme.darkMode ? '' : 'bg-[#F3F4F6]'">

    <form id="partnerForm" action="{{ route('superadmin.partners.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
        @csrf

        <!-- Header Section -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
            <div class="flex items-start space-x-5">
                <a href="{{ route('superadmin.partners.index') }}" 
                   class="w-12 h-12 flex items-center justify-center rounded-full bg-[#111827] border border-gray-800 text-gray-400 hover:text-white transition-all duration-300 group shadow-lg"
                   :class="$store.theme.darkMode ? 'bg-[#0B0F19]' : ''">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">
                        Tambah Mitra Industri
                    </h1>
                    <p class="mt-1 text-gray-500 max-w-2xl">
                        Daftarkan partner atau instansi yang bekerja sama dengan sekolah.
                    </p>
                </div>
            </div>

            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:pb-6 items-start">
        
        <!-- Left Sidebar: Main Form Content -->
        <div class="lg:col-span-8 space-y-8">
            <div class="rounded-3xl p-8 shadow-xl transition-all duration-200" :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                
                <!-- Name Input -->
                <div class="mb-8 group">
                    <label for="name" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">NAMA MITRA / INSTANSI</label>
                    <input type="text" name="name" id="name" required
                           class="w-full text-2xl lg:text-3xl font-bold bg-transparent border-none focus:ring-0 p-0 transition-colors"
                           :class="$store.theme.darkMode ? 'text-white placeholder:text-gray-500' : 'text-slate-900 placeholder:text-gray-300'"
                           placeholder="Masukkan nama instansi..."
                           value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Website URL -->
                    <div class="group">
                        <label for="website_url" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">WEBSITE URL</label>
                        <div class="flex items-center rounded-2xl border transition-all duration-200 overflow-hidden"
                             :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800' : 'bg-gray-50 border-gray-200 focus-within:border-blue-400/50 focus-within:bg-white'">
                            <span class="pl-4 text-gray-400">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826L10.242 9.172a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.103-1.103"></path></svg>
                            </span>
                            <input type="url" name="website_url" id="website_url" 
                                   class="w-full bg-transparent border-none focus:ring-0 text-sm font-semibold p-4 transition-colors"
                                   :class="$store.theme.darkMode ? 'text-white placeholder:text-gray-500' : 'text-slate-700 placeholder:text-gray-400'"
                                   placeholder="https://example.com"
                                   value="{{ old('website_url') }}">
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="group">
                        <label for="location" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">LOKASI / KOTA</label>
                        <div class="flex items-center rounded-2xl border transition-all duration-200 overflow-hidden"
                             :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800' : 'bg-gray-50 border-gray-200 focus-within:border-blue-400/50 focus-within:bg-white'">
                            <span class="pl-4 text-gray-400">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </span>
                            <input type="text" name="location" id="location" 
                                   class="w-full bg-transparent border-none focus:ring-0 text-sm font-semibold p-4 transition-colors"
                                   :class="$store.theme.darkMode ? 'text-white placeholder:text-gray-500' : 'text-slate-700 placeholder:text-gray-400'"
                                   placeholder="Contoh: Bandung, Jawa Barat"
                                   value="{{ old('location') }}">
                        </div>
                        @error('location')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Partnership Year -->
                    <div class="group">
                        <label for="partnership_year" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">TAHUN KERJA SAMA</label>
                        <div class="flex items-center rounded-2xl border transition-all duration-200 overflow-hidden"
                             :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800' : 'bg-gray-50 border-gray-200 focus-within:border-blue-400/50 focus-within:bg-white'">
                            <span class="pl-4 text-gray-400">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </span>
                            <input type="number" name="partnership_year" id="partnership_year" 
                                   class="w-full bg-transparent border-none focus:ring-0 text-sm font-semibold p-4 transition-colors"
                                   :class="$store.theme.darkMode ? 'text-white placeholder:text-gray-500' : 'text-slate-700 placeholder:text-gray-400'"
                                   placeholder="Contoh: 2024"
                                   value="{{ old('partnership_year') }}">
                        </div>
                        @error('partnership_year')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-3">
                    <label for="description" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">DESKRIPSI SINGKAT</label>
                    <textarea name="description" id="description" rows="4"
                               class="w-full rounded-2xl border transition-all duration-200 p-4 font-medium focus:ring-4 focus:ring-blue-500/10"
                               :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800 text-white placeholder:text-gray-500 focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 text-slate-700 placeholder:text-gray-400 focus:border-blue-400/50 focus:bg-white'"
                               placeholder="Berikan deskripsi singkat mengenai profil mitra...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Testimonial Section -->
            @php
                $initialTestimonials = old('student_testimonials_data', []);
                if (empty($initialTestimonials)) {
                    $initialTestimonials = [['text' => '', 'author' => '', 'role' => '', 'rating' => 5, 'existing_photo' => null]];
                }
            @endphp
            <div class="rounded-3xl p-8 shadow-xl transition-all duration-200" :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'"
                 x-data="{ testimonials: {{ json_encode($initialTestimonials) }} }">
                
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold flex items-center gap-2" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">
                        <span class="p-2 rounded-lg bg-amber-500/10 text-amber-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </span>
                        Testimoni Siswa PKL
                    </h3>
                    <button type="button" @click="testimonials.push({text: '', author: '', role: '', rating: 5, existing_photo: null})" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-amber-50 text-amber-600 font-bold text-xs hover:bg-amber-100 transition-colors uppercase tracking-widest border border-amber-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah
                    </button>
                </div>
                
                <div class="space-y-8">
                    <template x-for="(t, index) in testimonials" :key="index">
                        <div class="relative p-6 rounded-2xl border-2 border-dashed transition-all" :class="$store.theme.darkMode ? 'border-gray-800 bg-[#0F172A]' : 'border-gray-100 bg-gray-50/50'">
                            
                            <!-- Remove Button -->
                            <button type="button" @click="testimonials.splice(index, 1)" class="absolute top-4 right-4 p-2 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 transition-colors tooltip-target" title="Hapus Testimoni Ini">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>

                            <div class="space-y-6 mt-2">
                                <div class="group">
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3 group-focus-within:text-amber-500 transition-colors">ISI TESTIMONI / KESAN <span x-text="(index + 1)"></span></label>
                                    <textarea :name="`student_testimonials_data[${index}][text]`" x-model="t.text" rows="2"
                                              class="w-full rounded-2xl border transition-all duration-200 p-4 font-medium focus:ring-4 focus:ring-amber-500/10"
                                              :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder:text-gray-500 focus:border-amber-500/50' : 'bg-white border-gray-200 text-slate-700 placeholder:text-gray-400 focus:border-amber-400/50'"
                                              placeholder="Tulis kesan siswa magang di sini..."></textarea>
                                </div>

                                <div class="group">
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">RATING (1-5)</label>
                                    <div class="flex items-center gap-1">
                                        <template x-for="star in 5">
                                            <button type="button" @click="t.rating = star" class="p-1 focus:outline-none transition-transform hover:scale-125">
                                                <svg class="w-7 h-7 transition-colors drop-shadow-sm" :class="star <= (t.rating || 5) ? 'text-amber-400' : 'text-gray-200'" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </button>
                                        </template>
                                        <input type="hidden" :name="`student_testimonials_data[${index}][rating]`" :value="t.rating || 5">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">NAMA SISWA</label>
                                        <input type="text" :name="`student_testimonials_data[${index}][author]`" x-model="t.author"
                                               class="w-full rounded-2xl border transition-all duration-200 p-4 font-semibold text-sm transition-colors"
                                               :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder:text-gray-500' : 'bg-white border-gray-200 text-slate-700 placeholder:text-gray-400'"
                                               placeholder="Contoh: Ahmad Pratama">
                                    </div>
                                    <div class="group">
                                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">ANGKATAN / KELAS</label>
                                        <input type="text" :name="`student_testimonials_data[${index}][role]`" x-model="t.role"
                                               class="w-full rounded-2xl border transition-all duration-200 p-4 font-semibold text-sm transition-colors"
                                               :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder:text-gray-500' : 'bg-white border-gray-200 text-slate-700 placeholder:text-gray-400'"
                                               placeholder="Contoh: XII RPL 1">
                                    </div>
                                </div>

                                <div class="flex items-center gap-6 p-4 rounded-xl" :class="$store.theme.darkMode ? 'bg-gray-800' : 'bg-white'">
                                    <div class="flex-1">
                                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">FOTO SISWA (OPSIONAL)</label>
                                        <input type="file" :name="`student_testimonials_data[${index}][photo]`" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Gallery Images -->
            <div class="rounded-3xl p-8 shadow-xl transition-all duration-200" :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'"
                 x-data='{ 
                    gallery: [{preview: null}],
                    addPhoto() {
                        if(this.gallery.length < 4) this.gallery.push({preview: null});
                    },
                    removePhoto(index) {
                        this.gallery.splice(index, 1);
                    },
                    previewImage(event, index) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.gallery[index].preview = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                 }'>
                
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold flex items-center gap-2" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">
                        <span class="p-2 rounded-lg bg-blue-500/10 text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </span>
                        Galeri Kegiatan Magang
                    </h3>
                    <button type="button" @click="addPhoto()" x-show="gallery.length < 4" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 text-blue-600 font-bold text-xs hover:bg-blue-100 transition-colors uppercase tracking-widest border border-blue-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Foto
                    </button>
                </div>

                <div class="space-y-6">
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">UNGGAH BEBERAPA FOTO (MAKS. 4)</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <template x-for="(item, index) in gallery" :key="index">
                            <div class="relative group p-4 rounded-2xl border-2 border-dashed transition-all"
                                 :class="$store.theme.darkMode ? 'border-gray-800 bg-[#0F172A]' : 'border-gray-100 bg-gray-50/50'">
                                
                                <div class="flex items-start gap-4">
                                    <div class="w-20 h-20 rounded-xl bg-white shadow-inner flex items-center justify-center overflow-hidden shrink-0 border border-gray-100"
                                         :class="$store.theme.darkMode ? 'bg-gray-800 border-gray-700' : ''">
                                        <template x-if="item.preview">
                                            <img :src="item.preview" class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!item.preview">
                                            <svg class="w-8 h-8 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </template>
                                    </div>
                                    
                                    <div class="flex-1 min-w-0 pt-1">
                                        <input type="file" name="gallery_images[]" @change="previewImage($event, index)"
                                               class="block w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all cursor-pointer">
                                        <p class="mt-2 text-[10px] text-gray-400 font-medium">Klik untuk memilih foto kegiatan</p>
                                    </div>

                                    <button type="button" @click="removePhoto(index)" x-show="gallery.length > 1" class="p-2 rounded-lg text-red-100 hover:text-red-500 hover:bg-red-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                @error('gallery_images.*')
                    <p class="mt-4 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Right Sidebar: Settings and Metadata -->
        <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-8 self-start">
            
            <!-- Featured Card (Header Detail) -->
            <div class="rounded-3xl p-6 shadow-xl transition-all duration-200"
                 :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                <div class="flex items-center space-x-2 mb-6 text-purple-500">
                    <div class="p-2 rounded-lg bg-purple-500/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xs uppercase tracking-widest text-gray-500">IMAGE HEADER (DETAIL)</h3>
                </div>

                <div class="space-y-4">
                    <input type="file" name="featured_image" class="block w-full text-[10px] text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                    <p class="text-[10px] text-gray-400 leading-relaxed font-medium bg-purple-50 p-3 rounded-xl border border-purple-100">
                        Foto ini akan tampil sebagai banner di halaman detail mitra. Gunakan foto kantor atau kegiatan siswa di sana.
                    </p>
                </div>
                @error('featured_image')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="rounded-3xl p-6 shadow-xl transition-all duration-200"
                 :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                <div class="flex items-center space-x-2 mb-6 text-indigo-500">
                    <div class="p-2 rounded-lg bg-indigo-500/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xs uppercase tracking-widest text-gray-500">LOGO MITRA</h3>
                </div>

                <div class="relative group">
                    <input type="file" name="logo" id="logo" class="hidden" accept="image/*" onchange="previewImage(this)">
                    <label for="logo" 
                           class="flex flex-col items-center justify-center p-8 rounded-2xl border-2 border-dashed transition-all cursor-pointer group-hover:border-blue-500/50"
                           :class="$store.theme.darkMode ? 'border-gray-800 bg-[#111827]/40' : 'border-gray-200 bg-gray-50 hover:bg-gray-100/50'">
                        
                        <div id="image-preview-container" class="hidden w-full mb-4 rounded-xl overflow-hidden aspect-square bg-white p-4">
                            <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-contain">
                        </div>

                        <div id="upload-placeholder" class="text-center">
                            <div class="w-12 h-12 rounded-full bg-indigo-500/10 flex items-center justify-center mx-auto mb-4 text-indigo-500 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-gray-500 mb-1">Pilih Logo</p>
                            <p class="text-[10px] text-gray-400 font-medium tracking-tighter">Format: PNG, JPG, WEBP, SVG</p>
                        </div>
                    </label>
                </div>
                @error('logo')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Settings Card -->
            <div class="rounded-3xl p-6 shadow-xl transition-all duration-200"
                 :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                <div class="flex items-center space-x-2 mb-6 text-emerald-500">
                    <div class="p-2 rounded-lg bg-emerald-500/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xs uppercase tracking-widest text-gray-500">KATEGORI & STATUS</h3>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">TIPE MITRA</label>
                        <div class="relative group">
                            <select name="category" id="category" class="w-full appearance-none px-4 py-3 rounded-xl border font-medium focus:ring-0 transition-all duration-200"
                                    :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50'">
                                @foreach($categories as $key => $value)
                                    <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 rounded-2xl" :class="$store.theme.darkMode ? 'bg-slate-800/50' : 'bg-gray-50'">
                        <div>
                            <p class="text-xs font-bold" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">Status Aktif</p>
                            <p class="text-[10px] text-gray-400 mt-1">Tampilkan di halaman utama</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        </div> <!-- TEPAT: Menutup Grid Container grid-cols-12 -->

        <!-- Bottom Submit Button (Fallback) -->
        <div class="mt-0 pt-8 border-t w-full relative z-10 block" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
            <div class="flex justify-end">
                <button type="submit" class="w-full md:w-auto px-10 py-5 rounded-2xl font-black text-sm bg-blue-600 text-white hover:bg-blue-700 shadow-2xl shadow-blue-500/20 active:scale-95 transition-all text-center uppercase tracking-widest">
                    Simpan Informasi Mitra
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    window.previewImage = function(input) {
        const container = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('upload-placeholder');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    };
</script>
@endpush
@endsection
