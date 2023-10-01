<?php include "connect.php" ?>

<?php
if ($_POST) {
    if (isset($_FILES['image'])) {
        $tmp_name =  $_FILES['image']['tmp_name'];
        $locate_img = "../member_photo/";
        $new_name = $_POST["username"] . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (file_exists($tmp_name)) {
            if (move_uploaded_file($tmp_name, $locate_img . $new_name)) {
                // ทำงานเมื่ออัปโหลดไฟล์สำเร็จ
                $stmt = $pdo->prepare("UPDATE member SET password=?, name=?, address=?, mobile=?, email=?, image=? WHERE username=?");
                // $stmt->bindParam(1, $_POST["username"]);
                $stmt->bindParam(1, $_POST["password"]);
                $stmt->bindParam(2, $_POST["name"]);
                $stmt->bindParam(3, $_POST["address"]);
                $stmt->bindParam(4, $_POST["mobile"]);
                $stmt->bindParam(5, $_POST["email"]);
                $stmt->bindParam(6, $new_name); 
                $stmt->bindParam(7, $_POST["username"]);
                if ($stmt->execute()) {
                    echo "แก้ไข " . $_POST["name"] . " สำเร็จ";
                } else {
                    echo "ผิดพลาดในการแก้ไขข้อมูล";
                }
            } else {
                echo "ผิดพลาดในการอัปโหลด";
            }
        } else {
            echo "ไม่พบไฟล์";
        }
    } else {
        echo "ไม่พบไฟล์ที่อัปโหลด";
    }
    
}
?>
