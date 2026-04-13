<header class="h-24 px-8 flex items-center justify-between shrink-0 backdrop-blur-md sticky top-0 z-50 w-full mb-2 transition-colors duration-300" 
    :class="$store.theme.darkMode ? 'bg-black/80 border-b border-gray-800' : 'bg-white/80 border-b border-gray-200'">
    

    
    <style>
        @keyframes soft-pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.2); }
        }
        .animate-soft-pulse {
            animation: soft-pulse 2s infinite ease-in-out;
        }
    </style>
    
    <div class="flex items-center gap-4">
        <!-- Sidebar Toggle -->
        <button @click="$store.theme.toggleSidebar()" 
                class="p-2 rounded-xl transition-all duration-300 hover:scale-105 shrink-0"
                :class="$store.theme.darkMode ? 'bg-[#111827] text-white hover:bg-gray-800' : 'bg-white border border-gray-100 text-gray-600 hover:bg-gray-50'">
            <svg class="w-6 h-6 transition-transform duration-300" :class="$store.theme.sidebarOpen ? '' : 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8M4 18h16"></path>
            </svg>
        </button>

        <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
            <h2 class="text-lg md:text-xl font-black tracking-tight leading-none" 
                :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">
                <?php echo $__env->yieldContent('navbar_title', 'Dashboard Overview'); ?>
            </h2>
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                <span class="text-[10px] font-bold uppercase tracking-wider" 
                    :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Sistem Aktif</span>
            </div>
        </div>
    </div>
    
    <div class="flex items-center gap-3 sm:gap-4 ml-auto" 
         x-data="{ 
            showNotifications: false,
            hasSeen: localStorage.getItem('last_notif_count') == '<?php echo e($unreadNotificationsCount); ?>',
            markAsSeen() {
                this.hasSeen = true;
                localStorage.setItem('last_notif_count', '<?php echo e($unreadNotificationsCount); ?>');
            }
         }">
    <!-- Theme Toggle -->
    <button @click="$store.theme.toggle()" 
            class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300" 
            :class="$store.theme.darkMode ? 'bg-[#111827] text-white hover:bg-gray-800' : 'bg-white shadow-sm border border-gray-100 text-gray-500 hover:bg-gray-50'">
            
            <svg x-show="$store.theme.darkMode" class="w-5 h-5 focus:outline-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            
            <svg x-cloak x-show="!$store.theme.darkMode" class="w-5 h-5 focus:outline-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
    </button>

    
    <div class="relative">
        <button @click="showNotifications = !showNotifications; if(showNotifications) markAsSeen()" @click.away="showNotifications = false" 
            class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm transition-all duration-300 relative" 
            :class="$store.theme.darkMode ? 'bg-[#111827] text-gray-300 hover:bg-gray-800' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100'">
            
            <?php if($unreadNotificationsCount > 0): ?>
            <span x-show="!hasSeen" class="absolute top-2.5 right-2.5 w-4 h-4 bg-red-500 text-white text-[8px] font-black rounded-full border-2 flex items-center justify-center transition-colors duration-300 animate-soft-pulse" 
                :class="$store.theme.darkMode ? 'border-[#111827]' : 'border-white'">
                <?php echo e($unreadNotificationsCount > 9 ? '9+' : $unreadNotificationsCount); ?>

            </span>
            <?php endif; ?>
            
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
        </button>
        
        <div x-cloak x-show="showNotifications" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="absolute right-0 mt-2 w-80 rounded-2xl shadow-lg border overflow-hidden z-50 transition-colors duration-300" 
            :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
            
            <div class="px-4 py-3 border-b flex items-center justify-between transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                <h3 class="font-bold text-sm" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Notifikasi</h3>
                <?php if($unreadNotificationsCount > 0): ?>
                    <span class="px-2 py-0.5 bg-blue-500 text-white text-[10px] font-bold rounded-full"><?php echo e($unreadNotificationsCount); ?> Baru</span>
                <?php endif; ?>
            </div>
            
            <div class="max-h-80 overflow-y-auto">
                <?php $__empty_1 = true; $__currentLoopData = $adminNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e($notification['link']); ?>" class="block px-4 py-3 border-b last:border-0 hover:bg-gray-50 dark:hover:bg-gray-800/50 cursor-pointer transition-colors duration-300" 
                    :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0 
                            <?php if($notification['type'] === 'ppdb'): ?> bg-blue-50 text-blue-500 
                            <?php elseif($notification['type'] === 'eskul'): ?> bg-purple-50 text-purple-500 
                            <?php elseif($notification['type'] === 'message'): ?> bg-amber-50 text-amber-500 
                            <?php else: ?> bg-green-50 text-green-500 <?php endif; ?>">
                            <?php if($notification['type'] === 'ppdb'): ?>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <?php elseif($notification['type'] === 'eskul'): ?>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            <?php elseif($notification['type'] === 'message'): ?>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <?php else: ?>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            <?php endif; ?>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-xs font-semibold truncate" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'"><?php echo e($notification['title']); ?></p>
                            <p class="text-[10px] line-clamp-2 mt-0.5" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'"><?php echo e($notification['description']); ?></p>
                            <span class="text-[9px] text-blue-500 mt-1 block font-bold"><?php echo e($notification['time']); ?></span>
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="px-4 py-8 text-center">
                    <div class="w-12 h-12 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                    <p class="text-xs font-semibold" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Tidak ada notifikasi baru</p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="px-4 py-2 border-t text-center transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                <a href="#" class="text-[10px] font-bold text-blue-500 hover:text-blue-600 uppercase tracking-widest">Tandai Semua Sudah Dibaca</a>
            </div>
        </div>
    </div>

    <div class="h-6 w-px transition-colors duration-300 mx-1" :class="$store.theme.darkMode ? 'bg-gray-700' : 'bg-gray-200'"></div>
    
    <style>
        .dropdown-anim-enter { animation: dropdownFadeIn 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
        .dropdown-anim-leave { animation: dropdownFadeOut 0.2s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
        @keyframes dropdownFadeIn {
            from { opacity: 0; transform: scale(0.95) translateY(-10px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        @keyframes dropdownFadeOut {
            from { opacity: 1; transform: scale(1) translateY(0); }
            to { opacity: 0; transform: scale(0.95) translateY(-10px); }
        }
    </style>
    <!-- Profile Dropdown -->
    <div class="relative" x-data="{ showProfile: false }">
        <button @click="showProfile = !showProfile" @click.away="showProfile = false" class="flex items-center gap-2 sm:gap-4 px-2 py-1.5 rounded-2xl transition-all hover:bg-gray-50 dark:hover:bg-gray-800/50 group text-left">
            <div class="text-right hidden sm:block">
                <p class="text-[13.5px] font-extrabold leading-none transition-colors duration-300" 
                    :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'"><?php echo e(auth()->user()->name ?? 'Superadmin'); ?></p>
                <p class="text-[10px] font-black tracking-[0.05em] uppercase transition-colors duration-300 mt-1.5" 
                    :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'"><?php echo e(auth()->user()->role ?? 'Superadmin'); ?></p>
            </div>
            <div class="w-11 h-11 rounded-full flex items-center justify-center font-black text-[15px] transition-all shadow-sm relative overflow-hidden shrink-0 border-2" 
                    :class="$store.theme.darkMode ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : 'bg-[#EBF1FF] text-[#3B82F6] border-white'">
                    SU
            </div>
            <svg class="w-4 h-4 transition-transform duration-300 mx-1" :class="showProfile ? 'rotate-180' : ''" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div x-cloak x-show="showProfile" 
             x-transition:enter="dropdown-anim-enter"
             x-transition:leave="dropdown-anim-leave"
             style="transform-origin: top right;"
             class="absolute right-0 mt-3 w-56 rounded-2xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.3)] border overflow-hidden z-50 transition-colors duration-300" 
             :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
            
            <a href="/superadmin/profile" class="flex items-center gap-3 px-4 py-3 border-b hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800 text-gray-200' : 'border-gray-100 text-gray-700'">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="text-sm font-semibold">Profil Saya</span>
            </a>
            
            <a href="/" class="flex items-center gap-3 px-4 py-3 border-b hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800 text-gray-200' : 'border-gray-100 text-gray-700'">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="text-sm font-semibold text-blue-500">Landing Page</span>
            </a>

            <form id="logout-form-nav" method="POST" action="<?php echo e(route('logout')); ?>" class="hidden">
                <?php echo csrf_field(); ?>
            </form>
            <button type="button" @click="confirmLogoutNav()" class="flex items-center gap-3 px-4 py-3 w-full text-left hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-300 text-red-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-sm font-semibold">Keluar</span>
            </button>
            <script>
                function confirmLogoutNav() {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda akan keluar dari sesi admin ini.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#EF4444',
                        cancelButtonColor: '#6B7280',
                        confirmButtonText: 'Ya, Keluar!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        borderRadius: '20px',
                        background: document.documentElement.classList.contains('dark') ? '#1E293B' : '#FFFFFF',
                        color: document.documentElement.classList.contains('dark') ? '#FFFFFF' : '#000000',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form-nav').submit();
                        }
                    })
                }
            </script>
        </div>
    </div>
    </div>
</header><?php /**PATH C:\laragon\www\web-sekolah\resources\views/layouts/superadmin/navbar.blade.php ENDPATH**/ ?>