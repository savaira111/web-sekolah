<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin SMKS Mahaputra Cerdas Utama')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-mahaputra.jpg') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        .sidebar { background-color: #111827; border-color: #1F2937; }
        .sidebar-active { background-color: #3B82F6; color: white; }
        .sidebar-item { color: #9CA3AF; transition: all 0.3s; }
        .sidebar-item:hover { background-color: #1F2937; color: white; }

        /* Hide scrollbar for Chrome, Safari and Opera */
        *::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        * {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Page Transitions Management */
        .page-transition {
            animation: fadeInUp 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Prevent content flash during navigation */
        [x-cloak] { display: none !important; }
    </style>
    <script>
        // Set initial state to prevent flash
        const isDark = localStorage.getItem('darkMode') === 'true' || !('darkMode' in localStorage);
        if (isDark) {
            document.documentElement.classList.add('dark');
            document.documentElement.style.backgroundColor = '#000000';
        } else {
            document.documentElement.classList.remove('dark');
            document.documentElement.style.backgroundColor = '#FFFFFF';
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
      x-data 
      x-init="
        Alpine.store('theme', {
            darkMode: localStorage.getItem('darkMode') === 'true' || !('darkMode' in localStorage),
            sidebarOpen: true,
            init() {
                document.documentElement.classList.toggle('dark', this.darkMode);
                document.documentElement.style.backgroundColor = this.darkMode ? '#000000' : '#FFFFFF';
            },
            toggle() {
                this.darkMode = !this.darkMode;
                localStorage.setItem('darkMode', this.darkMode);
                document.documentElement.classList.toggle('dark', this.darkMode);
                document.documentElement.style.backgroundColor = this.darkMode ? '#000000' : '#FFFFFF';
            }
        });
      "
      :class="$store.theme.darkMode ? 'bg-black text-white' : 'bg-white text-black'">

    <!-- Sidebar Layout -->
    @include('layouts.superadmin.sidebar')

    <!-- Main Content Wrapper -->
    <main class="flex-1 flex flex-col h-full overflow-y-auto w-full transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#000000]' : 'bg-[#FFFFFF]'">
        
        <!-- Navbar Layout -->
        @include('layouts.superadmin.navbar')

        <!-- Dynamic Page Content with Transition Wrapper -->
        <div class="page-transition flex-1 flex flex-col w-full">
            @yield('content')
        </div>
        
    </main>

    <!-- Alpine Push Scripts (For modals etc) -->
    @stack('scripts')
</body>
</html>
