<?php include "connect.php" ?>
<?php
if ($_POST) {
    if (isset($_FILES['image'])) {
        $tmp_name =  $_FILES['image']['tmp_name'];
        $locate_img = "../member_photo/";
        $new_name = $_POST["username"] . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($tmp_name, $locate_img . $new_name)) {
            $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $_POST["username"]);
            $stmt->bindParam(2, $_POST["password"]);
            $stmt->bindParam(3, $_POST["name"]);
            $stmt->bindParam(4, $_POST["address"]);
            $stmt->bindParam(5, $_POST["mobile"]);
            $stmt->bindParam(6, $_POST["email"]);
            $stmt->bindParam(7, $new_name);
            // $upload_dir = '../member_photo/';
            // $file_name = $_FILES["image"]["name"];
            // $temp_file = $_FILES["image"]["tmp_name"];
            // $target_file = $upload_dir . $_POST['username'] . '.jpg';
            $stmt->execute();
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
        }
    } else {
        echo "ไม่พบไฟล์ที่อัปโหลด";
    }
}          
?>
<html>
    <head><meta charset="UTF-8"></head>
    <body>
        เพิ่มสมาชิกใหม่สำเร็จ คือ <?=$_POST["username"]?>
    </body>
</html>
