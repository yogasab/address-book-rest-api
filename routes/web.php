<?php

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

Route::get('/', function () {
  return view('welcome');
});

Route::get('contact', 'API\Contact\ContactController@query');
Route::resource('contacts', 'API\Contact\ContactController');
Route::resource('labels', 'API\Label\LabelController');
Route::resource('contact-label', 'API\ContactModel\ContactLabelController')->except(['store']);
Route::post('/contact-label/{contact}/{label}', 'API\ContactModel\ContactLabelController@storeContactLabel')->name('contact-label');
