<!-- マイページ(個人情報編集画面)のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}"> <!-- mypage.cssと連携 -->
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
                <div>
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                        <p><input type="hidden" name="id" value="{{ $user->id }}"></p> <!--情報を更新する際に、更新するユーザーIDをサーバーに送る処理-->
                        <p><input type="text" name="nickname" value="{{ $user->nickname }}" placeholder="ニックネームを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></P>
                        <p><input type="email" name="email" value="{{ $user->email }}" placeholder="メールアドレスを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></p>
                        <p><input type="password" name="password" value="" placeholder="パスワードを入力してください" autocomplete="off" style="width:250px; height:30px; margin-top:10px;"></p>
                        <p><button type="submit" class="btn btn-success" href="{{ route('home_screen') }}">入力内容を更新する</button></p>
                    </form>
                    <p><a class="btn btn-danger" href="{{ route('home_screen') }}">ホーム画面に戻る</a></p>
                </div>
            </form>
            <div class="error-indication">
                @foreach ($errors->all() as $error) <!--入力ミスまたは重複している部分があれば、警告文で知らせてくれる処理-->
                    <li>{{$error}}</li>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>