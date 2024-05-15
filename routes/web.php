<?php

use Illuminate\Support\Facades\Route;

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', function () {
            App\Models\Tenant::all()->runForEach(function () {
                App\Models\User::factory()->create();
            });
            return view('welcome');
        });

        Route::get('/create-tenant', [\App\Http\Controllers\TenantDataController::class, 'index'])->name('create-tenant');
        Route::post('/create-tenant', [\App\Http\Controllers\TenantDataController::class, 'store'])->name('tenant.store');
        Route::get('/edit-tenant', [\App\Http\Controllers\TenantDataController::class, 'edit'])->name('edit-tenant');
        Route::post('/edit-tenant/{id}', [\App\Http\Controllers\TenantDataController::class, 'update'])->name('tenant.update');
    });
}