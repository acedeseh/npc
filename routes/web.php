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
    Route::get('head/karyawan/detail/{NRP}','showKegiatanByNRP')->name('detail.kegiatan');
})->middleware('userAccess:head');

Route::controller(UserController::class)->group(function() {
    Route::get('/user', 'userHome');

    Route::get('/user/routine', 'routine')->name('user.routine');
    Route::get('/edit/routine/{name}','editRoutine' )->name('edit.routine');
    Route::get('/user/add-r', 'addRoutine')->name('add.routine');
    Route::post('/user/add-routine', 'storeRoutine')->name('store.routine');
    Route::post('/user/{name}/update', 'updateRoutine')->name('update.routine');
    Route::get('/user/routine', 'showRoutine')->name('show.routine');
    Route::delete('/user/routine/delete/{id}','deleteRoutine')->name('delete.routine');


    Route::get('/user/project', 'project')->name('user.project');
    Route::get('/edit/project/{name}','editProject' )->name('edit.project');
    Route::get('/user/add-p', 'addProject')->name('add.project');
    Route::post('/user/add-project', 'storeProject')->name('store.project');
    Route::post('/user/{name}/update', 'updateProject')->name('update.project');
    Route::get('/user/project', 'showProject')->name('show.project');
    Route::delete('/user/project/delete/{id}','deleteProject')->name('delete.project');

    Route::get('/user/incidental', 'incidental')->name('user.incidental');
    Route::get('/edit/incidental/{name}','editIncidental' )->name('edit.incidental');
    Route::get('/user/add-i', 'addIncidental')->name('add.incidental');
    Route::post('/user/add-incidental', 'storeIncidental')->name('store.incidental');
    Route::post('/user/{name}/update', 'updateIncidental')->name('update.incidental');
    Route::get('/user/incidental', 'showIncidental')->name('show.incidental');
    Route::delete('/user/incidental/delete/{id}','deleteIncidental')->name('delete.incidental');
    

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
