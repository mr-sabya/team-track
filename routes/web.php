<?php

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


Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('auth.login');
Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('auth.logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('auth.register');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    // company
    Route::get('companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.index');
    Route::get('company/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('company.create');
    Route::get('company/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('company.edit');
    Route::get('company/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'show'])->name('company.show');


    // employee
    Route::get('employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employee.index');

    Route::prefix('employee')->as('employee.')->group(function () {
        Route::get('create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('create');
        Route::get('edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('edit');

        Route::get('visa/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'visaInfo'])->name('visa');
        Route::get('passport/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'passportInfo'])->name('passport');
        Route::get('vehicle/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'vehicleInfo'])->name('vehicle');
        Route::get('driving-license/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'DrivingLicense'])->name('driving-license');
        Route::get('emirates-info/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'EmiratesInfo'])->name('emirates');
        Route::get('insurance-info/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'InsuranceInfo'])->name('insurance');
    });


    Route::get('insurance-type', [App\Http\Controllers\Admin\InsuranceTypeController::class, 'index'])->name('insurance.index');
    // 
});

Route::prefix('employee-dash')->as('employee-dash.')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Employee\HomeController::class, 'index'])->name('home');
    
    Route::get('profile', [App\Http\Controllers\Employee\HomeController::class, 'profile'])->name('profile');
    Route::get('visa', [App\Http\Controllers\Employee\HomeController::class, 'visaInfo'])->name('visa');
    Route::get('passport', [App\Http\Controllers\Employee\HomeController::class, 'passportInfo'])->name('passport');
    Route::get('vehicle', [App\Http\Controllers\Employee\HomeController::class, 'vehicleInfo'])->name('vehicle');
    Route::get('driving-license', [App\Http\Controllers\Employee\HomeController::class, 'DrivingLicense'])->name('driving-license');
    Route::get('emirates-info', [App\Http\Controllers\Employee\HomeController::class, 'EmiratesInfo'])->name('emirates');
    Route::get('insurance-info', [App\Http\Controllers\Employee\HomeController::class, 'InsuranceInfo'])->name('insurance');


    Route::get('change-password', [App\Http\Controllers\Employee\HomeController::class, 'password'])->name('password');
});
