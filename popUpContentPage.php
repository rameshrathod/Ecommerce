      
      
        	<?php 		

	//include 'all_categaries.php';
			
	?>
        <div id = "loginform">
		    <p><b>Login Window</b></p>

                <input type = "image" id = "close_login" src = "images/close.png">
                <form method = "post" action = "./other/user_check.php">
                <input type ="text" id = "login" placeholder = "User Id" name = "uid">
                <input type = "password" id = "password" name = "upass" placeholder = "******"><br><br>
                <input type = "submit" id = "dologin" value = "Login">&nbsp;&nbsp;&nbsp;<input type = "button" id = "forgot_pass" value = "Forgot Password">
                <input type = "button" id="show_register1"value = "Register here">
            </form>
            


        </div>
        
        
        
          <div id = "forgotpass">		
		    <p><b>Forgot password window</b></p>

                		<input type = "image" id = "close_login2" src = "images/close.png">
                <form method = "post" action = "forgetpass.php">
               			<input type ="text" id = "email" placeholder = "Email Id" name = "eid"><br><br>
             			<input type ="text" id = "mobile" placeholder = "Mobile Number" name = "mobno"><br><br>
               			 <input type = "submit" id = "pass_submit" value = "submit"><br><br>
              
            	</form>

        </div>
        
        
        
        <div id = "registerform">
				    <p><b>New User Registration</b></p>

                	<input type = "image" id = "close_login1" src = "images/close.png">
                <form method = "post" action = "register.php" name="frm">
                	<input type ="text" id = "FirstName" placeholder = "First Name" name = "fname">
                	<input type ="text" id = "LastName" placeholder = "Last Name" name = "lname">
                	<!-- 
                	<input type ="date" id = "dob" placeholder = "date of birth" name = "dob"><br><br>
                	<label id="check">
                		Gender :<input type="radio" name="gender" value="male" checked> Male
  						<input type="radio" name="gender" value="female"> Female
  					</label>
  					<br>
  					<br>
              		<label id="check">Enter address:<br>
              		&nbsp;&nbsp;<textarea rows="3"  cols="33" id="textarea">
              		</textarea>
              		</label>
              		<br>

					<select id="countryId" class="countries" name="country" required="required">
							<option value="">Select Country
							</option>
					</select>
					<select id="stateId" class="states" name="state" required="required">
							<option value="">Select State
							</option>
					</select><br/>
					<select id="cityId" class="cities" name="city" required="required">
							<option value="">Select City
							</option>
					</select>
					<input type = "text" id = "pinCode" name = "pincode" placeholder = "Enter pin code">
					              		<br/>
              		<br>
              		 -->
					<input type = "email" id = "email" name = "emailId" placeholder = "Email Id">
              		<input type = "text" id = "mobileNumber" name = "mnumber" placeholder = "Mobile Number">


              		
              		
              		<input type = "password" id = "password" name = "pass" placeholder = "Create password">
                	<input type = "password" id = "cpassword" name = "cpass" placeholder = "confirm password">
               		 <input type = "submit" id = "dologin" value = "Register"><br><br><br>
                
            </form>

        </div>
        
