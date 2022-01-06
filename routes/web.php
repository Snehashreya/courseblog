<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\FontendController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\frontend\FrontController;
use App\Models\ProductModel;

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


Route::get('/',[FrontController::class,'index']);

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('view-course/{slug}', [FrontController::class,'viewcourse']);

Route::get('view-course/{cate_slug}/{prod_slug}', [FrontController::class,'viewpost']);


Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard',[FontendController::class,'index']);

    /* registered users */
    Route::get('regusers',[UserController::class,'index']);
    Route::get('adduser',[UserController::class,'adduser']);
    Route::post('saveuser',[UserController::class,'saveuser']);
    Route::get('edituser/{id}',[UserController::class,'edituser']);
    Route::put('updateuser/{id}',[UserController::class,'updateuser']);
    Route::get('deluser/{id}',[UserController::class,'deleteuser']);

    /* Block User */
    Route::get('blockuser/{id}',[UserController::class,'blockuser']);

    /* categories */
    Route::get('categories','admin\CategoryController@index');
    Route::get('addcate','admin\CategoryController@addcate');
    Route::post('savecate','admin\CategoryController@savecate');
    Route::get('editcate/{id}',[CategoryController::class,'editcate']);
    Route::put('updatecate/{id}',[CategoryController::class,'updatecate']);
    Route::get('deletecate/{id}',[CategoryController::class,'deletecate']);

    /* product */
    Route::get('products',[ProductController::class,'index']);
    Route::get('addprod',[ProductController::class,'addprod']);
    Route::post('saveprod',[ProductController::class,'saveprod']);
    Route::get('editprod/{id}',[ProductController::class,'editprod']);
    Route::put('updateprod/{id}',[ProductController::class,'updateprod']);
    Route::get('deleteprod/{id}',[ProductController::class,'deleteprod']);


});
