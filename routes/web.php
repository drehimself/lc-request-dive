<?php

use App\Http\MyRequest;
use Illuminate\Http\Request;
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

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request, MyRequest $myrequest) {
    dump($request->name);
    dump($myrequest->name);
    // dump($request->all());
    // dump($request->only(['name', 'email']));
    // dump($myrequest->all());
    // dump($myrequest->only(['name', 'email']));
    // dump($request->input('name'));
    // dump($myrequest->input('name'));
    // dump($request->isSecure());
    // dump($request->secure());
    // dump($myrequest->secure());
    // dump($request->getClientIp());
    // dump($request->ip());
    // dump($myrequest->ip());
})->name('register');
