<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8"/>
      <title>登録確認</title>
   </head>
   <body>
       <h3>Library</h3>
       <?php
       $type=$_POST['type'];
       $name=$_POST['name'];
       $phonenum=$_POST['phonenum'];
       $address=$_POST['address'];
       $mail=$_POST['mail'];
       $userID=$_POST['userID'];
       $password=$_POST['password'];
       $password_check=$_POST['password_check'];
       if(($password!=$password_check)||
          ($name==null)||(strlen($name)==0)||
          ($phonenum==null)||(strlen($phonenum)==0)||
          ($address==null)||(strlen($address)==0)||
          (strlen($userID)<6)||
          (strlen($password)<8))
       {
           echo_register_error($type,$name,$phonenum,$address,$mail,$userID,$password,$password_check);
           exit();
       }
       else
       {
           echo_register_check($type,$name,$phonenum,$address,$mail,$userID,$password,$password_check);
           exit();
       }
       function echo_register_error($type,$name,$phonenum,$address,$mail,$userID,$password,$password_check)
       {
           echo <<<EOT
           <p>入力内容または入力形式が不正です。もう一度確認してください</p>
           <form action="register.php" method="post">
               <button type="submit" name="BtnregisterBack" value="">戻る</button>
           </form>
EOT;
       }
       function echo_register_check($type,$name,$phonenum,$address,$mail,$userID,$password,$password_check)
       {
           echo <<<EOT
           <p>入力内容</p>
EOT;
           echo '<p>属性:'.htmlspecialchars($type).'</p>';
           echo '<p>名前:'.htmlspecialchars($name).'</p>';
           echo '<p>電話番号:'.htmlspecialchars($phonenum).'</p>';
           echo '<p>住所:'.htmlspecialchars($address).'</p>';
           echo '<p>メールアドレス'.htmlspecialchars($mail).'</p>';
           echo '<p>ユーザID:'.htmlspecialchars($userID).'</p>';
           echo '<p>パスワード:(あなたが設定したパスワード)</p>';
           echo '<form action="register_completion.php" method="post">';
           echo '<input type="hidden" name="type" value="'.$type.'">';
           echo '<input type="hidden" name="name" value="'.$name.'">';
           echo '<input type="hidden" name="phonenum" value="'.$phonenum.'">';
           echo '<input type="hidden" name="address" value="'.$address.'">';
           echo '<input type="hidden" name="mail" value="'.$mail.'">';
           echo '<input type="hidden" name="userID" value="'.$userID.'">';
           echo '<input type="hidden" name="password" value="'.$password.'">';
           echo '<button type="submit" name="Btnregister_completion" value="">登録</button>';
           echo '</form>';
           echo '<form action="register.php" method="post">';
           echo '<button type="submit" name="Btnregister" >修正する</button>';
           echo '</form>';
       }
       ?>
   </body>
</html>