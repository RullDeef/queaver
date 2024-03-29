<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabTaskController;
use App\Http\Controllers\LabQueueController;
use App\Http\Controllers\UserPlaceController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('auth/verify', [VerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::post('auth/resend', [VerificationController::class, 'resend'])->middleware('auth')->name('verification.resend');
Route::get('auth/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware('auth')->name('verification.verify');

Route::redirect('/', 'home', 301);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('queue', LabQueueController::class)->middleware('auth');
Route::resource('task', LabTaskController::class)->middleware('auth');

Route::post('place/done', [UserPlaceController::class, 'done'])->name('place.done');
Route::resource('place', UserPlaceController::class)->middleware('auth');
