<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

header("Location: MainMenu_1.php") 
?>

</body>
</html>