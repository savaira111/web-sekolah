<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AlbumController;

/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/jurusan', [PageController::class, 'jurusan'])->name('jurusan');
Route::get('/jurusan/dkv', [PageController::class, 'dkv'])->name('jurusan.dkv');
Route::get('/jurusan/pplg', [PageController::class, 'pplg'])->name('jurusan.pplg');

Route::get('/berita', [PageController::class, 'news'])->name('news');
Route::get('/berita/{slug}', [PageController::class, 'newsDetail'])->name('news.detail');

Route::get('/fasilitas', [PageController::class, 'facilities'])->name('facilities');
Route::get('/staff', [PageController::class, 'staff'])->name('staff');
Route::get('/profil', [PageController::class, 'profile'])->name('profile');
Route::get('/seragam', [PageController::class, 'seragam'])->name('seragam');
Route::get('/album', [PageController::class, 'album'])->name('album');
Route::get('/album/{album}', [PageController::class, 'albumDetail'])->name('album.show');

Route::get('/pendaftaran/panduan', [PageController::class, 'enrollmentGuide'])->name('enrollment.guide');
Route::get('/pendaftaran/formulir', [PageController::class, 'registration'])->name('registration');
Route::post('/pendaftaran/formulir', [ApplicantController::class, 'store'])->name('registration.store');
Route::get('/pendaftaran/berhasil', [PageController::class, 'registrationSuccess'])->name('registration.success');

Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');


use App\Http\Controllers\ExtracurricularRegistrationController;

/*
|--------------------------------------------------------------------------
| EXTRACURRICULAR
|--------------------------------------------------------------------------
*/

Route::prefix('ekstrakurikuler')->name('extracurriculars.')->group(function () {

    Route::get('/', [PageController::class, 'extracurriculars'])->name('index');
    Route::get('/detail/{id}', [PageController::class, 'extracurricularDetail'])->name('show');


    Route::get('/panahan', [PageController::class, 'panahan'])->name('panahan');
    Route::get('/rohis', [PageController::class, 'rohis'])->name('rohis');
    Route::get('/silat', [PageController::class, 'silat'])->name('silat');
    Route::get('/futsal', [PageController::class, 'futsal'])->name('futsal');
    Route::get('/paskibra', [PageController::class, 'paskibra'])->name('paskibra');
    Route::get('/pramuka', [PageController::class, 'pramuka'])->name('pramuka');

    Route::get('/pendaftaran', [PageController::class, 'extracurricularRegistration'])->name('registration');
    Route::post('/pendaftaran', [ExtracurricularRegistrationController::class, 'store'])->name('registration.store');
    Route::get('/berhasil', [PageController::class, 'extracurricularRegistrationSuccess'])->name('registration.success');

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| SUPERADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('superadmin')->name('superadmin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('superadmin.dashboard');
    })->name('dashboard');

    // Users
    Route::get('/users', function () {
        return view('superadmin.users.index');
    })->name('users.index');

    Route::get('/users/edit/{id?}', function () {
        return view('superadmin.users.edit');
    })->name('users.edit');

    // Articles (CRUD)
    Route::resource('articles', ArticleController::class);
    Route::patch('/articles/{article}/publish', [ArticleController::class, 'publish'])->name('articles.publish');

    // Messages
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [ContactController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [ContactController::class, 'destroy'])->name('messages.destroy');

    // PPDB (Applicants)
    Route::get('/ppdb/{id}/status', function ($id) {
        return redirect()->route('superadmin.ppdb.show', $id);
    });
    Route::patch('/ppdb/{id}/status', [ApplicantController::class, 'updateStatus'])->name('ppdb.status');
    Route::get('/ppdb/{id}/download', [ApplicantController::class, 'downloadPdf'])->name('ppdb.download_pdf');
    Route::resource('ppdb', ApplicantController::class);

    // Profile
    Route::get('/profile', function () {
        return view('superadmin.profile');
    })->name('profile');

    // Extracurricular Registrations
    Route::get('/extracurricular-registrations', [ExtracurricularRegistrationController::class, 'index'])->name('extracurricular-registrations.index');
    Route::get('/extracurricular-registrations/{id}/download', [ExtracurricularRegistrationController::class, 'downloadPdf'])->name('extracurricular-registrations.download');
    Route::patch('/extracurricular-registrations/{id}/status', [ExtracurricularRegistrationController::class, 'updateStatus'])->name('extracurricular-registrations.status');

    // Eskul (Custom Layout Design)
    Route::get('/eskul/registrations', [\App\Http\Controllers\ExtracurricularController::class, 'registrations'])->name('eskul.registrations');
    Route::resource('eskul', \App\Http\Controllers\ExtracurricularController::class);
    Route::post('/eskul/{eskul}/toggle', [\App\Http\Controllers\ExtracurricularController::class, 'toggleStatus'])->name('eskul.toggle');
    
    // Gallery/Album
    Route::post('/albums/{album}/toggle', [AlbumController::class, 'toggleVisibility'])->name('albums.toggle');
    Route::resource('albums', AlbumController::class);

});