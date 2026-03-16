<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulir Pendaftaran PPDB - {{ $applicant->full_name }}</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #333;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0;
            font-size: 10px;
            color: #666;
        }
        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 15px;
        }
        .section-header {
            background-color: #f3f4f6;
            padding: 5px 10px;
            font-weight: bold;
            border-left: 4px solid #333;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 4px 5px;
            vertical-align: top;
        }
        .label {
            width: 30%;
            font-weight: bold;
        }
        .value {
            width: 70%;
        }
        .profile-img {
            float: right;
            width: 100px;
            height: 120px;
            border: 1px solid #333;
            margin-left: 20px;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .status-stamp {
            display: inline-block;
            border: 3px solid #059669;
            color: #059669;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: bold;
            transform: rotate(-5deg);
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SMKS Mahaputra Cerdas Utama</h1>
        <p>Jl. Raya Katapang No. 01, Katapang, Kec. Katapang, Kabupaten Bandung, Jawa Barat 40971</p>
        <p>Email: info@mahaputra.sch.id | Website: www.mahaputra.sch.id</p>
    </div>

    <div class="title">BIODATA CALON SISWA BARU (PPDB)</div>

    <div class="clearfix">
        @if($applicant->profile_image)
            <img src="{{ public_path('storage/' . $applicant->profile_image) }}" class="profile-img">
        @else
            <div class="profile-img" style="display: flex; align-items: center; justify-content: center; background: #eee; text-align: center; line-height: 120px;">FOTO 3X4</div>
        @endif

        <div class="section">
            <div class="section-header">Identitas Pribadi</div>
            <table>
                <tr>
                    <td class="label">Nomor Pendaftaran</td>
                    <td class="value">: {{ $applicant->registration_number }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td class="value">: {{ $applicant->full_name }}</td>
                </tr>
                <tr>
                    <td class="label">NISN</td>
                    <td class="value">: {{ $applicant->nisn }}</td>
                </tr>
                <tr>
                    <td class="label">Tempat, Tgl Lahir</td>
                    <td class="value">: {{ $applicant->birth_place }}, {{ \Carbon\Carbon::parse($applicant->birth_date)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Jenis Kelamin</td>
                    <td class="value">: {{ $applicant->gender == 'Male' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td class="label">Agama</td>
                    <td class="value">: {{ $applicant->religion ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Pilihan Jurusan</td>
                    <td class="value">: {{ $applicant->major }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="value">: {{ $applicant->address }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="section">
        <div class="section-header">Sekolah Asal</div>
        <table>
            <tr>
                <td class="label">Asal Sekolah</td>
                <td class="value">: {{ $applicant->school_origin }}</td>
            </tr>
            <tr>
                <td class="label">Tahun Lulus</td>
                <td class="value">: {{ $applicant->graduation_year }}</td>
            </tr>
            <tr>
                <td class="label">Rata-rata Nilai</td>
                <td class="value">: {{ $applicant->average_grade }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Data Orang Tua</div>
        <table>
            <tr>
                <td class="label">Nama Ayah</td>
                <td class="value">: {{ $applicant->father_name }}</td>
            </tr>
            <tr>
                <td class="label">Telepon Ayah</td>
                <td class="value">: {{ $applicant->father_phone }}</td>
            </tr>
            <tr>
                <td class="label">Nama Ibu</td>
                <td class="value">: {{ $applicant->mother_name }}</td>
            </tr>
            <tr>
                <td class="label">Telepon Ibu</td>
                <td class="value">: {{ $applicant->mother_phone }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <div class="status-stamp">DITERIMA</div>
        <p>Dicetak pada: {{ now()->format('d F Y H:i:s') }}</p>
    </div>
</body>
</html>
