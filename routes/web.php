<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::post('/login', [AuthController::class, 'login'])->name('login.owner');
Route::post('/register', [AuthController::class, 'register'])->name('register.owner');
Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
Route::get('/my-pets', function () { return view('pets'); })->name('pets');
Route::get('/health/vaccination', function () { return view('health.vaccination'); })->name('health.vaccination');
Route::get('/health/deworming', function () { return view('health.deworming'); })->name('health.deworming');
Route::get('/appointments', function () { return view('appointments'); })->name('appointments');
Route::get('/records', function () { return view('records'); })->name('records');
Route::get('/expenses', function () { return view('expenses'); })->name('expenses');
Route::get('/gallery', function () { return view('gallery'); })->name('gallery');
