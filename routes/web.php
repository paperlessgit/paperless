<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\RegController;


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
})->name('welcome');


Route::get('/login', function () {
    return view('index');
})->name('login');

// Route::get('/log', function () {
//     return view('index');
// })->name('log');




Route::get('/register', function () {
    return view('register');
})->name('register');



//facebook//

Route::prefix('facebook')->name('facebook')->group(function(){

    Route::get('auth',[FacebookController::class,'loginUsingFacebook'])->name('login');
    Route::get('callback',[FacebookController::class,'callbackFromFacebook'])->name('callback');

});


 Route::post('/new-register',[RegController::class,'store'])->name('register.data');
 Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
 Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);
