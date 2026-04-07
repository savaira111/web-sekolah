<?php $__env->startSection('title', 'Mitra Industri - Admin Mahput'); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php if(session('success')): ?>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '<?php echo e(session('success')); ?>',
        confirmButtonColor: '#3B82F6',
        timer: 3000,
        timerProgressBar: true,
    });
});
<?php endif; ?>

async function toggleStatus(partnerId, currentStatus, toggleUrl, csrfToken) {
    const action = currentStatus ? 'nonaktifkan' : 'aktifkan';

    Swal.fire({
        title: currentStatus ? 'Nonaktifkan Mitra?' : 'Aktifkan Mitra?',
        text: `Anda yakin ingin ${action} mitra ini?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: currentStatus ? '#F59E0B' : '#3B82F6',
        cancelButtonColor: '#6B7280',
        confirmButtonText: currentStatus ? 'Ya, Nonaktifkan' : 'Ya, Aktifkan!',
        cancelButtonText: 'Batal',
    }).then(async (result) => {
        if (result.isConfirmed) {
            Swal.fire({ title: 'Memproses...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
            try {
                const response = await fetch(toggleUrl, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                });
                const data = await response.json();
                if (data.success) {
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message, confirmButtonColor: '#3B82F6' })
                        .then(() => window.location.reload());
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal', text: 'Terjadi kesalahan.' });
                }
            } catch (e) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Koneksi bermasalah.' });
            }
        }
    });
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="p-8 -mt-2 flex-1 w-full overflow-x-auto" x-data="{ isDeleteModalOpen: false, partnerToDelete: null }">
    
    <div class="flex items-center gap-2 mb-6 text-[13px] font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">
        <a href="/superadmin/dashboard" class="hover:text-blue-600 transition-colors">Dashboard</a>
        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="font-bold whitespace-nowrap" :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'">Manajemen Mitra</span>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8 mt-2">
        <div class="max-w-xl">
            <h2 class="text-[32px] font-extrabold tracking-tight transition-colors duration-300 mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Mitra Industri</h2>
            <p class="text-[15px] font-medium transition-colors duration-300 leading-relaxed" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola daftar mitra industri dan institusi yang bekerja sama dengan sekolah.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-4">
            
            <div class="flex items-center p-1.5 rounded-full border transition-colors duration-300 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <a href="<?php echo e(request()->fullUrlWithQuery(['filter' => 'all', 'page' => null])); ?>"
                   class="px-5 py-2 rounded-full text-sm font-bold transition-all"
                   :class="$store.theme.darkMode ? '<?php echo e($filter === 'all' ? 'bg-black/20 text-white shadow' : 'text-gray-400 hover:text-white'); ?>' : '<?php echo e($filter === 'all' ? 'bg-gray-900 text-white shadow' : 'text-gray-600 hover:text-gray-900'); ?>'">Semua</a>
                <a href="<?php echo e(request()->fullUrlWithQuery(['filter' => 'active', 'page' => null])); ?>"
                   class="px-5 py-2 rounded-full text-sm font-bold transition-all"
                   :class="$store.theme.darkMode ? '<?php echo e($filter === 'active' ? 'bg-black/20 text-white shadow' : 'text-gray-400 hover:text-white'); ?>' : '<?php echo e($filter === 'active' ? 'bg-gray-900 text-white shadow' : 'text-gray-600 hover:text-gray-900'); ?>'">Aktif</a>
                <a href="<?php echo e(request()->fullUrlWithQuery(['filter' => 'inactive', 'page' => null])); ?>"
                   class="px-5 py-2 rounded-full text-sm font-bold transition-all"
                   :class="$store.theme.darkMode ? '<?php echo e($filter === 'inactive' ? 'bg-black/20 text-white shadow' : 'text-gray-400 hover:text-white'); ?>' : '<?php echo e($filter === 'inactive' ? 'bg-gray-900 text-white shadow' : 'text-gray-600 hover:text-gray-900'); ?>'">Nonaktif</a>
            </div>

            <a href="<?php echo e(route('superadmin.partners.create')); ?>" class="px-6 py-2.5 bg-[#3B82F6] hover:bg-[#2563EB] text-white text-sm font-bold rounded-full transition-all duration-300 shadow-lg shadow-blue-500/30 flex items-center justify-center gap-2 shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Mitra
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-blue-500 text-white shadow-lg shadow-blue-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">TOTAL MITRA</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e(number_format($total ?? 0)); ?></h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-emerald-500 text-white shadow-lg shadow-emerald-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">AKTIF</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e(number_format($active ?? 0)); ?></h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-red-500 text-white shadow-lg shadow-red-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">NONAKTIF</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e(number_format($inactive ?? 0)); ?></h3>
            </div>
        </div>
    </div>

    <div class="rounded-[2rem] p-6 lg:p-8 transition-colors duration-300 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 pb-6 border-b transition-colors duration-300 gap-4" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <h3 class="text-xl font-black transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Daftar Mitra</h3>
                <div class="flex items-center gap-3" x-data="{ catOpen: false }">
                    
                    <form action="<?php echo e(route('superadmin.partners.index')); ?>" method="GET" class="relative group">
                        <?php if(request('filter')): ?> <input type="hidden" name="filter" value="<?php echo e(request('filter')); ?>"> <?php endif; ?>
                        <?php if(request('category')): ?> <input type="hidden" name="category" value="<?php echo e(request('category')); ?>"> <?php endif; ?>
                        <?php if(request('sort')): ?> <input type="hidden" name="sort" value="<?php echo e(request('sort')); ?>"> <?php endif; ?>
                        <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari nama mitra..." 
                               class="pl-10 pr-4 py-2.5 rounded-full text-[13.5px] font-bold border transition-all duration-300 shadow-sm focus:ring-2 focus:ring-blue-100 min-w-[200px]" 
                               :class="$store.theme.darkMode ? 'bg-[#0F172A] border-gray-800 text-white placeholder-gray-600' : 'bg-gray-50 border-gray-200 text-gray-700 placeholder-gray-400 focus:bg-white'">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </form>

                    
                    <div class="relative">
                        <button @click="catOpen = !catOpen" class="px-5 py-2.5 rounded-full text-[13.5px] font-bold flex items-center gap-2.5 transition-all duration-300 shadow-sm border hover:shadow hover:-translate-y-0.5" :class="$store.theme.darkMode ? 'bg-[#111827] text-gray-300 border-gray-800 shadow-black/20' : 'bg-white text-gray-700 border-gray-200 hover:border-gray-300'">
                            <svg class="w-4 h-4" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            <?php echo e($category ? $category : 'Tipe Mitra'); ?>

                            <svg class="w-3 h-3 transition-transform" :class="catOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="catOpen" @click.outside="catOpen = false" x-cloak
                             class="absolute top-full left-0 mt-2 w-48 rounded-2xl shadow-xl border py-2 z-50"
                             :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-100'">
                            <a href="<?php echo e(request()->fullUrlWithQuery(['category' => null, 'page' => null])); ?>"
                               class="block px-4 py-2.5 text-[13px] font-semibold transition-colors <?php echo e(!$category ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50'); ?>">Semua Tipe</a>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(request()->fullUrlWithQuery(['category' => $cat, 'page' => null])); ?>"
                               class="block px-4 py-2.5 text-[13px] font-semibold transition-colors <?php echo e($category === $cat ? 'text-blue-600 bg-blue-50 font-bold' : 'text-gray-700 hover:bg-gray-50'); ?>"><?php echo e($cat); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <a href="<?php echo e(request()->fullUrlWithQuery(['sort' => $sort === 'newest' ? 'oldest' : 'newest', 'page' => null])); ?>"
                       class="px-5 py-2.5 rounded-full text-[13.5px] font-bold flex items-center gap-2.5 transition-all duration-300 shadow-sm border hover:shadow hover:-translate-y-0.5"
                       :class="$store.theme.darkMode ? 'bg-[#111827] text-gray-300 border-gray-800 shadow-black/20' : 'bg-white text-gray-700 border-gray-200 hover:border-gray-300'">
                        <svg class="w-4 h-4" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25"></path></svg>
                        <?php echo e($sort === 'oldest' ? 'Terlama' : 'Terbaru'); ?>

                    </a>
                </div>
            </div>
            <p class="text-[13px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">Menampilkan <?php echo e($partners->firstItem() ?? 0); ?>-<?php echo e($partners->lastItem() ?? 0); ?> dari <?php echo e(number_format($partners->total() ?? 0)); ?> mitra</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="border-b transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest pl-2 transition-colors duration-300 w-[30%]" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Nama Mitra</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Kategori</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Website</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Status</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Terdaftar</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest text-right pr-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-[14px]">
                    <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b last:border-0 transition-colors group" :class="$store.theme.darkMode ? 'border-gray-800 hover:bg-black/20/50' : 'border-gray-50 hover:bg-gray-50/50'">
                        <td class="py-5 transition-colors duration-300 pl-2">
                            <div class="flex items-center gap-4">
                                <?php if($partner->logo): ?>
                                <div class="w-14 h-14 rounded-xl overflow-hidden shrink-0 border-[3px] bg-white p-1" :class="$store.theme.darkMode ? 'border-slate-700/50' : 'border-gray-100'">
                                    <img src="<?php echo e(asset('storage/' . $partner->logo)); ?>" class="w-full h-full object-contain" alt="<?php echo e($partner->name); ?>">
                                </div>
                                <?php else: ?>
                                <div class="w-14 h-14 rounded-xl overflow-hidden shrink-0 flex items-center justify-center border-[3px]" :class="$store.theme.darkMode ? 'border-slate-700/50 bg-black/20 text-blue-400' : 'border-gray-100 bg-[#EBF1FF] text-[#2563EB]'">
                                    <svg class="w-6 h-6 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <span class="font-bold text-[15.5px] block mb-0.5" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e($partner->name); ?></span>
                                    <p class="text-[13px] transition-colors duration-300 font-medium truncate max-w-[250px]" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'"><?php echo e(Str::limit($partner->description, 50)); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="py-5">
                            <span class="inline-block px-3 py-1 font-black text-[10px] rounded-full uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-indigo-500/10 text-indigo-400' : 'bg-indigo-50 text-indigo-600'"><?php echo e($partner->category); ?></span>
                        </td>
                        <td class="py-5">
                            <?php if($partner->website_url): ?>
                            <a href="<?php echo e($partner->website_url); ?>" target="_blank" class="text-[13px] font-semibold hover:text-blue-600 transition-colors flex items-center gap-1.5" :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-600'">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                Buka Link
                            </a>
                            <?php else: ?>
                            <span class="text-[13px] font-medium transition-colors" :class="$store.theme.darkMode ? 'text-gray-600' : 'text-gray-400'">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-5">
                            <?php if($partner->is_active): ?>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase" :class="$store.theme.darkMode ? 'bg-emerald-500/10 text-emerald-400' : 'bg-emerald-50 text-emerald-600'">
                                <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span> Aktif
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase" :class="$store.theme.darkMode ? 'bg-gray-700/60 text-gray-400' : 'bg-gray-100 text-gray-500'">
                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Nonaktif
                            </span>
                            <?php endif; ?>
                        </td>

                        <td class="py-5">
                            <p class="text-[13px] font-semibold whitespace-nowrap" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-700'">
                                <?php echo e($partner->created_at->format('d M Y')); ?>

                            </p>
                        </td>

                        <td class="py-5 text-right pr-2">
                            <div class="flex items-center justify-end gap-2">
                                
                                <button
                                    onclick="toggleStatus(<?php echo e($partner->id); ?>, <?php echo e($partner->is_active ? 'true' : 'false'); ?>, '<?php echo e(route('superadmin.partners.toggle-status', $partner->id)); ?>', '<?php echo e(csrf_token()); ?>')"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-bold border transition-all duration-200 hover:-translate-y-0.5"
                                    :class="$store.theme.darkMode ? '<?php echo e($partner->is_active ? 'border-amber-600/40 text-amber-400 bg-amber-400/10 hover:bg-amber-400/20' : 'border-emerald-600/40 text-emerald-400 bg-emerald-400/10 hover:bg-emerald-400/20'); ?>' : '<?php echo e($partner->is_active ? 'border-amber-200 text-amber-600 bg-amber-50 hover:bg-amber-100' : 'border-emerald-200 text-emerald-600 bg-emerald-50 hover:bg-emerald-100'); ?>'">
                                    <?php if($partner->is_active): ?>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                    Nonaktifkan
                                    <?php else: ?>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Aktifkan
                                    <?php endif; ?>
                                </button>

                                <a href="<?php echo e(route('superadmin.partners.edit', $partner->id)); ?>" class="w-8 h-8 rounded-full border flex items-center justify-center transition-colors" :class="$store.theme.darkMode ? 'border-gray-700 text-blue-400 hover:bg-gray-800' : 'border-gray-200 text-blue-600 hover:bg-blue-50'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>

                                <button @click="isDeleteModalOpen = true; partnerToDelete = <?php echo e($partner->id); ?>" class="w-8 h-8 rounded-full border flex items-center justify-center transition-colors" :class="$store.theme.darkMode ? 'border-gray-700 text-red-400 hover:bg-gray-800' : 'border-gray-200 text-red-500 hover:bg-red-50'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="py-12 text-center transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                <p class="text-[14px] font-bold">Tidak ada mitra ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($partners->hasPages()): ?>
        <div class="mt-8 pt-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
            <?php if($partners->onFirstPage()): ?>
            <button disabled class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 opacity-50 cursor-not-allowed" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-500' : 'border-gray-200 text-gray-400'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Sebelumnya
            </button>
            <?php else: ?>
            <a href="<?php echo e($partners->previousPageUrl()); ?>" class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 hover:bg-gray-50" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-[#111827]'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Sebelumnya
            </a>
            <?php endif; ?>

            <div class="flex items-center gap-1.5 font-bold">
                <?php $__currentLoopData = $partners->getUrlRange(1, $partners->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $partners->currentPage()): ?>
                    <button class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 bg-[#111827] text-white" :class="$store.theme.darkMode ? 'bg-white text-[#0F172A]' : 'bg-[#111827] text-white'"><?php echo e($page); ?></button>
                    <?php else: ?>
                    <a href="<?php echo e($url); ?>" class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 hover:bg-gray-100" :class="$store.theme.darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-600'"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($partners->hasMorePages()): ?>
            <a href="<?php echo e($partners->nextPageUrl()); ?>" class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 hover:bg-gray-50" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-[#111827]'">
                Berikutnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            <?php else: ?>
            <button disabled class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 opacity-50 cursor-not-allowed" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-500' : 'border-gray-200 text-gray-400'">
                Berikutnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    
    <div x-show="isDeleteModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="isDeleteModalOpen = false"></div>
        <div class="relative w-full max-w-md rounded-2xl p-6 md:p-8 shadow-2xl transition-all duration-300 transform" :class="$store.theme.darkMode ? 'bg-[#111827] border border-gray-800' : 'bg-white shadow-xl'">
            <div class="w-12 h-12 rounded-full bg-red-100/10 flex items-center justify-center mb-6 border-2 border-red-500/20 mx-auto">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            
            <div class="text-center mb-8">
                <h3 class="text-xl font-extrabold mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Hapus Mitra?</h3>
                <p class="text-sm font-medium" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Data mitra ini akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="flex items-center gap-3">
                <button @click="isDeleteModalOpen = false; partnerToDelete = null" type="button" class="flex-1 px-4 py-3 rounded-full text-sm font-bold shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md" :class="$store.theme.darkMode ? 'text-gray-300 bg-[#334155] hover:bg-[#475569]' : 'text-gray-700 bg-gray-100 hover:bg-gray-200'">Batal</button>
                <form :action="'/superadmin/partners/' + partnerToDelete" method="POST" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="w-full px-4 py-3 rounded-full text-white text-sm font-bold bg-red-500 hover:bg-red-600 transition-colors duration-300 shadow-lg shadow-red-500/20">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/superadmin/partners/index.blade.php ENDPATH**/ ?>