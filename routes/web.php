<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Customer\Index as CustomerIndex;
use App\Http\Livewire\Profile\Index as ProfileIndex;
use App\Http\Livewire\Vend\Index as VendIndex;
use App\Http\Livewire\Vend\Temp as VendTemp;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function() {
    Route::prefix('vend')->group(function() {
        Route::get('/', VendIndex::class)->name('vend');
        Route::get('/{id}/temp', VendTemp::class)->name('vend-temp');
    });

    Route::prefix('customer')->group(function() {
        Route::get('/', CustomerIndex::class)->name('customer');
    });

    Route::prefix('profile')->group(function() {
        Route::get('/', ProfileIndex::class)->name('profile');
    });
});


require __DIR__.'/auth.php';
