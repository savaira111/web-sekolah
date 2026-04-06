
<?php $__env->startSection('title', 'Artikel & Berita - Admin Mahput'); ?>

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
async function togglePublish(articleId, currentStatus, publishUrl, csrfToken) {
    const action = currentStatus ? 'ubah ke Draft' : 'terbitkan';

    Swal.fire({
        title: currentStatus ? 'Ubah ke Draft?' : 'Terbitkan Artikel?',
        text: `Anda yakin ingin ${action} artikel ini?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: currentStatus ? '#F59E0B' : '#3B82F6',
        cancelButtonColor: '#6B7280',
        confirmButtonText: currentStatus ? 'Ya, Jadikan Draft' : 'Ya, Terbitkan!',
        cancelButtonText: 'Batal',
        borderRadius: '16px',
    }).then(async (result) => {
        if (result.isConfirmed) {
            Swal.fire({ title: 'Memproses...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
            try {
                const response = await fetch(publishUrl, {
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
<div class="px-8 pb-8 flex-1 w-full overflow-x-auto">
    
    <div class="flex items-center gap-2 mt-8 mb-6 text-[13px] font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">
        <a href="/superadmin/dashboard" class="hover:text-blue-600 transition-colors">Dashboard</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="font-bold" :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'">Manajemen Artikel</span>
    </div>

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8 mt-2">
        <div class="max-w-xl">
            <h2 class="text-[32px] font-extrabold tracking-tight transition-colors duration-300 mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Artikel & Berita</h2>
            <p class="text-[15px] font-medium transition-colors duration-300 leading-relaxed" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola dan publikasikan berita resmi sekolah serta artikel komunikasi.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-4">
            
            <div class="flex items-center p-1.5 rounded-full border transition-colors duration-300 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-200'">
                <a href="<?php echo e(request()->fullUrlWithQuery(['filter' => 'all', 'page' => null])); ?>"
                   class="px-5 py-2 rounded-full text-sm font-bold transition-all"
                   :class="$store.theme.darkMode ? '<?php echo e($filter === 'all' ? 'bg-black/20 text-white shadow' : 'text-gray-400 hover:text-white'); ?>' : '<?php echo e($filter === 'all' ? 'bg-gray-900 text-white shadow' : 'text-gray-600 hover:text-gray-900'); ?>'">Semua</a>
                <a href="<?php echo e(request()->fullUrlWithQuery(['filter' => 'published', 'page' => null])); ?>"
                   class="px-5 py-2 rounded-full text-sm font-bold transition-all"
                   :class="$store.theme.darkMode ? '<?php echo e($filter === 'published' ? 'bg-black/20 text-white shadow' : 'text-gray-400 hover:text-white'); ?>' : '<?php echo e($filter === 'published' ? 'bg-gray-900 text-white shadow' : 'text-gray-600 hover:text-gray-900'); ?>'">Terbit</a>
                <a href="<?php echo e(request()->fullUrlWithQuery(['filter' => 'draft', 'page' => null])); ?>"
                   class="px-5 py-2 rounded-full text-sm font-bold transition-all"
                   :class="$store.theme.darkMode ? '<?php echo e($filter === 'draft' ? 'bg-black/20 text-white shadow' : 'text-gray-400 hover:text-white'); ?>' : '<?php echo e($filter === 'draft' ? 'bg-gray-900 text-white shadow' : 'text-gray-600 hover:text-gray-900'); ?>'">Draft</a>
            </div>

            <a href="<?php echo e(route('superadmin.articles.create')); ?>" class="px-6 py-2.5 bg-[#3B82F6] hover:bg-[#2563EB] text-white text-sm font-bold rounded-full transition-all duration-300 shadow-lg shadow-blue-500/30 flex items-center justify-center gap-2 shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Buat Artikel
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-blue-500 text-white shadow-lg shadow-blue-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">TOTAL ARTIKEL</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e(number_format($total ?? 0)); ?></h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-emerald-500 text-white shadow-lg shadow-emerald-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">DITERBITKAN</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e(number_format($published ?? 0)); ?></h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-orange-500 text-white shadow-lg shadow-orange-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">DRAF</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e(number_format($drafts ?? 0)); ?></h3>
            </div>
        </div>

        <div class="rounded-[2rem] p-6 transition-all duration-300 flex items-center justify-center gap-5 shadow-sm hover:-translate-y-1 hover:shadow-xl" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center shrink-0 bg-purple-500 text-white shadow-lg shadow-purple-500/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            <div class="flex flex-col">
                <p class="text-[10px] font-extrabold tracking-widest uppercase mb-0.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">TOTAL DILIHAT</p>
                <h3 class="text-3xl font-black leading-none transition-colors duration-300 tracking-tight" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'"><?php echo e(number_format($views ?? 0)); ?></h3>
            </div>
        </div>
    </div>

    <div class="rounded-[2rem] p-6 lg:p-8 transition-colors duration-300 shadow-sm" :class="$store.theme.darkMode ? 'bg-[#111827] shadow-black/20' : 'bg-white shadow-gray-200/50'">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 pb-6 border-b transition-colors duration-300 gap-4" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <h3 class="text-xl font-black transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'">Postingan Terbaru</h3>
                <div class="flex items-center gap-3" x-data="{ catOpen: false }">
                    
                    <form action="<?php echo e(route('superadmin.articles.index')); ?>" method="GET" class="relative group">
                        <?php if(request('filter')): ?> <input type="hidden" name="filter" value="<?php echo e(request('filter')); ?>"> <?php endif; ?>
                        <?php if(request('category')): ?> <input type="hidden" name="category" value="<?php echo e(request('category')); ?>"> <?php endif; ?>
                        <?php if(request('sort')): ?> <input type="hidden" name="sort" value="<?php echo e(request('sort')); ?>"> <?php endif; ?>
                        <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Cari judul..." 
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
                            <?php echo e($category ? $category : 'Kategori'); ?>

                            <svg class="w-3 h-3 transition-transform" :class="catOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="catOpen" @click.outside="catOpen = false" x-cloak
                             class="absolute top-full left-0 mt-2 w-48 rounded-2xl shadow-xl border py-2 z-50"
                             :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-700' : 'bg-white border-gray-100'">
                            <a href="<?php echo e(request()->fullUrlWithQuery(['category' => null, 'page' => null])); ?>"
                               class="block px-4 py-2.5 text-[13px] font-semibold transition-colors <?php echo e(!$category ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50'); ?>">Semua Kategori</a>
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
            <p class="text-[13px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-400'">Menampilkan <?php echo e($articles->firstItem() ?? 0); ?>-<?php echo e($articles->lastItem() ?? 0); ?> dari <?php echo e(number_format($articles->total() ?? 0)); ?> artikel</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="border-b transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest pl-2 transition-colors duration-300 w-[30%]" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Judul Artikel</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Kategori</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Penulis</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Status</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Tanggal Dibuat</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Waktu Publish</th>
                        <th class="pb-4 text-[11px] font-extrabold uppercase tracking-widest text-right pr-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-[14px]">
                    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b last:border-0 transition-colors group" :class="$store.theme.darkMode ? 'border-gray-800 hover:bg-black/20/50' : 'border-gray-50 hover:bg-gray-50/50'">
                        <td class="py-5 transition-colors duration-300 pl-2">
                            <div class="flex items-center gap-4">
                                <?php if($article->featured_image): ?>
                                <div class="w-14 h-14 rounded-full overflow-hidden shrink-0 border-[3px]" :class="$store.theme.darkMode ? 'border-slate-700/50' : 'border-gray-100'">
                                    <img src="<?php echo e(asset('storage/' . $article->featured_image)); ?>" class="w-full h-full object-cover opacity-90" alt="<?php echo e($article->title); ?>">
                                </div>
                                <?php else: ?>
                                <div class="w-14 h-14 rounded-full overflow-hidden shrink-0 flex items-center justify-center border-[3px]" :class="$store.theme.darkMode ? 'border-slate-700/50 bg-black/20 text-blue-400' : 'border-gray-100 bg-[#EBF1FF] text-[#2563EB]'">
                                    <svg class="w-6 h-6 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <a href="<?php echo e(route('news.detail', $article->slug)); ?>" target="_blank" class="font-bold text-[15.5px] hover:text-blue-600 transition-colors duration-300 block mb-0.5 truncate max-w-[350px]" :class="$store.theme.darkMode ? 'text-white' : 'text-[#111827]'" title="<?php echo e($article->title); ?>"><?php echo e($article->title); ?></a>
                                    <p class="text-[13px] transition-colors duration-300 font-medium" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Diperbarui <?php echo e($article->updated_at->diffForHumans()); ?> • <?php echo e(number_format($article->views_count ?? 0)); ?> kali dilihat</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-5">
                            <span class="inline-block px-3 py-1 font-black text-[10px] rounded-full uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-blue-500/10 text-blue-400' : 'bg-[#EBF1FF] text-[#2563EB]'"><?php echo e($article->category); ?></span>
                        </td>
                        <td class="py-5">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-xl overflow-hidden shrink-0" :class="$store.theme.darkMode ? 'bg-gray-700' : 'bg-gray-100'">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($article->author->name ?? 'User')); ?>&background=DBEAFE&color=1d4ed8&size=64" alt="Avatar" class="w-full h-full object-cover">
                                </div>
                                <span class="text-[13px] font-semibold whitespace-nowrap" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-700'"><?php echo e($article->author->name ?? 'Admin'); ?></span>
                            </div>
                        </td>
                        <td class="py-5">
                            <?php if($article->is_published): ?>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase" :class="$store.theme.darkMode ? 'bg-emerald-500/10 text-emerald-400' : 'bg-emerald-50 text-emerald-600'">
                                <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span> Terbit
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[11px] font-black tracking-wider uppercase" :class="$store.theme.darkMode ? 'bg-gray-700/60 text-gray-400' : 'bg-gray-100 text-gray-500'">
                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Draft
                            </span>
                            <?php endif; ?>
                        </td>

                        
                        <td class="py-5">
                            <p class="text-[13px] font-semibold whitespace-nowrap" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-700'">
                                <?php echo e($article->created_at->format('d M Y')); ?>

                            </p>
                            <p class="text-[11px] font-medium mt-0.5" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
                                <?php echo e($article->created_at->format('H:i')); ?> WIB
                            </p>
                        </td>

                        
                        <td class="py-5">
                            <?php if($article->published_at): ?>
                            <p class="text-[13px] font-semibold whitespace-nowrap text-emerald-500">
                                <?php echo e($article->published_at->format('d M Y')); ?>

                            </p>
                            <p class="text-[11px] font-medium mt-0.5" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
                                <?php echo e($article->published_at->format('H:i')); ?> WIB
                            </p>
                            <?php else: ?>
                            <p class="text-[12px] font-medium" :class="$store.theme.darkMode ? 'text-gray-600' : 'text-gray-300'">—</p>
                            <?php endif; ?>
                        </td>

                        
                        <td class="py-5 text-right pr-2">
                            <div class="flex items-center justify-end gap-2">

                                
                                <button
                                    onclick="togglePublish(<?php echo e($article->id); ?>, <?php echo e($article->is_published ? 'true' : 'false'); ?>, '<?php echo e(route('superadmin.articles.publish', $article->id)); ?>', '<?php echo e(csrf_token()); ?>')"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-bold border transition-all duration-200 hover:-translate-y-0.5"
                                    :class="$store.theme.darkMode ? '<?php echo e($article->is_published ? 'border-amber-600/40 text-amber-400 bg-amber-400/10 hover:bg-amber-400/20' : 'border-emerald-600/40 text-emerald-400 bg-emerald-400/10 hover:bg-emerald-400/20'); ?>' : '<?php echo e($article->is_published ? 'border-amber-200 text-amber-600 bg-amber-50 hover:bg-amber-100' : 'border-emerald-200 text-emerald-600 bg-emerald-50 hover:bg-emerald-100'); ?>'">
                                    <?php if($article->is_published): ?>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                    Unpublish
                                    <?php else: ?>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Publish
                                    <?php endif; ?>
                                </button>

                                
                                <?php if($article->is_published): ?>
                                <a href="<?php echo e(route('news.detail', $article->slug)); ?>"
                                    target="_blank"
                                    title="Lihat Detail"
                                    class="w-8 h-8 rounded-full border flex items-center justify-center transition-colors" :class="$store.theme.darkMode ? 'border-gray-700 text-purple-400 hover:bg-gray-800' : 'border-gray-200 text-purple-600 hover:bg-purple-50'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                                <?php endif; ?>

                                <a href="<?php echo e(route('superadmin.articles.edit', $article->id)); ?>" class="w-8 h-8 rounded-full border flex items-center justify-center transition-colors" :class="$store.theme.darkMode ? 'border-gray-700 text-blue-400 hover:bg-gray-800' : 'border-gray-200 text-blue-600 hover:bg-blue-50'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>

                                <button @click="isDeleteModalOpen = true; articleToDelete = <?php echo e($article->id); ?>" class="w-8 h-8 rounded-full border flex items-center justify-center transition-colors" :class="$store.theme.darkMode ? 'border-gray-700 text-red-400 hover:bg-gray-800' : 'border-gray-200 text-red-500 hover:bg-red-50'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="py-12 text-center transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                <p class="text-[14px] font-bold">Tidak ada artikel ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($articles->hasPages()): ?>
        <div class="mt-8 pt-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
            <?php if($articles->onFirstPage()): ?>
            <button disabled class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 opacity-50 cursor-not-allowed" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-500' : 'border-gray-200 text-gray-400'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Sebelumnya
            </button>
            <?php else: ?>
            <a href="<?php echo e($articles->previousPageUrl()); ?>" class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 hover:bg-gray-50" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-[#111827]'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Sebelumnya
            </a>
            <?php endif; ?>

            <div class="flex items-center gap-1.5 font-bold">
                <?php
                    $start = max($articles->currentPage() - 2, 1);
                    $end = min($articles->currentPage() + 2, $articles->lastPage());
                ?>
                
                <?php if($start > 1): ?>
                    <a href="<?php echo e($articles->url(1)); ?>" class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 hover:bg-gray-100" :class="$store.theme.darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-600'">1</a>
                    <?php if($start > 2): ?>
                        <span class="w-10 h-10 flex items-center justify-center" :class="$store.theme.darkMode ? 'text-gray-600' : 'text-gray-400'">...</span>
                    <?php endif; ?>
                <?php endif; ?>

                <?php $__currentLoopData = $articles->getUrlRange($start, $end); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $articles->currentPage()): ?>
                    <button class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 bg-[#111827] text-white" :class="$store.theme.darkMode ? 'bg-white text-[#0F172A]' : 'bg-[#111827] text-white'"><?php echo e($page); ?></button>
                    <?php else: ?>
                    <a href="<?php echo e($url); ?>" class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 hover:bg-gray-100" :class="$store.theme.darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-600'"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($end < $articles->lastPage()): ?>
                    <?php if($end < $articles->lastPage() - 1): ?>
                        <span class="w-10 h-10 flex items-center justify-center" :class="$store.theme.darkMode ? 'text-gray-600' : 'text-gray-400'">...</span>
                    <?php endif; ?>
                    <a href="<?php echo e($articles->url($articles->lastPage())); ?>" class="w-10 h-10 rounded-full flex items-center justify-center text-sm transition-colors duration-300 hover:bg-gray-100" :class="$store.theme.darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-600'"><?php echo e($articles->lastPage()); ?></a>
                <?php endif; ?>
            </div>

            <?php if($articles->hasMorePages()): ?>
            <a href="<?php echo e($articles->nextPageUrl()); ?>" class="px-5 py-2.5 rounded-full border text-sm font-bold flex items-center gap-2 transition-all duration-300 hover:bg-gray-50" :class="$store.theme.darkMode ? 'border-gray-700 text-gray-300 hover:bg-gray-800' : 'border-gray-200 text-[#111827]'">
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
                <h3 class="text-xl font-extrabold mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Konfirmasi Penghapusan</h3>
                <p class="text-sm font-medium" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan dan semua data terkait akan hilang permanen.</p>
            </div>
                <div class="flex items-center gap-3">
                <button @click="isDeleteModalOpen = false; articleToDelete = null" type="button" class="flex-1 px-4 py-3 rounded-full text-sm font-bold shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md" :class="$store.theme.darkMode ? 'text-gray-300 bg-[#334155] hover:bg-[#475569]' : 'text-gray-700 bg-gray-100 hover:bg-gray-200'">Batal</button>
                <form :action="'/superadmin/articles/' + articleToDelete" method="POST" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="w-full px-4 py-3 rounded-full text-white text-sm font-bold bg-red-500 hover:bg-red-600 transition-colors duration-300 shadow-lg shadow-red-500/20">Ya, Hapus Artikel</button>
                </form>
            </div>
        </div>
    </div>

    <div x-show="isSuccessModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="isSuccessModalOpen = false"></div>
        <div class="relative w-full max-w-sm rounded-2xl p-6 shadow-2xl transition-all duration-300 transform" :class="$store.theme.darkMode ? 'bg-[#111827] border border-gray-800' : 'bg-white shadow-xl'" x-init="$watch('isSuccessModalOpen', value => { if(value) setTimeout(() => isSuccessModalOpen = false, 3000) })">
            <div class="w-12 h-12 rounded-full bg-emerald-100/10 flex items-center justify-center mb-4 border-2 border-emerald-500/20 mx-auto">
                <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <div class="text-center">
                <h3 class="text-lg font-extrabold mb-1" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Berhasil!</h3>
                <p class="text-sm font-medium" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Data artikel telah berhasil dihapus dari sistem.</p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.superadmin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/superadmin/articles/index.blade.php ENDPATH**/ ?>