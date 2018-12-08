<?php
$u_first=$_POST['first_name'];
$u_last=$_POST['last_name'];
$u_email=$_POST['email'];
$u_phone_number=$_POST['phone_number'];
$u_password=$_POST['passwd'];
$u_status = "unpaid";

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
	header('Refresh: 4; URL=Signup_Javascript');
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

$sql_1 = "SELECT * FROM users";
$result = $conn->query($sql_1);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

    	if ($u_email == $row["user_email"]){

			echo $u_first. "'s email is already signed up";
        	echo '<br>';
        	header('Refresh: 4; URL=Signup_Javascript');
        	exit();
    
    	}
    }
/*-------------------------------------------------------------------------*/
		$sql_2 = "INSERT INTO users (user_first, user_last, user_email, 
		user_phone_num, user_pwd, user_status) VALUES ('$u_first', '$u_last', '$u_email', '$u_phone_number', '$u_password','$u_status')";

		if ($conn->query($sql_2) === TRUE) {
			echo $u_first .", you are now signed up!";
			echo '<br>';
			header('Refresh: 4; URL=MainMenu_2.php');
		} else {
			echo "Error: " . $sql_2 . "<br>" . $conn->error;
		}

}

/*--------------------------------------------------------------------------*/

//Set session variables
$_SESSION["id"] = $row['user_id'];
$_SESSION["first"] = $u_first;
$_SESSION["last"] = $u_last;
$_SESSION["email"] = $u_email;
$_SESSION["phone_number"] = $u_phone_number;
$_SESSION["password"]=$u_password;
$_SESSION["status"] = $u_status;

$conn->close();
?>