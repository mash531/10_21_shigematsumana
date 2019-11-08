<?php
//最初にSESSIONを開始！！
session_start();

//0.外部ファイル読み込み
include('functions.php');

//1.  DB接続&送信データの受け取り
$pdo = connectToDb();
$loginid = $_POST['loginid'];
$loginpw = $_POST['loginpw'];
$kanri_flg = $_POST['kanri_flg'];
//2. データ登録SQl作成
$sql = 'SElECT * FROM login WHERE loginid=:loginid AND loginpw =:loginpw AND life_flg=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':loginid', $loginid, PDO::PARAM_STR);
$stmt->bindValue(':loginpw', $loginpw, PDO::PARAM_STR);
$res = $stmt->execute();

//3. SQl実行時にエラーがある場合
if ($res == false) {
    showSqlErrorMsg($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//5. 該当レコードがあればSESSIONに値を代入
// if ($val['id'] != '') {
//     // ログイン成功の場合はセッション変数に値を代入
//     $_SESSION = array();
//     $_SESSION['session_id'] = session_id();
//     $_SESSION['kanri_flg'] = $val['kanri_flg'];
//     $_SESSION['name'] = $val['name'];
//     header('location:user_select.php');
// } else {
//     //ログイン失敗の場合はログイン画面へ戻る
//     header('location:user_login.php');
// }

// exit();
if ($val['kanri_flg'] == 1) {
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name'] = $val['name'];
    header('location:user_index.php');
} elseif ($val['id'] != '') {
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name'] = $val['name'];
    header('location:index.php');
} else {
    header('location:select_nologin.php');
}
exit();
