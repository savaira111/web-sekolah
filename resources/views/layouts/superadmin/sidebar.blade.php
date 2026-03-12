<aside class="w-64 sidebar h-full flex flex-col transition-all duration-300 z-20 shrink-0 border-r border-gray-800" :class="{'hidden': !sidebarOpen}">
    
    <!-- Logo -->
    <div class="h-20 flex items-center px-6">
        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 
                12.083 0 01.665 6.479A11.952 11.952 0 0012 
                20.055a11.952 11.952 0 00-6.824-2.998 
                12.078 12.078 0 01.665-6.479L12 14z"/>
            </svg>
        </div>

        <div class="ml-3">
            <h1 class="text-white font-bold text-lg tracking-wide">
                EduAdmin <span class="font-medium">Pro</span>
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

        <!-- Users -->
        <a href="/superadmin/users"
        class="flex items-center gap-3 px-4 py-3 rounded-full font-medium text-sm transition-colors
        {{ request()->routeIs('superadmin.users.*') ? 'sidebar-active shadow-lg shadow-blue-500/20' : 'sidebar-item' }}">

            <svg class="w-5 h-5 {{ request()->routeIs('superadmin.users.*') ? 'text-white' : '' }}"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4.354a4 4 0 110 5.292M15 
                21H3v-1a6 6 0 0112 0v1zm0 
                0h6v-1a6 6 0 00-9-5.197M13 
                7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>

            User Management
        </a>

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

        <!-- Eskul -->
        <a href="#"
        class="flex items-center gap-3 px-4 py-3 rounded-full sidebar-item font-medium text-sm transition-colors">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.828 10.172a4 4 0 
                00-5.656 0l-4 4a4 4 
                0 105.656 5.656l1.102-1.101m-.758-4.899a4 
                4 0 005.656 0l4-4a4 
                4 0 00-5.656-5.656l-1.1 1.1"/>
            </svg>

            Eskul Management
        </a>

    </div>

    <!-- Logout -->
    <div class="p-4 mt-auto mb-4">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
            class="flex items-center gap-3 px-4 py-3 rounded-full text-red-400 hover:text-white hover:bg-red-500/10 font-medium text-sm transition-colors w-full">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 
                    4H7m6 4v1a3 3 0 
                    01-3 3H6a3 3 0 
                    01-3-3V7a3 3 0 
                    013-3h4a3 3 0 
                    013 3v1"/>
                </svg>

                Logout
            </button>

        </form>

    </div>

</aside>