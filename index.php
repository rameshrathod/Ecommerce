<html>
   <head>

   </head>
   
 
   <body>
<?php 
include 'menu.html';
?>
<div id="menu">
     <center>
     <script type="text/javascript">

     </script>

        <div id = "loginform">
		
		    <p>Login Window</p>

                <input type = "image" id = "close_login" src = "images/close.png">
                <form method = "post" action = "./other/user_check.php">
                <input type ="text" id = "login" placeholder = "User Id" name = "uid">
                <input type = "password" id = "password" name = "upass" placeholder = "******"><br><br>
                <input type = "submit" id = "dologin" value = "Login">&nbsp;&nbsp;&nbsp;<input type = "button" id = "forgot_pass" value = "Forgot Password">
                <input type = "button" id="show_register1"value = "Register here">
            </form>
            


        </div>
        
          <div id = "forgotpass">
		
		    <p>Forgot password window</p>

                		<input type = "image" id = "close_login2" src = "images/close.png">
                <form method = "post" action = "forgetpass.php">
               			<input type ="text" id = "email" placeholder = "Email Id" name = "eid"><br><br>
             			<input type ="text" id = "mobile" placeholder = "Mobile Number" name = "mobno"><br><br>
               			 <input type = "submit" id = "pass_submit" value = "submit"><br><br>
              
            	</form>

        </div>
        
        
        
        <div id = "registerform">
		
		    <p>New User Registration</p>

                	<input type = "image" id = "close_login1" src = "images/close.png">
                <form method = "post" action = "register.php" name="frm">
                	<input type ="text" id = "FirstName" placeholder = "First Name" name = "fname">
                	<input type ="text" id = "LastName" placeholder = "Last Name" name = "lname">
                	<input type ="date" id = "dob" placeholder = "date of birth" name = "dob"><br><br>
                	<label id="check">
                		Gender :<input type="radio" name="gender" value="male" checked> Male
  						<input type="radio" name="gender" value="female"> Female
  					</label>
  					<br>
  					<br>
              		<label id="check">Enter address:<br>
              		&nbsp;&nbsp;<textarea rows="3"  cols="33">
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
					<input type = "email" id = "email" name = "emailId" placeholder = "Email Id">
              		<input type = "text" id = "mobileNumber" name = "mnumber" placeholder = "Mobile Number">


              		
              		
              		<input type = "password" id = "password" name = "pass" placeholder = "Create password">
                	<input type = "password" id = "cpassword" name = "cpass" placeholder = "re-enter password">
               		 <input type = "submit" id = "dologin" value = "Register"><br><br><br>
                
            </form>

        </div>
        
<div id = "registerform1">
		
		    <p>New User Registration</p>

                	<input type = "image" id = "close_login3" src = "images/close.png">
                <form method = "post" action = "register.php" name="frm" onclick="return validateform()">
                	<input type ="text" id = "FirstName" placeholder = "First Name" name = "fname">
                	<input type ="text" id = "LastName" placeholder = "Last Name" name = "lname">
                	<input type ="date" id = "dob" placeholder = "date of birth" name = "dob"><br><br>
                	<label id="check">
                		Gender :<input type="radio" name="gender" value="male" checked> Male
  						<input type="radio" name="gender" value="female"> Female
  					</label>
  					<br>
  					<br>
              		<label id="check">Enter address:<br>
              		&nbsp;&nbsp;<textarea rows="3"  cols="33">
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
					<input type = "email" id = "email" name = "emailId" placeholder = "Email Id">
              		<input type = "text" id = "mobileNumber" name = "mnumber" placeholder = "Mobile Number">


              		
              		
              		<input type = "password" id = "password" name = "pass" placeholder = "Create password">
                	<input type = "password" id = "cpassword" name = "cpass" placeholder = "re-enter password">
               		 <input type = "submit" id = "dologin" value = "Register"><br><br><br>
                
            </form>

        </div>
        <div id = "aboutus">
		
		    <p>About Us Window</p>

                		<input type = "image" id = "close_login4" src = "images/close.png">
                <form method = "post" action = "forgetpass.php">
                <p><input type = "image" id = "my_img" src = "images/imgA.jpg"></p>
                <br>
                <br>
                <br>
            	</form>

        </div>
        
         
        
       
     </center>

     
</div>

   </body>
</html>