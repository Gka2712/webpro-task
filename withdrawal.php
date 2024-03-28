<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>図書館マイページ</title>
    </head>
    <body>
        <?php
        $name=$_POST['name'];
        $hostname='127.0.0.1';
        $username='root';
        $pass='dbpass';
        $dbname='saisyuu';
        $tablename='usermanegement';
        mysqli_report(MYSQLI_REPORT_OFF);
        $link=mysqli_connect($hostname,$username,$pass,$dbname);
        if(!$link){exit("退会処理ができませんでした 原因:データベースの不具合");}
        $result=mysqli_query($link,"DELETE FROM usermanegement WHERE (name='$name')");
        if(!$result){exit("退会処理ができませんでした");}
        echo htmlspecialchars($name).'さん、退会処理を完了いたしました';
        echo <<<EOT
        <form action="main.php" method="post">
            <button type="submit" name="Btnmain" value="">メインに戻る</button>
        </form>
EOT;
        ?>
    <body>
</html>