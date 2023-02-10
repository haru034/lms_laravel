<!-- 編集画面のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> <!-- bootstrap読み込み -->
    <link rel="stylesheet" href="{{ asset('css/record.css') }}"> <!-- record.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}"> <!-- edit.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学習記録編集画面</title>
</head>
<body>
    <h1>学習記録編集画面</h1>
    <section>
        <div class="editarea-btn">
            <p class="btn-5"><a class="btn btn-primary" href="{{ url('home_screen') }}">ホーム画面に戻る</a></p>
            <p class="btn-6"><a class="btn btn-primary" href="{{ url('list_screen') }}">過去ログ一覧</a></p>
        </div>
        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif
        <div>
            <form action="{{ route('update', $record) }}" method="post" autocomplete="off">
                @csrf <!-- CSRF保護 -->
                @method('put')
                <p class="edit_date_title">本日・{{ \Carbon\Carbon::now()->format("Y年m月d日($week[$date])") }}の記録</p>
                <div class="edit_form">
                    <table>
                        <tr>
                            <th><label for="health">生活リズム</label></th>
                            <td>
                                <select name="health" class="form-control" value="">
                                    <option value="">選択してください</option>
                                    <option value="良好">良好</option>
                                    <option value="まあまあ">まあまあ</option>
                                    <option value="最悪">最悪</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="kg">体重</label></th>
                            <td><input type="number" step="0.1" name="kg" class="form-control"></td><td>kg</td>
                        </tr>
                        <tr>
                            <th><label for="hours">学習時間</label></th>
                            <td><input type="number" step="0.1" name="hours" class="form-control"></td><td>時間</td>
                        </tr>
                        <tr>
                            <th><label for="thought">感想</label></th>
                            <td><textarea class="form-control" name="thought" rows="5"></textarea></td>
                        </tr>
                    </table>
                    <div class="editarea-btn">
                        <input type="hidden" name="_method" value="put">
                        <button type="submit" class="btn btn-success">更新する</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div id="footer">Copyright© 2023 Harutaka Imai</div>
</body>
</html>