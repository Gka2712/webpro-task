
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>利用者図書貸出登録完了</title>
    </head>
    <body>
        <h3>Library</h3>
<?php
        $name=$_POST['name'];
        $num=$_POST['num'];
        $book=$_POST['book'];
        $hostname='127.0.0.1';
        $username='root';
        $pass='dbpass';
        $dbname='saisyuu';
        $tablename1='Bookmanagement';
        $tablename2='Usermanagement';
        $lendday=date_format(new DateTime('now'),'Y-m-d H:i:s');
        $returndueday=date_format(new DateTime('+2 week'),'Y-m-d H:i:s');
        echo '<p>'.htmlspecialchars($name).'</p>';
        mysqli_report(MYSQLI_REPORT_OFF);
        $link=mysqli_connect($hostname,$username,$pass,$dbname);
        if(!$link){exit("connect error!");}
        $result=mysqli_query($link,"UPDATE $tablename1 SET condi='lend',user='$name',lendday='$lendday',returndueday='$returndueday' WHERE num='$num'");
        if(!$result){exit(mysqli_error($link));}
        $result=mysqli_query($link,"UPDATE $tablename2 SET condi='lend' WHERE name='$name'");
        if(!$result){exit(mysqli_error($link));};
        mysqli_close($link);
        echo htmlspecialchars($name).'さん';
        echo '貸出内容は以下の通りです。<br>';
        echo '本は2週間以内に返却してください<br>';
        echo '貸出:'.htmlspecialchars($book).'<br>';
        echo '貸出日'.htmlspecialchars($lendday).'<br>';
        echo '返却日'.htmlspecialchars($returndueday).'<br>';
        echo <<<EOT
        <form method="post" action="book_user_top.php">
            <input type="hidden" name="name" value="$name">
            <button type="submit" name="return" value="">戻る</button>
        </form>
EOT;
?>
    </body>
</html>