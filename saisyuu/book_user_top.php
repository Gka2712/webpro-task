<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>利用者専用図書画面</title>
    </head>
    <body>
        <h3>Library</h3>
        <?php
        $name=$_POST['name'];
        echo '<p>'.htmlspecialchars($name).'</p>';
        echo '<form method="post" action="book_user_lend.php">';
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
            <button type="submit" name="lendbook" value="">本を貸出する</button>
        </form>
EOT;
        echo '<form method="post" action="book_user_return.php">';
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
            <button type="submit" name="returnbook" value="">本を返却する</button>
        </form>
        <form method="post" action="usermain.php">
            <button type="submit" name="BtnMain">メインに戻る</button>
EOT;
        echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
        echo <<<EOT
        </form>
    </body>
</html>
EOT;
?>