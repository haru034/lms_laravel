<!-- ルーティング -->
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChatController;

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
Route::get('/', [UsersController::class, 'login_form']); // php artisan serve起動時に表示

//新規登録画面の表示
Route::get('/signup_form', [UsersController::class, 'signup_form'])->name('signup_form');

Route::post('/signup', [UsersController::class, 'signup'])->name('signup'); // 新規登録の処理

//ログイン画面へ遷移
Route::get('/login_form', [UsersController::class, 'login_form'])->name('login_form');

Route::post('/login', [UsersController::class, 'login'])->name('login'); // ログイン認証


//ホーム画面へ遷移
Route::get('/home_screen', [ChatController::class, 'home_screen'])->name('home_screen');

//チャット登録
Route::post('/chat', [ChatController::class, 'chat'])->name('chat');

//マイページへ遷移
Route::get('/mypage', [UsersController::class, 'mypage'])->name('mypage');

//ユーザー情報の更新
Route::post('/update', [UsersController::class, 'update'])->name('users.update');

//ユーザーを削除
Route::post('/destroy', [UsersController::class, 'destroy'])->name('users.destroy');

//学習記録画面へ遷移
Route::get('/record_screen', [RecordController::class, 'record_screen'])->name('record_screen');
