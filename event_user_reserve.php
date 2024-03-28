<html>
    <head>
        <meta charset="UTF-8"/>
        <title>イベント登録</title>
    </head>
    <body>
        <?php
        $hostname='127.0.0.1';
        $username='root';
        $pass='dbpass';
        $dbname='saisyuu';
        $tablename='eventmanegement';
        $name=$_POST['name'];
        echo '<h3>Library</h3>';
        echo '<p>'.htmlspecialchars($name).'</p>';
        mysqli_report(MYSQLI_REPORT_OFF);
        $link=mysqli_connect($hostname,$username,$pass,$dbname);
        if(!$link){exit("connect error");}
        $result=mysqli_query($link,"SELECT * FROM $tablename");
        if(!$result){exit("select error1");}
        if(mysqli_num_rows($result)<=0)
        {
            echo 'これから開催するイベントはまだ予定されていないようです。';
        }
        else
        {
            echo '<table border="1">';
            echo <<<EOT
            <tr>
                <td>No.</td><td>イベント</td><td>開催日程</td><td>開催時刻</td><td>開催場所</td><td>概要</td><td>予約</td>
            </tr>
EOT;
            while($row=mysqli_fetch_assoc($result))
            {
                $num=$row['num'];
                $event=$row['event'];
                $date=$row['date'];
                $time=$row['time'];
                $place=$row['place'];
                $remark=$row['remark'];
                echo <<<EOT
                <tr>
EOT;
                echo '<td>'.htmlspecialchars($num).'</td>';
                echo '<td>'.htmlspecialchars($event).'</td>';
                echo '<td>'.htmlspecialchars($date).'</td>';
                echo '<td>'.htmlspecialchars($time).'</td>';
                echo '<td>'.htmlspecialchars($place).'</td>';
                echo '<td>'.htmlspecialchars($remark).'</td>';
                echo <<<EOT
                <td>
                    <form method="post" action="event_user_reserveprocess.php">
EOT;
                echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
                echo '<input type="hidden" name="num" value="'.htmlspecialchars($num).'">';
                echo '<button type="submit" name="Btneventuserreservation" value="">予約する</button>';
                echo <<<EOT
                    </form>
                </td>
EOT;
            }
            echo '</table>';
        }
        mysqli_free_result($result);
        mysqli_close($link);
        echo '<form method="post" action="event_user_top.php">';
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo '<button type="submit" name="Backeventusertop" value="">イベントトップ画面に戻る</button>';
        echo '</form>';
        ?>
    </body>
</html>