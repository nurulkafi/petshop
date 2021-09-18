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
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceTransactionController;
use App\Http\Controllers\ShopController;
use App\Models\Pet;
use App\Models\ServiceTransaction;

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

Route::get('/pets',[ShopController::class,'pet']);
Route::get('pet/detail/{slug}',[ShopController::class,'pet_detail']);
Route::get('pet/category/{slug}',[ShopController::class,'pet_category']);
Route::get('pets/price/{id}', [ShopController::class, 'pet_sort_by_price']);


Route::post('/search', [ShopController::class, 'search']);
Route::get('/search/{name}', [ShopController::class, 'result_search']);
Route::get('/about', [App\Http\Controllers\ShopController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\ShopController::class, 'contact']);
Route::get('/product-detail/{id}', [App\Http\Controllers\ShopController::class, 'product_detail']);
Route::get('/cart', [App\Http\Controllers\ShopController::class, 'cart']);
Route::get('/checkout', [App\Http\Controllers\ShopController::class, 'checkout']);
Route::get('products/category/pet-product/{id}',[ShopController::class,'product_category']);
//END OF SHOP PAGES//


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('company', CompanyController::class);
Route::resource('role', RoleController::class);
Route::resource('pet_category', PetCategoryController::class);
Route::resource('pet', PetController::class);
Route::resource('service', ServiceController::class);
Route::resource('service_transaction', ServiceTransactionController::class);
Route::get('service_transaction/{id}/process', [ServiceTransactionController::class, 'process']);
Route::get('service_transaction/{id}/finish', [ServiceTransactionController::class, 'finish']);
Route::get('service_transaction/{id}/payment', [ServiceTransactionController::class, 'payment']);
Route::get('service_transaction/{id}/print', [ServiceTransactionController::class, 'print']);
Route::get('pet/image/{id}/edit',[PetController::class,'edit_image']);
Route::post('pet/image/{id}', [PetController::class, 'add_image']);
Route::delete('pet/image/{id}', [PetController::class, 'destroy_image']);
Route::resource('product_category', ProductCategoryController::class);
Route::resource('product', ProductController::class);
Route::get('product/image/{id}/edit',[ProductController::class,'edit_image']);
Route::post('product/image/{id}', [ProductController::class, 'add_image']);
Route::delete('product/image/{id}', [ProductController::class, 'destroy_image']);
