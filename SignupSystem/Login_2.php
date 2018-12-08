<?php
session_start();

$u_email = $_POST['email'];
$u_password = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";

if (empty($u_email) or  
	empty($u_password) or
	!filter_var($u_email, FILTER_VALIDATE_EMAIL)
	){

	echo "All fields must be filled in completely!";
	header('Refresh: 3; URL=Login_1.php');
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

    	if ($u_email == $row["user_email"] and 
    		$u_password == $row['user_pwd']){

			$_SESSION["id"] = $row['user_id'];
			$_SESSION["first"] = $row['user_first'];
			$_SESSION["last"] = $row['user_last'];
			$_SESSION["email"] = $row['user_email'];
			$_SESSION["phone_number"] = $row['user_phone_num'];
			$_SESSION["password"]= $row['user_pwd'];
			$_SESSION["status"] = $row['user_status'];

			break;
		}
    }
   
    if ($u_email != $row["user_email"] or 
	    $u_password != $row['user_pwd']){
		echo "This email and password combination is not found in our database.";
		header('Refresh: 3; URL=Login_1.php');
		exit();
	}

}



echo $_SESSION['id'] .'<br>'.
	 $_SESSION['first'] .'<br>'.
	 $_SESSION['last'] .'<br>'.
	 $_SESSION['email'] .'<br>'.
	 $_SESSION['phone_number'] .'<br>'.
	 $_SESSION['password'] .'<br>'.
	 $_SESSION['status'] .'<br>' ;

header('Refresh: 3; URL=MainMenu_2.php');

$conn->close();



?>