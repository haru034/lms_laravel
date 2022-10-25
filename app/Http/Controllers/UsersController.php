<?php // このファイルに、新規登録画面、ログイン画面、ホーム画面(チャット機能含む)、チャット編集画面のControllerを記述。

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // User.phpを使用
use Illuminate\Support\Facades\Hash; // パスワードを乱数にする設定
use Illuminate\Support\Facades\DB; // DBクラスを使用
use App\Models\Chat; // chat.phpを使用
use Illuminate\Support\Facades\Auth; // Authクラスを使用

class UsersController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';// Admin(管理者)でログインした後のリダイレクト先をホーム画面に設定

    /**
     * 新規登録画面の表示
     *
     */
    public function signup_form()
    {
        return view('users.signup');
    }

    public function signup(Request $request) // 新規登録の処理(post)
    {
        // バリデーション = 「入力チェック」
        $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255', 'alpha_num'],
        ]);

        // DBインサート(usersテーブルに行を追加)
        $user = new User();
        $user->fill([ // fillを使い、モデルの全カラムを更新。
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password), // 新規登録時にパスワードをハッシュ化。
            'user_type' => $request->user_type,
        ])->save(); // $userに格納されている情報を保存。

        //「登録する」ボタンを押すとログイン画面に遷移
        return view('users.login');
    }

    /**
     * ログイン画面の表示
     *
     */
    public function login_form()
    {
        return view('users.login');
    }

    public function login(Request $request) // ログインの処理(post)
    {
        // バリデーション = 「入力チェック」
        $request->validate([
            'nickname' => 'required',
            'password' => ['required', 'min:8', 'max:255', 'alpha_num']
        ]);

        // ログイン認証
        if(Auth::attempt(['nickname' => $request->input('nickname'), 'password' => $request->input('password')]))
            {
            return redirect()->route('home_screen'); // ログインに成功するとホーム画面にリダイレクト
            }
            return redirect()->back(); // ログインに失敗するとログイン画面に戻る
    }

    /**
     * マイページ(ユーザー編集画面)の表示
     *
     */
    public function mypage()
    {
        if (Auth::check()) // = 現在のユーザーが認証されているか調べる
        {
            $user = Auth::user(); // ログイン済みのユーザーを取得
            return view('users.mypage', ['user' => $user]); // ログインに成功している場合はマイページに遷移
        }
        else
        {
            return redirect('login_form'); // ログインに失敗した場合、ログイン画面に遷移
        }
    }
    
    public function update(Request $request) // ユーザーの情報を更新する処理
    {
        // バリデーション = 「入力チェック」
        $request->validate([
            'nickname' => 'required',
            'password' => ['min:8', 'max:255', 'alpha_num']
        ]);
        // 各ユーザーの情報を取得
        $user = User::find(Auth::user()->id);
        $user->nickname = $request->nickname;
        
        // 既存のパスワードを入力欄に非表示
        if ($request->password!=''){ // もしpasswordが空の場合はtrueが返され、下の処理を実行。
            $user->password = Hash::make($request->password); // パスワードの入力があった場合、Hash化(暗号化)する。
        }
        $user->save();
        return redirect()->to('home_screen'); // 情報を更新したらホーム画面にリダイレクト
    }

    public function destroy(Request $request) // ユーザーの情報を削除する処理
    {
        // 各ユーザーの情報を取得
        $user = User::find(Auth::user()->id);
        $user->nickname = $request->nickname;

        // ユーザー情報をすべて削除
        $user->fill([$user->all()])->delete();
        return redirect()->to('signup_form'); // 情報を削除すると新規登録画面にリダイレクト
    }
}
