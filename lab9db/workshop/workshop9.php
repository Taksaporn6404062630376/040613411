<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
<?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
    while ($row = $stmt->fetch()) {
    echo " username: " . $row ["username"] . "<br>";
    echo " ชื่อสมาชิก: " . $row ["name"] . "<br>";
    echo "ที่อยู่: " . $row ["address"] . "<br>";
    echo "เบอร์โทร: " . $row ["mobile"] . "<br>";
    echo "อีเมล์: " . $row ["email"] . " <br>";
    echo "image: " . $row ["image"] . " <br>";
    echo "<a href='editform.php?username=" . $row ["username"] . "'>แก้ไข</a>";
    echo "<hr>\n";
}
?>
</body>
</html>