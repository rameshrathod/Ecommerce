
<link rel='stylesheet' type='text/css' href='css/temp.css'><script src='valid.js'></script>
<?php
include_once 'database/DB.php';
include_once 'PageInit.php';

//create obj of DB
$db=new DB();
//geting connection to mysql
$db->getConnection();
//get records from db using method by passing table name,coulmn array,order and order column
$records1=$db->fetchRecordsForHome('mobile');
$records2=$db->fetchRecordsForHome('vehicle');
$records3=$db->fetchRecordsForHome('book');

//$records4=$db->fetchRecordsForHome('men');
//$records5=$db->fetchRecordsForHome('women');
//$records6=$db->fetchRecordsForHome('kid');
//close connectiobn
$db->closeConnection();

//create obj of pageInit
$p=new PageInit();
//call method to display records by passing records,per page count and requested page no
$p->dispProductForHome($records1,'mobile');
$p->dispProductForHome($records2,'vehicle');
$p->dispProductForHome($records3,'book');
//$p->dispProductForHome($records4,'men');
//$p->dispProductForHome($records5,'women');
//$p->dispProductForHome($records6,'kid');

?>