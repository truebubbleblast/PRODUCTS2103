<?php
include("sql_connect.php");
?>
<html>
<head>
	<title>List of Consumables</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>List of Consumables</h2>
<div class='row'>
	<div class='col-sm-10 col-sm-offset-1'>
		<table class='table table-bordered'>
			<th>ID</th>
			<th>Item</th>
			<th>Price</th>
			<th>Description</th>
			<th>Option</th>
			<?php
				$result = mysqli_query($mysqli, "SELECT * FROM products");
				$names = array();
				$price = array();
				$desc = array();
				$image = array();
				if($result){
					$index = 0;
					while($row = mysqli_fetch_array($result)){
						$names[]=$row[1];
						$price[] = $row[2];
						$desc[] = $row[3];
						$image[] = $row[4];
						echo "<tr>";
						echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td align='center'>".$row[2]."</td>";
						echo "<td>".$row[3]."</td>";
						echo "<td align='center'>";
						
						echo "<button class='btn btn-primary' alt='".$index++."''><span class='glyphicon glyphicon-eye-open'></span></button>";
						echo "<a href='edit.php?pid=".$row[0]."'><button class='btn btn-sm btn-warning'>
								<span class='glyphicon glyphicon-pencil'></span>
								</button></a>";
						echo "<a href='delete.php?pid=".$row[0]."' class='check'><button class='btn btn-sm btn-danger'>
								<span class='glyphicon glyphicon-remove'></span>
								</button></a>";
						echo "</td>";
						echo "</tr>";
					}
				}
			?>
		</table>
	</div>
</div>
		<div class='modal fade myModal' tab-index='-1' role='dialog' aria-labelledby='myModal'>
		<div class='modal-dialog modal-sm' role='document'>
			<div class='modal-content'>
				<p><strong>Name: </strong><span class='mod_name '></span></p>
				<p><strong>Price: </strong><span class='mod_price '></span></p>
				<p><strong>Description: </strong><span class='mod_desc '></span></p>
				<p class='text-center'><span><img src='#' class='img-thumbnail' > </span></p>
			</div>
		</div>
	</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
	var names = [<?php echo  "'".join("','", $names)."'";?>];
	var price = [<?php echo "'".join("','", $price)."'";?>];
	var desc = [<?php echo "'".join("','", $desc)."'";?>];
	var images = [<?php echo "'".join("','", $image)."'";?>];
	$(document).ready(function(){
	   $(".check").on("click", function(){
		return confirm("Are you sure?");
	});
	
	$(".btn-primary").on("click", function(){
		var i = $(this).attr("alt");
		var productName = names[i];
		var productPrice = price[i];
		var productDesc = desc[i];
		var productImage = images[i];
		$(".mod_name").text(productName);
		$(".mod_price").text(productPrice);
		$(".mod_desc").text(productDesc);
		$(".img-thumbnail").attr('src', 'images/'+productImage);
		$(".modal").modal("show");
	});
});
	
</script>