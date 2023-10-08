<html>
    <body>
        <?php
        //setcookie ถ้ายังไม่มีค่า lang
        if($_COOKIE["lang"]=="en"){
           echo "Welcome";
        }
        else if($_COOKIE["lang"]=="th"){
            echo "ยินดีต้อนรับครับผม";
        }
        ?>
    </body>
</html>
          