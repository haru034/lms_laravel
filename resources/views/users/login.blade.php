<!-- ログイン画面のView --> 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> <!-- login.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body class="bg-dark text-white">
    <div class="login">
        <div>
        <h1>LMS_Laravel</h1><br>
        <h2>＜ログイン画面＞</h2>
        </div>
            <div class="outer-login-form">
                <section>
                    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf <!-- CSRF保護 -->
                        <p>ニックネーム</p>
                        <p><input type="text" name="nickname" placeholder="ニックネームを入力してください" autocomplete="off" style="width:250px; height:30px;"></P>
                        <p>パスワード</P>
                        <p><input type="password" name="password" placeholder="パスワードを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></P>
                        <p><input type="submit" value="ログイン" autocomplete="off" style="width:200px; height:30px; margin-top:20px; margin-bottom:20px;"></p>
                    </form>
                    <a class="btn btn-primary" href="{{ route('signup_form') }}">新規登録画面に戻る</a> <!-- リダイレクト -->
                </section>
            </div>
        </form>
        <div class="error-indication">
            @foreach ($errors->all() as $error) <!--入力ミスまたは重複している部分があれば、警告文で知らせてくれる処理-->
                <li>{{$error}}</li>
            @endforeach
        </div>
        <div id="footer">Copyright© 2023 Harutaka Imai</div>
    </div>
</body>
</html>