@component('mail::message')
# Balasan Pesan dari Admin SMKS Mahaputra Cerdas Utama

Halo {{ $originalMessage->name }},

Terima kasih telah menghubungi kami. Berikut adalah balasan untuk pesan Anda:

{{ $replyMessage }}

---
**Pesan Asli Anda:**
**Subjek:** {{ $originalMessage->subject }}
**Pesan:**
{{ $originalMessage->message }}

Terima kasih,<br>
Tim Admin {{ config('app.name') }}
@endcomponent
