<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'SMKS Mahaputra Cerdas Utama'); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-mahaputra.jpg')); ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts and Styles -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        /* Page Transition CSS */
        body.page-transition {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1), transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        body.page-loaded {
            opacity: 1;
            transform: none;
        }
        body.page-exit {
            opacity: 0;
            transform: translateY(-20px);
        }

        /* Scroll Reveal Animations */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0) translateX(0) scale(1);
            pointer-events: auto;
        }

        .reveal-left {
            transform: translateX(-50px);
        }

        .reveal-right {
            transform: translateX(50px);
        }

        .reveal-scale {
            transform: scale(0.9);
        }

        .reveal-left.active, .reveal-right.active {
            transform: translateX(0);
        }

        .reveal-scale.active {
            transform: scale(1);
        }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900 overflow-x-hidden page-transition">
    <?php echo $__env->make('layouts.chatbot', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Page Transition Script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Trigger entrance animation
            setTimeout(() => {
                document.body.classList.add('page-loaded');
            }, 50);
            
            // Intercept internal links for exit animation
            const links = document.querySelectorAll('a[href]');
            links.forEach(link => {
                link.addEventListener('click', e => {
                    const href = link.getAttribute('href');
                    
                    // Allow normal behavior for external links, anchors, downloads, new tabs, etc.
                    if (
                        link.target === '_blank' || 
                        href.startsWith('#') || 
                        href.startsWith('mailto:') || 
                        href.startsWith('tel:') || 
                        href.startsWith('javascript:') ||
                        link.hasAttribute('download') ||
                        link.hostname !== window.location.hostname ||
                        e.ctrlKey || e.metaKey || e.shiftKey || e.altKey
                    ) return;

                    // Prevent default navigation
                    e.preventDefault();
                    
                    // Trigger exit animation
                    document.body.classList.remove('page-loaded');
                    document.body.classList.add('page-exit');
                    
                    // Navigate after animation completes
                    setTimeout(() => {
                        window.location.href = href;
                    }, 400); // slightly less than CSS transition duration
                });
            });
        });

        // Scroll Reveal Implementation
        document.addEventListener("DOMContentLoaded", () => {
            const revealElements = document.querySelectorAll('.reveal');
            
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    } else {
                        // Remove active class when element is out of view to re-trigger animation
                        // Only if we want it to repeat. User asked for "saat scroll keatas dan bawah"
                        entry.target.classList.remove('active');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -20px 0px'
            });

            revealElements.forEach(el => revealObserver.observe(el));
        });

        // Restore state if navigating back via browser history
        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                document.body.classList.remove('page-exit');
                document.body.classList.add('page-loaded');
            }
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\web-sekolah\resources\views/layouts/app.blade.php ENDPATH**/ ?>