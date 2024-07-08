<?php
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;


Route::get('/user/index', [ApiController::class, 'index'])->name('api.index');
Route::get('/user/{user}/show', [ApiController::class, 'show'])->name('api.show');
Route::get('/me', fn () => res_json(auth()->user()))->name('api.me');
Route::post('/user/store', [ApiController::class, 'store'])->name('api.store');
