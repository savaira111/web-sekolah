<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$users = [
    [
        'name' => 'Admin PPDB',
        'username' => 'admin_ppdb',
        'email' => 'ppdb@eduadmin.com',
        'password' => Hash::make('Admin123'),
        'role' => 'admin PPDB management',
    ],
    [
        'name' => 'Admin Ekskul',
        'username' => 'admin_ekskul',
        'email' => 'ekskul@eduadmin.com',
        'password' => Hash::make('Admin123'),
        'role' => 'admin EXTRAKULIKULLER management',
    ],
    [
        'name' => 'Operator Berita',
        'username' => 'operator_berita',
        'email' => 'berita@eduadmin.com',
        'password' => Hash::make('Admin123'),
        'role' => 'operator artikel/berita',
    ],
];

foreach ($users as $userData) {
    User::updateOrCreate(
        ['email' => $userData['email']],
        $userData
    );
    echo "User created: " . $userData['name'] . " (" . $userData['role'] . ")\n";
}
