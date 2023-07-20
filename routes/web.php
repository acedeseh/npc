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

Route::post('/', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', function(){
    return view('home');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'adminHome');
    Route::get('/admin/add-user', 'addUser')->name('add.user');
    Route::get('/search/user','showAdminUsers')->name('search.user');
    Route::post('/admin/add-user', 'storeUser')->name('store.user');
    Route::get('/admin/reset', 'resetAdminUsers')->name('reset.user');
    Route::delete('/admin/{id}', 'deleteUser')->name('delete.user');
    Route::get('/admin/edit/{id}', 'editUser')->name('edit.user');
    Route::post('/admin/{id}/update', 'updateUser')->name('update.user');
})->middleware('userAccess:admin');

Route::controller(HeadController::class)->group(function() {
    Route::get('/head', 'headHome');
})->middleware('userAccess:head');

Route::controller(UserController::class)->group(function() {
    Route::get('/user', 'userHome');
    Route::get('/user/routine', 'routine')->name('user.routine');
    Route::get('/edit/routine/{name}','editRoutine' )->name('edit.routine');
    Route::get('/user/add', 'addRoutine')->name('add.routine');
    Route::post('/user/add-routine', 'storeRoutine')->name('store.routine');
    Route::post('/user/{name}/update', 'updateRoutine')->name('update.routine');
    Route::get('/user/routine', 'showRoutine')->name('show.routine');
    Route::delete('/user/routine/delete/{id}','deleteRoutine')->name('delete.routine');


    Route::get('/user/project', 'project')->name('user.project');
    
    Route::get('/user/incidental',  'incidental')->name('user.incidental');

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
