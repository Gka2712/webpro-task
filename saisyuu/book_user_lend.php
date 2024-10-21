<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>利用者図書貸出</title>
    </head>
    <body>
        <h3>Library</h3>
<?php
        $name=$_POST['name'];
        $hostname='127.0.0.1';
        $username='root';
        $pass='dbpass';
        $dbname='saisyuu';
        $tablename='Bookmanagement';
        echo '<p>'.htmlspecialchars($name).'</p>';
        mysqli_report(MYSQLI_REPORT_OFF);
        $link=mysqli_connect($hostname,$username,$pass,$dbname);
        if(!$link){exit("connect error!");}
        $result=mysqli_query($link,"SELECT * FROM $tablename");
        if(!$result){exit("select error!");}
        if(mysqli_num_rows($result)<=0)
        {
           echo '今この図書館には本が置かれていないようです。<br>しばらくお待ちください';
        }
        else
        {
            echo '<table border="1">';
            echo <<<EOT
            <tr>
                <td>No.</td><td>タイトル</td><td>貸出状況</td><td>貸出可否</td>
            </tr>
EOT;
            while($row=mysqli_fetch_assoc($result))
            {
                $num=$row['num'];
                $book=$row['book'];
                $condi=$row['condi'];
                echo <<<EOT
                <tr>
EOT;
                echo '<td>'.htmlspecialchars($num).'</td>';
                echo '<td>'.htmlspecialchars($book).'</td>';
                echo '<td>'.htmlspecialchars($condi).'</td>';
                echo <<<EOT
                <td>
                    <form method="post" action="book_user_register.php">
EOT;
                echo '<input type="hidden" name="num" value="'.htmlspecialchars($num).'">';
                echo '<input type="hidden" name="book"value="'.htmlspecialchars($book).'">';
                echo '<input type="hidden" name="name" value='.htmlspecialchars($name).'>';
                if($condi==='in_stock')
                {
                    echo '<p align="center"><button type="submit" name="register" value="">貸出</button></p>';
                }
                else
                {
                    echo '貸出不可';
                }        
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
        echo <<<EOT
        <form method="post" action="book_user_top.php">
EOT;
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
        <button type="submit" name="BtnBackusermain" value="">メイン画面に戻る</button>
        </form>
EOT;
?>
  
    </body>
</html>