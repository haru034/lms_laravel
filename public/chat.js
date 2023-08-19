/*ホーム画面にアクセスすると5秒毎に非同期通信が実行される処理*/

window.onload = function(){

    function get_data() { // 非同期通信処理
        $.ajax({
            url: "result/ajax/",
            dataType: "json", // 取得データをJSON形式に指定
        })
        .done(function(data) {
            $("#chat-data") // home.blade.php31行目のidに対して下記HTMLが埋め込まれる処理
                .find(".chat-visible").each(function(){
                    $(this).attr({
                        "nickname": $(this).find(".chat-visible"),
                        "created_at": $(this).find(".chat-visible"),
                        "message": $(this).find(".chat-visible")
                    });
                })
                .remove();
            console.log(data.chats);
            for (var i = 0; i < data.chats.length; i++) {
                var html = `
                            <div class="media chat-visible">
                                <div class="media-body chat-body">
                                    <div class="row">
                                        <span class="chat-body-user" id="nickname">${data.chats[i].nickname}</span>
                                        <span class="chat-body-time" id="created_at">${data.chats[i].created_at}</span>
                                    </div>
                                    <span class="chat-body-content" id="message">${data.chats[i].message}</span>
                                </div>
                            </div>
                        `;
                $("#chat-data").append(html); // 生成したHTMLコードを表示領域に追加
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
