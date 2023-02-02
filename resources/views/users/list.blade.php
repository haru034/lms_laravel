<!-- 過去ログ一覧画面のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/list.css') }}"> <!-- list.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>過去ログ一覧画面</title>
</head>
<body>
    <h1>過去ログ一覧画面</h1>
    <section>
        <div class="listarea-btn">
            <p class="btn-1"><a class="btn btn-primary" href="{{ url('home_screen') }}">ホーム画面に戻る</a></p>
        </div>
        @foreach ($posts as $record)
        <tr>
            <p class="list_date_title">{{$record->updated_at->format("Y/m/d($week[$date])")}}の記録</p>
            <td>{{$record->health}}</td><br>
            <td>{{$record->kg}}</td><br>
            <td>{{$record->hours}}</td><br>
            <td>{{$record->thought}}</td><br>
        </tr>
        @endforeach
    </section>
</body>
</html>