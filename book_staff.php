<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>スタッフ専用図書画面</title>
    </head>
    <body>
        <h3>Library</h3>
<?php
         
         $hostname='127.0.0.1';
         $username='root';
         $pass='dbpass';
         $dbname='saisyuu';
         $tablename='bookmanegement';
         $name=$_POST['name'];
         echo '<p>'.htmlspecialchars($name).'</p>';
         mysqli_report(MYSQLI_REPORT_OFF);
         $link=mysqli_connect($hostname,$username,$pass,$dbname);
         if(!$link){exit("connect error");}
         if(array_key_exists('add_title',$_POST))
         {
             $add_title=$_POST['add_title'];
             $result=mysqli_query($link,"INSERT INTO $tablename SET book='$add_title',condi='in_stock'");
             if(!$result){exit("insert error");}
         }
         if(array_key_exists('delete',$_POST))
         {
             $delete=$_POST['delete'];
             $delete_num=$_POST['delete_num'];
             $result=mysqli_query($link,"DELETE FROM $tablename where num='$delete_num'");
             if(!$result){exit("delete error");}
         }
         $result=mysqli_query($link,"SELECT * FROM $tablename");
         if(!$result){exit("select error");}
         if(mysqli_num_rows($result)<=0)
         {
             echo '今登録されているデータベースがありません';
         }
         else
         {
             
             echo '<table border="1">';
             echo <<<EOT
             <tr>
                 <td>No.</td><td>タイトル</td><td>貸出状況</td><td>貸出者</td><td>貸出日</td><td>返却期日</td><td></td>
             </tr>
EOT;
             while($row=mysqli_fetch_assoc($result))
             {
                 $num=$row['num'];
                 $book=$row['book'];
                 $condi=$row['condi'];
                 $user=$row['user'];
                 $lendday=$row['lendday'];
                 $returndueday=$row['returndueday'];
                 echo <<<EOT
                 <tr>
EOT;
                 echo '<td>'.htmlspecialchars($num).'</td>';
                 echo '<td>'.htmlspecialchars($book).'</td>';
                 echo '<td>'.htmlspecialchars($condi).'</td>';
                 echo '<td>'.htmlspecialchars($user).'</td>';
                 echo '<td>'.htmlspecialchars($lendday).'</td>';
                 echo '<td>'.htmlspecialchars($returndueday).'</td>';
                 echo <<<EOT
                 <td>
                     <form method="post" action="book_staff.php">
EOT;
                 echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
                 echo '<input type="hidden" name="delete_num" value="'.htmlspecialchars($num).'">';
                 echo <<<EOT
                         <button type="submit" name="delete" value="">削除</button>
                     </form>
                 </td>
                 </tr>
EOT;
             }
             echo '</table>';
             
         }
         mysqli_free_result($result);
         mysqli_close($link);
         echo <<<EOT
             <br>
             <form method="post" action="book_staff.php">
                 図書 タイトル<input type="text" name="add_title" value="">
EOT;
            echo '<input type="hidden" name="name" value='.htmlspecialchars($name).'>';
            echo <<<EOT
                 <button type="submit" name="add" value="">図書の追加</button>
             </form>
             <br>
             <form method="post" action="staffmain.php">
EOT;
             echo '<input type="hidden" name="name" value='.htmlspecialchars($name).'>';
             echo <<<EOT
                 <button type="submit" name="Btnstaffmain" value="">戻る</button>
             </form>
EOT;
?>
    </body>
</html>