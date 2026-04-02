
<?php $__env->startSection('title', 'Dashboard - Admin Mahput'); ?>

<?php $__env->startSection('content'); ?>
        <!-- Page Content -->
        <div class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
            
            <!-- Cards Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <?php if(auth()->user()->role === 'Superadmin'): ?>
                <!-- Card 1 -->
                <a href="/superadmin/users" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-blue-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-blue-500/20' : 'bg-blue-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">+12.5%</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Total Siswa</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'"><?php echo e(number_format($stats['total_students'] ?? 0)); ?></h3>
                </a>

                <!-- Card 2 -->
                <a href="/superadmin/users" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-purple-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-purple-500/20' : 'bg-purple-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-purple-400' : 'text-purple-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">+2.4%</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Total Admin</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'"><?php echo e(number_format($stats['total_editors'] ?? 0)); ?></h3>
                </a>
                <?php endif; ?>

                <?php if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'admin PPDB management'): ?>
                <!-- Card 3 -->
                <a href="#" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-orange-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-orange-500/20' : 'bg-orange-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-orange-400' : 'text-orange-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">+18%</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Pendaftar PPDB</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'"><?php echo e(number_format($stats['total_ppdb'] ?? 0)); ?></h3>
                </a>
                <?php endif; ?>

                <?php if(auth()->user()->role === 'Superadmin' || auth()->user()->role === 'operator artikel/berita'): ?>
                <!-- Card 4 -->
                <a href="/superadmin/articles" class="block rounded-[1.5rem] p-6 shadow-sm border transition-all duration-300 hover:translate-y-[-2px]" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 hover:border-gray-600' : 'bg-white border-gray-100/50 hover:shadow-md hover:border-emerald-200'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-emerald-500/20' : 'bg-emerald-50'">
                            <svg class="w-5 h-5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-emerald-400' : 'text-emerald-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <span class="px-2.5 py-1 text-[11px] font-bold rounded-full transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-green-500/20 text-green-400' : 'bg-green-50 text-green-600'">Terbaru</span>
                    </div>
                    <p class="text-xs font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Artikel Aktif</p>
                    <h3 class="text-[28px] font-bold leading-none transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'"><?php echo e(number_format($stats['total_articles'] ?? 0)); ?></h3>
                </a>
                <?php endif; ?>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Line Chart Mock -->
                <div class="lg:col-span-2 rounded-[2rem] p-8 shadow-sm border relative overflow-hidden transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                    <div class="flex flex-wrap items-end justify-between mb-8 z-10 relative">
                        <div>
                            <h3 class="text-xl font-bold mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">TREN PENDAFTARAN PPDB</h3>
                            <p class="text-sm font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Ringkasan volume pendaftar mingguan</p>
                        </div>
                        <div class="flex items-center gap-4 mt-4 sm:mt-0">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                                <span class="text-xs font-bold uppercase transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'">Pendaftar</span>
                            </div>
                            <div class="px-4 py-2 border rounded-full flex items-center gap-2 cursor-pointer transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700 bg-gray-800/50 hover:bg-gray-700' : 'border-gray-200 bg-gray-50/50 hover:bg-gray-100'">
                                <span class="text-xs font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-700'">7 Hari Terakhir</span>
                                <svg class="w-3.5 h-3.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- CSS-Based Line Graph Mockup -->
                    <div class="h-64 mt-4 relative w-full border-b transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <svg class="w-full h-full" viewBox="0 0 800 200" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="blueGradient" x1="0" x2="0" y1="0" y2="1">
                                    <stop offset="0%" stop-color="rgba(59, 130, 246, 0.2)" />
                                    <stop offset="100%" stop-color="rgba(59, 130, 246, 0)" />
                                </linearGradient>
                            </defs>
                            <!-- Fill -->
                            <path d="M0,170 C100,150 200,160 300,100 C400,20 500,200 600,100 C700,-50 800,90 800,90 L800,200 L0,200 Z" fill="url(#blueGradient)" />
                            <!-- Line -->
                            <path d="M0,170 C100,150 200,160 300,100 C400,20 500,200 600,100 C700,-50 800,90 800,90" fill="none" stroke="#3B82F6" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            
                            <!-- Points -->
                            <circle cx="300" cy="100" r="4" fill="white" stroke="#3B82F6" stroke-width="2" />
                            <circle cx="500" cy="200" r="4" fill="white" stroke="#3B82F6" stroke-width="2" />
                            <circle cx="600" cy="100" r="4" fill="white" stroke="#3B82F6" stroke-width="2" />
                        </svg>

                        <!-- Y-axis guide lines mock -->
                        <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                            <div class="border-t border-dashed w-full h-0 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-700' : 'border-gray-100'"></div>
                        </div>
                    </div>
                    
                    <!-- X-axis labels -->
                    <div class="flex justify-between mt-4 text-[10px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
                        <span>MON</span>
                        <span>TUE</span>
                        <span>WED</span>
                        <span>THU</span>
                        <span>FRI</span>
                        <span>SAT</span>
                        <span>SUN</span>
                    </div>
                </div>

                <!-- Donut Chart Mock -->
                <div class="rounded-[2rem] p-8 shadow-sm border flex flex-col object-cover transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                    <h3 class="text-xl font-bold mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">DISTRIBUSI JURUSAN</h3>
                    <p class="text-sm font-medium mb-8 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Persentase Pendaftar</p>
                    
                    <div class="flex-1 flex flex-col items-center justify-center relative">
                        <!-- SVG Donut Chart Mockup -->
                        <div class="relative w-48 h-48">
                            <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
                                <!-- Track -->
                                <circle cx="18" cy="18" r="14" fill="none" stroke-width="4" :stroke="$store.theme.darkMode ? '#334155' : '#F1F5F9'"></circle>
                                
                                <!-- Segments (CSS styled with stroke-dasharray) -->
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#3B82F6" stroke-width="4" stroke-dasharray="40 100" stroke-dashoffset="0"></circle>
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#111827" stroke-width="4" stroke-dasharray="30 100" stroke-dashoffset="-40"></circle>
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#A855F7" stroke-width="4" stroke-dasharray="20 100" stroke-dashoffset="-70"></circle>
                                <circle cx="18" cy="18" r="14" fill="none" stroke="#F59E0B" stroke-width="4" stroke-dasharray="10 100" stroke-dashoffset="-90"></circle>
                            </svg>
                            <!-- Inner Text -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-3xl font-bold leading-none transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'"><?php echo e(number_format($stats['total_ppdb'] ?? 0)); ?></span>
                                <span class="text-[9px] font-bold mt-1 uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Total</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-y-3 mt-8">
                        <?php $__currentLoopData = $major_distribution; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full <?php echo e($m->major === 'PPLG' ? 'bg-blue-500' : 'bg-purple-500'); ?>"></span>
                            <span class="text-xs font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-700'"><?php echo e($m->major); ?>: <?php echo e($m->count); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Activity Log Table -->
            <div class="rounded-[2rem] p-8 shadow-sm border mb-10 overflow-hidden transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-bold mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">LOG AKTIVITAS TERBARU</h3>
                        <p class="text-sm font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Pembaruan sistem antar departemen</p>
                    </div>
                    <a href="#" class="text-sm font-bold flex items-center gap-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-blue-400 hover:text-blue-300' : 'text-blue-600 hover:text-blue-700'">
                        Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider w-1/4 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Pengguna</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider w-1/3 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Detail Aksi</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider text-center transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Modul</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Status</th>
                                <th class="pb-4 text-xs font-bold uppercase tracking-wider text-right transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                        <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b last:border-0 transition-colors group" :class="$store.theme.darkMode ? 'border-gray-800 hover:bg-black/20' : 'border-gray-50 hover:bg-gray-50/50'">
                                <td class="py-5 font-semibold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-800'">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 transition-colors duration-300 bg-blue-100 text-blue-600 font-bold text-[10px]">
                                            <?php echo e(strtoupper(substr($activity['user'], 0, 1))); ?>

                                        </div>
                                        <?php echo e($activity['user']); ?>

                                    </div>
                                </td>
                                <td class="py-5 font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-600'"><?php echo e($activity['action']); ?></td>
                                <td class="py-5 text-center">
                                    <span class="inline-block px-3 py-1 font-bold text-[10px] rounded-full uppercase tracking-wider transition-colors duration-300" :class="$activity['module'] === 'PPDB' ? ($store.theme.darkMode ? 'bg-blue-500/20 text-blue-400' : 'bg-blue-50 text-blue-600') : ($store.theme.darkMode ? 'bg-orange-500/20 text-orange-400' : 'bg-orange-50 text-orange-600')">
                                        <?php echo e($activity['module']); ?>

                                    </span>
                                </td>
                                <td class="py-5">
                                    <span class="inline-flex items-center gap-1.5 font-bold <?php echo e($activity['status'] === 'Success' ? 'text-green-500' : 'text-orange-500'); ?> text-xs">
                                        <span class="w-1.5 h-1.5 rounded-full <?php echo e($activity['status'] === 'Success' ? 'bg-green-500' : 'bg-orange-500'); ?>"></span> <?php echo e($activity['status']); ?>

                                    </span>
                                </td>
                                <td class="py-5 font-medium text-right text-xs transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'"><?php echo e($activity['time']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="py-10 text-center text-gray-500">Belum ada aktivitas terbaru</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.superadmin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/superadmin/dashboard.blade.php ENDPATH**/ ?>