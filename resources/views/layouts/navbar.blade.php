<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo-mahaputra.jpg') }}" alt="Logo" class="h-14 w-auto">
                    <div class="flex flex-col">
                        <span class="font-bold text-lg text-[#0F172A] leading-tight leading-none">SMKS Mahaputra</span>
                        <span class="text-sm text-blue-600 font-semibold">Cerdas Utama</span>
                    </div>
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Home</a>
                <a href="{{ route('jurusan') }}" class="{{ request()->routeIs('jurusan*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Jurusan</a>
                <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Profil</a>
                <a href="{{ route('facilities') }}" class="{{ request()->routeIs('facilities') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Fasilitas</a>
                <a href="{{ route('news') }}" class="{{ request()->routeIs('news*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Berita</a>
                <a href="{{ route('extracurriculars') }}" class="{{ request()->routeIs('extracurriculars*') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Ekstrakurikuler</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-blue-600 font-bold' : 'text-gray-600 hover:text-blue-600' }} font-medium transition-colors">Kontak</a>
                <a href="{{ route('enrollment.guide') }}" class="{{ request()->routeIs('enrollment.guide') || request()->routeIs('registration') ? 'bg-blue-600 shadow-blue-200' : 'bg-[#0F172A]' }} text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition-all shadow-sm">Pendaftaran</a>
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
