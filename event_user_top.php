<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>ユーザイベント画面</title>
    </head>
    <body>
    <h3>図書館マイページ</h3>
    <?php
    $name=$_POST['name'];
    echo '<p>'.htmlspecialchars($name).'</p>';
    echo '<form method="post" action="event_user_check.php">';
    echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
    echo <<<EOT
        <button type="submit" name="Btneventusercheck" value="">イベントを確認する</button>
    </form>
    <br>
EOT;
    echo '<form method="post" action="event_user_reserve.php">';
    echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
    echo <<<EOT
        <button type="submit" name="Btneventuserreserve" value="">イベントを予約する</button>
    </form>
EOT;
    echo '<form method="post" action="usermain.php">';
    echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
    echo <<<EOT
        <button type="submit" name="Btnusermain" value="">メインへ戻る</button>
    </body>
</html>
EOT;
    ?>
 