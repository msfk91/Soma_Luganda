<?php
session_start();

require_once ('C:\Users\Larz\vendor\autoload.php');
//use SendGrid\SendGrid;
//$SG = new \SendGrid\Mail\Mail();
//var_dump($SG);

\Stripe\Stripe::setApiKey("THE_API_KEY");
			               
$stripeToken=$_POST['stripeToken'];
$stripeEmail=$_POST['stripeEmail'];

echo $stripeToken;
echo '<br>';
echo $stripeEmail;

$_SESSION['stripeEmail'] = $stripeEmail;

// Create a Customer:
$customer = \Stripe\Customer::create([
    'source' => $stripeToken,
    'email' => $stripeEmail,
]);

echo '<br>';
echo $customer['id'];
echo '<br>';

if (isset($customer)){
	// Comment out the above line if not using Composer
	// require("<PATH TO>/sendgrid-php.php");
	// If not using Composer, uncomment the above line and
	// download sendgrid-php.zip from the latest release here,
	// replacing <PATH TO> with the path to the sendgrid-php.php file,
	// which is included in the download:
	// https://github.com/sendgrid/sendgrid-php/releases
	$apiKey='THE_API_KEY';
	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("msfk91@somaluganda.com", "Soma Luganda");
	$email->setSubject("DO NOT REPLY: You Are Now a Member");
	$email->addTo( $stripeEmail, "Example User");
	$email->addContent("text/plain", "Thank you for your paid membership to somaluganda.com.");
	$email->addContent("text/html", "Thank you for your paid membership to somaluganda.com.");
	$sendgrid = new \SendGrid(($apiKey));
	try {
	    $response = $sendgrid->send($email);
	    print $response->statusCode() . "\n";
	    print_r($response->headers());
	    print $response->body() . "\n";
	} catch (Exception $e) {
	    echo 'Caught exception: '. $e->getMessage() ."\n";
	}
};

?>

