<?php

session_start();

if(isset($_GET['ref'])){
$_SESSION['ref'] = $_GET['ref'];
}



if(isset($_SESSION['ref'])){
$ref = $_SESSION['ref'];
}


else{
$ref = '';
}

?>

<!DOCTYPE html>
<html lang="en">
     <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign - In | Multitrack Cargo Express | The Best way to invest in Forex, Cryptocurrencies, Stocks, and Binary Option | Best Crypto Wallets</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
 <!-- Favicon Icon -->
<link rel="shortcut icon" href="images/favicon.ico" />
</head>




<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">


<div class="auth-layout-wrap" style="background-image: url(dist-assets/images/photo-wide-4.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12 pb-16">
                
                
                
                
                
                
                
                
     <!--justMyPopUpAlert Begins here--> <div id="justMyPopUpAlert" style="text-align:center"> 
        <div style="background:#FFF; min-width:400px; padding:0px 0px 5px 0px;"> 
         <table width="100%" border="0">
  <tr style="background:#FC3; height:20px;">
    <td style="padding:10px; text-align:left; color:#069; font-weight:bold;">
    <img src="images/s_attention.png" width="16" height="16" style="float:left; margin-right:5px;">Message Alert!
    <span style="display:inline-block; clear:both;"></span>
    </td>
  </tr>
  <tr>
    <td id="displayMsg2" style="padding:5px;font-style:italic; font-size:12px; font-weight:bold;">&nbsp;</td>
  </tr>
</table>

        <input type="button" value="ok" name="ok_button2" id="ok_button2" class="b-close btn btn-primary" style="cursor:pointer; width:70px; padding:2px 7px;">
       </div>  
       
       </div> <!--justMyPopUpAlert ends here-->




<!--justMyPopUp Begins here--> <div id="justMyPopUp" style="text-align:center"> 
        <div style="background:#FFF; min-width:400px; padding:0px 0px 5px 0px;"> 
         <table width="100%" border="0">
  <tr style="background:#FC3; height:20px;">
    <td style="padding:10px; text-align:left; color:#069; font-weight:bold;">
    <img src="images/s_attention.png" width="16" height="16" style="float:left; margin-right:5px;">Message Alert!
    <span style="display:inline-block; clear:both;"></span>
    </td>
  </tr>
  <tr>
    <td id="displayMsg" style="padding:5px 10px; font-size:12px; font-style:italic; font-weight:bold;">&nbsp;</td>
  </tr>
</table>
        <input type="button" value="ok" name="ok_button" id="ok_button" class="b-close btn btn-primary" style="cursor:pointer;" onClick="reloadPage()">
       </div>  
       
       </div> <!-- JustMyPopUp Ends Here -->
       
  


<div id="loadingPop">
  <input type="button" class="b-close" style="cursor:pointer;
    position:absolute;
    right:10px;
    top:5px; font-size:18px; font-weight:bold; display:none;" id="CloseMeNowLog">
            <i class="loader-bubble loader-bubble-primary"></i></div>           
                
                
                
                
                
                
                
                
                
                
                    <div class="p-4">
                        <div class="text-center mb-0 mt-4"><img src="dist-assets/images/logo.png" alt=""></div>
                        <h1 class="mb-3 text-18">Sign In</h1>
                        <form class="formLogin" method="post" name="loginForm" id="loginForm" onsubmit="return false">
                            <div class="form-group">
                                <label for="email">Username or Email Address *</label>
       <input class="form-control form-control-rounded" id="username" name="username" type="text" placeholder="Username or Email Address ">
                            </div>
                          
                            
                            
                            <div class="form-group">
                                <label for="password">Password</label>
<input class="form-control form-control-rounded" id="user_password" name="user_password" type="password" placeholder="Password">
                            </div>
<button class="btn btn-rounded btn-primary btn-block mt-2" type="submit" onclick="loginFunc()">Sign In</button>
                        </form>
                        <div class="mt-3 text-center"><a class="text-muted" href="forgot-password">
                                <u>Forgot Password?</u></a></div>
                    </div>
                    
                    
                    
                    
                    
                    
                    <div class="p-8">
                    <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="../register">
                    Create An Account
                    </a></div>
                    
                    
                    
                    
                </div>
                
                
            </div>
        </div>
    </div>
</div>



 </div><!-- ============ Search UI Start ============= -->
    
    <!-- ============ Search UI End ============= -->
    <script src="dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="dist-assets/js/scripts/script.min.js"></script>
    <script src="dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    <script src="dist-assets/js/plugins/echarts.min.js"></script>
    <script src="dist-assets/js/scripts/echart.options.min.js"></script>
    <script src="dist-assets/js/scripts/dashboard.v1.script.min.js"></script>
    
    
    
    
    
    <script src="js/jquery.bpopups2.min.js"></script>




 <script language="javascript" type="text/javascript">

 function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	

