<?php
    echo <<<EOT
    <!DOCTYPE html>
    <html>
       <head>
           <meta charset="UTF-8"/>
           <title>新規登録完了</title>
       <head>
       <body>
EOT;
           $type=$_POST['type'];
           $name=$_POST['name'];
           $phonenum=$_POST['phonenum'];
           $address=$_POST['address'];
           $mail=$_POST['mail'];
           $userID=$_POST['userID'];
           $password=$_POST['password'];
           $hostname='127.0.0.1';
           $username='root';
           $pass='dbpass';
           $dbname='saisyuu';
           $tablename='Usermanagement';
           mysqli_report(MYSQLI_REPORT_OFF);
           echo <<<EOT
           <h3>図書館マイページ</h3>
EOT;
           $salt=bin2hex(random_bytes(16));
           $password=$salt.$password;
           $password=hash("sha256",$password);
           $link=mysqli_connect($hostname,$username,$pass,$dbname);
           if(!$link){exit("障害が起きました。時間をおいてからアクセスしてください");}
           $result=mysqli_query($link,"INSERT INTO $tablename SET type='$type',name='$name',phonenum='$phonenum',address='$address',userID='$userID',password='$password',salt='$salt'");
           if(!$result){
              $error=mysqli_error($link);
              exit($error);
           }
           mysqli_close($link);
           echo <<<EOT
           <p>登録を完了しました</p>
           <form action="main.php" method="post">
               <button type="submit" name="Btnmain" value="">メインへ戻る</button>
           </form>
       </body>
EOT;
?>