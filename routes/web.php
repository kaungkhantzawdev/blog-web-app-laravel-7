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

Route::get('/', "BlogController@welcome")->name('welcome');
Route::get('/detail/{blog}', "BlogController@show")->name('blog.detail');
Route::get('/category/{slug}', "BlogController@baseOnCategory")->name('blog.baseOnCategory');

Auth::routes();

Route::prefix('dashboard')->middleware(["auth","banUser"])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('profile')->group(function(){
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::get('/upload', 'ProfileController@photoUpload')->name('profile.photo-upload');
        Route::post('/upload', 'ProfileController@upload')->name('profile.upload');
        Route::get('/update-info', 'ProfileController@updateInfo')->name('profile.updateInfo');
        Route::post('/update-Phone&Address', 'ProfileController@updatePa')->name('profile.updatePa');
        Route::post('/update-info', 'ProfileController@updateNe')->name('profile.updateNe');
        Route::get('/change-password','ProfileController@changeP')->name('profile.changeP');
        Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
    });

    Route::prefix('user-manager')->middleware('onlyAdmin')->group(function(){
        Route::get('/',"UserManagerController@index")->name('user.manager');
        Route::get('/{id}',"UserManagerController@info")->name('user.info');
        Route::post('/makeAdmin/{id}',"UserManagerController@makeAdmin")->name('user.makeAdmin');
        Route::post('/unMakeAdmin/{id}',"UserManagerController@unmakeAdmin")->name('user.unmakeAdmin');
        Route::post('/banUser/{id}',"UserManagerController@banUser")->name('user.banUser');
        Route::post('/unbanUser/{id}',"UserManagerController@unbanUser")->name('user.unbanUser');
    });

    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');
    Route::post('article/delete-photo','ArticleController@photoDelete')->name('article.photoDelete');
});


