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
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    // company
    Route::get('companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.index');
    Route::get('company/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('company.create');
    Route::get('company/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('company.edit');
    
    
    // employee
    Route::get('employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employee/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('employee.create');
    Route::get('employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('employee.edit');
    
    Route::get('employee/visa/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'visaInfo'])->name('employee.visa');
    Route::get('employee/passport/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'passportInfo'])->name('employee.passport');
});

Route::prefix('user-dash')->middleware(['auth'])->group(function () {
    
});
