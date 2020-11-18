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
    return view('static.index');
});
// Route::get('/uses', function () {
//     return view('static.uses');
// });
Route::get('/sponsor-us', function () {
    return view('static.sponsor-us');
});
Route::get('/event-template', function () {
    return view('static.event-template');
});

/* Business-IT Competitions */
Route::get('/bcase', function () {
    return view('static.bcase');
});
Route::get('/moapps', function () {
    return view('static.moapps');
});

/* Mini E-Sports Competitions */
Route::get('/ml', function () {
    return view('static.ml');
});
Route::get('/pubg', function () {
    return view('static.pubg');
});
Route::get('/valorant', function () {
    return view('static.valorant');
});

/* Webinars */
// Route::get('/webinar-bchain', function () {
//     return view('static.webinar-bchain');
// });
Route::get('/webinar-covid', function () {
    return view('static.webinar-covid');
});
Route::get('/webinar-digital', function () {
    return view('static.webinar-digital');
});
Route::get('/webinar-mobile', function () {
    return view('static.webinar-mobile');
});

Route::get('/contact', function () {
    return view('static.contact');
});

Route::get('/faq', function () {
    return view('static.faq');
});
