<?php
session_start();
?>
<!doctype html>

<html>

<head>
	<style type="text/css">
		.divider{
			display: inline-block;
			border: 2px solid green;
			padding: 15px;
		}

		.left_side {
			display: inline-block;
			width: 50%;
			text-align: right;

		}

		.right_side{
			display: inline-block;
			width: 49%;
			text-align: right;
		}

	</style>
</head>

<body>
	<div class="left_side"> <a class="divider" href=""> <div> <h2> Profile </h2> </div> </a> </div>
	<div class="right_side"> <a class="divider" href=""> <div> <h2> Log Out </h2> </div> </a> </div>
</body>

</html>