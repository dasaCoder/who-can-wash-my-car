<?php

use App\Http\Controllers\Api\v1\CommonController;

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ProfileController;
use App\Http\Controllers\Api\v1\LocationController;

use App\Http\Controllers\Api\v1\ProPartner\AvailabilityController;
use App\Http\Controllers\Api\v1\ProPartner\BankAccountController;
use App\Http\Controllers\Api\v1\ProPartner\ServiceController;

use App\Http\Controllers\Api\v1\Customer\OrderController;
use App\Http\Controllers\Api\v1\Customer\PackageController;
use App\Http\Controllers\Api\v1\Customer\SubscriptionPlanController;
use App\Http\Controllers\Api\v1\Customer\VehicleController;

use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function(){

    /////////////////////////
    /// Pro Partner Route ///
    /////////////////////////

    Route::prefix('pro-partner')->group(function(){
        Route::post('otp-send', [CommonController::class, 'otpSend']);
        Route::post('otp-verify', [CommonController::class, 'otpVerify']);
        Route::get('banks/get-all', [CommonController::class, 'getAllBanks']);
        Route::get('branches/get-by-bank/{bank_id}', [CommonController::class, 'getBranchesByBank']);
        Route::get('business-types/get-all', [CommonController::class, 'getAllBusinessTypes']);

        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);

        Route::group(['middleware' => ['auth:api']], function(){
            Route::post('logout', [AuthController::class, 'logout']);

            Route::prefix('availabilities')->group(function(){
                Route::get('get-by-user', [AvailabilityController::class, 'getByUser']);
                Route::post('create', [AvailabilityController::class, 'store']);
                Route::put('update/{id}', [AvailabilityController::class, 'update']);
                Route::delete('destroy/{id}', [AvailabilityController::class, 'destroy']);
            });

            Route::prefix('bank-accounts')->group(function(){
                Route::get('get-by-user', [BankAccountController::class, 'getByUser']);
                Route::post('create', [BankAccountController::class, 'store']);
                Route::put('update/{id}', [BankAccountController::class, 'update']);
                Route::delete('destroy/{id}', [BankAccountController::class, 'destroy']);
            });

            Route::prefix('locations')->group(function(){
                Route::get('get-by-user', [LocationController::class, 'getByUser']);
                Route::post('create', [LocationController::class, 'store']);
                Route::put('update/{id}', [LocationController::class, 'update']);
                Route::delete('destroy/{id}', [LocationController::class, 'destroy']);
            });

            Route::prefix('profile')->group(function(){
                Route::put('update', [ProfileController::class, 'update']);
            });

            Route::prefix('services')->group(function(){
                Route::get('get-all', [ServiceController::class, 'getAll']);
                Route::post('assign', [ServiceController::class, 'assignServices']);
            });
        });
    });

    //////////////////////
    /// Customer Route ///
    //////////////////////

    Route::prefix('customer')->group(function(){
        Route::post('otp-send', [CommonController::class, 'otpSend']);
        Route::post('otp-verify', [CommonController::class, 'otpVerify']);
        Route::get('business-types/get-all', [CommonController::class, 'getAllBusinessTypes']);
        Route::get('vehicle-categories/get-all', [CommonController::class, 'getAllVehicleCategories']);

        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);

        Route::group(['middleware' => ['auth:api']], function(){
            Route::post('logout', [AuthController::class, 'logout']);

            Route::prefix('locations')->group(function(){
                Route::get('get-by-user', [LocationController::class, 'getByUser']);
                Route::post('create', [LocationController::class, 'store']);
                Route::put('update/{id}', [LocationController::class, 'update']);
                Route::delete('destroy/{id}', [LocationController::class, 'destroy']);
            });

            Route::prefix('orders')->group(function(){
                Route::get('get-available-pro-partners', [OrderController::class, 'getAvailableProPartners']);
            });

            Route::prefix('packages')->group(function(){
                Route::get('get-by-vehicle-category/{vehicle_category_id}', [PackageController::class, 'getByVehicleCategory']);
            });

            Route::prefix('profile')->group(function(){
                Route::put('update', [ProfileController::class, 'update']);
            });

            Route::prefix('subscription-plans')->group(function(){
                Route::get('get-all', [SubscriptionPlanController::class, 'getAll']);
                Route::get('subscribed-plan', [SubscriptionPlanController::class, 'getSubscribedPlan']);
                Route::post('buy', [SubscriptionPlanController::class, 'buySubscriptionPlan']);
                Route::put('renew', [SubscriptionPlanController::class, 'renewSubscriptionPlan']);
                Route::put('cancel', [SubscriptionPlanController::class, 'cancelSubscriptionPlan']);
            });

            Route::prefix('vehicles')->group(function(){
                Route::get('get-by-user', [VehicleController::class, 'getByUser']);
                Route::post('create', [VehicleController::class, 'store']);
                Route::put('update/{id}', [VehicleController::class, 'update']);
                Route::delete('destroy/{id}', [VehicleController::class, 'destroy']);
            });
        });
    });
});
