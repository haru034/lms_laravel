<!-- マイページ(個人情報編集画面)のView --> 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}"> <!-- mypage.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/mypage.js') }}"></script> <!-- mypage.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
</head>
<body>
    <section>
        <div class="mypage">
            <div>
                <h1>マイページ</h1>
                <h2>ユーザーID: {{ $user->id }}</h2>
            </div>
                <div> <!-- ユーザー情報の更新 -->
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                        <p><input type="hidden" name="id" value="{{ $user->id }}"></p> <!--情報を更新する際に、更新するユーザーIDをサーバーに送る処理-->
                        <p><input type="text" name="nickname" value="{{ $user->nickname }}" placeholder="ニックネームを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></P>
                        <p><input type="password" name="password" value="" placeholder="パスワードを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></p>
                        <p><button type="submit" class="btn btn-success" href="{{ route('home_screen') }}">入力内容を更新する</button></p>
                    </form>
                </div>
                <div><p><a class="btn btn-primary" href="{{ route('home_screen') }}">ホーム画面に戻る</a></p></div>
                <div><!-- ユーザー情報の削除 -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <p><button type="submit" class="btn btn-danger user_delete_btn" href="{{ route('signup_form') }}">ユーザーを削除する</button></p>
                    </form>
                </div>
            <div class="error-indication">
                @foreach ($errors->all() as $error) <!--入力ミスまたは重複している部分があれば、警告文で知らせてくれる処理-->
                    <li>{{$error}}</li>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>