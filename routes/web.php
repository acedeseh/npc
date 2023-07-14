<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:3'])->group(function () {
  
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:1'])->group(function () {
  
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
Route::middleware(['auth', 'user-access:2'])->group(function () {
  
    Route::get('/head', [HomeController::class, 'headHome'])->name('head.home');
});
