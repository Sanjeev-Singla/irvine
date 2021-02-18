<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('test', function () {
    return view('tenant.index');
});

Route::get('/home',[App\Http\Controllers\UserController::class,'home'])->name('home');

Route::match(['get','post'],'login', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::get('register/{email}',[App\Http\Controllers\UserController::class,'register'])->name('register');
Route::post('register',[App\Http\Controllers\UserController::class,'tenantRegister'])->name('tenant-register');

Route::get('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::match(['get','post'],'owner-register',[App\Http\Controllers\Owner\OwnerController::class,'register'])->name('owner-register');

# Application
Route::match(['get','post'],'tenant/application/{email}',[App\Http\Controllers\Tenant\ApplicationController::class,'tenantApplication'])->name('tenant-application');

Route::group(['middleware'=>'auth'],function(){
    # TENANT
    Route::group(['prefix'=>'tenant','middleware'=>'role:0'],function(){
        Route::get('home', [App\Http\Controllers\Tenant\TenantController::class,'index'])->name('tenant-home');
        # Tenant Profile
        Route::group(['prefix' => 'profile'], function () {
            Route::match(['get','post'],'/',[App\Http\Controllers\Tenant\TenantController::class,'profile'])->name('tenant-profile');
            Route::match(['get','post'],'update',[App\Http\Controllers\Tenant\TenantController::class,'updateProfile'])->name('update-tenant-profile');
        });

        # Maintenance
        Route::post('maintenance-request',[App\Http\Controllers\Tenant\TenantController::class,'maintenanceRequest'])->name('maintenance-request');
    });
    
    # OWNER
    Route::group(['prefix'=>'owner','middleware'=>'role:1'],function(){
        
        # property Unit/Application
        Route::match(['get','post'],'add-unit',[App\Http\Controllers\Owner\UnitController::class,'addUnit'])->name('add-unit');
        Route::get('home', [App\Http\Controllers\Owner\UnitController::class, 'index'])->name('owner-home');
        
        # Property Reference
        Route::post('refer-tenant',[App\Http\Controllers\Owner\OwnerController::class,'referTenant'])->name('refer-tenant');
        
        # All Units
        Route::get('units',[App\Http\Controllers\Owner\UnitController::class,'allUnits'])->name('all-units');
        
        # Owner Profile
        Route::group(['prefix' => 'profile'], function () {
            Route::match(['get','post'],'/',[App\Http\Controllers\Owner\OwnerController::class,'profile'])->name('owner-profile');
            Route::match(['get','post'],'update',[App\Http\Controllers\Owner\OwnerController::class,'updateProfile'])->name('update-owner-profile');
        });
        
        Route::group(['prefix' => 'application'], function () {
            # owner confirm/Decline Application
            Route::get('confirm/{id}',[App\Http\Controllers\Owner\OwnerController::class,'confirmApplication'])->name('tenant-application-confirm');
            Route::get('decline/{id}',[App\Http\Controllers\Owner\OwnerController::class,'declineApplication'])->name('tenant-application-decline');
            
            # edit application
            Route::get('edit/{id}',[App\Http\Controllers\Owner\OwnerController::class,'editApplication'])->name('edit-application');
            Route::post('update/{id}',[App\Http\Controllers\Owner\OwnerController::class,'updateApplication'])->name('update-application');
        });
        
        # Maintenance
        Route::post('update-maintenance',[App\Http\Controllers\Owner\OwnerController::class,'updateMaintenance'])->name('update-maintenance');
        
        # Sortings
        Route::post('sort-maintenance-request',[App\Http\Controllers\Owner\UnitController::class,'sortMaintenanceRequest'])->name('sort-maintenance-request');
        Route::post('sort-units',[App\Http\Controllers\Owner\UnitController::class,'sortUnits'])->name('sort-units');

        # Searching
        Route::post('search-units',[App\Http\Controllers\Owner\UnitController::class,'searchUnits'])->name('search-units');
        Route::post('search-maintenance-request',[App\Http\Controllers\Owner\UnitController::class,'searchMaintenanceRequest'])->name('search-maintenance-request');
    });

});

