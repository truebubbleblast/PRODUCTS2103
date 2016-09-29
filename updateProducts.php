<?php
	if(!isset($_POST['pname']) || !isset($_POST['pprice'])){
		echo "No data passed~";
		exit();
    }
	
	$name = $_POST['pname'];
	$price = $_POST['pprice'];
	$desc = $_POST['pdesc'];
	$id = $_POST['pid'];
	$photo = $_FILES['pphoto']['name'];
	if($_FILES['pphoto']['tmp_name'] == ""){
		
	require('sql_connect.php');
	$sql = mysqli_query($mysqli, "UPDATE products SET productName ='".$name."', productPrice = '".$price."', productDescription = '".$desc."' WHERE productID = '".$id."'");
	
	if($sql){
		header("location: index.php");
	}else{
		echo "Error updating data~";
			exit();
	}
 }else{
	require('sql_connect.php');
	$sql = mysqli_query($mysqli, "UPDATE products SET productName ='".$name."', productPrice = '".$price."', productDescription = '".$desc."', productImage = '".$photo."' WHERE productID = '".$id."'");
	if($sql){
		header("location: index.php");
	}else{
		echo "Error updating data~";
			exit();
	}
 }
	?> 
	