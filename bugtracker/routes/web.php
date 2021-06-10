<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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


Route::get('/',function(){

    return view('bugtracker');
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('/roles',App\Http\Controllers\RolesController::class,['index']);
    Route::resource('/users',App\Http\Controllers\UserController::class,['index']);
    Route::resource('/tickets',App\Http\Controllers\TicketsController::class,['index']);
    Route::resource('/projects',App\Http\Controllers\ProjectsController::class,['index']);
    Route::resource('/members',App\Http\Controllers\MembersController::class,['index']);
    Route::resource('/profiles',App\Http\Controllers\ProfilesController::class,['index']);
    Route::get('addMember/{id}', 'App\Http\Controllers\MembersController@addMember')->name('addMember');
    Route::get('viewMember/{id}', 'App\Http\Controllers\MembersController@viewMember')->name('viewMember');
    Route::get('removeMember/{projectid}/{modelid}', 'App\Http\Controllers\MembersController@removeMember')->name('removeMember');
    Route::get('createProfile/{id}', 'App\Http\Controllers\ProfilesController@createProfile')->name('createProfile');
    Route::get('viewProfile/{id}', 'App\Http\Controllers\MembersController@viewProfile')->name('viewProfile');
});