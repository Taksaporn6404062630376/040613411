<html>
    <body>
        <?php

            $pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM product");

            $stmt->execute();

            while ($row = $stmt->fetch()) {
                echo "<pre>";
                print_r($row);
                echo "</pre>";
            }
        ?>

    </body>
</html>