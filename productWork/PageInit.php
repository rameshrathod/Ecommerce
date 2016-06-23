<?php
class PageInit 
{
	protected $records_per_page;
	protected $num_of_pages;
	
	function __construct()
	 {
		$record_per_page=3;
		$num_of_pages=1;		
	 }
	
	
	public function dispProductForHome($records,$cat)
	{
		$column_count=mysqli_num_fields($records);
		$fields="";
		$i=-1;
		
		//store column names in array
		while($fieldinfo=mysqli_fetch_field($records))
		{
			$i++;
			$fields[$i]=$fieldinfo->name;
		}
		
		//print rows
		echo "<div style='position:relative;width:100%;display:inline-block;'>";
		echo "<div id='categary-header'><b>Products from $cat</b></div>";
		for($j=0;$j<4;$j++)
			{
			if($result = mysqli_fetch_array($records))
				{
				echo "<div id='mini-product'><center>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['product_img'] ).'" id="product-img"/>';
				echo '<p id="product-content-p">';
				echo '<br><b>Name:</b>'.$result['product_name'].'<br>';
				echo '<br><b>Price:</b>'.$result['product_price'].'<br>';
				echo '<br><b>Discount:</b>'.$result['product_discount'].'<br>';
				
				
				echo '<p>';
				
				echo "</center>";
				echo "<a href='details.php?pid=".$result['product_id']."'><input type='button' value='View Details' id='product-detail-btn'/></a>";
				echo "</div>";
				
				}
			}
		echo "</div>";
		
	}
	
