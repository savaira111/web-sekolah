<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management - EduAdmin Pro</title>
    
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
      x-data="{ sidebarOpen: true, darkMode: localStorage.getItem('darkMode') ? localStorage.getItem('darkMode') === 'true' : true, isAddUserModalOpen: false, isDeleteModalOpen: false, isSuccessModalOpen: false, userToDelete: null, showNotifications: false }" 
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
            <a href="/superadmin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-active font-medium text-sm transition-colors">
                <svg class="w-5 h-5 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                User Management
            </a>
            <a href="/superadmin/articles" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
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
            <div class="relative hidden lg:block w-96">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-4 py-2.5 border-0 rounded-full text-sm focus:ring-2 focus:ring-blue-500/20 transition-all shadow-sm" :class="darkMode ? 'bg-[#1E293B] text-white placeholder-gray-500' : 'bg-white text-gray-900 placeholder-gray-400'" placeholder="Cari data pengguna...">
            </div>
            
            <div class="flex items-center gap-5 ml-auto">
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
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
                <div>
                    <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Manajemen Pengguna</h2>
                    <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola akses dan hak akses untuk staf sekolah.</p>
                </div>
                
                <div class="flex items-center gap-3">
                    <button @click="isAddUserModalOpen = true" class="px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Pengguna
                    </button>
                </div>
            </div>

            <!-- Stats Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Stat 1 -->
                <div class="rounded-3xl p-6 shadow-sm border transition-colors duration-300 flex items-center gap-5" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-blue-500/10' : 'bg-blue-50'">
                        <svg class="w-7 h-7 transition-colors duration-300" :class="darkMode ? 'text-blue-400' : 'text-blue-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Pengguna</p>
                        <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">128</h3>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="rounded-3xl p-6 shadow-sm border transition-colors duration-300 flex items-center gap-5" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-emerald-500/10' : 'bg-emerald-50'">
                        <svg class="w-7 h-7 transition-colors duration-300" :class="darkMode ? 'text-emerald-400' : 'text-emerald-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Admin</p>
                        <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">5</h3>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="rounded-3xl p-6 shadow-sm border transition-colors duration-300 flex items-center gap-5" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-amber-500/10' : 'bg-amber-50'">
                        <svg class="w-7 h-7 transition-colors duration-300" :class="darkMode ? 'text-amber-400' : 'text-amber-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Guru</p>
                        <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">123</h3>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="rounded-[2.5rem] p-8 shadow-sm border mb-4 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                <!-- Tabs and Filters -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 pb-4 border-b gap-4 transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                    <div class="flex items-center gap-8 px-2 overflow-x-auto">
                        <button class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-colors duration-300" :class="darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900'">Semua Pengguna</button>
                        <button class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 border-transparent -mb-4.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500 hover:text-gray-300' : 'text-gray-500 hover:text-gray-800'">Admin</button>
                        <button class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 border-transparent -mb-4.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500 hover:text-gray-300' : 'text-gray-500 hover:text-gray-800'">Guru</button>
                    </div>
                    <button class="px-4 py-2 border rounded-full text-[13px] font-bold transition-colors duration-300 flex items-center gap-2 w-fit" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        Filter Peran
                    </button>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider pl-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Pengguna</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Email</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Peran</th>
                                <th class="pb-4 text-[11px] font-bold uppercase tracking-wider text-right pr-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px]">
                            <!-- Row 1 -->
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 font-bold transition-colors duration-300 pl-2" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full overflow-hidden shrink-0 border transition-colors duration-300" :class="darkMode ? 'bg-gray-800 border-gray-700' : 'bg-gray-100 border-gray-200'">
                                            <img src="{{ asset('images/guru-1.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        Johnathan Doe
                                    </div>
                                </td>
                                <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">john.doe@eduadmin.com</td>
                                <td class="py-5">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A] text-white border border-gray-700' : 'bg-[#111827] text-white'">Admin</span>
                                </td>
                                <td class="py-5 text-right pr-2">
                                    <div class="flex items-center justify-end gap-1 outline-none">
                                        <a href="/superadmin/users/edit/1" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-gray-800 hover:text-white' : 'text-gray-400 hover:bg-gray-100 hover:text-gray-700'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <button @click="isDeleteModalOpen = true" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-red-500/10 hover:text-red-400' : 'text-gray-400 hover:bg-red-50 hover:text-red-500'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 font-bold transition-colors duration-300 pl-2" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full overflow-hidden shrink-0 border transition-colors duration-300" :class="darkMode ? 'bg-gray-800 border-gray-700' : 'bg-gray-100 border-gray-200'">
                                            <img src="{{ asset('images/guru-2.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        Jane Smith
                                    </div>
                                </td>
                                <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">jane.smith@eduadmin.com</td>
                                <td class="py-5">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'bg-gray-800 text-gray-300 border border-gray-700' : 'bg-gray-100 text-gray-600'">Guru</span>
                                </td>
                                <td class="py-5 text-right pr-2">
                                    <div class="flex items-center justify-end gap-1 outline-none">
                                        <a href="/superadmin/users/edit/2" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-gray-800 hover:text-white' : 'text-gray-400 hover:bg-gray-100 hover:text-gray-700'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <button @click="isDeleteModalOpen = true" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-red-500/10 hover:text-red-400' : 'text-gray-400 hover:bg-red-50 hover:text-red-500'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                <div class="mt-4 pt-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <p class="text-xs font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Menampilkan 2 dari 128 hasil</p>
                    <div class="flex items-center gap-1.5">
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-500 hover:bg-gray-800' : 'text-gray-400 hover:bg-gray-50'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-[13px] font-bold transition-colors duration-300 bg-blue-600 text-white shadow-sm shadow-blue-600/20">1</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-[13px] font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-gray-800 hover:text-white' : 'text-gray-600 hover:bg-gray-100'">2</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-500 hover:bg-gray-800' : 'text-gray-400 hover:bg-gray-50'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between text-xs font-medium mt-10" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
                <p>© 2024 SMKS Mahaputra. Sistem Manajemen Sekolah.</p>
                <div class="flex items-center gap-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-gray-600 transition-colors">Bantuan</a>
                    <a href="#" class="hover:text-gray-600 transition-colors">Privasi</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Add New User Modal -->
    <div x-show="isAddUserModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-gray-900/60 backdrop-blur-sm p-4 md:p-0" x-transition.opacity>
        <div class="relative w-full max-w-[500px] p-8 mx-auto rounded-[2rem] shadow-2xl transition-all duration-300 transform scale-100" @click.away="isAddUserModalOpen = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            
            <div class="flex items-start justify-between mb-8">
                <div>
                    <h3 class="text-xl font-extrabold mb-1 tracking-tight transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Tambah Pengguna Baru</h3>
                    <p class="text-[13px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Daftarkan staf atau guru baru.</p>
                </div>
                <button @click="isAddUserModalOpen = false" class="p-2 -mr-2 -mt-2 rounded-full transition-colors duration-300" :class="darkMode ? 'text-gray-500 hover:bg-gray-800 hover:text-white' : 'text-gray-400 hover:bg-gray-100 hover:text-gray-600'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form class="space-y-6">
                <div>
                    <label class="block text-xs font-extrabold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nama Lengkap</label>
                    <input type="text" placeholder="Contoh: Alexander Hamilton" class="w-full px-5 py-3.5 rounded-2xl border text-sm focus:ring-2 focus:ring-blue-500/20 transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-600 focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400 focus:border-blue-500'">
                </div>
                
                <div>
                    <label class="block text-xs font-extrabold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Alamat Email</label>
                    <input type="email" placeholder="alexander@sekolah.edu" class="w-full px-5 py-3.5 rounded-2xl border text-sm focus:ring-2 focus:ring-blue-500/20 transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-600 focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400 focus:border-blue-500'">
                </div>

                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <label class="block text-xs font-extrabold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Peran</label>
                        <div class="relative">
                            <select class="w-full px-5 py-3.5 rounded-2xl border text-sm focus:ring-2 focus:ring-blue-500/20 transition-all outline-none appearance-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                <option>Admin</option>
                                <option>Guru</option>
                            </select>
                            <svg class="w-4 h-4 absolute right-5 top-[18px] pointer-events-none" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-2xl flex items-start gap-4 text-[13px] transition-colors duration-300 leading-relaxed border" :class="darkMode ? 'bg-amber-500/5 border-amber-500/10 text-gray-300' : 'bg-gray-50 border-gray-100 text-gray-600'">
                    <svg class="w-5 h-5 shrink-0 mt-0.5" :class="darkMode ? 'text-amber-500/70' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p>Sistem akan mengirimkan email undangan untuk aktivasi akun. Kata sandi dapat diatur oleh pengguna nantinya.</p>
                </div>

                <div class="flex items-center justify-end gap-4 mt-8 pt-4">
                    <button type="button" @click="isAddUserModalOpen = false" class="px-6 py-3 rounded-full text-[13px] font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:text-white hover:bg-gray-800' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'">Batal</button>
                    <button type="button" class="px-8 py-3 rounded-full text-white text-[13px] font-bold shadow-lg transition-transform duration-300 hover:scale-[1.02]" :class="darkMode ? 'bg-[#0F172A] hover:bg-[#111827] shadow-gray-900/50 border border-gray-700' : 'bg-[#0F172A] hover:bg-gray-800 shadow-gray-900/20'">Buat Akun</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="isDeleteModalOpen" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center overflow-y-auto overflow-x-hidden bg-gray-900/60 backdrop-blur-sm p-4 md:p-0" x-transition.opacity>
        <div class="relative w-full max-w-md p-8 mx-auto rounded-[2rem] shadow-2xl transition-all duration-300 transform scale-100 text-center" @click.away="isDeleteModalOpen = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 transition-colors duration-300" :class="darkMode ? 'bg-red-500/10' : 'bg-red-50'">
                <svg class="w-10 h-10 transition-colors duration-300" :class="darkMode ? 'text-red-400' : 'text-red-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>

            <h3 class="text-2xl font-extrabold mb-2 tracking-tight transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Hapus User?</h3>
            <p class="text-[15px] font-medium mb-8 leading-relaxed transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Data user yang dihapus tidak dapat dipulihkan. Apakah kamu yakin ingin melanjutkan?</p>

            <div class="flex items-center justify-center gap-4">
                <button @click="isDeleteModalOpen = false" class="px-8 py-3.5 rounded-full text-[14px] font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:text-white hover:bg-gray-800' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'">Batal</button>
                <button @click="isDeleteModalOpen = false; setTimeout(() => isSuccessModalOpen = true, 300)" class="px-8 py-3.5 rounded-full text-white text-[14px] font-bold shadow-lg transition-transform duration-300 hover:scale-[1.02] bg-red-500 hover:bg-red-600 shadow-red-500/30">Ya, Hapus!</button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div x-show="isSuccessModalOpen" x-cloak class="fixed inset-0 z-[70] flex items-center justify-center overflow-y-auto overflow-x-hidden bg-gray-900/60 backdrop-blur-sm p-4 md:p-0" x-transition.opacity>
        <div class="relative w-full max-w-sm p-8 mx-auto rounded-[2rem] shadow-2xl transition-all duration-300 transform scale-100 text-center" @click.away="isSuccessModalOpen = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 transition-colors duration-300" :class="darkMode ? 'bg-emerald-500/10' : 'bg-emerald-50'">
                <svg class="w-10 h-10 transition-colors duration-300" :class="darkMode ? 'text-emerald-400' : 'text-emerald-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>

            <h3 class="text-2xl font-extrabold mb-2 tracking-tight transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Berhasil!</h3>
            <p class="text-[15px] font-medium mb-8 leading-relaxed transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Data user telah berhasil dihapus dari sistem.</p>

            <button @click="isSuccessModalOpen = false" class="w-full px-8 py-3.5 rounded-full text-white text-[14px] font-bold shadow-lg transition-transform duration-300 hover:scale-[1.02]" :class="darkMode ? 'bg-[#0F172A] hover:bg-[#111827] shadow-gray-900/50 border border-gray-700' : 'bg-[#0F172A] hover:bg-gray-800 shadow-gray-900/20'">Tutup</button>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
