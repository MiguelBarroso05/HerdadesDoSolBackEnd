<?php

use App\Http\Controllers\accommodation\AccommodationController;
use App\Http\Controllers\accommodation\AccommodationTypeController;
use App\Http\Controllers\activity\ActivityController;
use App\Http\Controllers\activity\ActivityTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\login\ChangePassword;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\login\RegisterController;
use App\Http\Controllers\login\ResetPassword;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserProfileController;
use App\Models\accommodation\Accommodation;
use App\Models\accommodation\AccommodationType;
use App\Models\activity\Activity;
use Illuminate\Support\Facades\Route;

#Routes HomePage
Route::get('/', function () {
    return view('pages.home', [
        'activities' => Activity::take(3)->get(),
        'accommodations' => Accommodation::take(9)->get(),
        'accommodation_types' => AccommodationType::take(3)->get(),
    ]);
})->name('home');

Route::group(['middleware' => 'guest'], function () {
    #Routes Auth
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
    Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
    Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
    Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
    Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
});

Route::group(['middleware' => 'auth'], function () {
    #Routes Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/sales_overview', [HomeController::class, 'salesOverview'])->name('sales.overview');

    #Routes Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    #Routes Admin
    Route::middleware('role:admin')->group(function () {
        #Routes Users
        Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
        Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::post('/users/{user}/recover', [UserController::class, 'recover'])->name('users.recover');
        Route::resource('users', UserController::class);

        #Routes Accommodations
        Route::resource('accommodations', AccommodationController::class);
        Route::resource('accommodation_types', AccommodationTypeController::class);

        #Routes Activities
        Route::resource('activities', ActivityController::class);
        Route::resource('activity_types', ActivityTypeController::class);
    });
});
