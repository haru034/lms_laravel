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
            <p><a class="btn btn-primary" href="{{ url('home_screen') }}">ホーム画面に戻る</a></p>
        </div>
        @foreach ($posts as $record)
        <div class="list_table table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <p>{{$record->updated_at->format("Y/m/d($week[$date])")}}</p>
                        <td class="table-dark rounded">【本日の目標】<span>{{$record->goal}}</span></td>
                        <td class="table-danger rounded">【生活リズム】<span>{{$record->health}}</span></td>
                        <td class="table-primary rounded">【体重】<span>{{$record->kg}}kg</span></td>
                        <td class="table-success rounded">【学習時間】<span>{{$record->hours}}時間</span></td>
                        <td class="table-warning rounded">【感想】<span>{{$record->thought}}</span></td>
                    </tr>
                </thead>
            </table>
        </div>
        @endforeach
    </section>
</body>
</html>