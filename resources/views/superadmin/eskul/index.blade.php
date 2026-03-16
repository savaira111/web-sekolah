@extends('layouts.superadmin.app')

@section('title', 'Eskul Management - School Management System')

@section('content')
<div x-data="{ 
    searchQuery: '',
    currentFilter: 'Semua',
    eskuls: {{ $extracurriculars->map(fn($e) => [
        'id' => $e->id,
        'name' => $e->name,
        'category' => $e->category,
        'description' => $e->description,
        'is_active' => $e->is_active,
        'image' => $e->image ? asset('storage/' . $e->image) : 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop',
        'toggle_url' => route('superadmin.eskul.toggle', $e),
        'edit_url' => route('superadmin.eskul.edit', $e),
        'delete_url' => route('superadmin.eskul.destroy', $e)
    ])->toJson() }},

    get filteredEskuls() {
        return this.eskuls.filter(e => {
            const matchesSearch = e.name.toLowerCase().includes(this.searchQuery.toLowerCase());
            
            // Flexible category matching for old and new data
            let cat = e.category.toLowerCase();
            let normalizedCat = 'Umum';
            if (cat.includes('sport') || cat === 'olahraga') normalizedCat = 'Olahraga';
            else if (cat === 'umum' || cat.includes('academic') || cat.includes('art') || cat.includes('tech') || cat.includes('social')) normalizedCat = 'Umum';

            const matchesCategory = this.currentFilter === 'Semua' || normalizedCat === this.currentFilter;
            return matchesSearch && matchesCategory;
        });
    }
}" class="px-8 pb-8 flex-1 w-full">
    
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8 mt-8">
        <div>
            <h2 class="text-[32px] font-extrabold tracking-tight transition-colors duration-300 mb-1.5" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Manajemen Ekskul</h2>
            <p class="text-[15px] font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola dan monitor program kegiatan ekstrakurikuler sekolah.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('superadmin.eskul.create') }}" class="flex items-center gap-2 px-6 py-2.5 bg-[#3B82F6] text-white rounded-xl text-sm font-semibold hover:bg-blue-700 shadow-sm transition-all focus:ring-4 focus:ring-blue-500/10">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Tambah Eskul Baru
            </a>
        </div>
    </div>

    <!-- Stats & Filters -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div class="flex flex-wrap items-center gap-3">
            <button @click="currentFilter = 'Semua'" 
                class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wider transition-all"
                :class="currentFilter === 'Semua' ? 'bg-black/20 text-white shadow-md' : 'bg-white border text-gray-600 hover:bg-gray-50'">
                SEMUA
            </button>
            <button @click="currentFilter = 'Olahraga'" 
                class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wider transition-all"
                :class="currentFilter === 'Olahraga' ? 'bg-black/20 text-white shadow-md' : 'bg-white border text-gray-600 hover:bg-gray-50'">
                OLAHRAGA
            </button>
            <button @click="currentFilter = 'Umum'" 
                class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wider transition-all"
                :class="currentFilter === 'Umum' ? 'bg-black/20 text-white shadow-md' : 'bg-white border text-gray-600 hover:bg-gray-50'">
                UMUM
            </button>
        </div>

        <div class="relative w-full md:w-80">
            <input type="text" x-model="searchQuery" placeholder="Cari nama eskul..." 
                class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm border bg-white focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                :class="$store.theme.darkMode ? 'bg-gray-800 border-gray-700 text-white' : 'border-gray-100 text-gray-700'">
            <svg class="w-4 h-4 absolute left-3.5 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
    </div>

    <!-- Table Card -->
    <div class="rounded-[2.5rem] overflow-hidden border transition-all" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50 shadow-sm'">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b transition-colors" :class="$store.theme.darkMode ? 'border-gray-800 bg-gray-900/50' : 'border-gray-50 bg-gray-50/30 text-gray-400'">
                        <th class="px-8 py-5 text-[11px] font-black uppercase tracking-[0.2em]">Program Ekskul</th>
                        <th class="px-6 py-5 text-[11px] font-black uppercase tracking-[0.2em]">Kategori</th>
                        <th class="px-6 py-5 text-[11px] font-black uppercase tracking-[0.2em]">Deskripsi</th>
                        <th class="px-6 py-5 text-[11px] font-black uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-5 text-[11px] font-black uppercase tracking-[0.2em] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y" :class="$store.theme.darkMode ? 'divide-gray-800' : 'divide-gray-50'">
                    <template x-for="e in filteredEskuls" :key="e.id">
                        <tr class="transition-all hover:bg-gray-50/50" :class="$store.theme.darkMode ? 'hover:bg-gray-800/30' : ''">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl overflow-hidden shrink-0 border border-gray-100">
                                        <img :src="e.image" class="w-full h-full object-cover">
                                    </div>
                                    <span class="text-sm font-bold text-[#0F172A]" :class="$store.theme.darkMode ? 'text-white' : ''" x-text="e.name"></span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="px-3 py-1.5 rounded-lg text-[10px] font-black tracking-widest uppercase"
                                      :class="e.category === 'Olahraga' ? 'bg-blue-50 text-blue-600' : 'bg-purple-50 text-purple-600'" 
                                      x-text="e.category"></span>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-[13px] font-medium text-gray-500 line-clamp-1 max-w-[300px]" x-text="e.description"></p>
                            </td>
                            <td class="px-6 py-5">
                                <button type="button" 
                                        @click="fetch(e.toggle_url, {method: 'POST', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}})
                                               .then(() => window.location.reload())"
                                        class="flex items-center gap-2 group">
                                    <div class="w-10 h-5 rounded-full relative transition-colors duration-300"
                                         :class="e.is_active ? 'bg-emerald-500' : 'bg-gray-200'">
                                        <div class="absolute top-1 w-3 h-3 bg-white rounded-full transition-all duration-300"
                                             :class="e.is_active ? 'left-6' : 'left-1'"></div>
                                    </div>
                                    <span class="text-[11px] font-bold uppercase tracking-widest"
                                          :class="e.is_active ? 'text-emerald-500' : 'text-gray-400'"
                                          x-text="e.is_active ? 'Active' : 'Inactive'"></span>
                                </button>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a :href="e.edit_url" class="p-2 rounded-xl text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form :action="e.delete_url" method="POST" class="inline" @submit="return confirm('Hapus program eskul ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-xl text-gray-400 hover:text-red-600 hover:bg-red-50 transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <template x-if="filteredEskuls.length === 0">
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-16 h-16 rounded-full bg-gray-50 flex items-center justify-center text-gray-300">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 002 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4a2 2 0 002-2m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                    </div>
                                    <p class="text-gray-400 font-bold">Tidak ada data eskul ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection
