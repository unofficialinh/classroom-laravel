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

//Log in
Route::get('/login', 'LoginController@show')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');

// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
    //Home page
    Route::get('/', function () {
        return view('index');
    })->name('index');

    //Member list
    Route::get('/members', 'MembersController@show')->name('members');

    //Add new student
    Route::get('/members/addNewStudent',function (){
        return view('members.addNewStudent');
    });
    Route::post('/members/addNewStudent','MembersController@addNewStudent')->name('addNewStudent');

    //Other member's profile
    Route::get('/members/{id}',function ($id){
        return view('members.profile',['id'=>$id]);
    })->name('members/profile');

    //My profile
    Route::get('/profile', function (){
        return view('members.profile',['id'=>Auth::user()->id]);
    })->name('profile');

    //Edit my profile
    Route::get('/profile/editProfile',function (){
        return view('members.editProfile',['message'=>'']);
    });
    Route::post('/profile/editProfile','MembersController@editProfile')
        ->name('profile/editProfile');

    //Edit student's profile
    Route::get('/members/editStudentProfile/{id}',function ($id){
        return view('members.editStudentProfile',['id'=>$id]);
    })->name('members/editStudentProfile');
    Route::post('/members/editStudentProfile/{id}','MembersController@editStudentProfile')
        ->name('members/editStudentProfile');

    //Delete student's profile
    Route::get('/members/deleteStudent/{id}', function ($id){
        return view('members.deleteStudent',['id'=>$id]);
    })->name('members/deleteStudent');
    Route::post('/members/deleteStudent/{id}','MembersController@deleteStudent')
    ->name('members/deleteStudent');

    //Display messages
    Route::get('/members/messages/{id}', 'MessagesController@show')
        ->name('members/messages');

    //New message
    Route::post('/members/newMassage/{id}', 'MessagesController@new')
        ->name('members/newMassage');

    //Edit message
    Route::get('/members/editMessage/{id}', function ($id){
        return view('messages.editMessage',['id'=>$id]);
    })->name('members/editMessage');
    Route::post('/members/editMessage/{id}', 'MessagesController@edit')
        ->name('members/editMessage');

    //Confirm and delete message
    Route::get('/members/deleteMessage/{id}', function ($id){
        return view('messages.deleteMessage',['id'=>$id]);
    })->name('members/deleteMessage');
    Route::post('/members/deleteMessage/{id}', 'MessagesController@delete')
        ->name('members/deleteMessage');

    //

    //Log out
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

//->middleware('auth');
