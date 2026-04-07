<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2">
                    <img src="<?php echo e(asset('images/logo-mahaputra.jpg')); ?>" alt="Logo" class="h-14 w-auto">
                    <div class="flex flex-col">
                        <span class="font-bold text-lg text-[#0F172A] leading-tight leading-none">SMKS Mahaputra</span>
                        <span class="text-sm text-blue-600 font-semibold">Cerdas Utama</span>
                    </div>
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors">Home</a>
                <a href="<?php echo e(route('jurusan')); ?>" class="<?php echo e(request()->routeIs('jurusan*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors">Jurusan</a>
                
                <!-- Dropdown Profil -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <a href="<?php echo e(route('profile')); ?>" class="<?php echo e(request()->routeIs('profile') || request()->routeIs('staff') || request()->routeIs('seragam') || request()->routeIs('album') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors flex items-center gap-1 py-4">
                        Profil
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute top-full left-0 w-48 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden py-2"
                         style="display: none;">
                        <a href="<?php echo e(route('staff')); ?>" class="block px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Guru & Staff</a>
                        <a href="<?php echo e(route('seragam')); ?>" class="block px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Seragam</a>
                        <a href="<?php echo e(route('album')); ?>" class="block px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Album</a>
                    </div>
                </div>
                <a href="<?php echo e(route('facilities')); ?>" class="<?php echo e(request()->routeIs('facilities') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors">Fasilitas</a>
                <a href="<?php echo e(route('news')); ?>" class="<?php echo e(request()->routeIs('news*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors">Berita</a>
                <a href="<?php echo e(route('extracurriculars.index')); ?>" class="<?php echo e(request()->routeIs('extracurriculars*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors">Ekstrakurikuler</a>
                <a href="<?php echo e(route('mitra')); ?>" class="<?php echo e(request()->routeIs('mitra') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors">Mitra</a>
                <a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->routeIs('contact') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600'); ?> font-medium transition-colors">Kontak</a>
                <a href="<?php echo e(route('enrollment.guide')); ?>" class="<?php echo e(request()->routeIs('enrollment.guide') || request()->routeIs('registration') ? 'bg-blue-600 shadow-blue-200' : 'bg-[#0F172A]'); ?> text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition-all shadow-sm">Pendaftaran</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-gray-600 hover:text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\laragon\www\web-sekolah\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>