<!-- Chatbot Widget -->
<div id="chatbot-wrapper" class="fixed bottom-6 right-6 z-[9999] flex flex-col items-end pointer-events-none">
    <!-- Chat Popup -->
    <div id="chatbot-popup" class="mb-4 w-[350px] sm:w-[380px] max-h-[600px] h-[75vh] bg-white rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.15)] flex flex-col overflow-hidden opacity-0 scale-90 translate-y-10 transition-all duration-300 pointer-events-none">
        
        <!-- Header -->
        <div class="bg-[#1e88e5] px-6 py-5 flex items-center justify-between border-b border-white/10 pointer-events-auto">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-white/50 bg-white">
                        <img src="{{ asset('images/chatbot-mascot.png') }}" alt="Mascot" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-400 border-2 border-[#1e88e5] rounded-full"></span>
                </div>
                <div class="flex flex-col">
                    <h3 class="text-white font-bold text-base leading-tight">Asisten SMKS Mahaputra</h3>
                    <span class="text-blue-100 text-[10px] uppercase tracking-widest font-bold mt-0.5">SIAP MEMBANTU</span>
                </div>
            </div>
            <button id="close-chat" class="text-white/70 hover:text-white transition-colors p-1 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Chat Area -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-6 space-y-5 bg-white pointer-events-auto scroll-smooth">
            <!-- Bot Welcome Message -->
            <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-full bg-blue-50 flex items-center justify-center shrink-0 border border-blue-100 shadow-sm overflow-hidden">
                    <img src="{{ asset('images/chatbot-mascot.png') }}" alt="MCU" class="w-full h-full rounded-full object-cover">
                </div>
                <div class="bg-[#1e88e5] text-white p-4 rounded-2xl rounded-tl-none shadow-sm max-w-[85%]">
                    <p class="text-sm leading-relaxed">Halo! Saya asisten virtual SMKS Mahaputra. Ada yang bisa saya bantu terkait pendaftaran, jurusan, atau fasilitas?</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions Row -->
        <div id="quick-actions" class="px-6 pb-2 overflow-x-auto flex gap-2 no-scrollbar pointer-events-auto bg-white">
            <button onclick="sendQuickReply('Alur Pendaftaran')" class="shrink-0 px-4 py-2 border border-blue-100 rounded-full text-blue-500 text-xs font-semibold hover:bg-blue-50 transition-colors cursor-pointer">Alur Pendaftaran</button>
            <button onclick="sendQuickReply('Biaya Sekolah')" class="shrink-0 px-4 py-2 border border-blue-100 rounded-full text-blue-500 text-xs font-semibold hover:bg-blue-50 transition-colors cursor-pointer">Biaya Sekolah</button>
            <button onclick="sendQuickReply('Pilihan Jurusan')" class="shrink-0 px-4 py-2 border border-blue-100 rounded-full text-blue-500 text-xs font-semibold hover:bg-blue-50 transition-colors cursor-pointer">Pilihan Jurusan</button>
        </div>

        <!-- Input Area Wrapper -->
        <div class="p-6 bg-white pointer-events-auto">
            <div class="relative bg-gray-50 rounded-full flex items-center px-5 py-1.5 shadow-sm focus-within:ring-2 focus-within:ring-blue-100 transition-all">
                <button class="text-gray-400 hover:text-gray-600 transition-colors mr-3 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                </button>
                
                <form id="chat-form" class="flex-1 flex items-center">
                    <input type="text" id="chat-input" placeholder="Ketik pesan Anda..." autocomplete="off" class="w-full bg-transparent border-none outline-none focus:outline-none focus:ring-0 text-sm text-gray-700 placeholder-gray-400 py-2">
                    <button type="submit" class="bg-[#f7a500] text-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-orange-500 transition-all shadow-[0_4px_10px_rgba(247,165,0,0.3)] ml-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </button>
                </form>
            </div>
            <div class="text-center mt-3">
                <p class="text-[10px] text-gray-400 font-medium">Powered by MCU Digital Team</p>
            </div>
        </div>
    </div>

    <!-- Floating Button -->
    <button id="chatbot-toggle" class="bg-[#1e88e5] w-16 h-16 rounded-full shadow-[0_10px_25px_rgba(30,136,229,0.4)] flex items-center justify-center hover:scale-110 active:scale-95 transition-all duration-300 pointer-events-auto cursor-pointer border-4 border-white overflow-hidden p-0">
        <div id="btn-icon" class="w-full h-full flex items-center justify-center transition-transform duration-300">
            <img src="{{ asset('images/chatbot-mascot.png') }}" alt="MCU Mascot" class="w-full h-full object-cover">
        </div>
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatbotWrapper = document.getElementById('chatbot-wrapper');
    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotPopup = document.getElementById('chatbot-popup');
    const closeChat = document.getElementById('close-chat');
    const btnIcon = document.getElementById('btn-icon');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    let isOpen = false;

    const botResponses = {
        profil: "SMKS Mahaputra Cerdas Utama berlokasi di Katapang, Kabupaten Bandung. Sekolah ini dipimpin oleh Ibu Siti Robiah Adawiyah, S.Pd. dan telah terakreditasi A (Unggul). Fokus utama kami adalah bidang IT dan Desain dengan pendekatan religius dan berakhlak mulia.",
        sejarah: "Sejarah SMKS Mahaputra:\n- **2016**: Berdirinya Yayasan Mahaputra & SMKS Mahaputra Cerdas Utama mendapatkan izin operasional.\n- **2018**: Ekspansi kemitraan dengan 50+ perusahaan industri.\n- **2023**: Ditetapkan sebagai SMK Pusat Keunggulan (COE) oleh Kemendikbudristek RI.\n\nKami telah berbakti selama 10 tahun untuk mencetak generasi unggul.",
        jurusan: "Pilihan Jurusan:\n1. **DKV (Desain Komunikasi Visual)**: Belajar Desain Grafis, Fotografi, Videografi, hingga 3D Modelling. Dibimbing oleh Bpk Refangga Agus Triono, S.Ds.\n2. **PPLG (Pengembangan Perangkat Lunak & Gim)**: Belajar Coding (C++, C#, Web, Mobile), Game Dev, dan Database. Dibimbing oleh Ibu Azhara Silmi Fathiyah.\n\nMasing-masing memiliki Lab berstandar industri!",
        fasilitas: "Fasilitas Unggulan:\n- **Laboratorium**: Lab PPLG (i7 High-end), Lab DKV, Lab Multimedia (Editing Suite), Lab Interaktif (Smart Board).\n- **Umum**: Masjid (Full AC), Bale Mahaputra (Aula), BNB Cafe, Area Parkir Luas, dan Gedung Kelas yang bersih & modern.",
        ppdb: "Panduan PPDB 2025/2026:\n1. Daftar Online di web ini.\n2. Verifikasi Dokumen (Scan Ijazah, Akta, KK, Rapor Semester 1-5, Pas Foto).\n3. Tes Seleksi (Akademik & Wawancara).\n4. Daftar Ulang.\n\nBiaya Masuk: **Rp 3.500.000,-**.\nBiaya Pendaftaran: **Rp 150.000,-**.",
        biaya: "Biaya masuk awal hanya **Rp 3.500.000,-**.\n\n**Program Diskon & Beasiswa:**\n- **Hafidz Quran**: Diskon 25% (5 Juz), 50% (10 Juz), 75% (20 Juz), hingga GRATIS 100% (30 Juz).\n- **Sosial**: Diskon 50% untuk Yatim Piatu, dan 25% untuk Yatim/Piatu.",
        eskul: "Ekstrakurikuler di SMK Mahaputra:\n- **Wajib**: Pramuka\n- **Pilihan**: Futsal Putra, Paskibra, Panahan, Rohis, dan Pencak Silat.\nSemua eskul aktif dan didukung fasilitas lapangan yang memadai.",
        kontak: "Hubungi Kami:\n- **WhatsApp**: 022 589 1234 / [Link WA](https://wa.me/message/AKIGOHHXFZGWB1)\n- **Email**: smkmahaputracerdasutama@gmail.com\n- **Alamat**: Jl. Terusan Katapang Kulon No.24, Katapang, Kab. Bandung.\n- **Jam Kerja**: Sen-Jum: 08.00 - 16.00.",
        fallback: "Maaf, saya belum memahami pesan Anda. Silakan tanya tentang: **Profil, Sejarah, Jurusan, Biaya, PPDB, Fasilitas, Eskul, atau Kontak.**"
    };

    window.sendQuickReply = function(text) {
        handleUserInput(text);
    };

    function toggleChat() {
        isOpen = !isOpen;
        if (isOpen) {
            chatbotWrapper.classList.remove('pointer-events-none');
            chatbotPopup.classList.remove('opacity-0', 'scale-90', 'translate-y-10', 'pointer-events-none');
            chatbotPopup.classList.add('opacity-100', 'scale-100', 'translate-y-0', 'pointer-events-auto');
            btnIcon.innerHTML = `<svg class="w-8 h-8 text-white stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
            chatbotToggle.classList.add('rotate-90');
            setTimeout(() => chatInput.focus(), 300);
        } else {
            chatbotWrapper.classList.add('pointer-events-none');
            chatbotPopup.classList.add('opacity-0', 'scale-90', 'translate-y-10', 'pointer-events-none');
            chatbotPopup.classList.remove('opacity-100', 'scale-100', 'translate-y-0', 'pointer-events-auto');
            btnIcon.innerHTML = `<img src="{{ asset('images/chatbot-mascot.png') }}" alt="MCU Mascot" class="w-full h-full object-cover">`;
            chatbotToggle.classList.remove('rotate-90');
        }
    }

    chatbotToggle.addEventListener('click', toggleChat);
    closeChat.addEventListener('click', toggleChat);

    function addMessage(text, isUser = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex ${isUser ? 'justify-end' : 'justify-start'} animate-in fade-in slide-in-from-bottom-2 duration-400 font-sans`;
        
        let content = text.replace(/\n/g, '<br>').replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

        messageDiv.innerHTML = isUser ? `
            <div class="bg-[#f0f0f0] text-gray-700 p-4 rounded-2xl rounded-tr-none shadow-sm max-w-[85%] border border-gray-100">
                <p class="text-sm leading-relaxed">${content}</p>
            </div>
        ` : `
            <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-full bg-blue-50 flex items-center justify-center shrink-0 border border-blue-100 shadow-sm overflow-hidden">
                    <img src="{{ asset('images/chatbot-mascot.png') }}" class="w-full h-full object-cover">
                </div>
                <div class="bg-[#1e88e5] text-white p-4 rounded-2xl rounded-tl-none shadow-md max-w-[85%]">
                    <p class="text-sm leading-relaxed">${content}</p>
                </div>
            </div>
        `;

        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function handleUserInput(text) {
        if (!text) return;
        addMessage(text, true);
        
        const thinkingDiv = document.createElement('div');
        thinkingDiv.id = 'thinking';
        thinkingDiv.className = 'flex justify-start items-center gap-3 font-sans';
        thinkingDiv.innerHTML = `
            <div class="w-9 h-9 rounded-full bg-blue-50 border border-blue-100 overflow-hidden shrink-0"><img src="{{ asset('images/chatbot-mascot.png') }}" class="w-full h-full object-cover"></div>
            <div class="bg-gray-50 border border-gray-100 px-4 py-3 rounded-2xl rounded-tl-none flex gap-1 items-center">
                <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-bounce"></span>
                <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
            </div>
        `;
        chatMessages.appendChild(thinkingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        setTimeout(() => {
            thinkingDiv.remove();
            const response = handleManualResponse(text);
            addMessage(response);
        }, 1200);
    }

    function handleManualResponse(input) {
        const lowerInput = input.toLowerCase();
        if (lowerInput.includes('sejarah') || lowerInput.includes('milestone') || lowerInput.includes('berdiri') || lowerInput.includes('didirikan')) return botResponses.sejarah;
        if (lowerInput.includes('profil') || lowerInput.includes('tentang')) return botResponses.profil;
        if (lowerInput.includes('jurusan') || lowerInput.includes('dkv') || lowerInput.includes('pplg') || lowerInput.includes('program')) return botResponses.jurusan;
        if (lowerInput.includes('fasilitas') || lowerInput.includes('lab') || lowerInput.includes('ruang') || lowerInput.includes('aula') || lowerInput.includes('kafe') || lowerInput.includes('masjid')) return botResponses.fasilitas;
        if (lowerInput.includes('daftar') || lowerInput.includes('ppdb') || lowerInput.includes('alur') || lowerInput.includes('masuk')) return botResponses.ppdb;
        if (lowerInput.includes('biaya') || lowerInput.includes('bayar') || lowerInput.includes('diskon') || lowerInput.includes('harga') || lowerInput.includes('gratis') || lowerInput.includes('yatim') || lowerInput.includes('hafidz')) return botResponses.biaya;
        if (lowerInput.includes('eskul') || lowerInput.includes('ekskul') || lowerInput.includes('futsal') || lowerInput.includes('pramuka') || lowerInput.includes('paskibra') || lowerInput.includes('silat')) return botResponses.eskul;
        if (lowerInput.includes('alamat') || lowerInput.includes('lokasi') || lowerInput.includes('kontak') || lowerInput.includes('wa') || lowerInput.includes('nomor') || lowerInput.includes('email') || lowerInput.includes('telepon')) return botResponses.kontak;
        return botResponses.fallback;
    }

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const text = chatInput.value.trim();
        if (text) {
            handleUserInput(text);
            chatInput.value = '';
        }
    });

    // Ensure clicking the popup area itself triggers focus on input
    chatbotPopup.addEventListener('click', () => {
        if (isOpen) chatInput.focus();
    });
});
</script>

<style>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

#chat-messages::-webkit-scrollbar {
    width: 4px;
}
#chat-messages::-webkit-scrollbar-track {
    background: transparent;
}
#chat-messages::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 10px;
}

@keyframes animate-in {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-in {
    animation: animate-in 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
</style>
