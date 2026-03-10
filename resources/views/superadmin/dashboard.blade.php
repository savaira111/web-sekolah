<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SMKS Mahaputra</title>
    
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
      x-data="{ sidebarOpen: true, darkMode: localStorage.getItem('darkMode') ? localStorage.getItem('darkMode') === 'true' : true, showNotifications: false }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="darkMode ? 'bg-[#0F172A] text-[#F8FAFC]' : 'bg-[#F8FAFC] text-[#0F172A]'">

    <!-- Sidebar -->
    <aside class="w-64 sidebar h-full flex flex-col transition-all duration-300 z-20 shrink-0" :class="{'hidden': !sidebarOpen}">
        <!-- Brand -->
        <div class="h-20 flex items-center px-6 border-b border-gray-800">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-bold text-xl shrink-0 overflow-hidden">
                <img src="{{ asset('images/logo-mahaputra.png') }}" alt="M" class="w-full h-full object-contain p-1" onerror="this.src='https://ui-avatars.com/api/?name=M&background=3B82F6&color=fff'">
            </div>
            <div class="ml-3">
                <h1 class="text-white font-bold text-lg leading-tight">SMKS Mahaputra</h1>
                <p class="text-xs text-blue-400 font-medium">Super Admin</p>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-active font-medium text-sm transition-colors">
                <svg class="w-5 h-5 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="/superadmin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                User Management
            </a>
            <a href="/superadmin/articles" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Artikel
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                PPDB
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                Eskul
            </a>

        </div>

        <!-- User Profile -->
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
        <!-- Header -->
        <header class="h-24 px-8 flex items-center justify-between shrink-0 backdrop-blur-md sticky top-0 z-10 w-full mb-2 transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]/80 border-b border-gray-800' : 'bg-[#f8fafc]/80 border-b border-gray-200'">
            <div>
                <h2 class="text-[28px] font-bold tracking-tight leading-none mb-1 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Dashboard Utama</h2>
                <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Ringkasan dan Laporan Sistem</p>
            </div>
            
            <div class="flex items-center gap-5">
                <!-- Search -->
                <div class="relative hidden md:block w-72">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" class="block w-full pl-10 pr-4 py-2.5 border-0 rounded-full text-sm focus:ring-2 focus:ring-blue-500/20 transition-all shadow-sm" :class="darkMode ? 'bg-[#1E293B] text-white placeholder-gray-500' : 'bg-white text-gray-900 placeholder-gray-400'" placeholder="Cari data...">
                </div>

                <button @click="darkMode = !darkMode" class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] text-yellow-500 hover:bg-gray-800' : 'bg-white text-gray-600 hover:bg-gray-50'">
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-cloak x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
                
                <!-- Notification -->
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
                            <div class="px-4 py-3 border-b last:border-0 hover:bg-gray-50 dark:hover:bg-[#0F172A] cursor-pointer transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                                <p class="text-xs font-semibold" :class="darkMode ? 'text-gray-200' : 'text-gray-800'">Artikel Menunggu Persetujuan</p>
                                <p class="text-[10px]" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">"Prestasi Sekolah 2024" draft</p>
                                <span class="text-[9px] text-blue-500 mt-1 block">1 jam yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-8 w-px bg-gray-200 dark:bg-gray-700 mx-2"></div>
                
                <!-- Navbar Profile Link -->
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
        <div class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
            
            <!-- Cards Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1 -->
                <a href="/superadmin/users" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="darkMode ? 'bg-[#1E293B] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-blue-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-blue-500/20' : 'bg-blue-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="darkMode ? 'text-blue-400' : 'text-blue-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">+12.5%</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Siswa</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">2,450</h3>
                </a>

                <!-- Card 2 -->
                <a href="/superadmin/users" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="darkMode ? 'bg-[#1E293B] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-purple-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-purple-500/20' : 'bg-purple-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="darkMode ? 'text-purple-400' : 'text-purple-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">+2.4%</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Guru</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">128</h3>
                </a>

                <!-- Card 3 -->
                <a href="#" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="darkMode ? 'bg-[#1E293B] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-orange-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-orange-500/20' : 'bg-orange-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="darkMode ? 'text-orange-400' : 'text-orange-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">+18%</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Pendaftar PPDB</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">432</h3>
                </a>

                <!-- Card 4 -->
                <a href="/superadmin/articles" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="darkMode ? 'bg-[#1E293B] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-emerald-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-emerald-500/20' : 'bg-emerald-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="darkMode ? 'text-emerald-400' : 'text-emerald-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">Terbaru</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Artikel Aktif</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">54</h3>
                </a>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Line Chart Mock -->
                <div class="lg:col-span-2 rounded-[2rem] p-8 shadow-sm border relative overflow-hidden transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                    <div class="flex flex-wrap items-end justify-between mb-8 z-10 relative">
                        <div>
                            <h3 class="text-xl font-bold mb-1 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">TREN PENDAFTARAN PPDB</h3>
                            <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Ringkasan volume pendaftar mingguan</p>
                        </div>
                        <div class="flex items-center gap-4 mt-4 sm:mt-0">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                                <span class="text-xs font-bold uppercase transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Pendaftar</span>
                            </div>
                            <div class="px-4 py-2 border rounded-full flex items-center gap-2 cursor-pointer transition-colors duration-300" :class="darkMode ? 'border-gray-700 bg-gray-800/50 hover:bg-gray-700' : 'border-gray-200 bg-gray-50/50 hover:bg-gray-100'">
                                <span class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">7 Hari Terakhir</span>
                                <svg class="w-3.5 h-3.5 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- CSS-Based Line Graph Mockup -->
                    <div class="h-64 mt-4 relative w-full border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <svg class="w-full h-full" viewBox="0 0 800 200" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="blueGradient" x1="0" x2="0" y1="0" y2="1">
                                    <stop offset="0%" stop-color="rgba(59, 130, 246, 0.2)" />
                                    <stop offset="100%" stop-color="rgba(59, 130, 246, 0)" />
                                </linearGradient>
                            </defs>
                            <!-- Fill -->
                            <path d="M0,170 C100,150 200,160 300,100 C400,20 500,200 600,100 C700,-50 800,90 800,90 L800,200 L0,200 Z" fill="url(#blueGradient)" />
                            <!-- Line -->
                            <path d="M0,170 C100,150 200,160 300,100 C400,20 500,200 600,100 C700,-50 800,90 800,90" fill="none" stroke="#3B82F6" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            
                            <!-- Points -->
                            <circle cx="300" cy="100" r="4" fill="white" stroke="#3B82F6" stroke-width="2" />
                            <circle cx="500" cy="200" r="4" fill="white" stroke="#3B82F6" stroke-width="2" />
                            <circle cx="600" cy="100" r="4" fill="white" stroke="#3B82F6" stroke-width="2" />
                        </svg>

                        <!-- Y-axis guide lines mock -->
                        <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                        </div>
                    </div>
                    
                    <!-- X-axis labels -->
                    <div class="flex justify-between mt-4 text-[10px] font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
                        <span>MON</span>
                        <span>TUE</span>
                        <span>WED</span>
                        <span>THU</span>
                        <span>FRI</span>
                        <span>SAT</span>
                        <span>SUN</span>
                    </div>
                </div>

                <!-- Donut Chart Mock -->
                <div class="rounded-[2rem] p-8 shadow-sm border flex flex-col object-cover transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                    <h3 class="text-xl font-bold mb-1 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">DISTRIBUSI JURUSAN</h3>
                    <p class="text-sm font-medium mb-8 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Persentase Pendaftar</p>
                    
                    <div class="flex-1 flex flex-col items-center justify-center relative">
                        <!-- SVG Donut Chart Mockup -->
                        <div class="relative w-48 h-48">
                            <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
                                <!-- Track -->
                                <circle cx="18" cy="18" r="14" fill="none" stroke-width="4" :stroke="darkMode ? '#334155' : '#F1F5F9'"></circle>
                                
                                <!-- Segments (CSS styled with stroke-dasharray) -->
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#3B82F6" stroke-width="4" stroke-dasharray="40 100" stroke-dashoffset="0"></circle>
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#111827" stroke-width="4" stroke-dasharray="30 100" stroke-dashoffset="-40"></circle>
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#A855F7" stroke-width="4" stroke-dasharray="20 100" stroke-dashoffset="-70"></circle>
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#F59E0B" stroke-width="4" stroke-dasharray="10 100" stroke-dashoffset="-90"></circle>
                            </svg>
                            <!-- Inner Text -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-3xl font-bold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">432</span>
                                <span class="text-[9px] font-bold mt-1 uppercase tracking-widest transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Total</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-y-3 mt-8">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            <span class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">IT: 40%</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full transition-colors duration-300" :class="darkMode ? 'bg-gray-400' : 'bg-gray-900'"></span>
                            <span class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Science: 30%</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                            <span class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Arts: 20%</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            <span class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Other: 10%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Log Table -->
            <div class="rounded-[2rem] p-8 shadow-sm border mb-10 overflow-hidden transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-bold mb-1 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">LOG AKTIVITAS TERBARU</h3>
                        <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Pembaruan sistem antar departemen</p>
                    </div>
                    <a href="#" class="text-sm font-bold flex items-center gap-1 transition-colors duration-300" :class="darkMode ? 'text-blue-400 hover:text-blue-300' : 'text-blue-600 hover:text-blue-700'">
                        Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider w-1/4 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Pengguna</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider w-1/3 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Detail Aksi</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider text-center transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Modul</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Status</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider text-right transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 font-semibold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-800'">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full overflow-hidden shrink-0 transition-colors duration-300" :class="darkMode ? 'bg-gray-800' : 'bg-blue-100'">
                                            <img src="{{ asset('images/guru-1.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        Sarah Connor
                                    </div>
                                </td>
                                <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Approved PPDB application #A-422</td>
                                <td class="py-5 text-center">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'bg-blue-500/20 text-blue-400' : 'bg-blue-50 text-blue-600'">PPDB</span>
                                </td>
                                <td class="py-5">
                                    <span class="inline-flex items-center gap-1.5 font-bold text-green-500 text-xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Success
                                    </span>
                                </td>
                                <td class="py-5 font-medium text-right text-xs transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">2 mins ago</td>
                            </tr>
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 font-semibold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-800'">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full overflow-hidden shrink-0 transition-colors duration-300" :class="darkMode ? 'bg-gray-800' : 'bg-gray-100'">
                                            <img src="{{ asset('images/guru-2.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        Marcus Wright
                                    </div>
                                </td>
                                <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Updated teacher schedule for Grade 12</td>
                                <td class="py-5 text-center">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'bg-purple-500/20 text-purple-400' : 'bg-purple-50 text-purple-600'">Hr Err</span>
                                </td>
                                <td class="py-5">
                                    <span class="inline-flex items-center gap-1.5 font-bold text-green-500 text-xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Success
                                    </span>
                                </td>
                                <td class="py-5 font-medium text-right text-xs transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">15 mins ago</td>
                            </tr>
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 font-semibold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-800'">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full overflow-hidden shrink-0 transition-colors duration-300" :class="darkMode ? 'bg-gray-800' : 'bg-orange-100'">
                                            <img src="{{ asset('images/guru-3.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        Kyle Reese
                                    </div>
                                </td>
                                <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Published article: "Summer Camps 2024"</td>
                                <td class="py-5 text-center">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'bg-orange-500/20 text-orange-400' : 'bg-orange-50 text-orange-600'">Artikel</span>
                                </td>
                                <td class="py-5">
                                    <span class="inline-flex items-center gap-1.5 font-bold text-orange-500 text-xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span> Pending
                                    </span>
                                </td>
                                <td class="py-5 font-medium text-right text-xs transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">1 hour ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
