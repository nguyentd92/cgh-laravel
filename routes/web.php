<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return redirect('/customers');
});

Route::group(['prefix' => 'customers'],function () {

    // Trang danh sách customer
    Route::get('/', [CustomersController::class, 'getList']);

    // Trang danh sách tim kiem customer
    Route::post('/', [CustomersController::class, 'getList']);

    // Trang Thêm mới customer
    Route::get('/create', [CustomersController::class, 'create']);

    Route::post('/create', [CustomersController::class, 'store']);

    // Trang Chi tiết
    Route::get('/{id}', [CustomersController::class, 'getById']);

    // Trang cập nhật
    Route::get('/{id}/edit', [CustomersController::class, 'edit']);

    Route::put('/{id}/edit', [CustomersController::class, 'update']);

    // Trang xác nhận xóa
    Route::get('/{id}/delete', [CustomersController::class, 'delete']);

    Route::delete('/{id}/delete', [CustomersController::class, 'destroy']);
});


Route::group(['prefix' => 'categories'],function () {

    // Trang danh sách customer
    Route::get('/', [CategoriesController::class, 'getList']);

    // Trang danh sách tim kiem customer
    Route::post('/', [CategoriesController::class, 'getList']);

    // Trang Thêm mới customer
    Route::get('/create', [CategoriesController::class, 'create']);

    Route::post('/create', [CategoriesController::class, 'store']);

    // Trang Chi tiết
    Route::get('/{id}', [CategoriesController::class, 'getById']);

    // Trang cập nhật
    Route::get('/{id}/edit', [CategoriesController::class, 'edit']);

    Route::put('/{id}/edit', [CategoriesController::class, 'update']);

    // Trang xác nhận xóa
    Route::get('/{id}/delete', [CategoriesController::class, 'delete']);

    Route::delete('/{id}/delete', [CategoriesController::class, 'destroy']);
});

Route::group(['prefix' => 'products'],function () {

    // Trang danh sách customer
    Route::get('/', [ProductsController::class, 'getList']);

    // Trang danh sách tim kiem customer
    Route::post('/', [ProductsController::class, 'getList']);

    // Trang Thêm mới customer
    Route::get('/create', [ProductsController::class, 'create']);

    Route::post('/create', [ProductsController::class, 'store']);

    // Trang Chi tiết
    Route::get('/{id}', [ProductsController::class, 'getById']);

    // Trang cập nhật
    Route::get('/{id}/edit', [ProductsController::class, 'edit']);

    Route::put('/{id}/edit', [ProductsController::class, 'update']);

    // Trang xác nhận xóa
    Route::get('/{id}/delete', [ProductsController::class, 'delete']);

    Route::delete('/{id}/delete', [ProductsController::class, 'destroy']);
});
