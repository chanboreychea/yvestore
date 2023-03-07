<?php

include("db_connect.php");

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT product_name, price, image_front, image_back from products where product_id = $product_id limit 1";

    $result = mysqli_query($connection, $sql);
    if (mysqli_errno($connection) > 0) {
        die(mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    $product_name = $row["product_name"];
    $image_front = $row["image_front"];
    $image_back = $row["image_back"];
    $price = $row["price"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <div class="blank"></div>
        <div class="logo">
            <div class="box-logo">
                <img src="../image/headerlogo.jpg">
            </div>
        </div>
        <div class="cart"></div>
    </div>
    <div class="nav">
        <div class="nav-hamburger">
            <i class="uil uil-bars"></i>
        </div>
        <div class="nav-menu">
            <div class="menu-list"><a href="../page/index.php">home</a></div>
            <div class="menu-list"><a href="#">New arriaval</a></div>
            <div class="menu-list"><a href="#">product</a></div>
            <div class="menu-list"><a href="#">about Us</a></div>
            <div class="menu-list"><a href="#">contact Us</a></div>
        </div>
        <div class="nav-search">
            <i class="uil uil-search"></i>
        </div>
    </div>
    <br>
    <div class="wrapper-index">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="product-sub">
                        <div class="box-sub">
                            <img src="..\image\<?php echo $image_front ?>" alt="">
                        </div>
                        <br>
                        <div class="box-sub">
                            <img src="..\image\<?php echo $image_back ?>" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <div class="product-sub">
                            <div class="product-name-sub"><?php echo $product_name ?></a></div>
                            <input type="hidden" id="price" value="<?php echo $price ?>">
                            <div class="product-price-sub"> <?php echo $price ?> <span> $ </span></div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">Quantity :</div>
                            <div class="col-sm">
                                <input class="form-control" type="number" id="num" onkeyup="myFunction()" min="1" max="5" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm">Amount :</div>
                            <div class="col-sm">
                                <div id="amountt"></div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="form-group">
                        <form action="charge.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product_id ?>">
                            <input type="hidden" name="qty" value="0">
                            <input type="hidden" name="amount" value="0">
                            <input type="submit" name="submit" value="Pay Now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>