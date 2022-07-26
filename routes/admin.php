<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BankBranchController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\SubscriptionPackageController;
use App\Http\Controllers\Admin\SubscriptionPlanController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::prefix('bank-management')->name('bank_management.')->group(function () {

        Route::prefix('banks')->name('banks.')->group(function () {
            Route::post('change-status', [BankController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('banks', BankController::class, resourceNames('banks'));

        Route::prefix('bank-branches')->name('bank_branches.')->group(function () {
            Route::post('change-status', [BankBranchController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('bank-branches', BankBranchController::class, resourceNames('bank_branches'));

    });

    Route::prefix('service-management')->name('service_management.')->group(function () {

        Route::prefix('services')->name('services.')->group(function () {
            Route::post('change-status', [ServiceController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('services', ServiceController::class, resourceNames('services'));

    });

    Route::prefix('package-management')->name('package_management.')->group(function () {

        Route::prefix('packages')->name('packages.')->group(function () {
            Route::post('change-status', [PackageController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('packages', PackageController::class, resourceNames('packages'));

    });

    Route::prefix('subscription-management')->name('subscription_management.')->group(function () {

        Route::prefix('subscription-packages')->name('subscription_packages.')->group(function () {
            Route::post('change-status', [SubscriptionPackageController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('subscription-packages', SubscriptionPackageController::class, resourceNames('subscription_packages'));

        Route::prefix('subscription-plans')->name('subscription_plans.')->group(function () {
            Route::post('change-status', [SubscriptionPlanController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('subscription-plans', SubscriptionPlanController::class, resourceNames('subscription_plans'));

    });

    Route::prefix('web-content-management')->name('web_content_management.')->group(function () {

        Route::get('home', [PageContentController::class, 'home'])->name('home');
        Route::post('home/update', [PageContentController::class, 'updateHome'])->name('update_home');

        Route::get('about-us', [PageContentController::class, 'aboutUs'])->name('about_us');
        Route::post('about-us/update', [PageContentController::class, 'updateAboutUs'])->name('update_about_us');

        Route::get('contact-details', [PageContentController::class, 'contactDetails'])->name('contact_details');
        Route::post('contact-details/update', [PageContentController::class, 'updateContactDetails'])->name('update_contact_details');

        Route::get('links', [PageContentController::class, 'links'])->name('links');
        Route::post('links/update', [PageContentController::class, 'updateLinks'])->name('update_links');

        Route::prefix('blogs')->name('blogs.')->group(function () {
            Route::post('change-status', [BlogController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('blogs', BlogController::class, resourceNames('blogs'));

        Route::prefix('faqs')->name('faqs.')->group(function () {
            Route::post('change-status', [FaqController::class, 'changeStatus'])->name('change_status');
        });
        Route::resource('faqs', FaqController::class, resourceNames('faqs'));

    });

});

