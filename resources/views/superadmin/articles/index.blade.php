<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel & Berita - EduAdmin Pro</title>
    
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
      x-data="{ sidebarOpen: true, darkMode: localStorage.getItem('darkMode') ? localStorage.getItem('darkMode') === 'true' : true, showNotifications: false, isDeleteModalOpen: false, isSuccessModalOpen: false, articleToDelete: null }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="darkMode ? 'bg-[#0F172A] text-[#F8FAFC]' : 'bg-[#F8FAFC] text-[#0F172A]'">

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
                <input type="text" class="block w-full pl-10 pr-4 py-2.5 border-0 rounded-full text-sm focus:ring-2 focus:ring-blue-500/20 transition-all shadow-sm" :class="darkMode ? 'bg-[#1E293B] text-white placeholder-gray-500' : 'bg-white text-gray-900 placeholder-gray-400'" placeholder="Cari artikel...">
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
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
                <div>
                    <div class="flex items-center gap-2 text-xs font-medium mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                        <a href="/superadmin/dashboard" class="hover:text-blue-500 transition-colors">Dashboard</a>
                        <span>›</span>
                        <span :class="darkMode ? 'text-blue-400' : 'text-blue-600'">Artikel Management</span>
                    </div>
                    <h2 class="text-3xl font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Artikel & Berita</h2>
                    <p class="text-[15px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola dan publikasikan artikel berita dan informasi resmi sekolah.</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="flex p-1 rounded-full border transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-700' : 'bg-gray-50 border-gray-200'">
                        <button class="px-5 py-2 rounded-full text-sm font-bold shadow-sm transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A] text-white border border-gray-700' : 'bg-gray-900 text-white'">Semua Postingan</button>
                        <button class="px-5 py-2 rounded-full text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-500 hover:text-gray-900'">Dipublikasikan</button>
                        <button class="px-5 py-2 rounded-full text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:text-white' : 'text-gray-500 hover:text-gray-900'">Draf</button>
                    </div>
                    <a href="/superadmin/articles/create" class="px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-full hover:bg-blue-700 transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Buat Artikel
                    </a>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Articles -->
                <div class="rounded-3xl p-6 border transition-colors duration-300 flex items-center gap-4 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center border transition-colors duration-300" :class="darkMode ? 'border-gray-700 bg-[#0F172A]' : 'border-blue-100 bg-blue-50'">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Total Artikel</p>
                        <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">124</h3>
                    </div>
                </div>

                <!-- Published -->
                <div class="rounded-3xl p-6 border transition-colors duration-300 flex items-center gap-4 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center border transition-colors duration-300" :class="darkMode ? 'border-gray-700 bg-[#0F172A]' : 'border-emerald-100 bg-emerald-50'">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Dipublikasikan</p>
                        <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">89</h3>
                    </div>
                </div>

                <!-- Drafts -->
                <div class="rounded-3xl p-6 border transition-colors duration-300 flex items-center gap-4 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center border transition-colors duration-300" :class="darkMode ? 'border-gray-700 bg-[#0F172A]' : 'border-amber-100 bg-amber-50'">
                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Draf</p>
                        <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">12</h3>
                    </div>
                </div>

                <!-- Views -->
                <div class="rounded-3xl p-6 border transition-colors duration-300 flex items-center gap-4 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center border transition-colors duration-300" :class="darkMode ? 'border-gray-700 bg-[#0F172A]' : 'border-purple-100 bg-purple-50'">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Total Tayangan</p>
                        <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">4.2k</h3>
                    </div>
                </div>
            </div>

            <!-- Data Table Container -->
            <div class="rounded-[2.5rem] p-8 border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8">
                    <div class="flex items-center gap-4 mb-4 sm:mb-0">
                        <h3 class="text-xl font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Postingan Terbaru</h3>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1.5 rounded-full border text-xs font-bold transition-colors duration-300 flex items-center gap-2" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-gray-600 hover:bg-gray-50'">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                Kategori
                            </button>
                            <button class="px-3 py-1.5 rounded-full border text-xs font-bold transition-colors duration-300 flex items-center gap-2" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-gray-600 hover:bg-gray-50'">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Tanggal
                            </button>
                        </div>
                    </div>
                    <p class="text-[13px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Menampilkan 1-10 dari 124 artikel</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[1000px]">
                        <thead>
                            <tr class="border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider pl-2 transition-colors duration-300 w-1/3" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Judul Artikel</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Kategori</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Penulis</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Dibuat Pada</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Dipublikasi Pada</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider text-right pr-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-[14px]">
                            <!-- Row 1 -->
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 transition-colors duration-300 pl-2">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-2xl overflow-hidden shrink-0 bg-blue-100">
                                            <svg class="w-full h-full text-blue-500/50 p-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        </div>
                                        <div>
                                            <a href="/superadmin/articles/1" class="font-bold text-base hover:text-blue-500 transition-colors duration-300 block mb-1 truncate max-w-[200px]" :class="darkMode ? 'text-white' : 'text-gray-900'" title="Kegiatan Menarik di Hari Olahraga Musim Panas 2024">Kegiatan Menarik di Hari...</a>
                                            <p class="text-xs transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Diperbarui 2 jam lalu • 1.2k tayangan</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-5">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300 bg-blue-500/10 text-blue-500">Acara</span>
                                </td>
                                <td class="py-5">
                                    <div class="flex items-center gap-3 font-bold text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">
                                        <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center overflow-hidden border-2 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-white'">
                                            <span class="text-xs text-amber-600">JD</span>
                                        </div>
                                        Mr. John Doe
                                    </div>
                                </td>
                                <td class="py-5 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    12 Okt 2024
                                </td>
                                <td class="py-5 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    12 Okt 2024
                                </td>
                                <td class="py-5 text-right pr-2">
                                    <div class="inline-flex items-center justify-end gap-2 font-bold text-[11px] uppercase tracking-wider text-emerald-500">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> PUBLISHED
                                    </div>
                                    <div class="flex items-center justify-end gap-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="/superadmin/articles/edit/1" class="text-blue-500 hover:text-blue-600 text-xs font-bold">Edit</a>
                                        <span :class="darkMode ? 'text-gray-700' : 'text-gray-300'">|</span>
                                        <button @click="isDeleteModalOpen = true; articleToDelete = 1" class="text-red-500 hover:text-red-600 text-xs font-bold">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 2 -->
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 transition-colors duration-300 pl-2">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-2xl overflow-hidden shrink-0 bg-amber-100">
                                            <svg class="w-full h-full text-amber-500/50 p-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        </div>
                                        <div>
                                            <a href="/superadmin/articles/2" class="font-bold text-base hover:text-amber-500 transition-colors duration-300 block mb-1 truncate max-w-[200px]" :class="darkMode ? 'text-white' : 'text-gray-900'" title="Peluang Beasiswa Baru Diumumkan">Peluang Beasiswa Baru...</a>
                                            <p class="text-xs transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Diperbarui kemarin • 856 tayangan</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-5">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300 bg-purple-500/10 text-purple-500">Akademik</span>
                                </td>
                                <td class="py-5">
                                    <div class="flex items-center gap-3 font-bold text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">
                                        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center overflow-hidden border-2 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-white'">
                                            <span class="text-xs text-emerald-600">JS</span>
                                        </div>
                                        Ms. Jane Smith
                                    </div>
                                </td>
                                <td class="py-5 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    15 Okt 2024
                                </td>
                                <td class="py-5 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    -
                                </td>
                                <td class="py-5 text-right pr-2">
                                    <div class="inline-flex items-center justify-end gap-2 font-bold text-[11px] uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
                                        <span class="w-2 h-2 rounded-full transition-colors duration-300" :class="darkMode ? 'bg-gray-600' : 'bg-gray-300'"></span> DRAFT
                                    </div>
                                    <div class="flex items-center justify-end gap-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="text-emerald-500 hover:text-emerald-600 text-xs font-bold">Publish</button>
                                        <span :class="darkMode ? 'text-gray-700' : 'text-gray-300'">|</span>
                                        <a href="/superadmin/articles/edit/2" class="text-blue-500 hover:text-blue-600 text-xs font-bold">Edit</a>
                                        <span :class="darkMode ? 'text-gray-700' : 'text-gray-300'">|</span>
                                        <button @click="isDeleteModalOpen = true; articleToDelete = 2" class="text-red-500 hover:text-red-600 text-xs font-bold">Hapus</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 transition-colors duration-300 pl-2">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-2xl overflow-hidden shrink-0 bg-gray-800">
                                            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-80" alt="post">
                                        </div>
                                        <div>
                                            <a href="/superadmin/articles/3" class="font-bold text-base hover:text-blue-500 transition-colors duration-300 block mb-1 truncate max-w-[200px]" :class="darkMode ? 'text-white' : 'text-gray-900'" title="Panduan Keamanan untuk Acara di Kampus">Panduan Keamanan untuk...</a>
                                            <p class="text-xs transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Diperbarui 3 hari lalu • 2.4k tayangan</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-5">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300 bg-orange-500/10 text-orange-500">Panduan</span>
                                </td>
                                <td class="py-5">
                                    <div class="flex items-center gap-3 font-bold text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden border-2 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-white'">
                                            <span class="text-xs text-blue-600">SA</span>
                                        </div>
                                        System Admin
                                    </div>
                                </td>
                                <td class="py-5 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    10 Okt 2024
                                </td>
                                <td class="py-5 text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
                                    11 Okt 2024
                                </td>
                                <td class="py-5 text-right pr-2">
                                    <div class="inline-flex items-center justify-end gap-2 font-bold text-[11px] uppercase tracking-wider text-emerald-500">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> PUBLISHED
                                    </div>
                                    <div class="flex items-center justify-end gap-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="/superadmin/articles/edit/3" class="text-blue-500 hover:text-blue-600 text-xs font-bold">Edit</a>
                                        <span :class="darkMode ? 'text-gray-700' : 'text-gray-300'">|</span>
                                        <button @click="isDeleteModalOpen = true; articleToDelete = 3" class="text-red-500 hover:text-red-600 text-xs font-bold">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 pt-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                    <button class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-colors duration-300" :class="darkMode ? 'border-gray-700 text-gray-400 hover:bg-gray-800' : 'border-gray-200 text-gray-600 hover:bg-gray-50'">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> Sebelumnya
                    </button>
                    <div class="flex items-center gap-2">
                        <button class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-colors duration-300 bg-blue-600 text-white shadow-md shadow-blue-500/20">1</button>
                        <button class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-gray-800 hover:text-white' : 'text-gray-600 hover:bg-gray-100'">2</button>
                        <button class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-gray-800 hover:text-white' : 'text-gray-600 hover:bg-gray-100'">3</button>
                        <span class="text-gray-400">...</span>
                        <button class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-gray-800 hover:text-white' : 'text-gray-600 hover:bg-gray-100'">12</button>
                    </div>
                    <button class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-colors duration-300" :class="darkMode ? 'border-gray-700 text-gray-400 hover:bg-gray-800' : 'border-gray-200 text-gray-600 hover:bg-gray-50'">
                        Selanjutnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row items-center justify-between text-xs font-medium mt-10 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
                <p>© 2024 SMKS Mahaputra. Sistem Manajemen Sekolah.</p>
                <div class="flex items-center gap-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-gray-600 transition-colors">Bantuan</a>
                    <a href="#" class="hover:text-gray-600 transition-colors">Privasi</a>
                </div>
            </div>
            
        </div>
    </main>

    <!-- Delete Confirmation Modal -->
    <div x-show="isDeleteModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="isDeleteModalOpen = false"></div>
        <div class="relative w-full max-w-md rounded-2xl p-6 md:p-8 shadow-2xl transition-all duration-300 transform" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white border border-gray-100'">
            <div class="w-12 h-12 rounded-full bg-red-100/10 flex items-center justify-center mb-6 border-2 border-red-500/20 mx-auto">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            
            <div class="text-center mb-8">
                <h3 class="text-xl font-extrabold mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Konfirmasi Penghapusan</h3>
                <p class="text-sm font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan dan semua data terkait akan hilang permanen.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button @click="isDeleteModalOpen = false; articleToDelete = null" type="button" class="flex-1 px-4 py-3 rounded-full text-sm font-bold border transition-colors duration-300" :class="darkMode ? 'text-gray-300 border-gray-700 hover:bg-gray-800' : 'text-gray-700 border-gray-200 hover:bg-gray-50'">Batal</button>
                <button @click="isDeleteModalOpen = false; isSuccessModalOpen = true; articleToDelete = null" type="button" class="flex-1 px-4 py-3 rounded-full text-white text-sm font-bold bg-red-500 hover:bg-red-600 transition-colors duration-300 shadow-lg shadow-red-500/20">Ya, Hapus Artikel</button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div x-show="isSuccessModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="isSuccessModalOpen = false"></div>
        <div class="relative w-full max-w-sm rounded-2xl p-6 shadow-2xl transition-all duration-300 transform" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white border border-gray-100'" x-init="$watch('isSuccessModalOpen', value => { if(value) setTimeout(() => isSuccessModalOpen = false, 3000) })">
            <div class="w-12 h-12 rounded-full bg-emerald-100/10 flex items-center justify-center mb-4 border-2 border-emerald-500/20 mx-auto">
                <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <div class="text-center">
                <h3 class="text-lg font-extrabold mb-1" :class="darkMode ? 'text-white' : 'text-gray-900'">Berhasil!</h3>
                <p class="text-sm font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Data artikel telah berhasil dihapus dari sistem.</p>
            </div>
        </div>
    </div>
</html>
