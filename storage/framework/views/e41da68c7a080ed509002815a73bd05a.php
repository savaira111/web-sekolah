<?php $__env->startSection('title', 'Manajemen Album Foto - Admin Mahput'); ?>

<?php $__env->startSection('content'); ?>
 <div class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-8 mb-10 gap-4">
        <div>
            <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Manajemen Album Foto</h2>
            <p class="text-sm font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola galeri kegiatan dan dokumentasi sekolah Mahaputra.</p>
        </div>
        
        <a href="<?php echo e(route('superadmin.albums.create')); ?>" class="px-6 py-3 bg-[#3B82F6] text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-all duration-300 shadow-lg shadow-blue-500/25 flex items-center gap-2">
            <div class="w-5 h-5 rounded-full border-2 border-white flex items-center justify-center">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v12m6-6H6"></path></svg>
            </div>
            Tambah Album Baru
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="rounded-2xl p-4 shadow-sm border mb-8 flex flex-col md:flex-row items-center gap-4 transition-all duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
        <!-- Search Input -->
        <div class="relative flex-1 w-full">
            <input type="text" x-model="searchQuery" placeholder="Cari album kegiatan..." class="w-full pl-12 pr-4 py-3 rounded-xl text-sm border-none transition-all outline-none" :class="$store.theme.darkMode ? 'bg-[#000000] text-white placeholder-gray-500' : 'bg-gray-50 text-gray-900 placeholder-gray-400'">
            <svg class="w-5 h-5 absolute left-4 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <!-- Category Dropdown -->
            <div class="relative flex-1 md:w-48">
                <button class="w-full px-4 py-3 rounded-xl text-sm font-bold flex items-center justify-between border-none transition-all outline-none" :class="$store.theme.darkMode ? 'bg-[#000000] text-gray-300' : 'bg-gray-50 text-gray-700'">
                    <span x-text="currentCategory"></span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
            </div>

            <!-- Filter Settings Icon -->
            <button class="p-3 rounded-xl transition-colors" :class="$store.theme.darkMode ? 'bg-[#000000] hover:bg-gray-800 text-gray-400' : 'bg-gray-50 text-gray-500'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M3 8h18M3 12H13M3 16H13M3 20H13"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Album Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
        <?php $__empty_1 = true; $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div x-data="{ visible: <?php echo e($album->is_visible ? 'true' : 'false'); ?> }" class="group rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border flex flex-col" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100'">
                <!-- Album Thumbnail -->
                <div class="h-56 relative overflow-hidden">
                    <?php if($album->photos->isNotEmpty()): ?>
                        <img src="<?php echo e(asset('storage/' . $album->photos->first()->path)); ?>" alt="<?php echo e($album->title); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <?php else: ?>
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-500"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest shadow-sm bg-blue-100 text-blue-700"><?php echo e($album->category); ?></span>
                    </div>

                    <!-- Visibility Toggle -->
                    <div class="absolute top-4 right-4">
                        <button @click="visible = !visible; fetch('<?php echo e(route('superadmin.albums.toggle', $album)); ?>', { method: 'POST', headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' } })"
                                class="w-10 h-10 rounded-full flex items-center justify-center backdrop-blur-md transition-all duration-300"
                                :class="visible ? 'bg-emerald-500 text-white shadow-lg' : 'bg-gray-200/50 text-gray-500'">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path x-show="visible" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path x-show="visible" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                <path x-show="!visible" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.04m2.458-2.392A10.014 10.014 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.017 10.017 0 01-1.328 2.965m-3.172 3.172A4 4 0 008.828 8.828M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 9l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-6">
                    <h3 class="text-lg font-extrabold mb-4 transition-colors duration-300 line-clamp-1" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'"><?php echo e($album->title); ?></h3>
                    
                    <div class="flex items-center justify-between text-gray-400 mb-6 font-semibold">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs"><?php echo e(\Carbon\Carbon::parse($album->event_date)->translatedFormat('d F Y')); ?></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs"><?php echo e($album->photos->count()); ?> Foto</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a :href="visible ? '<?php echo e(route('album.show', $album)); ?>' : '<?php echo e(route('superadmin.albums.show', $album)); ?>'" 
                           :target="visible ? '_blank' : '_self'"
                           class="flex-1 py-2 rounded-xl bg-gray-100 text-gray-700 text-center text-xs font-black hover:bg-gray-200 transition-colors" 
                           :class="$store.theme.darkMode ? 'bg-gray-800 text-gray-200 hover:bg-gray-700' : ''">DETAIL</a>
                        <a href="<?php echo e(route('superadmin.albums.edit', $album)); ?>" class="flex-1 py-2 rounded-xl bg-blue-50 text-blue-600 text-center text-xs font-black hover:bg-blue-100 transition-colors" :class="$store.theme.darkMode ? 'bg-blue-500/10 text-blue-400 hover:bg-blue-500/20' : ''">EDIT</a>
                        <form id="delete-form-<?php echo e($album->id); ?>" action="<?php echo e(route('superadmin.albums.destroy', $album)); ?>" method="POST" class="flex">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="button" @click="confirmDelete(<?php echo e($album->id); ?>)" class="w-8 h-8 rounded-lg flex items-center justify-center text-red-500 hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full py-20 flex flex-col items-center justify-center text-center">
                <div class="w-20 h-20 rounded-full bg-gray-50 flex items-center justify-center mb-6 shadow-inner" :class="$store.theme.darkMode ? 'bg-gray-800' : 'bg-gray-50'">
                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold mb-2" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Belum ada album</h3>
                <p class="text-gray-400 font-medium">Mulai buat album kegiatan untuk dokumentasi sekolah.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination Footer -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-6 py-6 border-t" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
        <p class="text-sm font-bold text-gray-400 transition-colors duration-300">
            Menampilkan <span :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">1-4</span> dari <span :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">24</span> album
        </p>

        <div class="flex items-center gap-2">
            <button class="w-10 h-10 rounded-xl flex items-center justify-center border transition-all hover:bg-gray-50" :class="$store.theme.darkMode ? 'border-gray-800 hover:bg-gray-800 text-gray-500' : 'border-gray-100 hover:bg-gray-50 text-gray-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black bg-[#3B82F6] text-white shadow-lg shadow-blue-500/30">1</button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black hover:bg-gray-50 transition-all" :class="$store.theme.darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-500 hover:bg-gray-50'">2</button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black hover:bg-gray-50 transition-all" :class="$store.theme.darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-500 hover:bg-gray-50'">3</button>
            <span class="px-2 text-gray-300 font-bold">...</span>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-black hover:bg-gray-50 transition-all" :class="$store.theme.darkMode ? 'text-gray-400 hover:bg-gray-800' : 'text-gray-500 hover:bg-gray-50'">6</button>
            <button class="w-10 h-10 rounded-xl flex items-center justify-center border transition-all hover:bg-gray-50" :class="$store.theme.darkMode ? 'border-gray-800 hover:bg-gray-800 text-gray-500' : 'border-gray-100 hover:bg-gray-50 text-gray-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Album?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#94A3B8',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-[1.5rem]',
                confirmButton: 'rounded-xl px-6 py-3 font-bold',
                cancelButton: 'rounded-xl px-6 py-3 font-bold'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
<?php $__env->stopPush(); ?>
 


<?php echo $__env->make('layouts.superadmin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/superadmin/albums/index.blade.php ENDPATH**/ ?>