<?php
use Illuminate\Http\Request;

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

Route::get('/', function (Request $req) {
    /* when no cookie is set then redirect to cookies page */
    if($req->cookie('anim') === null 
        && $req->cookie('user_data') === null
        && !session('no_cookies')){

        return redirect('cookies');
    }

    return view('index');
});

Route::get('cookies', 'CookieController@index');
Route::get('cookies/accept', 'CookieController@accept');
Route::get('cookies/edit', 'CookieController@edit');
Route::post('cookies/edit', 'CookieController@edit');
Route::get('cookies/cancel', 'CookieController@cancel');

Route::resource('contact', 'ContactController');
Route::resource('review', 'ReviewController');

Route::prefix('api')->group(function(){
    Route::resource('menu', 'MenuController');
    Route::resource('reviews', 'ReviewController');
});