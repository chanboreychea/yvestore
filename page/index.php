<?php include("db_connect.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Hand</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="..\css\style.css">

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

    <div class="wrapper-index">
        <div class="slider"></div>

        <div class="content">
            <div class="categorie">
                <div class="categorie-name"><a href="#">T-shirt</a></div>
                <div class="categorie-line"></div>
            </div>
            <div class="product-wrapper">
                <?php
                $sql = 'SELECT product_id, product_name,image_front, price, categorie_id FROM products';
                $result = $connection->query($sql);
                while ($row = $result->fetch_assoc()) { ?>

                    <div class="product">
                        <div class="box">
                            <a href="../page/payment/subindex.php?product_id=<?php echo $row['product_id']?>"><img src="..\image\<?php echo $row['image_front'] ?>" alt=""></a>
                            <div class="box-detail">
                                <a href="#">Quick View</a>
                            </div>
                        </div>
                        <div class="product-name"><a href="../page/subindex.php?product_id=<?php echo $row['product_id']?>"><?php echo $row['product_name'] ?></a></div>
                        <div class="product-price"><?php echo $row['price'] ?><span> $ </span></div>
                    </div>

                <?php
                }
                ?>
            </div>

        </div>


    </div>

    <div class="footer">
        <a href="/">© 2023 cheachanborey</a>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>