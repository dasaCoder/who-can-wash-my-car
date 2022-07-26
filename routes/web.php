<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FaqController;
use App\Http\Controllers\Web\HomePageController;
use App\Http\Controllers\Web\BlogPageController;
use App\Http\Controllers\Web\BlogDetailsPageController;
use App\Http\Controllers\Web\AuthController;

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

Route::get('/server-setup-qa', function () {
    Artisan::call('server-setup-qa');
});

Route::get('/server-setup-live', function () {
    Artisan::call('server-setup-live');
});

Route::get('/server-setup-db', function () {
    Artisan::call('server-setup-db');
});


Route::get('/', [HomePageController::class, 'getHomePageContent']);

Route::get('/book-servicce', function () {
    return view('web.book-service');
});

Route::get('/blog', [BlogPageController::class, 'getBlogs']);

Route::get('/blog-details/{id}', [BlogDetailsPageController::class, 'getblog']);

Route::get('/care-packeges', function () {
    return view('web.car-packages');
});

Route::get('/faq', [FaqController::class, 'getFaq']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/pro-partner-registration', function () {
    return view('web.pro-partner-registration');
});
Route::get('/pro-partner-profile', function () {
    return view('web.pro-partner-profile');
});

Route::get('/loginn', function () {
    return view('web.login');
});
Route::get('/registerr', function () {
    return view('web.register');
});

Route::post('/register/pro-customer', [AuthController::class, 'register']);

require __DIR__ . '/auth.php';
