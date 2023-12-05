<?php

use App\Http\Controllers\Admin\ConcentrationController;
use App\Http\Controllers\Admin\ThesisController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Landingpage\PageController;
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

// Route::get('/', function () {
//     return view('page.index');
// });

//Route Page
Route::get('/',[PageController::class, 'index'])->name('page-index');
Route::get('/about',[PageController::class, 'showAbout'])->name('page-about');
Route::get('/thesis',[PageController::class, 'showThesis'])->name('page-thesis');
Route::get('/thesis/show/{id}',[PageController::class, 'show'])->name('page-show');

// Route Auth
Auth::routes();

Route::middleware(['auth', 'CheckRole:Admin'])->group(function(){
    // Route User
    Route::get('/user/index/all', [UserController::class, 'index'])->name("user-all");
    Route::get('/user/index/active', [UserController::class, 'indexActive'])->name("user-active");
    Route::get('/user/index/inactive', [UserController::class, 'indexInactive'])->name("user-inactive");
    Route::get('/user/index/student',[UserController::class, 'showStudent'])->name("user-student");
    Route::get('/user/index/lecturer',[UserController::class, 'showLecturer'])->name("user-lecturer");
    Route::put('/user/updateStatus/{id}',[UserController::class, 'updateStatus'])->name("user-updateStatus");
    Route::get('/user/create',[UserController::class, 'create'])->name("user-create");
    Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name("user-edit");
    Route::delete('/user/delete/{id}',[UserController::class, 'destroy'])->name("user-delete");
    Route::post('/user/store', [UserController::class, 'store'])->name("user-store");
    Route::put('/user/update/{id}',[UserController::class, 'update'])->name("user-update");
    
    //Route Concentration
    Route::get('/concentration/create',[ConcentrationController::class, 'create'])->name("concentration-create");
    Route::post('/concentration/store',[ConcentrationController::class, 'store'])->name("concentration-store");
    Route::get('/concentration/index',[ConcentrationController::class, 'index'])->name("concentration-index");
    Route::get('/concentration/edit/{id}',[ConcentrationController::class, 'edit'])->name('concentration-edit');
    Route::put('/concentration/update/{id}',[ConcentrationController::class, 'update'])->name("concentration-update");
    Route::delete('/concentration/delete/{id}',[ConcentrationController::class, 'destroy'])->name("concentration-delete");
    
    //Route Thesis
    Route::get('/thesis/index',[ThesisController::class, 'index'])->name("thesis-index");
    Route::get('/thesis/edit/{id}',[ThesisController::class, 'edit'])->name("thesis-edit");
    Route::delete('/thesis/delete/{id}',[ThesisController::class, 'destroy'])->name("thesis-delete");
});

Route::middleware(['auth', 'CheckRole:Dosen'])->group(function(){
    Route::get('/thesis/index/mentor',[ThesisController::class, 'mentor'])->name("thesis-mentor");
    Route::get('/thesis/index/examiner',[ThesisController::class, 'examiner'])->name("thesis-examiner");
});

Route::middleware(['auth', 'CheckRole:Admin,Mahasiswa'])->group(function(){
    Route::get('/thesis/create', [ThesisController::class, 'create'])->name("thesis-create");
    Route::post('/thesis/store',[ThesisController::class, 'store'])->name("thesis-store");
    Route::put('/thesis/update/{id}',[ThesisController::class, 'update'])->name("thesis-update");
});

Route::middleware(['auth', 'CheckRole:Mahasiswa'])->group(function(){
    Route::get('/thesis/index/user', [ThesisController::class, 'indexUser'])->name("thesis-indexUser");
    Route::get('/thesis/edit/user/{id}', [ThesisController::class, 'editUser'])->name("thesis-editUser");
    Route::delete('/thesis/delete/user/{id}', [ThesisController::class, 'destroyUser'])->name("thesis-deleteUser");
});

Route::middleware(['auth', 'CheckRole:Admin,Dosen,Mahasiswa'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/thesis/show/file/{id}', [PageController::class, 'showThesisFile'])->name("show-thesisFile");
    Route::get('/user/profile', [UserController::class, 'editProfile'])->name('user-profile');
    Route::put('/user/updateProfile/{id}', [UserController::class, 'updateProfile'])->name('user-updateProfile');
    Route::put('/user/updatePassword/{id}',[UserController::class, 'updatePassword'])->name("user-updatePassword");
});
