<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TypeController;


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


// TOPページ
Route::get('/', [TweetController::class, 'top'])->name('top');

// typeの一覧、登録、削除
Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');
Route::post('/types', [TypeController::class, 'store'])->name('types.store');
Route::get('/types', [TypeController::class, 'index'])->name('types.index');
Route::delete('/types/{key}', [TypeController::class, 'destroy'])->name('types.destroy');

// type別一覧ページ
Route::get('/{type}', [TweetController::class, 'index'])->name('tweets.index');
