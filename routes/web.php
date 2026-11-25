<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OrderStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'index'])->name('home');
Route::post('/pesan', [OrderController::class, 'store'])->name('orders.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('services', ServiceController::class)->except(['show']);
        Route::patch('/orders/{order}/status', [OrderStatusController::class, 'update'])->name('orders.status');
    });
});
require __DIR__.'/auth.php';
