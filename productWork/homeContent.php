	<link rel='stylesheet' type='text/css' href='css/temp.css'><script src='../js/valid.js'></script>
<?php 
include 'database/DB.php';
include 'PageInit.php';


//check parameter present in url otherwise set to defaults
if (!isset($_GET['records_per_page']))
{
	$records_per_page=4;
}
else{
	$records_per_page=$_GET['records_per_page'];
}


if (!isset($_GET['req_page']))
{
	$req_page=1;
}
else{
	$req_page=$_GET['req_page'];
}

if (!isset($_GET['sort_by']))
{
	$sort_by='asc';
}
else{
	$sort_by=$_GET['sort_by'];
}

if (!isset($_GET['sort_col']))
{
	$sort_col='';
}
else{
	$sort_col=$_GET['sort_col'];
}


//providing columns to be display in form of array
//$cols=['product_img'];

//create obj of DB
$db=new DB();
//geting connection to mysql
$db->getConnection();
//get records from db using method by passing table name,coulmn array,order and order column
$records=$db->fetchRecordByQuery("select product_name,product_price,product_discount,product_img from product_details where product_id>=6 and product_id<=10");
//close connectiobn

$db->closeConnection();


//print rows

while($result=mysqli_fetch_array($records))
{  

echo "<div class='mini-product'><center>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['product_img'] ).'" id="product-img"/>';
				echo '<p id="product-content-p">';
				echo '<br><b>Name:</b>'.$result['product_name'].'<br>';
				echo '<br><b>Price:</b>'.$result['product_price'].'<br>';
				echo '<br><b>Discount:</b>'.$result['product_discount'].'<br>';
				echo '<input type="submit" value="View Details" id="product-detail-btn"';
				
				echo '<p>';
				
				
				
				echo "</center></div>";
		
			}

//create obj of pageInit
//$p=new PageInit();
//call method to display records by passing records,per page count and requested page no
//$p->dispProductByCategory($records,$records_per_page,$req_page);

?>