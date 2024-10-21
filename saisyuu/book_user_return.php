<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>利用者図書返却</title>
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
        if(array_key_exists('returnprocess',$_POST))
        {
            $book=$_POST['book'];
            $result=mysqli_query($link,"UPDATE $tablename SET condi='in_stock',user=NULL,lendday=NULL,returndueday=NULL WHERE (book='$book')AND(user='$name')");
            if(!$result){exit(mysqli_error($link));}
        }
        $result=mysqli_query($link,"SELECT * FROM $tablename where user='$name'");
        if(!$result){exit("select error!");}
        if(mysqli_num_rows($result)<=0)
        {
            echo '今あなたが貸出中の本はありません';
        }
        else
        {
            echo '<table border="1">';
            echo <<<EOT
            <tr>
                <td>No.</td><td>タイトル</td><td>返却</td>
            </tr>
EOT;
            $i=1;
            while($row=mysqli_fetch_assoc($result))
            {
                 $book=$row['book'];
                 echo <<<EOT
                 <tr>
EOT;
                   echo '<td>'.htmlspecialchars($i).'</td>';
                   echo '<td>'.htmlspecialchars($book).'</td>';
                   echo <<<EOT
                   <td>
                     <form method="post" action="book_user_return.php">
EOT;
                   echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
                   echo '<input type="hidden" name="book" value="'.htmlspecialchars($book).'">';
                   echo <<<EOT
                         <button type="submit" name="returnprocess" value="">返却</button>
                     </form>
                   </td>
                   </tr>
EOT; 
                   $i++;
            }
        }
        mysqli_free_result($result);
        mysqli_close($link);
        echo <<<EOT
        <form method="post" action="book_user_top.php">
EOT;
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
            <button type="submit" name="Backusermain" value="">図書トップページに戻る</button>
        </form>
EOT;
?>
        
    </body>
</html>