@extends('layouts.superadmin.app')

@section('title', 'Buat Artikel - EduAdmin Pro')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function articleForm() {
        return {
            title: '',
            slug: '',
            imagePreview: null,
            highlightArticle: true,
            autoComments: false,
            
            generateSlug() {
                this.slug = this.title
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            },

            handleImage(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.imagePreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },

            async submitForm() {
                Swal.fire({
                    title: 'Menyimpan Artikel...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading() }
                });

                const formData = new FormData(this.$refs.mainForm);
                formData.set('is_published', '0');
                formData.set('allow_comments', this.autoComments ? '1' : '0');
                formData.set('highlight_article', this.highlightArticle ? '1' : '0');

                try {
                    const response = await fetch("{{ route('superadmin.articles.store') }}", {
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
                            text: 'Artikel disimpan sebagai draf.',
                            confirmButtonColor: '#3B82F6',
                        }).then(() => {
                            window.location.href = "{{ route('superadmin.articles.index') }}";
                        });
                    } else {
                        let msg = data.errors ? Object.values(data.errors).flat().join('<br>') : 'Gagal menyimpan.';
                        Swal.fire({ icon: 'error', title: 'Oops...', html: msg });
                    }
                } catch (error) {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Koneksi bermasalah.' });
                }
            }
        }
    }
</script>
@endpush

@section('content')
<div class="p-8 flex-1 w-full max-w-7xl mx-auto" x-data="articleForm()">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-6 border-b border-gray-200 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900">Buat Artikel Baru</h2>
            <p class="text-gray-500">Publikasikan berita atau pengumuman terbaru sekolah.</p>
        </div>
        <button type="button" @click="submitForm()" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-600/30">
            Simpan sebagai Draft
        </button>
    </div>

    <form x-ref="mainForm" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-8">
        @csrf
        
        {{-- Kolom Kiri --}}
        <div class="flex-1 space-y-6">
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                <div class="mb-6">
                    <label class="block text-xs font-bold tracking-widest text-gray-400 uppercase mb-3">JUDUL ARTIKEL</label>
                    <input x-model="title" @input="generateSlug()" name="title" type="text" placeholder="Masukkan judul..."
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 text-xl font-bold focus:ring-4 focus:ring-blue-500/10 outline-none focus:border-blue-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold tracking-widest text-gray-400 uppercase mb-3">KONTEN ARTIKEL</label>
                    <textarea name="content" placeholder="Mulai menulis..."
                        class="w-full px-5 py-6 rounded-2xl border border-gray-200 min-h-[400px] focus:outline-none focus:border-blue-500 transition-all"></textarea>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan --}}
        <div class="w-full lg:w-80 space-y-6">
            {{-- Image Upload --}}
            <div class="bg-white rounded-[1.5rem] p-6 shadow-sm border border-gray-100">
                <h3 class="text-xs font-bold text-gray-400 uppercase mb-4">GAMBAR UNGGULAN</h3>
                <div class="w-full aspect-[16/9] rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col items-center justify-center cursor-pointer overflow-hidden relative group"
                    @click="$refs.imageInput.click()">
                    
                    <template x-if="imagePreview">
                        <img :src="imagePreview" class="absolute inset-0 w-full h-full object-cover">
                    </template>
                    
                    <div x-show="!imagePreview" class="text-center">
                        <p class="text-gray-500 text-sm font-bold">Pilih Gambar</p>
                    </div>

                    <div x-show="imagePreview" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <span class="text-white text-xs font-bold">Ganti Gambar</span>
                    </div>

                    <input type="file" name="featured_image" x-ref="imageInput" class="hidden" accept="image/*" @change="handleImage">
                </div>
            </div>

            {{-- Settings --}}
            <div class="bg-white rounded-[1.5rem] p-6 shadow-sm border border-gray-100">
                <h3 class="text-xs font-bold text-gray-400 uppercase mb-5">SETTINGS & SEO</h3>
                <div class="mb-4">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">KATEGORI</label>
                    <select name="category_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm outline-none">
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">SLUG URL</label>
                    <input x-model="slug" name="slug" readonly class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 text-gray-500 text-sm outline-none cursor-not-allowed">
                </div>
            </div>

            {{-- Visibilitas --}}
            <div class="bg-white rounded-[1.5rem] p-6 shadow-sm border border-gray-100">
                <h3 class="text-xs font-bold text-gray-400 uppercase mb-5">VISIBILITAS</h3>
                
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-bold text-gray-700">Highlight</span>
                    <button type="button" @click="highlightArticle = !highlightArticle" 
                        class="w-11 h-6 rounded-full transition-colors relative"
                        :class="highlightArticle ? 'bg-blue-600' : 'bg-gray-300'">
                        <span class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full transition-transform" :class="highlightArticle ? 'translate-x-5' : ''"></span>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-gray-700">Komentar</span>
                    <button type="button" @click="autoComments = !autoComments" 
                        class="w-11 h-6 rounded-full transition-colors relative"
                        :class="autoComments ? 'bg-blue-600' : 'bg-gray-300'">
                        <span class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full transition-transform" :class="autoComments ? 'translate-x-5' : ''"></span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection