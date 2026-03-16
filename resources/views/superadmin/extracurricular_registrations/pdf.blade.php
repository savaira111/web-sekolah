<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pendaftaran Eskul</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #2563EB;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #1E40AF;
            font-size: 24px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #6B7280;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #1E40AF;
            border-left: 4px solid #2563EB;
            padding-left: 10px;
            margin-bottom: 15px;
            background: #F3F4F6;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 8px 0;
            vertical-align: top;
        }
        table td:first-child {
            width: 30%;
            font-weight: bold;
            color: #4B5563;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 12px;
            color: #6B7280;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-weight: bold;
            background: #D1FAE5;
            color: #065F46;
            text-transform: uppercase;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SMKS Mahaputra Cerdas Utama</h1>
        <p>Bukti Pendaftaran Kegiatan Ekstrakurikuler</p>
    </div>

    <div class="section">
        <div class="section-title">Data Pendaftar</div>
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>: {{ $registration->name }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: {{ $registration->class }}</td>
            </tr>
            <tr>
                <td>Ekstrakurikuler</td>
                <td>: {{ $registration->extracurricular }}</td>
            </tr>
            <tr>
                <td>Tanggal Daftar</td>
                <td>: {{ $registration->created_at->format('d F Y') }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: <span class="status-badge">DITERIMA</span></td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Motivasi Bergabung</div>
        <p style="text-align: justify; font-size: 14px;">
            {{ $registration->motivation }}
        </p>
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d F Y H:i:s') }}</p>
        <p>Dokumen ini adalah bukti resmi pendaftaran ekstrakurikuler.</p>
    </div>
</body>
</html>
