
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
	header('Location:./index.php');
  } else
  {
    if($_SESSION["user_id"] and ($_SESSION["categary"]=="admin"))
    {
include 'adminmenu.html';
?>
<div id="menu">
     
     <?php 
     
     include 'adminPopUpContentPage.php';
     ?>
     
          
</div>

</body>
</html>

<?php 
  }
  }
  ?>

