@extends('layouts.app')

@section('title', $partner->name . ' - Mitra Industri SMKS Mahaputra Cerdas Utama')

@section('content')
<!-- Detail Header Section -->
<section class="relative overflow-hidden pt-4 pb-12 bg-[#F8FAFC]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row gap-6 items-start">
            <!-- Back Button -->
            <div class="shrink-0 lg:pt-2">
                <a href="{{ route('mitra') }}" 
                   class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white border border-gray-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-blue-500/20 group" 
                   title="Kembali ke Daftar Mitra">
                    <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
            </div>

            <div class="flex-1 bg-white rounded-[2rem] shadow-xl shadow-blue-900/5 overflow-hidden border border-white">
            <div class="grid lg:grid-cols-2">
                <!-- Left Content -->
                <div class="p-8 lg:p-10 space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-xl bg-gray-50 p-3 border border-gray-100 flex items-center justify-center overflow-hidden shrink-0 shadow-inner">
                            @if($partner->logo)
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                            @else
                                <div class="text-white bg-blue-600 w-full h-full rounded-lg flex items-center justify-center font-black text-xl shadow-lg">
                                    {{ strtoupper(substr($partner->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-[9px] font-black uppercase tracking-widest border border-blue-100">
                                STRATEGIC PARTNER
                            </span>
                            <h1 class="text-3xl lg:text-4xl font-black text-[#0F172A] mt-1 tracking-tight">{{ $partner->name }}</h1>
                        </div>
                    </div>

                    <p class="text-base text-gray-500 leading-relaxed font-medium">
                        {{ $partner->description ?? 'Deskripsi perusahaan mitra belum tersedia.' }}
                    </p>

                    <div class="flex flex-wrap gap-3 pt-2">
                        @if($partner->location)
                        <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-50 border border-gray-100 text-gray-600 text-xs font-bold">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                            {{ $partner->location }}
                        </div>
                        @else
                        <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-50 border border-gray-100 text-gray-600 text-xs font-bold">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                            Bandung, Indonesia
                        </div>
                        @endif

                        @if($partner->website_url)
                        <a href="{{ $partner->website_url }}" target="_blank" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 text-white text-xs font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            {{ parse_url($partner->website_url, PHP_URL_HOST) }}
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Right Visual -->
                <div class="relative min-h-[300px] h-full overflow-hidden">
                    @if($partner->featured_image)
                        <img src="{{ asset('storage/' . $partner->featured_image) }}" alt="{{ $partner->name }}" class="absolute inset-0 w-full h-full object-cover">
                    @else
                        <!-- Standby Placeholder Graphic -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-indigo-50 flex items-center justify-center overflow-hidden">
                             <div class="text-blue-200/50 flex flex-col items-center">
                                 <svg class="w-24 h-24 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                             </div>
                        </div>
                    @endif
                    <!-- Decorative Overlay -->
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center md:text-left">
            <h2 class="text-3xl font-black text-[#0F172A] tracking-tight">Galeri Kegiatan Magang</h2>
            <p class="text-gray-400 font-bold mt-2">Melihat langsung proses belajar siswa di lingkungan profesional.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 h-auto md:h-[450px]">
            @if($partner->gallery_images && count($partner->gallery_images) > 0)
                <!-- Real Gallery Images -->
                @php $galleryCount = count($partner->gallery_images); @endphp
                
                <!-- Main Large Image (First) -->
                <div class="md:col-span-2 relative group overflow-hidden rounded-[2.5rem] shadow-xl min-h-[300px]">
                     <img src="{{ asset('storage/' . $partner->gallery_images[0]) }}" alt="Gallery 1" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>

                <!-- Right Side Grid -->
                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if(isset($partner->gallery_images[1]))
                    <div class="relative group overflow-hidden rounded-[2.5rem] shadow-lg md:col-span-2 h-[217px]">
                        <img src="{{ asset('storage/' . $partner->gallery_images[1]) }}" alt="Gallery 2" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    @endif
                    
                    @if(isset($partner->gallery_images[2]))
                    <div class="relative group overflow-hidden rounded-[2.5rem] shadow-lg h-[217px]">
                        <img src="{{ asset('storage/' . $partner->gallery_images[2]) }}" alt="Gallery 3" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    @endif

                    @if(isset($partner->gallery_images[3]))
                    <div class="relative group overflow-hidden rounded-[2.5rem] shadow-lg h-[217px]">
                        <img src="{{ asset('storage/' . $partner->gallery_images[3]) }}" alt="Gallery 4" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    @endif
                </div>
            @else
                <!-- Placeholder if no images uploaded -->
                <div class="md:col-span-2 relative group overflow-hidden rounded-[2.5rem] shadow-xl min-h-[300px] bg-gradient-to-br from-gray-100 to-gray-50 flex items-center justify-center border-2 border-dashed border-gray-200">
                     <div class="text-center">
                         <svg class="w-16 h-16 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                         <p class="text-xs font-bold uppercase tracking-widest text-gray-400">Belum Ada Galeri Utama</p>
                     </div>
                </div>
                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative group overflow-hidden rounded-[2.5rem] shadow-lg md:col-span-2 h-[217px] bg-gray-50 flex items-center justify-center">
                        <p class="text-gray-300 font-bold uppercase text-[10px] tracking-widest">Belum ada foto kegiatan</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Testimonial Section (CEO/Leader Message) -->
<section class="py-24 bg-[#F8FAFC] overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 relative text-center">
        <!-- Header Text -->
        <span class="text-blue-600 font-black text-xs uppercase tracking-[0.2em] mb-4 block">Pesan Pimpinan Industri</span>
        
        <!-- Decoration -->
        <div class="absolute -top-10 -left-10 text-9xl text-blue-100 font-serif opacity-50 select-none">“</div>
        
        <div class="relative z-10 space-y-8">
            <p class="text-2xl lg:text-3xl font-bold text-[#0F172A] leading-relaxed">
                "Kami sangat bangga dapat berkolaborasi dengan SMKS Mahaputra Cerdas Utama. Para siswa dan lulusannya selalu menunjukkan tingkat dedikasi yang tinggi, keterampilan teknis yang mumpuni, serta kesiapan penuh untuk berinovasi di dunia kerja profesional."
            </p>
            
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-4 border-4 border-white shadow-lg bg-gray-100 flex items-center justify-center">
                    <svg class="w-10 h-10 text-gray-400 mt-2" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h4 class="text-lg font-black text-[#0F172A] uppercase tracking-wide">Pimpinan Perusahaan</h4>
                <p class="text-sm font-bold text-blue-600 uppercase tracking-widest mt-1">{{ $partner->name }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Alumni Section -->
<section class="pt-16 pb-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-16">
            <div>
                <h2 class="text-3xl font-black text-[#0F172A] tracking-tight">Siswa PKL di {{ $partner->name }}</h2>
                <p class="text-gray-400 font-bold mt-2">Jejak pengalaman belajar siswa kami yang berkontribusi secara profesional.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $testimonials = $partner->student_testimonials_data ?? [];
                // Fallback for old data if no new data exists
                if (empty($testimonials) && $partner->testimonial_text) {
                    $testimonials = [[
                        'text' => $partner->testimonial_text,
                        'author' => $partner->testimonial_author,
                        'role' => $partner->testimonial_author_role,
                        'photo_url' => $partner->testimonial_author_photo
                    ]];
                }
            @endphp

            @if(count($testimonials) > 0)
                @foreach($testimonials as $t)
                <!-- Real Testimonial Card (From Admin) -->
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all group border-t-4 border-t-blue-600">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 rounded-2xl overflow-hidden shadow-md">
                            <img src="{{ !empty($t['photo_url']) ? asset('storage/' . $t['photo_url']) : 'https://ui-avatars.com/api/?name='.urlencode($t['author'] ?? 'User').'&background=3B82F6&color=fff' }}" alt="Siswa PKL" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-black text-[#0F172A]">{{ $t['author'] ?? 'Anonim' }}</h4>
                            <p class="text-[10px] font-bold text-blue-600 uppercase tracking-wider">{{ $t['role'] ?? 'Siswa' }}</p>
                            <div class="flex gap-1 mt-1">
                                @php $rating = intval($t['rating'] ?? 5); @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-3.5 h-3.5 {{ $i <= $rating ? 'text-amber-400 drop-shadow-sm' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <p class="text-sm text-gray-500 italic font-medium leading-relaxed">
                            "{{ $t['text'] ?? '' }}"
                        </p>
                        <div class="flex items-center gap-3 text-xs font-bold text-gray-400 pt-2 border-t border-gray-50">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Penempatan: {{ $partner->location ?? 'Head Office' }}
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- No Testimonial yet -->
                <div class="col-span-3 py-16 text-center border-2 border-dashed border-gray-100 rounded-[2.5rem]">
                    <p class="text-gray-300 font-bold uppercase tracking-widest text-xs">Belum ada cerita siswa di mitra ini</p>
                </div>
            @endif
        </div>

        <div class="text-center mt-12">
            <a href="#" class="text-[10px] font-black text-blue-600 hover:text-blue-800 transition-colors uppercase tracking-[0.2em] bg-blue-50 px-6 py-3 rounded-full border border-blue-100">
                Lihat Semua Siswa PKL di {{ $partner->name }}
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="pt-4 pb-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-br from-[#0256B3] to-[#014188] rounded-[2.5rem] p-10 lg:p-12 overflow-hidden shadow-2xl text-center">
            <div class="relative z-10 max-w-2xl mx-auto space-y-6">
                <h2 class="text-3xl lg:text-4xl font-black text-white leading-tight uppercase tracking-tight">
                    Ingin Menjadi Bagian dari Ekosistem Kami?
                </h2>
                <p class="text-base text-blue-100/80 leading-relaxed font-bold">
                    Kami membuka peluang kerja sama yang saling menguntungkan bagi industri untuk membangun masa depan pendidikan vokasi digital Indonesia.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-4 bg-white text-blue-700 rounded-xl font-black text-sm shadow-xl shadow-blue-900/20 hover:bg-blue-50 transition-all active:scale-95 uppercase tracking-wide">
                        Daftar Jadi Mitra
                    </a>
                    <a href="#" class="w-full sm:w-auto px-8 py-4 bg-transparent border-2 border-white/30 text-white rounded-xl font-black text-sm hover:bg-white/10 transition-all uppercase tracking-wide">
                        Download Portofolio Sekolah
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap');
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>
@endpush
@endsection
