<!-- ホーム画面のView --> 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- home.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> <!-- jQuery読み込み -->
    <title>ホーム画面</title>
</head>
<body>
    <h1>LMS_Laravel</h1>
    <section>
        <div class="homearea-btn">
            <p class="btn-1"><a class="btn btn-primary" href="{{ url('mypage') }}">マイページ</a></p>
            <p class="btn-2"><a class="btn btn-secondary" href="{{ url('login_form') }}">ログアウト</a></p>
            <p class="btn-3"><a class="btn btn-warning" href="{{ url('record_screen') }}">学習記録画面</a></p>
            <p class="btn-4"><a class="btn btn-primary" href="{{ url('list_screen') }}">過去ログ一覧</a></p>
        </div>
        <div> <!-- チャット一覧画面 -->
            <form action="{{ route('chat') }}" method="post" autocomplete="off" style="height: auto; margin-bottom: 10px">
                @csrf <!-- CSRF保護 -->
                <div class="outer-message-form">
                    <p>「今から学習を始めます」「終わります」など、学習に関する事なら何でもいいので投稿しましょう！</p>
                    <textarea name="message" placeholder="ここにメッセージを入力してください" autocomplete="off" rows="3" cols="200"></textarea><br> <!-- rows =「高さ」, cols =「幅」-->
                    <button type="submit" name="chatpost" class="btn btn-success">投稿</button>
                </div>
            </form>
        </div>
        <div id="chat-data"> <!-- chat.js10行目の処理 -->
            <div class="chat_table table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>表示名</th>
                            <th>投稿内容</th>
                            <th>投稿日時</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($chats as $chat) <!-- chatテーブルのデータを全て表示させる処理 -->
                        <tr>
                            <td class="nickname_box">{{ $chat->user->nickname }}</td> <!-- $chatに、user関数を使い、その中のnicknameを参照 -->
                            <td class="message_box">{{ $chat->message }}</td>
                            <td class="created_at_box">{{ $chat->created_at->format('Y年m月d日G時i分') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div id="footer">Copyright© 2023 Harutaka Imai</div>

    <!-- chat.js読み込み -->
    <script src="{{ asset('/chat.js') }}"></script>
</body>
</html>