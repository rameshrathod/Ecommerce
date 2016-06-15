	
	//login window pop up starts here
	if($("#show_login"))
		{
	
			$(document).ready(function(){
	
					$("#show_login").click(function(){
						showpopup();
						hidepopup1();
						hidepopup2();
						hidepopup3();
						hidepopup4();
						hidepopup5();
					});
					$("#close_login").click(function(){
						hidepopup();
					});
	
	});
	
	
				function showpopup()
				{
					$("#loginform").fadeIn();
					$("#loginform").css({"visibility":"visible","display":"block"});
				}
	
				function hidepopup()
				{
					$("#loginform").fadeOut();
					$("#loginform").css({"visibility":"hidden","display":"none"});
				}
	
	//forgot password window pop up starts here
	
	
					if($("#forgot_pass"))
					{ 
	
						$(document).ready(function(){
	
							$("#forgot_pass").click(function(){
								showpopup();
								hidepopup();
								hidepopup2();
								hidepopup3();
								hidepopup4();
								hidepopup5();
							});
							$("#close_login2").click(function(){
								hidepopup1();
							});
		   
							$("#loginform").fadeOut();
							$("#loginform").css({"visibility":"hidden","display":"none"});
	
						});
	
	
						function showpopup()
						{
							$("#forgotpass").fadeIn();
							$("#forgotpass").css({"visibility":"visible","display":"block"});
						}
	
						function hidepopup1()
						{
							$("#forgotpass").fadeOut();
							$("#forgotpass").css({"visibility":"hidden","display":"none"});
						}
	
	
	
					}
	//forgot password window pop up ends here
					
					
					//register1 window pop up starts here			
					if($("#show_register1"))
					{
						$(document).ready(function(){
	
							$("#show_register1").click(function(){
								showpopup();
								hidepopup();
								hidepopup1();
								hidepopup2();
								hidepopup4();
								hidepopup5();
							});
							$("#close_login3").click(function(){
								hidepopup3();
							});
	
						});
	
	
						function showpopup()
						{
							$("#registerform1").fadeIn();
							$("#registerform1").css({"visibility":"visible","display":"block"});
						}
	
						function hidepopup3()
						{
							$("#registerform1").fadeOut();
							$("#registerform1").css({"visibility":"hidden","display":"none"});
						}
	
	
		
					}
	
	//register window pop up ends here
	

		
		
			}
	
	//login window pop up ends here
	
	
	
	
	//register window pop up starts here
					if($("#show_register"))
					{
						$(document).ready(function(){
	
							$("#show_register").click(function(){
								showpopup();
								hidepopup();
								hidepopup1();
								hidepopup3();
								hidepopup4();
								hidepopup5();
							});
							$("#close_login1").click(function(){
								hidepopup2();
							});
	
						});
	
	
						function showpopup()
						{
							$("#registerform").fadeIn();
							$("#registerform").css({"visibility":"visible","display":"block"});
						}
	
						function hidepopup2()
						{
							$("#registerform").fadeOut();
							$("#registerform").css({"visibility":"hidden","display":"none"});
						}
	
	
		
					}
	
	//register window pop up ends here
	
//---------------------------------------
					if($("#show_aboutus"))
					{
						$(document).ready(function(){
	
							$("#show_aboutus").click(function(){
								showpopup4();
								hidepopup();
								hidepopup1();
								hidepopup2();
								hidepopup3();
								hidepopup5();
							});
							$("#close_login4").click(function(){
								hidepopup4();
							});
	
						});
	
	
						function showpopup4()
						{
							$("#aboutus").fadeIn();
							$("#aboutus").css({"visibility":"visible","display":"block"});
						}
	
						function hidepopup4()
						{
							$("#aboutus").fadeOut();
							$("#aboutus").css({"visibility":"hidden","display":"none"});
						}
	
	
		
					}
				
					
					//-------------------------show products---------------------
					
					
					if($("#show_products"))
					{
						$(document).ready(function(){
	
							$("#show_products").click(function(){
								showpopup5();
								hidepopup();
								hidepopup1();
								hidepopup2();
								hidepopup3();
								hidepopup4();
							});
							$("#close_login5").click(function(){
								hidepopup5();
							});
	
						});
	
	
						function showpopup5()
						{
							$("#products").fadeIn();
							$("#products").css({"visibility":"visible","display":"block"});
						}
	
						function hidepopup5()
						{
							$("#products").fadeOut();
							$("#products").css({"visibility":"hidden","display":"none"});
						}
	
	
		
					}
				
					