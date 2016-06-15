<?php
class PageInit {
	protected $records_per_page;
	protected $num_of_pages;
	
	function __construct() {
		$record_per_page=3;
		$num_of_pages=1;
		
	}
	
	public function dispRecordsTabular($records,$records_per_page,$req_page)
	{
		$row_count= $records->num_rows;
		$column_count=mysqli_num_fields($records);
		
		//variable init
		$start=0;
		$end=0;
		$prev=1;
		$next=1;
		
	    //calculation for number of pages formed
		if($records_per_page!=0)
		{
			$check=$row_count/$records_per_page;
		}
		else 
		{
			$check=$row_count;
		}
		
		
		if(($check-floor($check))>0)
		{
			$num_of_pages=floor($check)+1;
		}
		else 
		{
			$num_of_pages=floor($check);
		}
		
		
		//calculation for start,end,next,prev values
		if($num_of_pages==1)
		{
			$start=0;
			$end=$row_count;
		}
		else
		{
			$start=($req_page-1)*$records_per_page;
			
			
			if($req_page==$num_of_pages)
			{
				$end=$row_count;
			}
			else 
			{
				$end=$start+$records_per_page;
			}	
			
			
			
			if($req_page==1)
			{
				$prev=$req_page;
			}
			else
			{
				$prev=$req_page-1;
			}
			
			
			if($req_page==$num_of_pages)
			{
				$next=$num_of_pages;
			}
			else
			{
				$next=$req_page+1;
			}
				
		}
		
		?>
		
		
	
		<center>
		<div class='page-init-control'><form action='#' onsubmit='return validate()' method='get'>
				Display records per page :&nbsp;
				
				
				<select  name='records_per_page'>
					<option value='5' >5</option>
					<option value='10' >10</option>
					<option  value='15' >15</option>
					<option value='20' >20</option>
					<option value='30' >30</option>
					<option  value='40' >40</option>
					<option  value='50' >50</option>
				
				</select>
				
				<!--  <input type='s' value='$records_per_page' required name='records_per_page' id='records_per_page'/> -->
				<input type='submit' value='Show'>&nbsp;&nbsp;
				<span>Page : <?php echo $req_page?></span>&nbsp;out of <?php echo $num_of_pages?></form>
				
				<br><a href='index.php?records_per_page=<?php echo $records_per_page?>&req_page=1'>First</a>
				&nbsp;&nbsp;<a href='index.php?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $prev?>'>Prev</a>
				&nbsp;&nbsp;<a href='index.php?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $next?>'>Next</a>
				&nbsp;&nbsp;<a href='index.php?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $num_of_pages?>'>Last</a>
		 </div>
		 </center>
		
		
		
		
		<?php 
		
		$fields="";
		$i=-1;
		
		
		echo "<br><table border='2' align='center'>";
		
		//print sorting links
		echo "<tr><th>Sorting-></th>";
		while($fieldinfo=mysqli_fetch_field($records))
		{
			echo "<td ><a href='index.php?records_per_page=$records_per_page&req_page=1&sort_by=asc&sort_col=$fieldinfo->name'>A</a></td>";
			echo "<td ><a href='index.php?records_per_page=$records_per_page&req_page=1&sort_by=desc&sort_col=$fieldinfo->name'>D</a></td>";
			$i++;
			$fields[$i]=$fieldinfo->name;		
		}
		echo "</tr>";
		
		//print column headings
		echo "<tr><th>Selection</th>";
		for($h=0;$h<=$i;$h++)
		{			
			echo "<th colspan='2'>".$fields[$h]."</th>";		
		}
		echo "</tr>";
		
		//print rows		
		for($k=$start;$k<$end;$k++)
		{   $records->data_seek($k);
			$row = mysqli_fetch_row($records);
			echo "<tr><td><a href='#id=$row[0]'>Select</a></td>";
			
			for($j=0;$j<$column_count;$j++)
			 {
				echo "<td colspan='2'>".$row[$j]."</td>";
			 }
			echo "</tr>";
		}
		
		echo "</table>";
		
	}//end of method
	
	
	
	
	
	
	public function dispProductByCategory($records,$records_per_page,$req_page)
	{
		$row_count= $records->num_rows;
		$column_count=mysqli_num_fields($records);
	
		//variable init
		$start=0;
		$end=0;
		$prev=1;
		$next=1;
	
		//calculation for number of pages formed
		if($records_per_page!=0)
		{
			$check=$row_count/$records_per_page;
		}
		else
		{
			$check=$row_count;
		}
	
	
		if(($check-floor($check))>0)
		{
			$num_of_pages=floor($check)+1;
		}
		else
		{
			$num_of_pages=floor($check);
		}
	
	
		//calculation for start,end,next,prev values
		if($num_of_pages==1)
		{
			$start=0;
			$end=$row_count;
		}
		else
		{
			$start=($req_page-1)*$records_per_page;
				
				
			if($req_page==$num_of_pages)
			{
				$end=$row_count;
			}
			else
			{
				$end=$start+$records_per_page;
			}
				
				
				
			if($req_page==1)
			{
				$prev=$req_page;
			}
			else
			{
				$prev=$req_page-1;
			}
				
				
			if($req_page==$num_of_pages)
			{
				$next=$num_of_pages;
			}
			else
			{
				$next=$req_page+1;
			}
	
		}
	
		
		$fields="";
		$i=-1;
			
			
		
		while($fieldinfo=mysqli_fetch_field($records))
		{
		
			$i++;
			$fields[$i]=$fieldinfo->name;
		}
		?>
			
			
		
			<center>
			<div class='page-init-control'><form action='#' onsubmit='return validate()' method='get'>
					Display records per page :&nbsp;
					
					
					<select  name='records_per_page'>
						<option value='4' >4</option>
						<option value='8' >8</option>
						<option  value='12' >12</option>
						<option value='16' >16</option>
						<option value='20' >20</option>
						<option  value='24' >24</option>
						<option  value='28' >28</option>
					
					</select>
					
					<!--  <input type='s' value='$records_per_page' required name='records_per_page' id='records_per_page'/> -->
					<input type='submit' value='Show'>&nbsp;&nbsp;
					<span>Page : <?php echo $req_page?></span>&nbsp;out of <?php echo $num_of_pages?></form>
					
					<br><a href='product_templete.php?records_per_page=<?php echo $records_per_page?>&req_page=1'>First</a>
					&nbsp;&nbsp;<a href='product_templete.php?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $prev?>'>Prev</a>
					&nbsp;&nbsp;<a href='product_templete.php?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $next?>'>Next</a>
					&nbsp;&nbsp;<a href='product_templete.php?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $num_of_pages?>'>Last</a>
			 </div>
			 </center>
			<br>
			
			
			
			<?php 
			
			
		
			
			//print rows
			echo "<div>";		
			for($k=$start;$k<$end;$k++)
			{   $records->data_seek($k);				
		   	    $result=mysqli_fetch_array($records);
				echo "<div class='mini-product'><center>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['product_img'] ).'" height="100%" width="100%"/>';
				echo "</center></div>";
			
			}
			echo "</div>";
			
			
			
		}//end of method
	
}//end of class

?>