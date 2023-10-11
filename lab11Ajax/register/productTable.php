<?php
    $keyword = $_GET["keyword"];
    $conn = mysqli_connect("localhost", "root", "", "blueshop");
    $sql = "SELECT * FROM product WHERE pname LIKE '%$keyword%'";
    $objQuery = mysqli_query($conn,$sql);
?>

<table border="1">
<?php while($row = mysqli_fetch_array($objQuery)): ?>
    <tr>
    <td><a href="productDetail.php?pid=<?php echo $row["pid"]?>"><?php echo
    $row["pname"]?></a></td>
    <td><?php echo $row["pdetail"]?></td>
    <td><img src="productimg/<?php echo $row["pid"] ?>.jpg" width="100"></td>
    <td><?php echo $row["price"]?> บาท</td>
    <!-- <td><a href="cart.php?productId=<//?php echo $row["pid"]?>&action=add">สั่งซื้อ</a> -->
  <td>  <form method="post" action="cart.php?action=add&pid=<?=$row["pid"]?>&pname=<?=$row["pname"]?>&price=<?=$row["price"]?>">
				<input type="number" name="qty" value="1" min="1" max="9">
				<input type="submit" value="ซื้อ">
	</form></td>
    </tr>
<?php endwhile; ?>
</table>
