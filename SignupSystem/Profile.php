<?php
session_start();
?>
<!doctype html>

<html>

<head>
	<style type="text/css">
		
		body {
			text-align: center;
		}

		.main-wrapper {
			margin-top: 80px;
			border: 2px solid blue;
			display: inline-block;
		}
	</style>
</head>
<?php
/*
$_SESSION["id"] = 'row[user_id]';
$_SESSION["first"] = 'u_first';
$_SESSION["last"] = 'u_last';
$_SESSION["email"] = 'u_email';
$_SESSION["phone_number"] = 'u_phone_number';
$_SESSION["status"] = 'u_status';
*/

?>
<body>
	
	 <div class="main-wrapper">
		<form action="Profile_2.php" method="POST">
			<br>
			 
			<input type="text" name="first_name" placeholder="First Name" value= <?php echo $_SESSION["first"] ; ?> > 		
			<br>
			<br>
			<input type="text" name="last_name" placeholder="Last Name" value= <?php echo $_SESSION["last"] ; ?> > 
			<br>
			<br>
			<input type="text" name="email" placeholder="Email" value= <?php echo $_SESSION["email"] ; ?> > 
			<br>
			<br>
			<input type="text" name="phone_number" placeholder="Phone Number" value= <?php echo $_SESSION["phone_number"] ; ?> > 
			<br>
			<br>
			<input type="password" name="password" placeholder="New Password" >' 
			<br>
			<br>
			<input type="submit" name="Submit" value="Update">'
			

		</form> 
	</div>

</body>

</html>

