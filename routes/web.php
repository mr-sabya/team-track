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

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');

    // company
    Route::get('companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.index');
    Route::get('company/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('company.create');
    Route::get('company/edit-dates/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('company.edit');
    Route::get('company/edit-basic-info/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'editBasicInfo'])->name('company.edit-basic-info');
    Route::get('company/attachment/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'attachment'])->name('company.attachment');
    Route::get('company/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'show'])->name('company.show');


    // employee
    Route::get('employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employees/filter', [App\Http\Controllers\Admin\EmployeeController::class, 'filterData'])->name('employee.filterData');

    Route::prefix('employee')->as('employee.')->group(function () {

        Route::get('download-demo-excel', [App\Http\Controllers\Admin\EmployeeController::class, 'demoExcelData'])->name('download-demo-excel');
        Route::get('download-demo-csv', [App\Http\Controllers\Admin\EmployeeController::class, 'demoCSVData'])->name('download-demo-csv');

        Route::post('upload-data', [App\Http\Controllers\Admin\EmployeeController::class, 'uploadData'])->name('upload');


        Route::get('create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('create');
        Route::get('bulk-add', [App\Http\Controllers\Admin\EmployeeController::class, 'addBulk'])->name('bulk');

        Route::get('edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('edit');

        Route::get('visa/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'visaInfo'])->name('visa');
        Route::get('passport/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'passportInfo'])->name('passport');
        Route::get('vehicle/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'vehicleInfo'])->name('vehicle');
        Route::get('driving-license/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'DrivingLicense'])->name('driving-license');
        Route::get('emirates-info/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'EmiratesInfo'])->name('emirates');
        Route::get('insurance-info/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'InsuranceInfo'])->name('insurance');
        Route::get('extras/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'extras'])->name('extras');
    });


    // 
    Route::get('insurance-type', [App\Http\Controllers\Admin\InsuranceTypeController::class, 'index'])->name('insurance.index');
    Route::get('insurance-type/trash', [App\Http\Controllers\Admin\InsuranceTypeController::class, 'trash'])->name('insurance.trash');


    // role
    Route::get('roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role.index');
    Route::get('permissions', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permission.index');

    // backup
    Route::get('backup', [App\Http\Controllers\Admin\BackupController::class, 'index'])->name('backup.index');
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


Route::prefix('company-dash')->as('company-dash.')->middleware(['auth', 'company'])->group(function () {
    Route::get('/', [App\Http\Controllers\Company\HomeController::class, 'index'])->name('home');

    Route::get('/company-profile', [App\Http\Controllers\Company\ProfileController::class, 'index'])->name('profile');


    // employee
    Route::get('employees', [App\Http\Controllers\Company\EmployeeController::class, 'index'])->name('employee.index');

    Route::prefix('employee')->as('employee.')->group(function () {
        Route::get('create', [App\Http\Controllers\Company\EmployeeController::class, 'create'])->name('create');
        Route::get('edit/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'edit'])->name('edit');

        Route::get('visa/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'visaInfo'])->name('visa');
        Route::get('passport/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'passportInfo'])->name('passport');
        Route::get('vehicle/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'vehicleInfo'])->name('vehicle');
        Route::get('driving-license/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'DrivingLicense'])->name('driving-license');
        Route::get('emirates-info/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'EmiratesInfo'])->name('emirates');
        Route::get('insurance-info/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'InsuranceInfo'])->name('insurance');
    });
});
