<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/jurusan', [PageController::class, 'jurusan'])->name('jurusan');
Route::get('/jurusan/dkv', [PageController::class, 'dkv'])->name('jurusan.dkv');
Route::get('/jurusan/pplg', [PageController::class, 'pplg'])->name('jurusan.pplg');
Route::get('/berita', [PageController::class, 'news'])->name('news');
Route::get('/berita/detail', [PageController::class, 'newsDetail'])->name('news.detail');
Route::get('/fasilitas', [PageController::class, 'facilities'])->name('facilities');
Route::get('/staff', [PageController::class, 'staff'])->name('staff');
Route::get('/profil', [PageController::class, 'profile'])->name('profile');
Route::get('/seragam', [PageController::class, 'seragam'])->name('seragam');
Route::get('/pendaftaran/panduan', [PageController::class, 'enrollmentGuide'])->name('enrollment.guide');
Route::get('/pendaftaran/formulir', [PageController::class, 'registration'])->name('registration');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::get('/ekstrakurikuler', [PageController::class, 'extracurriculars'])->name('extracurriculars');
Route::get('/ekstrakurikuler/panahan', [PageController::class, 'panahan'])->name('extracurriculars.panahan');
Route::get('/ekstrakurikuler/rohis', [PageController::class, 'rohis'])->name('extracurriculars.rohis');
Route::get('/ekstrakurikuler/silat', [PageController::class, 'silat'])->name('extracurriculars.silat');
Route::get('/ekstrakurikuler/futsal', [PageController::class, 'futsal'])->name('extracurriculars.futsal');
Route::get('/ekstrakurikuler/paskibra', [PageController::class, 'paskibra'])->name('extracurriculars.paskibra');
Route::get('/ekstrakurikuler/pramuka', [PageController::class, 'pramuka'])->name('extracurriculars.pramuka');

Route::get('/ekstrakurikuler/pendaftaran', [PageController::class, 'extracurricularRegistration'])->name('extracurriculars.registration');
Route::get('/ekstrakurikuler/berhasil', [PageController::class, 'extracurricularRegistrationSuccess'])->name('extracurriculars.registration.success');
Route::get('/pendaftaran/berhasil', [PageController::class, 'registrationSuccess'])->name('registration.success');

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Add other auth routes here if needed
});

// Superadmin Routes
Route::prefix('superadmin')->group(function () {
    Route::get('/dashboard', function () {
        return view('superadmin.dashboard');
    });
    Route::get('/users', function () {
        return view('superadmin.users.index');
    });
    Route::get('/users/edit/{id?}', function () {
        return view('superadmin.users.edit');
    });

    // Articles Management
    Route::get('/articles', [ArticleController::class, 'index'])->name('superadmin.articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('superadmin.articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('superadmin.articles.store');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('superadmin.articles.show');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('superadmin.articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('superadmin.articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('superadmin.articles.destroy');

    // Contact Messages Management
    Route::get('/messages', [ContactController::class, 'index'])->name('superadmin.messages.index');
    Route::get('/messages/{message}', [ContactController::class, 'show'])->name('superadmin.messages.show');
    Route::delete('/messages/{message}', [ContactController::class, 'destroy'])->name('superadmin.messages.destroy');

    // Profile Management
    Route::get('/profile', function () {
        return view('superadmin.profile');
    });
});
