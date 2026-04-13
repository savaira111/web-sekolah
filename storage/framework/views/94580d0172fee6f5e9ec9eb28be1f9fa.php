<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Admin SMKS Mahaputra Cerdas Utama'); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-mahaputra.jpg')); ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
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
            sidebarOpen: window.innerWidth > 768,
            init() {
                document.documentElement.classList.toggle('dark', this.darkMode);
                document.documentElement.style.backgroundColor = this.darkMode ? '#000000' : '#FFFFFF';
                window.addEventListener('resize', () => {
                    if(window.innerWidth > 768) this.sidebarOpen = true;
                });
            },
            toggle() {
                this.darkMode = !this.darkMode;
                localStorage.setItem('darkMode', this.darkMode);
                document.documentElement.classList.toggle('dark', this.darkMode);
                document.documentElement.style.backgroundColor = this.darkMode ? '#000000' : '#FFFFFF';
            },
            toggleSidebar() {
                this.sidebarOpen = !this.sidebarOpen;
            }
        });
      "
      :class="$store.theme.darkMode ? 'bg-black text-white' : 'bg-white text-black'">

    <!-- Backdrop for Mobile -->
    <div x-show="$store.theme.sidebarOpen && window.innerWidth <= 768" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="$store.theme.toggleSidebar()"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 md:hidden">
    </div>

    <!-- Sidebar Layout -->
    <?php echo $__env->make('layouts.superadmin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Main Content Wrapper -->
    <main class="flex-1 flex flex-col h-full overflow-y-auto w-full relative" 
          style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;"
          :class="$store.theme.darkMode ? 'bg-[#000000]' : 'bg-[#FFFFFF]'">
        
        <!-- Navbar Layout -->
        <?php echo $__env->make('layouts.superadmin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Dynamic Page Content with Transition Wrapper -->
        <div class="page-transition flex-1 flex flex-col w-full px-4 md:px-0">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        
    </main>

    <!-- Alpine Push Scripts (For modals etc) -->
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\web-sekolah\resources\views/layouts/superadmin/app.blade.php ENDPATH**/ ?>