<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\LandingStat;

$stats = [
    [
        'title' => 'Siswa Aktif',
        'value' => '200+',
        'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        'color' => 'blue',
        'order' => 1,
        'is_active' => true,
    ],
    [
        'title' => 'Lulusan Bekerja',
        'value' => '98%',
        'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        'color' => 'indigo',
        'order' => 2,
        'is_active' => true,
    ],
    [
        'title' => 'Mitra Industri',
        'value' => '20+',
        'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
        'color' => 'orange',
        'order' => 3,
        'is_active' => true,
    ],
    [
        'title' => 'Guru Ahli',
        'value' => '50+',
        'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        'color' => 'emerald',
        'order' => 4,
        'is_active' => true,
    ],
    [
        'title' => 'Ekstrakurikuler',
        'value' => '15+',
        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
        'color' => 'rose',
        'order' => 5,
        'is_active' => true,
    ],
    [
        'title' => 'Lab Praktik',
        'value' => '10+',
        'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
        'color' => 'purple',
        'order' => 6,
        'is_active' => true,
    ],
    [
        'title' => 'Siswa DKV',
        'value' => '80+',
        'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
        'color' => 'blue',
        'order' => 7,
        'is_active' => true,
    ],
    [
        'title' => 'Siswa PPLG',
        'value' => '120+',
        'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
        'color' => 'indigo',
        'order' => 8,
        'is_active' => true,
    ],
    [
        'title' => 'Siswa Panahan',
        'value' => '30+',
        'icon' => 'M12 14l9-5-9-5-9 5 9 5zM12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
        'color' => 'orange',
        'order' => 9,
        'is_active' => true,
    ],
];

foreach ($stats as $statData) {
    LandingStat::updateOrCreate(
        ['title' => $statData['title']],
        $statData
    );
    echo "Stat updated/created: " . $statData['title'] . "\n";
}
echo "Done!\n";
