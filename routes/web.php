<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', function(){
    return view('auth.login');
});

Route::get('/home', function(){
    return view('home');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'adminHome');
    Route::get('/admin/add-user', 'addUser')->name('add.user');
    Route::post('/admin/add-user', 'storeUser')->name('store.user');
})->middleware('userAccess:admin');

Route::controller(HeadController::class)->group(function() {
    Route::get('/head', 'headHome');
})->middleware('userAccess:head');

Route::controller(UserController::class)->group(function() {
    Route::get('/user', 'userHome');
})->middleware('userAccess:user');

  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:1'])->group(function () {
  
//     Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
// });
  
// // /*------------------------------------------
// // --------------------------------------------
// // All Admin Routes List
// // --------------------------------------------
// // --------------------------------------------*/
// Route::middleware(['auth', 'user-access:2'])->group(function () {
  
//     Route::get('/head', [HomeController::class, 'headHome'])->name('head.home');
// });