<div id = "registerform1">
		
		    <p><b>New User Registration</b></p>

                	<input type = "image" id = "close_login3" src = "images/close.png">
                <form method = "post" action = "register.php" name="frm" onclick="return validateform()">
                	<input type ="text" id = "FirstName" placeholder = "First Name" name = "fname">
                	<input type ="text" id = "LastName" placeholder = "Last Name" name = "lname">
                	<!-- 
                	<input type ="date" id = "dob" placeholder = "date of birth" name = "dob"><br><br>
                	<label id="check">
                		Gender :<input type="radio" name="gender" value="male" checked> Male
  						<input type="radio" name="gender" value="female"> Female
  					</label>
  					<br>
  					<br>
              		<label id="check">Enter address:<br>
              		&nbsp;&nbsp;<textarea rows="3"  cols="33" id="textarea">
              		</textarea>
              		</label>
              		<br>

					<select id="countryId" class="countries" name="country" required="required">
							<option value="">Select Country
							</option>
					</select>
					<select id="stateId" class="states" name="state" required="required">
							<option value="">Select State
							</option>
					</select><br/>
					<select id="cityId" class="cities" name="city" required="required">
							<option value="">Select City
							</option>
					</select>
					<input type = "text" id = "pinCode" name = "pincode" placeholder = "Enter pin code">
					              		<br/>
              		<br>
              		 -->
					<input type = "email" id = "email" name = "emailId" placeholder = "Email Id">
              		<input type = "text" id = "mobileNumber" name = "mnumber" placeholder = "Mobile Number">


              		
              		
              		<input type = "password" id = "password" name = "pass" placeholder = "Create password">
                	<input type = "password" id = "cpassword" name = "cpass" placeholder = "re-enter password">
               		 <input type = "submit" id = "dologin" value = "Register"><br><br><br>
                
            </form>

        </div>

        <div id = "aboutus">
		
		    <p><b>About Us</b></p>

                		<input type = "image" id = "close_login4" src = "images/close.png">
                <form method = "post" action = "forgetpass.php">
                <p><input type = "image" id = "my_img" src = "images/imgA.jpg"></p>
                <br>
                <br>
                <br>
            	</form>

        </div>
     
        
        
      <div id ="products">
		<BR/>
		<center>
		    <b>Products</b>
		    </center>
		    <hr color="black" width="75%">
		  

                <input type = "image" id = "close_login5" src = "images/close.png">
                <div>

					 	<table>
						<tr>	
						
							<th><a href='category_products.php?cat=Electronics'>Electronics</a></th>
							<th><a href='category_products.php?cat=Fashion'>Fashion</a></th>
							<th><a href='category_products.php?cat=Kids+and+Toys'>Kids and Toys</a></th>
							<th><a href='category_products.php?cat=Home+and+Kitchen'>Home and Kitchen</a></th>
							<th><a href='category_products.php?cat=Automotive'>Automotive</a></th>
							<th><a href='category_products.php?cat=Sports,Music,Books'>Sports,Music,Books</a></th>
		
			
						</tr>
							
							
             			<tr>
             			<td >
             			
		             		
		             			<ul>
						             <li><a href="category_products.php?cat=Electronics&subcat=Mobiles+and+Tabs">Mobiles and Tabs</a></li>
						             <li><a href="category_products.php?cat=Electronics&subcat=Computers+and+Laptops">Computers and Laptops</a></li>
						             <li><a href="category_products.php?cat=Electronics&subcat=Tv+and+Audio-Video">Tv and Audio-Video</a></li>						             
						             <li><a href="category_products.php?cat=Electronics&subcat=Cameras+and+Printers">Cameras and Printers</a></li>
						             <li><a href="category_products.php?cat=Electronics&subcat=Stationary+and+Office+Equipment">Stationary and Office Equipment</a></li>
						             <li><a href="category_products.php?cat=Electronics&subcat=All+Accessories">All Accessories</a></li>
						            
					             </ul>
			      
			             </td>
			             <td>  
						              <ul >
						                 <li><a href="category_products.php?cat=Fashion&subcat=Clothing">Clothing</a></li>
						                 <li><a href="category_products.php?cat=Fashion&subcat=Footwear">Footwear</a></li>
						                 <li><a href="category_products.php?cat=Fashion&subcat=Eyewear">Eyewear</a></li>
						                 <li><a href="category_products.php?cat=Fashion&subcat=Daily+Needs">Daily Needs</a></li>						           
						                 <li><a href="category_products.php?cat=Fashion&subcat=Beauty+and+Personal+Care">Beauty and Personal Care</a></li>
						                 <li><a href="category_products.php?cat=Fashion&subcat=Watches">Watches</a></li>
						                 <li><a href="category_products.php?cat=Fashion&subcat=Fashion+Accessories">Fashion Accessories</a></li>
						             
			             			</ul>
			        	
			        	 </td>
			        	 <td>
			        	
			 					<ul >
			 						   	<li><a href="category_products.php?cat=Kids+and+Toys&subcat=Kids+Clothing">Kids Clothing</a></li>
						                 <li><a href="category_products.php?cat=Kids+and+Toys&subcat=Toys+and+Games">Toys and Games</a></li>
						                 <li><a href="category_products.php?cat=Kids+and+Toys&subcat=Baby+Care+and+Maternity">Baby Care and Maternity</a></li>
						                 <li><a href="category_products.php?cat=Kids+and+Toys&subcat=School+Supplies">School Supplies</a></li>
						                 <li><a href="category_products.php?cat=Kids+and+Toys&subcat=Kids+Room+Essentials">Kids Room Essentials</a></li>					                
						                 <li><a href="category_products.php?cat=Kids+and+Toys&subcat=Kids+Accessories">Kids Accessories</a></li>
						             
			             		</ul>
			               </td>
			               <td>
			           
				               <ul >
						                 <li><a href="category_products.php?cat=Home+and+Kitchen&subcat=Kitchen+Electronics">Kitchen Electronics</a></li>
						                 <li><a href="category_products.php?cat=Home+and+Kitchen&subcat=Kitchen+Appliances">Kitchen Appliances</a></li>
						                 <li><a href="category_products.php?cat=Home+and+Kitchen&subcat=Home+Furnishing">Home Furnishing</a></li>
						                 <li><a href="category_products.php?cat=Home+and+Kitchen&subcat=Home+Decor">Home Decor</a></li>
						                 <li><a href="category_products.php?cat=Home+and+Kitchen&subcat=Kitchenware">Kitchenware</a></li>
						                 <li><a href="category_products.php?cat=Home+and+Kitchen&subcat=Tools+and+Hardware">Tools and Hardware</a></li>
						              
						             
			             		</ul>
			            
			                </td>
			                <td>
			                
				                	<ul >
						                 <li><a href="category_products.php?cat=Automotive&subcat=Bikes+and+Scooters">Bikes & Scooters</a></li>
						                 <li><a href="category_products.php?cat=Automotive&subcat=Motors">Motors</a></li>
						                 <li><a href="category_products.php?cat=Automotive&subcat=Parts+and+Spares">Parts and Spares</a></li>
						                 <li><a href="category_products.php?cat=Automotive&subcat=Bike+Accessories">Bike Accessories</a></li>
						                 <li><a href="category_products.php?cat=Automotive&subcat=Car+Accessories">Car Accessories</a></li>
						               
						             
			             		</ul>
			                 </td>
			                 <td>
			                 
				                 <ul>
						                 <li><a href="category_products.php?cat=Sports,Music,Books&subcat=Sport+Equipment">Sport Equipment</a></li>
						                 <li><a href="category_products.php?cat=Sports,Music,Books&subcat=Fitness+Equipment">Fitness Equipment</a></li>
						                 <li><a href="category_products.php?cat=Sports,Music,Books&subcat=Sport+Accessories">Sport Accessories</a></li>
						                 <li><a href="category_products.php?cat=Sports,Music,Books&subcat=Musical+Instruments">Musical Instruments</a></li>
						                 <li><a href="category_products.php?cat=Sports,Music,Books&subcat=Literature+and+Fiction">Literature and Fiction</a></li>
						                 <li><a href="category_products.php?cat=Sports,Music,Books&subcat=Children+Books">Children Books</a></li>
						          		  <li><a href="category_products.php?cat=Sports,Music,Books&subcat=Educational+Books">Educational Books</a></li>
						             
			             		</ul>
			                 
			                  </td>
			                </tr>        
             </table>
            
            </div>

        </div>