<html>
    <head>
        <meta charset="UTF-8"/>
        <title>イベント登録完了</title>
    </head>
    <body>
    <?php
        $hostname='127.0.0.1';
        $username='root';
        $pass='dbpass';
        $dbname='saisyuu';
        $tablename='eventmanegement';
        $name=$_POST['name'];
        $event=$_POST['event'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $place=$_POST['place'];
        $remark=$_POST['remark'];
        echo '<h3>Library</h3>';
        echo '<p>'.htmlspecialchars($name).'</p>';
        mysqli_report(MYSQLI_REPORT_OFF);
        $link=mysqli_connect($hostname,$username,$pass,$dbname);
        if(!$link){exit("connect error!");}
        $result=mysqli_query($link,"INSERT INTO $tablename SET event='$event',date='$date',time='$time',place='$place',remark='$remark'");
        if(!$result){exit("insert error!");}
        mysqli_close($link);
        echo '登録処理を完了しました';
    ?>
    <form method="post" action="event_staff.php">
        <?php
            echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';   
        ?>
        <button type="submit" name="Btneventstaff" value="">イベント画面に戻る</button>
    </form>
</body>
</html>