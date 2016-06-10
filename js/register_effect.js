$(document).ready(function(){

   $("#show_register").click(function(){
    showpopup();
   });
   $("#close_login1").click(function(){
    hidepopup();
   });

});


function showpopup()
{
   $("#registerform").fadeIn();
   $("#registerform").css({"visibility":"visible","display":"block"});
}

function hidepopup()
{
   $("#registerform").fadeOut();
   $("#registerform").css({"visibility":"hidden","display":"none"});
}

