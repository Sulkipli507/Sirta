<?php

use App\Http\Controllers\Admin\ConcentrationController;
use App\Http\Controllers\Admin\ThesisController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route Thesis
Route::get('/thesis/create', [ThesisController::class, 'create'])->name("thesis-create");
Route::post('/thesis/store',[ThesisController::class, 'store'])->name("thesis-store");

// Route User
Route::get('/user/index/all', [UserController::class, 'index'])->name("user-all");
Route::get('/user/index/active', [UserController::class, 'indexActive'])->name("user-active");
Route::get('/user/index/inactive', [UserController::class, 'indexInactive'])->name("user-inactive");
Route::get('/user/index/student',[UserController::class, 'showStudent'])->name("user-student");
Route::get('/user/index/lecturer',[UserController::class, 'showLecturer'])->name("user-lecturer");
Route::put('/user/updateStatus/{id}',[UserController::class, 'updateStatus'])->name("user-updateStatus");
Route::get('/user/create',[UserController::class, 'create'])->name("user-create");
Route::post('/user/store', [UserController::class, 'store'])->name("user-store");
Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name("user-edit");
Route::put('/user/update/{id}',[UserController::class, 'update'])->name("user-update");
Route::delete('/user/delete/{id}',[UserController::class, 'destroy'])->name("user-delete");
Route::put('/user/updatePassword/{id}',[UserController::class, 'updatePassword'])->name("user-updatePassword");

//Route Concentration
Route::get('/concentration/create',[ConcentrationController::class, 'create'])->name("concentration-create");
Route::post('/concentration/store',[ConcentrationController::class, 'store'])->name("concentration-store");
Route::get('/concentration/index',[ConcentrationController::class, 'index'])->name("concentration-index");
Route::get('/concentration/edit/{id}',[ConcentrationController::class, 'edit'])->name('concentration-edit');
Route::put('/concentration/update/{id}',[ConcentrationController::class, 'update'])->name("concentration-update");
Route::delete('/concentration/delete/{id}',[ConcentrationController::class, 'destroy'])->name("concentration-delete");

// Route Auth
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
