<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')
    ->middleware('api')
    ->namespace('App\Http\Controllers')
    ->group(base_path('routes/api.php'));

// Route::get('/api/user/{id}/show', [ApiController::class, 'show'])->name('api.show');

// Route::post('/api/user/store', [ApiController::class, 'store'])->name('api.store');