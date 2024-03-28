<html>
    <head>
       <meta charset="UTF-8"/>
       <title>ログイン画面</title>
    </head>
    <body>
         <h3>Library</h3>
        <?php
        $auth=$_POST['auth'];
        $type=$_POST['type'];
        echo '<p>'.htmlspecialchars($auth).'ログイン画面</p>';
        if($auth=='図書館スタッフ')
        {
            echo '<form method="post" action="staffmain.php">';
            echo '<input type="hidden" name="staff" value="">';
        }
        elseif($auth=='図書館利用者')
        {
            echo '<form method="post" action="usermain.php">';
            echo '<input type="hidden" name="user" value="">';
        }
        else
        {
            exit("ユーザが不明です。");
        }
        echo 'ユーザID   <input type="text" name="userID"><br>';
        echo 'パスワード <input type="password" name="password"><br>';
        echo '<input type="hidden" name="auth" value='.htmlspecialchars($type).'>';
        echo '<button type="submit" name="login" value="">ログイン</button>';
        echo '</form>';
        echo '<form method="post" action="main.php">';
        echo '<button type="submit" name="BtnMain">メインに戻る</button>';
        echo '</form>';
        ?>
    </body>
</html>