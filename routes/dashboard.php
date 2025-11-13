<?php

use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ExportController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\ServiceRequestController;

Route::middleware('auth:admin')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('/contact_us', ContactUsController::class);
    Route::resource('/service_request', ServiceRequestController::class);

    // إضافة المسار الجديد للعداد
    Route::get('/service_request/ajax/count', [ServiceRequestController::class, 'getCount'])
        ->name('service_request.count');

    Route::patch('/contact_us/{contactUs}/toggle-read', [ContactUsController::class, 'toggleRead'])
        ->name('contact_us.toggleRead');
    Route::get('/export/excel', ExportController::class)->name('export.excel');
});
