<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitmentFormController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/dashboard', [RecruitmentFormController::class, 'index'])->name('dashboard');
Route::delete('/destroy/{id}', [RecruitmentFormController::class, 'destroy'])->name('recruitments.destroy');


});

require __DIR__.'/auth.php';
