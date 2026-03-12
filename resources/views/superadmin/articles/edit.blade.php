@extends('layouts.superadmin.app')

@section('title', 'Edit Artikel - EduAdmin Pro')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function articleEditForm() {
        return {
            title: @js($article->title),
            slug: @js($article->slug),
            imagePreview: @js($article->featured_image ? asset('storage/' . $article->featured_image) : null),
            highlightArticle: false,
            autoComments: true,
            category: @js($article->category),
            is_published: @js($article->is_published ? '1' : '0'),

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

            generateSlug() {
                this.slug = this.title
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            },

            async submitForm() {
                if (!this.title.trim()) {
                    Swal.fire({ icon: 'error', title: 'Oops...', text: 'Judul artikel wajib diisi.' });
                    return;
                }

                Swal.fire({
                    title: 'Menyimpan Perubahan...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading() }
                });

                const formData = new FormData(this.$refs.mainForm);
                formData.append('_method', 'PUT');

                try {
                    const response = await fetch("{{ route('superadmin.articles.update', $article) }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message || 'Artikel berhasil diperbarui.',
                            confirmButtonColor: '#3B82F6',
                        }).then(() => {
                            window.location.href = data.redirect || "{{ route('superadmin.articles.index') }}";
                        });
                    } else {
                        let msg = data.errors ? Object.values(data.errors).flat().join('<br>') : (data.message || 'Gagal menyimpan.');
                        Swal.fire({ icon: 'error', title: 'Oops...', html: msg });
                    }
                } catch (error) {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Koneksi bermasalah.' });
                }
            }
        };
    }
</script>
@endpush

@section('content')
<div class="px-8 py-8 flex-1 w-full max-w-7xl mx-auto" x-data="articleEditForm()">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm mb-6 text-gray-600">
        <a href="/superadmin/dashboard" class="flex items-center gap-2 hover:text-blue-500 transition-colors duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>
        <span>›</span>
        <a href="{{ route('superadmin.articles.index') }}" class="hover:text-blue-500 transition-colors">Artikel / Berita</a>
        <span>›</span>
        <span class="text-gray-900">Edit Artikel</span>
    </div>

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-6 border-b border-gray-200 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold tracking-tight leading-none mb-2 text-gray-900">Update Artikel Sekolah</h2>
            <p class="text-[15px] font-medium text-gray-500">Perbaharui konten berita atau informasi terkini untuk portal sekolah.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('superadmin.articles.index') }}" class="px-6 py-3 rounded-xl text-sm font-bold bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors duration-300">
                Batalkan
            </a>
            <button type="button" @click="submitForm()" class="px-8 py-3 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-lg shadow-blue-600/30">
                Simpan Perubahan
            </button>
        </div>
    </div>

    {{-- Form --}}
    <form x-ref="mainForm" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-8">
        @csrf
        {{-- Left Column (Main Editor) --}}
        <div class="flex-1 space-y-6">
            <div class="rounded-[2rem] p-8 bg-white shadow-md">
                <div class="mb-6">
                    <label class="block text-xs font-extrabold tracking-widest uppercase mb-3 text-gray-600">JUDUL ARTIKEL</label>
                    <input x-model="title" @input="generateSlug()" name="title" type="text" placeholder="Masukkan judul artikel yang menarik..."
                        class="w-full px-5 py-4 rounded-2xl border border-gray-300 text-gray-900 placeholder-gray-400 focus:border-blue-500 shadow-sm text-xl font-bold focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                </div>

                <div>
                    <label class="block text-xs font-extrabold tracking-widest uppercase mb-3 text-gray-600">KONTEN ARTIKEL</label>
                    <textarea name="content" placeholder="Mulai menulis konten di sini..."
                        class="w-full px-5 py-6 rounded-2xl border border-gray-300 text-gray-800 placeholder-gray-400 shadow-sm text-base min-h-[400px] focus:outline-none focus:border-blue-500 transition-colors duration-300 resize-y">{{ $article->content }}</textarea>
                </div>
            </div>
        </div>

        {{-- Right Column (Sidebar Settings) --}}
        <div class="w-full lg:w-80 space-y-6">

            {{-- Featured Image --}}
            <div class="rounded-[1.5rem] p-6 bg-white shadow-md border border-gray-100">
                <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-4 text-gray-600">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    GAMBAR SAMPUL
                </h3>
                <div class="w-full aspect-[16/9] rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col items-center justify-center text-center cursor-pointer transition-colors duration-300 group overflow-hidden relative"
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
                            <div class="w-12 h-12 rounded-full mb-3 flex items-center justify-center bg-white text-gray-500 group-hover:text-blue-500 mx-auto">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <p class="font-bold text-sm text-gray-700">Unggah Thumbnail</p>
                            <p class="text-[11px] font-medium mt-1 text-gray-400">Rasio 16:9, Maksimal 2MB</p>
                        </div>
                    </template>
                    <input type="file" name="featured_image" class="hidden" x-ref="imageUploadInput" accept="image/*" @change="handleImage">
                </div>
            </div>

            {{-- Settings & Publication --}}
            <div class="rounded-[1.5rem] p-6 bg-white shadow-md border border-gray-100">
                <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-5 text-gray-600">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    PENGATURAN PUBLIKASI
                </h3>

                <div class="mb-5">
                    <label class="block text-[10px] font-bold uppercase tracking-wider mb-2 text-gray-500">KATEGORI</label>
                    <div class="relative">
                        <select name="category" x-model="category" class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-900 focus:border-blue-500 shadow-sm text-sm focus:ring-2 focus:ring-blue-500/20 transition-all outline-none appearance-none">
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <svg class="w-4 h-4 absolute right-4 top-[14px] pointer-events-none text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                <div class="mb-5">
                    <label class="block text-[10px] font-bold uppercase tracking-wider mb-2 text-gray-500">SLUG URL</label>
                    <input x-model="slug" name="slug" readonly class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 text-gray-500 text-sm outline-none cursor-not-allowed">
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider mb-2 text-gray-500">VISIBILITAS</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="is_published" value="1" x-model="is_published" class="w-4 h-4 accent-blue-600">
                            <span class="text-sm text-gray-700">Publik (Terbit)</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="is_published" value="0" x-model="is_published" class="w-4 h-4 accent-blue-600">
                            <span class="text-sm text-gray-700">Draf / Internal</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Article Stats --}}
            <div class="rounded-[1.5rem] p-6 bg-white shadow-md border border-gray-100">
                <h3 class="text-xs font-extrabold tracking-widest uppercase mb-4 text-gray-600">STATUS ARTIKEL</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider mb-1 text-gray-500">Total View</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($article->views_count) }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider mb-1 text-gray-500">Update</p>
                        <p class="text-sm font-medium text-gray-600">{{ $article->updated_at->diffForHumans() }}</p>
                    </div>
                </div>

                @if($article->is_published)
                <div class="mt-4 p-3 rounded-lg flex items-center justify-between bg-green-50 border border-green-200">
                    <span class="text-xs font-bold text-green-700">TERBIT</span>
                    <span class="text-xs font-bold text-green-700">●</span>
                </div>
                @else
                <div class="mt-4 p-3 rounded-lg flex items-center justify-between bg-yellow-50 border border-yellow-200">
                    <span class="text-xs font-bold text-yellow-700">DRAF</span>
                    <span class="text-xs font-bold text-yellow-700">●</span>
                </div>
                @endif

                <p class="text-[10px] text-gray-600 mt-3">Terakhir diubah oleh {{ $article->author->name ?? 'Admin' }}</p>
            </div>

        </div>
    </form>

</div>
@endsection