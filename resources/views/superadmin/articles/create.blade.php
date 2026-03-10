<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Article - EduAdmin Pro</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }

        body {
            font-family: 'Outfit', sans-serif;
        }
        
        .sidebar { background-color: #111827; }
        .sidebar-active { background-color: #3B82F6; color: white; }
        .sidebar-item { color: #9CA3AF; }
        .sidebar-item:hover { background-color: #1F2937; color: white; }
    </style>
    <script>
        if (localStorage.getItem('darkMode') === 'true' || !('darkMode' in localStorage)) {
            document.documentElement.style.backgroundColor = '#0F172A';
        } else {
            document.documentElement.style.backgroundColor = '#F8FAFC';
        }
        document.write('<style id="no-trans">*, *::before, *::after { transition: none !important; }</style>');
        document.addEventListener('alpine:initialized', () => {
            setTimeout(() => {
                const el = document.getElementById('no-trans');
                if (el) el.remove();
            }, 50);
        });
    </script>
</head>
<body class="antialiased flex h-screen overflow-hidden transition-colors duration-300" 
      x-data="articleForm()"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="darkMode ? 'bg-[#0F172A] text-[#F8FAFC]' : 'bg-[#F8FAFC] text-[#0F172A]'">

    <script>
        function articleForm() {
            return {
                sidebarOpen: true,
                darkMode: localStorage.getItem('darkMode') ? localStorage.getItem('darkMode') === 'true' : true,
                showNotifications: false,
                highlightArticle: true,
                autoComments: false,
                title: '',
                slug: '',
                imagePreview: null,
                init() {
                    this.$watch('title', value => {
                        this.slug = value
                            .toLowerCase()
                            .replace(/ /g, '-')
                            .replace(/[^\w-]+/g, '');
                    });
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
                }
            }
        }
    </script>

    <!-- Sidebar -->
    <aside class="w-64 sidebar h-full flex flex-col transition-all duration-300 z-20 shrink-0" :class="{'hidden': !sidebarOpen}">
        <div class="h-20 flex items-center px-6 border-b border-gray-800">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-bold text-xl shrink-0 overflow-hidden">
                <img src="{{ asset('images/logo-mahaputra.png') }}" alt="M" class="w-full h-full object-contain p-1" onerror="this.src='https://ui-avatars.com/api/?name=M&background=3B82F6&color=fff'">
            </div>
            <div class="ml-3">
                <h1 class="text-white font-bold text-lg leading-tight">SMKS Mahaputra</h1>
                <p class="text-xs text-blue-400 font-medium">Super Admin</p>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
            <a href="/superadmin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="/superadmin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Manajemen Pengguna
            </a>
            <a href="/superadmin/articles" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-active font-medium text-sm transition-colors">
                <svg class="w-5 h-5 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Artikel / Berita
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                PPDB Management
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                Eskul Management
            </a>
        </div>

        <div class="p-4 border-t border-gray-800">
            <div class="bg-[#1F2937] rounded-2xl p-3 flex items-center justify-between">
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 text-red-500 hover:text-red-400 font-semibold text-sm transition-colors w-full p-2" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-y-auto w-full transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]' : 'bg-[#f8fafc]'">
        <header class="h-24 px-8 flex items-center justify-between shrink-0 backdrop-blur-md sticky top-0 z-10 w-full mb-2 transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]/80 border-b border-gray-800' : 'bg-[#f8fafc]/80 border-b border-gray-200'">
            <div class="relative hidden lg:block w-96">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-4 py-2.5 border-0 rounded-full text-sm focus:ring-2 focus:ring-blue-500/20 transition-all shadow-sm" :class="darkMode ? 'bg-[#1E293B] text-white placeholder-gray-500' : 'bg-white text-gray-900 placeholder-gray-400'" placeholder="Cari di EduAdmin...">
            </div>
            
            <div class="flex items-center gap-5 ml-auto">
                <button @click="darkMode = !darkMode" class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] text-yellow-500 hover:bg-gray-800' : 'bg-white text-gray-600 hover:bg-gray-50'">
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-cloak x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
                
                <div class="relative">
                    <button @click="showNotifications = !showNotifications" @click.away="showNotifications = false" class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm transition-colors duration-300 relative" :class="darkMode ? 'bg-[#1E293B] text-gray-300 hover:bg-gray-800' : 'bg-white text-gray-600 hover:bg-gray-50'">
                        <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 transition-colors duration-300" :class="darkMode ? 'border-[#1E293B]' : 'border-white'"></span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <!-- Notification Dropdown -->
                    <div x-cloak x-show="showNotifications" x-transition class="absolute right-0 mt-2 w-80 rounded-2xl shadow-lg border overflow-hidden z-50 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <div class="px-4 py-3 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                            <h3 class="font-bold text-sm" :class="darkMode ? 'text-white' : 'text-gray-900'">Notifikasi</h3>
                        </div>
                        <div class="max-h-64 overflow-y-auto">
                            <div class="px-4 py-3 border-b last:border-0 hover:bg-gray-50 dark:hover:bg-[#0F172A] cursor-pointer transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                                <p class="text-xs font-semibold" :class="darkMode ? 'text-gray-200' : 'text-gray-800'">Pendaftaran PPDB Baru</p>
                                <p class="text-[10px]" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Budi mendaftar di jurusan RPL</p>
                                <span class="text-[9px] text-blue-500 mt-1 block">5 menit yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-8 w-px bg-gray-200 dark:bg-gray-700 mx-2"></div>
                
                <a href="/profil" class="flex items-center gap-3 group">
                    <div class="text-right hidden sm:block">
                        <p class="text-[13px] font-bold leading-none transition-colors duration-300 group-hover:text-blue-500" :class="darkMode ? 'text-white' : 'text-gray-900'">{{ auth()->user()->name ?? 'Admin Utama' }}</p>
                        <p class="text-[10px] font-bold tracking-wider uppercase transition-colors duration-300 mt-1" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">SUPER ADMIN</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-bold overflow-hidden border-2 border-transparent group-hover:border-blue-500 transition-all">
                        <img src="{{ asset('images/guru-1.jpg') }}" alt="Avatar" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=bfdbfe&color=1e3a8a'">
                    </div>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-8 flex-1 w-full max-w-7xl mx-auto">
            
            <!-- Breadcrumb & Header Box -->
            <div class="flex items-center gap-2 text-xs font-medium mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                <a href="/superadmin/dashboard" class="hover:text-blue-500 transition-colors flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <span>›</span>
                <a href="/superadmin/articles" class="hover:text-blue-500 transition-colors">Artikel / Berita</a>
                <span>›</span>
                <span :class="darkMode ? 'text-white' : 'text-gray-900'">Buat Artikel Baru</span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-6 border-b transition-colors duration-300 gap-4" :class="darkMode ? 'border-gray-800' : 'border-gray-200'">
                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Buat Artikel Baru</h2>
                    <p class="text-[15px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Publikasikan berita atau pengumuman terbaru sekolah untuk semua pemangku kepentingan.</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <a href="/superadmin/articles" class="px-5 py-2.5 font-bold text-sm transition-colors duration-300 hover:text-blue-500" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                        Batal
                    </a>
                    <button class="px-8 py-3 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-lg shadow-blue-600/30">
                        Simpan sebagai Draft
                    </button>
                </div>
            </div>

            <form class="flex flex-col lg:flex-row gap-8">
                <!-- Left Column (Main Editor) -->
                <div class="flex-1 space-y-6">
                    <!-- Editor Box -->
                    <div class="rounded-[2rem] p-8 border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <div class="mb-6">
                            <label class="block text-xs font-extrabold tracking-widest uppercase mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">JUDUL ARTIKEL</label>
                            <input x-model="title" type="text" placeholder="Masukkan judul artikel yang menarik..." class="w-full px-5 py-4 rounded-2xl border text-xl font-bold focus:ring-4 focus:ring-blue-500/10 transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-600 focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-300 focus:border-blue-500'">
                        </div>

                        <div>
                            <label class="block text-xs font-extrabold tracking-widest uppercase mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">KONTEN ARTIKEL</label>
                            
                            <!-- Editor Toolbar -->
                            <div class="border rounded-t-2xl px-4 py-3 flex items-center gap-6 transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A] border-gray-700' : 'bg-gray-50 border-gray-200'">
                                <div class="flex items-center gap-2">
                                    <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center font-serif font-bold text-lg transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">B</button>
                                    <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center font-serif font-medium italic text-lg transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">I</button>
                                    <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center font-serif font-medium underline text-lg transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">U</button>
                                </div>
                                <div class="w-px h-6 bg-gray-300 dark:bg-gray-700"></div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                    </button>
                                    <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h16"></path></svg>
                                    </button>
                                </div>
                                <div class="w-px h-6 bg-gray-300 dark:bg-gray-700"></div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </button>
                                    <button type="button" class="w-8 h-8 rounded shrink-0 flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-300 hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-200'">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Editor Content Area -->
                            <textarea placeholder="Mulai menulis konten di sini..." class="w-full px-5 py-6 rounded-b-2xl border border-t-0 text-base min-h-[400px] focus:outline-none transition-colors duration-300 resize-y" :class="darkMode ? 'bg-[#1E293B] border-gray-700 text-gray-300 placeholder-gray-600' : 'bg-white border-gray-200 text-gray-800 placeholder-gray-400'"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Sidebar Settings) -->
                <div class="w-full lg:w-80 space-y-6">
                    
                    <!-- Featured Image -->
                    <div class="rounded-3xl p-6 border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-4 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-700'">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            GAMBAR UNGGULAN
                        </h3>
                        <div class="w-full aspect-[16/9] rounded-2xl border-2 border-dashed flex flex-col items-center justify-center text-center cursor-pointer transition-colors duration-300 group overflow-hidden relative" :class="darkMode ? 'border-gray-700 bg-[#0F172A]' : 'border-gray-200 bg-gray-50'" @click="$refs.imageUploadInput.click()">
                            <!-- Image Preview -->
                            <template x-if="imagePreview">
                                <div class="absolute inset-0 w-full h-full">
                                    <img :src="imagePreview" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <p class="text-white text-sm font-bold">Ganti Gambar</p>
                                    </div>
                                </div>
                            </template>
                            <!-- Placeholder -->
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

                    <!-- Settings & SEO -->
                    <div class="rounded-3xl p-6 border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-700'">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            SETTINGS & SEO
                        </h3>

                        <div class="mb-5">
                            <label class="block text-[10px] font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">KATEGORI</label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-blue-500/20 transition-all outline-none appearance-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                    <option>Berita Sekolah</option>
                                    <option>Pengumuman</option>
                                    <option>Prestasi</option>
                                    <option>Artikel Guru</option>
                                </select>
                                <svg class="w-4 h-4 absolute right-4 top-[14px] pointer-events-none" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">SLUG URL</label>
                            <div class="flex items-center w-full px-4 py-3 rounded-xl border transition-all" :class="darkMode ? 'bg-[#0F172A] border-gray-700' : 'bg-gray-50 border-gray-200'">
                                <span class="text-xs transition-colors duration-300 whitespace-nowrap" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">edu.com/artikel/</span>
                                <input x-model="slug" readonly type="text" placeholder="judul-artikel-baru" class="w-full bg-transparent text-sm border-0 focus:ring-0 ml-1 font-medium placeholder-gray-500 outline-none cursor-not-allowed select-none" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                            </div>
                        </div>
                    </div>

                    <!-- Visibility Config -->
                    <div class="rounded-3xl p-6 border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <h3 class="flex items-center gap-2 text-xs font-extrabold tracking-widest uppercase mb-5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-700'">
                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            VISIBILITAS
                        </h3>

                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h4 class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-800'">Highlight Artikel</h4>
                                <p class="text-[10px] font-medium transition-colors duration-300 mt-0.5" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Tampilkan di slider utama</p>
                            </div>
                            <button type="button" @click="highlightArticle = !highlightArticle" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none" :class="highlightArticle ? 'bg-blue-600' : (darkMode ? 'bg-gray-700' : 'bg-gray-200')">
                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="highlightArticle ? 'translate-x-5' : 'translate-x-0'"></span>
                            </button>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-800'">Aktifkan Komentar</h4>
                                <p class="text-[10px] font-medium transition-colors duration-300 mt-0.5" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Izinkan interaksi publik</p>
                            </div>
                            <button type="button" @click="autoComments = !autoComments" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none" :class="autoComments ? 'bg-blue-600' : (darkMode ? 'bg-gray-700' : 'bg-gray-200')">
                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="autoComments ? 'translate-x-5' : 'translate-x-0'"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            
        </div>
    </main>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
