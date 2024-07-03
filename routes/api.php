<?php
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/user/{user}/show', [ApiController::class, 'show'])->name('api.show');
Route::post('/user/store', [ApiController::class, 'store'])->name('api.store');