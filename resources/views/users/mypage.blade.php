<!-- マイページ(ユーザー編集画面)のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}"> <!-- edit.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
</head>
<body>
    <h1>マイページ</h1>
    <section>
        <div class="btn-movement">
            <div>
                <p><a class="btn btn-danger" href="{{ route('home_screen') }}">ホーム画面に戻る</a></p>
            </div>
        </div>
    </section>
</body>
</html>