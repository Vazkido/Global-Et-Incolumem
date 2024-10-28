<?php
session_start();


require_once("config.php");

function sanitizeContent($var){
$var = str_replace('&nbsp;','',$var);
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}





// clients Query


$usNo =0;
$hNo = 0;

if(isset($_SESSION['shipmentTrackingNo'])){

$shipment_tracking_no = $_SESSION['shipmentTrackingNo'];


$usQ = "SELECT

*

FROM tbl_shipment m

INNER JOIN  tbl_shipper p ON p.shipper_refno=m.shipment_shipper_refno
INNER JOIN  tbl_recipient r ON r.recipient_shipment_tracking_no=m.shipment_tracking_no

WHERE m.shipment_tracking_no='$shipment_tracking_no'";

$usQ_r= mysqli_query($db,$usQ) or die (mysqli_error($db)); 
$usNo=mysqli_num_rows($usQ_r);

if ($usNo >0) { // if not found 2	
while($rows = mysqli_fetch_array($usQ_r, MYSQLI_ASSOC)){ // while loop 2


$shipment_id=sanitizeContent($rows["shipment_id"]);
$shipment_tracking_no=sanitizeContent($rows["shipment_tracking_no"]);
$shipment_shipper_refno=sanitizeContent($rows["shipment_shipper_refno"]);
$shipment_freight=sanitizeContent($rows["shipment_freight"]);
$shipment_weight=sanitizeContent($rows["shipment_weight"]);
$shipment_content_type=sanitizeContent($rows["shipment_content_type"]);
$shipment_description=sanitizeContent($rows["shipment_description"]);
$shipment_status=sanitizeContent($rows["shipment_status"]);
$shipment_take_off_point=sanitizeContent($rows["shipment_take_off_point"]);
$shipment_current_location=sanitizeContent($rows["shipment_current_location"]);
$shipment_final_destination=sanitizeContent($rows["shipment_final_destination"]);
$shipment_shipping_date=sanitizeContent($rows["shipment_shipping_date"]);
$shipment_shipping_time=sanitizeContent($rows["shipment_shipping_time"]);
$shipment_expected_delivery_date=sanitizeContent($rows["shipment_expected_delivery_date"]);
$shipment_expected_delivery_time=sanitizeContent($rows["shipment_expected_delivery_time"]);
$shipment_actual_delivery_date=sanitizeContent($rows["shipment_actual_delivery_date"]);
$shipment_actual_delivery_time=sanitizeContent($rows["shipment_actual_delivery_time"]);
$shipment_date_created=sanitizeContent($rows["shipment_date_created"]);



$shipper_id=sanitizeContent($rows["shipper_id"]);
$shipper_refno=sanitizeContent($rows["shipper_refno"]);
$shipper_full_name=sanitizeContent($rows["shipper_full_name"]);
$shipper_gender=sanitizeContent($rows["shipper_gender"]);
$shipper_phone=sanitizeContent($rows["shipper_phone"]);
$shipper_email=sanitizeContent($rows["shipper_email"]);
$shipper_address=sanitizeContent($rows["shipper_address"]);
$shipper_country_name=sanitizeContent($rows["shipper_country_name"]);
$shipper_state=sanitizeContent($rows["shipper_state"]);
$shipper_city=sanitizeContent($rows["shipper_city"]);
$shipper_zip_code=sanitizeContent($rows["shipper_zip_code"]);
$shipper_photo=sanitizeContent($rows["shipper_photo"]);




$recipient_id=sanitizeContent($rows["recipient_id"]);
$recipient_shipper_refno=sanitizeContent($rows["recipient_shipper_refno"]);
$recipient_full_name=sanitizeContent($rows["recipient_full_name"]);
$recipient_gender=sanitizeContent($rows["recipient_gender"]);
$recipient_phone=sanitizeContent($rows["recipient_phone"]);
$recipient_email=sanitizeContent($rows["recipient_email"]);
$recipient_address=sanitizeContent($rows["recipient_address"]);
$recipient_country_name=sanitizeContent($rows["recipient_country_name"]);
$recipient_state=sanitizeContent($rows["recipient_state"]);
$recipient_city=sanitizeContent($rows["recipient_city"]);
$recipient_zip_code=sanitizeContent($rows["recipient_zip_code"]);
$recipient_photo=sanitizeContent($rows["recipient_photo"]);
$recipient_shipment_tracking_no=sanitizeContent($rows["recipient_shipment_tracking_no"]);


} // while loop stops here



// query for shipment history starts


$querys="SELECT * FROM tbl_shipment_travel_history 

 WHERE shipment_travel_shipment_tracking_no='$shipment_tracking_no' 
 ORDER BY shipment_travel_history_id DESC";
 
$results=mysqli_query($db,$querys) or die(mysqli_error($db));

$hNo=mysqli_num_rows($results);


if($hNo>0){
while($rows = mysqli_fetch_array($results, MYSQLI_ASSOC)){

$shipment_travel_history_id[]=sanitizeContent($rows["shipment_travel_history_id"]);
$shipment_travel_shipment_tracking_no[]=sanitizeContent($rows["shipment_travel_shipment_tracking_no"]);
$shipment_travel_date[]=sanitizeContent($rows["shipment_travel_date"]);
$shipment_travel_time[]=sanitizeContent($rows["shipment_travel_time"]);

$shipment_travel_status[]=sanitizeContent($rows["shipment_travel_status"]);
$shipment_travel_description[]=sanitizeContent($rows["shipment_travel_description"]);
$shipment_travel_history_location[]=sanitizeContent($rows["shipment_travel_history_location"]);

} // shipment history while loop stops here

}

// query for shipment history stops


}



}


