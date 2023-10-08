<?php
include "connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
    exit; // Add exit to stop further execution
}
?>

<html>
<head>
    <meta charset="utf-8">
</head>

<body>
<?php
$username = $_SESSION["username"];
$stmt = $pdo->prepare("SELECT 
    orders.ord_id, orders.ord_date, pname, item.quantity, price*quantity as price FROM product
    JOIN item ON item.pid=product.pid
    JOIN orders ON item.ord_id=orders.ord_id
    JOIN member ON orders.username=member.username
    WHERE member.username = '$username'");
$stmt->execute();

$currentOrderID = null;

while ($row = $stmt->fetch()) {
    
    if ($currentOrderID !== $row["ord_id"]) {
        // order info if it's a new order
        if ($currentOrderID !== null) {
            echo "<hr>\n";
        }
        echo "หมายเลขคำสั่งซื้อ: " . $row["ord_id"] . "<br>";
        echo "วันที่สั่งซื้อ: " . $row["ord_date"] . "<br>";
        
        $currentOrderID = $row["ord_id"];
    }
    //product info
    echo "<li>" . $row["pname"] . " จำนวน: " . $row["quantity"] . " ชิ้น  ราคา: " . $row["price"] . " บาท </li>";
}

echo "</ul>";
echo "<hr>\n";
if (!$currentOrderID) {
    echo "ไม่มีข้อมูลคำสั่งซื้อ";
}
?>

</body>
</html>
