@extends('layouts.app')

@section('title', 'Formulir Pendaftaran - SMKS Mahaputra')

@section('content')
<div x-data="{ 
    step: {{ $errors->any() ? 1 : 1 }}, 
    maxStep: 3,
    showToast: false,
    toastMsg: '',
    showSuccessModal: @if(session('success_registration')) true @else false @endif,
    nextStep() { 
        if(this.validateStep()) {
            if(this.step < this.maxStep) this.step++ 
        }
    },
    prevStep() { if(this.step > 1) this.step-- },
    submitForm() { 
        if(this.validateStep()) {
            this.$refs.regForm.submit() 
        }
    },
    validateStep() {
        let currentStepEl = document.querySelector('[x-show=\'step === ' + this.step + '\']');
        let inputs = Array.from(currentStepEl.querySelectorAll('input[required], select[required], textarea[required]'));
        let isValid = true;
        
        inputs.forEach(input => {
            if (!this.validateInput(input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            this.triggerToast('Mohon lengkapi semua bidang yang wajib diisi');
        }
        return isValid;
    },
    validateInput(input) {
        if (!input.value.trim()) {
            input.classList.add('ring-2', 'ring-red-100', 'border-red-300');
            return false;
        } else {
            input.classList.remove('ring-2', 'ring-red-100', 'border-red-300');
            return true;
        }
    },
    triggerToast(msg) {
        this.toastMsg = msg;
        this.showToast = true;
        setTimeout(() => { this.showToast = false }, 3000);
    },
    doc_kk: '',
    doc_akta: '',
    doc_ijazah: '',
    doc_raport: '',
    doc_form: '',
    doc_pernyataan: '',
    doc_skl: '',
    doc_shun: '',
    doc_ijazah_sd: '',
    doc_domisili: '',
    doc_ktp_ortu: '',
    doc_sehat_badan: '',
    doc_sehat_mata: '',
    doc_kip_pkh: '',
    doc_prestasi: '',
    profile_image: ''
}" class="bg-gray-50 min-h-screen">

    <!-- Hero Section -->
    <section class="relative pt-12 pb-20 overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold tracking-widest uppercase border border-blue-100">
                PENDAFTARAN SISWA BARU 2024/2025
            </div>
            <h1 class="text-4xl lg:text-6xl font-bold text-[#0F172A] leading-tight">
                Mulai Perjalanan <br>
                <span class="text-blue-600">Hebatmu</span> Hari Ini
            </h1>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
                Hanya butuh 5 menit untuk mengisi data awal. Tim admin kami akan segera menghubungimu untuk proses selanjutnya.
            </p>
            <div class="flex justify-center pt-4">
                <a href="{{ asset('images/brosur-sekolah.jpg') }}" download="Brosur_SPMB_SMKS_Mahaputra_2026.jpg" class="inline-flex items-center gap-2 px-8 py-4 bg-orange-500 text-white rounded-full font-bold shadow-lg shadow-orange-200 hover:bg-orange-600 hover:-translate-y-1 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh Brosur SPMB
                </a>
            </div>
        </div>
    </section>

    <!-- Main Form Section -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-12">
                
                <!-- Left Sidebar: Progress & Info -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Progress Card -->
                    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-8 sticky top-24">
                        <h4 class="font-bold text-gray-400 text-xs uppercase tracking-widest">Progres Pendaftaran</h4>
                        <div class="space-y-6">
                            <div class="flex items-center gap-4 group transition-all" :class="step >= 1 ? 'opacity-100' : 'opacity-30'">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold shadow-lg" :class="step >= 1 ? 'bg-blue-600 text-white shadow-blue-200' : 'bg-gray-100 text-gray-400'">
                                    <template x-if="step > 1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </template>
                                    <span x-show="step <= 1">1</span>
                                </div>
                                <span class="font-bold text-gray-900">Data Diri</span>
                            </div>
                            <div class="flex items-center gap-4 group transition-all" :class="step >= 2 ? 'opacity-100' : 'opacity-30'">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold transition-all" :class="step >= 2 ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-gray-100 text-gray-400'">
                                    <template x-if="step > 2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </template>
                                    <span x-show="step <= 2">2</span>
                                </div>
                                <span class="font-bold" :class="step >= 2 ? 'text-gray-900' : 'text-gray-400'">Data Orang Tua</span>
                            </div>
                            <div class="flex items-center gap-4 group transition-all" :class="step >= 3 ? 'opacity-100' : 'opacity-30'">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold transition-all" :class="step >= 3 ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-gray-100 text-gray-400'">3</div>
                                <span class="font-bold" :class="step >= 3 ? 'text-gray-900' : 'text-gray-400'">Unggah Dokumen</span>
                            </div>
                        </div>
                        <div class="pt-6 border-t border-gray-50">
                            <div class="flex justify-between items-center text-[10px] font-bold text-gray-400 mb-2">
                                <span>Selesai</span>
                                <span x-text="step === 1 ? '33%' : (step === 2 ? '66%' : '100%')">33%</span>
                            </div>
                            <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-600 rounded-full transition-all duration-500" :style="'width: ' + (step === 1 ? '33%' : (step === 2 ? '66%' : '100%'))"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Card -->
                    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-6">
                        <h4 class="font-bold flex items-center gap-2 text-gray-900">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                            Jadwal PPDB
                        </h4>
                        <div class="space-y-4">
                            <div class="p-4 bg-blue-50 border-l-4 border-blue-600 rounded-r-xl">
                                <p class="text-[10px] font-bold text-blue-600 uppercase">Gelombang 1</p>
                                <p class="font-bold text-sm">Januari - Maret 2024</p>
                            </div>
                            <div class="p-4 bg-gray-50 border-l-4 border-gray-200 rounded-r-xl opacity-50">
                                <p class="text-[10px] font-bold text-gray-400 uppercase">Gelombang 2</p>
                                <p class="font-bold text-sm">April - Juni 2024</p>
                            </div>
                        </div>
                    </div>

                    <!-- Help Card -->
                    <div class="bg-blue-50 p-8 rounded-[2.5rem] border border-blue-100 space-y-4">
                        <h4 class="font-bold text-blue-900">Butuh Bantuan?</h4>
                        <p class="text-xs text-blue-700 leading-relaxed">Hubungi Admin kami jika Anda mengalami kesulitan dalam pendaftaran.</p>
                        <a href="#" class="flex justify-center w-full py-3 bg-blue-600 text-white rounded-xl font-bold text-xs uppercase shadow-lg shadow-blue-200">WhatsApp CS</a>
                    </div>
                </div>

                <!-- Right Content: The Form Areas -->
                <div class="lg:col-span-3">
                    <!-- Validation Toast -->
                    <div x-show="showToast" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                         class="fixed bottom-10 right-10 z-[110] bg-red-600 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span class="text-xs font-bold" x-text="toastMsg"></span>
                    </div>

                    <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data" x-ref="regForm" class="space-y-12">
                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-600 px-8 py-6 rounded-[2rem] mb-12 flex items-center gap-4">
                            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <div>
                                <p class="font-bold text-sm">Ada kesalahan dalam pendaftaran:</p>
                                <ul class="text-xs list-disc list-inside mt-1 opacity-80">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @csrf
                    
                    <!-- Step 1: Data Diri -->
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-12">
                        <div class="bg-white rounded-[3rem] p-12 shadow-sm border border-gray-100">
                            <div class="mb-12">
                                <h2 class="text-2xl font-bold text-[#0F172A] flex items-center gap-4">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Langkah 1: Data Diri Calon Siswa
                                </h2>
                                <p class="text-gray-400 text-sm mt-3">Lengkapi informasi biodata Anda sesuai dengan kartu identitas atau akta kelahiran.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Nama Lengkap (Sesuai Ijazah)</label>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Muhammad Arkan" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Pilihan Jurusan</label>
                                    <select name="major" required @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-white rounded-2xl border border-gray-100 focus:ring-2 focus:ring-blue-100 text-sm text-gray-700 transition-all cursor-pointer">
                                        <option value="">Pilih Jurusan</option>
                                        <option value="PPLG" {{ old('major') == 'PPLG' ? 'selected' : '' }}>PPLG (Pengembangan Perangkat Lunak & Gim)</option>
                                        <option value="DKV" {{ old('major') == 'DKV' ? 'selected' : '' }}>DKV (Desain Komunikasi Visual)</option>
                                    </select>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">NISN</label>
                                    <input type="text" name="nisn" value="{{ old('nisn') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="10 digit nomor NISN" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Tempat Lahir</label>
                                    <input type="text" name="birth_place" value="{{ old('birth_place') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Bandung" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Tanggal Lahir</label>
                                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm text-gray-700 transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Asal Sekolah</label>
                                    <input type="text" name="school_origin" value="{{ old('school_origin') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: SMPN 1 Jakarta" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Tahun Lulus</label>
                                    <input type="number" name="graduation_year" value="{{ old('graduation_year') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 2024" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Rata-rata Nilai Ijazah/Raport</label>
                                    <input type="number" step="0.01" name="average_grade" value="{{ old('average_grade') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 85.50" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Jenis Kelamin</label>
                                    <select name="gender" required @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-white rounded-2xl border border-gray-100 focus:ring-2 focus:ring-blue-100 text-sm text-gray-700 transition-all cursor-pointer">
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Agama</label>
                                    <select name="religion" required @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-white rounded-2xl border border-gray-100 focus:ring-2 focus:ring-blue-100 text-sm text-gray-700 transition-all cursor-pointer">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen (Protestan)</option>
                                        <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Khonghucu" {{ old('religion') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                    </select>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Kewarganegaraan</label>
                                    <select name="citizenship" required @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-white rounded-2xl border border-gray-100 focus:ring-2 focus:ring-blue-100 text-sm text-gray-700 transition-all cursor-pointer">
                                        <option value="WNI" {{ old('citizenship') == 'WNI' ? 'selected' : '' }}>WNI (Warga Negara Indonesia)</option>
                                        <option value="WNA" {{ old('citizenship') == 'WNA' ? 'selected' : '' }}>WNA (Warga Negara Asing)</option>
                                    </select>
                                </div>
                            </div>

                                <div class="pt-12 border-t border-gray-50 flex justify-end">
                                    <button @click="nextStep()" type="button" class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all flex items-center gap-3">
                                        Langkah Berikutnya
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    <!-- Step 2: Data Orang Tua -->
                    <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-12">
                        <div class="bg-white rounded-[3rem] p-12 shadow-sm border border-gray-100">
                            <div class="mb-12">
                                <h2 class="text-2xl font-bold text-[#0F172A] flex items-center gap-4">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    Langkah 2: Data Orang Tua
                                </h2>
                                <p class="text-gray-400 text-sm mt-3">Lengkapi informasi data orang tua atau wali murid sesuai dengan dokumen resmi.</p>
                            </div>

                            <div class="space-y-10">
                                <!-- Ayah Section -->
                                <div class="space-y-6">
                                    <h3 class="font-bold flex items-center gap-3 text-gray-900 border-l-4 border-blue-600 pl-4">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        Data Ayah Kandung
                                    </h3>
                                    <div class="grid md:grid-cols-2 gap-8">
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Nama Lengkap Ayah</label>
                                            <input type="text" name="father_name" value="{{ old('father_name') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Ahmad Subarja" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Pekerjaan Ayah</label>
                                            <select name="father_job" @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-white rounded-2xl border border-gray-100 text-sm text-gray-700 transition-all focus:ring-2 focus:ring-blue-100 cursor-pointer">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="PNS" {{ old('father_job') == 'PNS' ? 'selected' : '' }}>PNS / ASN</option>
                                                <option value="TNI/POLRI" {{ old('father_job') == 'TNI/POLRI' ? 'selected' : '' }}>TNI / POLRI</option>
                                                <option value="Karyawan Swasta" {{ old('father_job') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                                <option value="Wiraswasta" {{ old('father_job') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta / Pengusaha</option>
                                                <option value="Buruh" {{ old('father_job') == 'Buruh' ? 'selected' : '' }}>Buruh / Pekerja Lepas</option>
                                                <option value="Petani/Nelayan" {{ old('father_job') == 'Petani/Nelayan' ? 'selected' : '' }}>Petani / Nelayan</option>
                                                <option value="Pedagang" {{ old('father_job') == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                                                <option value="Pensiunan" {{ old('father_job') == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                                <option value="Lainnya" {{ old('father_job') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">No. HP Ayah (WhatsApp)</label>
                                            <input type="text" name="father_phone" value="{{ old('father_phone') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 0812xxxxxxxx" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
                                        </div>
                                    </div>
                                </div>

                                <!-- Ibu Section -->
                                <div class="space-y-6 pt-8">
                                    <h3 class="font-bold flex items-center gap-3 text-gray-900 border-l-4 border-pink-500 pl-4">
                                        <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        Data Ibu Kandung
                                    </h3>
                                    <div class="grid md:grid-cols-2 gap-8">
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Nama Lengkap Ibu</label>
                                            <input type="text" name="mother_name" value="{{ old('mother_name') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Siti Aminah" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Pekerjaan Ibu</label>
                                            <select name="mother_job" @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-white rounded-2xl border border-gray-100 text-sm text-gray-700 transition-all focus:ring-2 focus:ring-blue-100 cursor-pointer">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Ibu Rumah Tangga" {{ old('mother_job') == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                                <option value="PNS" {{ old('mother_job') == 'PNS' ? 'selected' : '' }}>PNS / ASN</option>
                                                <option value="Karyawan Swasta" {{ old('mother_job') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                                <option value="Wiraswasta" {{ old('mother_job') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta / Pengusaha</option>
                                                <option value="Pedagang" {{ old('mother_job') == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                                                <option value="Petani/Nelayan" {{ old('mother_job') == 'Petani/Nelayan' ? 'selected' : '' }}>Petani / Nelayan</option>
                                                <option value="Buruh" {{ old('mother_job') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                                <option value="Lainnya" {{ old('mother_job') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">No. HP Ibu (WhatsApp)</label>
                                            <input type="text" name="mother_phone" value="{{ old('mother_phone') }}" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 0813xxxxxxxx" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
                                        </div>
                                    </div>
                                </div>

                                <!-- Informasi Tambahan -->
                                <div class="space-y-6 pt-8">
                                    <h3 class="font-bold flex items-center gap-3 text-gray-900 border-l-4 border-orange-400 pl-4">
                                        <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Informasi Tambahan
                                    </h3>
                                    <div class="space-y-6">
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Alamat Lengkap Orang Tua</label>
                                            <textarea name="address" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Jl. Raya No. 123, Kel. Merdeka, Kec. Maju Jaya, Kota Bandung" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm h-32 transition-all focus:ring-2 focus:ring-blue-100">{{ old('address') }}</textarea>
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Penghasilan Gabungan Per Bulan</label>
                                            <select name="parent_income" @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-white rounded-2xl border border-gray-100 text-sm text-gray-700 transition-all focus:ring-2 focus:ring-blue-100 cursor-pointer">
                                                <option value="">Pilih Rentang Penghasilan</option>
                                                <option value="< 2.000.000" {{ old('parent_income') == '< 2.000.000' ? 'selected' : '' }}>< Rp 2.000.000</option>
                                                <option value="2.000.000 - 5.000.000" {{ old('parent_income') == '2.000.000 - 5.000.000' ? 'selected' : '' }}>Rp 2.000.000 - Rp 5.000.000</option>
                                                <option value="> 5.000.000" {{ old('parent_income') == '> 5.000.000' ? 'selected' : '' }}>> Rp 5.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-12 border-t border-gray-50 flex justify-between items-center">
                                    <button @click="prevStep()" type="button" class="flex items-center gap-2 text-gray-400 font-bold text-sm group">
                                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                        Kembali
                                    </button>
                                    <button @click="nextStep()" type="button" class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all flex items-center gap-3">
                                        Langkah Berikutnya
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>

                    <!-- Step 3: Unggah Dokumen -->
                    <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-12">
                        <div class="bg-white rounded-[3rem] p-12 shadow-sm border border-gray-100">
                            <div class="mb-12">
                                <h2 class="text-2xl font-bold text-[#0F172A] flex items-center gap-4">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                    Langkah 3: Unggah Berkas Pendaftaran
                                </h2>
                                <p class="text-gray-400 text-sm mt-3">Silakan unggah dokumen persyaratan dalam format Gambar (JPG/PNG) atau PDF. Maksimal ukuran file 2MB per dokumen.</p>
                            </div>

                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                                <!-- 1. Formulir -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">1. Formulir Pendaftaran</label>
                                    <div @click="$refs.formInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_form" x-ref="formInput" class="hidden" @change="doc_form = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_form ? doc_form : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2. Surat Pernyataan -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">2. Surat Pernyataan</label>
                                    <div @click="$refs.pernyataanInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_pernyataan" x-ref="pernyataanInput" class="hidden" @change="doc_pernyataan = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_pernyataan ? doc_pernyataan : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3. SKL -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">3. SKL (dilegalisir)</label>
                                    <div @click="$refs.sklInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_skl" x-ref="sklInput" class="hidden" @change="doc_skl = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_skl ? doc_skl : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 4. SHUN -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">4. SHUN / Hasil Ujian</label>
                                    <div @click="$refs.shunInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_shun" x-ref="shunInput" class="hidden" @change="doc_shun = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_shun ? doc_shun : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 5. Ijazah SMP -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">5. Ijazah SMP/MTs</label>
                                    <div @click="$refs.ijazahInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_ijazah" x-ref="ijazahInput" class="hidden" @change="doc_ijazah = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_ijazah ? doc_ijazah : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 6. Ijazah SD -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">6. Ijazah SD/MI</label>
                                    <div @click="$refs.ijazahSdInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_ijazah_sd" x-ref="ijazahSdInput" class="hidden" @change="doc_ijazah_sd = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_ijazah_sd ? doc_ijazah_sd : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 7. Akta -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">7. Akta Kelahiran</label>
                                    <div @click="$refs.aktaInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_akta" x-ref="aktaInput" class="hidden" @change="doc_akta = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_akta ? doc_akta : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 8. KK -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">8. Kartu Keluarga</label>
                                    <div @click="$refs.kkInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_kk" x-ref="kkInput" class="hidden" @change="doc_kk = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_kk ? doc_kk : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 9. Domisili -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">9. Keterangan Domisili</label>
                                    <div @click="$refs.domisiliInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_domisili" x-ref="domisiliInput" class="hidden" @change="doc_domisili = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_domisili ? doc_domisili : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 10. KTP Ortu -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">10. KTP Orang Tua</label>
                                    <div @click="$refs.ktpInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_ktp_ortu" x-ref="ktpInput" class="hidden" @change="doc_ktp_ortu = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_ktp_ortu ? doc_ktp_ortu : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 11. Sehat Badan -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">11. Ket. Kesehatan Badan</label>
                                    <div @click="$refs.sehatBadanInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_sehat_badan" x-ref="sehatBadanInput" class="hidden" @change="doc_sehat_badan = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_sehat_badan ? doc_sehat_badan : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 12. Sehat Mata -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">12. Ket. Kesehatan Mata</label>
                                    <div @click="$refs.sehatMataInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_sehat_mata" x-ref="sehatMataInput" class="hidden" @change="doc_sehat_mata = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_sehat_mata ? doc_sehat_mata : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 14. PIP / KIP -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">14. PIP / KIP / Ket. Kematian</label>
                                    <div @click="$refs.kipInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_kip_pkh" x-ref="kipInput" class="hidden" @change="doc_kip_pkh = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_kip_pkh ? doc_kip_pkh : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 15. Prestasi -->
                                <div class="space-y-2">
                                    <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">15. Sertifikat / Penghargaan</label>
                                    <div @click="$refs.prestasiInput.click()" class="relative group cursor-pointer">
                                        <input type="file" name="doc_prestasi" x-ref="prestasiInput" class="hidden" @change="doc_prestasi = $event.target.files[0].name">
                                        <div class="p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200 group-hover:border-blue-400 transition-all flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-gray-400 group-hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-[10px] font-bold text-gray-600 truncate" x-text="doc_prestasi ? doc_prestasi : 'Pilih File'"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 13. Pas Foto (Pas Foto 3x4) -->
                            <div class="space-y-4 mb-12">
                                <label class="text-sm font-bold text-gray-700">13. Pas Foto 3x4 (Hitam Putih/Warna)</label>
                                <input type="file" name="profile_image" x-ref="photoInput" class="hidden" @change="profile_image = $event.target.files[0].name" accept=".jpg,.jpeg,.png">
                                <div @click="$refs.photoInput.click()" class="border-2 border-dashed border-gray-200 rounded-[2rem] p-12 text-center hover:border-blue-400 transition-colors cursor-pointer group bg-gray-50/30">
                                    <svg class="w-10 h-10 mx-auto text-blue-400 transition-transform mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <p class="font-bold text-gray-900 text-sm" x-text="profile_image ? profile_image : 'Klik untuk unggah Pas Foto'"></p>
                                    <p class="text-[10px] text-gray-400 mt-2 italic text-center">Format PNG/JPG, Maksimal 2MB. Kertas Dove lebih disarankan.</p>
                                </div>
                            </div>

                            <div class="pt-12 border-t border-gray-50 flex justify-between items-center">
                                <button @click="prevStep()" type="button" class="flex items-center gap-2 text-gray-400 font-bold text-sm group">
                                    <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    Kembali
                                </button>
                                <button @click="submitForm()" type="button" class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all flex items-center gap-3">
                                    Selesaikan Pendaftaran
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                </div> <!-- closing lg:col-span-3 (line 157) -->
            </div> <!-- closing grid-cols-4 (line 88) -->

            <!-- Bottom Document Checklist -->
            <div class="mt-12 bg-white rounded-[3rem] p-12 shadow-sm border border-gray-100">
                <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-[#0F172A] flex items-center gap-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Persyaratan Dokumen Pendaftaran
                        </h3>
                        <p class="text-gray-400 text-xs mt-2">Siapkan dokumen-dokumen berikut untuk proses verifikasi lanjutan.</p>
                    </div>
                    <div class="px-4 py-2 bg-blue-50 rounded-xl">
                        <p class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Penting Diperhatikan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-8">
                    <!-- Column 1 -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">01</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Formulir Pendaftaran</p>
                                <p class="text-[10px] text-gray-400">Sudah diisi secara online / offline</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">02</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Surat Pernyataan</p>
                                <p class="text-[10px] text-gray-400">Dibubuhi Materai Rp 10.000</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">03</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy SKL SMP/MTs</p>
                                <p class="text-[10px] text-gray-400">Dilegalisir - 2 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">04</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy SHUN / Hasil Ujian</p>
                                <p class="text-[10px] text-gray-400">Dilegalisir - 2 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">05</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy Ijazah SMP/MTs</p>
                                <p class="text-[10px] text-gray-400">Dilegalisir - 2 Lembar</p>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">06</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy Ijazah SD/MI</p>
                                <p class="text-[10px] text-gray-400">Arsip - 1 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">07</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy Akte Kelahiran</p>
                                <p class="text-[10px] text-gray-400">Arsip - 2 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">08</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy Kartu Keluarga</p>
                                <p class="text-[10px] text-gray-400">Arsip - 2 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">09</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy Keterangan Domisili</p>
                                <p class="text-[10px] text-gray-400">(★★) - 2 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">10</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Copy KTP Orang Tua</p>
                                <p class="text-[10px] text-gray-400">Ayah & Ibu - Total 4 Lembar</p>
                            </div>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">11</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Surat Kesehatan Badan</p>
                                <p class="text-[10px] text-gray-400">(★★★) - 1 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">12</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Surat Kesehatan Mata</p>
                                <p class="text-[10px] text-gray-400">(★★★) - 1 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">13</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Pas Foto 3x4</p>
                                <p class="text-[10px] text-gray-400">Kertas Dove - 3 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">14</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">PIP / KIP / Ket. Kematian</p>
                                <p class="text-[10px] text-gray-400">(*) Jalur Khusus - 1 Lembar</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 font-bold text-xs">15</div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Sertifikat / Piagam</p>
                                <p class="text-[10px] text-gray-400">Opsional (Prestasi)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-50 grid md:grid-cols-2 gap-8">
                    <div class="flex gap-4 p-4 bg-gray-50 rounded-2xl">
                        <span class="text-blue-600 font-bold">(*)</span>
                        <p class="text-[10px] text-gray-500 leading-relaxed italic">Bagi pendaftar dari keluarga tidak mampu mendaftarkan melalui jalur afirmasi.</p>
                    </div>
                    <div class="flex gap-4 p-4 bg-gray-50 rounded-2xl">
                        <span class="text-blue-600 font-bold">(★★)</span>
                        <p class="text-[10px] text-gray-500 leading-relaxed italic">Apabila calon peserta didik baru bertempat tinggal tidak sesuai Kartu Keluarga.</p>
                    </div>
                    <div class="flex gap-4 p-4 bg-gray-50 rounded-2xl md:col-span-2">
                        <span class="text-blue-600 font-bold">(★★★)</span>
                        <p class="text-[10px] text-gray-500 leading-relaxed italic">Surat Keterangan Sehat (Badan & Mata/Tidak Buta Warna) dapat diperoleh dari Puskesmas atau dokter praktik berizin.</p>
                    </div>
                </div>
            </div>
        </div> <!-- closing max-w-7xl (line 87) -->
    </section> <!-- closing Main Form Section (line 86) -->

    <!-- Success Modal -->
    <div x-show="showSuccessModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[200] flex items-start justify-center p-8 bg-[#0F172A]/80 backdrop-blur-sm pt-20">
        
        <div @click.away="showSuccessModal = false" 
             x-show="showSuccessModal"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 scale-90 -translate-y-12"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             class="max-w-md w-full bg-white rounded-[3rem] p-12 text-center shadow-2xl relative overflow-hidden">
            
            <div class="absolute -top-24 -left-24 w-48 h-48 bg-green-50 rounded-full blur-3xl opacity-50"></div>
            
            <div class="relative z-10 space-y-8">
                <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto shadow-xl shadow-green-100 animate-bounce">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                </div>
                
                <div class="space-y-4">
                    <h2 class="text-3xl font-bold text-gray-900">Pendaftaran Berhasil!</h2>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ session('success_registration') }}</p>
                </div>

                <div class="pt-4">
                    <button @click="showSuccessModal = false" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-100 hover:bg-blue-700 transition-all">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
