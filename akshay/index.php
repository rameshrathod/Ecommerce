	<link rel='stylesheet' type='text/css' href='temp.css'><script src='valid.js'></script>
<?php 
include 'DB.php';
include 'PageInit.php';

 //check parameter present in url otherwise set to defaults
 if (!isset($_GET['records_per_page']))
 {
 $records_per_page=5;
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
$cols=['*'];

//create obj of DB
$db=new DB();
//geting connection to mysql
$db->getConnection();
//get records from db using method by passing table name,coulmn array,order and order column
$records=$db->fetchRecords('emp_detail',$cols,$sort_by,$sort_col);
//close connectiobn
$db->closeConnection();

//create obj of pageInit
$p=new PageInit();
//call method to display records by passing records,per page count and requested page no
$p->dispRecordsTabular($records,$records_per_page,$req_page);

?>
