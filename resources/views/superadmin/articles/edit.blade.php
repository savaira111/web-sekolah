@extends('layouts.superadmin.app')

@section('title', 'Edit Artikel - Admin Mahput')

@section('content')
<div class="p-6 lg:p-10 min-h-screen" :class="$store.theme.darkMode ? '' : 'bg-gray-50'">
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
                <a href="{{ route('superadmin.articles.index') }}" class="text-gray-500 hover:text-blue-600">Artikel / Berita</a>
            </li>
            <li class="flex items-center space-x-2 text-gray-400">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-medium">Edit Artikel</span>
            </li>
        </ol>
    </nav>

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div class="flex items-start space-x-5">
            <a href="{{ route('superadmin.articles.index') }}" 
               class="p-3 rounded-2xl bg-white shadow-xl shadow-gray-200/50 text-gray-400 hover:text-blue-600 transition-all duration-300 group"
               :class="$store.theme.darkMode ? 'bg-[#111827] shadow-none border border-gray-800 hover:bg-slate-700' : ''">
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">
                    Update Article
                </h1>
                <p class="mt-1 text-gray-500 max-w-2xl">
                    Perbaharui konten berita atau informasi terkini untuk portal sekolah.
                </p>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="mt-6 lg:mt-0 flex items-center space-x-3">
            <button type="button" onclick="submitForm({{ $article->is_published ? 1 : 0 }})" class="px-8 py-3 rounded-xl font-bold text-sm bg-blue-600 text-white hover:bg-blue-700 shadow-xl shadow-blue-500/20 active:scale-95 transition-all whitespace-nowrap">
                Simpan Perubahan
            </button>
        </div>
    </div>

    <form id="articleForm" action="{{ route('superadmin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        @csrf
        @method('PUT')
        <input type="hidden" name="is_published" id="is_published" value="{{ $article->is_published ? 1 : 0 }}">
        
        <!-- Left Sidebar: Main Form Content -->
        <div class="lg:col-span-8 space-y-8">
            <div class="rounded-3xl p-8 shadow-xl transition-all duration-200" :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                
                <!-- Title Input -->
                <div class="mb-8 group">
                    <label for="title" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-blue-500 transition-colors">JUDUL ARTIKEL</label>
                    <input type="text" name="title" id="title" required
                           value="{{ old('title', $article->title) }}"
                           class="w-full text-2xl lg:text-3xl font-bold bg-transparent border-none focus:ring-0 placeholder:text-gray-300 p-0"
                           :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'"
                           placeholder="Masukkan judul artikel yang menarik..."
                           oninput="updateSlug(this.value)">
                    @error('title')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rich Text Editor Container -->
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">KONTEN ARTIKEL</label>
                    
                    <div class="rounded-2xl overflow-hidden border transition-all duration-200 shadow-inner" 
                         :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 focus-within:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus-within:border-blue-400/50'">
                        
                        <!-- Quill Editor -->
                        <div id="editor-container" class="bg-transparent">
                            <div id="editor" class="min-h-[600px] text-lg leading-relaxed">{!! old('content', $article->content) !!}</div>
                        </div>
                        <textarea name="content" id="content_textarea" class="hidden"></textarea>
                    </div>
                    @error('content')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Right Sidebar: Settings and Metadata -->
        <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-8 self-start">
            

            <!-- Featured Image Card -->
            <div class="rounded-3xl p-6 shadow-xl transition-all duration-200"
                 :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                <div class="flex items-center space-x-2 mb-6">
                    <div class="p-2 rounded-lg bg-blue-500/10 text-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xs uppercase tracking-widest text-gray-500">FEATURED IMAGE</h3>
                </div>

                <div class="relative group">
                    <input type="file" name="featured_image" id="featured_image" class="hidden" accept="image/*" onchange="previewImage(this)">
                    <label for="featured_image" 
                           class="flex flex-col items-center justify-center p-8 rounded-2xl border-2 border-dashed transition-all cursor-pointer group-hover:border-blue-500/50"
                           :class="$store.theme.darkMode ? 'border-gray-800 bg-[#111827]/40' : 'border-gray-200 bg-gray-50 hover:bg-gray-100/50'">
                        
                        <div id="image-preview-container" class="{{ $article->featured_image ? '' : 'hidden' }} w-full mb-4 rounded-xl overflow-hidden aspect-video">
                            <img id="image-preview" src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : '#' }}" alt="Preview" class="w-full h-full object-cover">
                        </div>

                        <div id="upload-placeholder" class="{{ $article->featured_image ? 'hidden' : '' }} text-center">
                            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center mx-auto mb-4 text-blue-500 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-gray-500 mb-1">Upload Thumbnail</p>
                            <p class="text-[10px] text-gray-400 font-medium tracking-tighter">Rasio 16:9, Maksimal 2MB</p>
                        </div>
                    </label>
                </div>
                @error('featured_image')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Settings & SEO Card -->
            <div class="rounded-3xl p-6 shadow-xl transition-all duration-200"
                 :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                <div class="flex items-center space-x-2 mb-6 text-emerald-500">
                    <div class="p-2 rounded-lg bg-emerald-500/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xs uppercase tracking-widest text-gray-500">SETTINGS & SEO</h3>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">KATEGORI</label>
                        <div class="relative group">
                            <select name="category" id="category" class="w-full appearance-none px-4 py-3 rounded-xl border font-medium focus:ring-0 transition-all duration-200"
                                    :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 text-white focus:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus:border-blue-400/50'">
                                @foreach($categories as $key => $value)
                                    <option value="{{ $key }}" {{ old('category', $article->category) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">SLUG URL</label>
                        <div class="flex items-center rounded-xl border transition-all duration-200 overflow-hidden"
                             :class="$store.theme.darkMode ? 'bg-[#111827]/50 border-gray-800 focus-within:border-blue-500/50' : 'bg-gray-50 border-gray-200 focus-within:border-blue-400/50'">
                            <span class="px-3 py-3 text-xs font-semibold text-gray-400 bg-gray-100/5" :class="$store.theme.darkMode ? 'bg-[#111827]' : 'bg-gray-100'">edu.com/</span>
                            <input type="text" name="slug" id="slug"
                                   class="flex-1 bg-transparent border-none focus:ring-0 text-sm font-medium py-3 px-2"
                                   :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-500'"
                                   value="{{ old('slug', $article->slug) }}">
                        </div>
                        <p class="mt-2 text-[10px] text-gray-400 italic">* Edit slug hati-hati, dapat merusak link lama.</p>
                    </div>
                </div>
            </div>

            <!-- Visibilitas Card -->
            <div class="rounded-3xl p-6 shadow-xl transition-all duration-200"
                 :class="$store.theme.darkMode ? 'bg-[#111827]/50' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
                <div class="flex items-center space-x-2 mb-6 text-orange-500">
                    <div class="p-2 rounded-lg bg-orange-500/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xs uppercase tracking-widest text-gray-500">VISIBILITAS</h3>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">Publikasikan</p>
                            <p class="text-[10px] text-gray-400 mt-1">Terbitkan artikel ke publik</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_published_toggle" value="1" {{ $article->is_published ? 'checked' : '' }} class="sr-only peer" 
                                   onchange="document.getElementById('is_published').value = this.checked ? 1 : 0">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">Highlight Artikel</p>
                            <p class="text-[10px] text-gray-400 mt-1">Tampilkan di slider utama</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_highlighted" value="1" {{ $article->is_highlighted ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">Aktifkan Komentar</p>
                            <p class="text-[10px] text-gray-400 mt-1">Izinkan interaksi publik</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="allow_comments" value="1" {{ $article->allow_comments ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<!-- Quill.js Editor -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<style>
    /* Quill Editor Theme Overrides */
    .ql-toolbar.ql-snow {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: 2px solid rgba(226, 232, 240, 0.5) !important;
        padding: 1rem !important;
        background: rgba(255, 255, 255, 0.02) !important;
        border-radius: 1rem 1rem 0 0;
    }
    .dark .ql-toolbar.ql-snow {
        border-bottom-color: rgba(51, 65, 85, 0.5) !important;
    }
    .ql-container.ql-snow {
        border: none !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }
    .ql-editor {
        padding: 2.5rem !important;
        min-height: 600px !important;
        font-size: 1.125rem;
        line-height: 1.75;
    }
    .ql-editor.ql-blank::before {
        color: #94a3b8 !important;
        font-style: normal !important;
        left: 2.5rem !important;
        right: 2.5rem !important;
    }
    
    /* Dark Mode Icons and Text in Toolbar */
    .dark .ql-snow .ql-stroke { stroke: #94a3b8 !important; }
    .dark .ql-snow .ql-fill { fill: #94a3b8 !important; }
    .dark .ql-snow .ql-picker { color: #94a3b8 !important; }
    .dark .ql-snow .ql-picker-options { background-color: #1e293b !important; border-color: #334155 !important; }
    .dark .ql-snow .ql-picker-item:hover { color: #3b82f6 !important; }
    .dark .ql-snow .ql-active .ql-stroke { stroke: #3b82f6 !important; }
    
    /* Full Toolbar Styling */
    .ql-snow .ql-tooltip {
        background-color: #1e293b !important;
        color: #fff !important;
        border: 1px solid #334155 !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
        border-radius: 0.75rem !important;
        z-index: 100 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Full Professional Quill
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Mulai menulis konten artikel profesional Anda di sini...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'align': [] }],
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });

        // Handle form submission
        window.submitForm = function(status) {
            if(status !== undefined) {
                document.getElementById('is_published').value = status;
            }
            
            // Get content from Quill
            var content = document.querySelector('#editor .ql-editor').innerHTML;
            if (content === '<p><br></p>') {
                content = ''; 
            }
            document.getElementById('content_textarea').value = content;
            
            // Basic validation
            if (!document.getElementById('title').value) {
                alert('Judul artikel wajib diisi.');
                document.getElementById('title').focus();
                return;
            }
            
            if (!content) {
                alert('Konten artikel wajib diisi.');
                quill.focus();
                return;
            }

            document.getElementById('articleForm').submit();
        };

        // Slug updater
        window.updateSlug = function(value) {
            const slug = value.toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        };

        // Image preview
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
    });
</script>
@endpush
@endsection

