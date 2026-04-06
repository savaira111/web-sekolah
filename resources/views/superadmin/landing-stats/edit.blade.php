@extends('layouts.superadmin.app')
@section('title', 'Edit Statistik - Admin Mahput')

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
                <a href="{{ route('superadmin.landing-stats.index') }}" class="text-gray-500 hover:text-blue-600">Statistik Landing Page</a>
            </li>
            <li class="flex items-center space-x-2 text-gray-400">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-medium">Edit Statistik</span>
            </li>
        </ol>
    </nav>

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div class="flex items-start space-x-5">
            <a href="{{ route('superadmin.landing-stats.index') }}" 
               class="p-3 rounded-2xl bg-white shadow-xl shadow-gray-200/50 text-gray-400 hover:text-blue-600 transition-all duration-300 group"
               :class="$store.theme.darkMode ? 'bg-[#111827] shadow-none border border-gray-800 hover:bg-slate-700' : ''">
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">
                    Edit Statistik
                </h1>
                <p class="mt-1 text-gray-500 max-w-2xl">
                    Perbarui data statistik yang ingin ditampilkan di halaman utama.
                </p>
            </div>
        </div>
    </div>

    <form action="{{ route('superadmin.landing-stats.update', $landing_stat->id) }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        @csrf
        @method('PUT')
        
        <!-- Main Form Content -->
        <div class="lg:col-span-8 space-y-6">
            <div class="rounded-3xl p-8 shadow-xl transition-all duration-200" :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white'">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Title Input -->
                    <div class="group">
                        <label for="title" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">JUDUL STATISTIK</label>
                        <input type="text" name="title" id="title" required value="{{ old('title', $landing_stat->title) }}"
                               class="w-full px-5 py-3 rounded-xl border transition-all duration-200"
                               :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50'"
                               placeholder="Contoh: Siswa Aktif">
                        @error('title')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Value Input -->
                    <div class="group">
                        <label for="value" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">NILAI / ANGKA</label>
                        <input type="text" name="value" id="value" required value="{{ old('value', $landing_stat->value) }}"
                               class="w-full px-5 py-3 rounded-xl border transition-all duration-200"
                               :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50'"
                               placeholder="Contoh: 200+">
                        @error('value')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Icon Input -->
                <div class="mb-6 group">
                    <label for="icon" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">IKON (SVG PATH)</label>
                    <textarea name="icon" id="icon" rows="3"
                           class="w-full px-5 py-3 rounded-xl border transition-all duration-200 font-mono text-sm"
                           :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50'"
                           placeholder="Masukkan path data SVG dari Heroicons (d attribute)">{{ old('icon', $landing_stat->icon) }}</textarea>
                    <p class="mt-2 text-[10px] text-gray-400 italic">Gunakan data dari atribut 'd' pada tag <path> SVG (Heroicons.com).</p>
                    @error('icon')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Order Input -->
                    <div class="group">
                        <label for="order" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">URUTAN TAMPIL</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $landing_stat->order) }}"
                               class="w-full px-5 py-3 rounded-xl border transition-all duration-200"
                               :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50'">
                        @error('order')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Theme Color -->
                    <div class="group">
                        <label for="color" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">TEMA WARNA</label>
                        <select name="color" id="color" required
                                class="w-full px-5 py-3 rounded-xl border transition-all duration-200 appearance-none"
                                :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50'">
                            <option value="blue" {{ old('color', $landing_stat->color) == 'blue' ? 'selected' : '' }}>Blue</option>
                            <option value="indigo" {{ old('color', $landing_stat->color) == 'indigo' ? 'selected' : '' }}>Indigo</option>
                            <option value="orange" {{ old('color', $landing_stat->color) == 'orange' ? 'selected' : '' }}>Orange</option>
                            <option value="emerald" {{ old('color', $landing_stat->color) == 'emerald' ? 'selected' : '' }}>Emerald</option>
                            <option value="rose" {{ old('color', $landing_stat->color) == 'rose' ? 'selected' : '' }}>Rose</option>
                            <option value="purple" {{ old('color', $landing_stat->color) == 'purple' ? 'selected' : '' }}>Purple</option>
                            <option value="amber" {{ old('color', $landing_stat->color) == 'amber' ? 'selected' : '' }}>Amber</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar: Status -->
        <div class="lg:col-span-4 space-y-6">
            <div class="rounded-3xl p-6 shadow-xl transition-all duration-200" :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white'">
                <div class="flex items-center space-x-2 mb-6 text-orange-500">
                    <div class="p-2 rounded-lg bg-orange-500/10 text-orange-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xs uppercase tracking-widest text-gray-500">VISIBILITAS</h3>
                </div>

                <div class="space-y-6 mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">Status Aktif</p>
                            <p class="text-[10px] text-gray-400 mt-1">Tampilkan di landing page</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ $landing_stat->is_active ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full py-4 rounded-2xl bg-blue-600 text-white font-bold text-sm hover:bg-blue-700 shadow-xl shadow-blue-500/20 active:scale-95 transition-all">
                    Update Statistik
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
