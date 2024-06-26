<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Middleware\CheckPatient;
use Illuminate\Support\Facades\Route;

// Frontend
// Basic
Route::view('/', 'home')->name('home');
// Route::view('test', 'tests')->name('test');
Route::get('test', [WebController::class, 'showAllTests'])->name('test');
Route::get('test-search', [WebController::class, 'searchAllTests'])->name('test.search');
Route::view('contact', 'contact')->name('contact');
Route::view('login', 'login')->name('login');
Route::view('admin-register', 'admin.register')->name('admin.register');
Route::view('register', 'register')->name('register');

//===============================================================
//Not used
// Route::view('upload-prescription', 'prescription')->name('upload.prescription');

// Used just for testing purposes
Route::get('check-permission', [UserController::class, 'CheckPermission'])->name('check.permission');

//===============================================================

//booking
Route::view('book', 'book')->name('book');
Route::post('package-book', [BookingController::class, 'bookPackage'])->name('package.book.store');
Route::get('package-cancel', [BookingController::class, 'cancelPackage'])->name('package.cancel');


// Test
Route::get('test-view', [TestController::class, 'view'])->name('test.view');


//Prescription (Not used)
// Route::get('prescription', [PrescriptionController::class, 'index'])->name('prescription');

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
    // Route::view('patient-setting', 'patient.settings')->name('patient.settings');
    Route::get('patient-setting', [UserController::class, 'fetchPatientSetting'])->name('patient.settings');

    //Booking  routes
    Route::post('test-book', [BookingController::class, 'bookTest'])->name('test.book.store');

    //prescription
    Route::post('prescription-save', [PrescriptionController::class, 'store'])->name('prescription.store');
    Route::delete('prescription-destroy/{id}', [PrescriptionController::class, 'destroy'])->name('prescription.destroy');

    //Test
    Route::post('test-book', [BookingController::class, 'bookTest'])->name('test.book.store');
    Route::get('patient-tests', [BookingController::class, 'PatientTestView'])->name('patient.tests.view');

    //Setting Update
    Route::post('patient-update-profile', [UserController::class, 'updatePatientSetting'])->name('patient.update.profile');
    Route::post('patient-update-name', [UserController::class, 'updateName'])->name('patient.update.name');
    Route::post('patient-update-email', [UserController::class, 'updatetEmail'])->name('patient.update.email');
    Route::post('patient-update-pass', [UserController::class, 'updatePassword'])->name('patient.update.pass');

    Route::view('patient-reports', 'patient.reports')->name('patient.reports');


});

//Make a middleware group for admin
Route::middleware(['isadmin'])->group(function () {

    // Backend 
    //Admin
    Route::get('admin', [WebController::class, 'admin'])->name('admin');
    Route::get('all-bookings', [WebController::class, 'booking'])->name('all.bookings');
    Route::get('prescription-view', [PrescriptionController::class, 'view'])->name('prescription.view');

    // Package
    Route::get('package-view', [PackageController::class, 'view'])->name('package.view');
    Route::get('all-reports', [PackageController::class, 'allReports'])->name('admin.reports');

    // Test
    Route::post('store-test', [TestController::class, 'store'])->name('test.store');
    Route::post('destroy-test/{id}', [TestController::class, 'destroy'])->name('test.destroy');

    // Package
    Route::post('store-package', [PackageController::class, 'store'])->name('package.store');
    Route::post('destroy-package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

});
