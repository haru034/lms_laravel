<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authクラスを使用
use App\Models\User;
use App\Models\Chat;
use App\Models\Record;
class RecordController extends Controller
{
    /**
     * 学習記録画面の表示
     * 
     */
    public function record_screen()
    {
        $week = [
            '日', // 0
            '月', // 1
            '火', // 2
            '水', // 3
            '木', // 4
            '金', // 5
            '土', // 6
        ];
        $date = date('w');
        return view('users.record', compact('week', 'date'));
    }

    /**
     * 「記録」ボタンを押した時の処理(post)
     * 
     */
    public function record(Request $request)
    {
        $record = new Record; // $recordの変数に、Recordモデルを定義
        $user = Auth::user(); // 認証しているユーザーを取得
        $id = Auth::id(); // 認証しているユーザーのIDを取得
        $record->user_id = $id; // user_idをセット
        $record->health = $request->health; // healthをセット
        $record->kg = $request->kg; // kgをセット
        $record->hours = $request->hours; // hoursをセット
        $record->thought = $request->thought; // thoughtをセット
        $record->save(); // $recordに格納されている情報を保存。
        return redirect('home_screen'); // 入力内容が保存されたら、学習記録画面にリダイレクト
    }

    // データを更新
    public function update(Request $request) // 学習記録を更新する処理
    {
        // バリデーション = 「入力チェック」
        $request->validate([
            'required' => ['health', 'kg', 'hours', 'thought'] // 入力必須
        ]);
        // 各ユーザーの情報を取得
        $user = User::find(Auth::user()->id);
        $user->nickname = $request->nickname;

        $user->save(); // 情報を更新すると
        return redirect('home_screen'); // ホーム画面にリダイレクト
    }
}