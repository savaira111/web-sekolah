<aside class="fixed md:static inset-y-0 left-0 sidebar h-full flex flex-col z-50 shrink-0 border-r border-gray-800 transform overflow-hidden" 
       style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;"
       :class="$store.theme.sidebarOpen ? 'translate-x-0 w-64 md:w-64 opacity-100' : '-translate-x-full md:translate-x-0 w-64 md:w-0 md:border-none md:opacity-100 opacity-0'">
    <div class="w-64 flex flex-col h-full shrink-0">
    
    <!-- Logo -->
    <div class="h-20 flex items-center px-6 mb-0">
        <div class="w-11 h-11 bg-white/50 dark:bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center shrink-0 overflow-hidden border border-black/5 dark:border-white/20 shadow-sm dark:shadow-xl">
            <img src="<?php echo e(asset('images/logo-smk.png')); ?>" alt="Logo" class="w-7 h-7 object-contain">
        </div>

        <div class="ml-3 flex flex-col justify-center">
            <h1 class="font-bold text-base tracking-tight leading-tight flex items-center gap-1">
                <span :class="$store.theme.darkMode ? 'text-white' : 'text-black'" class="transition-colors duration-300">Admin</span>
                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">Mahput</span>
            </h1>
            <p class="text-[9px] text-gray-500 dark:text-gray-400 font-medium uppercase tracking-tighter opacity-80 leading-none">Control Panel</p>
        </div>
    </div>

    <!-- Menu -->
    <div class="flex-1 overflow-y-auto pt-2 pb-6 px-4 space-y-1">

        <p class="px-5 text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-[0.2em] mb-3 mt-1 opacity-80 dark:opacity-50">
            Menu Utama
        </p>

        <?php
            $pendingCommentsCount = \App\Models\Comment::where('status', 'pending')->count();
            $unreadMessagesCount = \App\Models\ContactMessage::where('is_read', false)->count();
            $pendingPpdbCount = \App\Models\Applicant::where('status', 'Menunggu Review')->count();
            $pendingEskulCount = \App\Models\ExtracurricularRegistration::where('status', 'pending')->count();
        ?>



        <!-- Dashboard -->
        <a href="/superadmin/dashboard"
        class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all
        <?php echo e(request()->routeIs('superadmin.dashboard') ? 'sidebar-active' : 'sidebar-item'); ?>">

            <div class="flex items-center justify-center w-5 h-5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>

            Dashboard
        </a>
        
        <?php if(auth()->user()->role === 'Superadmin'): ?>
        <!-- Album Management -->
        <a href="<?php echo e(route('superadmin.albums.index')); ?>"
        class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all
        <?php echo e(request()->routeIs('superadmin.albums.*') ? 'sidebar-active' : 'sidebar-item'); ?>">

            <div class="flex items-center justify-center w-5 h-5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>

            Manajemen Album
        </a>

        <!-- Landing Stats Management -->
        <a href="<?php echo e(route('superadmin.landing-stats.index')); ?>"
        class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all
        <?php echo e(request()->routeIs('superadmin.landing-stats.*') ? 'sidebar-active' : 'sidebar-item'); ?>">

            <div class="flex items-center justify-center w-5 h-5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>

            Statistik Landing
        </a>

        <!-- Mitra Industri Management -->
        <a href="<?php echo e(route('superadmin.partners.index')); ?>"
        class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all
        <?php echo e(request()->routeIs('superadmin.partners.*') ? 'sidebar-active' : 'sidebar-item'); ?>">

            <div class="flex items-center justify-center w-5 h-5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>

            Mitra Industri
        </a>

        <!-- User Management -->
        <a href="/superadmin/users"
        class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all
        <?php echo e(request()->routeIs('superadmin.users.*') ? 'sidebar-active' : 'sidebar-item'); ?>">

            <div class="flex items-center justify-center w-5 h-5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>

            User Management
        </a>
        <?php endif; ?>



        <?php if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'operator artikel/berita'): ?>
        <!-- Articles Dropdown -->
        <div x-data="{ open: <?php echo e(request()->routeIs('superadmin.articles.*') || request()->routeIs('superadmin.comments.*') ? 'true' : 'false'); ?> }">
            <button @click="open = !open"
            class="flex items-center justify-between w-full px-4 py-3.5 rounded-xl font-medium text-sm transition-all
            <?php echo e(request()->routeIs('superadmin.articles.*') || request()->routeIs('superadmin.comments.*') ? 'sidebar-active' : 'sidebar-item'); ?>">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-5 h-5">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    Berita & Komentar
                </div>
                <svg class="w-4 h-4 transition-all duration-300" 
                     :class="open ? 'rotate-180 text-blue-500' : 'text-gray-400'" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Submenu -->
            <div x-show="open" 
                 x-collapse.duration.500ms
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-x-2"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 class="mt-1 ml-4 space-y-1 pl-6 border-l border-gray-200 dark:border-gray-800">
                <a href="/superadmin/articles" 
                   class="block py-2 text-sm transition-colors <?php echo e(request()->routeIs('superadmin.articles.*') ? 'text-blue-600 dark:text-blue-400 font-bold' : 'text-gray-500 hover:text-blue-600 dark:hover:text-white'); ?>">
                    Berita Management
                </a>
                <a href="/superadmin/comments" 
                   class="flex items-center justify-between py-2 text-sm transition-colors <?php echo e(request()->routeIs('superadmin.comments.*') ? 'text-blue-600 dark:text-blue-400 font-bold' : 'text-gray-500 hover:text-blue-600 dark:hover:text-white'); ?>">
                    <span>Manajemen Komentar</span>
                    <?php if($pendingCommentsCount > 0): ?>
                        <span class="px-2 py-0.5 bg-blue-500/10 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 border border-blue-500/20 dark:border-blue-500/30 text-[10px] font-bold rounded-full mr-2"><?php echo e($pendingCommentsCount); ?></span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
        <?php endif; ?>

        <?php if(auth()->user()->role === 'Superadmin'): ?>
        <!-- Messages -->
        <a href="/superadmin/messages"
        class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all
        <?php echo e(request()->routeIs('superadmin.messages.*') ? 'sidebar-active' : 'sidebar-item'); ?>">

            <div class="flex items-center justify-center w-5 h-5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>

            <div class="flex items-center justify-between flex-1 truncate">
                <span>Pesan Masuk</span>
                <?php if($unreadMessagesCount > 0): ?>
                    <span class="px-2 py-0.5 bg-amber-500/20 text-amber-500 border border-amber-500/30 text-[10px] font-bold rounded-full"><?php echo e($unreadMessagesCount); ?></span>
                <?php endif; ?>
            </div>
        </a>
        <?php endif; ?>

        <?php if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'admin PPDB management'): ?>
        <!-- PPDB -->
        <a href="<?php echo e(route('superadmin.ppdb.index')); ?>"
        class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all
        <?php echo e(request()->routeIs('superadmin.ppdb.*') ? 'sidebar-active' : 'sidebar-item'); ?>">

            <div class="flex items-center justify-center w-5 h-5">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>

            <div class="flex items-center justify-between flex-1 truncate">
                <span>PPDB Management</span>
                <?php if($pendingPpdbCount > 0): ?>
                    <span class="px-2 py-0.5 bg-blue-500/20 text-blue-400 border border-blue-500/30 text-[10px] font-bold rounded-full"><?php echo e($pendingPpdbCount); ?></span>
                <?php endif; ?>
            </div>
        </a>
        <?php endif; ?>

        <?php if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'admin EXTRAKULIKULLER management'): ?>
        <!-- Eskul Dropdown -->
        <div x-data="{ open: <?php echo e(request()->routeIs('superadmin.extracurricular-registrations.*') || request()->routeIs('superadmin.eskul.*') ? 'true' : 'false'); ?> }">
            <button @click="open = !open"
            class="flex items-center justify-between w-full px-4 py-3.5 rounded-xl font-medium text-sm transition-all
            <?php echo e(request()->routeIs('superadmin.extracurricular-registrations.*') || request()->routeIs('superadmin.eskul.*') ? 'sidebar-active' : 'sidebar-item'); ?>">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-5 h-5">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    Ekstrakurikuler
                </div>
                <svg class="w-4 h-4 transition-all duration-300" 
                     :class="open ? 'rotate-180 text-blue-500' : 'text-gray-400'" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Submenu -->
            <div x-show="open" 
                 x-collapse.duration.500ms
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-x-2"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 class="mt-1 ml-4 space-y-1 pl-6 border-l border-gray-200 dark:border-gray-800">
                <a href="<?php echo e(route('superadmin.eskul.index')); ?>" 
                   class="block py-2 text-sm transition-colors <?php echo e(request()->routeIs('superadmin.eskul.index') ? 'text-blue-600 dark:text-blue-400 font-bold' : 'text-gray-500 hover:text-blue-600 dark:hover:text-white'); ?>">
                    Manajemen Eskul
                </a>
                <a href="<?php echo e(route('superadmin.extracurricular-registrations.index')); ?>" 
                   class="flex items-center justify-between py-2 text-sm transition-colors <?php echo e(request()->routeIs('superadmin.extracurricular-registrations.index') ? 'text-blue-600 dark:text-blue-400 font-bold' : 'text-gray-500 hover:text-blue-600 dark:hover:text-white'); ?>">
                    <span>Pendaftaran</span>
                    <?php if($pendingEskulCount > 0): ?>
                        <span class="px-2 py-0.5 bg-purple-500/10 dark:bg-purple-500/20 text-purple-600 dark:text-purple-400 border border-purple-500/20 dark:border-purple-500/30 text-[10px] font-bold rounded-full mr-2"><?php echo e($pendingEskulCount); ?></span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>


    </div>
</aside><?php /**PATH C:\laragon\www\web-sekolah\resources\views/layouts/superadmin/sidebar.blade.php ENDPATH**/ ?>