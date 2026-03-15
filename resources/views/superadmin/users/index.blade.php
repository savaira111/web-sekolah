@extends('layouts.superadmin.app')
@section('title', 'User Management - Admin Mahput')

@section('content')
<div x-data="{ 
    darkMode: false, 
    isAddUserModalOpen: false, 
    isEditUserModalOpen: false,
    isDeleteModalOpen: false, 
    isSuccessModalOpen: false,
    isCreatedSuccessModalOpen: false,
    
    // Modal Konfirmasi Baru
    isRestoreConfirmOpen: false,
    isPermanentDeleteConfirmOpen: false,
    
    searchQuery: '',
    currentFilter: 'Semua',
    showTrash: false,
    
    // Password States
    showPw: false,
    showConfirmPw: false,
    
    users: [
        { id: 1, name: 'Johnathan Doe', email: 'john.doe@eduadmin.com', role: 'Admin', image: '{{ asset('images/guru-1.jpg') }}' },
        { id: 2, name: 'Jane Smith', email: 'jane.smith@eduadmin.com', role: 'Editor', image: '{{ asset('images/guru-2.jpg') }}' }
    ],

    trash: [],
    userToDelete: null,
    itemToRestore: null,
    itemToPermanentDelete: null,
    
    newUser: { name: '', email: '', role: 'Admin', password: '', confirm_password: '' },
    editingUser: { id: null, name: '', email: '', role: '', password: '', confirm_password: '' },

    // Password Validation Logic
    passwordValidations(pw) {
        return {
            length: pw.length >= 8,
            upper: /[A-Z]/.test(pw),
            lower: /[a-z]/.test(pw),
            number: /[0-9]/.test(pw),
            symbol: /[!@#$%^&*(),.?\':{}|<>]/.test(pw)
        }
    },

    isPasswordStrong(pw) {
        const v = this.passwordValidations(pw);
        return v.length && v.upper && v.lower && v.number && v.symbol;
    },
    
    addUser() {
        if(this.newUser.name && this.newUser.email && this.isPasswordStrong(this.newUser.password) && this.newUser.password === this.newUser.confirm_password) {
            const userToAdd = {
                id: Date.now(),
                name: this.newUser.name,
                email: this.newUser.email,
                role: this.newUser.role,
                image: 'https://ui-avatars.com/api/?name=' + encodeURIComponent(this.newUser.name) + '&background=random'
            };
            this.users.unshift(userToAdd);
            this.isAddUserModalOpen = false;
            this.newUser = { name: '', email: '', role: 'Admin', password: '', confirm_password: '' };
            this.isCreatedSuccessModalOpen = true;
        }
    },

    openEditModal(user) {
        this.editingUser = { ...user, password: '', confirm_password: '' };
        this.isEditUserModalOpen = true;
    },

    updateUser() {
        const index = this.users.findIndex(u => u.id === this.editingUser.id);
        if (index !== -1) {
            this.users[index] = { ...this.editingUser };
            this.isEditUserModalOpen = false;
        }
    },

    confirmDelete(user) {
        this.userToDelete = user;
        this.isDeleteModalOpen = true;
    },

    softDelete() {
        if (this.userToDelete) {
            const deletedAt = new Date();
            const autoDeleteDate = new Date();
            autoDeleteDate.setDate(deletedAt.getDate() + 7);

            this.trash.push({
                ...this.userToDelete,
                deleted_at: deletedAt.toLocaleString('id-ID'),
                expires_at: autoDeleteDate
            });

            this.users = this.users.filter(u => u.id !== this.userToDelete.id);
            this.isDeleteModalOpen = false;
            this.userToDelete = null;
            setTimeout(() => this.isSuccessModalOpen = true, 300);
        }
    },

    restoreUser() {
        if(this.itemToRestore) {
            this.users.push(this.itemToRestore);
            this.trash = this.trash.filter(t => t.id !== this.itemToRestore.id);
            this.isRestoreConfirmOpen = false;
            this.itemToRestore = null;
        }
    },

    destroyPermanently() {
        if(this.itemToPermanentDelete) {
            this.trash = this.trash.filter(t => t.id !== this.itemToPermanentDelete.id);
            this.isPermanentDeleteConfirmOpen = false;
            this.itemToPermanentDelete = null;
        }
    },

    getRemainingTime(expiresAt) {
        const now = new Date();
        const diff = expiresAt - now;
        if (diff <= 0) return 'Segera dihapus';
        
        const weeks = Math.floor(diff / (1000 * 60 * 60 * 24 * 7));
        const days = Math.floor((diff % (1000 * 60 * 60 * 24 * 7)) / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        
        let timeString = '';
        if (weeks > 0) timeString += weeks + 'w ';
        if (days > 0) timeString += days + 'd ';
        timeString += hours + 'h';
        return timeString;
    },
    
    get filteredUsers() {
        return this.users.filter(user => {
            const matchesSearch = user.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                 user.email.toLowerCase().includes(this.searchQuery.toLowerCase());
            const matchesRole = this.currentFilter === 'Semua' || user.role === this.currentFilter;
            return matchesSearch && matchesRole;
        });
    }
}" class="px-8 pb-8 flex-1 w-full max-w-[1400px]">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-8 mb-8 gap-4">
        <div>
            <h2 class="text-[32px] font-extrabold tracking-tight leading-none mb-2 transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'">Manajemen Pengguna</h2>
            <p class="text-sm font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Kelola akses dan hak akses untuk staf sekolah.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button @click="showTrash = !showTrash" class="p-2.5 rounded-xl border flex items-center gap-2 transition-all font-bold text-sm" :class="darkMode ? 'bg-gray-800 border-gray-700 text-gray-300' : 'bg-white border-gray-200 text-gray-600'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                Trash (<span x-text="trash.length"></span>)
            </button>

            <div class="relative mr-2">
                <input type="text" x-model="searchQuery" placeholder="Cari nama pengguna..." class="pl-10 pr-4 py-2.5 rounded-xl text-sm border focus:ring-2 transition-all outline-none" :class="darkMode ? 'bg-[#1E293B] border-gray-700 text-white focus:ring-blue-500/20' : 'bg-white border-gray-200 text-gray-900 focus:ring-blue-500/10'">
                <svg class="w-4 h-4 absolute left-3.5 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <button @click="isAddUserModalOpen = true" class="px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors duration-300 shadow-md shadow-blue-600/20 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Pengguna
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="rounded-3xl p-6 shadow-sm border transition-colors duration-300 flex items-center gap-5" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-blue-50/10' : 'bg-blue-50'">
                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Pengguna Aktif</p>
                <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="users.length"></h3>
            </div>
        </div>
        <div class="rounded-3xl p-6 shadow-sm border transition-colors duration-300 flex items-center gap-5" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-emerald-50/10' : 'bg-emerald-50'">
                <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Admin</p>
                <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="users.filter(u => u.role === 'Admin').length"></h3>
            </div>
        </div>
        <div class="rounded-3xl p-6 shadow-sm border transition-colors duration-300 flex items-center gap-5" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
            <div class="w-14 h-14 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'bg-amber-50/10' : 'bg-amber-50'">
                <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold tracking-wider uppercase mb-1 transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Total Editor</p>
                <h3 class="text-3xl font-extrabold leading-none transition-colors duration-300" :class="darkMode ? 'text-white' : 'text-gray-900'" x-text="users.filter(u => u.role === 'Editor').length"></h3>
            </div>
        </div>
    </div>

    <div x-show="!showTrash" x-transition.opacity class="rounded-[2.5rem] p-8 shadow-sm border mb-4 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
        <div class="flex items-center gap-8 mb-8 pb-4 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
            <button @click="currentFilter = 'Semua'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Semua' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Semua Pengguna</button>
            <button @click="currentFilter = 'Admin'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Admin' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Admin</button>
            <button @click="currentFilter = 'Editor'" class="text-[13px] font-bold whitespace-nowrap pb-4 border-b-2 -mb-4.5 transition-all duration-300" :class="currentFilter === 'Editor' ? (darkMode ? 'text-white border-white' : 'text-gray-900 border-gray-900') : 'text-gray-500 border-transparent'">Editor</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[800px]">
                <thead>
                    <tr class="border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider pl-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Pengguna</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Email</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Peran</th>
                        <th class="pb-4 text-[11px] font-bold uppercase tracking-wider text-right pr-2 transition-colors duration-300" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-[13px]">
                    <template x-for="user in filteredUsers" :key="user.id">
                        <tr class="border-b last:border-0 transition-colors group" :class="darkMode ? 'border-gray-800 hover:bg-[#0F172A]/50' : 'border-gray-50 hover:bg-gray-50/50'">
                            <td class="py-5 font-bold transition-colors duration-300 pl-2" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full overflow-hidden border" :class="darkMode ? 'border-gray-700' : 'border-gray-200'">
                                        <img :src="user.image" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <span x-text="user.name"></span>
                                </div>
                            </td>
                            <td class="py-5 font-medium transition-colors duration-300" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" x-text="user.email"></td>
                            <td class="py-5">
                                <span class="px-3 py-1 font-bold text-[10px] rounded-full uppercase border" :class="user.role === 'Admin' ? (darkMode ? 'bg-[#0F172A] text-white border-gray-700' : 'bg-gray-900 text-white border-transparent') : (darkMode ? 'bg-gray-800 text-gray-300 border-gray-700' : 'bg-gray-100 text-gray-600 border-transparent')" x-text="user.role"></span>
                            </td>
                            <td class="py-5 text-right pr-2">
                                <div class="flex items-center justify-end gap-1">
                                    <button @click="openEditModal(user)" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-gray-800 hover:text-white' : 'text-gray-400 hover:bg-gray-100 hover:text-gray-700'">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                    <button @click="confirmDelete(user)" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-300" :class="darkMode ? 'text-gray-400 hover:bg-red-500/10 hover:text-red-400' : 'text-gray-400 hover:bg-red-50 hover:text-red-500'">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="showTrash" x-transition.opacity class="rounded-[2.5rem] p-8 shadow-sm border mb-4 transition-colors duration-300" :class="darkMode ? 'bg-[#1E293B] border-gray-800' : 'bg-white border-gray-100/50'">
        <div class="flex items-center justify-between mb-8 pb-4 border-b transition-colors duration-300" :class="darkMode ? 'border-gray-800' : 'border-gray-100'">
            <div class="flex items-center gap-4">
                <button @click="showTrash = false" class="p-2 rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors" :class="darkMode ? 'bg-gray-800 hover:bg-gray-700' : 'bg-gray-50'">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </button>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center" :class="darkMode ? 'bg-red-500/10' : 'bg-red-50'">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold" :class="darkMode ? 'text-white' : 'text-gray-900'">Tempat Sampah</h3>
                </div>
            </div>
            <button @click="showTrash = false" class="text-sm font-bold text-blue-600">Kembali ke List</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[800px]">
                <thead>
                    <tr class="text-[11px] font-bold uppercase tracking-wider" :class="darkMode ? 'text-gray-500' : 'text-gray-400'">
                        <th class="pb-4 pl-2">Pengguna</th>
                        <th class="pb-4">Dihapus Pada</th>
                        <th class="pb-4">Otomatis Dihapus Dalam</th>
                        <th class="pb-4 text-right pr-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-[13px]">
                    <template x-for="item in trash" :key="item.id">
                        <tr class="border-b last:border-0" :class="darkMode ? 'border-gray-800' : 'border-gray-50'">
                            <td class="py-5 font-bold pl-2" :class="darkMode ? 'text-white' : 'text-gray-900'">
                                <div class="flex items-center gap-4">
                                    <img :src="item.image" class="w-10 h-10 rounded-full opacity-60">
                                    <span x-text="item.name"></span>
                                </div>
                            </td>
                            <td class="py-5 font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'" x-text="item.deleted_at"></td>
                            <td class="py-5">
                                <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-[10px] font-bold" x-text="getRemainingTime(item.expires_at)"></span>
                            </td>
                            <td class="py-5 text-right pr-2">
                                <div class="flex justify-end gap-2">
                                    <button @click="itemToRestore = item; isRestoreConfirmOpen = true" class="px-4 py-2 bg-emerald-500 text-white rounded-lg text-xs font-bold hover:bg-emerald-600 transition-all">Pulihkan</button>
                                    <button @click="itemToPermanentDelete = item; isPermanentDeleteConfirmOpen = true" class="px-4 py-2 bg-red-500 text-white rounded-lg text-xs font-bold hover:bg-red-600 transition-all">Hapus Permanen</button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <template x-if="trash.length === 0">
                        <tr>
                            <td colspan="4" class="py-20 text-center font-medium text-gray-400">Tidak ada data di tempat sampah.</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="isAddUserModalOpen" x-cloak x-transition class="fixed inset-0 z-[100] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-[700px] p-8 bg-white rounded-[2rem] shadow-2xl max-h-[90vh] overflow-y-auto" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
             <div class="flex items-start justify-between mb-8">
                <div>
                    <h3 class="text-xl font-extrabold mb-1" :class="darkMode ? 'text-white' : 'text-gray-900'">Tambah Pengguna Baru</h3>
                    <p class="text-[13px] font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Daftarkan staf atau editor baru.</p>
                </div>
            </div>
            <form @submit.prevent="addUser" class="space-y-4">

                {{-- Row 1: Nama & Email sejajar --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nama Lengkap</label>
                        <input type="text" x-model="newUser.name" required class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                    </div>
                    <div>
                        <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Email</label>
                        <input type="email" x-model="newUser.email" required class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                    </div>
                </div>

                {{-- Row 2: Password & Konfirmasi Password sejajar --}}
                <div class="grid grid-cols-2 gap-4 items-start">
                    <div>
                        <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Password</label>
                        <div class="relative">
                            <input :type="showPw ? 'text' : 'password'" x-model="newUser.password" required class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                            <button type="button" @click="showPw = !showPw" class="absolute right-4 top-3 text-gray-400 hover:text-blue-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!showPw"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="showPw"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.912-3.376M9.172 9.172a3 3 0 014.242 4.242M12 5c4.478 0 8.268 2.943 9.542 7a10.05 10.05 0 01-1.012 2M3 3l18 18"/></svg>
                            </button>
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-1.5">
                            <template x-for="(valid, key) in passwordValidations(newUser.password)">
                                <div class="flex items-center gap-1.5 text-[10px] font-bold transition-all duration-300" 
                                     :class="valid ? 'text-emerald-500' : 'text-gray-400 opacity-60'"
                                     x-show="newUser.password.length > 0" x-transition:enter="scale-95 opacity-0">
                                    <div class="w-3 h-3 rounded-full flex items-center justify-center border flex-shrink-0" :class="valid ? 'bg-emerald-500 border-emerald-500' : 'border-gray-300'">
                                        <svg x-show="valid" class="w-2 h-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </div>
                                    <span x-text="key === 'length' ? '8+ Karakter' : key === 'upper' ? 'Huruf Besar' : key === 'lower' ? 'Huruf Kecil' : key === 'number' ? 'Angka' : 'Simbol'"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Konfirmasi Password</label>
                        <input type="password" x-model="newUser.confirm_password" required 
                               class="w-full px-5 py-3 rounded-2xl border text-sm outline-none transition-colors duration-300" 
                               :class="newUser.confirm_password.length > 0 ? (newUser.password === newUser.confirm_password ? 'border-emerald-500 bg-emerald-50/10' : 'border-red-500 bg-red-50/10') : (darkMode ? 'border-gray-700 bg-[#0F172A] text-white' : 'border-gray-200')">
                        <p x-show="newUser.confirm_password.length > 0" class="text-[10px] mt-1 font-bold" :class="newUser.password === newUser.confirm_password ? 'text-emerald-500' : 'text-red-500'">
                            <span x-text="newUser.password === newUser.confirm_password ? 'Password Cocok' : 'Password Tidak Cocok'"></span>
                        </p>
                    </div>
                </div>

                {{-- Row 3: Peran full width --}}
                <div>
                    <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Peran</label>
                    <select x-model="newUser.role" class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                        <option value="Admin">Admin</option>
                        <option value="Editor">Editor</option>
                    </select>
                </div>

                <div class="flex items-center justify-end gap-4 mt-8 pt-4">
                    <button type="button" @click="isAddUserModalOpen = false" class="px-6 py-3 text-[13px] font-bold" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Batal</button>
                    <button type="submit" :disabled="!isPasswordStrong(newUser.password) || newUser.password !== newUser.confirm_password" 
                            class="px-8 py-3 rounded-full text-white text-[13px] font-bold bg-[#0F172A] shadow-lg disabled:opacity-30 disabled:cursor-not-allowed">Buat Akun</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="isEditUserModalOpen" x-cloak x-transition class="fixed inset-0 z-[100] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-[700px] p-8 bg-white rounded-[2rem] shadow-2xl max-h-[90vh] overflow-y-auto" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            <div class="flex items-start justify-between mb-8">
                <div>
                    <h3 class="text-xl font-extrabold mb-1" :class="darkMode ? 'text-white' : 'text-gray-900'">Edit Pengguna</h3>
                    <p class="text-[13px] font-medium" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Perbarui data atau ubah password staf.</p>
                </div>
            </div>
            <form @submit.prevent="updateUser" class="space-y-4">

                {{-- Row 1: Nama & Email sejajar --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Nama Lengkap</label>
                        <input type="text" x-model="editingUser.name" required class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                    </div>
                    <div>
                        <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Email</label>
                        <input type="email" x-model="editingUser.email" required class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                    </div>
                </div>

                {{-- Row 2: Password & Peran sejajar --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-extrabold mb-2 text-blue-500">Ubah Password <span class="text-[10px] font-medium">(Kosongkan jika tidak diubah)</span></label>
                        <input type="password" x-model="editingUser.password" class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                    </div>
                    <div>
                        <label class="block text-xs font-extrabold mb-2" :class="darkMode ? 'text-gray-300' : 'text-gray-700'">Peran</label>
                        <select x-model="editingUser.role" class="w-full px-5 py-3 rounded-2xl border text-sm outline-none" :class="darkMode ? 'bg-[#0F172A] border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                            <option value="Admin">Admin</option>
                            <option value="Editor">Editor</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 mt-8 pt-4">
                    <button type="button" @click="isEditUserModalOpen = false" class="px-6 py-3 text-[13px] font-bold" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">Batal</button>
                    <button type="submit" class="px-8 py-3 rounded-full text-white text-[13px] font-bold bg-[#0F172A] shadow-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div x-show="isDeleteModalOpen" x-cloak x-transition class="fixed inset-0 z-[120] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-sm p-8 bg-white rounded-[2rem] text-center shadow-2xl" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            <div class="w-20 h-20 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-6" :class="darkMode ? 'bg-red-500/10' : 'bg-red-50'"><svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <h3 class="text-2xl font-extrabold mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Pindahkan ke Trash?</h3>
            <p class="text-[15px] mb-8 text-gray-500">Data dapat dipulihkan kembali dari tempat sampah.</p>
            <div class="flex gap-4">
                <button @click="isDeleteModalOpen = false" class="flex-1 font-bold text-gray-600">Batal</button>
                <button @click="softDelete()" class="flex-1 py-3.5 rounded-full text-white font-bold bg-red-500 hover:bg-red-600 transition-colors">Ya, Pindahkan</button>
            </div>
        </div>
    </div>

    <div x-show="isRestoreConfirmOpen" x-cloak x-transition class="fixed inset-0 z-[120] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-sm p-8 bg-white rounded-[2rem] text-center shadow-2xl" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            <div class="w-20 h-20 rounded-full bg-emerald-50 flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <h3 class="text-2xl font-extrabold mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Pulihkan Data?</h3>
            <p class="text-[15px] mb-8 text-gray-500">Pengguna akan kembali aktif di daftar manajemen.</p>
            <div class="flex gap-4">
                <button @click="isRestoreConfirmOpen = false" class="flex-1 font-bold text-gray-600">Batal</button>
                <button @click="restoreUser()" class="flex-1 py-3.5 rounded-full text-white font-bold bg-emerald-500 hover:bg-emerald-600">Ya, Pulihkan!</button>
            </div>
        </div>
    </div>

    <div x-show="isPermanentDeleteConfirmOpen" x-cloak x-transition class="fixed inset-0 z-[120] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-sm p-8 bg-white rounded-[2rem] text-center shadow-2xl" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <h3 class="text-2xl font-extrabold mb-2 text-red-600">Hapus Permanen?</h3>
            <p class="text-[15px] mb-8 text-gray-500">Tindakan ini tidak dapat dibatalkan. Data akan hilang selamanya.</p>
            <div class="flex gap-4">
                <button @click="isPermanentDeleteConfirmOpen = false" class="flex-1 font-bold text-gray-600">Batal</button>
                <button @click="destroyPermanently()" class="flex-1 py-3.5 rounded-full text-white font-bold bg-gray-900 hover:bg-black">Hapus Selamanya</button>
            </div>
        </div>
    </div>

    <div x-show="isCreatedSuccessModalOpen" x-cloak x-transition class="fixed inset-0 z-[200] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-sm p-8 bg-white rounded-[2rem] text-center shadow-2xl" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            <div class="w-20 h-20 rounded-full bg-emerald-50 flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <h3 class="text-2xl font-extrabold mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Berhasil!</h3>
            <p class="text-[15px] mb-8 text-gray-500">Data baru berhasil ditambahkan.</p>
            <button @click="isCreatedSuccessModalOpen = false" class="w-full px-8 py-3.5 rounded-full text-white font-bold bg-[#0F172A]">Mantap!</button>
        </div>
    </div>

    <div x-show="isSuccessModalOpen" x-cloak x-transition class="fixed inset-0 z-[200] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-sm p-8 bg-white rounded-[2rem] text-center shadow-2xl" :class="darkMode ? 'bg-[#1E293B] border border-gray-800' : 'bg-white'">
            <div class="w-20 h-20 rounded-full bg-emerald-50 flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <h3 class="text-2xl font-extrabold mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'">Terhapus!</h3>
            <p class="text-[15px] mb-8 text-gray-500">User telah dipindahkan ke folder Trash.</p>
            <button @click="isSuccessModalOpen = false" class="w-full px-8 py-3.5 rounded-full text-white font-bold bg-[#0F172A]">Oke</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

