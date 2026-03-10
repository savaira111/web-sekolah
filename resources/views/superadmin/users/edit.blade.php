<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User - EduAdmin Pro</title>
    
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
            <a href="/superadmin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-active font-medium text-sm transition-colors">
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
                <!-- Remove hardcoded dashboard input logic to make it modular across pages. If it searches, just translate placeholder -->
                <input type="text" class="block w-full pl-10 pr-4 py-2.5 border-0 rounded-full text-sm focus:ring-2 focus:ring-blue-500/20 transition-all shadow-sm" :class="darkMode ? 'bg-[#1E293B] text-white placeholder-gray-500' : 'bg-white text-gray-900 placeholder-gray-400'" placeholder="Cari data pengguna...">
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
        <div class="px-8 pb-8 flex-1 w-full max-w-[1000px] mx-auto">
            
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 mb-6 text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
                <a href="/superadmin/dashboard" class="hover:text-blue-500 transition-colors">Dashboard</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <a href="/superadmin/users" class="hover:text-blue-500 transition-colors">Manajemen Pengguna</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span :class="darkMode ? 'text-gray-300' : 'text-gray-800'">Edit Pengguna</span>
            </div>

            <div class="mb-8">
                <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Edit Profil Pengguna</h2>
                <p class="text-[15px] font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola detail profil akun pengguna dan izin hak akses.</p>
            </div>

            <!-- Edit Form Card -->
            <div class="rounded-[2.5rem] p-10 shadow-sm border transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
                
                <form>
                    <!-- Avatar Upload -->
                    <div class="flex items-center gap-6 mb-10 pb-10 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <div class="relative group">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-white shadow-xl'">
                                <img src="{{ asset('images/guru-1.jpg') }}" alt="Alex Johnson" class="w-full h-full object-cover">
                            </div>
                            <!-- Camera Icon -->
                            <button type="button" class="absolute bottom-0 right-0 w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center border-2 border-white hover:bg-blue-600 transition-colors shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </button>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-1 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Alex Johnson</h3>
                            <p class="text-[13px] font-medium mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Foto profil akan terlihat di seluruh portal sekolah.</p>
                            <a href="#" class="text-[13px] font-bold text-blue-500 hover:text-blue-600 transition-colors">Ubah Avatar</a>
                        </div>
                    </div>

                    <!-- Input Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-xs font-extrabold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nama Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <input type="text" value="Alex Johnson" class="w-full pl-12 pr-5 py-3.5 rounded-2xl border text-[15px] font-semibold focus:ring-2 focus:ring-blue-500/20 transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-600 focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400 focus:border-blue-500'">
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-extrabold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Alamat Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <input type="email" value="alex.johnson@school.edu" class="w-full pl-12 pr-5 py-3.5 rounded-2xl border text-[15px] font-semibold focus:ring-2 focus:ring-blue-500/20 transition-all outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-600 focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400 focus:border-blue-500'">
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-extrabold mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Peran Akun</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <select class="w-full pl-12 pr-5 py-3.5 rounded-2xl border text-[15px] font-semibold focus:ring-2 focus:ring-blue-500/20 transition-all outline-none appearance-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white focus:border-blue-500/50' : 'bg-white border-gray-200 text-gray-900 focus:border-blue-500'">
                                    <option selected>Admin</option>
                                    <option>Guru</option>
                                </select>
                                <svg class="w-4 h-4 absolute right-5 top-[18px] pointer-events-none" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end gap-4 mb-4">
                        <a href="/superadmin/users" class="px-8 py-3.5 rounded-full text-sm font-bold border transition-colors duration-300" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50 hover:text-gray-900'">Batal</a>
                        <button type="submit" class="px-10 py-3.5 rounded-full text-white text-sm font-bold shadow-lg transition-transform duration-300 hover:scale-[1.02]" :class="darkMode ? 'bg-blue-600 hover:bg-blue-700 shadow-blue-900/20' : 'bg-blue-500 hover:bg-blue-600 shadow-blue-500/30'">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            
            <!-- Bottom Information Card -->
            <div class="mt-8 p-5 rounded-[1.5rem] flex items-start gap-4 text-[13px] font-medium transition-colors duration-300 border" :class="darkMode ? 'bg-amber-500/5 border-amber-500/10 text-gray-400' : 'bg-amber-50/50 border-amber-100 text-amber-800'">
                <svg class="w-5 h-5 shrink-0 text-amber-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p>Mengubah peran akun akan langsung memperbarui izin sistem. Pastikan pengguna diberitahu mengenai pembaruan data sistem yang dilakukan.</p>
            </div>
            
        </div>
    </main>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
