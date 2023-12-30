<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\doctor\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\patient\PatientController;
use Illuminate\Support\Facades\Route;

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

// AUTH CONTROLLER ROUTES 
Route::middleware('applang')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/login', 'login')->name('login')->middleware('guest');
        Route::post('/login', 'doLogin')->name('doLogin')->middleware('guest');;
        Route::delete('/logout', 'logout')->name('logout')->middleware('auth');;
        Route::get('/register', 'register')->name('register')->middleware('guest');;
        Route::post('/register', 'doRegister')->name('doRegister')->middleware('guest');;
    });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home.index');
    });

    Route::middleware('auth')->group(function () {
        Route::controller(PatientController::class)->prefix('/patient')->middleware('patientaccess')->group(function () {
            Route::get('/', 'index')->name('patient.index');
            Route::get('/reservation', 'create')->name('patient.create');
            Route::post('/reservation', 'store')->name('patient.store');
            Route::get('/{reservation}/reservation', 'edit')->name('patient.edit');
            Route::put('/{reservation}/reservation', 'update')->name('patient.update');
            Route::delete('/{reservation}/reservation', 'destroy')->name('patient.destroy');
        });

        Route::controller(AdminController::class)->prefix('/admin')->middleware('adminaccess')->group(function () {
            Route::get('/', 'index')->name('admin.index');
            Route::get('/create', 'create')->name('admin.create');
            Route::post('/create', 'store')->name('admin.store');
            Route::get('/{doctor}/edit', 'edit')->name('admin.edit');
            Route::put('/{doctor}/edit', 'update')->name('admin.update');
            Route::delete('/{doctor}', 'destroy')->name('admin.destroy');
        });

        Route::controller(DoctorController::class)->prefix('/doctor')->middleware('doctoraccess')->group(function () {
            Route::get('/', 'index')->name('doctor.index');
        });
    });
    Route::get('/convertLang/{locale}', function (string $locale) {
        if (in_array($locale, ['fr', 'ar'])) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    });
});
