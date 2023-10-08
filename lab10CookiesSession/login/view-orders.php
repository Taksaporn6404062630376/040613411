<?php
include "connect.php";
session_start();

if (!isset($_GET["username"])) {
    echo "ไม่มีข้อมูลผู้ใช้ที่ระบุ";

} 
else {
    $username = $_GET["username"];
    $orderQuery = $pdo->prepare("SELECT * FROM product
    JOIN item ON item.pid=product.pid
    JOIN orders ON item.ord_id=orders.ord_id
    JOIN member ON orders.username=member.username WHERE member.username = ?");
    $orderQuery->bindParam(1, $username);
    $orderQuery->execute();

    echo "<a href='admin-home.php'>กลับสู่หน้าหลักของ Admin</a>";
    echo "<h3>รายการคำสั่งซื้อของลูกค้า: {$username}</h3>";
    echo "<ul>";

    $currentOrderID = null;
    while ($orderRow = $orderQuery->fetch()) {
        if ($currentOrderID !== $orderRow["ord_id"]) {
            if ($currentOrderID !== null) {
                echo "<hr>";
            }
            echo "<li>Order ID: {$orderRow['ord_id']}</li>";
            echo "<li>Order Date: {$orderRow['ord_date']}</li>";
            $currentOrderID = $orderRow['ord_id'];
            
        }
        echo "<ul>";
        echo "<li>Product ID: {$orderRow['pid']}";
        echo "  Quantity: {$orderRow['quantity']}</li>";
        echo "</ul>";
    }
    echo "</ul>";
}echo "<hr>";
?>
