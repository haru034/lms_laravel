<!-- ルーティング -->
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
Route::get('/', 'app\Http\Controllers\UsersController@login_form'); // php artisan serve起動時に表示

//新規登録画面の表示
Route::get('/signup_form', 'app\Http\Controllers\UsersController@signup_form')->name('signup_form');
Route::post('/signup', 'app\Http\Controllers\UsersControllerr@signup')->name('signup'); // 新規登録の処理

//ログイン画面へ遷移
Route::get('/login_form', 'app\Http\Controllers\UsersController@login_form')->name('login_form');
Route::post('/login', 'app\Http\Controllers\UsersController@login')->name('login'); // ログイン認証

//ホーム画面へ遷移
Route::get('/home_screen', 'app\Http\Controllers\ChatController@home_screen')->name('home_screen');

//チャット登録
Route::post('/chat', 'app\Http\Controllers\ChatController@chat')->name('chat');

//マイページへ遷移
Route::get('/mypage', 'app\Http\Controllers\UsersController@mypage')->name('mypage');

//ユーザー情報の更新
Route::post('/update', 'app\Http\Controllers\UsersController@update')->name('users.update');

//ユーザーを削除
Route::post('/destroy', 'app\Http\Controllers\UsersController@destroy')->name('users.destroy');