function loginFunc(){

													
var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;


var username = document.getElementById('username').value;
username=username.replace(/^\s+|\s+$/g,'');
if(username==''){
alert("Please enter your username email address address");
document.getElementById('username').focus();
return false;
}


/*var myemailCheck1=emailPattern.test(lg_user_email_address);
    
	if(myemailCheck1==false){
	alert("Please provide a valid email address");
	document.getElementById("lg_user_email_address").focus();
	return false;
	}*/
	



	


var user_password = document.getElementById('user_password').value;
user_password=user_password.replace(/^\s+|\s+$/g,'');
if(user_password==''){
alert("Please enter password!");
document.getElementById('user_password').focus();
return false;
}





var dataString = $('#loginForm').serialize();
var strURL="user_login_process.php";


$('#loadingPop').bPopup({
modalClose: false,
opacity: 0.3,
positionStyle: 'fixed' //'fixed' or 'absolute'
});



var req = getXMLHTTP();
if (req) {
req.onreadystatechange = function() {
if (req.readyState == 4) {
					// only if "OK"
if (req.status == 200) {
setTimeout(function (){
document.getElementById('CloseMeNowLog').click();

if(req.responseText==1){
setTimeout(function (){

location ='./';

},300);

return false;

}



else if(req.responseText==2){
alert("Invalid login credentials");
return false; 
}


else if(req.responseText==3){
alert("Your account has been suspended, please contact support");
return false; 
}



else if(req.responseText==5){

setTimeout(function (){
$('#oneTimePinDiv').bPopup({
modalClose: false,
opacity: 0.3,
positionStyle: 'fixed' //'fixed' or 'absolute'
});

},400);


return false; 
}


else {
alert("Authentication failed, please try later!");
return false; 
}

},1000);


										
} else {
setTimeout(function (){document.getElementById('CloseMeNowLog').click();
},300);

setTimeout(function (){
alert("There was a problem while using XMLHTTP:\n" + req.statusText+ "!");
},500);
return false; 
}
}				
	}
		
req.open("POST", strURL, true);
req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
req.send(dataString);
}	
	
}








function submitPwdReqFunc(){

													
var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;


var pwdEmail = document.getElementById('pwdEmail').value;
pwdEmail=pwdEmail.replace(/^\s+|\s+$/g,'');
if(pwdEmail==''){
alert("Please enter email address address");
document.getElementById('pwdEmail').focus();
return false;
}


var myemailCheck1=emailPattern.test(pwdEmail);
    
	if(myemailCheck1==false){
	alert("Please provide a valid email address");
	document.getElementById("pwdEmail").focus();
	return false;
	}
	


var dataString = $('#pwdForm').serialize();
var strURL="user_pwd_req_process.php";


$('#loadingPop').bPopup({
modalClose: false,
opacity: 0.3,
positionStyle: 'fixed' //'fixed' or 'absolute'
});



var req = getXMLHTTP();
if (req) {
req.onreadystatechange = function() {
if (req.readyState == 4) {

					// only if "OK"
if (req.status == 200) {
setTimeout(function (){
document.getElementById('CloseMeNowLog').click();

if(req.responseText==1){
setTimeout(function (){

alert("Your password has been successfully sent to your email address!");
location ='login';

},300);

setTimeout(function (){
document.getElementById('ok_button2').click();
},5000);

return false;

}



else if(req.responseText==2){
alert("Your email address was not found!");
return false; 
}


else if(req.responseText==3){
alert("Your account has been suspended, please contact support");
return false; 
}



else {
alert("Unable to process your request!");
return false; 
}

},1000);


										
} else {
setTimeout(function (){document.getElementById('CloseMeNowLog').click();
},300);

setTimeout(function (){
alert("There was a problem while using XMLHTTP:\n" + req.statusText+ "!");
},500);
return false; 
}
}				
	}
		
req.open("POST", strURL, true);
req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
req.send(dataString);
}	
	
}











function submitOtpFunc(){
var one_time_pin = document.getElementById('one_time_pin').value;
one_time_pin=one_time_pin.replace(/^\s+|\s+$/g,'');
if(one_time_pin==''){
alert("Please enter one time pin!");
document.getElementById('one_time_pin').focus();
return false;
}


$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});	
	
var strURL="../one_timepin_process.php?one_time_pin="+one_time_pin;

		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {

if(req.responseText == 1){
setTimeout(function (){
document.getElementById('CloseMeNowLog').click();
},300);	

setTimeout(function (){
location ='./';
},400);	

}



else{

setTimeout(function (){
document.getElementById('CloseMeNowLog').click();
},300);	


setTimeout(function (){
alert("Authentication failed!");

//alert(req.responseText);
},400);

	
}
			
				
					
					}
					else {
					setTimeout(function (){	
					document.getElementById('CloseMeNowLog').click();
					},300);
						setTimeout(function (){	
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
						},1000);
					}
				}				
			}	
									
	
			/*req.open("POST", strURL, true);
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
			req.send(dataString);*/
	
	req.open("GET", strURL, true);
			req.send(null);
		}
		
}

	</script>
    
    
    
    
    
</body>




