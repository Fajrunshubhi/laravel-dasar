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

Route::get("/fajrun", function () {
    return "<h1>Hallooo Fajrun Shubhi</h1>";
});

Route::redirect('/youtube', '/fajrun');

Route::fallback(function () {
    return "<h1>404 by Fajrun Shubhi </h1>";
});

Route::get('/hello', function () {
    return view('hello', ['name' => "Fajrunssssssss"]);
});

Route::get('/hello-world', function () {
    return view('hello.world', ['name' => 'Fajrun Shubhi']);
});
