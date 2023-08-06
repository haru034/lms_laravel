<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authクラスを使用
use App\Models\User;
use App\Models\Chat; // Chat.php(Models)にアクセス
class ChatController extends Controller
{
    /**
     * ホーム画面の表示
     * 
     */
    public function home_screen()
    {
        if (Auth::check()) // = 現在のユーザーが認証されているか調べる
        {
            $chats = Chat::orderBy('created_at', 'desc')->get();
            $user = Auth::user(); // 現在認証しているユーザーを取得
            return view('users.home', ['chats' => $chats, 'user' => $user]); // ログインに成功している場合はホーム画面に遷移
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

    /**
     * URL(/result/ajax)にアクセスしたらjsonを返すAPI
     * 
     */
    public function getData()
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }
}
