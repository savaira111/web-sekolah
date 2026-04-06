@extends('layouts.superadmin.app')

@section('title', 'Tambah Mitra Industri - Admin Mahput')

@section('content')
<div class="px-8 pb-8 flex-1 w-full" :class="$store.theme.darkMode ? '' : 'bg-[#F3F4F6]'">
    <!-- Breadcrumbs -->
    <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{ route('superadmin.dashboard') }}" class="text-gray-500 hover:text-blue-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
            </li>
            <li class="flex items-center space-x-2">
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('superadmin.partners.index') }}" class="text-gray-500 hover:text-blue-600">Mitra Industri</a>
            </li>
            <li class="flex items-center space-x-2 text-gray-400">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-medium">Tambah Mitra Baru</span>
            </li>
        </ol>
    </nav>

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div class="flex items-start space-x-5">
            <a href="{{ route('superadmin.partners.index') }}" 
               class="p-3 rounded-2xl bg-white shadow-xl shadow-gray-200/50 text-gray-400 hover:text-blue-600 transition-all duration-300 group"
               :class="$store.theme.darkMode ? 'bg-[#111827] shadow-none border border-gray-800 hover:bg-slate-700' : ''">
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
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
        
        <!-- Action Buttons -->
        <div class="mt-6 lg:mt-0 flex items-center space-x-3">
            <button type="submit" form="partnerForm" class="px-8 py-3 rounded-xl font-bold text-sm bg-blue-600 text-white hover:bg-blue-700 shadow-xl shadow-blue-500/20 active:scale-95 transition-all whitespace-nowrap">
                Simpan Mitra
            </button>
        </div>
    </div>

    <form id="partnerForm" action="{{ route('superadmin.partners.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        @csrf
        
        <!-- Left Sidebar: Main Form Content -->
        <div class="lg:col-span-8 space-y-8">
            <div class="rounded-3xl p-8 shadow-xl transition-all duration-200" :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                
                <!-- Name Input -->
                <div class="mb-8 group">
                    <label for="name" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">NAMA MITRA / INSTANSI</label>
                    <input type="text" name="name" id="name" required
                           class="w-full text-2xl lg:text-3xl font-bold bg-transparent border-none focus:ring-0 placeholder:text-gray-300 p-0"
                           :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'"
                           placeholder="Masukkan nama instansi..."
                           value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Website URL -->
                <div class="mb-8 group">
                    <label for="website_url" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">WEBSITE URL (OPSIONAL)</label>
                    <div class="flex items-center rounded-2xl border transition-all duration-200 overflow-hidden"
                         :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800' : 'bg-gray-50 border-gray-200 focus-within:border-blue-400/50 focus-within:bg-white'">
                        <span class="pl-4 text-gray-400">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826L10.242 9.172a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.103-1.103"></path></svg>
                        </span>
                        <input type="url" name="website_url" id="website_url" 
                               class="w-full bg-transparent border-none focus:ring-0 text-sm font-semibold p-4"
                               :class="$store.theme.darkMode ? 'text-white' : 'text-slate-700'"
                               placeholder="https://example.com"
                               value="{{ old('website_url') }}">
                    </div>
                    @error('website_url')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="space-y-3">
                    <label for="description" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">DESKRIPSI SINGKAT</label>
                    <textarea name="description" id="description" rows="5"
                              class="w-full rounded-2xl border transition-all duration-200 p-4 font-medium focus:ring-4 focus:ring-blue-500/10"
                              :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50 focus:bg-white'"
                              placeholder="Berikan deskripsi singkat mengenai kerja sama atau profil mitra...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Right Sidebar: Settings and Metadata -->
        <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-8 self-start">
            
            <!-- Logo Card -->
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
