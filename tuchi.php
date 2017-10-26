<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>notification</title>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<script type='text/javascript'>
/**
 * デスクトップ通知機能が有効化をチェック
 */
function checkNotification() {
    if ('Notification' in window) {
        return true;
    } else {
        return false;
    }
}
/**
 * デスクトップ通知を有効にするためにブラウザの通知リクエストを表示
 */
function requestNotification() {
    Notification.requestPermission();
    if (Notification.permission === 'granted') {
        return true;
    } else {
        return false;
    }
}
/**
 * デスクトップ通知へメッセージを表示
 *
 * @param string title : 通知のタイトル
 * @param string message : 通知するメッセージ
 */
function pushNotification(title, message) {
    var options = {
        body: message,
        icon: '/img/book.jpg'
    }
    // デスクトップ通知へメッセージ表示
    var notification = new Notification(title, options);
}
if (checkNotification() === false) {
    alert('デスクトップ通知は利用できません');
} else {
    if (sendRequestNotification() === false) {
        alert('ブラウザの通知機能を有効にしてください');
    }
}
</script>
</head>
<body>
<input type='button' id='push' value='デスクトップ通知' onClick='pushNotification(\"通知のテストです\", \"デスクトップ通知\")'/>
</body>
</html>