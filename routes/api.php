<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\EcomAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Define a simple route for testing
Route::get('/ping', function () {
    return response()->json(['message' => 'Hello from API']);
});

Route::post('/register-user', [AuthController::class, 'storeUser']);
Route::post('/login-user', [AuthController::class, 'loginUser']);
Route::get('/get-genders', [AuthController::class, 'getGenders']);

Route::middleware('auth.user')->get('/secure-data', function (Request $request) {
    return response()->json([
        'status' => true,
        'status_code' => 'EC_1111',
        'message' => 'Access granted',
        'user_id' => $request->header(key: 'user_id'),
    ]);

    Route::middleware(['check_role:1'])->group(function () {
        Route::post('/admin/add-staff', [EcomAdminController::class, 'store']); // API to add users
        // Route::get('/admin/roles', [UserController::class, 'getRoles']); // Get list of roles
    });
});
