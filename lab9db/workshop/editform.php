<?php include "connect.php" ?>
<?php

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <form action="edit-product.php" method="post" enctype="multipart/form-data">
<form action="edit-product.php" method="post" >
    <input type="hidden" name="username" value="<?=$row["username"]?>">
    password: <input type="password" name="password" value="<?=$row ["password"]?>"><br>
    ชื่อสมาชิก: <input type="text" name="name" value="<?=$row ["name"]?>"><br>
    ที่อยู่: <br><input type="text" name="address" value="<?=$row["address"]?>"></input><br>
    เบอร์โทร: <input type="text" name="mobile" value="<?=$row ["mobile"]?>"><br>
    อีเมล์: <input type="text" name="email" value=" <?=$row ["email"]?>"><br>
    อัปโหลดรูปภาพ: <input type="file" name="image"  accept=".jpg" value="<?=$row["username"]?>.jpg' width='200'>"><br>
    <input type="submit" value="แก้ไข">
</form>
</body>
</html>