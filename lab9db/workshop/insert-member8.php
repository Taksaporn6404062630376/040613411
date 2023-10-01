<?php include "connect.php" ?>

<?php
if ($_POST) {
    if (isset($_FILES['image'])) {
        $tmp_name =  $_FILES['image']['tmp_name'];
        $locate_img = "../member_photo/";

        // สร้างชื่อไฟล์ใหม่ที่เป็น username และรวมนามสกุลไฟล์
        $new_name = $_POST["username"] . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        // บันทึกไฟล์รูปภาพ
        if (move_uploaded_file($tmp_name, $locate_img . $new_name)) {
            // เมื่ออัปโหลดไฟล์สำเร็จแล้วให้ทำการ INSERT ข้อมูลลงในฐานข้อมูล
            $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $_POST["username"]);
            $stmt->bindParam(2, $_POST["password"]);
            $stmt->bindParam(3, $_POST["name"]);
            $stmt->bindParam(4, $_POST["address"]);
            $stmt->bindParam(5, $_POST["mobile"]);
            $stmt->bindParam(6, $_POST["email"]);
            $stmt->bindParam(7, $new_name); // ใส่ที่นี่
            $stmt->execute();

            $username = $_POST["username"];
            header("location: workshop8detail.php?username=" . $username);
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
        }
    } else {
        echo "ไม่พบไฟล์ที่อัปโหลด";
    }
}
?>
