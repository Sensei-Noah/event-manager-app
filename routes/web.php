<?php

use App\Http\Controllers\EventsController;
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
Route::get('/', [EventsController::class, 'index']);
Route::get('/contacts', function () {
    return view('pages.contacts');
});
Route::get('/events', function () {
    return view('pages.events');
});
Route::get('/about', function () {
    return view('pages.about');
});