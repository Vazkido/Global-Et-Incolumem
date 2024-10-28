<?php
session_start();

if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
header("Location:login");
exit;
}



require_once("../config.php");



function sanitizeContent($var){
$var = str_replace('&nbsp;','',$var);
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}





// clients Query


$usNo =0;
$hNo = 0;

if(!isset($_SESSION['shipment_tracking_no'])){

header("Location:manage-shipment");

}



else{

$shipment_tracking_no = $_SESSION['shipment_tracking_no'];

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
               
       
       
        <div class="content-body">
			<div class="container-fluid">
				
				
				
				
				
				
				<div class="form-head mb-sm-3 mb-3 d-flex flex-wrap align-items-center breadcrumb">
					
					
					<h4 class="font-w600 mb-2 mr-auto ">
					<i class="flaticon-141-home"></i>
					Dashboard
					</h4>

						
				</div>
				
				
				
			



<div class="row mb-sm-3">
					<div class="col-xl-12 col-xxl-12">

                        <div class="card">
                            
                            
                            <div class="card-body">
                            
                            
                            
                            
               







                            
                   <!-- Add Shipment History Starts Here-->
                   

       
  <div id="addShipmentHistoryModalLong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addShipmentHistoryModalLongTitle" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
									
									
										<h5 class="modal-title" id="addShipmentHistoryModalLongTitle">Add Shipment History</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
										<i class="fa fa-times-circle"></i>
										</span></button>
									</div>
									
									
									
									<div style="padding:30px;">
									
									
									
<form id="pwdForm" name="pwdForm" onsubmit="return false" method="post">
<input class="form-control" type="hidden" id="shipment_travel_shipment_tracking_no" name="shipment_travel_shipment_tracking_no" value="<?php echo $shipment_tracking_no;?>" placeholder="Tracking Number">

                            
                                <div class="row">
                                
                                
              

<div class="col-md-12" style="margin-top:10px;">
                        <div class="form-group form-box">
 <label class="form-label" for="shipment_travel_history_location" style="font-weight:bold; color:#000; font-size:12px;">Shipment Location *</label>
<input class="form-control" id="shipment_travel_history_location" type="text" name="shipment_travel_history_location" placeholder="Shipment Location">
                        </div>
                        </div>
                               
                                
 

<div class="col-md-6" style="margin-top:10px;">
 <label style="font-weight:bold; color:#000; font-size:12px;" for="shipment_travel_date">Actvity Date (dd-mm-yyyy) *</label>
 
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar text-18"></i></span></div>

<input class="form-control" value=""  id="shipment_travel_date" type="text" name="shipment_travel_date" placeholder="Activity Date">
</div>
</div>





<div class="col-md-6" style="margin-top:10px;">
 <label style="font-weight:bold; color:#000; font-size:12px;" for="shipment_travel_time">Actvity Time (hh:mins) *</label>
 
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o text-18"></i></span></div>

<input class="form-control" value=""   id="shipment_travel_time" type="text" name="shipment_travel_time" placeholder="Activity Time">
</div>
</div>






 
                
                
                <div class="col-md-12" style="margin-top:10px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_travel_description" style="font-weight:bold; color:#000; font-size:12px;">Brief Description</label>
<textarea class="form-control" id="shipment_travel_description" name="shipment_travel_description" placeholder="Travel Description"></textarea>
                        </div>
                        </div>
                        
                        
                   
                                


                                                                        <div class="col-md-12 pt-4">
       <button class="btn btn-primary" onclick="postShipmentHistoryFunc()">Post Shipment History</button>
                                    </div>
                                </div>
                                
                                
                                
                                </form>

									
									
									</div>
									
									
									
									
									
									
									<div class="modal-footer">
										<button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>                          
                            
                          <!-- Add Shipment History Stops Here-->









             
                            
                            
                            
                            
                            
                            
                   <!-- Edit Shipment History Starts Here-->
                   

       
  <div id="editShipmentHistoryModalLong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editShipmentHistoryModalLongTitle" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
									
									
										<h5 class="modal-title" id="editShipmentHistoryModalLongTitle">Update Shipment History</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
										<i class="fa fa-times-circle"></i>
										</span></button>
									</div>
									
									
									
									
<form id="updateShipHistForm" name="updateShipHistForm" onsubmit="return false" method="post">
<input class="form-control" type="hidden" id="edit_shipment_travel_shipment_tracking_no" name="shipment_travel_shipment_tracking_no" value="<?php echo $shipment_tracking_no;?>" placeholder="Tracking Number">

                            
                                



<div class="modal-body table-responsive" id="editShipmentHistoryModalDetails" style="padding:0px 10px;">


<div class="row row-xs">

<div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
 <label class="form-label" for="edit_shipment_travel_history_location" style="font-weight:bold; color:#000; font-size:12px;">Shipment Location *</label>
<input class="form-control" id="edit_shipment_travel_history_location" type="text" name="shipment_travel_history_location" placeholder="Shipment Location">
                        </div>
                        </div>
                               
                                
 


<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="edit_shipment_travel_date" style="font-weight:bold; color:#000; font-size:12px;">Actvity Date *</label>
<input class="form-control" id="edit_shipment_travel_date" type="text" name="shipment_travel_date" placeholder="Activity Date">
                        </div>
                        </div>







<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="edit_shipment_travel_time" style="font-weight:bold; color:#000; font-size:12px;">Activity Time *</label>
<input class="form-control" id="edit_shipment_travel_time" type="text" name="shipment_travel_time" placeholder="Activity Time">
                        </div>
                        </div>







 
                
                
                <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="edit_shipment_travel_description" style="font-weight:bold; color:#000; font-size:12px;">Brief Description</label>
<textarea class="form-control" id="edit_shipment_travel_description" name="shipment_travel_description" placeholder="Travel Description"></textarea>
                        </div>
                        </div>






</div>
                        
       </div>                 
                
                           

       <div class="col-md-12" style="margin-top:20px;">
       <button class="btn btn-primary" onclick="updateShipmentHistoryFunc()">Update Shipment History</button>
                                    </div>
                                
                                
                                
                                </form>
									
									
									
									
									
									
									
									
									
									<div class="modal-footer">
										<button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>                          
                            
                          <!-- Edit Shipment History Stops Here-->
                          
                          

         
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <?php if ($usNo >0) { ?>
                            
                            
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                       

                                        <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#profile" style="font-size:13px;">Shipment Info</a>
                                        </li>
                                        
                                        
                                        
                                        
                                        <li class="nav-item">
       <a class="nav-link" data-toggle="tab" href="#contact" style="font-size:13px;">Travel History</a>
                                        </li>
                                        
                                        
                                        
                                        <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#ShippersInfo" style="font-size:13px;">Shipper's Info</a>
                                        </li>
                                        
                                        
                                        
                                        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#message" style="font-size:13px;">Shipper's Photo </a>
                                        </li>
                                        
                                        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#receiversInfo" style="font-size:13px;">Receiver's Info</a>
                                        </li>
                                        
                                        
                                    </ul>
                                    <div class="tab-content">
                                        
                                        

                                        <div class="tab-pane fade active show" id="profile">
                                            <div class="pt-4">
                                           
                                                
                                                
             <form id="profileForm" name="profileForm" onSubmit="return false" method="post">
             
             
  <input class="form-control" readonly="" type="hidden" id="shipment_id" name="shipment_id" value="<?php echo $shipment_id;?>">

  <input class="form-control" readonly="" type="hidden" id="shipment_recipient_id" name="shipment_recipient_id" value="<?php echo $recipient_id;?>">
   <input class="form-control" type="hidden" id="shipment_tracking_no_old" name="shipment_tracking_no_old" value="<?php echo $shipment_tracking_no;?>" placeholder="Tracking Number">

   <div class="row">
   
   
   
   
<div class="col-lg-12 col-md-12" style="margin-top:40px;">

<h4 style="color:#df4238;">Shipment's Details</h4>
<hr>

</div>
   
   
   
   
  		
  		



                
   <div class="col-md-12" style="margin-top:20px;">
   <div class="form-group form-box">
   <label class="form-label" for="shipment_tracking_no" style="font-size:12px; font-weight:bold; color:#322740;">Tracking Number *</label>
   <input class="form-control" type="text" id="shipment_tracking_no" name="shipment_tracking_no" value="<?php echo $shipment_tracking_no;?>" placeholder="Tracking Number">
                          </div>
                        </div>             
                
                
                
                




<div class="col-md-6" style="margin-top:20px;">

<?php $shipment_freight_array = array('Air Freight','Sea Freight','Road Freight','Rail Freight'); ?>

<div class="form-group form-box">
<label class="form-label" for="shipment_freight" style="font-size:12px; font-weight:bold; color:#322740;">Freight Type *</label>
  <select class="form-control" name="shipment_freight" id="shipment_freight" style="width:100%">
  
<option value="">--Freight Type--</option>

<?php for($f=0; $f < count($shipment_freight_array); $f++){?>
<option value="<?php echo $shipment_freight_array[$f];?>" <?php echo $shipment_freight_array[$f]==$shipment_freight ? 'selected="selected"' : '';?>><?php echo $shipment_freight_array[$f];?></option>
<?php }?>

</select>
</div>
                    <!-- /.select-box-->
                </div>


                
                
                
                
   <div class="col-md-6" style="margin-top:20px;">
   <div class="form-group form-box">
   <label class="form-label" for="shipment_content_type" style="font-size:12px; font-weight:bold; color:#322740;">Shipment Content Type * (e.g. Parcel, Container)</label>
   <input class="form-control" type="text" id="shipment_content_type" name="shipment_content_type" value="<?php echo $shipment_content_type;?>" placeholder="Content Type">
                          </div>
                        </div>             
                
                
                
                
                
                
                
                
                
                <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_description" style="font-size:12px; font-weight:bold; color:#322740;">Brief Description Of Shipment *</label>
<textarea class="form-control" id="shipment_description" name="shipment_description" placeholder="Brief Description Of Shipment"><?php echo $shipment_description;?></textarea>
                        </div>
                        </div>
                        
                        
                
                
                

                        
                        <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_weight" style="font-size:12px; font-weight:bold; color:#322740;">Weight * (e.g 2kg)</label>
<input class="form-control" id="shipment_weight" type="text" name="shipment_weight" value="<?php echo $shipment_weight;?>" placeholder="Weight *">
                        </div>
                        </div>
                        
                        



        




  
<div class="col-md-6" style="margin-top:20px;">

<?php $shipment_status_array = array('Pending','Processing','In Transit','On Board','Delivered','On Hold'); ?>


<div class="form-group form-box">
<label class="form-label" for="shipment_status" style="font-size:12px; font-weight:bold; color:#322740;">Shipment Status *</label>
  <select class="form-control" name="shipment_status" id="shipment_status" style="width:100%">
  
<option value="">--Shipment Status--</option>
<?php for($s=0; $s < count($shipment_status_array); $s++){?>
<option value="<?php echo $shipment_status_array[$s];?>" <?php echo $shipment_status_array[$s]==$shipment_status? 'selected="selected"' : '';?>><?php echo $shipment_status_array[$s];?></option>
<?php }?>
</select>
</div>
                    <!-- /.select-box-->
                </div>









<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_take_off_point" style="font-size:12px; font-weight:bold; color:#322740;">Take off Point *</label>
<input class="form-control" id="shipment_take_off_point" type="text" name="shipment_take_off_point" placeholder="Take off Point" value="<?php echo $shipment_take_off_point;?>">
                        </div>
                        </div>







<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_final_destination" style="font-size:12px; font-weight:bold; color:#322740;">Final Destination *</label>
<input class="form-control" id="shipment_final_destination" type="text" name="shipment_final_destination" value="<?php echo $shipment_final_destination;?>" placeholder="Final Destination">
                        </div>
                        </div>
















<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_shipping_date" style="font-size:12px; font-weight:bold; color:#322740;">Date Shipped *</label>
<input class="form-control" id="shipment_shipping_date" type="text" name="shipment_shipping_date" value="<?php echo $shipment_shipping_date;?>" placeholder="Date Shipped">
                        </div>
                        </div>














<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_shipping_time" style="font-size:12px; font-weight:bold; color:#322740;">Time Shipped *</label>
<input class="form-control" id="shipment_shipping_time" type="text" name="shipment_shipping_time" value="<?php echo $shipment_shipping_time;?>" placeholder="Time Shipped">
                        </div>
                        </div>
















<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_expected_delivery_date" style="font-size:12px; font-weight:bold; color:#322740;">Expected Delivery Date *</label>
<input class="form-control" id="shipment_expected_delivery_date" type="text" name="shipment_expected_delivery_date" value="<?php echo $shipment_expected_delivery_date;?>" placeholder="Expected Delivery Date">
                        </div>
                        </div>









<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_expected_delivery_time" style="font-size:12px; font-weight:bold; color:#322740;">Expected Delivery Time *</label>
<input class="form-control" id="shipment_expected_delivery_time" type="text" name="shipment_expected_delivery_time" value="<?php echo $shipment_expected_delivery_time;?>" placeholder="Expected Delivery Time">
                        </div>
                        </div>










<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_actual_delivery_date" style="font-size:12px; font-weight:bold; color:#322740;">Actual Delivery Date *</label>
<input class="form-control" id="shipment_actual_delivery_date" type="text" name="shipment_actual_delivery_date" value="<?php echo $shipment_actual_delivery_date;?>" placeholder="Actual Delivery Date">
                        </div>
                        </div>







<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_actual_delivery_time" style="font-size:12px; font-weight:bold; color:#322740;">Actual Delivery Time *</label>
<input class="form-control" id="shipment_actual_delivery_time" type="text" name="shipment_actual_delivery_time" value="<?php echo $shipment_actual_delivery_time;?>" placeholder="Actual Delivery Time">
                        </div>
                        </div>









  
                            
                            
                            

<div style="clear:both;"></div>
<div class="col-md-12">
								<div class="form-group">
                
                 <div class="timeline-footer">


<button class="btn btn-primary" type="submit" onclick="updateShipmentFunc()"><span id="withButt">Update Shipment Info</span></button>

<button type="reset" class="btn btn-danger btn-xs" id="getFormFiledButton" name="getFormFiledButton" style="text-transform:uppercase; padding:5px; display:none;"> <i class="fa fa-refresh"></i> Reset Form </button>
<div style="clear:both;"></div>
                            <!--<a class="btn btn-danger btn-xs">Delete</a>-->
                          </div>
                    </div>
                    </div>
                    
                    
                    </div>
</form>
                                   
                                                
                                                














                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="tab-pane fade" id="contact">
                                            <div class="pt-4">
                                                
             
             
              <div class="row row-xs">
              
              <div class="col-lg-12 col-md-12">
               <button style="margin-left:20px;" class="btn btn-success" type="button" name="addHistoryBtn" id="addHistoryBtn" onclick="addHistFunc()">Add Shipment History</button>
              </div>
              
             
    <div class="col-lg-12 col-md-12" style="margin-top:40px;">

<h4 style="color:#df4238;">Shipment's Travel History</h4>
<hr>

</div>  








 
 
 <!--Shipment History Starts-->
 
 <div class="col-lg-12 col-md-12">
 
 
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
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase; text-align:center" colspan="2"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                     
                                    
                          
<tr style="background:#f5f7fa;">

<td colspan="5" style="padding:0 10px;">

<input type="hidden" id="checkSelected" name="checkSelected" value="0">

<label style="padding:10px 0px;">
<input type="checkbox" name="selectAll" id="selectAll" value="1" onclick="selectAllFunc()"><span style="color:#069; font-size:16px;">
Select All
</span>

</label>


<button style="margin-left:20px;" class="btn btn-danger" type="button" name="deleteSelected" id="deleteSelected" onclick="deleteSelectedFunc()">Delete Selected History</button>
</td>

</tr>



<?php for($h=0; $h < count($shipment_travel_history_id); $h++){?>
   <tr style="font-size:13px;">
   
   
<td style="border-right:none">
<label>
<input type="checkbox" name="shipment_travel_history_ids[]" id="shipment_travel_history_id<?php echo $shipment_travel_history_id[$h];?>" value="<?php echo $shipment_travel_history_id[$h];?>">
<?php echo "$shipment_travel_date[$h]  $shipment_travel_time[$h]";?>
  </label>
</td>


<td><?php echo "$shipment_travel_history_location[$h]";?></td>

 <td><?php echo "$shipment_travel_description[$h]";?></td>
 
 
 
     

<td style="border-left:none">
 <a href="javascript:;" onclick="manageShipmentHistoryFunc('<?php echo $shipment_travel_history_id[$h];?>')" title="Click to manage this history!">
 <i class="fa fa-edit"></i>
 </a>
 </td> 
 

<td style="border-left:none">
 <a href="javascript:;" onclick="deleteShipmentHistFunc('<?php echo $shipment_travel_history_id[$h];?>')" title="Click to delete this history!">
 <i class="fa fa-trash"></i>
 </a>
 </td> 
                                  
                                        
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
 
 <!--Shipment History Stops-->


</div>

       
             
             
             
             
                                   
                                                
                                                
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="tab-pane fade" id="ShippersInfo">
                                            <div class="pt-4 basic-form custom_file_input">
                                            
                                            
                                            <form id="shipperInfoForm" name="shipperInfoForm" onSubmit="return false" method="post">
             
             
  <input class="form-control" type="hidden" id="shipper_refno" name="shipper_refno" value="<?php echo $shipper_refno;?>">


   <div class="row">
   
   
   
   
<div class="col-lg-12 col-md-12">

<h4 style="color:#df4238;">Shipper's Details</h4>
<hr>

</div>


   
   
   
   
  		

                       <div class="col-md-6" style="margin-top:20px;">
                       <div class="form-group form-box">
 <label class="form-label" for="shipper_full_name" style="font-weight:bold; color:#000; font-size:12px;">Full Name*</label>
                    
  <input class="form-control" id="shipper_full_name" name="shipper_full_name" value="<?php echo $shipper_full_name;?>" type="text" placeholder="Full Name">
                          </div>
                        </div>
                        
                        
                        
                        
                        
                                  
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="shipper_gender" style="font-weight:bold; color:#000; font-size:12px;">Sex*</label>
 <select class="form-control" name="shipper_gender" id="shipper_gender" style="width:100%">
<option value="" style="padding:5px 10px;">--Select Sex--</option>
<option value="Male" style="padding:5px 10px;" <?php echo $shipper_gender=='Male' ? 'selected="selected"' : '';?>>Male</option>
<option value="Female" style="padding:5px 10px;" <?php echo $shipper_gender=='Female' ? 'selected="selected"' : '';?>>Female</option>

</select>
  </div>
   <!-- /.select-box-->
</div>
       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
    <label class="form-label" for="shipper_phone" style="font-weight:bold; color:#000; font-size:12px;">Phone Number </label>
   <input class="form-control" id="shipper_phone" type="text" name="shipper_phone" value="<?php echo $shipper_phone;?>" placeholder="Phone Number ">
                          </div>
                        </div>
                        
                        
                         <div class="col-md-6" style="margin-top:20px;">
                         <div class="form-group form-box">
                        <label class="form-label" for="shipper_email" style="font-weight:bold; color:#000; font-size:12px;">Email Address *</label>
     <input class="form-control" id="shipper_email" type="email" name="shipper_email" value="<?php echo $shipper_email;?>" placeholder="Email Address *">
                        </div>
                        </div>





                        <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipper_address" style="font-weight:bold; color:#000; font-size:12px;">Contact Address</label>
     <input class="form-control" id="shipper_address" type="text" name="shipper_address" value="<?php echo $shipper_address;?>" placeholder="Contact Address">
                        </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
    <div class="form-group form-box">
  <label class="form-label" for="shipper_city" style="font-weight:bold; color:#000; font-size:12px;">City</label>
<input class="form-control" id="shipper_city" type="text" name="shipper_city" value="<?php echo $shipper_city;?>" placeholder="City "></div>
                    <!-- /.select-box-->
                </div>
                        
                       
      
      
      
      

    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipper_state" style="font-weight:bold; color:#000; font-size:12px;">State / Province </label>
    <input class="form-control" id="shipper_state" type="text" name="shipper_state" value="<?php echo $shipper_state;?>" placeholder="State / Province">
                        </div>
                        </div>
                
                                

      
      
    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipper_zip_code" style="font-weight:bold; color:#000; font-size:12px;">Zip / Postal Code </label>
  <input class="form-control" id="shipper_zip_code" type="text" name="shipper_zip_code" value="<?php echo $shipper_zip_code;?>" placeholder="Zip / Postal Code">
                        </div>
                        </div>
                

      
      
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="shipper_country_name" style="font-weight:bold; color:#000; font-size:12px;">Country Of Residence *</label>
  <select class="form-control" name="shipper_country_name" id="shipper_country_name" style="width:100%">
<option value="">--Select Country--</option>
<?php for($c=0; $c < count($country_id); $c++){?>
<option value="<?php echo $country_name[$c];?>" <?php echo $country_name[$c]==$shipper_country_name ? 'selected="selected"' : '';?>> <?php echo $country_name[$c];?> </option>
<?php }?>

</select>
</div>
                    <!-- /.select-box-->
                </div>
                
                









  
                            
                            
                            

<div style="clear:both;"></div>
<div class="col-md-12">
								<div class="form-group">
                
                 <div class="timeline-footer">


<button class="btn btn-primary" type="submit" onclick="updateProfileFunc()"><span id="withButt">Update Shipper Info</span></button>

<button type="reset" class="btn btn-danger btn-xs" id="getFormFiledBtn" name="getFormFiledBtn" style="text-transform:uppercase; padding:5px; display:none;"> <i class="fa fa-refresh"></i> Reset Form </button>
<div style="clear:both;"></div>
                            <!--<a class="btn btn-danger btn-xs">Delete</a>-->
                          </div>
                    </div>
                    </div>
                    
                    
                    </div>
</form>

                                            
                                            
                                            </div>
                                            </div>
                                        
                                        
                                        
                                        
                                    












    
                                        
                                        
                                        
                                        
                                        
                                        <div class="tab-pane fade" id="message">
                                            <div class="pt-4 basic-form custom_file_input">
                                            
                                            
                                            
      
      
      
                                      
                                            
                                            
                                            

<form id="photoUploadForm" name="photoUploadForm" class="ajax-form form-horizontal" action="upload_shipper_profile_photo_process.php" method="post" enctype="multipart/form-data"> 
   

<div class="row">
 
<input id="old_shipper_photo" name="old_shipper_photo" value="<?php echo $shipper_photo;?>" type="hidden"> 
   <input class="form-control" type="hidden" id="shipper_refno_photo" name="shipper_refno" value="<?php echo $shipper_refno;?>">


<div class="col-md-12 pt-4">
<label>Shipper's Profile Photo</label>

</div>




<div class="col-md-2 pt-4">
<img src="../images/uploads/<?php echo $shipper_photo;?>" alt="" style="max-width:100px; border-radius:50%;" class="img-fluid">
</div>





<div class="col-md-10 pt-4">
<div class="input-group mb-3">
                                            <div class="custom-file">
<input class="custom-file-input" id="shipper_photo" name="shipper_photo" type="file" onchange="getFileInfoFunc(this.value,'userProfilepixDiv')">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            <div class="col-md-12 mt-2" id="userProfilepixDiv" style="font-size:12px; font-weight:bold; color:#322740;">
No file selected
</div>
  </div>
  
  
  <div class="col-md-12 pt-4">
<button type="submit" class="btn btn-primary" id="inputGroupFileAddon02">Upload Photo</button>
</div>



</div>
                                        




         
  </div>        
                    
          
          </form>




                                              
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
        <div class="tab-pane fade" id="receiversInfo">
        <div class="pt-4 basic-form custom_file_input">
        
        <form id="receiverInfoForm" name="receiverInfoForm" onSubmit="return false" method="post">
             
             
  <input class="form-control" type="hidden" id="recipient_id" name="recipient_id" value="<?php echo $recipient_id;?>">


   <div class="row">
   
   
   
   
<div class="col-lg-12 col-md-12" style="margin-top:40px;">

<h4 style="color:#df4238;">Receiver's Details</h4>
<hr>

</div>


   
   
   
   
  

<div class="col-md-6" style="margin-top:20px;">
                       <div class="form-group form-box">
                  <label class="form-label" for="recipient_full_name" style="font-weight:bold; color:#000;">Full Name *</label>
                    
<input class="form-control" id="recipient_full_name" name="recipient_full_name" value="<?php echo $recipient_full_name;?>" type="text" placeholder="Full Name">
                          </div>
                        </div>
                        
                        
                        
                        
                        
                                  
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="recipient_gender" style="font-weight:bold; color:#000;">Sex*</label>
 <select class="form-control" name="recipient_gender" id="recipient_gender" style="width:100%">
<option value="" style="padding:5px 10px;">--Select Sex--</option>
<option value="Male" style="padding:5px 10px;" <?php echo $recipient_gender=='Male' ? 'selected="selected"' : '';?>>Male</option>
<option value="Female" style="padding:5px 10px;" <?php echo $recipient_gender=='Female' ? 'selected="selected"' : '';?>>Female</option>

</select>
  </div>
   <!-- /.select-box-->
</div>
       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
    <label class="form-label" for="recipient_phone" style="font-weight:bold; color:#000;">Phone Number </label>
  <input class="form-control" id="recipient_phone" type="text" name="recipient_phone" value="<?php echo $recipient_phone;?>" placeholder="Phone Number ">
                          </div>
                        </div>
                        
                        
                         <div class="col-md-6" style="margin-top:20px;">
                         <div class="form-group form-box">
                        <label class="form-label" for="recipient_email" style="font-weight:bold; color:#000;">Email Address *</label>
 <input class="form-control" id="recipient_email" type="email" name="recipient_email" value="<?php echo $recipient_email;?>" placeholder="Email Address *">
                        </div>
                        </div>





                        <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="recipient_address" style="font-weight:bold; color:#000;">Contact Address</label>
 <input class="form-control" id="recipient_address" type="text" name="recipient_address" value="<?php echo $recipient_address;?>" placeholder="Contact Address">
                        </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
    <div class="form-group form-box">
  <label class="form-label" for="recipient_city" style="font-weight:bold; color:#000;">City</label>
<input class="form-control" id="recipient_city" type="text" name="recipient_city" value="<?php echo $recipient_city;?>" placeholder="City "></div>
                    <!-- /.select-box-->
                </div>
                        
                       
      
      
      
      

    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="recipient_state" style="font-weight:bold; color:#000;">State / Province </label>
  <input class="form-control" id="recipient_state" type="text" name="recipient_state" value="<?php echo $recipient_state;?>" placeholder="State / Province">
                        </div>
                        </div>
                
                                

      
      
    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="recipient_zip_code" style="font-weight:bold; color:#000;">Zip / Postal Code </label>
 <input class="form-control" id="recipient_zip_code" type="text" name="recipient_zip_code" value="<?php echo $recipient_zip_code;?>" placeholder="Zip / Postal Code">
                        </div>
                        </div>
                

      
      
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="recipient_country_name" style="font-weight:bold; color:#000;">Country Of Residence *</label>
  <select class="form-control" name="recipient_country_name" id="recipient_country_name" style="width:100%">
<option value="">--Select Country--</option>
<?php for($c=0; $c < count($country_id); $c++){?>
<option value="<?php echo $country_name[$c];?>" <?php echo $recipient_country_name==$country_name[$c] ? 'selected="selected"' : '';?>> <?php echo $country_name[$c];?> </option>
<?php }?>

</select>
</div>
                    <!-- /.select-box-->
                </div>
                
                

                
                









  
                            
                            
                            

<div style="clear:both;"></div>
<div class="col-md-12">
								<div class="form-group">
                
                 <div class="timeline-footer">


<button class="btn btn-primary" type="submit" onclick="updateReceiverInfoFunc()">Update Receiver Info</button>

<div style="clear:both;"></div>
                            <!--<a class="btn btn-danger btn-xs">Delete</a>-->
                          </div>
                    </div>
                    </div>
                    
                    
                    </div>
</form>

        
        
        </div>
        </div>

                             
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                <?php
                } // if found stops here
                
                
                else{
                
                echo '<h4>Shipment details not found</h4>';
                
                }
                
                
                ?>
                
                
                                
                                
                                
                                
                                
                                
                                
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
    
    
    
    <script>
	
	

$( document ).ready(function() {
	
$('#photoUploadForm').on('submit', function(e) {
e.preventDefault();


var shipper_photo = document.getElementById('shipper_photo').value;
shipper_photo=shipper_photo.replace(/^\s+|\s+$/g,'');
if(shipper_photo==''){

alert("Profile photo not provided");

document.getElementById("shipper_photo").focus();
return false;
}



$('#inputGroupFileAddon02').attr('disabled', ''); // disable upload button
//show uploading message

				
$('#popUpLoader').bPopup({
modalClose: false,
opacity: 0.6,
positionStyle: 'absolute' //'fixed' or 'absolute'
});
				
$(this).ajaxSubmit({
success:  function(data, status, xhr) {

if(data==1){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
alert("Invalid file type!");
},400);

return false;
}


else if(data==2){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
alert("Invalid image width, image minimum width must be 100px");
},400);

return false;
}




else if(data==3){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
alert("Invalid image height, image minimum height must be 100px");
},400);

return false;
}



else if(data==4){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
alert("Unable to upload profile photo");
},400);

return false;
}



else if(data==5){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
alert("Image file not provided!");
},400);

