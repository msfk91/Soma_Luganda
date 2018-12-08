<?php
session_start();

$u_first=$_POST['first_name'];
$u_last=$_POST['last_name'];
$u_email=$_POST['email'];
$u_phone_number=$_POST['phone_number'];
$u_password=$_POST['password'];
//$u_status = "unpaid";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";

if (empty($u_first) or 
	empty($u_last) or 
	empty($u_email) or 
	empty($u_phone_number) or 
	empty($u_password) or
	!preg_match("/^[0-9]{10}$/", $u_phone_number) or
	!filter_var($u_email, FILTER_VALIDATE_EMAIL)
	){

	echo "All fields must be filled in completely!";
	header('Refresh: 4; URL=Profile.php');
	exit();
}

/*--------------------------------------------------------------------------*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*--------------------------------------------------------------------------*/

$sql = "UPDATE users SET user_first='$u_first', user_last='$u_last', user_email='$u_email', user_phone_num='$u_phone_number', user_pwd='$u_password' WHERE user_id={$_SESSION['id']}";

if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully";
    header('Refresh: 4; URL=MainMenu_2.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>