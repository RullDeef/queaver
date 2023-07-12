<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabQueueController;
use App\Http\Controllers\LabTaskController;
use App\Http\Controllers\UserPlaceController;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [RegisterController::class, 'register']);

Route::post('sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'error' => 'Invalid credentials',
        ], 401);
    }

    return response()->json([
        'token' => $user->createToken('api_user_token')->plainTextToken,
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('queue', LabQueueController::class)->middleware('auth:sanctum');
Route::resource('task', LabTaskController::class)->middleware('auth:sanctum');
Route::resource('place', UserPlaceController::class)->middleware('auth:sanctum');
