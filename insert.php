<?php
	if(!isset($_POST['pname']) || !isset($_POST['pprice'])){
		echo "No data passed~";
		exit();
    }
	
	$name = $_POST['pname'];
	$price = $_POST['pprice'];
	$desc = $_POST['pdesc'];
	
	if($_FILES['pphoto']['error'] == 0){
		move_uploaded_file($_FILES['pphoto']['tmp_name'], 'images/'.$_FILES['pphoto']['name']);
		$photo = $_FILES['pphoto']['name'];
		require('sql_connect.php');
		$sql = mysqli_query($mysqli, 
		"INSERT INTO products (productID, productName, productPrice, productDescription, productImage) 
		VALUES (NULL, '".$name."', '".$price."', '".$desc."', '".$photo."')");
		
		if($sql){
			header("location: index.php");
		}else{
			echo "Error inserting data~";
			exit();
		}
	}
	
	/*Uecho $_FILES['pphoto'] ['name'];
	echo "<br>";
	echo $_FILES['pphoto'] ['error'];
	echo "<br>";
	echo $_FILES['pphoto'] ['tmp_name'];
	echo "<br>";
	echo $_FILES['pphoto'] ['type'];
	echo "<br>";
	echo $_FILES['pphoto'] ['size'];
	echo "<br>";
	*/
	?>
	