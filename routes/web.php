<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Ui\HomepageController;
use App\Http\Controllers\UR\ApartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ui\ApartmentsController as UiApartmentsController;
use App\Http\Controllers\UR\DashboardController;

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

Route::get('/', [HomepageController::class , 'index'] )->name('home');

Route::get('/apartments', [UiApartmentsController::class, 'index'])->name('apartments.index');
Route::get('/apartments/{apartment}', [UiApartmentsController::class, 'show'])->name('apartments.show');
Route::post('/apartments/{apartment}/lead', [UiApartmentsController::class, 'store'])->name('lead.store');

Route::middleware(['auth', 'userApartment'])->prefix('dashboard')->group(function () {
    Route::resource('/apartment', ApartmentController::class);
})->name('dashboard');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/message', [DashboardController::class, 'messageIndex'])->name('dashboard.messageIndex');
    Route::put('/message/{lead}/edit', [UiApartmentsController::class, 'update'])->name('dashboard.messageUpdate');
})->name('dashboard');

Route::middleware('auth')->prefix('ur')->name('ur.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
