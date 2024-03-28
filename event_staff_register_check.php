<html>
    <head>
        <meta charset="UTF-8"/>
        <title>イベント新規追加</title>
    </head>
    <body>
        <h3>Library</h3>
        <?php
              $name=$_POST['name'];
              $event=$_POST['event'];
              $date=$_POST['date'];
              $time=$_POST['time'];
              $place=$_POST['place'];
              $remark=$_POST['remark'];
              echo '<p>'.htmlspecialchars($name).'</p>';
              echo '<p>以下の内容で登録してもよろしいですか</p>';
              echo '<p>イベント名:'.htmlspecialchars($event).'</p>';
              echo '<p>開催日程:'.htmlspecialchars($date).'</p>';
              echo '<p>開催時刻:'.htmlspecialchars($time).'</p>';
              echo '<p>開催場所:'.htmlspecialchars($place).'</p>';
              echo '<p>概要:'.htmlspecialchars($remark).'</p>';
              echo <<<EOT
                <form method="post" action="event_staff_register_completion.php">
EOT; 
              echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';                   
              echo '<input type="hidden" name="event" value="'.htmlspecialchars($event).'">';
              echo '<input type="hidden" name="date" value="'.htmlspecialchars($date).'">';
              echo '<input type="hidden" name="time" value="'.htmlspecialchars($time).'">';
              echo '<input type="hidden" name="place" value="'.htmlspecialchars($place).'">';
              echo '<input type="hidden" name="remark" value="'.htmlspecialchars($remark).'">';
              echo '<button type="submit" name="Btneventstaffregistercomp" value="">登録</button>';
              echo <<<EOT
                </form>
                <form method="post" action="event_staff_register.php">
EOT;
              echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
              echo <<<EOT
                    <button type="submit" name="Btneventstaffregister" value="">修正</button>
                </form>
EOT;
        ?>
</html>