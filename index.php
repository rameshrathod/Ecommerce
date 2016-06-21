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
 
</body>
</html>