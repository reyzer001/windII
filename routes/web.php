<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('jurnal')->name('journal.')->group(function () {
    Route::get('/', [JournalController::class, 'index'])->name('index');
    Route::get('/create', [JournalController::class, 'create'])->name('create');
    Route::post('/', [JournalController::class, 'store'])->name('store');
    Route::get('/approve', [JournalController::class, 'approve'])->name('approve');
});


require __DIR__.'/auth.php';
