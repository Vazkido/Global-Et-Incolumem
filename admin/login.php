<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign - In | Multitrack Cargo Express | The Best way to invest in Forex, Cryptocurrencies, Stocks, and Binary Option | Best Crypto Wallets</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100" style="background-image:url('images/bg/loginbg.jpg');">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-4">
                
                
                
                
                
                
                
                
                       
                
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
            <i class="las la-spin la-spinner"></i></div>           
                
      
                
                
                
                
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form" style="padding:10px 30px;">
									<div class="text-center mb-3">
										<img src="images/logo-full.png" alt="">
									</div>
                                    <h4 class="text-center mb-4">Admin Login</h4>
                        <form class="login-form" id="logFormNew" name="logFormNew" onsubmit="return false;">
              <input type="hidden" id="applicant_LogCheck" name="applicant_LogCheck"  value="1">
                                        <div class="form-group">
      <input type="text" id="username" name="username" class="form-control" value="" placeholder="Username">
                                        </div>
                                         
                                         
                                         
                                         
                                         <div class="form-group">
                                         <br>
  <input type="password" name="password" id="password" class="form-control" value="" placeholder="Password">
                                        </div>
                                        
                                        
                                        
                                        <div class="text-center">
                                        <br>
                                            <button type="submit" class="btn btn-primary btn-block" onclick="loginFunc()">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                    &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
    <script src="./js/demo.js"></script>
    <!--
    <script src="./js/styleSwitcher.js"></script>
    
    -->
    
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
alert("Please your username");
document.getElementById('username').focus();
return false;
}



var password = document.getElementById('password').value;
password=password.replace(/^\s+|\s+$/g,'');
if(password==''){
alert("Please enter password!");
document.getElementById('password').focus();
return false;
}





var dataString = $('#logFormNew').serialize();
var strURL="admin_login_process.php";


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

if(req.responseText==3){
setTimeout(function (){

location ='admin-index';

},300);

setTimeout(function (){
document.getElementById('ok_button2').click();
},5000);

return false;

}



else if(req.responseText==1){
alert("Invalid password or username");
return false; 
}


else if(req.responseText==2){
alert("Your account has been suspended, please contact support");
return false; 
}



else {
alert(req.responseText);
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


	</script>    

    
    
    
</body>
</html>