<?php

use App\Http\Controllers\Admin\Admin_panal_settingsController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TreasuiersController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\Sale_billsController;
use App\Http\Controllers\Admin\Purchases_billsController;
use App\Http\Controllers\Admin\InstallmentsController;
use App\Http\Controllers\Admin\ReportsController;

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

/*                 start customers                  */
Route::get('/customers/index',[CustomersController::class,'index'])->name('admin.customers.index');
Route::get('/customers/create',[CustomersController::class,'create'])->name('admin.customers.create');
Route::post('/customers/store',[CustomersController::class,'store'])->name('admin.customers.store');
Route::get('/customers/edit/{id}',[CustomersController::class,'edit'])->name('admin.customers.edit');
Route::post('/customers/update/{id}',[CustomersController::class,'update'])->name('admin.customers.update');
Route::get('/customers/delete/{id}',[CustomersController::class,'delete'])->name('admin.customers.delete');
Route::post('/customers/ajax_search}',[CustomersController::class,'ajax_search'])->name('admin.customers.ajax_search');




/*                 End customers                  */

/*                 start suppliers                  */
Route::get('/suppliers/index',[SuppliersController::class,'index'])->name('admin.suppliers.index');
Route::get('/suppliers/create',[SuppliersController::class,'create'])->name('admin.suppliers.create');
/*                 End suppliers                  */

/*                 start employees                  */
Route::get('/employees/index',[EmployeesController::class,'index'])->name('admin.employees.index');
Route::get('/employees/create',[EmployeesController::class,'create'])->name('admin.employees.create');
/*                 End employees                  */

/*                 start sale_bills                  */
Route::get('/sale_bills/index',[Sale_billsController::class,'index'])->name('admin.sale_bills.index');
Route::get('/sale_bills/create',[Sale_billsController::class,'create'])->name('admin.sale_bills.create');
/*                 End sale_bills                  */

/*                 start purchase_bills                  */
Route::get('/purchase_bills/index',[Purchase_billsController::class,'index'])->name('admin.purchase_bills.index');
Route::get('/purchase_bills/create',[Purchase_billsController::class,'create'])->name('admin.purchase_bills.create');
/*                 End purchase_bills                  */

/*                 start installments                  */
Route::get('/installments/index',[InstallmentsController::class,'index'])->name('admin.installments.index');
Route::get('/installments/create',[InstallmentsController::class,'create'])->name('admin.installments.create');
/*                 End installments                     */

/*                 start reports                  */
Route::get('/reports/index',[ReportsController::class,'index'])->name('admin.reports.index');
Route::get('/reports/create',[ReportsController::class,'create'])->name('admin.reports.create');
/*                 End reports                    */

/*                 start permission                  */
Route::get('/permission/index')->name('admin.permission.index');
Route::get('/permission/create')->name('admin.permission.create');
/*                 End permission                    */

/*                 start users                  */
Route::get('/users/index')->name('admin.users.index');
Route::get('/users/create')->name('admin.users.create');
/*                 End users                    */
    });

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'], function () {
    Route::get('login',[LoginController::class,'show_login_view'])->name('admin.showlogin');
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
    });
