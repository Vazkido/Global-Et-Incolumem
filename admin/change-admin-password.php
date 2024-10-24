<?php 
session_start();
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
header("Location:login");
exit;
}


require_once("../config.php");

$admin_id=$_SESSION['admin_id'];

$sql = "SELECT
password
FROM tbl_admin WHERE admin_id='$admin_id'";
$result= mysqli_query($db,$sql) or die (mysqli_error($db)); 	
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){		
$password=$row["password"];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Multitrack Cargo Express | The Best way to invest in Forex, Cryptocurrencies, Stocks, and Binary Option | Best Crypto Wallets</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="./vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
          
          
          <!-- header starts --->
          
          <?php require_once("admin-header.php");?>
          
          <!-- header stops --->
        
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				
				
				
				<div class="form-head mb-sm-3 mb-3 d-flex flex-wrap align-items-center breadcrumb">
					
					
					<h4 class="font-w600 mb-2 mr-auto ">
					Change Password
					</h4>
					
								
					
				</div>
				
				
			



<div class="row mb-sm-3">
					<div class="col-xl-12 col-xxl-12">

                        <div class="card">
                        
                        
                        
                        
                        <div class="card-body">
                        
                        
                        
                        
                        
                        
                        
  <div class="pt-4">
                                                
             
<form action="" method="POST" onSubmit="return false" name="changePwdForm" id="changePwdForm">
<input type="hidden" id="pf_client_password" name="pf_client_password" value="<?php echo $password;?>">
                            
                                <div class="row row-xs">
                                    <div class="col-md-4">
                                    <label style="font-size:12px; font-weight:bold; color:#322740;">Current Password *</label>
     <input class="form-control" type="password" name="curpassword" id="curpassword" value="" placeholder="Current Password *">
                                    </div>
                                    
                                    <div class="col-md-4">
                                    <label style="font-size:12px; font-weight:bold; color:#322740;">New Password *</label>
                                    
  <input class="form-control" type="password" name="client_password" id="client_password" placeholder="New Password *" value="">
  
  
                                    </div>



                                    <div class="col-md-4 mt-3 mt-md-0">
                                    <label style="font-size:12px; font-weight:bold; color:#322740;">Confirm New Password *</label>
        <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm New Password *" value="">
                                    </div>
                                    <div class="col-md-12 pt-4">
       <button class="btn btn-primary" onclick="changePwdFunc()">Change Password</button>
                                    </div>
                                </div>
                                
                                
                                
                                </form>
                                   
                                                
                                                
                                                
                                            </div>                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        </div>
                        
                        
                 </div>                    </div>

						</div>		
									
									
									
				
									
									
									
							</div>
		</div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php require_once("footer.php");?>
                <!--**********************************
            Footer end
        ***********************************-->
		
		
		
		
		
		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="./vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script> <!-- theme settings file -->
    <script src="./js/demo.js"></script>
    
    <script src="js/jquery.bpopups2.min.js"></script>
    
    <script type="text/javascript" src="js/jquery.form.js"></script>
    
    
    
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
	


function changePwdFunc(){
														
var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;


var pf_client_password = document.getElementById('pf_client_password').value;
pf_client_password=pf_client_password.replace(/^\s+|\s+$/g,'');


var curpassword = document.getElementById('curpassword').value;
curpassword=curpassword.replace(/^\s+|\s+$/g,'');
if(curpassword==''){
alert("Please enter your current password!");
document.getElementById('curpassword').focus();
return false;
}


if(curpassword!=pf_client_password){
alert("The current password you provided is invalid!");
document.getElementById('curpassword').focus();
return false;
}



var client_password = document.getElementById('client_password').value;
client_password=client_password.replace(/^\s+|\s+$/g,'');
if(client_password==''){
alert("Please enter your new password!");
document.getElementById('client_password').focus();
return false;
}



var confirmpassword = document.getElementById('confirmpassword').value;
confirmpassword=confirmpassword.replace(/^\s+|\s+$/g,'');
if(confirmpassword==''){
alert("Please confirm your password!");
document.getElementById('confirmpassword').focus();
return false;
}


if(confirmpassword!=client_password){
alert("Your new passwords do not match!");
document.getElementById('confirmpassword').focus();
return false;
}




var dataString = $('#changePwdForm').serialize();
var strURL="change_pwd_process.php";


$('#myNewRegPop_up').bPopup({
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
document.getElementById('CloseMeNowPlease').click();

if(req.responseText==1){

setTimeout(function (){
	
document.getElementById('displayMsg2').innerHTML="Password successfully changed!";
$('#justMyPopUpAlert').bPopup({
modalClose: false,
opacity: 0.2,
positionStyle: 'absolute' //'fixed' or 'absolute'
});
},300);

setTimeout(function (){
document.getElementById('ok_button2').click();
location.reload(true);
},3000);

return false;

}




else {
document.getElementById('displayMsg2').innerHTML="An error occurred!";
$('#justMyPopUpAlert').bPopup({
modalClose: false,
opacity: 0.2,
positionStyle: 'absolute' //'fixed' or 'absolute'
});
return false; 
}

},1000);




										
} else {
setTimeout(function (){document.getElementById('CloseMeNowPlease').click();
},300);

setTimeout(function (){
document.getElementById('displayMsg2').innerHTML="There was a problem while using XMLHTTP:\n" + req.statusText+ "!";
$('#justMyPopUpAlert').bPopup({
modalClose: false,
opacity: 0.2,
positionStyle: 'absolute' //'fixed' or 'absolute'
});
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