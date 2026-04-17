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

    <!-- Global CountUp Animation (re-triggers on scroll up & down) -->
    <script>
        function animateCounter(el) {
            if (el._counterRunning) return;
            el._counterRunning = true;

            const target = parseFloat(el.getAttribute('data-to'));
            const append = el.getAttribute('data-append') || '';
            const duration = 1800;
            let startTime = null;

            function easeOutQuart(t) { return 1 - (--t) * t * t * t; }

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                const value = Math.floor(easeOutQuart(progress) * target);
                el.textContent = value + append;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                } else {
                    el.textContent = target + append;
                    el._counterRunning = false;
                }
            }
            window.requestAnimationFrame(step);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                    } else {
                        // Reset so it re-animates when scrolled back into view
                        entry.target._counterRunning = false;
                        const target = entry.target.getAttribute('data-to');
                        const append = entry.target.getAttribute('data-append') || '';
                        if (target) entry.target.textContent = target + append;
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));
        });
    </script>

    <!-- ClickSpark Animation -->
    <canvas id="click-spark-canvas" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 9999;"></canvas>
    <script>
        (function() {
            const canvas = document.getElementById('click-spark-canvas');
            const ctx = canvas.getContext('2d');
            let sparks = [];
            const sparkColor = '#3b82f6'; // Professional blue matching the theme
            const sparkSize = 10;
            const sparkRadius = 15;
            const sparkCount = 8;
            const duration = 400;
            const extraScale = 1.0;

            function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }

            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();

            function easeOut(t) {
                return t * (2 - t);
            }

            function draw(timestamp) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                sparks = sparks.filter(spark => {
                    const elapsed = timestamp - spark.startTime;
                    if (elapsed >= duration) return false;

                    const progress = elapsed / duration;
                    const eased = easeOut(progress);

                    const distance = eased * sparkRadius * extraScale;
                    const lineLength = sparkSize * (1 - eased);

                    const x1 = spark.x + distance * Math.cos(spark.angle);
                    const y1 = spark.y + distance * Math.sin(spark.angle);
                    const x2 = spark.x + (distance + lineLength) * Math.cos(spark.angle);
                    const y2 = spark.y + (distance + lineLength) * Math.sin(spark.angle);

                    ctx.strokeStyle = sparkColor;
                    ctx.lineWidth = 2;
                    ctx.lineCap = 'round';
                    ctx.beginPath();
                    ctx.moveTo(x1, y1);
                    ctx.lineTo(x2, y2);
                    ctx.stroke();

                    return true;
                });

                requestAnimationFrame(draw);
            }

            window.addEventListener('mousedown', (e) => {
                const now = performance.now();
                for (let i = 0; i < sparkCount; i++) {
                    sparks.push({
                        x: e.clientX,
                        y: e.clientY,
                        angle: (2 * Math.PI * i) / sparkCount,
                        startTime: now
                    });
                }
            });

            requestAnimationFrame(draw);
        })();
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\web-sekolah\resources\views/layouts/app.blade.php ENDPATH**/ ?>