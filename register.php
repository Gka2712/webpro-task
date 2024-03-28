<?php
    echo <<<EOT
    <!DOCTYPE html> 
    <html>
        <head>
            <meta charset="UTF-8"/>
            <title>新規登録</title>
        </head>
        <body>
            <h3>Library</h3>
            <form method="post" action="register_check.php">
                属性<select name="type">
                <option value="staff">図書館スタッフ</option>
                <option value="user">図書館利用者</option>
                </select>
                <br>
                名前<input type="text" name="name" value="">
                <br>
                電話番号<input type="text" name="phonenum" value="" pattern="[0-9]*">
                <br>
                住所<input type="text" name="address" value="">
                <br>
                メールアドレス<input type="email" name="mail">
                <br>
                ユーザID<input type="text" name="userID" pattern="[A-Za-z0-9]*">
                <br>
                ユーザIDは、半角英数字のみ使うことができます。<br>またユーザIDは、6文字以上で書いてください
                <br>
                パスワード<input type="password" name="password">
                <br>
                パスワードは8文字以上で入力してください。
                <br>
                パスワード再確認<input type="password" name="password_check">
                <br>
                入力したパスワードを入力してください
                <br>
                <button type="submit" name="register" value="">登録</button>
                <br>
                <button type="reset" name="reset" value="">リセット</button>
                <br>
            </form>
            <form method="post" action="main.php">
                <button type="submit" name="BtnMain">戻る</button>
            </form>
        </body>
    </html>
EOT;
    exit();

?>
