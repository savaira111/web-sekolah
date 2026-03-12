@extends('layouts.app')

@section('title', 'Formulir Pendaftaran - SMKS Mahaputra')

@section('content')
<div x-data="{ 
    step: 1, 
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
    profile_image: ''
}" class="bg-gray-50 min-h-screen">

    <!-- Page Header -->
    <section class="pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                                    <input type="text" name="full_name" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Muhammad Arkan" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">NISN</label>
                                    <input type="text" name="nisn" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="10 digit nomor NISN" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Tempat Lahir</label>
                                    <input type="text" name="birth_place" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Bandung" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Tanggal Lahir</label>
                                    <input type="date" name="birth_date" required @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm text-gray-400 transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Asal Sekolah</label>
                                    <input type="text" name="school_origin" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: SMPN 1 Jakarta" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Tahun Lulus</label>
                                    <input type="number" name="graduation_year" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 2024" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Rata-rata Nilai Ijazah/Raport</label>
                                    <input type="number" step="0.01" name="average_grade" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 85.50" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Jenis Kelamin</label>
                                    <select name="gender" required @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm text-gray-400 transition-all">
                                        <option value="Male">Laki-laki</option>
                                        <option value="Female">Perempuan</option>
                                    </select>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Agama</label>
                                    <input type="text" name="religion" placeholder="Contoh: Islam" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
                                </div>
                                <div class="space-y-3">
                                    <label class="text-sm font-bold text-gray-700">Kewarganegaraan</label>
                                    <input type="text" name="citizenship" value="WNI" class="w-full p-5 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-blue-100 text-sm transition-all">
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
                                            <input type="text" name="father_name" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Ahmad Subarja" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Pekerjaan Ayah</label>
                                            <select name="father_job" @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm text-gray-400 transition-all focus:ring-2 focus:ring-blue-100">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="PNS">PNS</option>
                                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            </select>
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">No. HP Ayah (WhatsApp)</label>
                                            <input type="text" name="father_phone" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 0812xxxxxxxx" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
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
                                            <input type="text" name="mother_name" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: Siti Aminah" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Pekerjaan Ibu</label>
                                            <select name="mother_job" @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm text-gray-400 transition-all focus:ring-2 focus:ring-blue-100">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="PNS">PNS</option>
                                            </select>
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">No. HP Ibu (WhatsApp)</label>
                                            <input type="text" name="mother_phone" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Contoh: 0813xxxxxxxx" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm transition-all focus:ring-2 focus:ring-blue-100">
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
                                            <textarea name="address" required @blur="validateInput($event.target)" @input="validateInput($event.target)" placeholder="Jl. Raya No. 123, Kel. Merdeka, Kec. Maju Jaya, Kota Bandung" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm h-32 transition-all focus:ring-2 focus:ring-blue-100"></textarea>
                                        </div>
                                        <div class="space-y-3">
                                            <label class="text-sm font-bold text-gray-700">Penghasilan Gabungan Per Bulan</label>
                                            <select name="parent_income" @blur="validateInput($event.target)" @input="validateInput($event.target)" class="w-full p-5 bg-gray-50 rounded-2xl border-none text-sm text-gray-400 transition-all focus:ring-2 focus:ring-blue-100">
                                                <option value="">Pilih Rentang Penghasilan</option>
                                                <option value="< 2.000.000">< Rp 2.000.000</option>
                                                <option value="2.000.000 - 5.000.000">Rp 2.000.000 - Rp 5.000.000</option>
                                                <option value="> 5.000.000">> Rp 5.000.000</option>
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
                                    Langkah 3: Unggah Dokumen
                                </h2>
                                <p class="text-gray-400 text-sm mt-3">Lengkapi berkas pendaftaran Anda. Pastikan file terbaca dengan jelas (Maks. 2MB).</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-8 mb-12">
                                <!-- KK -->
                                <div class="space-y-4">
                                    <label class="text-sm font-bold text-gray-700">Kartu Keluarga (KK)</label>
                                    <input type="file" name="doc_kk" x-ref="kkInput" class="hidden" @change="doc_kk = $event.target.files[0].name" accept=".jpg,.jpeg,.png,.pdf">
                                    <div @click="$refs.kkInput.click()" class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-blue-400 transition-colors cursor-pointer group">
                                        <svg class="w-8 h-8 mx-auto text-gray-300 group-hover:text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="text-[10px] font-bold text-gray-400">Klik untuk unggah atau seret file <br><span class="text-[8px] font-normal">PNG, JPG atau PDF (MAKS. 2MB)</span></p>
                                    </div>
                                    <p class="text-[8px] text-gray-300" x-text="doc_kk ? doc_kk : 'File belum dipilih'"></p>
                                </div>
                                <!-- Akta -->
                                <div class="space-y-4">
                                    <label class="text-sm font-bold text-gray-700">Akta Kelahiran</label>
                                    <input type="file" name="doc_akta" x-ref="aktaInput" class="hidden" @change="doc_akta = $event.target.files[0].name" accept=".jpg,.jpeg,.png,.pdf">
                                    <div @click="$refs.aktaInput.click()" class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-blue-400 transition-colors cursor-pointer group">
                                        <svg class="w-8 h-8 mx-auto text-gray-300 group-hover:text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="text-[10px] font-bold text-gray-400">Klik untuk unggah atau seret file <br><span class="text-[8px] font-normal">PNG, JPG atau PDF (MAKS. 2MB)</span></p>
                                    </div>
                                    <p class="text-[8px] text-gray-300" x-text="doc_akta ? doc_akta : 'File belum dipilih'"></p>
                                </div>
                                <!-- Ijazah -->
                                <div class="space-y-4">
                                    <label class="text-sm font-bold text-gray-700">Ijazah / SKL</label>
                                    <input type="file" name="doc_ijazah" x-ref="ijazahInput" class="hidden" @change="doc_ijazah = $event.target.files[0].name" accept=".jpg,.jpeg,.png,.pdf">
                                    <div @click="$refs.ijazahInput.click()" class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-blue-400 transition-colors cursor-pointer group">
                                        <svg class="w-8 h-8 mx-auto text-gray-300 group-hover:text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="text-[10px] font-bold text-gray-400">Klik untuk unggah atau seret file <br><span class="text-[8px] font-normal">PNG, JPG atau PDF (MAKS. 2MB)</span></p>
                                    </div>
                                    <p class="text-[8px] text-gray-300" x-text="doc_ijazah ? doc_ijazah : 'File belum dipilih'"></p>
                                </div>
                                <!-- Raport -->
                                <div class="space-y-4">
                                    <label class="text-sm font-bold text-gray-700">Raport Semester 1-5</label>
                                    <input type="file" name="doc_raport" x-ref="raportInput" class="hidden" @change="doc_raport = $event.target.files[0].name" accept=".pdf">
                                    <div @click="$refs.raportInput.click()" class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-blue-400 transition-colors cursor-pointer group">
                                        <svg class="w-8 h-8 mx-auto text-gray-300 group-hover:text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="text-[10px] font-bold text-gray-400">Klik untuk unggah atau seret file <br><span class="text-[8px] font-normal">GABUNGKAN PDF (MAKS. 2MB)</span></p>
                                    </div>
                                    <p class="text-[8px] text-gray-300" x-text="doc_raport ? doc_raport : 'File belum dipilih'"></p>
                                </div>
                            </div>

                            <!-- Pas Foto Full Width -->
                            <div class="space-y-4 mb-12">
                                <label class="text-sm font-bold text-gray-700">Pas Foto (3x4)</label>
                                <input type="file" name="profile_image" x-ref="photoInput" class="hidden" @change="profile_image = $event.target.files[0].name" accept=".jpg,.jpeg,.png">
                                <div @click="$refs.photoInput.click()" class="border-2 border-dashed border-gray-200 rounded-[2rem] p-16 text-center hover:border-blue-400 transition-colors cursor-pointer group">
                                    <svg class="w-12 h-12 mx-auto text-blue-400 transition-transform mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <p class="font-bold text-gray-900" x-text="profile_image ? profile_image : 'Klik untuk unggah atau seret file pas foto'"></p>
                                    <p class="text-xs text-gray-400 mt-2">HANYA PNG, JPG ATAU JPEG (MAKS. 2MB)</p>
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
            <div class="mt-12 bg-white rounded-[3rem] p-12 shadow-sm border border-gray-100 space-y-10">
                <h3 class="text-xl font-bold text-[#0F172A] flex items-center gap-4">
                    <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Persyaratan Dokumen (Siapkan Dokumen Ini)
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 bg-green-50 text-green-500 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-700">Kartu Keluarga</p>
                            <p class="text-[8px] text-gray-400">Fotokopi/Scan Asli</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 bg-green-50 text-green-500 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-700">Akta Kelahiran</p>
                            <p class="text-[8px] text-gray-400">Fotokopi/Scan Asli</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 bg-green-50 text-green-500 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-700">Ijazah/SKL</p>
                            <p class="text-[8px] text-gray-400">Surat Keterangan Lulus</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 bg-green-50 text-green-500 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-700">Raport Smt 1-5</p>
                            <p class="text-[8px] text-gray-400">Nilai Min. 75</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 bg-green-50 text-green-500 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-700">Prestasi</p>
                            <p class="text-[8px] text-gray-400">Opsional</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 bg-green-50 text-green-500 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-700">KIP / PKH</p>
                            <p class="text-[8px] text-gray-400">Jalur Afirmasi</p>
                        </div>
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

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
