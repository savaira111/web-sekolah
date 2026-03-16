@extends('layouts.superadmin.app')
@section('title', 'Detail ' . $applicant->full_name . ' - Manajemen PPDB')

@section('content')
<div class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    
    @if(session('success'))
        <div class="mb-4 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-2xl flex items-center gap-3 animate-fade-in shadow-sm">
            <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif
    
    <!-- Breadcrumbs & Nav -->
    <div class="flex items-center gap-4 mt-8 mb-6">
        <a href="{{ route('superadmin.ppdb.index') }}" 
           class="p-2 rounded-xl border transition-all shadow-sm group" 
           :class="$store.theme.darkMode ? 'bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white' : 'bg-white border-gray-100 text-gray-400 hover:bg-gray-50 hover:text-gray-600'"
           title="Kembali ke Daftar">
            <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <div class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-widest">
            <span>Manajemen PPDB</span>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span>Pendaftar</span>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span :class="$store.theme.darkMode ? 'text-blue-400' : 'text-blue-600'">Detail {{ $applicant->full_name }}</span>
        </div>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8 group">
        <div class="flex items-center gap-6">
            <div class="w-24 h-24 rounded-3xl overflow-hidden border-4 shadow-lg shrink-0 transition-all duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-white'">
                <img src="{{ $applicant->profile_image ? asset('storage/' . $applicant->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($applicant->full_name) . '&background=0D8ABC&color=fff&size=128' }}" alt="Profile" class="w-full h-full object-cover">
            </div>
            <div>
                <div class="flex items-center gap-4 mb-1">
                    <h2 class="text-4xl font-extrabold tracking-tight transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">{{ $applicant->full_name }}</h2>
                     <span class="px-4 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" 
                          :class="$store.theme.darkMode ? 
                          ('{{ $applicant->status }}' === 'Menunggu Review' ? 'bg-amber-500/10 text-amber-500 border border-amber-500/20' : 
                           ('{{ $applicant->status }}' === 'Diterima' ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' : 
                            ('{{ $applicant->status }}' === 'Ditolak' ? 'bg-red-500/10 text-red-500 border border-red-500/20' : 'bg-gray-800 text-gray-400'))) : 
                          ('{{ $applicant->status }}' === 'Menunggu Review' ? 'bg-amber-50 text-amber-600 border border-amber-100' : 
                           ('{{ $applicant->status }}' === 'Diterima' ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 
                            ('{{ $applicant->status }}' === 'Ditolak' ? 'bg-red-50 text-red-600 border border-red-100' : 'bg-gray-50 text-gray-500')))">
                        {{ $applicant->status }}
                    </span>
                </div>
                <div class="flex items-center gap-3 text-sm font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">
                    <span class="px-2 py-0.5 rounded text-[11px] uppercase transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-gray-800 text-gray-400' : 'bg-gray-100 text-gray-500'">{{ $applicant->registration_number }}</span>
                    <span class="w-1 h-1 rounded-full transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-gray-700' : 'bg-gray-300'"></span>
                    <span>Dikirim pada {{ $applicant->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-6 py-3 border font-bold rounded-2xl transition-all shadow-sm" :class="$store.theme.darkMode ? 'bg-gray-800 border-gray-700 text-gray-300 hover:bg-gray-700' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                Edit
            </button>
            <form action="{{ route('superadmin.ppdb.status', $applicant->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="Ditolak">
                <button type="submit" class="flex items-center gap-2 px-6 py-3 border font-bold rounded-2xl transition-all" :class="$store.theme.darkMode ? 'bg-red-500/10 border-red-500/20 text-red-500 hover:bg-red-500/20' : 'bg-red-50 border-red-100 text-red-600 hover:bg-red-100'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Tolak
                </button>
            </form>
            <form action="{{ route('superadmin.ppdb.status', $applicant->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="Diterima">
                <button type="submit" class="flex items-center gap-2 px-8 py-3 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/25">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Terima Pendaftar
                </button>
            </form>
        </div>
    </div>

    <!-- Info Cards Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        <!-- Left & Center Column -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Personal Biodata -->
            <!-- Personal Biodata -->
            <div class="rounded-[2.5rem] p-10 border shadow-sm relative overflow-hidden transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center justify-between mb-10">
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-blue-50 text-blue-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-extrabold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Biodata Pribadi</h3>
                    </div>
                    <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700 underline underline-offset-4 decoration-2">Verifikasi Identitas</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Nama Lengkap</p>
                        <p class="text-[15px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->full_name }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Jenis Kelamin</p>
                        <p class="text-[15px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->gender == 'Male' ? 'Laki-laki' : 'Perempuan' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Tempat, Tanggal Lahir</p>
                        <p class="text-[15px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->birth_place }}, {{ \Carbon\Carbon::parse($applicant->birth_date)->format('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">NISN</p>
                        <p class="text-[15px] font-bold tracking-wider transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->nisn }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Agama</p>
                        <p class="text-[15px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->religion ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Kewarganegaraan</p>
                        <p class="text-[15px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->citizenship == 'Indonesian' ? 'WNI' : $applicant->citizenship }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Pilihan Jurusan</p>
                        <div class="flex items-center gap-3">
                            <span class="px-4 py-1.5 bg-blue-600 text-white rounded-xl text-xs font-black shadow-lg shadow-blue-500/20">{{ $applicant->major ?? '-' }}</span>
                            <span class="text-[11px] font-bold text-gray-400 italic">
                                @if($applicant->major == 'PPLG')
                                    Pengembangan Perangkat Lunak & Gim
                                @elseif($applicant->major == 'DKV')
                                    Desain Komunikasi Visual
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-[10px] font-extrabold uppercase tracking-widest mb-1.5 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Alamat Lengkap</p>
                        <p class="text-[15px] font-bold leading-relaxed transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->address }}</p>
                    </div>
                </div>
            </div>

            <!-- School Origin & Academic -->
            <div class="rounded-[2.5rem] p-10 border shadow-sm transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center gap-3 mb-10">
                    <div class="p-2.5 bg-purple-50 text-purple-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Sekolah Asal & Akademik</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                    <div>
                        <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Sekolah Sebelumnya</p>
                        <p class="text-[15px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->school_origin ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Tahun Lulus</p>
                        <p class="text-[15px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->graduation_year ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Rata-rata Nilai</p>
                        <div class="flex items-center gap-3">
                            <span class="text-2xl font-black text-blue-600">{{ $applicant->average_grade ?? '0.0' }}</span>
                            @if(($applicant->average_grade ?? 0) >= 90)
                                <span class="px-2.5 py-1 rounded text-[9px] font-bold uppercase tracking-widest transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-emerald-500/10 text-emerald-400' : 'bg-emerald-50 text-emerald-600'">Sangat Baik</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parent Information -->
            <div class="rounded-[2.5rem] p-10 border shadow-sm transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center gap-3 mb-10">
                    <div class="p-2.5 bg-orange-50 text-orange-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Informasi Orang Tua</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 gap-x-12">
                    <!-- Father -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-black text-blue-600 uppercase tracking-widest border-l-4 border-blue-600 pl-3">Data Ayah</h4>
                        <div class="space-y-4">
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Nama Lengkap Ayah</p>
                                <p class="text-[14px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->father_name }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Pekerjaan</p>
                                <p class="text-[14px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->father_job }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Nomor Telepon</p>
                                <p class="text-[14px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->father_phone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mother -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-black text-pink-500 uppercase tracking-widest border-l-4 border-pink-500 pl-3">Data Ibu</h4>
                        <div class="space-y-4">
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Nama Lengkap Ibu</p>
                                <p class="text-[14px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->mother_name }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Pekerjaan</p>
                                <p class="text-[14px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->mother_job }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Nomor Telepon</p>
                                <p class="text-[14px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->mother_phone }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 pt-4 border-t transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-50'">
                        <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Penghasilan Gabungan</p>
                        <p class="text-[14px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-200' : 'text-gray-800'">{{ $applicant->parent_income }}</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="space-y-8">
            
            <!-- Documents -->
            <!-- Documents -->
            <div class="rounded-[2.5rem] p-8 border shadow-sm transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="font-extrabold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Dokumen</h3>
                    </div>
                </div>

                <div class="space-y-3">
                    @php
                        $docs = [
                            ['label' => 'Formulir Pendaftaran', 'field' => 'doc_form'],
                            ['label' => 'Surat Pernyataan', 'field' => 'doc_pernyataan'],
                            ['label' => 'SKL SMP/MTs', 'field' => 'doc_skl'],
                            ['label' => 'SHUN / Hasil Ujian', 'field' => 'doc_shun'],
                            ['label' => 'Ijazah SMP/MTs', 'field' => 'doc_ijazah'],
                            ['label' => 'Ijazah SD/MI', 'field' => 'doc_ijazah_sd'],
                            ['label' => 'Akta Kelahiran', 'field' => 'doc_akta'],
                            ['label' => 'Kartu Keluarga', 'field' => 'doc_kk'],
                            ['label' => 'Ket. Domisili', 'field' => 'doc_domisili'],
                            ['label' => 'KTP Orang Tua', 'field' => 'doc_ktp_ortu'],
                            ['label' => 'Kesehatan Badan', 'field' => 'doc_sehat_badan'],
                            ['label' => 'Kesehatan Mata', 'field' => 'doc_sehat_mata'],
                            ['label' => 'Pas Foto 3x4', 'field' => 'profile_image'],
                            ['label' => 'PIP / KIP / Ket. Kematian', 'field' => 'doc_kip_pkh'],
                            ['label' => 'Sertifikat / Piagam', 'field' => 'doc_prestasi'],
                        ];
                    @endphp

                    @foreach($docs as $doc)
                        <div class="flex items-center justify-between p-3 rounded-2xl border transition-all" 
                             :class="$store.theme.darkMode ? 'bg-gray-800/50 border-gray-700 hover:border-blue-500/50' : 'bg-gray-50 border-gray-100 hover:border-blue-200 hover:bg-white'">
                            <div class="flex items-center gap-3 overflow-hidden">
                                <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 {{ $applicant->{$doc['field']} ? 'bg-emerald-100 text-emerald-600' : 'bg-gray-200 text-gray-400' }}">
                                    @if($applicant->{$doc['field']})
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    @else
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    @endif
                                </div>
                                <span class="text-[11px] font-bold transition-colors duration-300 truncate" :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-700'">{{ $doc['label'] }}</span>
                            </div>
                            @if($applicant->{$doc['field']})
                                <div class="flex items-center gap-2 shrink-0">
                                    <a href="{{ asset('storage/' . $applicant->{$doc['field']}) }}" target="_blank" 
                                       class="p-1.5 rounded-lg text-blue-500 hover:bg-blue-50 transition-colors" title="Lihat Dokumen">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                </div>
                            @else
                                <span class="text-[9px] font-bold text-gray-400 shrink-0 italic">Kosong</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Residence Location -->
            <!-- Residence Location -->
            <div class="rounded-[2.5rem] p-8 border shadow-sm relative overflow-hidden transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800' : 'bg-white border-gray-100/50'">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-rose-50 text-rose-600 rounded-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="font-extrabold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Lokasi Tempat Tinggal</h3>
                </div>
                
                <div class="rounded-2xl overflow-hidden h-48 bg-gray-100 border border-gray-100 relative group">
                    <!-- Fake Map Image or Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-emerald-50 opacity-50"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="relative">
                            <div class="w-6 h-6 bg-blue-600 rounded-full animate-ping absolute -inset-0 opacity-20"></div>
                            <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center relative shadow-lg shadow-blue-500/50">
                                <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <p class="text-[11px] font-bold uppercase tracking-widest leading-none transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Koordinat: -6.2234, 106.8123</p>
                    <button class="text-[10px] font-black text-blue-600 uppercase tracking-widest hover:underline">Buka G-Maps</button>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
