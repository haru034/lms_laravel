<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authクラスを使用
use App\User;
use App\Chat; // Chat.php(Models)にアクセス
use APP\Record; // Record.php(Models)にアクセス
class RecordsController extends Controller
{
    /**
     * マイページの表示
     * 
     */
    public function mypage()
    {
        if (Auth::check()) // = 現在のユーザーが認証されているか調べる
        {
            $chats = Chat::orderBy('created_at', 'desc')->get();
            $user = Auth::user(); // 現在認証しているユーザーを取得
            return view('users.mypage', ['chats' => $chats, 'user' => $user]); // ログインに成功している場合はマイページに遷移
        }
        else
        {
            return redirect('login_form'); // ログインに失敗した場合は、ログイン画面に遷移
        }
    }

    /**
     * 「投稿」ボタンを押した時の処理
     * 
     */
    public function chat(Request $request)
    {
        $chat = new Chat; // $chatの変数に、Chatモデルを定義
        $user = Auth::user(); // 認証しているユーザーを取得
        $id = Auth::id(); // 認証しているユーザーのIDを取得
        $chat->user_id = $id; // user_idをセット
        $chat->nickname = $id; // nicknameをセット
        $chat->message = $request->message; // messageをセット
        $chat->save(); // $chatに格納されている情報を保存。
        return redirect('home_screen'); // 入力内容が保存されたら、ホーム画面にリダイレクト
    }
}
