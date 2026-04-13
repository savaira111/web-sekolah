@extends('layouts.app')

@section('title', 'Guru & Staff - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative pt-4 pb-16 bg-white overflow-hidden reveal">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#1D82F6 1px, transparent 1px); background-size: 40px 40px;"></div>
    


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-10 pt-0">
        <div class="space-y-4">
            <p class="text-blue-600 font-bold tracking-[0.3em] uppercase text-xs">TEAM KAMI</p>
            <h1 class="text-2xl lg:text-2xl font-black text-[#0F172A] leading-tight">
                Mengenal Tim <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">Pengajar & Staf</span> Kami
            </h1>
            <p class="text-lg lg:text-xl text-slate-500 max-w-3xl mx-auto leading-relaxed font-medium">
                Dedikasi kami untuk memberikan pendidikan terbaik bagi putra-putri Anda melalui kolaborasi antara praktisi industri dan akademisi berpengalaman.
            </p>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap gap-4 justify-center pt-8" id="filter-buttons">
            <button onclick="filterStaff('all')" class="filter-btn px-8 py-3.5 bg-blue-600 text-white rounded-full font-bold text-sm shadow-xl shadow-blue-200 transition-all active-filter flex items-center gap-2" data-filter="all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                Semua
            </button>
            <button onclick="filterStaff('PPLG')" class="filter-btn px-8 py-3.5 bg-white text-slate-500 rounded-full font-bold text-sm hover:bg-slate-50 hover:shadow-md transition-all border border-slate-100 flex items-center gap-2" data-filter="PPLG">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                PPLG
            </button>
            <button onclick="filterStaff('DKV')" class="filter-btn px-8 py-3.5 bg-white text-slate-500 rounded-full font-bold text-sm hover:bg-slate-50 hover:shadow-md transition-all border border-slate-100 flex items-center gap-2" data-filter="DKV">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h14a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                DKV
            </button>
            <button onclick="filterStaff('Normatif - Adaptif')" class="filter-btn px-8 py-3.5 bg-white text-slate-500 rounded-full font-bold text-sm hover:bg-slate-50 hover:shadow-md transition-all border border-slate-100 flex items-center gap-2" data-filter="Normatif - Adaptif">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Normatif - Adaptif
            </button>
            <button onclick="filterStaff('Staff & Pekerja')" class="filter-btn px-8 py-3.5 bg-white text-slate-500 rounded-full font-bold text-sm hover:bg-slate-50 hover:shadow-md transition-all border border-slate-100 flex items-center gap-2" data-filter="Staff & Pekerja">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Staff & Pekerja
            </button>
        </div>
    </div>
</section>

<!-- Staff Grid -->
<section class="pb-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="staff-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-16">
            @php
                $staff = [
                    ['name' => 'Siti Robiah, S.Pd', 'role' => 'Kepala Sekolah', 'img' => 'images/guru/siti robiah.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Agus Sofyan', 'role' => 'Wakil Kepala Sekolah', 'img' => 'images/staff/agus.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Hamdan Firmansyah, S.Pd., Gr', 'role' => 'PJOK & Ketua Staf', 'img' => 'images/guru/hamdan.png', 'category' => 'Normatif - Adaptif, Staff & Pekerja'],
                    ['name' => 'Azhara Silmi Fathiyah', 'role' => 'Ketua Bidang Keahlian PPLG & Guru KIK, PBTGM, Pengembangan Perangkat Bergerak', 'img' => 'images/guru/azhara fathiyah silmi.png', 'category' => 'PPLG, Staff & Pekerja'],
                    ['name' => 'Refangga Agus Triono, S.Ds', 'role' => 'Seni Rupa, Videografi, DKV & Ketua Bidang Keahlian DKV', 'img' => 'images/guru/refangga.png', 'category' => 'DKV, Staff & Pekerja'],
                    ['name' => 'Rida Arisa, S.Pd., Gr', 'role' => 'Bahasa Indonesia & Ketua Perpustakaan', 'img' => 'images/guru/rida.png', 'category' => 'Normatif - Adaptif, Staff & Pekerja'],
                    ['name' => 'Ginna Ditianingsih', 'role' => 'Staf TU & Admin Sekolah', 'img' => 'images/staff/ghinna.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Siti Nurrohmah', 'role' => 'Staf TU & Admin Media Sosial', 'img' => 'images/staff/siti nurrohma.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Enjang Suryana', 'role' => 'Staf Administrasi', 'img' => 'images/staff/enjang.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Nuron Mumin', 'role' => 'Staf Perpustakaan', 'img' => 'images/staff/nuron.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Deni Setiawan, S.ST., Gr', 'role' => 'PKK (Produk Kreatif & Kewirausahaan), Informatika', 'img' => 'images/guru/deni setiawan.png', 'category' => 'Normatif - Adaptif, PPLG'],
                    ['name' => 'Leni Maulyani, S.Pd., Gr', 'role' => 'Bahasa Indonesia', 'img' => 'images/guru/leni.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Siti Saadah, S.Pd.I., Gr', 'role' => 'PAI dan BP (Pendidikan Agama Islam)', 'img' => 'images/guru/siti saada.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Dewi Astri Indriani, S.Pd., Gr', 'role' => 'Projek IPAS (Ilmu Pengetahuan Alam & Sosial)', 'img' => 'images/guru/dewi.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Essa Amalia Khairina, S.Pd', 'role' => 'Bahasa Inggris X & XII', 'img' => 'images/guru/essa.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Dyah Wiwit Cahyaningsih, S.Pd', 'role' => 'Projek IPAS & PLH (Pendidikan Lingkungan Hidup)', 'img' => 'images/guru/dyahwiwit.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Rizki Reynaldi F, S.Hum', 'role' => 'Bahasa Jepang', 'img' => 'images/Sample_User_Icon.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Roslaila, S.Kom', 'role' => 'Guru KIK, PBTGM, Pengembangan Perangkat Bergerak, Koding, AI, Desain Grafis, 3D, Basis Data', 'img' => 'images/guru/roslaila.png', 'category' => 'PPLG'],
                    ['name' => 'Rika Mustika, S.Ds', 'role' => 'Dasar DKV & DKV', 'img' => 'images/guru/rika.png', 'category' => 'DKV'],
                    ['name' => 'Oktapiyanti, S.Pd', 'role' => 'Matematika X & XII', 'img' => 'images/guru/oktapiyanti.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Sintia Apriyanti, S.Kom', 'role' => 'BK, Algoritma, PBTGM, Kewirausahaan', 'img' => 'images/guru/sintia.png', 'category' => 'PPLG'],
                    ['name' => 'Zulistiani Noer Amalina, S.Ds', 'role' => 'Seni Rupa, DKV, Videografi', 'img' => 'images/guru/zulis.png', 'category' => 'DKV'],
                    ['name' => 'Rizki Rantisi Baehaqy, S.Si', 'role' => 'Matematika', 'img' => 'images/guru/rizki.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Neng Saroh Nitra, S.Pd., Gr', 'role' => 'Pendidikan Pancasila', 'img' => 'images/guru/neng saroh.png', 'category' => 'Normatif - Adaptif'],
                    ['name' => 'Pasha Yudha, S.Ds', 'role' => 'Animasi & DKV', 'img' => 'images/Sample_User_Icon.png', 'category' => 'DKV'],
                    ['name' => 'Taufik Pathurrochman, S.Kom', 'role' => 'Pengembangan Website dan Pemrograman Dasar', 'img' => 'images/guru/taufik faturohman.png', 'category' => 'PPLG'],
                    ['name' => 'Heriyanto', 'role' => 'Petugas Kebersihan Sekolah', 'img' => 'images/staff/heriyanto.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Kharim Sasmita', 'role' => 'Petugas Kebersihan Sekolah', 'img' => 'images/staff/kharim.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Romy Sunansyah', 'role' => 'Satpam Sekolah', 'img' => 'images/staff/romy.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Sofyan Fetriana', 'role' => 'Satpam Sekolah', 'img' => 'images/staff/sofyan.png', 'category' => 'Staff & Pekerja'],
                    ['name' => 'Dede Masliah', 'role' => 'Pengelola Kantin Sekolah', 'img' => 'images/staff/dede.png', 'category' => 'Staff & Pekerja'],
                ];
            @endphp

            @foreach ($staff as $person)
            <div class="staff-card group text-center space-y-4 transition-all duration-300 reveal reveal-scale" style="transition-delay: {{ $loop->index * 50 }}ms" data-category="{{ $person['category'] }}">
                <!-- Circular Image Container -->
                <div class="relative inline-block">
                    <div class="w-40 h-40 lg:w-48 lg:h-48 rounded-full overflow-hidden border-4 border-white shadow-xl relative z-10 transition-transform duration-500 group-hover:scale-105">
                        <img src="{{ asset($person['img']) }}" alt="{{ $person['name'] }}" class="w-full h-full object-cover">
                    </div>
                    <!-- Decorative Circle behind -->
                    <div class="absolute inset-0 bg-blue-100 rounded-full scale-[1.08] z-0 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                </div>
                
                <div class="space-y-2">
                    <h3 class="text-lg font-bold text-[#0F172A] leading-tight group-hover:text-blue-600 transition-colors capitalize">
                        {{ $person['name'] }}
                    </h3>
                    <p class="text-blue-600 text-xs font-bold uppercase tracking-widest line-clamp-2" title="{{ $person['role'] }}">
                        {{ $person['role'] }}
                    </p>
                    
                    <!-- Icons -->
                    <div class="flex justify-center gap-4 pt-4 opacity-100 transition-all duration-500 translate-y-0 relative z-20">
                        <a href="#" class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-pink-600 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" stroke-width="2"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2" stroke-linecap="round"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function filterStaff(category) {
        const cards = document.querySelectorAll('.staff-card');
        const buttons = document.querySelectorAll('.filter-btn');
        
        // Update button styles
        buttons.forEach(btn => {
            if (btn.getAttribute('data-filter') === category) {
                btn.classList.add('bg-blue-600', 'text-white', 'shadow-xl', 'shadow-blue-200');
                btn.classList.remove('bg-white', 'text-slate-500', 'hover:bg-slate-50', 'hover:shadow-md', 'border', 'border-slate-100');
            } else {
                btn.classList.remove('bg-blue-600', 'text-white', 'shadow-xl', 'shadow-blue-200');
                btn.classList.add('bg-white', 'text-slate-500', 'hover:bg-slate-50', 'hover:shadow-md', 'border', 'border-slate-100');
            }
        });

        // Filter cards
        cards.forEach(card => {
            if (category === 'all' || card.getAttribute('data-category').includes(category)) {
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

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }
    .staff-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<!-- Call to Action -->
<section class="pt-0 pb-10 bg-white reveal reveal-scale">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-white rounded-[1.5rem] p-6 lg:p-6 text-center space-y-4 border-2 border-dashed border-blue-400 overflow-hidden shadow-sm">
            <!-- Decorative Elements -->
            <div class="absolute -top-6 -right-6 w-24 h-24 bg-blue-50 rounded-full"></div>
            <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-blue-50 rounded-full"></div>
            
            <!-- Rocket Icon -->
            <div class="relative z-10">
                <svg class="w-12 h-12 text-blue-600 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                    <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                    <path d="M9 12H4s.55-3.03 2-5c1.62-2.2 5-4 5-4"></path>
                    <path d="M12 15v5s3.03-.55 5-2c2.2-1.62 4-5 4-5"></path>
                </svg>
            </div>
            
            <div class="space-y-4 relative z-10">
                <h2 class="text-2xl lg:text-2xl font-bold text-slate-900">Ingin Menjadi Bagian dari Kami?</h2>
                <p class="text-slate-500 text-base lg:text-lg max-w-3xl mx-auto font-medium leading-relaxed">
                    Kami selalu mencari talenta berbakat di bidang teknologi dan kreatif untuk bergabung menciptakan masa depan digital yang lebih baik bagi siswa kami.
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-4 pt-4 relative z-10">
                <a href="https://wa.me/message/AKIGOHHXFZGWB1?src=qr" target="_blank" class="px-8 py-3.5 bg-white border border-slate-200 text-slate-700 rounded-full font-bold text-base hover:bg-slate-50 transition-all flex items-center gap-2">
                    Hubungi Pihak Sekolah <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
