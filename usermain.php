<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>ユーザマイページ</title>
    </head>
    <body>
        <h3>Library</h3>
<?php
        if(array_key_exists('userID',$_POST))
        {
            $userID=$_POST['userID'];
        }
        if(array_key_exists('password',$_POST))
        {
            $password=$_POST['password'];
        }
        if(array_key_exists('name',$_POST))
        {
            $name=$_POST['name'];
        }
        else
        {
            $hostname='127.0.0.1';
            $username='root';
            $pass='dbpass';
            $dbname='saisyuu';
            $tablename='usermanegement';
            $trans=0;
            $link=mysqli_connect($hostname,$username,$pass,$dbname);    
            if(!$link){exit("connect error!");}
            $result=mysqli_query($link,"select * from $tablename WHERE type='user'");
            if(!$result){exit("select error");}
            while($row=mysqli_fetch_assoc($result))
            {

                $userID_compare=$row['userID'];
                $pass_compare=hash("sha256",$row['salt'].$password);
                $name=$row['name'];
                if(($pass_compare===$row['password'])&&($userID===$userID_compare))
                {
                    mysqli_free_result($result);
                    mysqli_close($link);
                    $trans=1;
                    break;
                }
            }
            if($trans===0)
            {
                mysqli_free_result($result);
                mysqli_close($link);
                echo 'こちらのユーザ名またはパスワードは間違っているまたは図書館利用者のものではないと考えられます。';
                echo <<<EOT
                <form method="post" action="login.php">
                    <input type="hidden" name="auth" value="図書館利用者">
                    <input type="hidden" name="type" value="user" >
                    <button type="submit" name="login" value="">戻る</button>
                </form>
EOT;
                exit();
            }
        }
        echo '<p>'.htmlspecialchars($name).'</p>';
        echo '<p>こちらは図書館利用者専用です</p>';
        echo 'こんにちは'.htmlspecialchars($name).'さん';
        echo <<<EOT
        <form method="post" action="book_user_top.php">
EOT;
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
            <button type="submit" name="book" value="">図書</button>
        </form>
        <form method="post" action="event_user_top.php">
EOT;
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
            <button type="submit" name="event" value="">イベント</button>
        </form>
        <form method="post" action="login.php">
            <input type="hidden" name="auth" value="図書館利用者">
            <input type="hidden" name="type" value="user">
            <button type="submit" name="logout" value="">ログアウト</button>
        </form>
        <form method="post" action="withdrawal.php">
EOT;
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
            <button type="submit" name="withdraw" value="">退会</button>
        </form>
EOT;
?>
    </body>
</html>