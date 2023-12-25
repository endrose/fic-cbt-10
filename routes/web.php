<?php

use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login',);
});


Route::middleware(['auth'])->group(function () {
    //
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');
    Route::resource('users', UserController::class);


    Route::resource('soals', SoalController::class);

    // Route::get('soal', function () {
    //     return view('pages.soal.index');
    // })->name('soal');
});

// Route::get('/login', function () {
//     return view('pages.auth.login');
// })->name('login');


// Route::get('/register', function () {
//     return view('pages.register');
// })->name('register');

// Route::get('/users', function () {
//     return view('pages.users.index');
// });
