<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\categoriController;


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
    
    Route::get('showcategori', [categoriController::class , 'showcategori'])->name('admin.showcategori');
    Route::get('addcategori', [categoriController::class , 'addcategori'])->name('admin.addcategori');

    
    Route::post('savecategory', [categoriController::class , 'savecategory'])->name('admin.savecategory');
    Route::get('editcategori/{cat_id}', [categoriController::class , 'editcategori'])->name('admin.editcategori');
    
    Route::post('storeeditcategori', [categoriController::class , 'storeeditcategori'])->name('admin.storeeditcategori');

    Route::get('deletecategori/{cat_id}', [categoriController::class , 'deletecategori'])->name('admin.deletecategori');


    
    Route::get('showquestion', [QuestionController::class , 'showquestion'])->name('admin.showquestion');
    Route::get('savequestion', [QuestionController::class , 'savequestion'])->name('admin.savequestion');
    Route::post('storequestions', [QuestionController::class , 'storequestions'])->name('admin.storequestions');
    Route::get('editquestion/{question_id}', [QuestionController::class , 'editquestion'])->name('admin.editquestion');

    Route::post('storeeditquestion', [QuestionController::class , 'storeeditquestion'])->name('admin.storeeditquestion');

    
    Route::get('deletequestion/{question_id}', [QuestionController::class , 'deletequestion'])->name('admin.deletequestion');

    Route::get('changepassword', [AdminController::class , 'changepassword'])->name('admin.changepassword');
    Route::post('changepasscompleted', [AdminController::class , 'changepasscompleted'])->name('admin.changepasscompleted');

    
    
});


Route::group(['prefix' => 'user' , 'middleware'=>['isUser' , 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', [UserController::class , 'index'])->name('user.dashboard');
    Route::get('settings', [UserController::class , 'settings'])->name('user.settings');
    Route::get('exammode', [UserController::class , 'exammode'])->name('user.exammode');
    Route::get('startexam', [UserController::class , 'startexam'])->name('user.startexam');

    
});