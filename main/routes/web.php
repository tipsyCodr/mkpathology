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

//booking
Route::view('book', 'book')->name('book');

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



// Backend 
//Booking  routes
Route::post('package-book', [BookingController::class, 'bookPackage'])->name('package.book.store');
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
