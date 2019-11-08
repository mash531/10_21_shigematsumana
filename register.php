<?php
session_start();
include('./register_dbconnect.php');
if (!empty($_POST)) {
    //エラー項目の確認
    if ($_POST['name'] == '') {
        $error['name'] = '入力されていません';
    }
    if ($_POST['mail'] == '') {
        $error['mail'] = '入力されていません';
    }
    if (strlen($_POST['pass']) < 4) {
        $error['pass'] = 'パスワードが短すぎます';
    }
    if ($_POST['pass'] == '') {
        $error['pass'] = '入力されていません';
    }

    if (empty($error)) {
        $_SESSION['join'] = $_POST;
        header('Location: check.php');
        exit();
    }
}

?>
<!-- 登録画面 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>新規会員登録</title>
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
                <a class="navbar-brand" href="#">会員登録</a>
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
        <p>必要事項をご記入ください</p>
        <form action="" method="post" enctype="multipart/form-data">
            <dl>
                <dt>ユーザー名<font color="red">必須</font>
                </dt>
                <dd>
                    <input type="text" name="name" size="35" maxlength="255" placeholder="ユーザー名が入力されていません">
                    <?php if (!empty($error['name']) && $error['name'] == 'blank') : ?>
                        <p>
                            <font color="red">* ユーザー名を入力してください</font>
                        </p>
                    <?php endif; ?>
                </dd>
                <dt>メールアドレス<font color="red">必須</font>
                </dt>
                <dd>
                    <input type="text" name="mail" size="35" maxlength="255" placeholder="メールアドレスが入力されていません">
                    <?php if (!empty($error['mail']) && $error['mail'] == 'blank') : ?>
                        <p>
                            <font color="red">* メールアドレスを入力してください</font>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($error['mail']) && $error['mail'] == 'duplicate') : ?>
                        <p>
                            <font color="red">* 指定されたメールアドレスは既に登録されています</font>
                        </p><?php endif; ?>
                </dd>
                <dt>パスワード<font color="red">必須</font>
                </dt>
                <dd>
                    <input type="password" name="pass" size="10" maxlength="20" placeholder="パスワードが入力されていません">
                    <?php if (!empty($error['pass']) && $error['pass'] == 'blank') : ?>
                        <p>
                            <font color="red">* パスワードを入力してください</font>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($error['pass']) && $error['pass'] == 'length') : ?>
                        <p>
                            <font color="red">* パスワードは４文字以上で入力してください</font>
                        </p>
                    <?php endif; ?>
                </dd>
            </dl>
            <div><input type="submit" value="入力内容を確認"></div>
        </form>
    </div>
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
</body>

</html>