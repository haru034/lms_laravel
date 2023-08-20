/*ホーム画面にアクセスすると5秒毎に非同期通信が実行される処理*/

window.onload = function(){

    function get_data() { // 非同期通信処理
        $.ajax({
            url: "result/ajax/",
            dataType: "json", // 取得データをJSON形式に指定
        })
        .done(function(data) {
            var tableBody = $("#chat-data tbody"); // home.blade.php42行目のtbody要素を取得
            tableBody.empty(); // chatテーブル内の既存のデータを一旦クリア

            for (var i = 0; i < data.chats.length; i++) {
                var chat = data.chats[i];
                var html = `
                            <tr>
                                <td class="nickname_box">${ chat.nickname }</td>
                                <td class="message_box">${ chat.message }</td>
                                <td class="created_at_box">${ chat.created_at }</td>
                            </tr>
                            `;
                tableBody.append(html); // JSON形式で取得したデータをchatテーブルに追加
            }
        })
        .fail(function(res) {
            alert("非同期通信に失敗しました");
        })
        .always(function(res) {
            console.log(res);
        });
    }
    setInterval(get_data, 5000); // 5秒毎にget_data()の処理を実行して最新のデータを取得
}
