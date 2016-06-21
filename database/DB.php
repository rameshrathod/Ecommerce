<?php
 class DB 
 {
	protected $db_hostname="";
	protected $db_username="";
	protected $db_password="";
	protected $db_name="";
	protected $db_connection="";
	protected static $record_count=0;

	public function __construct()
	{
		$this->db_hostname="localhost";
		$this->db_username="root";
		$this->db_password="root";
		$this->db_name="ecommerce";
	}

	public function getConnection()
	{
		$this->db_connection = new mysqli($this->db_hostname, $this->db_username,$this->db_password, $this->db_name);

		if(mysqli_connect_error())
		{
			trigger_error("Failed to conenct to MySQL: " . mysql_connect_error(),E_USER_ERROR);
			exit();
		}
		return $this->db_connection;
	}
	
	
	public function fetchRecordsForHome($cat)
	{
		$sql_query="SELECT product_name,product_price,product_discount,product_img from product_details where product_category='$cat' order by product_id desc";
		$result = $this->db_connection->query($sql_query);
		return $result;
	}
	
	public function fetchRecords($table,$cols,$sort_by,$sort_col)
	{
		//query formation
		$sql_query="SELECT ";
		for($a=0;$a<count($cols);$a++)
		 {
			$sql_query.=$cols[$a];
		    if($a!=count($cols)-1)
		      {
		       $sql_query.=",";
		      }
		  }
		 //check for col name 
		if($sort_col=='')
		 {
			$sql_query.=" from $table";
		 }
		else
		 {
		    $sql_query.=" from $table order by $sort_col $sort_by ";
		 }
		 
		 //firing query
		$result = $this->db_connection->query($sql_query);
	    return $result;
	}
	
	
	public function fetchRecordsByCategory($table,$cols,$sort_by,$sort_col,$cat,$subcat)
	{
		//query formation
		$sql_query="SELECT ";
		for($a=0;$a<count($cols);$a++)
			{
			$sql_query.=$cols[$a];
			if($a!=count($cols)-1)
				{
				$sql_query.=",";
				}
			}
		$sql_query.=" from $table ";
		
		//check for category
		if($cat!='')
		{
			$sql_query.=" where product_category='$cat'";
			if($subcat!='')
			{
				$sql_query.=" and product_subcat='$subcat'";
			}
		}
		
		//check for col name
		if($sort_col!='')
			{
				$sql_query.=" order by $sort_col $sort_by ";
			}
				
		//firing query
		$result = $this->db_connection->query($sql_query);
		return $result;
	}
	
	

	public function fetchRecordsBySearch($table,$cols,$sort_by,$sort_col,$search)
	{
		//query formation
		$sql_query="SELECT ";
		for($a=0;$a<count($cols);$a++)
		{
		$sql_query.=$cols[$a];
		if($a!=count($cols)-1)
		{
		$sql_query.=",";
		}
		}
				$sql_query.=" from $table ";
	
				//check for search
				if($search!='')
				{
				$sql_query.=" where product_name like '$search%'";
				$sql_query.=" or product_name like '%$search%'";
				$sql_query.=" or product_name like '%$search'";
				}
	
				//check for col name
				if($sort_col!='')
				{
				$sql_query.=" order by $sort_col $sort_by ";
				}
	
				//firing query
				$result = $this->db_connection->query($sql_query);
				return $result;
	}
	public function MainCategaries($table_name)
	{
	
		$sql_query="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME=\"$table_name\"";
		$result = $this->db_connection->query($sql_query);
		return $result;
	
	}
	public function closeConnection()
	{
		$this->db_connection=null;
		
	}
	
}

?>