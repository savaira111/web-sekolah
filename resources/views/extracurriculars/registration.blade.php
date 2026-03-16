@extends('layouts.app')

@section('title', 'Pendaftaran Eskul - SMKS Mahaputra')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs & Header -->
        <div class="mb-12">
            <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
                <div class="flex items-start gap-4">
                    <a href="{{ route('extracurriculars.index') }}" class="inline-flex items-center justify-center w-12 h-12 bg-white border border-gray-200 text-blue-600 rounded-full hover:bg-blue-50 hover:border-blue-200 transition-all shadow-sm shrink-0" title="Kembali">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </a>
                    <div class="space-y-2 mt-1 xl:mt-0">
                        <h1 class="text-4xl font-black text-[#0F172A] tracking-tight">Pendaftaran Eskul</h1>
                        <p class="text-gray-600 text-sm max-w-2xl leading-relaxed">Wujudkan potensimu melalui berbagai kegiatan ekstrakurikuler yang inspiratif di SMKS Mahaputra.</p>
                    </div>
                </div>
                <div class="bg-white px-6 py-3 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-3 shrink-0">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-sm font-bold text-gray-700">Tahun Ajaran 2025/2026</span>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-12">
            
            <!-- Left Side: Form & Preview -->
            <div class="lg:col-span-8 space-y-12">
                
                <!-- Registration Form Card -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-black text-[#0F172A]">Formulir Pendaftaran</h2>
                    </div>

                    <form action="{{ route('extracurriculars.registration.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-sm font-black text-gray-700 uppercase tracking-wider">Nama Lengkap</label>
                                <input type="text" name="name" required placeholder="Masukkan nama sesuai raport" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm">
                            </div>
                            <div class="space-y-3">
                                <label class="text-sm font-black text-gray-700 uppercase tracking-wider">Kelas</label>
                                <div class="relative">
                                    <select name="class" required class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm text-gray-700 appearance-none">
                                        <option value="">Pilih Kelas</option>
                                        <option value="X PPLG 1">X PPLG 1</option>
                                        <option value="X DKV 1">X DKV 1</option>
                                        <option value="XI PPLG 1">XI PPLG 1</option>
                                        <option value="XI DKV 1">XI DKV 1</option>
                                        <option value="XI DKV 2">XI DKV 2</option>
                                    </select>
                                    <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-sm font-black text-gray-700 uppercase tracking-wider">Pilih Ekstrakurikuler</label>
                            <div class="relative">
                                <select name="extracurricular" required class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm text-gray-700 appearance-none">
                                    <option value="">Pilih Ekstrakurikuler...</option>
                                    @foreach($extracurriculars as $eskul)
                                        <option value="{{ $eskul->name }}">{{ $eskul->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-sm font-black text-gray-700 uppercase tracking-wider">Motivasi Bergabung</label>
                            <textarea name="motivation" required placeholder="Ceritakan alasan Anda ingin bergabung dengan kegiatan ini..." class="w-full p-5 bg-gray-50 rounded-3xl border-none focus:ring-2 focus:ring-blue-100 text-sm h-40 leading-relaxed"></textarea>
                        </div>

                        <div class="pt-6">
                             <button type="submit" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-black text-lg shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-4 group">
                                Daftar Sekarang
                                <svg class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 5l7 7-7 7M5 12h15"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Schedule Preview Card -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100 overflow-hidden">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-black text-[#0F172A]">Pratinjau Jadwal Mingguan</h2>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50/50 rounded-2xl">
                                    <th class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Kegiatan</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Hari</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Waktu</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach($extracurriculars as $eskul)
                                    <tr class="group hover:bg-gray-50/30 transition-colors">
                                        <td class="px-6 py-5 font-bold text-[#0F172A]">{{ $eskul->name }}</td>
                                        <td class="px-6 py-5 text-gray-500">
                                            @if($eskul->weekly_schedule)
                                                {{ implode(', ', array_keys($eskul->weekly_schedule)) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-5 text-gray-500">
                                            @if($eskul->weekly_schedule)
                                                @foreach($eskul->weekly_schedule as $day => $time)
                                                    {{ $time }}{{ !$loop->last ? ', ' : '' }}
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-5 text-gray-500 font-bold">{{ $eskul->schedule_info ?? 'TBA' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- Right Side: Info & Help -->
            <div class="lg:col-span-4 space-y-8">
                
                <!-- Why Join Card -->
                <div class="bg-blue-600 rounded-[3rem] p-10 text-white space-y-10 shadow-2xl shadow-blue-500/20 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 blur-3xl rounded-full translate-x-12 -translate-y-12"></div>
                    <div class="absolute top-1/2 left-1/2 w-40 h-40 bg-white/5 blur-3xl rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                    
                    <h4 class="text-3xl font-black leading-tight">Mengapa <br>Bergabung?</h4>
                    
                    <div class="space-y-8">
                        <div class="flex gap-6 group transition-all duration-500">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-[1.25rem] border border-white/20 flex items-center justify-center shrink-0 group-hover:bg-white group-hover:text-blue-600 transition-all duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h5 class="font-black">Skill Development</h5>
                                <p class="text-xs text-blue-100 leading-relaxed">Kembangkan bakat teknis dan non-teknis di bawah bimbingan pelatih profesional.</p>
                            </div>
                        </div>
                        <div class="flex gap-6 group transition-all duration-500">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-[1.25rem] border border-white/20 flex items-center justify-center shrink-0 group-hover:bg-white group-hover:text-blue-600 transition-all duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h5 class="font-black">Social Networking</h5>
                                <p class="text-xs text-blue-100 leading-relaxed">Perluas lingkaran pertemanan dan pelajari kerja sama tim yang solid.</p>
                            </div>
                        </div>
                        <div class="flex gap-6 group transition-all duration-500">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-[1.25rem] border border-white/20 flex items-center justify-center shrink-0 group-hover:bg-white group-hover:text-blue-600 transition-all duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h5 class="font-black">Achievement</h5>
                                <p class="text-xs text-blue-100 leading-relaxed">Raih prestasi di berbagai tingkat kompetisi dan banggakan sekolah.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="bg-white rounded-[3rem] border border-gray-100 p-10 space-y-8 shadow-sm">
                    <h4 class="text-xl font-bold text-[#0F172A] border-l-4 border-blue-600 pl-4">Butuh Bantuan?</h4>
                    <div class="space-y-4">
                        <div class="flex items-center gap-6 p-4 bg-gray-50 rounded-2xl group cursor-pointer transition-colors hover:bg-white hover:shadow-lg hover:shadow-gray-100">
                            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-500 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="space-y-0.5">
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Email Admin</p>
                                <p class="font-black text-[#0F172A] text-sm">kesiswaan@mahaputra.sch.id</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 p-4 bg-gray-50 rounded-2xl group cursor-pointer transition-colors hover:bg-white hover:shadow-lg hover:shadow-gray-100">
                            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-green-500 transition-transform">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.996-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.224-3.82l.303.18c1.397.83 3.009 1.269 4.655 1.269l.006.001c5.236 0 9.503-4.265 9.505-9.501.002-2.538-.99-4.923-2.791-6.726s-4.188-2.793-6.722-2.793c-5.238 0-9.503 4.267-9.506 9.505-.001 1.714.463 3.391 1.341 4.866l.197.33-1.003 3.666 3.755-.986zm11.455-6.533c-.301-.15-1.777-.878-2.053-.977-.275-.099-.475-.15-.675.15-.199.301-.776.977-.951 1.178-.175.199-.35.226-.65.075-.3-.15-1.265-.466-2.411-1.487-.893-.797-1.493-1.782-1.67-2.083-.175-.301-.018-.464.133-.613.135-.133.301-.35.45-.526.15-.175.199-.301.301-.502.1-.199.05-.376-.026-.526-.075-.15-.675-1.628-.925-2.23-.244-.582-.493-.504-.675-.513-.175-.01-.375-.011-.575-.011s-.525.075-.8.376c-.275.301-1.05 1.026-1.05 2.507 0 1.481 1.075 2.909 1.225 3.109.15.199 2.113 3.227 5.122 4.526.716.309 1.274.494 1.708.632.716.228 1.369.196 1.885.118.574-.087 1.777-.726 2.028-1.43.25-.702.25-1.305.175-1.43-.075-.124-.275-.199-.576-.349z"/></svg>
                            </div>
                            <div class="space-y-0.5">
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">WhatsApp</p>
                                <p class="font-black text-[#0F172A] text-sm">+62 812-3456-7890</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Card -->
                <div class="bg-teal-700 h-64 rounded-[3rem] p-1 shadow-sm relative overflow-hidden group ring-8 ring-white">
                    <img src="https://static.promediateknologi.id/desktop/fallback/600x400.png" class="w-full h-full object-cover rounded-[2.5rem] opacity-50 contrast-125 transition-transform duration-1000">
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                         <div class="px-6 py-4 bg-white/90 backdrop-blur-md rounded-2xl flex items-center gap-4 shadow-2xl">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <span class="text-xs font-black text-[#0F172A]">Lokasi Kegiatan</span>
                         </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