	//method for display records in tabular format
	public function dispRecordsTabular($records,$records_per_page,$req_page,$sort_by,$sort_col)
	{
		$row_count= $records->num_rows;
		$column_count=mysqli_num_fields($records);
		
		//variable init
		$start=0;
		$end=0;
		$prev=1;
		$next=1;
		$fields="";
		$i=-1;
		
		//store column names in array
		while($fieldinfo=mysqli_fetch_field($records))
			{
			$i++;	
			$fields[$i]=$fieldinfo->name;
			}
		
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
	<div class='page-init-control'>
		<form action='#' onsubmit='return validate()' method='get'>
				
			Display records per page :&nbsp;
			<select  name='records_per_page' onchange="this.form.submit()">
				<option value='5' >--select--</option>
				<option value='5' <?php if($records_per_page=='5'){echo("selected");}?>>5</option>
				<option value='10' <?php if($records_per_page=='10'){echo("selected");}?>>10</option>
				<option  value='15' <?php if($records_per_page=='15'){echo("selected");}?>>15</option>
				<option value='20' <?php if($records_per_page=='20'){echo("selected");}?>>20</option>
				<option value='30' <?php if($records_per_page=='30'){echo("selected");}?>>30</option>
				<option  value='40' <?php if($records_per_page=='40'){echo("selected");}?>>40</option>
				<option  value='50' <?php if($records_per_page=='50'){echo("selected");}?>>50</option>
			</select>
				
			<span>Page : <?php echo $req_page?></span>&nbsp;out of <?php echo $num_of_pages?>
			<input name='sort_by' value='<?php echo $sort_by?>' style='display:none' />
			<input name='sort_col' value='<?php echo $sort_col?>' style='display:none' />
		</form>
				
		<br> 
   	 	<a href='?records_per_page=<?php echo $records_per_page?>&req_page=1&sort_by=<?php echo $sort_by?>&sort_col=<?php echo $sort_col?>'>First</a>
		&nbsp;&nbsp;
		<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $prev?>&sort_by=<?php echo $sort_by?>&sort_col=<?php echo $sort_col?>'>Prev</a>
		&nbsp;&nbsp;
		<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $next?>&sort_by=<?php echo $sort_by?>&sort_col=<?php echo $sort_col?>'>Next</a>
		&nbsp;&nbsp;
		<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $num_of_pages?>&sort_by=<?php echo $sort_by?>&sort_col=<?php echo $sort_col?>'>Last</a>
    </div>
	</center>
		
		
	<?php 
		
		echo "<br><table border='2' align='center'>";
		
		//print sorting links
		echo "<tr><th>Sorting-></th>";
		for($i=0;$i<$column_count;$i++)
		{
			echo "<td ><a href='?records_per_page=$records_per_page&req_page=1&sort_by=asc&sort_col=$fields[$i]'>A</a></td>";
			echo "<td ><a href='?records_per_page=$records_per_page&req_page=1&sort_by=desc&sort_col=$fields[$i]'>D</a></td>";					
		}
		echo "</tr>";
		
		//print column headings
		echo "<tr><th>Selection</th>";
		for($i=0;$i<$column_count;$i++)
		{			
			echo "<th colspan='2'>".$fields[$i]."</th>";		
		}
		echo "</tr>";
		
		//print rows		
		for($j=$start;$j<$end;$j++)
		{  
			$records->data_seek($j);
			$row = mysqli_fetch_row($records);
			echo "<tr><td><a href='#id=$row[0]'>Select</a></td>";
			
			for($k=0;$k<$column_count;$k++)
			 {
				echo "<td colspan='2'>".$row[$k]."</td>";
			 }
			echo "</tr>";
		}
		
		echo "</table>";
		
	}//end of method
	
	
	
	
	
	
	//method for display products when category selected
	public function dispProductByCategory($records,$records_per_page,$req_page,$sort,$cat,$subcat)
	{
		$row_count= $records->num_rows;
		$column_count=mysqli_num_fields($records);
		
		//variable init
		$start=0;
		$end=0;
		$prev=1;
		$next=1;
		$fields="";
		$i=-1;
		
		//store column names in array
		while($fieldinfo=mysqli_fetch_field($records))
			{
			$i++;
			$fields[$i]=$fieldinfo->name;
			}
		
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
		<div class='page-init-control'>
			<form action='#' onsubmit='return validate()' method='get'>
					
				Display records per page :&nbsp;
				<select  name='records_per_page' onchange="this.form.submit()">
						<option value='4' >--select--</option>
						<option value='4' <?php if($records_per_page=='4'){echo("selected");}?> >4</option>
						<option value='8' <?php if($records_per_page=='8'){echo("selected");}?>>8</option>
						<option  value='12' <?php if($records_per_page=='12'){echo("selected");}?>>12</option>
						<option value='16' <?php if($records_per_page=='16'){echo("selected");}?>>16</option>
						<option value='20' <?php if($records_per_page=='20'){echo("selected");}?>>20</option>
						<option  value='24' <?php if($records_per_page=='24'){echo("selected");}?>>24</option>
						<option  value='28' <?php if($records_per_page=='28'){echo("selected");}?>>28</option>
				</select>
					
				Sort Product By :&nbsp;
				<select  name='sort' onchange="this.form.submit()">
						<option value='OldToNew' >--select--</option>
				 		<option value='OldToNew' <?php if($sort=='OldToNew'){echo("selected");}?>>Older to Newer</option>
						<option value='NewToOld' <?php if($sort=='NewToOld'){echo("selected");}?>>Newer to Older</option>
						<option  value='LowToHigh' <?php if($sort=='LowToHigh'){echo("selected");}?>>Low price to high</option>
						<option value='HighToLow' <?php if($sort=='HighToLow'){echo("selected");}?>>High price to low</option>					
				</select>
					
	
				<span>Page : <?php echo $req_page?></span>&nbsp;out of <?php echo $num_of_pages?>
			
				<input name='cat' value='<?php echo $cat?>' style='display:none' />
				<input name='subcat' value='<?php echo $subcat?>' style='display:none' />
			</form>
					
			<br>
			<a href='?records_per_page=<?php echo $records_per_page?>&req_page=1&sort=<?php echo $sort?>&cat=<?php echo $cat?>&subcat=<?php echo $subcat?>'>First</a>
			&nbsp;&nbsp;
			<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $prev?>&sort=<?php echo $sort?>&cat=<?php echo $cat?>&subcat=<?php echo $subcat?>'>Prev</a>
			&nbsp;&nbsp;
			<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $next?>&sort=<?php echo $sort?>&cat=<?php echo $cat?>&subcat=<?php echo $subcat?>'>Next</a>
			&nbsp;&nbsp;
			<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $num_of_pages?>&sort=<?php echo $sort?>&cat=<?php echo $cat?>&subcat=<?php echo $subcat?>'>Last</a>
		</div>
		</center>
			
		<br>
		
		<?php 
			
			//print rows
			echo "<div>";		
			for($k=$start;$k<$end;$k++)
			{  
				
			$records->data_seek($k);
				    if($result = mysqli_fetch_array($records))
				    {
				echo "<div id='mini-product'><center>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['product_img'] ).'" id="product-img"/>';
				echo '<p id="product-content-p">';
				echo '<br><b>Name:</b>'.$result['product_name'].'<br>';
				echo '<br><b>Price:</b>'.$result['product_price'].'<br>';
				echo '<br><b>Discount:</b>'.$result['product_discount'].'<br>';
				
				
				echo '<p>';
				
				echo "</center>";
				echo "<a href='details.php?pid=".$result['product_id']."'><input type='button' value='View Details' id='product-detail-btn'/></a>";
				echo "</div>";
				   	 }						
			}
			echo "</div>";
									
	}//end of method
	
	
	
	
	
