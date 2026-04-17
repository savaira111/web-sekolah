@extends('layouts.app')

@section('title', 'Seragam Sekolah - SMKS Mahaputra')

@section('content')
<!-- Hero Section -->
<section class="relative pt-16 pb-16 lg:pb-20 bg-cover bg-center overflow-hidden animate-fade-in min-h-[40vh] lg:min-h-[50vh]" style="background-image: url('{{ asset('images/card.jpg') }}');">
    <!-- Overlay for readability (softened) -->
    <div class="absolute inset-0 bg-white/70 z-0"></div>
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full z-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#1D82F6 1px, transparent 1px); background-size: 40px 40px;"></div>
    


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center -mt-6">
        <div class="space-y-3">
            <p class="text-blue-600 font-bold tracking-[0.3em] uppercase text-xs">ATRIBUT SISWA</p>
            <h1 class="text-4xl lg:text-5xl font-black text-[#0F172A] leading-tight">
                Ketentuan <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">Seragam</span> Sekolah
            </h1>
            <p class="text-lg lg:text-xl text-slate-500 max-w-3xl mx-auto leading-relaxed font-medium">
                Pakaian seragam SMKS Mahaputra Cerdas Utama yang mencerminkan kedisiplinan, kerapian, dan identitas kami sebagai siswa unggul.
            </p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="pt-6 pb-24 bg-white relative z-10" x-data="{ 
    currentVariantIndex: 0,
    variants: [
        { label: 'Kotak-kotak', baju: 'Baju Kotak-kotak', celana: 'Celana/Rok Hitam', image: '{{ asset('images/seragam/selasa.jpg') }}' },
        { label: 'Batik', baju: 'Baju Batik Mahaputra', celana: 'Celana/Rok Abu-abu', image: '{{ asset('images/seragam/selasa 2.jpg') }}' }
    ],
    nextVariant() { this.currentVariantIndex = (this.currentVariantIndex + 1) % this.variants.length },
    prevVariant() { this.currentVariantIndex = (this.currentVariantIndex - 1 + this.variants.length) % this.variants.length }
}">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 xl:gap-8">
            
            <!-- Notes Card -->
            <div class="bg-[#0F172A] rounded-[2rem] p-8 shadow-xl text-white relative overflow-hidden group border border-slate-700 md:col-span-2 lg:col-span-1 order-first lg:order-last h-fit self-start">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-blue-600/20 rounded-full blur-3xl group-hover:bg-blue-500/30 transition-all duration-500"></div>
                <div class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center font-bold text-xl mb-6 shadow-lg shadow-blue-900/50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Catatan Penting</h3>
                <p class="text-gray-300 text-sm leading-relaxed mb-4">
                    Saat jam pelajaran Olahraga wajib memakai pakaian Olahraga sekolah. Siswi berhijab wajib menggunakan jilbab sesuai ketentuan.
                </p>
            </div>

            <!-- Senin Card -->
            <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    Sn
                </div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-6 bg-gray-50 border border-gray-100">
                    <img src="{{ asset('images/seragam/senin.jpg') }}" alt="Seragam Senin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-4">Senin</h3>
                <ul class="space-y-4">
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-base font-medium">Baju Putih Osis lengkap (atribut, sabuk, lokasi, bed)</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-base font-medium">Celana/Rok Abu-abu</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-base font-medium">Sepatu Hitam Tali Putih/Hitam, Kaos Kaki Putih</span>
                    </li>
                </ul>
            </div>

            <!-- Selasa Card -->
            <div class="bg-gradient-to-br from-blue-50/50 to-indigo-50/50 rounded-[2rem] border border-blue-100 p-8 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden relative">
                <div class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center font-bold text-xl mb-6 shadow-lg shadow-blue-100 relative z-10">
                    Sl
                </div>
                
                <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-6 bg-white border border-blue-100 relative group/image">
                    <!-- Navigation Buttons -->
                    <button @click="prevVariant" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-blue-600 flex items-center justify-center shadow-md backdrop-blur-sm opacity-0 group-hover/image:opacity-100 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    
                    <button @click="nextVariant" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-blue-600 flex items-center justify-center shadow-md backdrop-blur-sm opacity-0 group-hover/image:opacity-100 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <!-- Images -->
                    <template x-for="(variant, index) in variants" :key="index">
                        <img x-show="currentVariantIndex === index"
                             :src="variant.image"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </template>

                    <!-- Page Indicators -->
                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                        <template x-for="(v, i) in variants" :key="i">
                            <div class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                                 :class="currentVariantIndex === i ? 'bg-blue-600 w-6' : 'bg-blue-200'"></div>
                        </template>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-bold text-[#0F172A]">Selasa</h3>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-blue-600 bg-blue-100 px-4 py-1.5 rounded-full" x-text="variants[currentVariantIndex].label"></span>
                </div>

                <ul class="space-y-4">
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-800 text-base font-bold" x-text="variants[currentVariantIndex].baju"></span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-base font-medium" x-text="variants[currentVariantIndex].celana"></span>
                    </li>
                </ul>
            </div>

            <!-- Rabu Card -->
            <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    Rb
                </div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-6 bg-gray-50 border border-gray-100">
                    <img src="{{ asset('images/seragam/rabu.jpg') }}" alt="Seragam Rabu" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-4">Rabu</h3>
                <ul class="space-y-4">
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-base font-medium">Seragam Khusus/Jurusan (PPLG / DKV)</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-base font-medium">Celana/Rok Hitam</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-base font-medium">Sepatu Hitam, Kaos Kaki Putih, Jas Almamater</span>
                    </li>
                </ul>
            </div>

            <!-- Kamis Card -->
            <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    Km
                </div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-6 bg-gray-50 border border-gray-100">
                    <img src="{{ asset('images/seragam/kamis.jpg') }}" alt="Seragam Kamis" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-4">Kamis</h3>
                <ul class="space-y-4">
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Baju Batik Mahaputra</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Celana/Rok Hitam</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Sepatu Hitam, Kaos Kaki Hitam</span>
                    </li>
                </ul>
            </div>

            <!-- Jumat Card -->
            <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    Jm
                </div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-6 bg-gray-50 border border-gray-100">
                    <img src="{{ asset('images/seragam/jumat.jpg') }}" alt="Seragam Jumat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-4">Jumat</h3>
                <ul class="space-y-4">
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Pakaian Pramuka Lengkap (Hasduk, Bed, Baret/Boni)</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Celana/Rok Pramuka</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Sepatu Hitam, Kaos Kaki Hitam Khusus Pramuka</span>
                    </li>
                </ul>
            </div>

            <!-- Olahraga Card -->
            <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    Or
                </div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-6 bg-gray-50 border border-gray-100">
                    <img src="{{ asset('images/seragam/olahraga.jpg') }}" alt="Seragam Olahraga" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="text-2xl font-bold text-[#0F172A] mb-4">Olahraga</h3>
                <ul class="space-y-4">
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Baju Olahraga Khas Sekolah</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Celana Training Sekolah</span>
                    </li>
                    <li class="flex gap-4">
                        <svg class="w-6 h-6 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-600 text-sm font-medium">Sepatu Olahraga Hitam/Putih, Kaos Kaki Putih/Hitam</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>

<script>
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }
</style>
@endsection
