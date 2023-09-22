<?php include "connect.php" ?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();

            while ($row = $stmt->fetch()) :
        ?>
        รหัสสินค้า: <?=$row ["pid"]?><br>
        ชื่อสินค้า: <?=$row ["pname"]?><br>
        รายละเอียดสินค้า: <?=$row ["pdetail"]?><br>
        ราคา: <?=$row ["price"]?> บาท<br><hr>
        <?php endwhile ?>
    </body>
</html>