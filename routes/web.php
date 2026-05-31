<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LostReportController;
use App\Http\Controllers\FoundReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('items', ItemController::class);

    Route::resource('lost-reports', LostReportController::class);

    Route::resource('found-reports', FoundReportController::class);

    Route::resource('claims', ClaimController::class);
});

require __DIR__.'/auth.php';