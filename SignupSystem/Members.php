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
if($status=="unpaid")
	echo '<div class="center">';
	echo '<form action="your-server-side-code" method="POST">';
  	echo '<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_abGaLC6gGQPIqN7W6WNlLQ9o" data-amount="999" data-name="Demo Site" data-description="Widget" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto">';
  	echo '</script>';
	echo '</form>';
	echo '</div>'

?>

</body>
</html>