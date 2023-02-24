<?php
session_start();
include_once 'db.php';
$name = "";
$address = "";
$mobile_number = "";
$id = 0;
$edit_state = false;

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $mobile_number = $_POST['mobile_number'];

 $sql = "INSERT INTO data (product_name,qty,price) VALUES ('$name','$address','$mobile_number')";
 if (mysqli_query($conn, $sql)) { 
   $_SESSION['message'] = "Data Saved Successfully";
    header("Location: index.php");
   } else {
    mysqli_close($conn);
   }
   
}

// For updating records

if (isset($_POST['update'])) {
  $id = $_POST['product_id'];
  $name = $_POST['product_name'];
  $address = $_POST['qty'];
  $mobile_number = $_POST['price'];

  mysqli_query($conn, "UPDATE data SET product_name='$name', qty='$address', price='$mobile_number' WHERE id=$id");
  $_SESSION['message'] = "Data Updated Successfully";
  header('location: index.php');
}

// For deleteing records

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM products WHERE id=$id");
  $_SESSION['message'] = "Data Deleted Successfully";
  header('location:index.php');
}
?>