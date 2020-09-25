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
    return view('home');
});
Route::get('/uses', function () {
    return view('uses');
});
Route::get('/sponsor-us', function () {
    return view('sponsor-us');
});
Route::get('/event-template', function () {
    return view('event-template');
});
Route::get('/bcase', function () {
    return view('bcase');
});
Route::get('/moapps', function () {
    return view('moapps');
});
Route::get('/webinar-covid', function () {
    return view('webinar-covid');
});
Route::get('/webinar-digital', function () {
    return view('webinar-digital');
});
Route::get('/webinar-mobile', function () {
    return view('webinar-mobile');
});


Route::get('/login', function () {
    return view('login');
});
