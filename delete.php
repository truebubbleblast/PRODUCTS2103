<?php
include("sql_connect.php");

if(isset($_GET['pid'])){
	$res = mysqli_query($mysqli, "DELETE FROM products WHERE productID = ".$_GET['pid']);
	
	if($res){
		echo "<h1>SUCCESSFULLY DELETED.</h1>";
		echo "<a href='index.php'>";
		echo "<button class='btn btn-success'>Return Home</button></a>";
	}else{
		echo "ERROR IN DELETING.";
	}
	
}else{
	header("location:index.php");
}
?>
