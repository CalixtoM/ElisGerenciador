<?php
session_start();
include('inc/conecta.php');

	if(!isset($_SESSION['login'])){
		echo "<script>location.href='login.php';</script>";
	}

	else{

	}
?>


<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
		
	<script>
		function addDarkmodeWidget() {
		    new Darkmode().showWidget();
		}
		window.addEventListener('load', addDarkmodeWidget);

	</script>
	<title></title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
			</div>
		</div>
	</div>

</body>
</html>
