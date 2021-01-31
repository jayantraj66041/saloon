<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\SaloonLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Home::class, 'index'])->name('home');
Route::get('/store/{id}', [Home::class, 'saloon'])->name('saloon');
Route::post('bookOrder/', [Home::class, 'booking'])->name('book_order');
Route::prefix('saloon')->group(function(){
    Route::get('/', [SaloonLogin::class, 'index'])->name('saloon_home');
    Route::get('/profile', [SaloonLogin::class, 'profile'])->name('saloon_profile');
    Route::post('/update_profile', [SaloonLogin::class, 'profile_update'])->name('saloon_update_profile');
    Route::post('/update_profile_logo', [SaloonLogin::class, 'profile_logo_update'])->name('saloon_update_logo_profile');
    Route::get('/setting', [SaloonLogin::class, 'setting'])->name('saloon_setting');
    Route::post('/isonline', [SaloonLogin::class, 'isonline'])->name('saloon_isonline');
    Route::get('/done/{id}', [SaloonLogin::class, 'done'])->name('saloon_done');
    Route::get('/pending/{id}', [SaloonLogin::class, 'pending'])->name('saloon_pending');
    Route::get('/remove/{id}', [SaloonLogin::class, 'remove'])->name('saloon_remove');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
