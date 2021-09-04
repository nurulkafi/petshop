<?php

use App\Http\Controllers\Admin\PetCategory;
use App\Http\Controllers\Admin\PetCategoryController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\RoleController as ControllersRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
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

Route::get('/', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('role', ControllersRoleController::class);
Route::resource('pet_category', PetCategoryController::class);
Route::resource('pet', PetController::class);

