<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FontController;

Route::get('/', [FontController::class, 'index']);
Route::post('/change-font', [FontController::class, 'changeFont'])->name('fonts.change');
Route::post('/toggle-favorite', [FontController::class, 'toggleFavorite'])->name('fonts.favorite');
Route::get('/preview', [FontController::class, 'preview'])->name('fonts.preview');