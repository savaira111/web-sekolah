

<?php $__env->startSection('title', 'Fasilitas - SMKS Mahaputra'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative pt-12 pb-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-8">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
            LINGKUNGAN BELAJAR MODERN
        </div>
        <div class="flex flex-col md:flex-row justify-between items-end gap-8">
            <div class="space-y-3 max-w-2xl">
                <h1 class="text-4xl lg:text-6xl font-bold text-[#0F172A] leading-tight">
                    Fasilitas Unggulan <br>
                    <span class="text-blue-600">Standar Industri</span>
                </h1>
                <p class="text-lg text-gray-500 leading-relaxed">
                    Kami menyediakan ekosistem pembelajaran yang dirancang khusus untuk mengasah kreativitas dan keterampilan teknis siswa sesuai kebutuhan dunia kerja masa kini.
                </p>
            </div>
            <a href="#" class="inline-flex items-center gap-3 px-6 py-3 bg-white border border-gray-100 rounded-xl font-bold text-gray-900 shadow-sm hover:bg-gray-50 transition-all">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 00-2 2z"></path></svg>
                Virtual Tour
            </a>
        </div>
    </div>
</section>

<!-- Category Tabs -->
<section class="pb-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Category Tabs -->
    <div class="flex flex-wrap gap-4 mb-12" id="facility-filters">
        <button onclick="filterFacilities('all')" class="filter-btn px-8 py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 transition-all active-filter" data-filter="all">Semua Fasilitas</button>
        <button onclick="filterFacilities('Akademik')" class="filter-btn px-8 py-3 bg-white text-gray-500 border border-gray-100 rounded-xl font-bold hover:bg-gray-50 transition-all" data-filter="Akademik">Akademik</button>
        <button onclick="filterFacilities('Umum')" class="filter-btn px-8 py-3 bg-white text-gray-500 border border-gray-100 rounded-xl font-bold hover:bg-gray-50 transition-all" data-filter="Umum">Umum</button>
        <button onclick="filterFacilities('Laboratorium')" class="filter-btn px-8 py-3 bg-white text-gray-500 border border-gray-100 rounded-xl font-bold hover:bg-gray-50 transition-all" data-filter="Laboratorium">Laboratorium</button>
    </div>

    <!-- Facility Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="facility-grid">
        <!-- Lab DKV -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Akademik Laboratorium">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/lab dkv.png')); ?>" alt="Lab DKV" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-blue-600 text-white text-[10px] font-bold rounded-full uppercase">Laboratorium</span>
            </div>
            <div class="p-8 space-y-5">
                <h3 class="text-xl font-bold text-[#0F172A]">Lab DKV</h3>
                <p class="text-gray-500 text-sm">Ruang kreatif yang dilengkapi dengan peralatan desain grafis dan fotografi standar profesional untuk mengasah jiwa artistik.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Full AC</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Studio Foto</span>
                </div>
            </div>
        </div>

        <!-- Lab PPLG -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Akademik Laboratorium">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/lab pplg.png')); ?>" alt="Lab PPLG" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-blue-600 text-white text-[10px] font-bold rounded-full uppercase">Laboratorium</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">Lab PPLG</h3>
                <p class="text-gray-500 text-sm">Pusat pengembangan perangkat lunak dengan infrastruktur terkini untuk pemrograman web, mobile, dan game development.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Intel Core i5 & i7</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Gigabit LAN</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Wi-Fi 6</span>
                </div>
            </div>
        </div>

        <!-- Lab Multimedia -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Akademik Laboratorium">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/lab multimedia.png')); ?>" alt="Lab Multimedia" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-blue-600 text-white text-[10px] font-bold rounded-full uppercase">Laboratorium</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">Lab Multimedia</h3>
                <p class="text-gray-500 text-sm">Ruang produksi konten digital, editing video, dan animasi dengan workstation spesifikasi tinggi dan ruang kedap suara.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">RTX GPU</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Soundproof</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Editing Suite</span>
                </div>
            </div>
        </div>

        <!-- Lab Interaktif -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Akademik Laboratorium">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/lab interaktif.png')); ?>" alt="Lab Interaktif" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-blue-400 text-white text-[10px] font-bold rounded-full uppercase">Laboratorium</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">Lab Interaktif</h3>
                <p class="text-gray-500 text-sm">Ruang kelas cerdas yang dirancang untuk pembelajaran kolaboratif dengan teknologi layar sentuh interaktif.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Smart Board</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">36 Seats</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Wireless Casting</span>
                </div>
            </div>
        </div>

        <!-- VIP Lounge -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Umum">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/vip.png')); ?>" alt="VIP" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-orange-600 text-white text-[10px] font-bold rounded-full uppercase">Umum</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">VIP Lounge</h3>
                <p class="text-gray-500 text-sm">Fasilitas lobi premium dengan spesifikasi tertinggi untuk proyek khusus dan sertifikasi internasional.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Premium Seats</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Ergonomic</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Private Access</span>
                </div>
            </div>
        </div>

        <!-- BNB Cafe -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Umum">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/bnb.png')); ?>" alt="Cafe" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-orange-600 text-white text-[10px] font-bold rounded-full uppercase">Umum</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">BNB (Business & Cafe)</h3>
                <p class="text-gray-500 text-sm">Pusat kewirausahaan siswa sekaligus area lounge yang nyaman untuk berdiskusi sambil menikmati sajian cafe.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Barista Station</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Student Enterprise</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Lounge Area</span>
                </div>
            </div>
        </div>

        <!-- Masjid -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Umum">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/masjid mushola.png')); ?>" alt="Masjid" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-orange-600 text-white text-[10px] font-bold rounded-full uppercase">Umum</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">Masjid Sekolah</h3>
                <p class="text-gray-500 text-sm">Pusat kegiatan religi dengan desain arsitektur modern yang memberikan ketenangan dan kenyamanan beribadah.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Full AC</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">300 Capacity</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Wudhu Station</span>
                </div>
            </div>
        </div>

        <!-- Gedung Kelas -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Akademik">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/gedung kelas.png')); ?>" alt="Gedung" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-orange-600 text-white text-[10px] font-bold rounded-full uppercase">Akademik</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">Gedung Kelas</h3>
                <p class="text-gray-500 text-sm">Gedung pembelajaran bertingkat dengan ruang-ruang kelas yang representatif, bersih, dan menunjang fokus belajar.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Multimedia</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Library Access</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Smart Lighting</span>
                </div>
            </div>
        </div>

        <!-- Bale Mahaputra -->
        <div class="facility-card group bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500" data-category="Umum">
            <div class="aspect-video relative overflow-hidden">
                <img src="<?php echo e(asset('images/fasilitas/bale mahaputra.png')); ?>" alt="Aula" class="w-full h-full object-cover transition-transform duration-700">
                <span class="absolute top-6 left-6 px-4 py-2 bg-orange-600 text-white text-[10px] font-bold rounded-full uppercase">Umum</span>
            </div>
            <div class="p-10 space-y-6">
                <h3 class="text-2xl font-bold text-[#0F172A]">Bale Mahaputra</h3>
                <p class="text-gray-500 text-sm">Aula pertemuan multifungsi dengan sentuhan desain tradisional modern untuk berbagai acara dan kegiatan siswa.</p>
                <div class="pt-6 border-t border-gray-50 flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Sound System</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Stage Lighting</span>
                    <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Multi-purpose</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- parkiran -->
<div class="facility-card group bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm transition-all duration-500 max-w-sm mx-auto" data-category="Umum">
    <div class="aspect-video relative overflow-hidden">
        <img src="<?php echo e(asset('images/fasilitas/parkiran.png')); ?>" alt="Parkiran" class="w-full h-full object-cover transition-transform duration-700">
        <span class="absolute top-4 left-4 px-3 py-1 bg-orange-600 text-white text-[10px] font-bold rounded-full uppercase">Umum</span>
    </div>
    <div class="p-6 space-y-4">
        <h3 class="text-lg font-bold text-[#0F172A]">Parkiran</h3>
        <p class="text-gray-500 text-xs">Area parkir yang nyaman dan aman untuk kendaraan siswa dan karyawan.</p>
        <div class="pt-4 border-t border-gray-50 flex flex-wrap gap-2">
            <span class="px-2 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Sound System</span>
            <span class="px-2 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Stage Lighting</span>
            <span class="px-2 py-1 bg-gray-50 rounded-lg text-[10px] font-bold text-gray-400">Multi-purpose</span>
        </div>
    </div>
</div>
</div>
</section>

<script>
    function filterFacilities(category) {
        const cards = document.querySelectorAll('.facility-card');
        const buttons = document.querySelectorAll('.filter-btn');
        
        // Update button styles
        buttons.forEach(btn => {
            if (btn.getAttribute('data-filter') === category) {
                btn.classList.add('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-200');
                btn.classList.remove('bg-white', 'text-gray-500', 'border-gray-100');
                // Tambahkan efek animasi klik pada tombol
                btn.style.transform = 'scale(0.95)';
                setTimeout(() => btn.style.transform = 'scale(1)', 150);
            } else {
                btn.classList.remove('bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-200');
                btn.classList.add('bg-white', 'text-gray-500', 'border-gray-100');
                btn.style.transform = 'scale(1)';
            }
        });

        // Filter cards dengan staggered animation
        let delay = 0;
        cards.forEach(card => {
            const categories = card.getAttribute('data-category').split(' ');
            
            // Filter Akademik hanya memunculkan kategori Akademik saja
            let isMatch = false;
            if (category === 'all') {
                isMatch = true;
            } else if (category === 'Akademik') {
                isMatch = card.getAttribute('data-category').trim() === 'Akademik';
            } else {
                isMatch = categories.includes(category);
            }

            if (isMatch) {
                card.style.display = 'block';
                // Trigger reflow
                void card.offsetWidth;
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1) translateY(0)';
                }, 10 + delay);
                
                // Tambahkan stagger untuk animasi cascade pada 'all' dan 'Akademik'
                if (category === 'all' || category === 'Akademik') {
                    delay += 50; 
                }
            } else {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95) translateY(10px)';
                setTimeout(() => {
                    if (card.style.opacity === '0') {
                        card.style.display = 'none';
                    }
                }, 500);
            }
        });
    }
</script>
</section>

<!-- Direct Contact -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="bg-blue-600 rounded-[3rem] p-10 lg:p-16 text-center relative overflow-hidden shadow-2xl shadow-blue-200">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-700 opacity-50"></div>
        <div class="relative z-10 space-y-6">
            <h2 class="text-3xl lg:text-5xl font-bold text-white">Ingin melihat fasilitas kami <br> secara langsung?</h2>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto">Kami mengundang Anda untuk berkunjung dan merasakan langsung atmosfer belajar di SMKS Mahaputra Cerdas Utama. Jadwalkan kunjungan Anda sekarang.</p>
            <div class="pt-6">
                <a href="https://wa.me/message/AKIGOHHXFZGWB1?src=qr" class="inline-flex py-4 px-10 border-2 border-white/30 text-white rounded-2xl font-bold text-lg hover:bg-white/10 transition-all">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/facilities.blade.php ENDPATH**/ ?>