<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>イベント確認画面</title>
    </head>
    <body>
    <?php
        $hostname='127.0.0.1';
        $username='root';
        $pass='dbpass';
        $dbname='saisyuu';
        $tablename1='eventreservation';
        $tablename2='eventmanegement';
        $name=$_POST['name'];
        echo '<h3>Library</h3>';
        echo '<p>'.htmlspecialchars($name).'</p>';
        mysqli_report(MYSQLI_REPORT_OFF);
        $link=mysqli_connect($hostname,$username,$pass,$dbname);
        if(!$link){exit("connect error");}
        $result=mysqli_query($link,"SELECT * FROM $tablename1,$tablename2 WHERE ($tablename1.name='$name')AND($tablename1.event_num=$tablename2.num)");
        if(!$result){exit("select error");}
        if(mysqli_num_rows($result)<=0)
        {
            echo 'あなたが予約したイベントはありません';
        }
        else
        {
            echo '<table border="1">';
            echo <<<EOT
            <tr>
                <td>イベント</td><td>開催日程</td><td>開催時刻</td><td>開催場所</td><td>概要</td>
            </tr>
EOT;
            while($row=mysqli_fetch_assoc($result))
            {
                $event=$row['event'];
                $date=$row['date'];
                $time=$row['time'];
                $place=$row['place'];
                $remark=$row['remark'];
                echo <<<EOT
                <tr>
EOT;
                echo '<td>'.htmlspecialchars($event).'</td>';
                echo '<td>'.htmlspecialchars($date).'</td>';
                echo '<td>'.htmlspecialchars($time).'</td>';
                echo '<td>'.htmlspecialchars($place).'</td>';
                echo '<td>'.htmlspecialchars($remark).'</td>';
                echo <<<EOT
                </tr>
EOT;
            }
            echo '</table>';
        }
        mysqli_free_result($result);
        mysqli_close($link);
        echo '<form method="post" action="event_user_top.php">';
        echo '<input type="hidden" name="name"value="'.htmlspecialchars($name).'">';
        echo '<button type="submit" name="Btneventusertop" value="">戻る</button>';
        echo '</form>';
    ?>
    </body>
</html>