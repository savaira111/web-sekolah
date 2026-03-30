<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #2563eb;
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .content {
            padding: 40px;
        }
        .greeting {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .status-badge {
            display: inline-block;
            background-color: #d1fae5;
            color: #059669;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: bold;
            margin-bottom: 25px;
            text-transform: uppercase;
            font-size: 12px;
        }
        .details {
            background-color: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            margin: 25px 0;
            border: 1px solid #e2e8f0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px border-dashed #e2e8f0;
        }
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .label {
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
        }
        .value {
            font-weight: 700;
            color: #1e293b;
            font-size: 13px;
        }
        .cta-button {
            display: block;
            background-color: #16a34a;
            color: #ffffff;
            text-align: center;
            padding: 18px;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            margin-top: 30px;
            box-shadow: 0 4px 6px rgba(22, 163, 74, 0.2);
        }
        .footer {
            text-align: center;
            padding: 30px;
            font-size: 12px;
            color: #94a3b8;
            background-color: #f8fafc;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <p style="margin-bottom: 10px; font-weight: bold; opacity: 0.8; font-size: 12px;">SMKS MAHAPUTRA CERDAS UTAMA</p>
            <h1>Pendaftaran Diterima</h1>
        </div>
        <div class="content">
            <div class="greeting">Halo, {{ $name }}!</div>
            <div class="status-badge">Selamat! Pendaftaran Anda Telah Diterima</div>
            
            <p>Selamat bergabung di keluarga besar SMKS Mahaputra Cerdas Utama. Berdasarkan hasil verifikasi dokumen dan kriteria seleksi, pendaftaran Anda dinyatakan <strong>LULUS / DITERIMA</strong>.</p>
            
            <div class="details">
                <div class="detail-row">
                    <div class="label">NOMOR PENDAFTARAN</div>
                    <div class="value">{{ $reg_number }}</div>
                </div>
                <div class="detail-row">
                    <div class="label">JURUSAN</div>
                    <div class="value">{{ $major == 'PPLG' ? 'Pengembangan Perangkat Lunak & Gim' : 'Desain Komunikasi Visual' }}</div>
                </div>
                <div class="detail-row">
                    <div class="label">STATUS</div>
                    <div class="value" style="color: #059669;">Diterima</div>
                </div>
            </div>

            <p>Langkah selanjutnya adalah melakukan pendaftaran ulang dan <strong>pembayaran biaya masuk</strong>. Silakan hubungi admin untuk informasi rincian biaya dan prosedur pembayaran.</p>

            <a href="{{ $wa_link }}" class="cta-button">HUBUNGI ADMIN VIA WHATSAPP</a>
            
            <p style="font-size: 12px; color: #64748b; margin-top: 25px; text-align: center;">Tunjukkan email ini atau sebutkan Nomor Pendaftaran Anda saat menghubungi admin.</p>
        </div>
        <div class="footer">
            <p><strong>SMKS Mahaputra Cerdas Utama</strong></p>
            <p>Jl. Terusan Katapang Kulon No.24, Katapang, Bandung</p>
            <p>&copy; {{ date('Y') }} All Rights Reserved</p>
        </div>
    </div>
</body>
</html>
