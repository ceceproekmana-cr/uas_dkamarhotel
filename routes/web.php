<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelRoomController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| WEBSITE PENGUNJUNG
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/rooms', [HomeController::class, 'rooms'])->name('rooms');

Route::get('/rooms/{id}', [HomeController::class, 'roomDetail'])
    ->name('rooms.detail');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

Route::get('/facilities', [HomeController::class, 'facilities'])->name('facilities');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::post('/contact/send', [ContactController::class,'store'])->name('contact.store');

Route::redirect('/admin', '/login');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::middleware('auth.check')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Data Kamar
    Route::resource('hotel_rooms', HotelRoomController::class);

    Route::get(
        '/hotel_rooms/export/pdf',
        [HotelRoomController::class, 'exportPDF']
    )->name('hotel_rooms.export');

    // CRUD Galeri
    Route::resource('galleries', GalleryController::class);

    Route::resource('messages', MessageController::class);

});