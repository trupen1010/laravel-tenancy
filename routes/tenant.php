<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\MailConfigController;
use App\Http\Controllers\Tenant\UserController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
Route::middleware(['web', InitializeTenancyByDomain::class, PreventAccessFromCentralDomains::class])->group(function () {    

    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    Route::resource('/users', UserController::class)->names([
        'index' => 'tenant.user.index',
        'create' => 'tenant.user.create',
        'store' => 'tenant.user.store',
        'edit' => 'tenant.user.edit',
        'update' => 'tenant.user.update',
        'destroy' => 'tenant.user.destroy',
    ]);
    
    Route::get('send-mail', [MailConfigController::class, 'testMail'])->name('tenant.send-mail');
    Route::resource('/mail-settings', MailConfigController::class)->names([
        'index' => 'tenant.mail-setting.index',
        'create' => 'tenant.mail-setting.create',
        'store' => 'tenant.mail-setting.store',
        'edit' => 'tenant.mail-setting.edit',
        'update' => 'tenant.mail-setting.update',
        'destroy' => 'tenant.mail-setting.destroy',
    ]);

    // Route::post('/tenant/data', [TenantDataController::class, 'store']);
});
