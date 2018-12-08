<?php
session_start();
//require_once('../vendor/stripe/init.php');
//require ('core/lib/Stripe.php');
require_once ('C:\Users\Larz\vendor\autoload.php');
//require_once('C:\xampp\htdocs\SignupSystem\vendor\autoload.php');
	
\Stripe\Stripe::setApiKey("pk_test_abGaLC6gGQPIqN7W6WNlLQ9o");
//\Stripe\Stripe::setApiKey("sk_test_hnnDa6e0OTXBDQ0yjm7Jx7oc");


// Retrieve the request's body and parse it as JSON:
$input = @file_get_contents('php://input');
$event_json = json_decode($input);
$stripeEmail_2=$_SESSION['stripeEmail'];
// Do something with $event_json
//$event_id = $event_json -> id;
//$event = \Stripe\Event::retrieve($event_json['id']);

//$event = \Stripe\Event::retrieve($event_json->id);

//echo $event;
//echo "<br>";
print_r($event_json);
if ($event_json->type=='customer.created')
	// Comment out the above line if not using Composer
	// require("<PATH TO>/sendgrid-php.php");
	// If not using Composer, uncomment the above line and
	// download sendgrid-php.zip from the latest release here,
	// replacing <PATH TO> with the path to the sendgrid-php.php file,
	// which is included in the download:
	// https://github.com/sendgrid/sendgrid-php/releases
	$apiKey='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';
	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("msfk91@somaluganda.com", "Soma Luganda");
	$email->setSubject("DO NOT REPLY: You Are Now a Member 2");
	$email->addTo("$stripeEmail_2", "Example User");
	$email->addContent("text/plain", "Second email and again. Thank you for your paid membership to somaluganda.com.");
	$email->addContent("text/html", "Second email and again. Thank you for your paid membership to somaluganda.com."
	);
	$sendgrid = new \SendGrid(($apiKey));
	try {
	    $response = $sendgrid->send($email);
	    print $response->statusCode() . "\n";
	    print_r($response->headers());
	    print $response->body() . "\n";
	} catch (Exception $e) {
	    echo 'Caught exception: '. $e->getMessage() ."\n";
	}


http_response_code(200); // PHP 5.4 or greater

?>





















