<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authクラスを使用
use App\Models\User;
use App\Models\Chat;
use App\Models\Record;
use Carbon\Carbon;
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

    // データを登録
    public function record(Request $request)
    {
        // \Log::debug('登録処理');
        $record = new Record; // $recordの変数に、Recordモデルを定義
        $user = Auth::user(); // 認証しているユーザーを取得
        $id = Auth::id(); // 認証しているユーザーのIDを取得
        $record->user_id = $id; // user_idをセット
        $record->health = $request->input('health'); // healthをセット
        $record->kg = $request->input('kg'); // kgをセット
        $record->hours = $request->input('hours'); // hoursをセット
        $record->thought = $request->input('thought'); // thoughtをセット
        $record->save(); // $recordに格納されている情報を保存。
        return redirect()->route('home_screen')->with('flash_message', '学習記録を登録しました。');
    }

    /**
     * 学習記録編集画面の表示
     * 
     */
    public function edit_screen(Record $record)
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
        return view('users.edit', compact('week', 'date', 'record'));
    }

    // データを更新(上書き保存)
    public function update(Request $request)
    {
        // \Log::debug('更新処理');
        $record = Record::find(1); // user_idの取得
        $today = Carbon::today(); // 当日にデータを記録した日付の取得
        Record::where('user_id', Auth::id())
        ->whereDate('created_at', $today)
        ->update([
        'health' => $request->input('health'),
        'kg' => $request->input('kg'),
        'hours' => $request->input('hours'),
        'thought' => $request->input('thought')
        ]);
        return redirect()->route('home_screen', $record)->with('flash_message', '学習記録を更新しました。');
    }

    // 過去ログを一覧表示
    public function list_screen() {
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
        $posts = Record::latest()->get(); // recordsテーブルの全データを新しい順で取得する
        $record = Record::find(1); // user_idの取得
        $record = Record::where('id');
        return view('users.list', compact('week', 'date', 'record'), ['posts' => $posts]);
    }
}