<?php

use App\Http\Controllers\Admin\Admin_panal_settingsController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TreasuiersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('PAGINATION_COUNT',10);

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
    Route::get('/adminpanalsetting/index',[Admin_panal_settingsController::class,'index'])->name('admin.adminpanalsetting.index');
    Route::get('/adminpanalsetting/edit',[Admin_panal_settingsController::class,'edit'])->name('admin.adminpanalsetting.edit');
    Route::post('/adminpanalsetting/update',[Admin_panal_settingsController::class,'update'])->name('admin.adminpanalsetting.update');

/*                 Start Treasuiers                */

Route::get('/treasuiers/index',[TreasuiersController::class,'index'])->name('admin.treasuiers.index');
Route::get('/treasuiers/create',[TreasuiersController::class,'create'])->name('admin.treasuiers.create');
Route::post('/treasuiers/store',[TreasuiersController::class,'store'])->name('admin.treasuiers.store');
Route::get('/treasuiers/edit/{id}',[TreasuiersController::class,'edit'])->name('admin.treasuiers.edit');
Route::post('/treasuiers/update/{id}',[TreasuiersController::class,'update'])->name('admin.treasuiers.update');
Route::post('/treasuiers/ajax_search}',[TreasuiersController::class,'ajax_search'])->name('admin.treasuiers.ajax_search');

/*                 End Treasuiers                  */

/*                 start cars                  */
Route::get('/cars/index',[CarsController::class,'index'])->name('admin.cars.index');
Route::get('/cars/create',[CarsController::class,'create'])->name('admin.cars.create');


/*                 End cars                  */


    });

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'], function () {
    Route::get('login',[LoginController::class,'show_login_view'])->name('admin.showlogin');
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
    });
