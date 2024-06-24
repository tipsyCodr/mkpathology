<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Frontend
// Basic
Route::view('/', 'home')->name('home');
Route::view('test', 'tests')->name('test');
Route::view('contact', 'contact')->name('contact');

//login and Register
Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');
Route::view('upload-prescription', 'prescription')->name('upload.prescription');

//booking
Route::view('book', 'book')->name('book');
Route::get('check-permission', [UserController::class, 'CheckPermission'])->name('check.permission');

// Test
Route::get('test-view', [TestController::class, 'view'])->name('test.view');

// Package
Route::get('package-view', [PackageController::class, 'view'])->name('package.view');

//Prescription
Route::get('prescription', [PrescriptionController::class, 'index'])->name('prescription');

//Admin
Route::get('admin', [WebController::class, 'admin'])->name('admin');
Route::get('all-bookings', [WebController::class, 'booking'])->name('all.bookings');
Route::get('prescription-view', [PrescriptionController::class, 'view'])->name('prescription.view');

//Patient
Route::view('dashboard', 'patient.dashboard')->name('patient.dashboard');
Route::get('patient-bookings', [BookingController::class, 'booking'])->name('patient.bookings');
Route::view('patient-prescription', 'patient.prescription')->name('patient.prescription.view');

// Backend 
//Booking  routes
Route::post('package-book', [BookingController::class, 'bookPackage'])->name('package.book.store');
Route::get('package-cancel', [BookingController::class, 'cancelPackage'])->name('package.cancel');
Route::post('test-book', [BookingController::class, 'bookTest'])->name('test.book.store');

// Test
Route::post('store-test', [TestController::class, 'store'])->name('test.store');
Route::post('destroy-test/{id}', [TestController::class, 'destroy'])->name('test.destroy');

// Package
Route::post('store-package', [PackageController::class, 'store'])->name('package.store');
Route::post('destroy-package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

//Patient Register
Route::post('user-store', [UserController::class, 'store'])->name('user.store');

//prescription
Route::post('prescription-save', [PrescriptionController::class, 'store'])->name('prescription.store');

// Patient Login
Route::post('auth', [UserController::class, 'authenticate'])->name('authenticate.user');

//Patient Password Reset
Route::post('password-create', [UserController::class, 'resetPassword'])->name('password.create');
Route::post('reset-link', [UserController::class, 'resetLink'])->name('reset.link');
Route::view('forgot-password', 'patient.forgotpassword')->name('forgot.password');

//Admin Login
Route::post('auth-admin', [UserController::class, 'authenticate'])->name('authenticate.admin');


//Logout
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('logout', [UserController::class, 'logout'])->name('logout.post');