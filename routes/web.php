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


// admin panel
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('users/trash', [App\Http\Controllers\Admin\UserController::class, 'trash'])->name('user.trash');
    
    Route::get('user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');

    // company
    Route::get('companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.index');
    Route::get('companies/trash', [App\Http\Controllers\Admin\CompanyController::class, 'trash'])->name('company.trash');
    
    //document type
    Route::get('document-type', [App\Http\Controllers\Admin\DocumentTypeController::class, 'index'])->name('document-type.index');

    Route::get('company/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('company.create');
    Route::get('company/edit-dates/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('company.edit');
    Route::get('company/edit-basic-info/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'editBasicInfo'])->name('company.edit-basic-info');
    Route::get('company/attachment/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'attachment'])->name('company.attachment');
    Route::get('company/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'show'])->name('company.show');


    // employee
    Route::get('employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employees/trash', [App\Http\Controllers\Admin\EmployeeController::class, 'trash'])->name('employee.trash');
    
    Route::get('employees/filter', [App\Http\Controllers\Admin\EmployeeController::class, 'filterData'])->name('employee.filterData');

    Route::prefix('employee')->as('employee.')->group(function () {


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


    // profile
    Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');

    // notofication
    Route::get('notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notification.index');
    Route::get('setting', [App\Http\Controllers\Admin\NotificationController::class, 'setting'])->name('notification.setting');


    // plan
    Route::get('plans', [App\Http\Controllers\Admin\PlanController::class, 'index'])->name('plan.index');
    // company plans
    Route::get('plans/company', [App\Http\Controllers\Admin\PlanController::class, 'companyPlans'])->name('plan.company');

    // cache
    Route::get('cache', [App\Http\Controllers\Admin\CacheController::class, 'index'])->name('cache.index');

});


Route::middleware(['auth'])->group(function () {
    Route::get('download-demo-excel', [App\Http\Controllers\Admin\EmployeeController::class, 'demoExcelData'])->name('download-demo-excel');
    Route::get('download-demo-csv', [App\Http\Controllers\Admin\EmployeeController::class, 'demoCSVData'])->name('download-demo-csv');

    Route::get('users/trashcounter', [App\Http\Controllers\Admin\UserController::class, 'trashCounter'])->name('user.trashcounter');

    Route::get('companies/trashcounter', [App\Http\Controllers\Admin\CompanyController::class, 'trashCounter'])->name('company.trashcounter');

    Route::get('employees/trashcount', [App\Http\Controllers\Admin\EmployeeController::class, 'trashCounter'])->name('employee.trashcount');
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
    Route::get('extras', [App\Http\Controllers\Employee\HomeController::class, 'extras'])->name('extras');



    Route::get('change-password', [App\Http\Controllers\Employee\HomeController::class, 'password'])->name('password');
    
    // notofication
    Route::get('notifications', [App\Http\Controllers\Employee\NotificationController::class, 'index'])->name('notification.index');

});


Route::prefix('company-dash')->as('company-dash.')->middleware(['auth', 'company'])->group(function () {
    Route::get('/', [App\Http\Controllers\Company\HomeController::class, 'index'])->name('home');

    Route::get('company-profile', [App\Http\Controllers\Company\ProfileController::class, 'editBasicInfo'])->name('edit-basic-info');
    Route::get('company-profile/dates', [App\Http\Controllers\Company\ProfileController::class, 'index'])->name('profile-dates');
    Route::get('company-profile/attachment', [App\Http\Controllers\Company\ProfileController::class, 'attachment'])->name('attachment');

    // profile
    Route::get('profile', [App\Http\Controllers\Company\UserProfileController::class, 'index'])->name('profile');



    // employee
    Route::get('employees', [App\Http\Controllers\Company\EmployeeController::class, 'index'])->name('employee.index');

    Route::prefix('employee')->as('employee.')->group(function () {
        Route::get('create', [App\Http\Controllers\Company\EmployeeController::class, 'create'])->name('create');
        Route::get('bulk-add', [App\Http\Controllers\Company\EmployeeController::class, 'addBulk'])->name('bulk');
        Route::get('edit/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'edit'])->name('edit');

        Route::get('visa/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'visaInfo'])->name('visa');
        Route::get('passport/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'passportInfo'])->name('passport');
        Route::get('vehicle/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'vehicleInfo'])->name('vehicle');
        Route::get('driving-license/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'DrivingLicense'])->name('driving-license');
        Route::get('emirates-info/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'EmiratesInfo'])->name('emirates');
        Route::get('insurance-info/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'InsuranceInfo'])->name('insurance');
        Route::get('extras/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'extras'])->name('extras');
    });

    // notifications
    Route::get('notifications', [App\Http\Controllers\Company\NotificationController::class, 'index'])->name('notification.index');

    // plan
    Route::get('plans', [App\Http\Controllers\Company\PlanController::class, 'index'])->name('plan.index');
    Route::get('plans/apply/{id}', [App\Http\Controllers\Company\PlanController::class, 'apply'])->name('plan.apply');
});
