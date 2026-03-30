<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - {{ $applicant->full_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: A4;
                margin: 0;
            }
            body { 
                background: white;
                -webkit-print-color-adjust: exact;
            }
            .no-print { display: none !important; }
            .print-padding { padding: 40px !important; }
            .shadow-custom { box-shadow: none !important; border: 1px solid #eee !important; }
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="p-8">
    
    <div class="max-w-[210mm] mx-auto bg-white p-12 shadow-2xl rounded-3xl print-padding shadow-custom">
        
        <!-- Header / Letterhead -->
        <div class="flex items-center gap-8 border-b-4 border-blue-600 pb-8 mb-10">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-24 object-contain shrink-0">
            <div class="flex-1">
                <h1 class="text-2xl font-black text-gray-900 leading-tight">YAYASAN MAHA PUTRA CERDAS UTAMA</h1>
                <h2 class="text-3x font-black text-blue-600 tracking-tight">SMKS MAHAPUTRA CERDAS UTAMA</h2>
                <p class="text-[11px] text-gray-500 font-bold uppercase mt-1 tracking-widest">Akreditasi A • Jl. Raya No. 123, Kabupaten Bandung, Jawa Barat</p>
                <div class="flex items-center gap-4 mt-2 text-[10px] font-bold text-gray-400">
                    <span>Telp: (022) 123 4567</span>
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                    <span>Website: www.smksmahaputra.sch.id</span>
                </div>
            </div>
            <div class="text-right shrink-0">
                <div class="inline-block px-4 py-2 bg-blue-50 border border-blue-100 rounded-2xl text-[10px] font-black text-blue-600 uppercase tracking-tighter">
                    Formulir F1-PPDB
                </div>
            </div>
        </div>

        <!-- Document Title -->
        <div class="text-center mb-12 relative">
            <div class="absolute inset-0 flex items-center justify-center opacity-[0.03] -z-10">
                <h1 class="text-8xl font-black uppercase">PPDB 2026</h1>
            </div>
            <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">BIODATA PENDAFTARAN SISWA BARU</h3>
            <p class="text-sm text-blue-600 font-bold mt-1">Tahun Pelajaran 2026/2027</p>
        </div>

        <div class="grid grid-cols-1 gap-12">
            
            <!-- Student Bio -->
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-6 bg-blue-600 rounded"></div>
                    <h4 class="text-sm font-black text-gray-900 uppercase tracking-widest">I. Data Calon Siswa</h4>
                </div>
                <div class="grid grid-cols-1 gap-4 ml-5">
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">No. Pendaftaran</span>
                        <span class="font-black text-blue-600">: {{ $applicant->registration_number }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Program Keahlian</span>
                        <span class="font-bold text-gray-900">: {{ $applicant->major }} ({{ $applicant->major == 'PPLG' ? 'Pengembangan Perangkat Lunak & Gim' : 'Desain Komunikasi Visual' }})</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Nama Lengkap</span>
                        <span class="font-bold text-gray-900">: {{ $applicant->full_name }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Email</span>
                        <span class="font-bold text-blue-600">: {{ $applicant->email ?? '-' }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">NISN</span>
                        <span class="font-bold text-gray-900">: {{ $applicant->nisn }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Tempat, Tgl Lahir</span>
                        <span class="font-bold text-gray-900">: {{ $applicant->birth_place }}, {{ \Carbon\Carbon::parse($applicant->birth_date)->format('d F Y') }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Jenis Kelamin</span>
                        <span class="font-bold text-gray-900">: {{ $applicant->gender == 'Male' ? 'Laki-laki' : 'Perempuan' }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Agama</span>
                        <span class="font-bold text-gray-900">: {{ $applicant->religion }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Sekolah Asal</span>
                        <span class="font-bold text-gray-900">: {{ $applicant->school_origin }}</span>
                    </div>
                    <div class="flex border-b border-gray-50 pb-3">
                        <span class="w-48 text-[11px] font-bold text-gray-400 uppercase">Alamat Lengkap</span>
                        <span class="font-bold text-gray-900 flex-1 leading-relaxed">: {{ $applicant->address }}</span>
                    </div>
                </div>
            </div>

            <!-- Parent Bio -->
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-6 bg-blue-600 rounded"></div>
                    <h4 class="text-sm font-black text-gray-900 uppercase tracking-widest">II. Data Orang Tua / Wali</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6 ml-5">
                    <!-- Ayah -->
                    <div class="space-y-4">
                        <h5 class="text-[10px] font-black text-blue-600 uppercase border-l-4 border-blue-600 pl-2">Data Ayah</h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">Nama Ayah</p>
                                <p class="text-sm font-bold text-gray-800">{{ $applicant->father_name }}</p>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">Pekerjaan</p>
                                <p class="text-sm font-bold text-gray-800">{{ $applicant->father_job }}</p>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">No. HP</p>
                                <p class="text-sm font-bold text-gray-800">{{ $applicant->father_phone }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Ibu -->
                    <div class="space-y-4">
                        <h5 class="text-[10px] font-black text-pink-500 uppercase border-l-4 border-pink-500 pl-2">Data Ibu</h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">Nama Ibu</p>
                                <p class="text-sm font-bold text-gray-800">{{ $applicant->mother_name }}</p>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">Pekerjaan</p>
                                <p class="text-sm font-bold text-gray-800">{{ $applicant->mother_job }}</p>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">No. HP</p>
                                <p class="text-sm font-bold text-gray-800">{{ $applicant->mother_phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2 pt-4 border-t border-gray-50 flex items-center justify-between">
                        <div>
                            <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">Total Penghasilan Per Bulan</p>
                            <p class="text-sm font-bold text-gray-800 text-blue-600">{{ $applicant->parent_income }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[9px] font-bold text-gray-400 uppercase mb-1">Metode Pendaftaran</p>
                            <p class="text-xs font-bold text-emerald-600">Online Submission</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer / TTD -->
            <div class="mt-20">
                <div class="flex justify-between items-end">
                    <div class="text-center">
                        <p class="text-[11px] text-gray-400 font-bold mb-20 uppercase tracking-widest">Panitia PPDB</p>
                        <div class="w-48 border-b border-gray-900 mx-auto mb-2"></div>
                        <p class="text-[11px] font-black uppercase tracking-widest text-gray-900">Petugas Pendaftaran</p>
                    </div>

                    <div class="text-center">
                        <p class="text-[11px] text-gray-400 font-bold mb-20 uppercase tracking-widest">Orang Tua / Wali Siswa</p>
                        <div class="w-48 border-b border-gray-900 mx-auto mb-2"></div>
                        <p class="text-[11px] font-black uppercase tracking-widest text-gray-900">{{ $applicant->father_name }}</p>
                    </div>

                    <div class="text-center">
                        <p class="text-[11px] text-gray-400 font-bold uppercase tracking-widest mb-1">Bandung, {{ date('d F Y') }}</p>
                        <p class="text-[11px] text-gray-400 font-bold mb-16 uppercase tracking-widest">Calon Siswa</p>
                        <div class="w-48 border-b border-gray-900 mx-auto mb-2"></div>
                        <p class="text-[11px] font-black uppercase tracking-widest text-gray-900">{{ $applicant->full_name }}</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Actions Floating Button -->
    <div class="fixed bottom-12 left-1/2 -translate-x-1/2 flex items-center gap-4 no-print z-[100]">
        <button onclick="window.print()" class="px-8 py-4 bg-[#1e88e5] text-white rounded-2xl font-black shadow-2xl hover:bg-blue-600 hover:-translate-y-1 transition-all flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            CETAK / UNDUH PDF
        </button>
        <button onclick="window.close()" class="px-8 py-4 bg-white text-gray-700 rounded-2xl font-black shadow-2xl border hover:bg-gray-50 transition-all">
            TUTUP HALAMAN
        </button>
    </div>

</body>
</html>
