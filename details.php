

<html>
<head>
<title>CybShopee</title>
</head>
 
<body>
<?php

include 'menu.html';

?>
<div id="menu"> 

       	<?php 		

	include 'popUpContentPage.php';
			
	?>

        <div id="content" style="margin: -25px 10px 0px -25px;">
            	<?php           	
				//include 'productWork/homeContent.php';	
				include 'productWork/show_product_details.php';											
				?> 
     	</div>
     	
     	   <div id="content" style="margin: -25px 10px 0px -25px;">
            	<?php           	
				//include 'productWork/homeContent.php';	
				include 'productWork/show_reviews.php';											
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