return false;
}



else if(data==7){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
alert("Form not posted!");

},400);

return false;
}


if(data==6){
setTimeout(function (){
$('#ClosePopLoader').click();
alert("Profile photo successfully uploaded");
},300);

setTimeout(function (){	
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
location.reload(true);
},400);
}

else{

setTimeout(function (){
$('#inputGroupFileAddon02').removeAttr('disabled'); //enable submit button
$('#ClosePopLoader').click();
},300);



setTimeout(function (){
$('#ClosePopLoader').click();
alert(data);
},400);






return false;
}

}

});

});





});






	</script>













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
	



function updateShipmentFunc(){


var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;



// shipment info starts


var shipment_tracking_no = document.getElementById('shipment_tracking_no').value;
shipment_tracking_no=shipment_tracking_no.replace(/^\s+|\s+$/g,'');
if(shipment_tracking_no==''){
alert("Please provide shipment tracking number!");
document.getElementById("shipment_tracking_no").focus();
return false;
}







var shipment_freight = document.getElementById('shipment_freight').value;
shipment_freight=shipment_freight.replace(/^\s+|\s+$/g,'');
if(shipment_freight==''){
alert("Please select freight type!");
document.getElementById("shipment_freight").focus();
return false;
}



var shipment_content_type = document.getElementById('shipment_content_type').value;
shipment_content_type=shipment_content_type.replace(/^\s+|\s+$/g,'');
if(shipment_content_type==''){
alert("Please provide shipment content type!");
document.getElementById("shipment_content_type").focus();
return false;
}



var shipment_description = document.getElementById('shipment_description').value;
shipment_description=shipment_description.replace(/^\s+|\s+$/g,'');
if(shipment_description==''){
alert("Please provide shipment content description!");
document.getElementById("shipment_description").focus();
return false;
}



var shipment_weight = document.getElementById('shipment_weight').value;
shipment_weight=shipment_weight.replace(/^\s+|\s+$/g,'');
if(shipment_weight==''){
alert("Please provide shipment weight!");
document.getElementById('shipment_weight').focus();
return false;
}



var shipment_status = document.getElementById('shipment_status').value;
shipment_status=shipment_status.replace(/^\s+|\s+$/g,'');
if(shipment_status==''){
alert("Please select shipment status!");
document.getElementById('shipment_status').focus();
return false;
}




var shipment_take_off_point = document.getElementById('shipment_take_off_point').value;
shipment_take_off_point=shipment_take_off_point.replace(/^\s+|\s+$/g,'');

if(shipment_take_off_point==''){
alert("Please provide shipment take off point!");
document.getElementById('shipment_take_off_point').focus();
return false;
}



var shipment_final_destination = document.getElementById('shipment_final_destination').value;
shipment_final_destination=shipment_final_destination.replace(/^\s+|\s+$/g,'');

if(shipment_final_destination==''){
alert("Please provide shipment final destination!");
document.getElementById('shipment_final_destination').focus();
return false;
}


var shipment_shipping_date = document.getElementById('shipment_shipping_date').value;
shipment_shipping_date=shipment_shipping_date.replace(/^\s+|\s+$/g,'');

if(shipment_shipping_date==''){
alert("Please provide shipment shipping date!");
document.getElementById('shipment_shipping_date').focus();
return false;
}





var shipment_shipping_time = document.getElementById('shipment_shipping_time').value;
shipment_shipping_time=shipment_shipping_time.replace(/^\s+|\s+$/g,'');

if(shipment_shipping_time==''){
alert("Please provide shipment shipping time!");
document.getElementById('shipment_shipping_time').focus();
return false;
}



var shipment_expected_delivery_date = document.getElementById('shipment_expected_delivery_date').value;
shipment_expected_delivery_date=shipment_expected_delivery_date.replace(/^\s+|\s+$/g,'');

if(shipment_expected_delivery_date==''){
alert("Please provide shipment expected delivery date!");
document.getElementById('shipment_expected_delivery_date').focus();
return false;
}


var shipment_expected_delivery_time = document.getElementById('shipment_expected_delivery_time').value;
shipment_expected_delivery_time=shipment_expected_delivery_time.replace(/^\s+|\s+$/g,'');

if(shipment_expected_delivery_time==''){
alert("Please provide shipment expected delivery time!");
document.getElementById('shipment_expected_delivery_time').focus();
return false;
}




if(shipment_status=='Delivered'){ // if status is delivered starts here


var shipment_actual_delivery_date = document.getElementById('shipment_actual_delivery_date').value;
shipment_actual_delivery_date=shipment_actual_delivery_date.replace(/^\s+|\s+$/g,'');



if(shipment_actual_delivery_date==''){
alert("Please provide shipment actual delivery date!");
document.getElementById('shipment_actual_delivery_date').focus();
return false;
}






var shipment_actual_delivery_time = document.getElementById('shipment_actual_delivery_time').value;
shipment_actual_delivery_time=shipment_actual_delivery_time.replace(/^\s+|\s+$/g,'');



if(shipment_actual_delivery_time==''){
alert("Please provide shipment actual delivery time!");
document.getElementById('shipment_actual_delivery_time').focus();
return false;
}


} // if status is delivered stops here



// shipment info stops






var dataString = $('#profileForm').serialize();
var strURL="shipment_update_process.php";


$('#popUpLoader').bPopup({
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
document.getElementById('ClosePopLoader').click();

if(req.responseText==1){

setTimeout(function (){
	
alert("Shipment info successfully updated!");
},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}



else if(req.responseText==2){

setTimeout(function (){
	
alert("This tracking number already exists in used by another shipment!");
},300);


return false;

}



else {
alert("An error occurred");
//alert(req.responseText);
return false; 
}

},1000);




										
} else {
setTimeout(function (){document.getElementById('ClosePopLoader').click();
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








function postShipmentHistoryFunc(){


var shipment_travel_history_location = document.getElementById('shipment_travel_history_location').value;
shipment_travel_history_location=shipment_travel_history_location.replace(/^\s+|\s+$/g,'');

if(shipment_travel_history_location==''){
alert("Please provide shipment location!");
document.getElementById('shipment_travel_history_location').focus();
return false;
}







var shipment_travel_date = document.getElementById('shipment_travel_date').value;
shipment_travel_date=shipment_travel_date.replace(/^\s+|\s+$/g,'');

if(shipment_travel_date==''){
alert("Please provide travel activity date!");
document.getElementById('shipment_travel_date').focus();
return false;
}




var shipment_travel_time = document.getElementById('shipment_travel_time').value;
shipment_travel_time=shipment_travel_time.replace(/^\s+|\s+$/g,'');

if(shipment_travel_time==''){
alert("Please provide travel activity time!");
document.getElementById('shipment_travel_time').focus();
return false;
}




var dataString = $('#pwdForm').serialize();
var strURL="upload_shipment_travel_history_process.php";


$('#popUpLoader').bPopup({
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
document.getElementById('ClosePopLoader').click();

if(req.responseText==1){

setTimeout(function (){
	
alert("Shipment travel history successfully posted!");
},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}





else {
//alert(req.responseText);
alert("Unable to process");
return false; 
}

},1000);




										
} else {
setTimeout(function (){document.getElementById('ClosePopLoader').click();
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






// Update shipment history starts here







function updateShipmentHistoryFunc(){


var shipment_travel_history_location = document.getElementById('edit_shipment_travel_history_location').value;
shipment_travel_history_location=shipment_travel_history_location.replace(/^\s+|\s+$/g,'');

if(shipment_travel_history_location==''){
alert("Please provide shipment location!");
document.getElementById('edit_shipment_travel_history_location').focus();
return false;
}







var shipment_travel_date = document.getElementById('edit_shipment_travel_date').value;
shipment_travel_date=shipment_travel_date.replace(/^\s+|\s+$/g,'');

if(shipment_travel_date==''){
alert("Please provide travel activity date!");
document.getElementById('edit_shipment_travel_date').focus();
return false;
}




var shipment_travel_time = document.getElementById('edit_shipment_travel_time').value;
shipment_travel_time=shipment_travel_time.replace(/^\s+|\s+$/g,'');

if(shipment_travel_time==''){
alert("Please provide travel activity time!");
document.getElementById('edit_shipment_travel_time').focus();
return false;
}




var dataString = $('#updateShipHistForm').serialize();
var strURL="update_shipment_travel_history_process.php";


$('#popUpLoader').bPopup({
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
document.getElementById('ClosePopLoader').click();

if(req.responseText==1){

setTimeout(function (){
	
alert("Shipment travel history successfully updated!");
},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}





else {
//alert(req.responseText);
alert("Unable to process");
return false; 
}

},1000);




										
} else {
setTimeout(function (){document.getElementById('ClosePopLoader').click();
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







// update shipment history stops here














 function updateProfileFunc(){
 
 
 

var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;




 
// shippers details starts here


var shipper_full_name = document.getElementById('shipper_full_name').value;
shipper_full_name=shipper_full_name.replace(/^\s+|\s+$/g,'');

if(shipper_full_name==''){
alert("Please provide shipper full name!");
document.getElementById("shipper_full_name").focus();
return false;
}





var shipper_gender = document.getElementById('shipper_gender').value;
shipper_gender=shipper_gender.replace(/^\s+|\s+$/g,'');
if(shipper_gender==''){
alert("Please provide shipper sex!");
document.getElementById("shipper_gender").focus();
return false;
}



var shipper_email = document.getElementById('shipper_email').value;
shipper_email=shipper_email.replace(/^\s+|\s+$/g,'');
if(shipper_email==''){
alert("Please provide shipper's email address!");
document.getElementById("shipper_email").focus();
return false;
}




var myemailCheck1=emailPattern.test(shipper_email);
    
	if(myemailCheck1==false){
	alert("Please shipper's email address you provide is invalid");
	document.getElementById("shipper_email").focus();
	return false;
	}
	





var shipper_country_name = document.getElementById('shipper_country_name').value;
shipper_country_name=shipper_country_name.replace(/^\s+|\s+$/g,'');
if(shipper_country_name==''){
alert("Please select shipper's country of residence!");
document.getElementById("shipper_country_name").focus();
return false;
}




// shipper details stops here




var dataString = $('#shipperInfoForm').serialize();
var strURL="update_shipper_info_process.php";


$('#popUpLoader').bPopup({
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
document.getElementById('ClosePopLoader').click();

if(req.responseText==1){

setTimeout(function (){
	
alert("Shipper's info successfully updated!");
},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}





else {
//alert(req.responseText);
alert("Unable to process");
return false; 
}

},1000);




										
} else {
setTimeout(function (){document.getElementById('ClosePopLoader').click();
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








 function updateReceiverInfoFunc(){

var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;



// recipients details starts here


var recipient_full_name = document.getElementById('recipient_full_name').value;
recipient_full_name=recipient_full_name.replace(/^\s+|\s+$/g,'');
if(recipient_full_name==''){
alert("Please provide receiver's full name!");
document.getElementById("recipient_full_name").focus();
return false;
}




var recipient_gender = document.getElementById('recipient_gender').value;
recipient_gender=recipient_gender.replace(/^\s+|\s+$/g,'');
if(recipient_gender==''){
alert("Please provide receiver's sex!");
document.getElementById("recipient_gender").focus();
return false;
}



var recipient_email = document.getElementById('recipient_email').value;
recipient_email=recipient_email.replace(/^\s+|\s+$/g,'');
if(recipient_email==''){
alert("Please provide receiver's email address!");
document.getElementById("recipient_email").focus();
return false;
}






var myemailCheck2=emailPattern.test(recipient_email);
    
	if(myemailCheck2==false){
	alert("Please receiver's email address you provide is invalid");
	document.getElementById("recipient_email").focus();
	return false;
	}







var recipient_country_name = document.getElementById('recipient_country_name').value;
recipient_country_name=recipient_country_name.replace(/^\s+|\s+$/g,'');
if(recipient_country_name==''){
alert("Please select receiver's country of residence!");
document.getElementById("recipient_country_name").focus();
return false;
}



// receiver details stops here







var dataString = $('#receiverInfoForm').serialize();
var strURL="update_receiver_info_process.php";


$('#popUpLoader').bPopup({
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
document.getElementById('ClosePopLoader').click();

if(req.responseText==1){

setTimeout(function (){
	
alert("Receiver's info successfully updated!");
},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}





else {
//alert(req.responseText);
alert("Unable to process");
return false; 
}

},1000);




										
} else {
setTimeout(function (){document.getElementById('ClosePopLoader').click();
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













function manageShipmentHistoryFunc(shipment_travel_history_id){



$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});	
								



var strURL="get_shipment_travel_history_info_for_editing.php?shipment_travel_history_id="+shipment_travel_history_id;








		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						


setTimeout(function (){
document.getElementById('CloseMeNowLog').click();		
},300);
					
if(req.responseText == 1){
	
setTimeout(function (){
alert("An error occurred!");		
},400);
				
return false;
}


else{ 


setTimeout(function (){
document.getElementById('editShipmentHistoryModalDetails').innerHTML=req.responseText;
$('#editShipmentHistoryModalLong').modal({
    backdrop: 'static',
    keyboard: false
});

},400);	

return false;	





}
			
				
					
					}
					else {
					setTimeout(function (){	
					document.getElementById('CloseMeNowLog').click();
					},300);
						setTimeout(function (){	
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
						},400);
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








function addHistFunc(){



$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});	
								




setTimeout(function (){
document.getElementById('CloseMeNowLog').click();		
},300);




setTimeout(function (){
$('#addShipmentHistoryModalLong').modal({
    backdrop: 'static',
    keyboard: false
});

},400);	

}














function selectAllFunc(){


var selectAll = document.getElementById('selectAll').checked;


shipment_travel_history_ids  = document.getElementsByName('shipment_travel_history_ids[]');

var xn =  shipment_travel_history_ids.length;
var xc=0;



for(var i = 0; i < xn; i++){ // for loop starts here

shipment_travel_history_ids.item(i).checked=selectAll;

if(selectAll==true){
xc++;
}


} // for loop ends here


document.getElementById('checkSelected').value=xc;


}














function deleteSelectedFunc(){


shipment_travel_history_ids  = document.getElementsByName('shipment_travel_history_ids[]');

var xn =  shipment_travel_history_ids.length;
var xc=0;


for(var i = 0; i < xn; i++){ // for loop starts here

if(shipment_travel_history_ids.item(i).checked==true){
xc++;
}


} // for loop ends here


if(xc<1){

alert("No history selected!");
return false;

}




if(!confirm("Are you sure that you to delete the selected history?")){
return false;
}




var dataString = $('#clientListForm').serialize();
var strURL="delete_selected_history_process.php";


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
	
alert("History successfully deleted");

},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}


else {
alert("Unable to process your request, please try later!");
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









function deleteShipmentHistFunc(shipment_travel_history_id){

if(!confirm("Are you sure that you to delete this history?")){
return false;
}



$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});	
								



var strURL="delete_shipment_travel_history_process.php?shipment_travel_history_id="+shipment_travel_history_id;


		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						


setTimeout(function (){
document.getElementById('CloseMeNowLog').click();		
},300);
					
if(req.responseText == 1){
	
setTimeout(function (){
alert("Shipment history successfully deleted!");		
},400);



setTimeout(function (){
location.reload(true);		
},500);
				
return false;
}


else{ 


setTimeout(function (){

alert("Unable to process your request at this time!");

},400);	

return false;	





}
			
				
					
					}
					else {
					setTimeout(function (){	
					document.getElementById('CloseMeNowLog').click();
					},300);
						setTimeout(function (){	
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
						},400);
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









function getFileInfoFunc(fileName,fileDiv){


fileName=fileName.replace(/^\s+|\s+$/g,'');

if(fileName==''){
document.getElementById(fileDiv).innerHTML='No file selected';
return false;
}


var fileNameFilter = fileName.split('\\').pop();
document.getElementById(fileDiv).innerHTML=fileNameFilter;
}



</script>



   
</body>
</html>