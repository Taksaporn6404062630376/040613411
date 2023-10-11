<?php
    $keyword = $_GET["keyword"];
    $conn = mysqli_connect("localhost", "root", "", "blueshop");
    // if ($conn) {
    //     mysqli_select_db("blueshop");
    //     mysqli_query("SET NAMES utf8");
    // } else {
    //     echo mysql_errno();
    // }
    $sql = "SELECT * FROM member WHERE username LIKE '%$keyword%'";
    $objQuery = mysqli_query($conn,$sql);
?>

<table border="1">
<?php while($row = mysqli_fetch_array($objQuery)): ?>
    <tr>
    <td><a href="memberDetail.php?username=<?php echo $row["username"]?>"><?php echo $row["username"]?></a></td>
    <td><?php echo $row["address"]?></td>
    <td><img src="member_photo/<?php echo $row["name"] ?>.jpg" width="100"></td>
    <td><?php echo $row["name"]?></td>
    </tr>
<?php endwhile; ?>
</table>
