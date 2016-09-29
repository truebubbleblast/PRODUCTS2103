<html>
<head>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
	<button class='btn btn-primary' data-toggle='modal' data-target='.myModal'>Launch</button>
	
	<div class='modal fade myModal' tab-index='-1' role='dialog' aria-labelledby='myModal'>
		<div class='modal-dialog modal-sm' role='document'>
			<div class='modal-content'>
				<input type='text' class='form-control'>
				<input type='text' class='form-control'>
				<button class='btn btn-success'>Login</button>
			</div>
		</div>
	</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
	$(document).ready(function(){
		$(".modal").modal("show");
	});
</script>