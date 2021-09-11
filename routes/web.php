<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PetCategory;
use App\Http\Controllers\Admin\PetCategoryController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\RoleController as ControllersRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ShopController;
use App\Models\Pet;

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
//SHOP PAGES
Route::get('/', [App\Http\Controllers\ShopController::class, 'index']);
Route::get('/products', [App\Http\Controllers\ShopController::class, 'product']);
Route::get('/about', [App\Http\Controllers\ShopController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\ShopController::class, 'contact']);
Route::get('/product-detail/{id}', [App\Http\Controllers\ShopController::class, 'product_detail']);
Route::get('/cart', [App\Http\Controllers\ShopController::class, 'cart']);
Route::get('/checkout', [App\Http\Controllers\ShopController::class, 'checkout']);
Route::get('products/category/pet/{id}',[ShopController::class,'pet_category']);
Route::get('products/category/pet-product/{id}',[ShopController::class,'product_category']);
//END OF SHOP PAGES//


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('company', CompanyController::class);
Route::resource('role', ControllersRoleController::class);
Route::resource('pet_category', PetCategoryController::class);
Route::resource('pet', PetController::class);
Route::get('pet/image/{id}/edit',[PetController::class,'edit_image']);
Route::post('pet/image/{id}', [PetController::class, 'add_image']);
Route::delete('pet/image/{id}', [PetController::class, 'destroy_image']);
Route::resource('product_category', ProductCategoryController::class);
Route::resource('product', ProductController::class);
Route::get('product/image/{id}/edit',[ProductController::class,'edit_image']);
Route::post('product/image/{id}', [ProductController::class, 'add_image']);
Route::delete('product/image/{id}', [ProductController::class, 'destroy_image']);
