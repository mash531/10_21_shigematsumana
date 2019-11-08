<?php
// 関数ファイル読み込み
include('functions.php');
// var_dump($_POST);
// exit();
//入力チェック(受信確認処理追加)
if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['message']) || $_POST['message'] == ''
) {
    exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$message = $_POST['message'];
$time = $_POST['time'];
$id = $_POST['id'];
var_dump($deadline);
//DB接続します(エラー処理追加)
$pdo = connectToDb();

//データ登録SQL作成
$sql = 'UPDATE msg SET name=:a1, message=:a2, time=:a3 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $message, PDO::PARAM_STR);
$stmt->bindValue(':a3', $time, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    header('Location:select.php');
    exit;
}
