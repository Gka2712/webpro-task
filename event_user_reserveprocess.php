<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>イベント予約</title>
    </head>
    <?php
        $hostname='127.0.0.1';
        $username='root';
        $pass='dbpass';
        $dbname='saisyuu';
        $tablename='eventreservation';
        $name=$_POST['name'];
        $event_num=$_POST['num'];
        echo '<h3>Library</h3>';
        echo '<p>'.htmlspecialchars($name).'</p>';
        mysqli_report(MYSQLI_REPORT_OFF);
        $link=mysqli_connect($hostname,$username,$pass,$dbname);
        if(!$link){exit("connect error");}
        $result=mysqli_query($link,"SELECT * FROM $tablename WHERE name='$name' AND event_num='$event_num'");
        if(!$result){exit("select error");}
        if(mysqli_num_rows($result)>0)
        {
            echo '<p>すでにこちらのイベントは予約されているようです</p>';
            echo <<<EOT
            <form method="post" action="event_user_reserve.php">
EOT;
            echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
            echo <<<EOT
                <button type="submit" name="Btneventuserreserve" value="">戻る</button>
            </form>
EOT;
            mysqli_free_result($result);
            mysqli_close($link);
            exit();
        }
        mysqli_free_result($result);
        $result=mysqli_query($link,"INSERT INTO $tablename SET name='$name',event_num='$event_num'");
        if(!$result){exit("insert error");}
        echo '<p>予約が完了しました。</p>';
        echo <<<EOT
        <form method="post" action="event_user_reserve.php">
EOT;
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
            <button type="submit" name="Btneventuserreserve" value="">戻る</button>
        </form>
EOT;
       mysqli_close($link);
    ?>
</html>