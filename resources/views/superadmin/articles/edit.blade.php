@extends('layouts.superadmin.app')

@section('title', 'Edit Artikel - EduAdmin Pro')

@push('scripts')
<script>
    function articleEditForm() {
        return {
            title: '',
            slug: '',
            imagePreview: null,
            highlightArticle: false,
            autoComments: true,

            handleImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.imagePreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },

            generateSlug(text) {
                return text
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }
        };
    }
</script>
@endpush

@section('content')
<div class="px-8 py-8 flex-1 w-full max-w-7xl mx-auto" x-data="articleEditForm()">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm mb-6 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
        <a href="/superadmin/dashboard" class="flex items-center gap-2 hover:text-blue-500 transition-colors duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>
        <span>›</span>
        <a href="/superadmin/articles" class="hover:text-blue-500 transition-colors">Artikel / Berita</a>
        <span>›</span>
        <span :class="darkMode ? 'text-white' : 'text-gray-900'">Edit Artikel</span>
    </div>

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-6 border-b transition-colors duration-300 gap-4" :class="darkMode ? 'border-gray-800' : 'border-gray-200'">
        <div>
            <h2 class="text-3xl font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Update Artikel Sekolah</h2>
            <p class="text-[15px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Perbaharui konten berita atau informasi terkini untuk portal sekolah.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="/superadmin/articles" class="px-6 py-3 rounded-xl text-sm font-bold transition-colors duration-300" :class="darkMode ? 'bg-gray-800 text-gray-300 hover:bg-gray-700' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'">
                Batalkan
            </a>
            <button class="px-8 py-3 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-lg shadow-blue-600/30">
                Simpan Perubahan
            </button>
        </div>
    </div>

    {{-- Form --}}
    <form class="flex flex-col lg:flex-row gap-8">
        {{-- Left Column (Main Editor) --}}
        <div class="flex-1 space-y-6">
            <div class="rounded-[2rem] p-8 transition-colors duration-300 shadow-md" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
                <div class="mb-6">
                    <label class="block text-xs font-extrabold tracking-widest uppercase mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">JUDUL ARTIKEL</label>
                    <input x-model="title" @input="slug = generateSlug(title)" type="text" placeholder="Masukkan judul artikel yang menarik..."
                        class="w-full px-5 py-4 rounded-2xl border text-xl font-bold focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                        :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-600 focus:border-blue-500/50' : 'bg-white border-gray-300 text-gray-900 placeholder-gray-400 focus:border-blue-500 shadow-sm'">
                </div>

                <div>
                    <label class="block text-xs font-extrabold tracking-widest uppercase mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">KONTEN ARTIKEL</label>

                    {{-- Editor Toolbar --}}
                    <div class="border rounded-t-2xl px-4 py-3 flex items-center gap-6 transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A] border-gray-700' : 'bg-gray-50 border-gray-300'">
                        <div class="flex items-center gap-2">
                            <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center font-serif font-bold text-lg transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-600 hover:bg-white'">B</button>
                            <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center font-serif font-medium italic text-lg transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-600 hover:bg-white'">I</button>
                            <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center font-serif font-medium underline text-lg transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-600 hover:bg-white'">U</button>
                        </div>
                        <div class="w-px h-6 bg-gray-300 dark:bg-gray-700"></div>
                        <div class="flex items-center gap-2">
                            <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-600 hover:bg-white'">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            </button>
                            <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h16"></path></svg>
                            </button>
                        </div>
                        <div class="w-px h-6 bg-gray-300 dark:bg-gray-700"></div>
                        <div class="flex items-center gap-2">
                            <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-600 hover:bg-white'">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </button>
                            <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            </button>
                        </div>
                    </div>

                    {{-- Editor Content Area --}}
                    <textarea placeholder="Mulai menulis konten di sini..."
                        class="w-full px-5 py-6 rounded-b-2xl border border-t-0 text-base min-h-[400px] focus:outline-none transition-colors duration-300 resize-y"
                        :class="darkMode ? 'bg-[#1E293B] border-gray-700 text-gray-300 placeholder-gray-600' : 'bg-white border-gray-300 text-gray-800 placeholder-gray-400 shadow-sm'"></textarea>
                </div>
            </div>
        </div>

        {{-- Right Column (Sidebar Settings) --}}
        <div class="w-full lg:w-80 space-y-6">

            {{-- Featured Image --}}
            <div class="rounded-[1.5rem] p-6 transition-colors duration-300 shadow-md" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
                <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-4 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    GAMBAR SAMPUL
                </h3>
                <div class="w-full aspect-[16/9] rounded-2xl border-2 border-dashed flex flex-col items-center justify-center text-center cursor-pointer transition-colors duration-300 group overflow-hidden relative"
                    :class="darkMode ? 'border-gray-700 bg-[#0F172A]' : 'border-gray-200 bg-gray-50'"
                    @click="$refs.imageUploadInput.click()">
                    <template x-if="imagePreview">
                        <div class="absolute inset-0 w-full h-full">
                            <img :src="imagePreview" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <p class="text-white text-sm font-bold">Ganti Gambar</p>
                            </div>
                        </div>
                    </template>
                    <template x-if="!imagePreview">
                        <div>
                            <div class="w-12 h-12 rounded-full mb-3 flex items-center justify-center transition-colors duration-300 mx-auto" :class="darkMode ? 'bg-gray-800 text-gray-400 group-hover:text-blue-400' : 'bg-white text-gray-500 group-hover:text-blue-500'">
                                <svg class="w-6 h-6 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <p class="font-bold text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Unggah Thumbnail</p>
                            <p class="text-[11px] font-medium mt-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Rasio 16:9, Maksimal 2MB</p>
                        </div>
                    </template>
                    <input type="file" class="hidden" x-ref="imageUploadInput" accept="image/*" @change="handleImage">
                </div>
            </div>

            {{-- Settings & Publication --}}
            <div class="rounded-[1.5rem] p-6 transition-colors duration-300 shadow-md" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
                <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    PENGATURAN PUBLIKASI
                </h3>

                <div class="mb-5">
                    <label class="block text-[10px] font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">KATEGORI</label>
                    <div class="relative">
                        <select class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-blue-500/20 transition-all outline-none appearance-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500/50' : 'bg-white border-gray-300 text-gray-900 focus:border-blue-500 shadow-sm'">
                            <option>Berita Sekolah</option>
                            <option>Pengumuman</option>
                            <option>Prestasi</option>
                            <option>Artikel Guru</option>
                        </select>
                        <svg class="w-4 h-4 absolute right-4 top-[14px] pointer-events-none" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">VISIBILITAS</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="visibility" value="public" checked class="w-4 h-4 accent-blue-600">
                            <span class="text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Publik</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="visibility" value="internal" class="w-4 h-4 accent-blue-600">
                            <span class="text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Internal</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Publish Date --}}
            <div class="rounded-[1.5rem] p-6 transition-colors duration-300 shadow-md" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
                <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-4 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    TANGGAL TERBIT
                </h3>
                <input type="datetime-local" class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-blue-500/20 transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500/50' : 'bg-white border-gray-300 text-gray-900 focus:border-blue-500 shadow-sm'">
            </div>

            {{-- Article Stats --}}
            <div class="rounded-[1.5rem] p-6 transition-colors duration-300 shadow-md" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
                <h3 class="text-xs font-extrabold tracking-widest uppercase mb-4 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">STATUS ARTIKEL</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Total View</p>
                        <p class="text-2xl font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">1,248</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Update</p>
                        <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">2j lalu</p>
                    </div>
                </div>

                <div class="mt-4 p-3 rounded-lg transition-colors duration-300 flex items-center justify-between" :class="darkMode ? 'bg-green-500/10 border border-green-500/20' : 'bg-green-50 border border-green-200'">
                    <span class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-green-400' : 'text-green-700'">TERBIT</span>
                    <span class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-green-400' : 'text-green-700'">●</span>
                </div>

                <p class="text-[10px] transition-colors duration-300 mt-3" :class="darkMode ? 'text-gray-500' : 'text-gray-600'">Terakhir diubah oleh Admin 1</p>
            </div>

        </div>
    </form>

</div>
@endsection