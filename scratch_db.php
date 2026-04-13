<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$latest = \App\Models\Partner::latest()->first();
if ($latest) {
    echo "LATEST PARTNER: " . $latest->name . "\n";
    echo "GALLERY IMAGES: " . var_export($latest->gallery_images, true) . "\n";
    echo "CASTS: " . var_export($latest->getCasts(), true) . "\n";
} else {
    echo "NO PARTNER FOUND\n";
}
