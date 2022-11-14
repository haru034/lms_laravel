<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
class RecordController extends Controller
{
    /**
     * 学習記録画面の表示
     * 
     */
    public function record_screen()
    {
        return view('users.record');
    }

    /**
     * 「記録」ボタンを押した時の処理
     * 
     */
    public function record()
    {
        $record = new Record; // $recordの変数に、Recordモデルを定義
        $user = Auth::user(); // 認証しているユーザーを取得
        $id = Auth::id(); // 認証しているユーザーのIDを取得
        $record->user_id = $id; // user_idをセット
        $record->health = $id; // healthをセット
        $record->kg = $id; // kgをセット
        $record->study = $id; // studyをセット
        $record->thought = $id; // thoughtをセット
        $record->save(); // $recordに格納されている情報を保存。
        return redirect('record_screen'); // 入力内容が保存されたら、学習記録画面にリダイレクト
    }
}