// end of clients Query





// country Query
$cn_num =0;
$cn_sql = "SELECT
country_id,
country_name
FROM tbl_country ORDER BY country_name ASC";
$cn_result= mysqli_query($db,$cn_sql) or die (mysqli_error($db)); 
$cn_num=mysqli_num_rows($cn_result);

if ($cn_num >0) { // if not found 2	
while($cn_row = mysqli_fetch_array($cn_result, MYSQLI_ASSOC)){ // while loop 2

$country_id[]=$cn_row["country_id"];
$country_name[]=sanitizeContent($cn_row["country_name"]);
}
}

// end of country Query





?>

	
	<!DOCTYPE html>
	<html lang="en">
	<head>
		
			<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
 <meta name="keywords"content="Global Et Incolumem and Courier Services, Logistics, mailroom , warehousing , best courier service worlwide, global logistics company, ecommerce delivery, ecommerce courier service ,local shipment, international shipment, same day delivery , logistics support, Amazon delivery, delivery services, delivery service for ecommerce, ecommerce delivery in Globally , deal dey delivery, Global logistics company">
        
<meta name="description" content="Global Et Incolumem is a leading logistics and distribution services company established in 2009. We offer a wide array of express courier and logistic support solutions to our various customers">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta http-equiv="ImageToolbar" content="No"/>
<meta http-equiv="content-language" content="en-US"/>
<meta name="title" content="Global Et Incolumem | Express Delivery, Courier &amp; Shipping Services | Worlwide"/>

<meta property="og:type" content="Logistics and Courier Services" />
<meta property="og:title" content="Global Et Incolumem | Express Delivery, Courier &amp; Shipping Services | Worlwide" />
<meta property="og:description" content="Global Et Incolumem is a leading logistics and distribution services company established in 2009. We offer a wide array of express courier and logistic support solutions to our various customers">
<meta name="keywords">
<meta property="og:site_name" content="Global Et Incolumem"/>


    <title>Tracking Details :: Global Et Incolumem | Express Delivery, Courier &amp; Shipping Services | Worlwide</title>


    <link href="asset/images/favicon/favicon.png" rel="icon"/>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		
		
	
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/fontawesome-all.css">
		<link rel="stylesheet" href="assets/css/flaticon.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/nice-select.css">
		<link rel="stylesheet" href="assets/css/video.min.css">
		<link rel="stylesheet" href="assets/css/animated-slider.css">
		<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
		<link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/rs6.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		<link rel="stylesheet" href="assets/css/style.css">
		
		<link href="tracking/css/font-awesome.min.css" rel="stylesheet">
		<link href="tracking/vendors/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="tracking/css/style.css" rel="stylesheet">
		
		
		
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/flaticon-02.css">
		<link rel="stylesheet" href="assets/css/jquery-ui.css">
		<link rel="stylesheet" href="assets/css/custom-animate.css">
		<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="assets/css/responsive.css">


		
		


	</head>
	<body>
		<!-- <div id="preloader"></div> -->
		<!-- <div class="up">
			<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
		</div>
		 -->
		
		
				
<!-- Start of header section
	============================================= -->


	<!-- End of header section
	============================================= -->

<!-- Start of Breadcrumb section
	============================================= -->
	<section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="assets/img/bg/bread-bg.jpg">
		<span class="background_overlay"></span>
		<span class="design-shape position-absolute"><img src="assets/img/shape/tmd-sh.png" alt=""></span>
		<div class="container">
			<div class="ft-breadcrumb-content headline text-center position-relative">
				<h2>Tracking Details</h2>
				<div class="ft-breadcrumb-list ul-li">
					<ul>
						<li><a href="./">Home</a></li>
						<li>Tracking Details</li>
					</ul>
				</div>
			</div>
		</div>
	</section>	
<!-- End of Breadcrumb section
	============================================= -->









	
	
	<!-- Tracking Section -->
		
		<!-- End Tracking Section -->
		
	
	
	
	
	






