<?php 
session_start();
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
header("Location:login");
exit;
}


require_once("../config.php");

function sanitizeClean($var){
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}

	 
	 
$md_cnm = 0;
$mdQ="SELECT * FROM tbl_site_info 
ORDER BY site_info_id ASC";
$mdQ_result= mysqli_query($db,$mdQ) or die(mysqli_error($db));

$md_cnm=mysqli_num_rows($mdQ_result);
if($md_cnm>0){ // if songs found
while($pf_row = mysqli_fetch_array($mdQ_result, MYSQLI_ASSOC)){ // while loop	
$site_info_id[]=sanitizeClean($pf_row["site_info_id"]);
$site_info_extra_data[]=$pf_row["site_info_extra_data"];
$site_info_name[]=sanitizeClean($pf_row["site_info_name"]);
$site_info_lastupdate[]=sanitizeClean($pf_row["site_info_lastupdate"]);
$site_info_data[]=sanitizeClean($pf_row["site_info_data"]);
} // end of while loop

} // end of content for middle pane


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
					Site Info
					</h4>
					
										
					
										
					
				</div>
				
				

<div class="row mb-sm-3">
					<div class="col-xl-12 col-xxl-12">

                        <div class="card">
                            
                            






<div class="card-body mb-4">      
                                                
             <form id="siteInfoForm" name="siteInfoForm" onSubmit="return false" method="post">


          
          
          
                  <div class="row">
                  
                                                   
 
 
<?php for($x=0; $x < count($site_info_id); $x++){?>


<input type="hidden" class="form-control" name="site_info_id[]"  value="<?php echo $site_info_id[$x];?>">



<div class="col-md-6 mb-4">
 
<input type="text" class="form-control" name="site_info_name[]" id="site_info_name<?php echo $site_info_id[$x];?>" value="<?php echo $site_info_name[$x];?>">
</div>

  


<div class="col-md-6 mb-4">
 
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text"><?php echo $site_info_extra_data[$x];?></span></div>

<input type="text" class="form-control" name="site_info_data[]" id="site_info_data<?php echo $site_info_id[$x];?>" value="<?php echo $site_info_data[$x];?>">
</div>
</div>


           
<?php }?>




         






<!-- /.col-lg-6 -->
                    




                    
                    
<!-- /.col-lg-6 -->
                                      
                  



                  


                                     
                    
                    
                    
<div class="col-md-12 mb-4" id="normalFormButtonDiv">
<button class="btn btn-primary" type="submit" onClick="updateSiteInfoFunc()"><span id="withButt">Submit Update</span></button>
<button type="reset" class="btn btn-danger btn-xs" id="getFormFiledButton" name="getFormFiledButton" style="text-transform:uppercase; padding:5px;display:none;"> <i class="fa fa-refresh"></i> Clear Form </button>


                          </div>
                          
                          
                           </div>

                    
                    </form>



                                
  





 </div>





                                    
                                    
                        </div>      
                         </div>

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
	
		

    /*$( document ).ready(function() {*/
	
	/*$( window ).on( "load", function() {
	
    });*/
	
	
	
	




function updateSiteInfoFunc(){



var dataString = $('#siteInfoForm').serialize();
var strURL="update_site_info_process.php";


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
	
alert("Operation successfully completed!");
},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}




else {
alert("An error occurred!");
//alert(req.responseText);
return false; 
}

},1000);




										
} else {
setTimeout(function (){document.getElementById('CloseMeNowPlease').click();
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