<?php
include("db_connect.php");
error_reporting(0);


//edit


//delete
if (isset($_POST["remove"])) {
	$product_id = $_POST['remove'];
	try {
		$queryimg = "SELECT image_front, image_back from products where product_id = $product_id limit 1";
		$result = $connection->query($queryimg);
		$row = $result->fetch_assoc();
		unlink('../image/' . $row['image_front']);
		unlink('../image/' . $row['image_back']);
		$sql = "DELETE FROM products where product_id = $product_id";
		mysqli_query($connection, $sql);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}
// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$product_name = $_POST['product_name'];
	//mysqli_real_escape_string = use to escape single/double quote when user input
	$product_name = mysqli_real_escape_string($connection, $product_name);
	$qty = $_POST['qty'];
	$price = $_POST['price'];

	// $image_front
	$tempname = $_FILES["image_front"]["tmp_name"];
	$extension = explode('.', $_FILES["image_front"]["name"]);
	$extension = end($extension);
	$image_front = "../image/" . time() . '_' . md5(rand()) . '.' . $extension;

	// $image_back
	$tempnamee = $_FILES["image_back"]["tmp_name"];
	$extensionn = explode('.', $_FILES["image_back"]["name"]);
	$extensionn = end($extensionn);
	$image_back = "../image/" . time() . '_' . md5(rand()) . '.' . $extensionn;

	$categorie = $_POST['categorie'];

	// Get all the submitted data from the form
	$sql = "INSERT INTO products (product_name, qty, price,image_front, image_back, categorie_id) VALUES ('$product_name','$qty','$price','$image_front','$image_back','$categorie')";

	// Execute query
	mysqli_query($connection, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $image_front)) {
		if (move_uploaded_file($tempnamee, $image_back)) {
			$alert = "<h3> uploaded successfully!</h3>";
		} else {
			$alert = "<h3> Failed to upload!</h3>";
		}
	} else {
		$alert = "<h3> Failed to upload!</h3>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="../js/script.js"></script>
	<link rel="stylesheet" href="../css/insert.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		.btn-success.active {
			display: none;
		}

		.btn-secondary {
			display: none;
		}

		.btn-secondary.active {
			display: block;
		}
	</style>

</head>

<body>
	<div class="header">
		<div class="blank"></div>
		<div class="logo">
			<div class="box-logo">
				<img src="../image/photo_2022-02-04_20-39-23.jpg">
			</div>
		</div>
		<div class="cart"></div>
	</div>

	<div class="wrapperr">
		<div class="content-insert">
			<form method="POST" action="" enctype="multipart/form-data">

				<?php
				$sql = "SELECT categorie_id, categorie_name  FROM categories";
				$result = $connection->query($sql);

				if ($result->num_rows > 0) {
				?>
					<label for="exampleFormControlSelect1">Products Categories</label>
					<select class="form-control" id="exampleFormControlSelect1" name="categorie" value="">
						<?php while ($row = $result->fetch_assoc()) { ?>
							<option value="<?php echo $row['categorie_id'] ?>"> <?php echo $row['categorie_name'] ?></option>
						<?php }
						?>
					</select>
				<?php
				}
				?>
				<br>
				<div class="form-group">
					<input id="name" class="form-control" type="text" name="product_name" placeholder="Product Name" required />
				</div>
				<div class="form-group">
					<input id="qty" class="form-control" type="number" name="qty" placeholder="Quantity" required />
				</div>
				<div class="form-group">
					<input id="price" class="form-control" type="text" name="price" placeholder="Price" required />
				</div>
				<div class="form-group">
					<label for="image_front">Image Front</label>
					<input class="form-control" type="file" name="image_front" id="image_front" />
				</div>
				<div class="form-group">
					<label for="image_back">Image Back</label>
					<input class="form-control" type="file" name="image_back" id="image_back" />
				</div>
				<br>
				<div class="form-group">
					<button class="btn btn-success" type="submit" name="upload">SAVE</button>
					<button class="btn btn-secondary" type="submit" name="update">UPDATE</button>
					<!-- <div class="btn btn-secondary">Update</div> -->
					<div id="aj"></div>
				</div>

			</form>
		</div>
		<div class="content-read">
			<?php
			if (mysqli_connect_errno() > 0) {
				die(mysqli_connect_error());
			}
			$sql = "SELECT product_id, product_name, qty, price,image_front, image_back FROM products order by product_id asc";
			$result = mysqli_query($connection, $sql);
			if (mysqli_errno($connection) > 0) {
				die(mysqli_error($connection));
			}
			?>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Product Name</th>
						<th scope="col">Quantity</th>
						<th scope="col">Price</th>
						<th scope="col">Image Front</th>
						<th scope="col">Image Back</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_assoc($result)) { ?>
						<tr>
							<th><?php echo $row["product_name"]; ?></th>
							<th><?php echo $row["qty"]; ?></th>
							<th><?php echo $row["price"]; ?></th>
							<th>
								<div class="image"><img src="../image/<?php echo $row["image_front"]; ?>" alt=""></div>
							</th>
							<th>
								<div class="image"><img src="../image/<?php echo $row["image_back"]; ?>" alt=""></div>
							</th>
							<th>
								<form method="POST" action="" enctype="multipart/form-data" id="form">
									<!-- <div class="btn btn-primary edit">edit</div> -->
									<button type="submit" name="edit" value="<?php echo $row['product_id'] ?>" class="btn btn-primary edit">Edit</button>
									<button type="submit" name="remove" value="<?php echo $row['product_id'] ?>" class="btn btn-danger">Remove</button>
								</form>
							</th>
						</tr>
					<?php } ?>
					<?php mysqli_close($connection); ?>
			</table>
		</div>
	</div>
</body>

</html>