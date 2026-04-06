<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Admin Mahput</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-mahaputra.jpg')); ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc; /* light modern background */
        }
        
        /* Custom Background gradient to match design edge soft shadows */
        .login-bg {
            background: radial-gradient(circle at top left, rgba(239, 246, 255, 1) 0%, rgba(248, 250, 252, 1) 50%, rgba(255, 247, 237, 0.5) 100%);
        }
    </style>
</head>
<body class="antialiased min-h-screen flex items-center justify-center p-4 login-bg" x-data="loginForm">

    <div class="max-w-[1000px] w-full bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row min-h-[600px]">
        
        <!-- Left Side: Image -->
        <div class="md:w-1/2 relative hidden md:block group">
            <img src="<?php echo e(asset('images/gedung-sekolah.jpg')); ?>" alt="Gedung Sekolah" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-blue-600/20 mix-blend-multiply group-hover:bg-blue-600/10 transition-all duration-500"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/40 to-transparent"></div>
            
            <div class="absolute bottom-10 left-10 right-10 z-10 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    </div>
                    <h2 class="text-white text-2xl font-bold tracking-tight">Admin Mahput</h2>
                </div>
                <p class="text-blue-50 text-sm leading-relaxed max-w-sm">
                    Mencetak generasi cerdas, berkarakter, dan siap menghadapi tantangan industri masa depan.
                </p>
                <div class="flex gap-2 pt-2">
                    <div class="w-8 h-1 bg-white rounded-full"></div>
                    <div class="w-4 h-1 bg-white/40 rounded-full"></div>
                    <div class="w-4 h-1 bg-white/40 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="md:w-1/2 p-10 lg:p-14 flex flex-col justify-center relative bg-white">
            <div class="max-w-md w-full mx-auto space-y-8">
                
                <!-- Header -->
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-[#0F172A] tracking-tight">Login Admin Mahput</h1>
                    <p class="text-gray-500 text-sm">Silakan masukkan kredensial Anda untuk mengakses portal siswa dan staf.</p>
                </div>

                <!-- Form -->
                <form action="<?php echo e(route('login.post')); ?>" method="POST" class="space-y-5">
                    <?php echo csrf_field(); ?>

                    <div class="space-y-1.5">
                        <label for="login" class="block text-xs font-bold text-gray-700">Username atau Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input type="text" id="login" name="login" class="block w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors bg-gray-50/50" placeholder="Masukkan Username atau Email" value="<?php echo e(old('login')); ?>" required>
                        </div>
                        <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-xs font-bold text-gray-700">Password</label>
                            <button type="button" @click="forgotPasswordOpen = true" class="text-xs font-bold text-blue-600 hover:text-blue-700 hover:underline">Lupa Password?</button>
                        </div>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" id="password" name="password" class="block w-full pl-11 pr-12 py-3 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors bg-gray-50/50" placeholder="Masukkan Password" required>
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                                <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <svg x-show="show" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center pt-2">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                        <label for="remember" class="ml-2 block text-xs text-gray-600 cursor-pointer">
                            Ingat saya di perangkat ini
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-[#007AFF] hover:bg-[#0066CC] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#007AFF] transition-all">
                            Masuk ke Akun &rarr;
                        </button>
                    </div>
                </form>


                <div class="text-center pt-4">
                    <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center text-xs font-bold text-gray-400 hover:text-gray-700 transition-colors">
                        &larr; <span class="ml-1">Kembali ke Beranda</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Copyright Footer -->
    <div class="fixed bottom-4 left-0 right-0 text-center">
        <p class="text-[10px] text-gray-400 font-medium">
            &copy; <?php echo e(date('Y')); ?> SMKS Mahaputra Cerdas Utama. All Rights Reserved.
        </p>
    </div>

    <!-- Forgot Password Modal -->
    <div x-show="forgotPasswordOpen" 
         class="fixed inset-0 z-[60] overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div x-show="forgotPasswordOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-slate-900/60 transition-opacity" 
                 aria-hidden="true" 
                 @click="forgotPasswordOpen = false"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal panel -->
            <div x-show="forgotPasswordOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="relative inline-block align-middle bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-md sm:w-full p-6 sm:p-10 z-[70]">
                
                <div x-show="!emailSent" class="relative">

                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                    
                    <div class="space-y-2 mb-8">
                        <h3 class="text-2xl font-bold text-gray-900" id="modal-title">Lupa Password?</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Jangan khawatir! Masukkan email Anda dan kami akan mengirimkan instruksi untuk buat password baru.</p>
                    </div>

                    <form @submit.prevent="simulateEmailSend" class="space-y-6">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Alamat Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-11-removed"></div> <!-- spacing handle via pl-11 below -->
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <input type="email" required class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium" placeholder="contoh@email.com">
                            </div>
                        </div>
                        
                        <div class="flex gap-3 pt-2">
                            <button type="button" @click="forgotPasswordOpen = false" class="flex-1 py-3.5 px-4 border border-gray-200 rounded-xl text-sm font-bold text-gray-600 bg-white hover:bg-gray-50 transition-all">
                                Batal
                            </button>
                            <button type="submit" class="flex-[2] flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-200 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition-all disabled:opacity-75">
                                <span x-show="!isSending">OK, Kirim Link</span>
                                <svg x-show="isSending" class="animate-spin h-5 w-5 text-white" style="display: none;" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Success State -->
                <div x-show="emailSent" style="display: none;" class="text-center py-4">
                    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-3xl bg-green-50 mb-6">
                        <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Email Terkirim!</h3>
                    <p class="text-sm text-gray-500 mb-10 leading-relaxed px-4">Silakan periksa kotak masuk email Anda dan klik tautan verifikasi untuk mengganti password baru.</p>
                    <button type="button" @click="forgotPasswordOpen = false; setTimeout(() => { emailSent = false }, 300)" class="w-full py-4 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-100 transition-all">
                        Kembali ke Login
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('loginForm', () => ({
                forgotPasswordOpen: false,
                emailSent: false,
                isSending: false,
                
                simulateEmailSend() {
                    this.isSending = true;
                    // Simulate network request
                    setTimeout(() => {
                        this.isSending = false;
                        this.emailSent = true;
                    }, 1500);
                }
            }))
        })
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\web-sekolah\resources\views/auth/login.blade.php ENDPATH**/ ?>