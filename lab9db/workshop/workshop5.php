<?php include "connect.php" ?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
    <div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()) : ?>
        <div style="padding: 15px; text-align: center">
            <a href="workshop5detail.php?username=<?=$row["username"]?>">
                <img src='../member_photo/<?=$row["username"]?>.jpg' width='100'>
            </a><br>
            ชื่อสมาชิก: <?=$row ["name"]?><br>
            ที่อยู่: <?=$row ["address"]?><br>
            เบอร์โทร: <?=$row ["mobile"]?><br>
            อีเมล์: <?=$row ["email"]?><br>
        </div>
        <?php endwhile ?>
    </div>
    </body>
</html>