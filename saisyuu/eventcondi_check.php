<html>
    <head>
        <meta charset="UTF-8"/>
        <title>イベント状況</title>
    </head>
    <body>
        <h3>Library</h3>
    <?php
         $hostname='127.0.0.1';
         $username='root';
         $pass='dbpass';
         $dbname='saisyuu';
         $tablename='Eventreservation';
         $name=$_POST['name'];
         $event_num=$_POST['num'];
         echo '<p>'.htmlspecialchars($name).'</p>';
         mysqli_report(MYSQLI_REPORT_OFF);
         $link=mysqli_connect($hostname,$username,$pass,$dbname);
         if(!$link){exit("connect error");};
         $result=mysqli_query($link,"select * from $tablename WHERE (event_num=$event_num)");
         if(!$result){exit(mysqli_error($link));}
         if(mysqli_num_rows($result)<=0)
         {
             echo 'イベント参加者がいないようです。';
         }
         else
         {
            echo '<table border="1">';
            echo <<<EOT
            <tr>
                <td>No.</td><td>参加者</td>
            </tr>
EOT;
            $part_num=0;
            while($row=mysqli_fetch_assoc($result))
            {
                 $part_num++;
                 $part_name=$row['name'];
                 echo '<tr>';
                 echo '<td>'.htmlspecialchars($part_num).'</td>';
                 echo '<td>'.htmlspecialchars($part_name).'</td>';
                 echo '</tr>';
            }
            echo '</table>';
         }
         echo '<form method="post" action="event_staff.php">';
         echo '<input type="hidden" name="name" value='.htmlspecialchars($name).'>';
         echo '<button type="submit" name="Btneventstaff"value="">戻る</button>';
         echo '</form>';
    ?>
    </body>
</html>