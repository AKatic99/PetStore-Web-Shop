<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dogs', [App\Http\Controllers\HomeController::class, 'showDogs'])->name('dogs');
Route::get('/cats', [App\Http\Controllers\HomeController::class, 'showCats'])->name('cats');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');
   // Route::get('categories', 'Admin\CategoryController@index');
   // Route::get('add-category', 'Admin\CategoryController@add');
   // Route::post('insert-category', 'Admin\CategoryController@insert');


    Route::get('add-category', [CategoryController::class,'add']);
    Route::post('insert-category', [CategoryController::class,'insert']);
    Route::get("categories", [CategoryController::class ,'index']);
    Route::get("edit-category/{id}", [CategoryController::class ,'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

    Route::get('add-subcategory', [SubcategoryController::class,'add']);
    Route::post('insert-subcategory', [SubcategoryController::class,'insert']);
    Route::get("subcategories", [SubcategoryController::class ,'index']);
    Route::get("edit-subcategory/{id}", [SubcategoryController::class ,'edit']);
    Route::put('update-subcategory/{id}', [SubcategoryController::class, 'update']);
    Route::get('delete-subcategory/{id}',[SubcategoryController::class, 'destroy']);


    Route::get('products',[ProductController::class, 'index']);
    Route::get('add-product',[ProductController::class, 'add']);
    Route::post('insert-product',[ProductController::class, 'insert']);
    Route::get('delete-product/{id}',[ProductController::class, 'destroy']);
    Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);





});
