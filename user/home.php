<html>
   <head>
     

   </head>
   
   <body>
   
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
    if($_SESSION["user_id"] and ($_SESSION["categary"]=="user"))
    {
include 'usermenu.html';
?>
<div id="menu">
   
   <?php 
   include_once 'userPopUpContentPage.php';
   ?>       
</div>

</body>
</html>

<?php 
  }
  }
  ?>

