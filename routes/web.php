<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\QuestionController;


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
    return view('welcome');
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function(){
    Auth::routes();
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin' , 'middleware'=>['isAdmin' , 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', [AdminController::class , 'index'])->name('admin.dashboard');
    Route::get('settings', [AdminController::class , 'settings'])->name('admin.settings');
    Route::get('showquestion', [QuestionController::class , 'showquestion'])->name('admin.showquestion');


    
});


Route::group(['prefix' => 'user' , 'middleware'=>['isUser' , 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', [UserController::class , 'index'])->name('user.dashboard');
    Route::get('settings', [UserController::class , 'settings'])->name('user.settings');
});