<aside class="w-64 sidebar h-full flex flex-col transition-all duration-300 z-20 shrink-0 border-r border-gray-800" :class="{'hidden': !sidebarOpen}">
    
    <!-- Logo -->
    <div class="h-20 flex items-center px-6">
        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shrink-0 overflow-hidden border border-gray-700">
            <img src="{{ asset('images/logo-mahaputra.jpg') }}" alt="Logo" class="w-full h-full object-cover">
        </div>

        <div class="ml-3">
            <h1 class="text-white font-bold text-lg tracking-wide">
                Admin <span class="text-blue-500">Mahput</span>
            </h1>
        </div>
    </div>

    <!-- Menu -->
    <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">

        <p class="px-4 text-[10px] font-extrabold text-gray-500 uppercase tracking-widest mb-3 mt-2">
            Menu Utama
        </p>

        <!-- Dashboard -->
        <a href="/superadmin/dashboard"
        class="flex items-center gap-3 px-4 py-3 rounded-full font-medium text-sm transition-colors
        {{ request()->routeIs('superadmin.dashboard') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">

            <svg class="w-5 h-5 {{ request()->routeIs('superadmin.dashboard') ? 'text-white' : '' }}"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 
                2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 
                0 012 2v2a2 2 0 01-2 2h-2a2 2 0 
                01-2-2V6zM4 16a2 2 0 012-2h2a2 2 
                0 012 2v2a2 2 0 01-2 
                2H6a2 2 0 01-2-2v-2zM14 
                16a2 2 0 012-2h2a2 2 0 
                012 2v2a2 2 0 01-2 
                2h-2a2 2 0 01-2-2v-2z"/>
            </svg>

            Dashboard
        </a>
        
        @if(auth()->user()->role === 'Superadmin')
        <!-- Album Management -->
        <a href="{{ route('superadmin.albums.index') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-full font-medium text-sm transition-colors
        {{ request()->routeIs('superadmin.albums.*') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">

            <svg class="w-5 h-5 {{ request()->routeIs('superadmin.albums.*') ? 'text-white' : '' }}"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>

            Manajemen Album
        </a>

        <!-- User Management -->
        <a href="/superadmin/users"
        class="flex items-center gap-3 px-4 py-3 rounded-full font-medium text-sm transition-colors
        {{ request()->routeIs('superadmin.users.*') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">

            <svg class="w-5 h-5 {{ request()->routeIs('superadmin.users.*') ? 'text-white' : '' }}"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>

            User Management
        </a>
        @endif



        @if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'operator artikel/berita')
        <!-- Articles -->
        <a href="/superadmin/articles"
        class="flex items-center gap-3 px-4 py-3 rounded-full font-medium text-sm transition-colors
        {{ request()->routeIs('superadmin.articles.*') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">


            <svg class="w-5 h-5 {{ request()->routeIs('superadmin.articles.*') ? 'text-white' : '' }}"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 
                5H7a2 2 0 01-2-2V5a2 2 
                0 012-2h5.586a1 1 0 
                01.707.293l5.414 
                5.414a1 1 0 01.293.707V19a2 
                2 0 01-2 2z"/>
            </svg>

            Artikel / Berita
        </a>
        @endif

        @if(auth()->user()->role === 'Superadmin')
        <!-- Messages -->
        <a href="/superadmin/messages"
        class="flex items-center gap-3 px-4 py-3 rounded-full font-medium text-sm transition-colors
        {{ request()->routeIs('superadmin.messages.*') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">

            <svg class="w-5 h-5 {{ request()->routeIs('superadmin.messages.*') ? 'text-white' : '' }}"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 
                10h.01M9 16H5a2 2 0 
                01-2-2V6a2 2 0 012-2h14a2 
                2 0 012 2v8a2 2 0 
                01-2 2h-5l-5 5v-5z"/>
            </svg>

            Pesan Masuk
        </a>
        @endif

        @if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'admin PPDB management')
        <!-- PPDB -->
        <a href="{{ route('superadmin.ppdb.index') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-full font-medium text-sm transition-colors mt-2
        {{ request()->routeIs('superadmin.ppdb.*') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">

            <svg class="w-5 h-5 {{ request()->routeIs('superadmin.ppdb.*') ? 'text-white' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M18 9v3m0 0v3m0-3h3m-3 
                0h-3m-2-5a4 4 0 11-8 
                0 4 4 0 018 0zM3 
                20a6 6 0 0112 0v1H3v-1z"/>
            </svg>

            PPDB Management
        </a>
        @endif

        @if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'admin EXTRAKULIKULLER management')
        <!-- Eskul Dropdown -->
        <div x-data="{ open: {{ request()->routeIs('superadmin.extracurricular-registrations.*') || request()->routeIs('superadmin.eskul.*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
            class="flex items-center justify-between w-full px-4 py-3 rounded-full font-medium text-sm transition-colors
            {{ request()->routeIs('superadmin.extracurricular-registrations.*') || request()->routeIs('superadmin.eskul.*') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 {{ request()->routeIs('superadmin.extracurricular-registrations.*') || request()->routeIs('superadmin.eskul.*') ? 'text-white' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Ekstrakurikuler
                </div>
                <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Submenu -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="mt-2 ml-6 space-y-1 pl-4 border-l border-gray-800">
                <a href="{{ route('superadmin.eskul.index') }}" 
                   class="block py-2 text-sm transition-colors {{ request()->routeIs('superadmin.eskul.index') ? 'text-blue-500 font-bold' : 'text-gray-500 hover:text-white' }}">
                    Manajemen Eskul
                </a>
                <a href="{{ route('superadmin.extracurricular-registrations.index') }}" 
                   class="block py-2 text-sm transition-colors {{ request()->routeIs('superadmin.extracurricular-registrations.index') ? 'text-blue-500 font-bold' : 'text-gray-500 hover:text-white' }}">
                    Pendaftaran
                </a>
            </div>
        </div>
        @endif
    </div>

    <!-- Keluar Link -->
    <div class="px-4 pt-2 pb-6 border-t border-white/5">
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
            @csrf
        </form>
        <button type="button" 
            onclick="confirmLogout()"
            class="flex items-center gap-3 px-4 py-2 text-gray-500 hover:text-red-400 font-bold text-xs transition-colors w-full group">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            Keluar
        </button>
    </div>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari sesi admin ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                borderRadius: '20px',
                background: document.documentElement.classList.contains('dark') ? '#1E293B' : '#FFFFFF',
                color: document.documentElement.classList.contains('dark') ? '#FFFFFF' : '#000000',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }
    </script>

</aside>