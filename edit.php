<?php
	if(!isset($_GET['pid'])){
		header("location:index.php");
		exit();
	}
	
	require("sql_connect.php");
	$res = mysqli_query($mysqli, "SELECT * FROM products WHERE productID = ".$_GET['pid']);
	
	$data = mysqli_fetch_row($res);
?>
<html>
<head>
	<title>Insert Consummables</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>Edit Products</h2>
<div class='row'>
	<div class='col-sm-6 col-sm-offset-3'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<h3 class='panel-title'>Change <?php echo $data[1];?> Details</h3>
			</div>
		<div class='panel-body'>
		<form method='POST' action='updateProducts.php' enctype="multipart/form-data">
			<input type='text' value='<?php echo $data[0]?>' name='pid' class='form control hidden' placeholder='Product ID'>
			<input type='text' value='<?php echo $data[1]?>' name='pname' class='form control' placeholder='Product Name'>
			<input type='text' value='<?php echo $data[2]?>'name='pprice' class='form control' placeholder='Product Price'>
			<input type='text' value='<?php echo $data[3]?>'name='pdesc' class='form control' placeholder='Product Description'>
			<p class='text-center'>
				<img src='images/<?php echo $data[4];?>' style='width: 30%' class='img-thumbnail'>
			</p>
			<input type='file' name='pphoto' class='form control'>
			<button class='btn btn-success pull-right'>Submit</button>
		</form>
		</div>
		</div>
	</div>
</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>