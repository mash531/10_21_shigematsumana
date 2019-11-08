<?php
// 入力チェック
if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['message']) || $_POST['message'] == ''
) {
    exit('ParamError');
}
//POSTデータ取得
$name = $_POST['name'];
$message = $_POST['message'];
$time = date_default_timezone_set('Asia/Tokyo');
echo date("Y-m-d H:i:s");

//DB接続
$dbn = 'mysql:dbname=gsacfd04_db21;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:' . $e->getMessage());
}

//データ登録SQL作成
$sql = 'INSERT INTO msg(name, message)
VALUES(:a1, :a2)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $message, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //index.phpへリダイレクト
    header('Location: index.php');
}
