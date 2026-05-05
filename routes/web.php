<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FontController;

Route::get('/', [FontController::class, 'index']);
Route::post('/change-font', [FontController::class, 'changeFont'])->name('change.font');