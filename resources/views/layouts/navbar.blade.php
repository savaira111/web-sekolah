<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo-smk.png') }}" alt="Logo" class="h-14 w-auto">
                    <div class="flex flex-col">
                        <span class="font-bold text-lg text-[#0F172A] leading-tight leading-none">SMKS Mahaputra</span>
                        <span class="text-sm text-blue-600 font-semibold">Cerdas Utama</span>
                    </div>
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Home</a>
                <a href="{{ route('jurusan') }}" class="{{ request()->routeIs('jurusan*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Jurusan</a>
                
                <!-- Dropdown Profil -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') || request()->routeIs('staff') || request()->routeIs('seragam') || request()->routeIs('album') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors flex items-center gap-1 py-4">
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
                        <a href="{{ route('staff') }}" class="block px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Guru & Staff</a>
                        <a href="{{ route('seragam') }}" class="block px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Seragam</a>
                        <a href="{{ route('album') }}" class="block px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Album</a>
                    </div>
                </div>
                <a href="{{ route('facilities') }}" class="{{ request()->routeIs('facilities') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Fasilitas</a>
                <a href="{{ route('news') }}" class="{{ request()->routeIs('news*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Berita</a>
                <a href="{{ route('extracurriculars.index') }}" class="{{ request()->routeIs('extracurriculars*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Ekstrakurikuler</a>
                <a href="{{ route('mitra') }}" class="{{ request()->routeIs('mitra') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Mitra</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Kontak</a>
                <a href="{{ route('enrollment.guide') }}" class="{{ request()->routeIs('enrollment.guide') || request()->routeIs('registration') ? 'bg-blue-600 shadow-blue-200' : 'bg-[#0F172A]' }} text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition-all shadow-sm">Pendaftaran</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 hover:text-blue-600 outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Container -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden bg-white border-b border-gray-100 py-4 px-4 space-y-2">
        <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Home</a>
        <a href="{{ route('jurusan') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('jurusan*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Jurusan</a>
        
        <div x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('profile') || request()->routeIs('staff') || request()->routeIs('seragam') || request()->routeIs('album') ? 'text-blue-600' : 'text-gray-700' }}">
                <span>Profil Sekolah</span>
                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" class="ml-4 space-y-1">
                <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 border-l border-gray-100">Guru & Staff</a>
                <a href="{{ route('seragam') }}" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 border-l border-gray-100">Seragam</a>
                <a href="{{ route('album') }}" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 border-l border-gray-100">Album</a>
            </div>
        </div>

        <a href="{{ route('facilities') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('facilities') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Fasilitas</a>
        <a href="{{ route('news') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('news*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Berita</a>
        <a href="{{ route('extracurriculars.index') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('extracurriculars*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Ekstrakurikuler</a>
        <a href="{{ route('mitra') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('mitra') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Mitra</a>
        <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl text-base font-semibold {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">Kontak</a>
        <div class="pt-4 px-4">
            <a href="{{ route('enrollment.guide') }}" class="block w-full py-4 bg-blue-600 text-white text-center rounded-2xl font-bold transition-all shadow-lg shadow-blue-200">Daftar Sekarang</a>
        </div>
    </div>
</nav>
