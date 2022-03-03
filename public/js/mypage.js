/* マイページでユーザー削除ボタンを押すとアラートが出る処理 */

/* ボタンクリック時にページ遷移 */
$(function(){
    $('.user_delete_btn').click(function(){ // 「.」でクラス指定
        if(!confirm('本当に削除しますか？')){
            return false; // キャンセルの場合は元に戻る
        }else{
            location.href = 'mypage.blade.php'; // OKの場合は削除
        }
    });
});