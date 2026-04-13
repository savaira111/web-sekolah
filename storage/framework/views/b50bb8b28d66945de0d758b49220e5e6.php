

<?php $__env->startSection('title', 'Profil Super Admin - SMKS Mahaputra'); ?>

<?php $__env->startSection('content'); ?>
<div x-data="{
    profile: {
        name: '<?php echo e(auth()->user()->name ?? 'Admin Utama'); ?>',
        email: '<?php echo e(auth()->user()->email ?? 'admin@mahaputra.sch.id'); ?>',
        phone: '081234567890',
        avatar_url: '<?php echo e(auth()->user()->avatar ? asset(auth()->user()->avatar) : ''); ?>'
    },
    new_avatar: null,
    passwords: {
        current_password: '',
        new_password: '',
        new_password_confirmation: ''
    },
    isSaving: false,
    async saveProfile() {
        this.isSaving = true;
        try {
            const formData = new FormData();
            formData.append('name', this.profile.name);
            formData.append('email', this.profile.email);
            if (this.new_avatar) {
                formData.append('avatar', this.new_avatar);
            }

            const response = await fetch('<?php echo e(route('superadmin.profile.update')); ?>', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: formData
            });

            const result = await response.json();

            if (response.ok) {
                Swal.fire({
                    title: 'Berhasil Diperbarui!',
                    html: `Informasi <b>${this.profile.name}</b> telah berhasil disimpan ke database.`,
                    icon: 'success',
                    confirmButtonColor: '#3B82F6',
                    borderRadius: '20px',
                    background: document.documentElement.classList.contains('dark') ? '#1E293B' : '#FFFFFF',
                    color: document.documentElement.classList.contains('dark') ? '#FFFFFF' : '#000000',
                }).then(() => {
                    window.location.reload();
                });
                // Update navigation text if necessary (though it requires a page reload to see layout changes)
            } else {
                throw new Error(result.message || 'Gagal memperbarui profil');
            }
        } catch (error) {
            Swal.fire({
                title: 'Error!',
                text: error.message,
                icon: 'error',
                confirmButtonColor: '#EF4444'
            });
        } finally {
            this.isSaving = false;
        }
    },
    async updatePassword() {
        if(!this.passwords.current_password || !this.passwords.new_password || !this.passwords.new_password_confirmation) {
            Swal.fire({
                title: 'Field Kosong',
                text: 'Mohon lengkapi semua data password.',
                icon: 'warning',
                confirmButtonColor: '#F97316'
            });
            return;
        }
        
        try {
            const response = await fetch('<?php echo e(route('superadmin.profile.password')); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify(this.passwords)
            });

            const result = await response.json();

            if (response.ok) {
                Swal.fire({
                    title: 'Keamanan Diperbarui!',
                    text: 'Password Anda telah berhasil diubah.',
                    icon: 'success',
                    confirmButtonColor: '#3B82F6',
                    borderRadius: '20px',
                    background: document.documentElement.classList.contains('dark') ? '#1E293B' : '#FFFFFF',
                    color: document.documentElement.classList.contains('dark') ? '#FFFFFF' : '#000000',
                });
                this.passwords = { current_password: '', new_password: '', new_password_confirmation: '' };
            } else {
                // Handle validation errors from Laravel
                let errorMsg = result.message || 'Gagal memperbarui password';
                if (result.errors) {
                    errorMsg = Object.values(result.errors).flat().join('<br>');
                }
                Swal.fire({
                    title: 'Gagal!',
                    html: errorMsg,
                    icon: 'error',
                    confirmButtonColor: '#EF4444'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan sistem.',
                icon: 'error',
                confirmButtonColor: '#EF4444'
            });
        }
    }
}" class="px-8 pb-10 flex-1 w-full max-w-[1400px]">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-8 mb-8 gap-6">
        <div class="flex items-center gap-5">
            <a href="/superadmin/dashboard" 
               class="w-12 h-12 rounded-2xl flex items-center justify-center transition-all duration-300 shadow-sm border"
               :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 text-gray-400 hover:text-white hover:bg-gray-800' : 'bg-white border-gray-100 text-gray-500 hover:text-gray-900 hover:bg-gray-50'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" 
                    :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Profil Saya</h2>
                <p class="text-sm font-medium transition-colors duration-300" 
                   :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola informasi dan pengaturan akun Anda.</p>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="max-w-5xl mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Sidebar: Avatar & Basic Info -->
            <div class="lg:col-span-1 space-y-8">
                <div class="rounded-[2.5rem] p-8 text-center transition-colors duration-300 shadow-lg border" 
                     :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 shadow-slate-900/50' : 'bg-white border-gray-100/50 shadow-slate-400/10'">
                    <div class="relative inline-block mb-6">
                        <div class="w-32 h-32 mx-auto rounded-full p-2 border-2 border-dashed transition-colors duration-300" 
                             :class="$store.theme.darkMode ? 'border-gray-700' : 'border-gray-200'">
                            <div class="w-full h-full rounded-full overflow-hidden bg-gray-100 relative group cursor-pointer" @click="$refs.avatarInput.click()">
                                <img :src="profile.avatar_url ? profile.avatar_url : 'https://ui-avatars.com/api/?name=' + profile.name + '&background=bfdbfe&color=1e3a8a'" alt="Admin Avatar" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <input type="file" x-ref="avatarInput" class="hidden" accept="image/*" @change="
                                    const file = $event.target.files[0];
                                    if (file) {
                                        new_avatar = file;
                                        const reader = new FileReader();
                                        reader.onload = (e) => profile.avatar_url = e.target.result;
                                        reader.readAsDataURL(file);
                                    }
                                ">
                            </div>
                        </div>
                        <span class="absolute bottom-2 right-4 w-6 h-6 bg-emerald-500 border-4 rounded-full" 
                              :class="$store.theme.darkMode ? 'border-[#111827]' : 'border-white'"></span>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-1 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'" x-text="profile.name"></h3>
                    <p class="text-blue-500 font-bold uppercase tracking-widest text-[10px] mb-2" x-text="profile.email"></p>
                    <p class="text-[10px] font-black uppercase text-gray-500 tracking-wider mb-6">Super Admin</p>
                    
                    <p class="text-xs transition-colors duration-300 mb-6 font-medium leading-relaxed" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Pengelola sistem dan konten utama Web Sekolah SMKS Mahaputra.</p>
                    
                    <div class="border-t pt-6 transition-colors duration-300" :class="$store.theme.darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[10px] font-bold uppercase transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Status Akun</span>
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'bg-emerald-900/30 text-emerald-400' : 'bg-emerald-50 text-emerald-600'">Aktif</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-bold uppercase transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-500' : 'text-gray-400'">Terakhir Login</span>
                            <span class="text-[10px] font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-300' : 'text-gray-900'">Hari ini, 08:30</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content: Forms -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Basic Info Form -->
                <div class="rounded-[2.5rem] p-8 lg:p-10 transition-colors duration-300 shadow-lg border relative overflow-hidden" 
                     :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 shadow-slate-900/50' : 'bg-white border-gray-100/50 shadow-slate-400/10'">
                    
                    <div x-show="isSaving" x-transition class="absolute inset-0 bg-white/50 dark:bg-black/50 backdrop-blur-[2px] z-10 flex items-center justify-center">
                        <div class="w-10 h-10 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
                    </div>

                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center transition-colors duration-300" 
                             :class="$store.theme.darkMode ? 'bg-blue-500/10 text-blue-400' : 'bg-blue-50 text-blue-600'">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Informasi Dasar</h3>
                            <p class="text-sm font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Perbarui informasi profil dan alamat email Anda.</p>
                        </div>
                    </div>

                    <form @submit.prevent="saveProfile" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Nama Lengkap</label>
                                <input type="text" x-model="profile.name" class="w-full rounded-2xl border px-5 py-3.5 outline-none focus:ring-4 transition-all text-sm font-medium" :class="$store.theme.darkMode ? 'bg-black/20 border-gray-700 text-white focus:ring-blue-500/10 focus:border-blue-500' : 'bg-gray-50 border-gray-200 text-gray-900 focus:ring-blue-500/5 focus:border-blue-500'">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Email</label>
                                <input type="email" x-model="profile.email" class="w-full rounded-2xl border px-5 py-3.5 outline-none focus:ring-4 transition-all text-sm font-medium" :class="$store.theme.darkMode ? 'bg-black/20 border-gray-700 text-white focus:ring-blue-500/10 focus:border-blue-500' : 'bg-gray-50 border-gray-200 text-gray-900 focus:ring-blue-500/5 focus:border-blue-500'">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Nomor Telepon</label>
                            <input type="text" x-model="profile.phone" class="w-full rounded-2xl border px-5 py-3.5 outline-none focus:ring-4 transition-all text-sm font-medium" :class="$store.theme.darkMode ? 'bg-black/20 border-gray-700 text-white focus:ring-blue-500/10 focus:border-blue-500' : 'bg-gray-50 border-gray-200 text-gray-900 focus:ring-blue-500/5 focus:border-blue-500'">
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-600/20 transition-all hover:translate-y-[-2px] active:translate-y-[0px] text-sm">
                                Simpan Perbaharuan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Security Section -->
                <div class="rounded-[2.5rem] p-8 lg:p-10 transition-colors duration-300 shadow-lg border" 
                     :class="$store.theme.darkMode ? 'bg-[#111827] border-gray-800 shadow-slate-900/50' : 'bg-white border-gray-100/50 shadow-slate-400/10'">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center transition-colors duration-300" 
                             :class="$store.theme.darkMode ? 'bg-amber-500/10 text-amber-500' : 'bg-amber-50 text-amber-600'">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold transition-colors duration-300" :class="$store.theme.darkMode ? 'text-white' : 'text-gray-900'">Keamanan & Password</h3>
                            <p class="text-sm font-medium transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Pastikan akun Anda menggunakan password yang aman.</p>
                        </div>
                    </div>

                    <form @submit.prevent="updatePassword" class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Password Saat Ini</label>
                            <input type="password" x-model="passwords.current_password" class="w-full rounded-2xl border px-5 py-3.5 outline-none focus:ring-4 transition-all text-sm font-medium" :class="$store.theme.darkMode ? 'bg-black/20 border-gray-700 text-white focus:ring-blue-500/10 focus:border-blue-500' : 'bg-gray-50 border-gray-200 text-gray-900 focus:ring-blue-500/5 focus:border-blue-500'" placeholder="••••••••">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Password Baru</label>
                                <input type="password" x-model="passwords.new_password" class="w-full rounded-2xl border px-5 py-3.5 outline-none focus:ring-4 transition-all text-sm font-medium" :class="$store.theme.darkMode ? 'bg-black/20 border-gray-700 text-white focus:ring-blue-500/10 focus:border-blue-500' : 'bg-gray-50 border-gray-200 text-gray-900 focus:ring-blue-500/5 focus:border-blue-500'" placeholder="••••••••">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 transition-colors duration-300" :class="$store.theme.darkMode ? 'text-gray-400' : 'text-gray-500'">Konfirmasi Password</label>
                                <input type="password" x-model="passwords.new_password_confirmation" class="w-full rounded-2xl border px-5 py-3.5 outline-none focus:ring-4 transition-all text-sm font-medium" :class="$store.theme.darkMode ? 'bg-black/20 border-gray-700 text-white focus:ring-blue-500/10 focus:border-blue-500' : 'bg-gray-50 border-gray-200 text-gray-900 focus:ring-blue-500/5 focus:border-blue-500'" placeholder="••••••••">
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-8 py-3.5 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-2xl shadow-lg shadow-amber-600/20 transition-all hover:translate-y-[-2px] active:translate-y-[0px] text-sm">
                                Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.superadmin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah\resources\views/superadmin/profile.blade.php ENDPATH**/ ?>