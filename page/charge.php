<?php
include("db_connect.php");



if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    
    $sql = "    SELECT qty from products where product_id = $id limit 1";
    $result = mysqli_query($connection, $sql);
    if (mysqli_errno($connection) > 0) {
        die(mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    $product_qty = $row["qty"];
    $totalQty = $product_qty - $qty;

    $sqll = "UPDATE products SET qty='$totalQty' WHERE product_id=$id LIMIT 1";
	mysqli_query($connection, $sqll);
	if (mysqli_errno($connection) > 0) {
		die(mysqli_error($connection));
	}

    echo "payment successed";

    // header('location: index.php');
}

?>