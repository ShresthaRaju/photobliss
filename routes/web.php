<?php

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

// landing page
Route::view('/', 'welcome')->name('welcome');
Route::redirect('home', '/');

// authentication
Route::get('sign-up', 'Auth\SignUpController@showSignUpForm');
Route::post('sign-up', 'Auth\SignUpController@registerUser');
Route::get('sign-in', 'Auth\SignInController@showSignInForm')->name('signIn');
Route::post('sign-in', 'Auth\SignInController@signIn');
Route::post('sign-out', 'Auth\SignInController@signOut')->name('signOut');
