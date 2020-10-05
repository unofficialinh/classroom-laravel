<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', 'LoginController@show')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');

// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::get('/members', 'MembersController@show')->name('members');
    Route::get('/members/addNewStudent',function (){
        return view('members.addNewStudent');
    });
    Route::post('/members/addNewStudent','MembersController@addNewStudent')->name('addNewStudent');
    Route::get('/members/{id}',function ($id){
        return view('members.profile',['id'=>$id]);
    })->name('members/profile');
    Route::get('/profile', function (){
        return view('members.profile',['id'=>Auth::user()->id]);
    })->name('profile');

    Route::get('/profile/editProfile',function (){
        return view('members.editProfile',['message'=>'']);
    });
    Route::post('/profile/editProfile','MembersController@editProfile')
        ->name('profile/editProfile');

    Route::get('/members/editStudentProfile/{id}',function ($id){
        return view('members.editStudentProfile',['id'=>$id]);
    })->name('members/editStudentProfile');
    Route::post('/members/editStudentProfile/{id}','MembersController@editStudentProfile')
        ->name('members/editStudentProfile');


    Route::get('/logout', 'LoginController@logout')->name('logout');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

//->middleware('auth');
