<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SignupController;

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
Route::get('/', [EventsController::class, 'index']);
Route::get('/add-event', [EventsController::class, 'addEvent']);
Route::post('/store', [EventsController::class, 'store']);
Route::get('/events', [EventsController::class, 'show']);
Route::get('/event/{event}', [EventsController::class, 'showEvent']);
Route::get('/event/update/{event}', [EventsController::class, 'edit']);
Route::get('/event/delete/{event}', [EventsController::class, 'destroy']);
Route::post('/update/{event}', [EventsController::class, 'update']);

Route::get('/signups/{event}', [SignupController::class, 'index']);
Route::post('/store-signups', [SignupController::class, 'store']);
Route::get('/all-signups', [SignupController::class, 'show']);


Route::get('/contacts', function () {
    return view('pages.contacts');
});
Route::get('/about', function () {
    return view('pages.about');
});


Auth::routes();

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [HomeController::class, 'index']);