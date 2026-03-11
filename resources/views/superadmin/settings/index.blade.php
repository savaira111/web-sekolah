<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan Super Admin - EduAdmin Pro</title>
    
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
      x-data="{ sidebarOpen: true, darkMode: localStorage.getItem('darkMode') ? localStorage.getItem('darkMode') === 'true' : true, showNotifications: false, saveSuccess: false, passwordSuccess: false }" 
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
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="/superadmin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Manajemen Pengguna
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm12 4H8v10h8V8zM8 20a2 2 0 01-2-2v-4h12v4a2 2 0 01-2 2H8z" clip-rule="evenodd"></path></svg>
                Laporan
            </a>
            <a href="/superadmin/settings" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-active font-medium text-sm transition-colors">
                <svg class="w-5 h-5 text-white/80" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 9H4.312c-.804 0-1.381.834-.981 1.549l.853 1.635c.315.605.315 1.31 0 1.915l-.853 1.635c-.4.715.177 1.549.981 1.549H9.05l.028 4.183c.151.904.933 1.567 1.85 1.567h1.844c.917 0 1.699-.663 1.85-1.567l.028-4.183h4.738c.804 0 1.381-.834.981-1.549l-.853-1.635a1.5 1.5 0 010-1.915l.853-1.635c.4-.715-.177-1.549-.981-1.549h-4.738l-.028-4.183C14.627 2.913 13.845 2.25 12.922 2.25h-1.844z" clip-rule="evenodd"></path></svg>
                Pengaturan
            </a>
        </div>

        <div class="p-4 border-t border-gray-800">
            <div class="bg-[#1F2937] rounded-2xl p-3 flex items-center justify-between">
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 text-red-500 hover:text-red-400 font-semibold text-sm transition-colors w-full p-2" title="Logout">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
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
                    <svg class="h-4 w-4 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.591 5.409l4.409 4.41a.75.75 0 11-1.061 1.061l-4.41-4.409A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-4 py-2.5 border-0 rounded-full text-sm focus:ring-2 focus:ring-blue-500/20 transition-all shadow-sm" :class="darkMode ? 'bg-[#1E293B] text-white placeholder-gray-500' : 'bg-white text-gray-900 placeholder-gray-400'" placeholder="Cari pengaturan...">
            </div>
            
            <div class="flex items-center gap-5 ml-auto">
                <button @click="darkMode = !darkMode" class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] text-yellow-500 hover:bg-gray-800' : 'bg-white text-gray-600 hover:bg-gray-50'">
                    <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M17.347 2.247A.75.75 0 00.945 5.77l2.798 7.152a6.75 6.75 0 1111.452 6.396.75.75 0 10-1.06 1.061 8.25 8.25 0 11-14.063-7.846l2.798-7.15a.75.75 0 00-.253-.916z" clip-rule="evenodd"></path></svg>
                    <svg x-cloak x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zm6-9a.75.75 0 00-1.5 0v2.25a.75.75 0 001.5 0V3zM12 20.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V21a.75.75 0 01.75-.75zM3 12a.75.75 0 00-.75.75v2.25a.75.75 0 001.5 0V12.75A.75.75 0 003 12zm17.25 0a.75.75 0 00-.75.75v2.25a.75.75 0 001.5 0V12.75a.75.75 0 00-.75-.75z" clip-rule="evenodd"></path></svg>
                </button>
                
                <div class="relative">
                    <button @click="showNotifications = !showNotifications" @click.away="showNotifications = false" class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm transition-colors duration-300 relative" :class="darkMode ? 'bg-[#1E293B] text-gray-300 hover:bg-gray-800' : 'bg-white text-gray-600 hover:bg-gray-50'">
                        <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 transition-colors duration-300" :class="darkMode ? 'border-[#1E293B]' : 'border-white'"></span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M5.85 3.5a.75.75 0 00-1.117-1A9.719 9.719 0 0018.75 20.25H4.5a3 3 0 01-3-3V8.604c0-.396.07-.782.202-1.15L2.5 4.5m16.632 7.148a.75.75 0 00-1.061-1.06M5.72 6.72a.75.75 0 00-1.06 1.061\" clip-rule=\"evenodd\"></path><path d=\"M17.25 9a.75.75 0 100-1.5.75.75 0 000 1.5z\"></path></svg>
                    </button>
                    <!-- Notification Dropdown -->
                    <div x-cloak x-show="showNotifications" x-transition class="absolute right-0 mt-2 w-80 rounded-2xl shadow-lg border overflow-hidden z-50 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <div class="px-4 py-3 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                            <h3 class="font-bold text-sm" :class="darkMode ? 'text-white' : 'text-gray-900'">Notifikasi</h3>
                        </div>
                        <div class="max-h-64 overflow-y-auto">
                            <div class="px-4 py-3 border-b last:border-0 hover:bg-gray-50 dark:hover:bg-[#0F172A] cursor-pointer transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                                <p class="text-xs font-semibold" :class="darkMode ? 'text-gray-200' : 'text-gray-800'">Login dari perangkat baru</p>
                                <p class="text-[10px]" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Chrome di Jakarta, Indonesia</p>
                                <span class="text-[9px] text-blue-500 mt-1 block">Baru saja</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-8 w-px bg-gray-200 dark:bg-gray-700 mx-2"></div>
                
                <a href="/superadmin/settings" class="flex items-center gap-3 group">
                    <div class="text-right hidden sm:block">
                        <p class="text-[13px] font-bold leading-none transition-colors duration-300 group-hover:text-blue-500" :class="darkMode ? 'text-white' : 'text-gray-900'">Superadmin</p>
                        <p class="text-[10px] font-bold tracking-wider uppercase transition-colors duration-300 mt-1" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">SUPER ADMIN</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-bold overflow-hidden border-2 border-transparent group-hover:border-blue-500 transition-all">
                        <img src="{{ asset('images/guru-1.jpg') }}" alt="Avatar" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=AD&background=bfdbfe&color=1e3a8a'">
                    </div>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-8 flex-1 w-full overflow-x-auto">
            <!-- Profile Header -->
            <div class="mb-8">
                <div class="rounded-2xl p-8 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white border border-gray-200'">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                        <div class="relative">
                            <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-bold text-2xl overflow-hidden border-4 transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-200'">
                                <img src="https://ui-avatars.com/api/?name=Superadmin&background=bfdbfe&color=1e3a8a&size=80" alt="Avatar" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute bottom-1 right-1 w-5 h-5 rounded-full bg-emerald-500 border-4 transition-colors duration-300" :class="darkMode ? 'border-[#1E293B]' : 'border-white'"></div>
                        </div>
                        <div class="flex-1">
                            <h1 class="text-2xl font-extrabold transition-colors duration-300 mb-1" :class="darkMode ? 'text-white' : 'text-gray-900'">Superadmin</h1>
                            <div class="flex items-center gap-3 mb-3">
                                <span class="text-sm font-semibold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Super Admin Role</span>
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-500 text-xs font-bold rounded-full uppercase tracking-wider">ACTIVE</span>
                            </div>
                            <p class="text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Akun administratur terdaftar dan aktif</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Forms -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Section 1: Informasi Dasar -->
                    <div class="rounded-2xl p-8 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white border border-gray-200'">
                        <h2 class="text-xl font-extrabold transition-colors duration-300 mb-6" :class="darkMode ? 'text-white' : 'text-gray-900'">Informasi Dasar</h2>
                        
                        <form @submit.prevent="saveSuccess = true; setTimeout(() => saveSuccess = false, 3000)" class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold transition-colors duration-300 mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nama Lengkap</label>
                                <input type="text" value="Superadmin" class="w-full px-4 py-3 border rounded-xl transition-all duration-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-500' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400'">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold transition-colors duration-300 mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Email</label>
                                <input type="email" value="admin@platform.com" class="w-full px-4 py-3 border rounded-xl transition-all duration-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-500' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400'">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold transition-colors duration-300 mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nomor Telepon</label>
                                <input type="tel" value="+62 812 3456 7890" class="w-full px-4 py-3 border rounded-xl transition-all duration-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-500' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400'">
                            </div>
                            
                            <div class="pt-4">
                                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.052-.143z" clip-rule="evenodd"></path></svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Section 2: Keamanan & Password -->
                    <div class="rounded-2xl p-8 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white border border-gray-200'">
                        <h2 class="text-xl font-extrabold transition-colors duration-300 mb-6" :class="darkMode ? 'text-white' : 'text-gray-900'">Keamanan & Password</h2>
                        
                        <form @submit.prevent="passwordSuccess = true; setTimeout(() => passwordSuccess = false, 3000)" class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold transition-colors duration-300 mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Password Saat Ini</label>
                                <input type="password" placeholder="Masukkan password saat ini" class="w-full px-4 py-3 border rounded-xl transition-all duration-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-500' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400'">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold transition-colors duration-300 mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Password Baru</label>
                                <input type="password" placeholder="Masukkan password baru" class="w-full px-4 py-3 border rounded-xl transition-all duration-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-500' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400'">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold transition-colors duration-300 mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Konfirmasi Password</label>
                                <input type="password" placeholder="Konfirmasi password baru" class="w-full px-4 py-3 border rounded-xl transition-all duration-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white placeholder-gray-500' : 'bg-white border-gray-200 text-gray-900 placeholder-gray-400'">
                            </div>
                            
                            <div class="pt-4">
                                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.75 1.5H4.125C2.904 1.5 2 2.43 2 3.75v16.5C2 21.57 2.904 22.5 4.125 22.5h15.75c1.221 0 2.125-.93 2.125-2.25V4.5c0-1.32-.904-2.25-2.125-2.25zm-10.5 11.25a.75.75 0 00-1.5 0v2.958a.75.75 0 001.5 0V12.75zm2.25.75a.75.75 0 01.75-.75h2.25a.75.75 0 010 1.5h-2.25a.75.75 0 01-.75-.75zm4.5-.75a.75.75 0 00-1.5 0v4.674a.75.75 0 001.5 0V12.75z" clip-rule="evenodd"></path></svg>
                                    Perbarui Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column - Support Card -->
                <div>
                    <div class="rounded-2xl p-8 transition-colors duration-300 sticky top-32" :class="darkMode ? 'bg-gradient-to-br from-blue-900/20 to-blue-900/10 border border-blue-800/30' : 'bg-gradient-to-br from-blue-50 to-blue-50/50 border border-blue-200/30'">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center mb-4 transition-colors duration-300" :class="darkMode ? 'bg-blue-900/30' : 'bg-blue-100'">
                                <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 021.5 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75c0 2.6-.87 4.99-2.336 6.935.18.15.297.298.382.454l1.823-1.823a.75.75 0 101.06-1.06l-2.868-2.868a1.5 1.5 0 00-2.122 0l-2.868 2.868a.75.75 0 001.06 1.06l1.823-1.823c-.085.156-.203.303-.382.454A9.722 9.722 0 0118.685 19.097zM12 15a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path></svg>
                            </div>
                            <h3 class="text-lg font-extrabold transition-colors duration-300 mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Butuh bantuan?</h3>
                            <p class="text-sm transition-colors duration-300 mb-6" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Pusat bantuan kami tersedia 24/7 untuk menjawab pertanyaan Anda</p>
                            <button class="w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.42a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.42 1.105c.834.209 1.42.959 1.42 1.819V19.5a3 3 0 01-3 3H4.5a3 3 0 01-3-3V4.5z" clip-rule="evenodd"></path></svg>
                                Hubungi Support
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="shrink-0 py-4 px-8 border-t transition-colors duration-300 text-center text-sm" :class="darkMode ? 'border-gray-800 text-gray-500' : 'border-gray-200 text-gray-500'">
            © 2024 Admin Panel Platform - Semua hak cipta dilindungi
        </footer>
    </main>

    <!-- Success Toast Notifications -->
    <div x-show="saveSuccess" x-transition class="fixed bottom-6 right-6 px-6 py-4 rounded-full shadow-lg flex items-center gap-3 z-50 transition-all duration-300" :class="darkMode ? 'bg-emerald-900/20 border border-emerald-800' : 'bg-emerald-100 border border-emerald-200'">
        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="font-semibold text-emerald-500">Perubahan berhasil disimpan!</span>
    </div>

    <div x-show="passwordSuccess" x-transition class="fixed bottom-6 right-6 px-6 py-4 rounded-full shadow-lg flex items-center gap-3 z-50 transition-all duration-300" :class="darkMode ? 'bg-emerald-900/20 border border-emerald-800' : 'bg-emerald-100 border border-emerald-200'">
        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="font-semibold text-emerald-500">Password berhasil diperbarui!</span>
    </div>
</body>
</html>