	//method for display products when category selected
	public function dispProductBySearch($records,$records_per_page,$req_page,$sort,$search)
	{
		$row_count= $records->num_rows;
		$column_count=mysqli_num_fields($records);
	
		//variable init
		$start=0;
		$end=0;
		$prev=1;
		$next=1;
		$fields="";
		$i=-1;
	
		//store column names in array
		while($fieldinfo=mysqli_fetch_field($records))
		{
			$i++;
			$fields[$i]=$fieldinfo->name;
		}
	
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
			<p id="show-search">
			<b>Showing result for '<?php echo $search ?>' : '<?php echo $row_count ?>' products found</b></p>
			</center>
			<center>
			<div class='page-init-control'>
				<form action='#' method='get'>
						
					Display records per page :&nbsp;
					<select  name='records_per_page' onchange="this.form.submit()">
							<option value='4' >--select--</option>
							<option value='4' <?php if($records_per_page=='4'){echo("selected");}?> >4</option>
							<option value='8' <?php if($records_per_page=='8'){echo("selected");}?>>8</option>
							<option  value='12' <?php if($records_per_page=='12'){echo("selected");}?>>12</option>
							<option value='16' <?php if($records_per_page=='16'){echo("selected");}?>>16</option>
							<option value='20' <?php if($records_per_page=='20'){echo("selected");}?>>20</option>
							<option  value='24' <?php if($records_per_page=='24'){echo("selected");}?>>24</option>
							<option  value='28' <?php if($records_per_page=='28'){echo("selected");}?>>28</option>
					</select>
						
					Sort Product By :&nbsp;
					<select  name='sort' onchange="this.form.submit()">
							<option value='OldToNew' >--select--</option>
					 		<option value='OldToNew' <?php if($sort=='OldToNew'){echo("selected");}?>>Older to Newer</option>
							<option value='NewToOld' <?php if($sort=='NewToOld'){echo("selected");}?>>Newer to Older</option>
							<option  value='LowToHigh' <?php if($sort=='LowToHigh'){echo("selected");}?>>Low price to high</option>
							<option value='HighToLow' <?php if($sort=='HighToLow'){echo("selected");}?>>High price to low</option>					
					</select>
						
		
					<span>Page : <?php echo $req_page?></span>&nbsp;out of <?php echo $num_of_pages?>
				
					<input name='search' value='<?php echo $search?>' style='display:none' />
				</form>
						
				<br>
				<a href='?records_per_page=<?php echo $records_per_page?>&req_page=1&sort=<?php echo $sort?>&search=<?php echo $search?>'>First</a>
				&nbsp;&nbsp;
				<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $prev?>&sort=<?php echo $sort?>&search=<?php echo $search?>'>Prev</a>
				&nbsp;&nbsp;
				<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $next?>&sort=<?php echo $sort?>&search=<?php echo $search?>'>Next</a>
				&nbsp;&nbsp;
				<a href='?records_per_page=<?php echo $records_per_page?>&req_page=<?php echo $num_of_pages?>&sort=<?php echo $sort?>&search=<?php echo $search?>'>Last</a>
			</div>
			</center>
				
			<br>
			
			
			
			<?php 
				
				//print rows
				echo "<div>";		
				for($k=$start;$k<$end;$k++)
				{  
					$records->data_seek($k);
				    if($result = mysqli_fetch_array($records))
				    {
				echo "<div id='mini-product'><center>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['product_img'] ).'" id="product-img"/>';
				echo '<p id="product-content-p">';
				echo '<br><b>Name:</b>'.$result['product_name'].'<br>';
				echo '<br><b>Price:</b>'.$result['product_price'].'<br>';
				echo '<br><b>Discount:</b>'.$result['product_discount'].'<br>';
				
				
				echo '<p>';
				
				echo "</center>";
				echo "<a href='details.php?pid=".$result['product_id']."'><input type='button' value='View Details' id='product-detail-btn'/></a>";
				echo "</div>";
				   	 }			
				}
				echo "</div>";
										
		}//end of method
		
		
		public function MainCategaryDisplay($records)
		{
			$i=-1;
		//echo "<div id='cat'><table>";
		//echo "<tr>";
	
			while($result = mysqli_fetch_array($records))
			{
		     $i++;
			//echo "<th>". $result['category_name']."</th>";
			$cols[$i]=$result['category_name'];
			
			}	
		
			//echo "</tr>";
			
			//echo "<tr>";
			$db=new DB();
			$con=$db->getConnection();
			for($j=0;$j<=$i;$j++)
			{
			$subcat=$db->subCategaries("prooduct_categories",$cols[$j]);
			
			
			//echo "<td>";
			$k=-1;
			while($row = mysqli_fetch_array($subcat))
			{
			$k++;
				//echo $row['sub_category_name']."<br>";
				$cols[$j][$k]=$row['sub_category_name'];
				
			}
			//echo "</td>";
			
			}
			//echo "</tr></div>";
			return $cols;
		}//end of MainCategaryDisplay Method
		

		
		public function dispProductDetails($records)
		{
			
			if($result = mysqli_fetch_array($records))
			{echo "<div id='details-of-product'><center>";
				echo '<form action="cart.php">';
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['product_img'] ).'" id="product-img"/>';
				echo '<div id="details-product-p">';
				echo '<input type="hidden" name="pid2" value='.$result['product_id'].'>';
				
				echo '<table><tr><td><b>Name:</b></td><td>'.$result['product_name'].'</td></tr>';
				echo '<tr><td><b>Price:</b></td><td>'.$result['product_price'].'</td></tr>';
				echo '<tr><td><b>Discount:</b></td><td>'.$result['product_discount'].'</td></tr>';
				echo '<tr><td><b>Quantity Availbale:</b></td><td>'.$result['product_quantity'].'</td></tr>';
						if($result['product_quantity']!=0)
						{
				echo '<tr><td><b>Select Quantity :</b></td><td><input type="number" min="1" max="'.$result['product_quantity'].'" name="userQuantity" value="1" style="width: 50px;"></td></tr></table><br>';
				echo "<input type='submit' value='Add To Cart' name='cartButton' id='product-detail-btn'/><br>";
				echo "<input type='submit' value='Buy'  name='buyButton' id='product-detail-btn'/></form>";
						}
						else {
							echo '<tr><td><b>Product out of stock</b></td></tr></table><br>';
						}
				
				
				echo '</div>';
				echo "</center></div>";
				
				echo "<div id='product-description'><b>Product Description:</b>".$result['product_description']."</div>";
			}
			
		}
		
		
		
	
}//end of class
?>










