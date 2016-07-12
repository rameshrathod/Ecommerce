
<?php
// Start the session
session_start();
?>
<?php
include "logout.html";
echo "USERNAME " . $_SESSION["user"] . ".<br>";
echo "PASSWORD " . $_SESSION["password"] . ".";

	

 if ($_SESSION['timeout'] + 1 * 60 < time()) 
 {
   // remove all session variables
   session_unset();
   // destroy the session 
   session_destroy(); 
     echo" session timed out";
	header('Location: main.php');
  } else
  {
     echo "session ok";
  }
		

echo "WELCOME  ****************user login";

?>