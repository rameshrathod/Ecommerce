
<?php 
include 'database/DB.php';
include_once 'PageInit.php';


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

if (!isset($_GET['sort']))
{
	$sort='OldToNew';
	$sort_by='asc';
	$sort_col='product_id';
}
else{
	$sort=$_GET['sort'];
	if($sort=='OldToNew')
	{
		$sort_by='asc';
	 	$sort_col='product_id';
	}
	elseif($sort=='NewToOld')
	{
		$sort_by='desc';
		$sort_col='product_id';
	}
	elseif($sort=='LowToHigh')
	{
		$sort_by='asc';
		$sort_col='product_price';
	}
	elseif($sort=='HighToLow')
	{
		$sort_by='desc';
		$sort_col='product_price';
	}
	
}

if (!isset($_GET['search']))
{
	$search='';
}
else{
	$search=$_GET['search'];
}


//providing columns in form of array to be display 
$cols=['*'];

//create obj of DB
$db=new DB();
//geting connection to mysql
$db->getConnection();
//get records from db using method by passing table name,coulmn array,order and order column
$records=$db->fetchRecordsBySearch('product_details',$cols,$sort_by,$sort_col,$search);
//close connectiobn
$db->closeConnection();

//create obj of pageInit
$p=new PageInit();
//call method to display records by passing records,per page count and requested page no
$p->dispProductBySearch($records,$records_per_page,$req_page,$sort,$search);

?>
