<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/dashboard-page', function () {
    return view('dashboard-page');
});
Route::get('/delivery-list', function () {
    return view('deliverylist');
});
Route::get('/delivery-man', function () {
    return view('deliveryMan');
});
Route::get('/customers', function () {
    return view('customers');
});
Route::get('/location', function () {
    return view('location');
});