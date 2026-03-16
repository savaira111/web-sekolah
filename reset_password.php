<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

$user = User::where('email', 'savairamalika19@gmail.com')->first();
if ($user) {
    $user->password = Hash::make('Superadmin123$$');
    $user->save();
    echo "Password reset for " . $user->email . "\n";
    $attempt = Auth::attempt(['email' => 'savairamalika19@gmail.com', 'password' => 'Superadmin123$$']);
    echo "Attempt with new password: " . ($attempt ? "SUCCESS" : "FAILED") . "\n";
} else {
    echo "User not found\n";
}
