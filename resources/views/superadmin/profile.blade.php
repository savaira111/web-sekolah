<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Super Admin - SMKS Mahaputra</title>
    
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
        // Initialize dark mode from localStorage
        window.darkModeInitial = localStorage.getItem('darkMode') === 'true' || !('darkMode' in localStorage);
        
        // Set initial background color and dark class
        if (window.darkModeInitial) {
            document.documentElement.style.backgroundColor = '#0F172A';
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.style.backgroundColor = '#F8FAFC';
            document.documentElement.classList.remove('dark');
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
      x-data="{ 
        sidebarOpen: true, 
        darkMode: window.darkModeInitial !== undefined ? window.darkModeInitial : true, 
        showNotifications: false 
      }" 
      x-init="
        $watch('darkMode', val => {
          localStorage.setItem('darkMode', val);
          document.documentElement.style.backgroundColor = val ? '#0F172A' : '#F8FAFC';
          document.documentElement.classList.toggle('dark', val);
        })
      "
      :class="darkMode ? 'bg-[#0F172A] text-white' : 'bg-[#F8FAFC] text-[#0F172A]'"
      class="dark">

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
            <a href="/superadmin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                User Management
            </a>
            <a href="/superadmin/articles" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Artikel
            </a>
            <a href="/superadmin/messages" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                Pesan Masuk
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

        <!-- User Profile (Sidebar Footer) -->
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
    <main class="flex-1 flex flex-col h-full overflow-y-auto w-full transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]' : 'bg-[#F8FAFC]'">
        <!-- Header -->
        <header class="h-24 px-8 flex items-center justify-between shrink-0 backdrop-blur-md sticky top-0 z-10 w-full mb-2 transition-colors duration-300" :class="darkMode ? 'bg-[#0F172A]/80 border-b border-gray-800' : 'bg-[#F8FAFC]/80 border-b border-gray-200'">
            <div class="flex items-center gap-4">
                
                <a href="/superadmin/dashboard" class="w-12 h-12 rounded-full bg-blue-600 hover:bg-blue-700 flex items-center justify-center text-white transition-all shadow-lg shadow-blue-500/40 hover:translate-y-[-2px]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <div>
                    <h2 class="text-[28px] font-bold tracking-tight leading-none mb-1 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Profil Saya</h2>
                    <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola informasi dan pengaturan akun.</p>
                </div>
            </div>
            
            <div class="flex items-center gap-5">
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
                                <p class="text-[10px]" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">&quot;Prestasi Sekolah 2024&quot; draft</p>
                                <span class="text-[9px] text-blue-500 mt-1 block">1 jam yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="h-8 w-px bg-gray-200 dark:bg-gray-700 mx-2"></div>
            </div>
        </header>

        <!-- Profile Content -->
        <div class="p-8 pb-20 max-w-5xl mx-auto w-full">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Sidebar: Avatar & Basic Info -->
                <div class="lg:col-span-1 space-y-8">
                    <div class="rounded-[2.5rem] p-8 text-center transition-colors duration-300 shadow-lg" :class="darkMode ? 'bg-[#1E293B] shadow-slate-900/50' : 'bg-white shadow-slate-400/20'">
                        <div class="relative inline-block mb-6">
                            <div class="w-32 h-32 mx-auto rounded-full p-2 border-2 border-dashed transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-200'">
                                <div class="w-full h-full rounded-full overflow-hidden bg-gray-100 relative group cursor-pointer">
                                    <img src="{{ asset('images/guru-1.jpg') }}" alt="Admin Avatar" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=bfdbfe&color=1e3a8a'">
                                    <div class="absolute inset-0 bg-black/50 items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hidden md:flex">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <span class="absolute bottom-2 right-6 w-5 h-5 bg-emerald-500 border-[3px] rounded-full" :class="darkMode ? 'border-[#1E293B]' : 'border-white'"></span>
                        </div>
                        
                        <h3 class="text-2xl font-bold mb-1 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">{{ auth()->user()->name ?? 'Admin Utama' }}</h3>
                        <p class="text-blue-500 font-bold uppercase tracking-wider text-xs mb-4">Super Admin</p>
                        <p class="text-sm transition-colors duration-300 mb-6" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Pengelola sistem dan konten utama Web Sekolah SMKS Mahaputra.</p>
                        
                        <div class="border-t pt-6 transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-xs font-bold uppercase transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Status Akun</span>
                                <span class="px-2.5 py-1 rounded-lg text-xs font-bold transition-colors duration-300" :class="darkMode ? 'bg-emerald-900/30 text-emerald-400' : 'bg-emerald-100 text-emerald-700'">Aktif</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs font-bold uppercase transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Terakhir Login</span>
                                <span class="text-xs font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-900'">Hari ini, 08:30</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content: Forms -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Basic Info Form -->
                    <div class="rounded-[2.5rem] p-8 lg:p-10 transition-colors duration-300 shadow-lg" :class="darkMode ? 'bg-[#1E293B] shadow-slate-900/50' : 'bg-white shadow-slate-400/20'">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="relative w-16 h-16 rounded-full transition-colors duration-300 flex items-center justify-center" :class="darkMode ? 'bg-blue-900/40' : 'bg-blue-300/25'">
                                <div class="w-12 h-12 rounded-2xl flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-blue-900/40 text-blue-300' : 'bg-blue-200 text-blue-700'">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" /></svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Informasi Dasar</h3>
                                <p class="text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Perbarui informasi profil dan alamat email Anda.</p>
                            </div>
                        </div>

                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nama Lengkap</label>
                                    <input type="text" value="{{ auth()->user()->name ?? 'Admin Utama' }}" class="w-full rounded-2xl border px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500/20 transition-all" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Email</label>
                                    <input type="email" value="{{ auth()->user()->email ?? 'admin@mahaputra.sch.id' }}" class="w-full rounded-2xl border px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500/20 transition-all" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nomor Telepon</label>
                                <input type="text" value="081234567890" class="w-full rounded-2xl border px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500/20 transition-all" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                            </div>

                            <div class="flex justify-end pt-4">
                                <button type="button" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-[0_8px_20px_-6px_rgba(37,99,235,0.5)] transition-all hover:translate-y-[-2px]">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Section -->
                    <div class="rounded-[2.5rem] p-8 lg:p-10 transition-colors duration-300 shadow-lg" :class="darkMode ? 'bg-[#1E293B] shadow-slate-900/50' : 'bg-white shadow-slate-400/20'">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="relative w-16 h-16 rounded-full transition-colors duration-300 flex items-center justify-center" :class="darkMode ? 'bg-blue-900/40' : 'bg-blue-300/25'">
                                <div class="w-12 h-12 rounded-2xl flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-blue-900/40 text-blue-300' : 'bg-blue-200 text-blue-700'">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" /></svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Keamanan & Password</h3>
                                <p class="text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Pastikan akun Anda menggunakan password yang panjang dan unik.</p>
                            </div>
                        </div>

                        <form class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Password Saat Ini</label>
                                <input type="password" class="w-full rounded-2xl border px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500/20 transition-all" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'" placeholder="••••••••">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Password Baru</label>
                                    <input type="password" class="w-full rounded-2xl border px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500/20 transition-all" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'" placeholder="••••••••">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Konfirmasi Password</label>
                                    <input type="password" class="w-full rounded-2xl border px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500/20 transition-all" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'" placeholder="••••••••">
                                </div>
                            </div>

                            <div class="flex justify-end pt-4">
                                <button type="button" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-[0_8px_20px_-6px_rgba(37,99,235,0.5)] transition-all hover:translate-y-[-2px]">
                                    Perbarui Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
