

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\EcomAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/ping', function () {

    return response()->json([
        'message' => 'Hello from API'
    ]);
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::post('/register-user', [AuthController::class, 'storeUser']);

Route::post('/login-user', [AuthController::class, 'loginUser']);

Route::get('/get-genders', [AuthController::class, 'getGenders']);

Route::prefix('home')->group(function () {

    Route::get('/getAllCategories', [CategoryController::class, 'getAllCategories']);

    Route::get('/getFirstTenCategories', [CategoryController::class, 'getFirstTenCategories']);

    Route::post('/getCategoryWiseSubCategories', [CategoryController::class, 'getCategoryWiseSubCategories']);
});


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth.user')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Common Authenticated Route
    |--------------------------------------------------------------------------
    */

    Route::get('/secure-data', function (Request $request) {

        return response()->json([
            'status' => true,
            'status_code' => 'EC_1111',
            'message' => 'Access granted',
            'user_id' => $request->header('user-id'),
        ]);
    });


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth.user:1')->prefix('admin')->group(function () {

        Route::post('/add-staff', [EcomAdminController::class, 'store']);

        Route::get('/dashboard', function () {

            return response()->json([
                'message' => 'Admin Dashboard'
            ]);
        });
    });


    /*
    |--------------------------------------------------------------------------
    | Shopkeeper Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth.user:2')->prefix('shopkeeper')->group(function () {

        Route::get('/dashboard', function () {

            return response()->json([
                'message' => 'Shopkeeper Dashboard'
            ]);
        });
    });


    /*
    |--------------------------------------------------------------------------
    | Customer Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth.user:3')->prefix('customer')->group(function () {

        Route::get('/dashboard', function () {

            return response()->json([
                'message' => 'Customer Dashboard'
            ]);
        });


        Route::get('/getCurrentCustomerDetails', [CustomerController::class, 'getCurrentCustomerDetails']);
        Route::post('/edit-profile', [CustomerController::class, 'editProfile']);

    });


    /*
    |--------------------------------------------------------------------------
    | Support Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth.user:4')->prefix('support')->group(function () {

        Route::get('/dashboard', function () {

            return response()->json([
                'message' => 'Support Dashboard'
            ]);
        });
    });


    /*
    |--------------------------------------------------------------------------
    | Delivery Manager Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth.user:5')->prefix('delivery')->group(function () {

        Route::get('/dashboard', function () {

            return response()->json([
                'message' => 'Delivery Dashboard'
            ]);
        });
    });


    /*
    |--------------------------------------------------------------------------
    | Inventory Manager Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth.user:6')->prefix('inventory')->group(function () {

        Route::get('/dashboard', function () {

            return response()->json([
                'message' => 'Inventory Dashboard'
            ]);
        });
    });

});