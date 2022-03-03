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
Route::get('/', 'UsersController@login_form'); // php artisan serve起動時に表示

//新規登録画面の表示
Route::get('/signup_form', 'UsersController@signup_form')->name('signup_form');
Route::post('/signup', 'UsersController@signup')->name('signup'); // 新規登録の処理

//ログイン画面へ遷移
Route::get('/login_form', 'UsersController@login_form')->name('login_form');
Route::post('/login', 'UsersController@login')->name('login'); // ログイン認証

//ホーム画面へ遷移
Route::get('/home_screen', 'ChatController@home_screen')->name('home_screen');

//チャット登録
Route::post('/chat', 'ChatController@chat')->name('chat');

//マイページへ遷移
Route::get('/mypage', 'UsersController@mypage')->name('mypage');

//ユーザー情報の更新
Route::post('/update', 'UsersController@update')->name('users.update');

//ユーザーを削除
Route::post('/destroy', 'UsersController@destroy')->name('users.destroy');