<section class="timeline_tracking_area">
<div class="container">



<?php

if($usNo>0){

?>



<div class="timeline_tracking_inner">
<div class="timeline_tracking_box">
<div class="tracking_head">
<h4 style="font-size:34px; color:#00044b; font-weight:bold; text-transform:uppercase"><?php echo $shipment_tracking_no;?></h4>
</div>
<div class="scheduled_area">
<ul>
<li>
<div class="schedul_box">
<p style="font-size:12px;"><strong><?php echo $shipment_take_off_point;?></strong> </p>
</div>
<div class="s_icontext" style="color:#ea1e00;">Take-Off Point</div>
<div class="s_icon"></div>
</li>



<li>
<div class="schedul_box">
<p style="font-size:12px; color:#ea1e00;"> <strong><?php echo $shipment_status!='Delivered' ? $shipment_current_location : 'Delivered';?></strong> </p>
</div>

<div class="s_icontext" style="color:#005be8;">Current Location</div>
<div class="s_icon <?php echo $shipment_status!='Delivered' ? 'active' : '' ;?>"></div>
</li>



<li>
<div class="schedul_box">
<p style="font-size:12px;"> <strong><?php echo $shipment_final_destination;?></strong> </p>
</div>

<div class="s_icontext" style="color:#4cbb87;">Final Destination</div>
<div class="s_icon <?php echo $shipment_status=='Delivered' ? 'active' : '' ;?>"></div>
</li>



</ul>





<div class="col-lg-12" style="margin-top:40px;">


<hr>

						<div class="ft-about-text-wrapper">
							<div class="ft-section-title headline pera-content">
								<span class="sub-title">
	<?php echo $shipment_status=='Delivered' ? 'Date Delivered' : 'Expected Delivery Date' ;?>
								</span>
								

<?php if($shipment_status!='Delivered'){ ?>

								<h2>
																
<?php 
echo date("d F, Y", strtotime($shipment_expected_delivery_date));?>
 <span style="color:#757575; font-size:18px;">By <?php echo $shipment_expected_delivery_time;?></span>
								</h2>
								
		<?php
		}
		
		else{
		?>
		
		<h2>
		<?php 
echo date("d F, Y", strtotime($shipment_actual_delivery_date));?>
 <span style="color:#757575; font-size:18px;">By <?php echo $shipment_actual_delivery_time;?></span>
								</h2>
								
		<?php
		}
		
		?>
						
								
								
							</div>
							
							
							
							
							
							
							<div class="ft-about-feature-list-warpper">
							
							
							
							
							
							
							
							

							
							
								<div class="ft-about-feature-list-item d-flex align-items-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
									<div class="ft-about-feature-icon d-flex align-items-center justify-content-center">
										<i class="flaticon-deadline"></i>
									</div>
									<div class="ft-about-feature-text headline pera-content">
										<h3>Status</h3>
										<p>
										<?php echo $shipment_status;?>
										</p>
									</div>
								</div>
								
								
								
								
								
								
								
								
							
								<div class="tracking_in tag-delivered" style="margin-bottom:5px">
<h4 style="color:#fff;">Sender's Details</h4>
</div>
								
																
								
								
								
								<div class="ft-about-feature-list-item d-flex align-items-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
								<div class="ft-about-feature-text headline pera-content">
								<h3 style="font-size:14px;">Name:</h3>
										<p>
								<?php echo $shipper_full_name;?>
										</p>
										<hr>
										
								<h3 style="font-size:14px;">Contact Address:</h3>
								
										<p>
		<?php echo "$shipper_address, $shipper_city, $shipper_state, $shipper_country_name";?>
										</p>
										
										
										
									</div>
								</div>
								
								
								
								
								
								
								
								
								
					
								
							
								<div class="tracking_in tag-delivered" style="margin-bottom:5px; background:#ea1e00;">
<h4 style="color:#fff;">Receiver's Details</h4>
</div>
								
																
								
								
								
								<div class="ft-about-feature-list-item d-flex align-items-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
								<div class="ft-about-feature-text headline pera-content">
										
										<h3 style="font-size:14px;">Name:</h3>
										<p>
										<?php echo $recipient_full_name;?>
										</p>
										<hr>
										
										<h3 style="font-size:14px;">Contact Address:</h3>
										<p>
										<?php echo "$recipient_address, $recipient_city, $recipient_state, $recipient_country_name";?>
										</p>
										
									</div>
								</div>
								
								
			
								
								
								
								
								
								
								
								
								
								
								
								<div class="ft-about-feature-list-item d-flex align-items-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
								<div class="ft-about-feature-text headline pera-content">
										<h3 style="font-size:14px;">Shipment Dates</h3>
										<hr style="margin-top:0px;">
										<p>
										<strong>Date Shipped:</strong> <?php echo "$shipment_shipping_date $shipment_shipping_time";?>
										</p>
										<hr>
										<p>
		<strong>Expected Delivery Date :</strong> <?php echo "$shipment_expected_delivery_date $shipment_expected_delivery_time";?>
										</p>
										
									</div>
								</div>
								
								

								
								
								
								
								
								
								
								<div class="ft-about-feature-list-item d-flex align-items-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
								<div class="ft-about-feature-text headline pera-content">
										<h3>Shipment Details</h3>
										<hr style="margin-top:0px;">
										
										
										<p>
										<strong>Content Type:</strong> <?php echo $shipment_content_type;?>
										</p>
										
										<hr>
										
										<p>
										<strong>Description:</strong> <?php echo $shipment_description;?>
										</p>
										<hr>
										<p>
										<strong>Freight Type :</strong> <?php echo $shipment_freight;?>
										</p>
										
										
										<hr>
										<p>
										<strong>Weight :</strong> <?php echo $shipment_weight;?>
										</p>
										
									</div>
								</div>


								
								
								
								
								
								
								<div class="tracking_in tag-delivered" style="margin-bottom:5px">
<h4 style="color:#fff;">Shipment Travel History</h4>
</div>
								
																
								
								
								
								
								
								
<div class="card-body" style="padding:10px 5px 10px 0px;">
 
 
 
 
 
 <?php if($hNo>0){?>
							
							
							<div class="table-responsive dt-responsive" style="padding-bottom:20px;">
                            <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            
              
              <form id="clientListForm" name="clientListForm" method="post">

<div id="clientDiv">
             

<table class="table table-striped">
                                <thead style="background:#322740; color:#fff;">
                                    <tr role="row">
                                    
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Date  Time</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Location</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                     
                                    
          

<?php for($h=0; $h < count($shipment_travel_history_id); $h++){?>
   <tr style="font-size:13px;">
   
   
<td style="border-right:none">
<?php echo "$shipment_travel_date[$h]  $shipment_travel_time[$h]";?>
</td>


<td><?php echo "$shipment_travel_history_location[$h]";?></td>

 <td><?php echo "$shipment_travel_description[$h]";?></td>
 
 
 
                              
                                        
</tr>
                                    
    <?php
    
    }
    
    ?>
    
    
    
                                
                                    
                                
                
                
                                                                    
                                                                        
                                    
                                    
                                    </tbody>
                                
                            </table>
                            
               
                            


</div>
      

</form>

 

   
                  
                            
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        <?php }
                        
                        
                        else{
                        
                        echo '<h4>No history found</h4>';
                        
                        }
                        ?>

                                                            
                             
                            </div>
								
								
								
								
								
								
															</div>
						</div>
					</div>





</div>
















</div>
</div>


<?php
}

