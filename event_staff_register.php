<html>
    <head>
        <meta charset="UTF-8"/>
        <title>イベント登録画面</title>
    </head>
    <body>
        <h3>Library</h3>
        <?php
           $name=$_POST['name'];
           echo '<p>'.htmlspecialchars($name).'</p>';
        ?>
        <form method="post" action="event_staff_register_check.php">
            <p>イベント名:<input type="text" name="event"></p>
            <p>開催日程:<input type="date" name="date"></p>
            <p>開催時刻:<input type="time" name="time"></p>
            <p>開催場所:<input type="text" name="place"></p>
            <p>概要:<input type="text" name="remark"></p>
            <?php
            echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
            ?>
            <button type="submit" name="register" value="">登録</button>
        </form>
        <form method="post" action="event_staff.php">
            <?php
            echo '<input type="hidden" name="name" value="'.htmlspecialchars($name).'">';
            ?>
            <button type="submit" name="Btneventstaff" value="">キャンセル</button>
        </form>
    <body>
</html>