<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Middleware\ContohMiddleware;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/products/{id}', function ($productId) {
    return "Product $productId";
})->name('product.detail');

Route::get('/products/{id}/item/{item}', function ($productId, $item) {
    return "Product $productId dengan item $item";
})->name('product.item.detail');

Route::get('/categories/{id}', function ($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+')->name('category.detail');


Route::get('/users/{id?}', function ($userId = '404') {
    return "User $userId";
})->name('user.detail');

Route::get('/controller/hello', [HelloController::class, 'hello']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);

Route::post('/input/hello/first', [InputController::class, 'helloFirstName']);

Route::post('/input/hello/input', [InputController::class, 'helloInput']);

Route::post('/input/type', [InputController::class, 'inputType']);

Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);

Route::post('/file/upload', [FileController::class, 'upload'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/response/hello', [ResponseController::class, 'response']);
Route::get('/response/header', [ResponseController::class, 'header']);

Route::prefix('/response/type')->group(function () {
    Route::get('/view', [ResponseController::class, 'responseView']);
    Route::get('/json', [ResponseController::class, 'responseJson']);
    Route::get('/file', [ResponseController::class, 'responseFile']);
    Route::get('/download', [ResponseController::class, 'responseDownload']);
});

// Normal route
// Route::get('/cookie/set', [CookieController::class, 'createCookie']);
// Route::get('/cookie/get', [CookieController::class, 'getCookie']);
// Route::get('/cookie/clear', [CookieController::class, 'clearCookie']);
// Route Controller
Route::controller(CookieController::class)->group(function () {
    Route::get('/cookie/set', 'createCookie');
    Route::get('/cookie/get', 'getCookie');
    Route::get('/cookie/clear', 'clearCookie');
});

Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to', [RedirectController::class, 'redirectTo']);

Route::get('/redirect/name', [RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [RedirectController::class, 'redirectHello'])
    ->name('redirect-hello');

Route::get('/redirect/action', [RedirectController::class, 'redirectAction']);

Route::get('/redirect/away', [RedirectController::class, 'redirectAway']);



Route::middleware(['contoh:JRUN,401'])->prefix('/middleware')->group(function () {
    Route::get('/api', function () {
        return 'OK MIDDLEWARE API';
    });
    Route::get('/group', function () {
        return 'OK MIDDLEWARE API GROUP';
    });
});

Route::get('/form', [FormController::class, 'form']);
Route::post('/form', [FormController::class, 'submitForm']);