else{

?>

<div class="col-lg-12 col-md-12 pt-5 pb-5 text-center">

<h4>Tracking details not found</h4>

</div>

<?php
}

?>

</div>
</section>










		

<!-- Start of Footer   section
	============================================= -->
	

			
<!-- End of FAQ why choose  section
	============================================= -->	

	<!-- For Js Library -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/appear.js"></script>
	<script src="assets/js/slick.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	<script src="assets/js/waypoints.min.js"></script>
	<script src="assets/js/jquery.nice-select.min.js"></script>
	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="assets/js/jquery.filterizr.js"></script>
	<script src="assets/js/rbtools.min.js"></script>
	<script src="assets/js/jquery.cssslider.min.js"></script>
	<script src="assets/js/rs6.min.js"></script>
	<script src="assets/js/knob.js"></script>
	<script src="assets/js/script.js"></script>
	<!--
	<script src="assets/js/gmaps.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
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
	

        
        
function trackNowFunc(){

var accPattern = /^[0-9._-]{5,11}$/;

var shipment_tracking_no = document.getElementById('shipment_tracking_no').value;

shipment_tracking_no=shipment_tracking_no.replace(/^\s+|\s+$/g,'');


if(shipment_tracking_no==''){
alert ("Please enter your tracking number");
document.getElementById("shipment_tracking_no").focus();
return false;
}





var dataString = $('#frmTrack').serialize();

		$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});
		
		
		var strURL="tracking_process.php";
		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					
					
					if (req.status == 200) {


setTimeout(function (){

document.getElementById('CloseMeNowLog').click();

if(req.responseText==1){
alert("Error 201: Invalid Tracking Number");
return false;
}



else if (req.responseText==2){
alert("Error 203:  Tracking Number Not Authenticated");
return false;

}

else if (req.responseText==3){

location.reload(true);

}



else {
//alert("An unknown error occurred, please try agian");
alert(req.responseText);
return false;
}




},1000);										
					} else {
						setTimeout(function (){	
					document.getElementById('CloseMeNowLog').click();
					},300);
						setTimeout(function (){	
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
						},400);
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