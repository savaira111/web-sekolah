<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SMKS Mahaputra Cerdas Utama')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-mahaputra.jpg') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts and Styles -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
            transform: translateY(0);
        }
        body.page-exit {
            opacity: 0;
            transform: translateY(-20px);
        }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900 overflow-x-hidden page-transition">
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

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

        // Restore state if navigating back via browser history
        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                document.body.classList.remove('page-exit');
                document.body.classList.add('page-loaded');
            }
        });
    </script>
</body>
</html>
