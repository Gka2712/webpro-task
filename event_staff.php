<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>図書館スタッフ専用イベント画面</title>
    </head>
    <body>
        <h3>Library</h3>
    <?php
       $hostname='127.0.0.1';
       $username='root';
       $pass='dbpass';
       $dbname='saisyuu';
       $tablename='eventmanegement';
       $name=$_POST['name']; 
       echo '<p>'.htmlspecialchars($name).'</p>';
       mysqli_report(MYSQLI_REPORT_OFF);
       $link=mysqli_connect($hostname,$username,$pass,$dbname);
       if(!$link){exit("connect error");}
       if(array_key_exists('delete',$_POST))
       {
           $delete_num=$_POST['delete_num'];
           $result=mysqli_query($link,"DELETE FROM $tablename where num='$delete_num'");
           if(!$result){exit("delete error");}

       }
       $result=mysqli_query($link,"SELECT * FROM $tablename");
       if(mysqli_num_rows($result)<=0)
       {
           echo '今登録されているデータベースがありません。';
       }
       else
       {
           echo '<table border="1">';
           echo <<<EOT
           <tr>
                <td>No.</td><td>イベント</td><td>開催日程</td><td>開催時刻</td><td>開催場所</td><td>概要</td><td>参加状況</td><td></td>
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
                    <form method="post" action="eventcondi_check.php">
EOT;
                echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
                echo '<input type="hidden" name="num" value="'.htmlspecialchars($num).'">';
                echo <<<EOT
                    <button type="submit" name="Btneventcondicheck" value="">状況確認</button>
                    </form>     
                </td>
                <td>
                    <form method="post" action="event_staff.php">
EOT;
                echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
                echo '<input type="hidden" name="delete_num" value="'.htmlspecialchars($num).'">'; 
                echo '<button type="submit" name="delete" value="">削除</button>';
                echo <<<EOT
                    </form>
                </td>
                </tr>
EOT;
           }
           echo '</table>';
       }
       mysqli_free_result($result);
       mysqli_close($link);
       echo '<form method="post" action="event_staff_register.php">';
       echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
       echo '<button type="submit" name="Btneventstaffregister" value="">登録</button>';
       echo '</form>';
       echo '<br>';
       echo '<form method="post" action="staffmain.php">';
       echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
       echo '<button type="submit" name="Btnstaffmain" value="">戻る</button>';
       echo '</form>';

    ?>
    </body>

</html>