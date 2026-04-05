<?php $__env->startSection('title', 'Pendaftaran Berhasil - SMKS Mahaputra'); ?>

<?php $__env->startSection('content'); ?>
<section class="min-h-screen bg-[#0F172A] flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Abstract Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-600/10 blur-[100px] rounded-full -translate-x-1/2 translate-y-1/2"></div>

    <div class="max-w-lg w-full relative z-10 animate-in fade-in zoom-in duration-500">
        <!-- Close/Back to Extracurriculars Button -->
        <a href="<?php echo e(route('extracurriculars.index')); ?>" class="absolute top-6 right-6 w-12 h-12 bg-gray-50 text-gray-400 hover:bg-gray-100 hover:text-[#0F172A] rounded-full flex items-center justify-center transition-all z-20 group" title="Tutup">
            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
        </a>

        <!-- Success Card -->
        <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden relative">
            <!-- Header with Icon -->
            <div class="h-48 bg-gradient-to-b from-blue-50 to-white flex items-center justify-center relative">
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 20px 20px;"></div>
                <div class="relative">
                    <div class="w-28 h-28 bg-white rounded-full flex items-center justify-center shadow-2xl relative z-10 border border-gray-50 scale-110">
                        <div class="w-20 h-20 bg-gradient-to-tr from-yellow-400 to-orange-300 rounded-full flex items-center justify-center text-white shadow-inner">
                            <svg class="w-10 h-10 drop-shadow-lg" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2H6c-1.1 0-2 .9-2 2v1c0 2.55 1.92 4.63 4.39 4.94A5.01 5.01 0 0011 13.9V17H8v2h8v-2h-3v-3.1c1.94-.48 3.42-2.11 3.42-4.06 0-.29-.02-.58-.06-.86C18.83 8.04 20 6.66 20 5V4c0-1.1-.9-2-2-2zM6 7V4h2v3c0 .55-.45 1-1 1s-1-.45-1-1zm12 0c0 .55-.45 1-1 1s-1-.45-1-1V4h2v3z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-10 pt-0 space-y-8 text-center">
                <div class="space-y-3">
                    <h1 class="text-3xl font-black text-[#0F172A] leading-tight">Selamat! Kamu <br>Resmi Terdaftar!</h1>
                    <p class="text-gray-500 text-sm leading-relaxed">Ayo bergabung dengan <span class="text-blue-600 font-black">Basket Mahaputra</span> dan kembangkan bakatmu!</p>
                </div>

                <!-- Training Schedule Highlight -->
                <div class="bg-blue-50/50 rounded-3xl p-6 border border-blue-100/50 flex items-center gap-6 group transition-all duration-500">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-blue-200 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="text-left space-y-1">
                        <p class="text-[10px] font-black text-blue-400 uppercase tracking-[0.2em] leading-none">Jadwal Latihan Perdana</p>
                        <p class="text-lg font-black text-[#0F172A]">Sabtu, 08:00 WIB</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4 pt-4">
                    <button onclick="window.location.href='<?php echo e(route('home')); ?>'" class="w-full py-5 bg-blue-50 text-blue-600 rounded-[2rem] font-black text-lg hover:bg-blue-100 transition-all uppercase">
                        Kembali ke Beranda
                    </button>
                    <button onclick="window.location.href='<?php echo e(route('extracurriculars.index')); ?>'" class="w-full py-5 bg-gray-50 text-[#0F172A] rounded-[2rem] font-black text-lg hover:bg-gray-100 transition-all uppercase">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Bottom Hint -->
        <p class="text-center mt-10 text-gray-400 text-[10px] font-bold uppercase tracking-widest opacity-50 shrink-0">Konfirmasi pendaftaran telah dikirim ke Email Anda</p>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/extracurriculars/registration_success.blade.php ENDPATH**/ ?>