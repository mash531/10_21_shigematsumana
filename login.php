<?php
require('./register_dbconnect.php');

session_start();

if (!empty($_POST)) {
    //ログインの処理
    if ($_POST['mail'] != '' && $_POST['pass'] != '') {
        $sql = sprintf(
            'SELECT * FROM login WHERE mail="%s" AND pass="%s"',
            mysqli_real_escape_string($db, $_POST['mail']),
            mysqli_real_escape_string($db, sha1($_POST['pass']))
        );
        $record = mysqli_query($db, $sql) or die(mysqli_error($db));
        if ($table = mysqli_fetch_assoc($record)) {
            //ログイン成功
            header('Location: index.php');
            exit();
        } else {
            $error['login'] = 'failed';
        }
    } else {
        $error['login'] = 'blank';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        .darkmode--activated p,
        .darkmode--activated li {
            color: #000;
        }

        .button {
            isolation: isolate;
        }

        .darkmode--activated .logo {
            mix-blend-mode: difference;
        }

        .darkmode--activated ul,
        .darkmode--activated li {
            color: #000;
        }

        .button {
            isolation: isolate;
        }

        .darkmode--activated .logo {
            mix-blend-mode: difference;
        }
    </style>
</head>

<body>
    <div class="darkmode">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Login</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">ログインページ</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="user_select.php">一覧ページ</a>
                    </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">会員登録はこちらへ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    <form action="" method="post">
        <dl>
            <dt>メールアドレス</dt>
            <dd>
                <input type="text" name="mail" size="35" maxlength="255">
            </dd>
            <dt>パスワード</dt>
            <dd>
                <input type="password" name="pass" size="35" maxlength="255">
            </dd>
        </dl>
        <input type="submit" value="ログインする">
    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.4.0/lib/darkmode-js.min.js"></script>
<script>
    new Darkmode().showWidget();
</script>

<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.4.0/lib/darkmode-js.min.js"></script>
<script>
    var options = {
        bottom: '64px', // default: '32px'
        right: 'unset', // default: '32px'
        left: '32px', // default: 'unset'
        time: '0.5s', // default: '0.3s'
        mixColor: '#fff', // default: '#fff'
        backgroundColor: '#fff', // default: '#fff'
        buttonColorDark: '#100f2c', // default: '#100f2c'
        buttonColorLight: '#fff', // default: '#fff'
        saveInCookies: false, // default: true,
        label: '🌓', // default: ''
        autoMatchOsTheme: true // default: true
    }

    const darkmode = new Darkmode(options);
    darkmode.showWidget();
</script>



</html>