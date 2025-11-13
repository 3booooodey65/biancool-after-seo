<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ServiceRequestController;

Route::get('/', [HomeController::class, 'getHomePage'])->name('home');
Route::get('/about', [AboutController::class, 'getAboutPage'])->name('about');
Route::get('/service', [ServiceController::class, 'getServicePage'])->name('service');
Route::get('/service/cooling', [ServiceController::class, 'getServiceCoolingPage'])->name('service.cooling');
Route::get('/service/home_appliances', [ServiceController::class, 'getServiceHomeAppliancesPage'])->name('service.home_appliances');
Route::get('/service/restaurant_equipment', [ServiceController::class, 'getServiceRestaurantEquipmentPage'])->name('service.restaurant_equipment');
Route::get('/service/cold_rooms', [ServiceController::class, 'getServiceColdRoomsPage'])->name('service.cold_rooms');
Route::resource('/service_request', ServiceRequestController::class);
Route::resource('/contact_us', ContactUsController::class);

Auth::routes();
