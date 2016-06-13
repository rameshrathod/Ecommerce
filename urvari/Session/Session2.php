<?php

session_start();
  
?>
<!DOCTYPE html>
<html>
<body>

<?php
 if ($_SESSION['timeout'] + 1 * 60 < time()) 
 {
   // remove all session variables
   session_unset();
   // destroy the session 
   session_destroy(); 
     echo" session timed out";
	header('Location: http://www.google.com/');
  } else
  {
     echo "session ok";
  }

// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html>