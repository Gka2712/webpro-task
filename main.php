<html>
    <head>
        <meta charset="UTF-8"/>
        <title>メイン画面</title>
    </head>
    <body>
        <h3>Library</h3>
        <p>こちらからログインを行ってください</p>
        <form method="post" action="login.php">
            <input type="hidden" name="auth" value="図書館スタッフ">
            <input type="hidden" name="type" value="staff">
            <button type="submit" name="staff" value="図書館スタッフ">図書館スタッフはこちら</button>
        </form>
        <form method="post" action="login.php">
            <input type="hidden" name="auth" value="図書館利用者">
            <input type="hidden" name="type" value="user">
            <button type="submit" name="user" value="図書館利用者">図書館利用者はこちら</button>
        </form>
        <p>新規登録がお済みでない方は、<a href=".\register.php">こちら</a>からお願いします。</p>
    </body>
</html>