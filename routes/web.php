<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


////////// authentication //////////
Route::get('/login', [AuthController::class, "login"]);
Route::get('/signup', [AuthController::class, "signup"]);
Route::post('/signup', [AuthController::class, "signupPost"]);

Route::post('/logout', [AuthController::class, "logout"]);
Route::post('/login', [AuthController::class, "loginPost"]);


////////// user ////////////////
Route::get('/', [Controller::class, "home"]);
Route::get('/shop', [Controller::class, "shop"]);


Route::middleware("auth:sanctum")->group(function () {
    Route::get('/checkout', [UserController::class, "checkout"]);
    Route::get('/account', [UserController::class, "account"]);
    Route::get('/account/history', [UserController::class, "history"]);
    Route::get('/account/history/{id}', [UserController::class, "historyDetail"]);

    Route::post("/checkout", [PesananController::class, "checkout"]);
    Route::post('/order', [PesananController::class, "order"]);
    Route::get('/delete-order/{pesanan}', [PesananController::class, "deleteOrder"]);
    Route::get('/empty-cart', [PesananController::class, "emptyCart"]);
    Route::get('/delete-item-cart/{id}', [PesananController::class, "deleteItemCart"]);
});

///////////////// admin ////////////////////
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin', [Controller::class, "adminDashboard"]);
    Route::get('/admin/order', [Controller::class, "adminOrder"]);

    Route::get('/admin/category', [CategoryController::class, "lihatCategory"]);
    Route::get('/admin/category/tambah', [CategoryController::class, "viewTambahCategory"]);
    Route::get('/admin/category/edit', [CategoryController::class, "viewEditCategory"]);

    Route::post('/admin/category/tambah', [CategoryController::class, "tambahCategory"]);
    Route::post('/admin/category/delete/{id}', [CategoryController::class, "deleteCategory"]);
    Route::post('/admin/category/edit', [CategoryController::class, "editCategory"]);


    Route::get('/admin/item', [ItemController::class, "lihatItem"]);
    Route::get('/admin/item/tambah', [ItemController::class, "viewTambahItem"]);
    Route::get('/admin/item/edit', [ItemController::class, "viewEditItem"]);

    Route::post('/admin/item/tambah', [ItemController::class, "tambahItem"]);
    Route::post('/admin/item/delete/{id}', [ItemController::class, "deleteItem"]);
    Route::post('/admin/item/edit', [ItemController::class, "editItem"]);

    Route::get('/order-detail/{id}', [PesananController::class, "orderDetail"]);
    Route::get('/set-status/{id}', [PesananController::class, "setStatus"]);


    // Route::get('/admin/test', [Controller::class, "test"]);
    // Route::post('/admin/test', [Controller::class, "testPost"]);
    // Route::get('/admin/test-data', [Controller::class, "testData"]);
});
