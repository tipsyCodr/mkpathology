<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

//basic routes
Route::view('/', 'home')->name('home');
Route::view('test', 'tests')->name('test');
Route::view('contact', 'contact')->name('contact');

//login and Register
Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');

//booking
Route::view('book', 'book')->name('book');


//backend routes
Route::post('book-test', [BookingController::class, 'bookTest'])->name('book.store');