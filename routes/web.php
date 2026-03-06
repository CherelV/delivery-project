<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

use App\Http\Controllers\DeliveryManAuthController;
use App\Http\Controllers\CustomerAuthController; 

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});




Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/', [DashboardController::class, 'home'])->name('home');
    Route::get('/page', [DashboardController::class, 'dashboardPage'])->name('page');
    Route::get('/delivery-list', [DashboardController::class, 'deliveryList'])->name('delivery-list');
    Route::get('/delivery-man', [DashboardController::class, 'deliveryMan'])->name('delivery-man');
    Route::get('/customers', [DashboardController::class, 'customers'])->name('customers');
    Route::get('/location', [DashboardController::class, 'location'])->name('location');
    Route::get('/transaction', [DashboardController::class, 'transaction'])->name('transaction');
    Route::get('/geocalisation', [DashboardController::class, 'geocalisation'])->name('geocalisation');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

});

Route::get('/dashboard/customers', [CustomerController::class, 'index'])->name('dashboard.customers');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::patch('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/dashboard/delivery-man', [DeliveryManController::class, 'index'])->name('dashboard.delivery-man');
Route::get('/delivery-man/create', [DeliveryManController::class, 'create'])->name('delivery-man.create');
Route::post('/delivery-man', [DeliveryManController::class, 'store'])->name('delivery-man.store');
Route::get('/delivery-man/{delivery_man}', [DeliveryManController::class, 'show'])->name('delivery-man.show');
Route::get('/delivery-man/{delivery_man}/edit', [DeliveryManController::class, 'edit'])->name('delivery-man.edit');
Route::patch('/delivery-man/{delivery_man}', [DeliveryManController::class, 'update'])->name('delivery-man.update');
Route::delete('/delivery-man/{delivery_man}', [DeliveryManController::class, 'destroy'])->name('delivery-man.destroy');


Route::get('/dashboard/delivery-list', [DeliveryController::class, 'index'])->name('dashboard.delivery-list');
Route::get('/delivery-list/create', [DeliveryController::class, 'create'])->name('delivery-list.create');
Route::post('/delivery-list', [DeliveryController::class, 'store'])->name('delivery-list.store');
Route::get('/delivery-list/{delivery}', [DeliveryController::class, 'show'])->name('delivery-list.show');
Route::get('/delivery-list/{delivery}/edit', [DeliveryController::class, 'edit'])->name('delivery-list.edit');
Route::patch('/delivery-list/{delivery}', [DeliveryController::class, 'update'])->name('delivery-list.update');
Route::delete('/delivery-list/{delivery}', [DeliveryController::class, 'destroy'])->name('delivery-list.destroy');

Route::get('/custpage/create2', [DeliveryController::class, 'index2'])->name('custpage');

Route::get('/dManpage/create3', [DeliveryController::class, 'index3'])->name('dManpage');


Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::get('/test',  function () {
    return view('testFour');
});
Route::get('/landing-page', function () {
    return view('landing.landingPage');
});


/// nee

 Route::get('/landingPage', [LandingController::class, 'home'])->name('landingPage.home');

Route::middleware('auth')->group(function(){
   
    Route::get('/schedule', [LandingController::class, 'dashboardPage'])->name('landingPage.schedule');
    Route::get('/myDeliveries', [LandingController::class, 'myDeliveries'])->name('myDeliveries');
    Route::get('/landing-p1', [DeliveryController::class, 'index1']);
   
});

// Route::get('/login', [SessionController::class, 'create'])->name('login')->group(function(){
//     Route::get('/myDeliveries', [LandingController::class, 'myDeliveries'])->name('myDeliveries');
// });

// Public routes - accessible to everyone
Route::get('/', [LandingController::class, 'home'])->name('landing.page.home');
Route::get('/landingPage', [LandingController::class, 'home'])->name('landing.page.home');
Route::get('/landingPage/schedule', [LandingController::class, 'schedule'])->name('landing.page.schedule');

// Delivery Authentication Routes
Route::prefix('deliveryMan')->name('deliveryMan.')->group(function () {
    Route::get('/login', [DeliveryManAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [DeliveryManAuthController::class, 'login']);
    Route::post('/logout', [DeliveryManAuthController::class, 'logout'])->name('logout');
});

// Customer Authentication Routes
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CustomerAuthController::class, 'login']);
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');
});

// Protected Delivery Routes
Route::middleware(['deliveryMan.auth'])->prefix('deliveryMan')->name('deliveryMan.')->group(function () {
    Route::get('/my-deliveries', [DeliveryController::class, 'index'])->name('my-deliveries');
    Route::get('/delivery/{id}', [DeliveryController::class, 'show'])->name('show');
    // Add more delivery routes here
});

// Protected Customer Routes
// Route::middleware(['customer.auth'])->prefix('customer')->name('customer.')->group(function () {
//     Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
//     Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
//     // Add more customer routes here
// });