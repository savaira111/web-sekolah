<header class="h-24 px-8 flex items-center justify-between shrink-0 backdrop-blur-md sticky top-0 z-50 w-full mb-2 transition-colors duration-300" 
    :class="darkMode ? 'bg-[#0F172A]/80 border-b border-gray-800' : 'bg-[#f8fafc]/80 border-b border-gray-200'">
    
    <!-- Search Bar -->
    <div class="relative w-full max-w-md">
        <input type="text" placeholder="Cari data..." 
            class="w-full pl-11 pr-4 py-2.5 rounded-xl text-[13px] font-medium border-none transition-all outline-none" 
            :class="darkMode ? 'bg-[#1E293B] text-white placeholder-gray-500' : 'bg-gray-100 text-gray-900 placeholder-gray-400'">
        <svg class="w-4 h-4 absolute left-4 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>
    
    <div class="flex items-center gap-4 ml-auto">
        <!-- Theme Toggle -->
        <button @click="darkMode = !darkMode" 
             class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300" 
             :class="darkMode ? 'bg-[#1E293B] text-white hover:bg-gray-800' : 'bg-white shadow-sm border border-gray-100 text-gray-500 hover:bg-gray-50'">
             
             <svg x-show="darkMode" class="w-5 h-5 focus:outline-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
             </svg>
             
             <svg x-cloak x-show="!darkMode" class="w-5 h-5 focus:outline-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
             </svg>
        </button>

        
        <div class="relative">
            <button @click="showNotifications = !showNotifications" @click.away="showNotifications = false" 
                class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm transition-all duration-300 relative" 
                :class="darkMode ? 'bg-[#1E293B] text-gray-300 hover:bg-gray-800' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100'">
                
                <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 transition-colors duration-300" 
                    :class="darkMode ? 'border-[#1E293B]' : 'border-white'"></span>
                
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>
            
            <div x-cloak x-show="showNotifications" 
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="absolute right-0 mt-2 w-80 rounded-2xl shadow-lg border overflow-hidden z-50 transition-colors duration-300" 
                :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100'">
                
                <div class="px-4 py-3 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                    <h3 class="font-bold text-sm" :class="darkMode ? 'text-white' : 'text-gray-900'">Notifikasi</h3>
                </div>
                
                <div class="max-h-64 overflow-y-auto">
                    <div class="px-4 py-3 border-b last:border-0 hover:bg-gray-50 dark:hover:bg-[#0F172A] cursor-pointer transition-colors duration-300" 
                        :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <p class="text-xs font-semibold" :class="darkMode ? 'text-gray-200' : 'text-gray-800'">Pendaftaran PPDB Baru</p>
                        <p class="text-[10px]" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Budi mendaftar di jurusan RPL</p>
                        <span class="text-[9px] text-blue-500 mt-1 block font-bold">5 menit yang lalu</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-6 w-px transition-colors duration-300 mx-1" :class="darkMode ? 'bg-gray-700' : 'bg-gray-200'"></div>
        
        <!-- Profile -->
        <a href="/superadmin/profile" class="flex items-center gap-4 px-2 py-1.5 rounded-2xl transition-all hover:bg-gray-50 dark:hover:bg-gray-800/50 group">
            <div class="text-right hidden sm:block">
                <p class="text-[13.5px] font-extrabold leading-none transition-colors duration-300" 
                    :class="darkMode ? 'text-white' : 'text-gray-900'">{{ auth()->user()->name ?? 'Superadmin' }}</p>
                <p class="text-[10px] font-black tracking-[0.05em] uppercase transition-colors duration-300 mt-1.5" 
                    :class="darkMode ? 'text-gray-500' : 'text-gray-400'">SUPER ADMIN</p>
            </div>
            <div class="w-11 h-11 rounded-full flex items-center justify-center font-black text-[15px] transition-all shadow-sm relative overflow-hidden shrink-0 border-2" 
                 :class="darkMode ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : 'bg-[#EBF1FF] text-[#3B82F6] border-white'">
                 SU
            </div>
        </a>
    </div>
</header>