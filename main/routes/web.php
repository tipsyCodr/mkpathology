<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Middleware\CheckPatient;
use Illuminate\Support\Facades\Route;

// Frontend
// --Basic
Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('search/', [WebController::class, 'search'])->name('search');
Route::get('search/query', [WebController::class, 'searchByQuery'])->name('search.query');
Route::get('search/category/{category}', [WebController::class, 'searchByCategory'])->name('search.category');

Route::get('test', [WebController::class, 'showAllTests'])->name('test');
Route::get('test-search', [WebController::class, 'searchAllTests'])->name('test.search');
Route::view('contact', 'contact')->name('contact');
Route::view('login', 'login')->name('login');
Route::view('admin-register', 'admin.register')->name('admin.register');
Route::view('register', 'register')->name('register');

Route::get('searchAll', [WebController::class, 'searchAll'])->name('search.all');
Route::get('view/{type}/{id}', [WebController::class, 'viewDescription'])->name('view.description');
Route::get('getTest/{id}', [WebController::class, 'getTest'])->name('get.test.data');
Route::get('getPackage/{id}', [WebController::class, 'getPackage'])->name('get.package.data');

//===============================================================
//Not used
// Route::view('upload-prescription', 'prescription')->name('upload.prescription');

// Used just for testing purposes
Route::get('check-permission', [UserController::class, 'CheckPermission'])->name('check.permission');

//===============================================================

//booking
Route::view('book', 'book')->name('book');
Route::get('book/{packageId}', [BookingController::class, 'index'])->name('package.book');
Route::post('package-book', [BookingController::class, 'bookPackage'])->name('package.book.store');
Route::get('package-cancel', [BookingController::class, 'cancelPackage'])->name('package.cancel');

// Test Booking
Route::view('test-book-view', 'test-book')->name('test.book.view');
Route::get('test-bookview/{testId}', [BookingController::class, 'testViewBook'])->name('test.view.select');
Route::post('book-the-test', [BookingController::class, 'bookTestFromHomepage'])->name('book.test.from.homepage');



//Prescription (Not used)
// Route::get('prescription', [PrescriptionController::cl1ass, 'index'])->name('prescription');

//Patient Register
Route::post('user-store', [UserController::class, 'store'])->name('user.store');


// Patient Login
Route::post('auth', [UserController::class, 'authenticate'])->name('authenticate.user');

//Patient Password Reset
Route::post('password-create', [UserController::class, 'resetPassword'])->name('password.create');
Route::post('reset-link', [UserController::class, 'resetLink'])->name('reset.link');
Route::view('forgot-password', 'patient.forgotpassword')->name('forgot.password');

//Admin Login
Route::post('auth-admin', [UserController::class, 'authenticate'])->name('authenticate.admin');
Route::post('create-admin', [UserController::class, 'createAdmin'])->name('create.admin');


//Logout
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('logout', [UserController::class, 'logout'])->name('logout.post');



//Make a middleware group for patient
Route::middleware(['ispatient'])->group(function () {
    //Patient
    Route::view('dashboard', 'patient.dashboard')->name('patient.dashboard');
    Route::get('patient-bookings', [BookingController::class, 'booking'])->name('patient.bookings');
    Route::view('patient-prescription', 'patient.prescription')->name('patient.prescription.view');
    Route::get('patient-setting', [UserController::class, 'fetchPatientSetting'])->name('patient.settings');
    Route::get('patient-reports', [UserController::class, 'patientReports'])->name('patient.reports');


    //Booking  routes
    Route::post('test-book', [BookingController::class, 'bookTest'])->name('test.book.store');

    //prescription
    Route::post('prescription-save', [PrescriptionController::class, 'store'])->name('prescription.store');
    Route::delete('prescription-destroy/{id}', [PrescriptionController::class, 'destroy'])->name('prescription.destroy');

    //Test
    Route::get('patient-tests', [BookingController::class, 'PatientTestView'])->name('patient.tests.view');
    Route::post('test-book', [BookingController::class, 'bookTest'])->name('test.book.store');

    //Setting Update
    Route::post('patient-update-profile', [UserController::class, 'updatePatientSetting'])->name('patient.update.profile');
    Route::post('patient-update-name', [UserController::class, 'updateName'])->name('patient.update.name');
    Route::post('patient-update-email', [UserController::class, 'updatetEmail'])->name('patient.update.email');
    Route::post('patient-update-pass', [UserController::class, 'updatePassword'])->name('patient.update.pass');



});

//Make a middleware group for admin
Route::middleware(['isadmin'])->group(function () {

    // Backend 
    //Admin

    // Test
    Route::get('test-view', [TestController::class, 'view'])->name('test.view');
    Route::get('test-edit/{id}', [TestController::class, 'edit'])->name('test.edit');
    Route::post('test-update', [TestController::class, 'update'])->name('test.update');

    Route::post('store-test', [TestController::class, 'store'])->name('test.store');
    Route::post('destroy-test/{id}', [TestController::class, 'destroy'])->name('test.destroy');


    Route::get('admin', [WebController::class, 'admin'])->name('admin');
    Route::get('all-bookings', [WebController::class, 'booking'])->name('all.bookings');
    Route::get('confirm-booking/{type}/{id}/{status}', [WebController::class, 'confirmBooking'])->name('confirm.booking');
    Route::post('reschedule-booking/', [WebController::class, 'rescheduleBooking'])->name('reschedule.booking');

    // Categories
    Route::get('admin/categories/show', [WebController::class, 'showCategory'])->name('category.show');
    Route::post('admin/categories/create', [WebController::class, 'createCategory'])->name('category.create');
    Route::post('admin/categories/edit/{id}', [WebController::class, 'editCategory'])->name('category.edit');
    Route::delete('admin/categories/destroy/{id}', [WebController::class, 'deleteCategory'])->name('category.destroy');

    //parameters
    // Route::post('parameters-import', [ParameterController::class, 'importFromExcel'])->name('parameters.import');
    Route::post('parameters-import-do', [ParameterController::class, 'importFromExcel'])->name('parameters.import.do');
    Route::get('parameters-view', [ParameterController::class, 'index'])->name('parameters.view');
    Route::post('parameters-add', [ParameterController::class, 'store'])->name('parameters.store');
    Route::get('/parameters-edit/{parameter}', [ParameterController::class, 'edit'])->name('parameters.edit');
    Route::put('/parameters/{parameter}', [ParameterController::class, 'update'])->name('parameters.update');
    Route::delete('parameters-delete/{parameter}', [ParameterController::class, 'destroy'])->name('parameters.delete');

    Route::get('prescription-view', [PrescriptionController::class, 'view'])->name('prescription.view');
    Route::get('prescription-show', [PrescriptionController::class, 'show'])->name('admin.prescription.show');
    Route::post('book-for', [BookingController::class, 'bookFor'])->name('test.book.for');


    // Package
    Route::get('package-view', [PackageController::class, 'viewAll'])->name('package.view');
    Route::get('all-reports', [PackageController::class, 'allReports'])->name('admin.reports');

    // Package
    Route::post('store-package', [PackageController::class, 'store'])->name('package.store');
    Route::get('edit-package/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('package-update', [PackageController::class, 'update'])->name('package.update');
    Route::post('destroy-package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

});
