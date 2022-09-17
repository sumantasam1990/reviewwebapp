<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LevelTwoController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
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




Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {

    Route::get('/users', function () {
        return response()->json(User::all());
    });


    Route::get('level/two/show/{id}', [LevelTwoController::class, 'show']);
    Route::get('carts', [CartController::class, 'index']);







});

Route::prefix('v1')->group(function () {

    Route::post('register', [\App\Http\Controllers\PassportAuthController::class, 'register']);

    Route::post('/sanctum/token', function (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['err' => 'Please check your email or password.'], 401);
        }

        return response()->json(['token' => $user->createToken($request->email.uniqid())->plainTextToken], 200);
    });



});
