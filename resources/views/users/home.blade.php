<!-- ホーム画面のView --> 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- home.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
</head>
<body>
    <h1>LMS_Laravel</h1>
    <section>
        <div>
            <div>
                <p><a class="btn btn-primary" href="{{ url('mypage') }}">マイページに移動</a></p>
                <p><a class="btn btn-secondary" href="{{ url('login_form') }}">ログアウト</a></p>
        </div>
        <div> <!-- チャット一覧画面 -->
            <form action="{{ route('chat') }}" method="post" autocomplete="off" style="height: auto; margin-bottom: 10px">
                @csrf <!-- CSRF保護 -->
                <div class="outer-message-form">
                    <p>「今から学習を始めます」「終わります」など、学習に関する事なら何でもいいので投稿しましょう！</p>
                    <textarea name="message" placeholder="ここにメッセージを入力してください" autocomplete="off" rows="3" cols="200"></textarea><br> <!-- rows =「高さ」, cols =「幅」-->
                    <button type="submit" class="btn btn-success">投稿</button>
                </div>
            </form>
        </div>
        <div class="chat_table table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>表示名</th>
                        <th>投稿内容</th>
                        <th>投稿日時</th>
                    </tr>
                </thead>
                @foreach ($chats as $chat) <!-- chatテーブルのデータを全て表示させる処理 -->
                <tbody>
                    <tr>
                        <td style="width:10%">{{ $chat->user->nickname }}</td> <!-- $chatに、user関数を使い、その中のnicknameを参照 -->
                        <td style="width:40%">{{ $chat->message }}</td>
                        <td style="width:20%">{{ $chat->created_at }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </section>
</body>
</html>