<?php

use App\Http\Controllers\UserAccessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RoleAccessController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SiteSettingController;


Route::get('/admin-login',[AdminLoginController::class,'loginView'])->name('admin.login.view');
Route::post('/admin-login',[AdminLoginController::class,'login'])->name('admin.login');

Route::group(['middleware'=>'authCheck'],function (){
    Route::get('/admin-logout',[AdminLoginController::class,'logout'])->name('admin.logout');

    Route::get("/dashboard",[DashboardController::class,'index'])->name('dashboard');

    Route::resources([
        'activity' => ActivityController::class,
        'module' => ModuleController::class,
        'role' => RoleController::class,
        'user' => UserController::class,
    ]);

    Route::get('site-setting',[SiteSettingController::class,'edit'])->name('site.setting.edit');
    Route::put('site-setting', [SiteSettingController::class,'update'])->name('site.setting.update');

    Route::get('role-access',[RoleAccessController::class,'index'])->name('role.access');
    Route::post('roleAclSetup', [RoleAccessController::class,'roleAclSetup']);
    Route::post('roleacl', [RoleAccessController::class,'save']);

    Route::get('user-access', [UserAccessController::class,'index'])->name('user.access');
    Route::post('userAclSetup', [UserAccessController::class,'userAclSetup']);
    Route::post('useracl', [UserAccessController::class,'save']);
});
