<?php $__env->startSection('title', 'Berita & Artikel - SMKS Mahaputra'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            KABAR MAHAPUTRA
        </div>
        <h1 class="text-4xl lg:text-5xl font-bold text-[#0F172A] leading-tight">
            Berita & <span class="text-blue-600">Artikel</span> Terbaru
        </h1>
        <p class="text-xl text-gray-500 max-w-3xl mx-auto leading-relaxed font-medium">
            Ikuti perkembangan terbaru, prestasi siswa, dan berbagai kegiatan edukatif di lingkungan SMKS Mahaputra Cerdas Utama.
        </p>
    </div>
</section>

<!-- Featured Article -->
<section class="pt-6 pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Category Filter -->
            <div class="flex flex-wrap gap-2 lg:gap-3" id="news-filters">
                <button onclick="filterNews('all')" class="filter-btn px-4 py-2 text-sm bg-blue-600 text-white shadow-lg shadow-blue-200 rounded-xl font-bold transition-all active-filter" data-filter="all">Semua</button>
                <button onclick="filterNews('Berita Sekolah')" class="filter-btn px-4 py-2 text-sm bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Berita Sekolah">Berita Sekolah</button>
                <button onclick="filterNews('Kegiatan')" class="filter-btn px-4 py-2 text-sm bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Kegiatan">Kegiatan</button>
                <button onclick="filterNews('Pengumuman')" class="filter-btn px-4 py-2 text-sm bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Pengumuman">Pengumuman</button>
                <button onclick="filterNews('Prestasi')" class="filter-btn px-4 py-2 text-sm bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Prestasi">Prestasi</button>
                <button onclick="filterNews('Akademik')" class="filter-btn px-4 py-2 text-sm bg-gray-100 text-gray-500 hover:bg-gray-200 rounded-xl font-bold transition-all" data-filter="Akademik">Akademik</button>
            </div>

            <?php if(request('search')): ?>
            <div class="p-6 bg-blue-50 border border-blue-100 rounded-3xl flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase">Hasil Pencarian</p>
                        <p class="text-xl font-bold text-[#0F172A]">"<?php echo e(request('search')); ?>"</p>
                    </div>
                </div>
                <a href="<?php echo e(route('news')); ?>" class="text-blue-600 font-bold hover:underline text-sm">Hapus Pencarian</a>
            </div>
            <?php endif; ?>

            <!-- News Grid -->
            <div class="grid md:grid-cols-2 gap-6" id="news-grid">
                <?php
                    $categoryColors = [
                        'Berita Sekolah' => 'bg-slate-600',
                        'Kegiatan' => 'bg-purple-600',
                        'Pengumuman' => 'bg-orange-600',
                        'Prestasi' => 'bg-blue-600',
                        'Akademik' => 'bg-green-600'
                    ];
                    $categoryBg = [
                        'Berita Sekolah' => 'bg-slate-50',
                        'Kegiatan' => 'bg-purple-50',
                        'Pengumuman' => 'bg-orange-50',
                        'Prestasi' => 'bg-blue-50',
                        'Akademik' => 'bg-green-50'
                    ];
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="news-card group space-y-4 transition-all duration-500" data-category="<?php echo e($article->category); ?>">
                    <div class="aspect-[4/3] rounded-[1.5rem] overflow-hidden relative">
                        <?php if($article->featured_image): ?>
                            <img src="<?php echo e(asset('storage/' . $article->featured_image)); ?>" alt="<?php echo e($article->title); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <?php else: ?>
                            <div class="w-full h-full <?php echo e($categoryBg[$article->category] ?? 'bg-gray-50'); ?> flex flex-col items-center justify-center p-6">
                                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg mb-4">
                                    <svg class="w-12 h-12 <?php echo e(str_replace('bg', 'text', $categoryColors[$article->category] ?? 'text-gray-600')); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            </div>
                        <?php endif; ?>
                        <span class="absolute top-6 left-6 px-4 py-2 <?php echo e($categoryColors[$article->category] ?? 'bg-gray-600'); ?> text-white text-[10px] font-bold rounded-full uppercase tracking-wider"><?php echo e($article->category); ?></span>
                    </div>
                    <div class="space-y-4 px-2">
                        <div class="flex items-center gap-4 text-xs text-gray-400 font-bold">
                            <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg> <?php echo e($article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y')); ?></span>
                            <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 5 mnt</span>
                        </div>
                        <a href="<?php echo e(route('news.detail', $article->slug)); ?>">
                            <h3 class="text-2xl font-bold text-[#0F172A] group-hover:text-blue-600 transition-colors leading-tight uppercase line-clamp-2"><?php echo e($article->title); ?></h3>
                        </a>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2"><?php echo e(Str::limit(strip_tags($article->content), 120)); ?></p>
                        <div class="pt-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-[10px] font-bold">
                                <?php echo e(substr($article->author->name ?? 'A', 0, 1)); ?>

                            </div>
                            <span class="text-xs font-bold text-gray-900"><?php echo e($article->author->name ?? 'Admin'); ?></span>
                        </div>
                    </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-2 text-center py-8 bg-gray-50 rounded-[1.5rem] border-2 border-dashed border-gray-200">
                    <p class="text-gray-500 font-bold italic">Belum ada artikel yang ditemukan.</p>
                </div>
                <?php endif; ?>
            </div>

                <div class="mt-8">
                    <?php echo e($articles->links()); ?>

                </div>
            </div>

        <!-- Sidebar -->
        <div class="space-y-12">
            <!-- Search -->
            <div class="bg-white p-6 rounded-[1.5rem] border border-gray-100 shadow-sm relative z-20">
                <h4 class="font-bold flex items-center gap-2 mb-6"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg> Cari Artikel</h4>
                <form action="<?php echo e(route('news')); ?>" method="GET" class="relative group">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Ketik judul berita..." 
                           class="w-full py-4 pl-6 pr-14 bg-gray-50 rounded-2xl border-2 border-transparent focus:border-blue-100 focus:bg-white focus:ring-0 transition-all text-sm font-medium">
                    <button type="submit" title="Cari" class="absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all group-hover:scale-105 active:scale-95 z-20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Trending -->
            <div class="bg-white p-6 rounded-[1.5rem] border border-gray-100 shadow-sm">
                <h4 class="font-bold flex items-center gap-2 mb-8 text-blue-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> Sedang Tren</h4>
                <div class="space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $trendingArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="space-y-2 group">
                        <a href="<?php echo e(route('news.detail', $trend->slug)); ?>">
                            <h5 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors leading-tight uppercase text-sm line-clamp-2"><?php echo e($trend->title); ?></h5>
                        </a>
                        <p class="text-[10px] text-gray-400 font-bold uppercase"><?php echo e($trend->published_at ? $trend->published_at->format('d M Y') : $trend->created_at->format('d M Y')); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-xs text-gray-400 italic">Belum ada data tren.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Dynamic Archive -->
            <div class="bg-white p-6 rounded-[1.5rem] border border-gray-100 shadow-sm">
                <h4 class="font-bold flex items-center gap-2 mb-6 pointer-events-none">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2"></path>
                    </svg> 
                    Arsip Berita
                </h4>
                
                <form action="<?php echo e(route('news')); ?>" method="GET" class="space-y-4">
                    <!-- Month Dropdown -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Pilih Bulan</label>
                        <select name="month" class="w-full py-3 px-4 bg-gray-50 rounded-xl border-2 border-transparent focus:border-blue-100 focus:bg-white focus:ring-0 text-sm font-bold text-gray-700 transition-all cursor-pointer">
                            <option value="">Semua Bulan</option>
                            <?php
                                $months = [
                                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 
                                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 
                                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                ];
                            ?>
                            <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($num); ?>" <?php echo e(request('month') == $num ? 'selected' : ''); ?>><?php echo e($name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Year Search/Input -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400">Tahun</label>
                        <input type="number" name="year" value="<?php echo e(request('year', date('Y'))); ?>" placeholder="Contoh: 2024" 
                               class="w-full py-3 px-4 bg-gray-50 rounded-xl border-2 border-transparent focus:border-blue-100 focus:bg-white focus:ring-0 text-sm font-bold text-gray-700 transition-all">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-100 uppercase text-xs tracking-widest active:scale-95 leading-none">
                        Cari Arsip
                    </button>

                    <?php if(request('month') || request('year')): ?>
                        <a href="<?php echo e(route('news')); ?>" class="block text-center text-xs font-bold text-gray-400 hover:text-blue-600 transition-all">Reset Filter</a>
                    <?php endif; ?>
                </form>

                <!-- Quick Summary of Existing Archives (Optional) -->
                <?php if($archiveData->isNotEmpty()): ?>
                <div class="mt-8 pt-8 border-t border-gray-50 space-y-3">
                    <p class="text-[11px] font-black uppercase tracking-tighter text-gray-300 mb-4">Periode Tersedia</p>
                    <div class="max-h-[150px] overflow-y-auto pr-2 custom-scrollbar space-y-3">
                        <?php $__currentLoopData = $archiveData->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('news', ['month' => $archive->month, 'year' => $archive->year])); ?>" class="flex justify-between items-center group">
                            <span class="text-sm font-bold text-gray-600 group-hover:text-blue-600 transition-all"><?php echo e($months[$archive->month]); ?> <?php echo e($archive->year); ?></span>
                            <span class="px-2 py-0.5 bg-gray-50 rounded text-[10px] text-gray-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition-all"><?php echo e(sprintf('%02d', $archive->data)); ?></span>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Hubungi Humas -->
            <div class="bg-blue-600 p-6 rounded-[1.5rem] text-white space-y-4 shadow-xl shadow-blue-200">
                <h4 class="text-xl font-bold">Hubungi Humas</h4>
                <p class="text-blue-100 text-sm">Punya informasi menarik atau ingin liputan kegiatan sekolah?</p>
                <a href="https://wa.me/message/AKIGOHHXFZGWB1?src=qr" class="flex items-center justify-center gap-2 w-full py-4 bg-white text-blue-600 rounded-2xl font-bold hover:bg-blue-50 transition-all uppercase text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                    Kirim Pesan
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    function filterNews(category) {
        const cards = document.querySelectorAll('.news-card');
        const buttons = document.querySelectorAll('.filter-btn');
        
        // Update button styles
        buttons.forEach(btn => {
            if (btn.getAttribute('data-filter') === category) {
                btn.classList.add('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-200');
                btn.classList.remove('bg-gray-100', 'text-gray-500', 'hover:bg-gray-200');
            } else {
                btn.classList.remove('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-200');
                btn.classList.add('bg-gray-100', 'text-gray-500', 'hover:bg-gray-200');
            }
        });

        // Filter cards
        cards.forEach(card => {
            const categories = card.getAttribute('data-category').split(' ');
            if (category === 'all' || categories.includes(category)) {
                card.style.display = 'block';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                }, 10);
            } else {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/news.blade.php ENDPATH**/ ?>