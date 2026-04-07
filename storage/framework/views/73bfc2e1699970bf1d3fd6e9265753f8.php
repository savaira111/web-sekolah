<?php $__env->startSection('title', 'Manajemen Testimoni PKL - Admin Mahput'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-8 -mt-2 flex-1 w-full" :class="$store.theme.darkMode ? '' : 'bg-[#F3F4F6]'">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'">
                Testimoni Siswa PKL
            </h1>
            <p class="mt-1 text-gray-500 max-w-2xl">
                Kelola cerita dan pengalaman siswa yang melakukan praktik kerja lapangan di instansi mitra.
            </p>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="rounded-3xl p-6 shadow-xl transition-all duration-300 group" :class="$store.theme.darkMode ? 'bg-[#111827]/50 border border-gray-800' : 'bg-white hover:shadow-2xl hover:-translate-y-1'">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-2xl bg-blue-500/10 text-blue-500 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total Mitra</span>
            </div>
            <div class="flex items-end justify-between">
                <div>
                    <p class="text-3xl font-black" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'"><?php echo e($partners->total()); ?></p>
                    <p class="text-xs text-gray-500 font-medium">Instansi Terdaftar</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="mb-8 rounded-3xl p-4 shadow-xl flex flex-col md:flex-row gap-4 items-center justify-between" :class="$store.theme.darkMode ? 'bg-[#111827]/50 border border-gray-800' : 'bg-white'">
        <form action="<?php echo e(route('superadmin.partners.testimonials')); ?>" method="GET" class="relative w-full md:w-96 group">
            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-blue-500 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" name="search" value="<?php echo e($search); ?>"
                   class="w-full pl-12 pr-4 py-3 rounded-2xl border transition-all duration-300 text-sm font-medium focus:ring-4 focus:ring-blue-500/10"
                   :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800 text-white focus:border-blue-500' : 'bg-gray-50 border-gray-100 focus:border-blue-400 focus:bg-white'"
                   placeholder="Cari mitra atau nama siswa...">
        </form>
    </div>

    <!-- Testimonials Table -->
    <div class="rounded-[2rem] shadow-2xl overflow-hidden transition-all duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border border-gray-800' : 'bg-white'">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b" :class="$store.theme.darkMode ? 'border-gray-800 bg-[#1e293b]/30' : 'border-gray-50 bg-gray-50/50'">
                        <th class="px-8 py-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest w-64">MITRA & LOKASI</th>
                        <th class="px-8 py-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest">TESTIMONI SISWA</th>
                        <th class="px-8 py-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y" :class="$store.theme.darkMode ? 'divide-gray-800' : 'divide-gray-50'">
                    <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="group transition-colors duration-200" :class="$store.theme.darkMode ? 'hover:bg-gray-800/20' : 'hover:bg-blue-50/30'">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-white p-2 shadow-sm border border-gray-100 shrink-0">
                                    <img src="<?php echo e($partner->logo ? asset('storage/' . $partner->logo) : asset('images/placeholder-logo.png')); ?>" alt="<?php echo e($partner->name); ?>" class="w-full h-full object-contain">
                                </div>
                                <div class="truncate">
                                    <h4 class="font-bold text-sm" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'"><?php echo e($partner->name); ?></h4>
                                    <p class="text-[10px] text-gray-400 font-medium mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        <?php echo e($partner->location ?? 'Lokasi belum diatur'); ?>

                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <?php if($partner->testimonial_text): ?>
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full overflow-hidden border border-gray-100 shrink-0">
                                            <img src="<?php echo e($partner->testimonial_author_photo ? asset('storage/' . $partner->testimonial_author_photo) : 'https://ui-avatars.com/api/?name='.urlencode($partner->testimonial_author).'&background=3B82F6&color=fff'); ?>" alt="<?php echo e($partner->testimonial_author); ?>" class="w-full h-full object-cover">
                                        </div>
                                        <div class="truncate">
                                            <p class="font-bold text-[11px]" :class="$store.theme.darkMode ? 'text-white' : 'text-slate-900'"><?php echo e($partner->testimonial_author); ?></p>
                                            <p class="text-[9px] text-gray-400 font-medium tracking-tight uppercase"><?php echo e($partner->testimonial_author_role); ?></p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed font-medium italic">"<?php echo e($partner->testimonial_text); ?>"</p>
                                </div>
                            <?php else: ?>
                                <div class="flex items-center gap-2 text-gray-300 italic group-hover:text-gray-400 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                    <p class="text-[10px] font-medium tracking-tight uppercase">Belum ada testimoni</p>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center justify-center gap-2">
                                <a href="<?php echo e(route('superadmin.partners.edit', $partner->id)); ?>" 
                                   class="p-2.5 rounded-xl bg-blue-500/10 text-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-300"
                                   title="Kelola Testimoni">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 rounded-full bg-gray-50 flex items-center justify-center mb-4 transition-transform hover:scale-110 duration-300">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Tidak ada data mitra ditemukan</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($partners->hasPages()): ?>
        <div class="px-8 py-6 border-t" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-50'">
            <?php echo e($partners->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/superadmin/partners/testimonials.blade.php ENDPATH**/ ?>