<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminCategoryController;
use App\Http\Controllers\adminAuthorController;
use App\Http\Controllers\adminRackController;
use App\Http\Controllers\adminBookController;

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

// ---Direct Routes---
Route::get('/', function () {
    return view('index');
});

Route::get('/admin_login', function () {
    return view('admin_login');
});

Route::get('/user_login', function () {
    return view('user_login');
});

Route::get('/user_registration', function () {
    return view('user_registration');
});

// ---Admin Login Method---
Route::post('admin_login_function', [loginController::class, 'admin_login_function']);
// ---User Login Method---
Route::post('user_login_function', [loginController::class, 'user_login_function']);

// ---==Admin Controllers Methods==---
Route::get('log_out_function', [loginController::class, 'log_out_function']);

Route::group(
    ['middleware' => ['adminCheck']],
    function () {

        Route::get('admin/', [loginController::class, 'admin_index']);

        // ---Category Routes---
        Route::get('admin/category', [adminCategoryController::class, 'category']);
        Route::get('admin/category/add', [adminCategoryController::class, 'category_add']);
        Route::get('admin/category/edit/{id}', [adminCategoryController::class, 'category_edit']);
        Route::get('admin/category/edit/{id}/{status}', [adminCategoryController::class, 'category_edit_status']);
        Route::get('admin/category/delete/{id}', [adminCategoryController::class, 'category_delete']);
        Route::post('admin/category/category_insert', [adminCategoryController::class, 'category_insert']);
        Route::post('admin/category/edit/category_update', [adminCategoryController::class, 'category_update']);

        // ---Author Routes---
        Route::get('admin/author', [adminAuthorController::class, 'author']);
        Route::get('admin/author/add', [adminAuthorController::class, 'author_add']);
        Route::get('admin/author/edit/{id}', [adminAuthorController::class, 'author_edit']);
        Route::get('admin/author/edit/{id}/{status}', [adminAuthorController::class, 'author_edit_status']);
        Route::get('admin/author/delete/{id}', [adminAuthorController::class, 'author_delete']);
        Route::post('admin/author/author_insert', [adminAuthorController::class, 'author_insert']);
        Route::post('admin/author/edit/author_update', [adminAuthorController::class, 'author_update']);

        // ---Rack Routes---
        Route::get('admin/rack', [adminRackController::class, 'rack']);
        Route::get('admin/rack/add', [adminRackController::class, 'rack_add']);
        Route::get('admin/rack/edit/{id}', [adminRackController::class, 'rack_edit']);
        Route::get('admin/rack/edit/{id}/{status}', [adminRackController::class, 'rack_edit_status']);
        Route::get('admin/rack/delete/{id}', [adminRackController::class, 'rack_delete']);
        Route::post('admin/rack/rack_insert', [adminRackController::class, 'rack_insert']);
        Route::post('admin/rack/edit/rack_update', [adminRackController::class, 'rack_update']);

        // ---Book Routes---
        Route::get('admin/book', [adminBookController::class, 'book']);
        Route::get('admin/book/add', [adminBookController::class, 'book_add']);
        Route::get('admin/book/edit/{id}', [adminBookController::class, 'book_edit']);
        Route::get('admin/book/edit/{id}/{status}', [adminBookController::class, 'book_edit_status']);
        Route::get('admin/book/delete/{id}', [adminBookController::class, 'book_delete']);
        Route::post('admin/book/book_insert', [adminBookController::class, 'book_insert']);
        Route::post('admin/book/edit/book_update', [adminBookController::class, 'book_update']);

    }
);
