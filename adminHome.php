
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
	header('Location:index.php');
  } else
  {
    if($_SESSION["user_id"] and ($_SESSION["categary"]=="admin"))
    {
include 'admin/adminmenu.html';
?>
<div id="menu">
     
     <?php 
     
     include 'admin/adminPopUpContentPage.php';
     ?>
     <div id="slider">
        <?php      
        include 'slider.html';
        ?>       
        </div>

            
        <div id="content" style="margin: -25px 10px 0px -25px;">
            	<?php           	
				//include 'productWork/homeContent.php';	
				include 'productWork/show_home_content.php';											
				?> 
     	</div>
          
</div>


<footer>
		<?php           	
		include 'footer.html';											
		?> 
</footer>
</body>
</html>

<?php 
  }
  }
  ?>

