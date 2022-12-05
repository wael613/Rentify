<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home.dashboard');


// Route::middleware(['auth','guest'])->group(function()
// {
//     Route::get("/register",[RegisterController::class, 'show'])->name("register.show");
// });

// Route::middleware(['auth'])->group(function()
// {
//     Route::get("/register",[RegisterController::class, 'show'])->name("register.show");
// });

Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    Route::get('/register', [RegisterController::class,'show'])->name('register.show');
    Route::post('/register', [RegisterController::class,'register'])->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', [LoginController::class,'show'])->name('login.show');
    Route::post('/login', [LoginController::class,'login'])->name('login.perform');

});


Route::group(['middleware' => ['auth','permission']], function() {
     /**
    * Logout Routes
    */
    Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UsersController::class,'index'])->name('users.index');
        Route::get('/create', [UsersController::class,'create'])->name('users.create');
        Route::post('/create', [UsersController::class,'store'])->name('users.store');
        Route::get('/{user}/show', [UsersController::class,'show'])->name('users.show');
        Route::get('/{user}/edit', [UsersController::class,'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UsersController::class,'update'])->name('users.update');
        Route::delete('/{user}/delete', [UsersController::class,'destroy'])->name('users.destroy');
    });

     /**
    * User Routes
    */
    Route::group(['prefix' => 'properties'], function() {
        Route::get('/', [PropertyController::class,'index'])->name('properties.index');
        Route::get('/create', [PropertyController::class,'create'])->name('properties.create');
        Route::post('/create', [PropertyController::class,'store'])->name('properties.store');
        Route::get('/{property}/show', [PropertyController::class,'show'])->name('properties.show');
        Route::get('/{property}/edit', [PropertyController::class,'edit'])->name('properties.edit');
        Route::patch('/{property}/update', [PropertyController::class,'update'])->name('properties.update');
        Route::delete('/{property}/delete', [PropertyController::class,'destroy'])->name('properties.destroy');
    });

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);


});
