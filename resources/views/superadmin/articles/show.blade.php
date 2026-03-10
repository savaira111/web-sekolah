<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Article - EduAdmin Pro</title>
    
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
                <a href="/superadmin/articles" class="flex items-center gap-2 text-sm font-bold transition-colors duration-300 hover:text-blue-500" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar
                </a>
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
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-6 border-b transition-colors duration-300 gap-4" :class="darkMode ? 'border-gray-800' : 'border-gray-200'">
                <div>
                    <div class="flex items-center gap-2 text-xs font-medium mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
                        <a href="/superadmin/dashboard" class="hover:text-blue-500 transition-colors">Dashboard</a>
                        <span>›</span>
                        <a href="/superadmin/articles" class="hover:text-blue-500 transition-colors">Artikel / Berita</a>
                        <span>›</span>
                        <span :class="darkMode ? 'text-blue-400' : 'text-blue-600'">Detail Artikel</span>
                    </div>
                    <h2 class="text-3xl font-extrabold tracking-tight leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Pratinjau Artikel</h2>
                </div>
                
                <div class="flex items-center gap-4">
                    <a href="/superadmin/articles/edit/1" class="px-5 py-2.5 font-bold text-sm border rounded-xl transition-colors duration-300 shadow-sm flex items-center gap-2" :class="darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        Edit Artikel
                    </a>
                    <button class="px-8 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Publish Sekarang
                    </button>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Column (Article Content) -->
                <div class="flex-1 space-y-8">
                    
                    <div class="rounded-[2.5rem] overflow-hidden border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <!-- Hero Image Box -->
                        <div class="w-full aspect-[2/1] relative overflow-hidden group">
                            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Hero">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent"></div>
                            <div class="absolute top-6 left-6 flex items-center gap-3">
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-emerald-500 text-white shadow-lg backdrop-blur-sm">Dipublikasi</span>
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-blue-600/90 text-white shadow-lg backdrop-blur-sm">Kegiatan Sekolah</span>
                            </div>
                        </div>

                        <!-- Article Content Box -->
                        <div class="p-10 lg:p-14">
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-[1.1] mb-8 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Hari Olahraga Nasional 2024: Semangat Atlet Muda Sekolah</h1>
                            
                            <!-- Article Meta -->
                            <div class="flex flex-wrap items-center gap-6 pb-8 mb-8 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-200'">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('images/guru-1.jpg') }}" class="w-10 h-10 rounded-full border-2 object-cover transition-colors duration-300" :class="darkMode ? 'border-gray-700' : 'border-gray-200'" alt="Avatar">
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Oleh</p>
                                        <p class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Admin Utama</p>
                                    </div>
                                </div>
                                <div class="w-px h-10 transition-colors duration-300" :class="darkMode ? 'bg-gray-800' : 'bg-gray-200'"></div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Diterbitkan</p>
                                    <div class="flex items-center gap-2 text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        12 Mei 2024, 14:30 WIB
                                    </div>
                                </div>
                                <div class="w-px h-10 transition-colors duration-300" :class="darkMode ? 'bg-gray-800' : 'bg-gray-200'"></div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider mb-0.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Views</p>
                                    <div class="flex items-center gap-2 text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                        <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        1,248x dilihat
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content Blocks -->
                            <article class="prose prose-lg max-w-none transition-colors duration-300" :class="darkMode ? 'prose-invert text-gray-300 prose-p:text-gray-300 prose-headings:text-white' : 'text-gray-700'">
                                <p>Udara dipenuhi dengan kegembiraan dan warna-warni cerah dari empat rumah sekolah kami saat kami merayakan Hari Olahraga Nasional. Siswa dari semua kelas berpartisipasi dengan antusiasme yang luar biasa, menunjukkan sportivitas sejati dan kehebatan atletik.</p>
                                
                                <p>Acara dimulai dengan pawai megah oleh dewan siswa, diikuti oleh berbagai nomor lintasan termasuk sprint 100m, lari estafet, dan lompat jauh. Orang tua dan guru bersorak dari pinggir lapangan saat rekor baru dipecahkan dan bakat-bakat baru muncul.</p>
                                
                                <blockquote class="border-l-4 pl-6 italic my-8 transition-colors duration-300" :class="darkMode ? 'border-blue-500 text-gray-200 space-y-2' : 'border-blue-500 text-gray-900 space-y-2'">
                                    <p class="text-xl font-medium">"Ini bukan hanya tentang menang; ini tentang berpartisipasi dan belajar menangani kemenangan dan kekalahan dengan anggun."</p>
                                    <footer class="text-sm font-bold tracking-widest text-blue-500 uppercase">— Kepala Sekolah</footer>
                                </blockquote>
                                
                                <h3>Highlight Acara Utama</h3>
                                <ul>
                                    <li>Lomba lari estafet 4x100m yang sangat mendebarkan</li>
                                    <li>Pertandingan tarik tambang persahabatan antara guru dan siswa</li>
                                    <li>Upacara penyerahan medali yang khidmat</li>
                                </ul>
                                
                                <p>Kami mengucapkan terima kasih kepada semua panitia, guru, dan staf yang telah bekerja keras memastikan kelancaran acara ini. Semangat hari itu benar-benar luar biasa dan akan dikenang sepanjang tahun akademik.</p>
                            </article>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Sidebar Details) -->
                <div class="w-full lg:w-[22rem] space-y-6">
                    
                    <div class="rounded-3xl p-8 border transition-colors duration-300 shadow-sm" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                        <h3 class="text-sm font-extrabold tracking-widest uppercase mb-8 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-800'">
                            INFORMASI ARTIKEL
                        </h3>

                        <div class="space-y-6">
                            <!-- Detail Item -->
                            <div>
                                <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Status</p>
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                    <span class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-200' : 'text-gray-900'">Dipublikasi</span>
                                </div>
                            </div>
                            
                            <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                            
                            <!-- Detail Item -->
                            <div>
                                <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Kategori</p>
                                <span class="inline-block px-3 py-1 font-bold text-xs rounded-full transition-colors duration-300 bg-blue-500/10 text-blue-500">Kegiatan Sekolah</span>
                            </div>
                            
                            <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                            <!-- Detail Item -->
                            <div>
                                <p class="text-[10px] font-extrabold uppercase tracking-widest mb-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Penulis</p>
                                <div class="flex items-center gap-3 font-bold text-sm transition-colors duration-300" :class="darkMode ? 'text-gray-200' : 'text-gray-700'">
                                    <img src="{{ asset('images/guru-1.jpg') }}" class="w-8 h-8 rounded-full object-cover">
                                    Admin Utama
                                </div>
                            </div>

                            <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                            <!-- Detail Item -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Tanggal Buat</p>
                                    <p class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-900'">10 Mei 2024</p>
                                    <p class="text-xs text-gray-500">09:00 WIB</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Visibilitas</p>
                                    <p class="text-sm font-bold transition-colors duration-300" :class="darkMode ? 'text-gray-300' : 'text-gray-900'">Publik</p>
                                </div>
                            </div>

                            <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                            <!-- Detail Item -->
                            <div>
                                <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">URL Slug</p>
                                <a href="#" class="text-sm font-medium transition-colors duration-300 text-blue-500 hover:text-blue-600 truncate block bg-blue-500/5 p-2 rounded-lg border border-blue-500/10">/berita/hari-olahraga-nasional</a>
                            </div>

                            <hr class="transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">

                            <!-- Detail Item -->
                            <div>
                                <p class="text-[10px] font-extrabold uppercase tracking-widest mb-3 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-500'">Tags</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Olahraga</span>
                                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Sekolah</span>
                                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Prestasi</span>
                                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-xs font-bold text-gray-600 dark:text-gray-300 border border-transparent dark:border-gray-700">#Acara</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
