<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.center{
			margin-top: 50px;
			text-align: center;
		}
	</style>
</head>
<body>

<?php

 $status = $_SESSION{('status')};

if ($status == 'paid'){
	header('Redirect:3; URL=https://google.com');
}

?>

	<div class="center">
	<form action="Pay_2.php" method="POST">
  		<script 
  			src="https://checkout.stripe.com/checkout.js" 
  			class="stripe-button" 
  			data-key="pk_test_abGaLC6gGQPIqN7W6WNlLQ9o" 
	  		data-amount="999" 
	  		data-name="Demo Site" 
	  		data-description="Widget" 
	  		data-image="https://stripe.com/img/documentation/checkout/marketplace.png"data-locale="auto">
	  	</script>
	</form>
	</div>

</body>
</html>