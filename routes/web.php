<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\TaskController;

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

Route::get('articles/{id}', [BasicController::class, 'showArticle']);

Route::get('/showname', function () {
    return view('test-post');
});

Route::post('showname', [BasicController::class, 'showName'])->name('sendname');

Route::get('users', [BasicController::class, 'showUser']);

Route::get('/',  [TaskController::class, 'index']) ->name('home');
