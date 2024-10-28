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





if (!(isset($_GET['pageNo'])) || empty($_GET['pageNo'])){
        $pageNo =1;
        }else{
        $pageNo = (int) $_GET['pageNo'];
        }



$pQ1="SELECT shipment_id 
FROM tbl_shipment ORDER BY shipment_id DESC";



	
	$pQ1_r = mysqli_query($db,$pQ1) or die(mysqli_error($db));
	$q_nums=mysqli_num_rows($pQ1_r);
	if($q_nums<1){
	$q_nums=1;
	}
    //specifying number of records to be displayed per page
    $per_rows =50;
    //calculating the number of the last page
    $endP = ceil($q_nums/$per_rows);
    //ensuring that the page number stays within the 1 and last boundary
    if ($pageNo < 1){
        $pageNo = 1;
    }elseif($pageNo > $endP){
        $pageNo = $endP;
    
    }
     $max1='limit ' .($pageNo - 1) * $per_rows .',' .$per_rows;






$usNo =0;

$usQ = "SELECT

shipment_id,
shipment_tracking_no,
shipment_status,
shipment_shipping_date,
shipment_date_created,
shipper_full_name,
shipper_phone,
shipper_refno,
shipper_email,
recipient_full_name,
recipient_phone,
recipient_email


FROM tbl_shipment m

INNER JOIN  tbl_shipper p ON p.shipper_refno=m.shipment_shipper_refno
INNER JOIN  tbl_recipient r ON r.recipient_shipment_tracking_no=m.shipment_tracking_no

ORDER BY shipment_id DESC $max1";

$usQ_r= mysqli_query($db,$usQ) or die (mysqli_error($db)); 
$usNo=mysqli_num_rows($usQ_r);

if ($usNo >0) { // if not found 2	
while($rows = mysqli_fetch_array($usQ_r, MYSQLI_ASSOC)){ // while loop 2

$shipment_id[]=$rows["shipment_id"];
$shipment_tracking_no[]=$rows["shipment_tracking_no"];
$shipment_status[]=$rows["shipment_status"];
$shipment_shipping_date[]=$rows["shipment_shipping_date"];
$shipment_date_created[]=$rows["shipment_date_created"];


$shipper_full_name[]=$rows["shipper_full_name"];
$shipper_phone[]=$rows["shipper_phone"];
$shipper_email[]=$rows["shipper_email"];
$shipper_refno[] = $rows["shipper_refno"];

$recipient_full_name[]=$rows["recipient_full_name"];
$recipient_phone[]=$rows["recipient_phone"];
$recipient_email[]=$rows["recipient_email"];


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
          
          <!-- header stops --->
        
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				
				
				
				<div class="form-head mb-sm-3 mb-3 d-flex flex-wrap align-items-center breadcrumb">
					
					
					<h4 class="font-w600 mb-2 mr-auto ">
					Manage Shipments
					</h4>

						
				</div>
				
				
				
				







                  <div class="row mb-sm-3">	
	
	
	
	<div class="col-xl-12 mt-2">
								<div class="card">
									
									
									<div class="card-body" style="padding-top:0px; margin-top:0px;">
									
									
									
									<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
							<li class="nav-item" style="margin-top:20px;">
								<a class="nav-link text-uppercase active" id="myDeposits-tab" data-toggle="tab" href="#myDeposits" role="tab" aria-controls="myDeposits" aria-selected="true">Shipments</a>
							</li>
							<li class="nav-item" style="margin-top:20px;">
								<a class="nav-link text-uppercase" id="myWithdrawals-tab" data-toggle="tab" href="#myWithdrawals" role="tab" aria-controls="myWithdrawals" aria-selected="false">
								Post New Shipment
								</a>
							</li>
							
							
							
						</ul>

										
										<div class="row">
										<div class="col-lg-12">
										
										
										
										
										
		<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade active show" id="myDeposits" role="tabpanel" aria-labelledby="myDeposits-tab">
								
								
		<div class="card-body" style="padding:10px 5px 10px 0px;">
							
							
							<div class="table-responsive dt-responsive" style="padding-bottom:20px;">
                            <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            
                            
 <?php if ($usNo>0) { ?> 
 




<form id="clientListForm" name="clientListForm" method="post">

<div id="clientDiv">
             

<table class="table table-striped">
                                <thead style="background:#322740; color:#fff;">
                                    <tr role="row">
                                    
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase" colspan="2">Tracking No</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Shipper</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Receiver</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Date Created</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase; text-align:center" colspan="2"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                     
                                    
                          
<tr style="background:#f5f7fa;">

<td colspan="7" style="padding:0 10px;">

<input type="hidden" id="checkSelected" name="checkSelected" value="0">

<label style="padding:10px 0px;">
<input type="checkbox" name="selectAll" id="selectAll" value="1" onclick="selectAllFunc()"><span style="color:#069; font-size:16px;">
Select All
</span>

</label>


<button style="margin-left:20px;" class="btn btn-danger" type="button" name="deleteSelected" id="deleteSelected" onclick="deleteSelectedFunc()">Delete Selected Shipments</button>
</td>

</tr>



<?php for($x=0; $x < count($shipment_id); $x++){?>

   <tr style="font-size:13px;">
   
   
<td style="border-right:none" colspan="2">
<label>
<input type="checkbox" name="shipment_tracking_nos[]" id="shipment_tracking_no<?php echo $shipment_id[$x];?>" value="<?php echo $shipment_tracking_no[$x];?>">
<?php echo $shipment_tracking_no[$x];?>

  </label>
</td>


<td><?php echo "$shipper_full_name[$x]" ;?></td>

 <td><?php echo "$recipient_full_name[$x]" ;?></td>
 
 
 
  
    <td>
    
     <?php echo $shipment_date_created[$x]?>
    </td>
   
   

<td style="border-left:none">
 <a href="javascript:;" onclick="manageShipmentFunc('<?php echo $shipment_tracking_no[$x];?>')" title="Click to view / manage shipment!">
 <i class="fa fa-edit"></i>
 </a>
 </td>  
                                  
   <td style="border-left:none">
 <a href="javascript:;" onclick="deleteShipmentFunc('<?php echo $shipment_tracking_no[$x];?>')" title="Click to delete this shipment!">
 <i class="fa fa-trash"></i>
 </a>
 </td>                                     
             
   
    
    
    
                                    </tr>
                                    
                   <?php
                   
}?>                 
                                    
                                
                
                
                                                                    
                                                                        
                                    
                                    
                                    </tbody>
                                
                            </table>
                            
                            
                            
                            
                            
                            
                            
       <?php if($q_nums > $per_rows){?>                                            
<div class="modal-footer no-margin-top">
<!--<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
<i class="ace-icon fa fa-times"></i>
Close
</button>-->




<nav>
                                    <ul class="pagination">
                                        <li class="page-item page-indicator">
                                            <a class="page-link" href="javascript:void(0)" onClick="gotoNexpage('<?php echo $pageNo-1;?>')">
                                                <i class="la la-angle-left"></i></a>
                                        </li>
                                        
                                        
                                        
                                        <?php for($p=0; $p < $endP; $p++){?>
<li class="page-item <?php echo $p+1 == $pageNo ? 'active' : ''; ?>"><a class="page-link" href="javascript:void(0)"  onClick="gotoNexpage('<?php echo $p+1;?>')"><?php echo $p+1;?></a>
                                        </li>
                                        <?php }?>
                                        
                                        
                                        
                                        <li class="page-item page-indicator">
                                            <a class="page-link" href="javascript:void(0)" onClick="gotoNexpage('<?php echo $pageNo+1;?>')">
                                                <i class="la la-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>




 </div>                                              
<?php } else{}?>              
                            
                            
                            
                            
                            
                            
                            
                            


</div>
      

</form> 


   
<?php 


} // if found stops


else{

 echo '<h4>No shipments found</h4>';

}

?>
                  
                            
                            </div>
                        </div>

                                                            
                             
                            </div>					
								
								
							</div>
							
							
														
							
							
							
<div class="tab-pane fade" id="myWithdrawals" role="tabpanel" aria-labelledby="myWithdrawals-tab">
								
								


<div class="card-body" style="padding:10px 5px 10px 0px;">
							
							
							
						



<form id="regForm" name="regForm" class="ajax-form form-horizontal" action="create_shipment_details_process.php" method="post" enctype="multipart/form-data"> 

				
    <input type="hidden" value="1" name="postShipment" id="postShipment">
     
<div class="row">

<div class="col-lg-12 col-md-12">

<h4 style="color:#df4238;">Shipper's Details</h4>
<hr>

</div>




                       <div class="col-md-6" style="margin-top:20px;">
                       <div class="form-group form-box">
                  <label class="form-label" for="shipper_full_name" style="font-weight:bold; color:#000;">Full Name*</label>
                    
                    <input class="form-control" id="shipper_full_name" name="shipper_full_name" value="" type="text" placeholder="Full Name">
                          </div>
                        </div>
                        
                        
                        
                        
                        
                                  
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="shipper_gender" style="font-weight:bold; color:#000;">Sex*</label>
 <select class="form-control" name="shipper_gender" id="shipper_gender" style="width:100%">
<option value="" style="padding:5px 10px;">--Select Sex--</option>
<option value="Male" style="padding:5px 10px;">Male</option>
<option value="Female" style="padding:5px 10px;">Female</option>

</select>
  </div>
   <!-- /.select-box-->
</div>
       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
    <label class="form-label" for="shipper_phone" style="font-weight:bold; color:#000;">Phone Number </label>
                          <input class="form-control" id="shipper_phone" type="text" name="shipper_phone" placeholder="Phone Number ">
                          </div>
                        </div>
                        
                        
                         <div class="col-md-6" style="margin-top:20px;">
                         <div class="form-group form-box">
                        <label class="form-label" for="shipper_email" style="font-weight:bold; color:#000;">Email Address *</label>
                          <input class="form-control" id="shipper_email" type="email" name="shipper_email" placeholder="Email Address *">
                        </div>
                        </div>





                        <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipper_address" style="font-weight:bold; color:#000;">Contact Address</label>
                          <input class="form-control" id="shipper_address" type="text" name="shipper_address" placeholder="Contact Address">
                        </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
    <div class="form-group form-box">
  <label class="form-label" for="shipper_city" style="font-weight:bold; color:#000;">City</label>
<input class="form-control" id="shipper_city" type="text" name="shipper_city" placeholder="City "></div>
                    <!-- /.select-box-->
                </div>
                        
                       
      
      
      
      

    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipper_state" style="font-weight:bold; color:#000;">State / Province </label>
                          <input class="form-control" id="shipper_state" type="text" name="shipper_state" placeholder="State / Province">
                        </div>
                        </div>
                
                                

      
      
    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipper_zip_code" style="font-weight:bold; color:#000;">Zip / Postal Code </label>
                          <input class="form-control" id="shipper_zip_code" type="text" name="shipper_zip_code" placeholder="Zip / Postal Code">
                        </div>
                        </div>
                

      
      
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="shipper_country_name" style="font-weight:bold; color:#000;">Country Of Residence *</label>
  <select class="form-control" name="shipper_country_name" id="shipper_country_name" style="width:100%">
<option value="">--Select Country--</option>
<?php for($c=0; $c < count($country_id); $c++){?>
<option value="<?php echo $country_name[$c];?>"> <?php echo $country_name[$c];?> </option>
<?php }?>

</select>
</div>
                    <!-- /.select-box-->
                </div>
                
                








<div class="col-md-12 pt-4">
<label class="form-label" for="shipper_photo" style="font-weight:bold; color:#000;">Shipper's Photo </label>
<div class="input-group mb-3">
                                            <div class="custom-file">
<input class="custom-file-input" id="shipper_photo" name="shipper_photo" type="file" onchange="getFileInfoFunc(this.value,'shipperPhotoDiv')">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            <div class="col-md-12 mt-2" id="shipperPhotoDiv" style="font-size:12px; font-weight:bold; color:#322740;">
No file selected
</div>
  </div>
</div>







<div class="col-md-12" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" style="font-weight:bold; color:#000; margin-right:20px;">Send Shipper A Mail:</label>
  
  
  <label style="margin-right:20px;">
  <input type="radio" checked="checked" name="send_shipper_a_mail" id="send_shipper_a_mailYes" value="YES">
  
  YES
    </label>
    
    
    <label>
  <input type="radio" name="send_shipper_a_mail" id="send_shipper_a_mailNo" value="NO">
  NO
    </label>
    
    
    
    
    <div class="col-lg-12 col-md-12" id="shipperMailDiv">
    
    <label style="font-size:12px; font-weight:bold;">Message To Shipper *</label>
    
    <textarea class="form-control" id="shipper_mail" name="shipper_mail" placeholder="Enter Message Here" rows="4"></textarea>
    
    </div>
    
    
    
    
  
</div>
                    <!-- /.select-box-->
                </div>










<div class="col-lg-12 col-md-12" style="margin-top:40px;">

<h4 style="color:#df4238;">Receiver's Details</h4>
<hr>

</div>













<div class="col-md-6" style="margin-top:20px;">
                       <div class="form-group form-box">
                  <label class="form-label" for="recipient_full_name" style="font-weight:bold; color:#000;">Full Name *</label>
                    
                    <input class="form-control" id="recipient_full_name" name="recipient_full_name" value="" type="text" placeholder="Full Name">
                          </div>
                        </div>
                        
                        
                        
                        
                        
                                  
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="recipient_gender" style="font-weight:bold; color:#000;">Sex*</label>
 <select class="form-control" name="recipient_gender" id="recipient_gender" style="width:100%">
<option value="" style="padding:5px 10px;">--Select Sex--</option>
<option value="Male" style="padding:5px 10px;">Male</option>
<option value="Female" style="padding:5px 10px;">Female</option>

</select>
  </div>
   <!-- /.select-box-->
</div>
       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
    <label class="form-label" for="recipient_phone" style="font-weight:bold; color:#000;">Phone Number </label>
                          <input class="form-control" id="recipient_phone" type="text" name="recipient_phone" placeholder="Phone Number ">
                          </div>
                        </div>
                        
                        
                         <div class="col-md-6" style="margin-top:20px;">
                         <div class="form-group form-box">
                        <label class="form-label" for="recipient_email" style="font-weight:bold; color:#000;">Email Address *</label>
                          <input class="form-control" id="recipient_email" type="email" name="recipient_email" placeholder="Email Address *">
                        </div>
                        </div>





                        <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="recipient_address" style="font-weight:bold; color:#000;">Contact Address</label>
                          <input class="form-control" id="recipient_address" type="text" name="recipient_address" placeholder="Contact Address">
                        </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6" style="margin-top:20px;">
    <div class="form-group form-box">
  <label class="form-label" for="recipient_city" style="font-weight:bold; color:#000;">City</label>
<input class="form-control" id="recipient_city" type="text" name="recipient_city" placeholder="City "></div>
                    <!-- /.select-box-->
                </div>
                        
                       
      
      
      
      

    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="recipient_state" style="font-weight:bold; color:#000;">State / Province </label>
                          <input class="form-control" id="recipient_state" type="text" name="recipient_state" placeholder="State / Province">
                        </div>
                        </div>
                
                                

      
      
    <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="recipient_zip_code" style="font-weight:bold; color:#000;">Zip / Postal Code </label>
                          <input class="form-control" id="recipient_zip_code" type="text" name="recipient_zip_code" placeholder="Zip / Postal Code">
                        </div>
                        </div>
                

      
      
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="recipient_country_name" style="font-weight:bold; color:#000;">Country Of Residence *</label>
  <select class="form-control" name="recipient_country_name" id="recipient_country_name" style="width:100%">
<option value="">--Select Country--</option>
<?php for($c=0; $c < count($country_id); $c++){?>
<option value="<?php echo $country_name[$c];?>"> <?php echo $country_name[$c];?> </option>
<?php }?>

</select>
</div>
                    <!-- /.select-box-->
                </div>
                
                




<div class="col-md-12" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label"  style="font-weight:bold; color:#000; margin-right:20px;">Send Receiver A Mail:</label>
  
  
  <label style="margin-right:20px;">
  <input type="radio" checked="checked" name="send_recipient_a_mail" id="send_recipient_a_mailYes" value="YES">
  
  YES
    </label>
    
    
    <label>
  <input type="radio" name="send_recipient_a_mail" id="send_recipient_a_mailNo" value="NO">
  NO
    </label>
    
    
    
    
    <div class="col-lg-12 col-md-12" id="recipientrMailDiv">
    
    <label style="font-size:12px; font-weight:bold;">Message To Receiver *</label>
    
    <textarea class="form-control" id="recipient_mail" name="recipient_mail" placeholder="Enter Message Here" rows="4"></textarea>
    
    </div>
    
    
    
    
  
</div>
                    <!-- /.select-box-->
                </div>







<div class="col-lg-12 col-md-12" style="margin-top:40px;">

<h4 style="color:#df4238;">Shipment's Details</h4>
<hr>

</div>








                
   <div class="col-md-12" style="margin-top:20px;">
   <div class="form-group form-box">
   <label class="form-label" for="shipment_tracking_no" style="font-weight:bold; color:#000;">Tracking Number *</label>
   <input class="form-control" type="text" id="shipment_tracking_no" name="shipment_tracking_no" placeholder="Tracking Number">
                          </div>
                        </div>             
                
                
                
                




<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="shipment_freight" style="font-weight:bold; color:#000;">Freight Type *</label>
  <select class="form-control" name="shipment_freight" id="shipment_freight" style="width:100%">
  
<option value="">--Freight Type--</option>

<option value="Air Freight">Air Freight</option>
<option value="Sea Freight">Sea Freight</option>
<option value="Road Freight">Road Freight</option>
<option value="Rail Freight">Rail Freight</option>

</select>
</div>
                    <!-- /.select-box-->
                </div>


                
                
                
                
   <div class="col-md-6" style="margin-top:20px;">
   <div class="form-group form-box">
   <label class="form-label" for="shipment_content_type" style="font-weight:bold; color:#000;">Shipment Content Type * (e.g. Parcel, Container)</label>
   <input class="form-control" type="text" id="shipment_content_type" name="shipment_content_type" placeholder="Content Type">
                          </div>
                        </div>             
                
                
                
                
                
                
                
                
                
                <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_description" style="font-weight:bold; color:#000;">Brief Description Of Shipment *</label>
<textarea class="form-control" id="shipment_description" name="shipment_description" placeholder="Brief Description Of Shipment"></textarea>
                        </div>
                        </div>
                        
                        
                
                
                

                        
                        <div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_weight" style="font-weight:bold; color:#000;">Weight * (e.g 2kg)</label>
<input class="form-control" id="shipment_weight" type="text" name="shipment_weight" placeholder="Weight *">
                        </div>
                        </div>
                        
                        



        




  
<div class="col-md-6" style="margin-top:20px;">
<div class="form-group form-box">
<label class="form-label" for="shipment_status" style="font-weight:bold; color:#000;">Shipment Status *</label>
  <select class="form-control" name="shipment_status" id="shipment_status" style="width:100%">
  
<option value="">--Shipment Status--</option>

<option value="Pending">Pending</option>
<option value="Processing">Processing</option>
<option value="In Transit">In Transit</option>
<option value="On Board">On Board</option>
<option value="Delivered">Delivered</option>
<option value="On Hold">On Hold</option>
</select>
</div>
                    <!-- /.select-box-->
                </div>









<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_take_off_point" style="font-weight:bold; color:#000;">Take off Point *</label>
<input class="form-control" id="shipment_take_off_point" type="text" name="shipment_take_off_point" placeholder="Take off Point">
                        </div>
                        </div>







<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_final_destination" style="font-weight:bold; color:#000;">Final Destination *</label>
<input class="form-control" id="shipment_final_destination" type="text" name="shipment_final_destination" placeholder="Final Destination">
                        </div>
                        </div>
















<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_shipping_date" style="font-weight:bold; color:#000;">Date Shipped *</label>
<input class="form-control" id="shipment_shipping_date" type="text" name="shipment_shipping_date" placeholder="Date Shipped">
                        </div>
                        </div>














<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_shipping_time" style="font-weight:bold; color:#000;">Time Shipped *</label>
<input class="form-control" id="shipment_shipping_time" type="text" name="shipment_shipping_time" placeholder="Time Shipped">
                        </div>
                        </div>
















<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_expected_delivery_date" style="font-weight:bold; color:#000;">Expected Delivery Date *</label>
<input class="form-control" id="shipment_expected_delivery_date" type="text" name="shipment_expected_delivery_date" placeholder="Expected Delivery Date">
                        </div>
                        </div>









<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_expected_delivery_time" style="font-weight:bold; color:#000;">Expected Delivery Time *</label>
<input class="form-control" id="shipment_expected_delivery_time" type="text" name="shipment_expected_delivery_time" placeholder="Expected Delivery Time">
                        </div>
                        </div>










<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_actual_delivery_date" style="font-weight:bold; color:#000;">Actual Delivery Date *</label>
<input class="form-control" id="shipment_actual_delivery_date" type="text" name="shipment_actual_delivery_date" placeholder="Actual Delivery Date">
                        </div>
                        </div>







<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_actual_delivery_time" style="font-weight:bold; color:#000;">Actual Delivery Time *</label>
<input class="form-control" id="shipment_actual_delivery_time" type="text" name="shipment_actual_delivery_time" placeholder="Actual Delivery Time">
                        </div>
                        </div>







<div class="col-lg-12 col-md-12" style="margin-top:40px;">

<h4 style="color:#df4238;">Shipment's Travel History</h4>
<hr>

</div>








<div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
 <label class="form-label" for="shipment_travel_history_location" style="font-weight:bold; color:#000;">Shipment Location *</label>
<input class="form-control" id="shipment_travel_history_location" type="text" name="shipment_travel_history_location" placeholder="Shipment Location">
                        </div>
                        </div>




<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_travel_date" style="font-weight:bold; color:#000;">Actvity Date *</label>
<input class="form-control" id="shipment_travel_date" type="text" name="shipment_travel_date" placeholder="Activity Date">
                        </div>
                        </div>







<div class="col-md-6" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_travel_time" style="font-weight:bold; color:#000;">Activity Time *</label>
<input class="form-control" id="shipment_travel_time" type="text" name="shipment_travel_time" placeholder="Activity Time">
                        </div>
                        </div>







 
                
                
                <div class="col-md-12" style="margin-top:20px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="shipment_travel_description" style="font-weight:bold; color:#000;">Brief Description</label>
<textarea class="form-control" id="shipment_travel_description" name="shipment_travel_description" placeholder="Brief Description"></textarea>
                        </div>
                        </div>
                        
                        
                
                
      
                       
                        
                 
 
 <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred" style="margin-top:20px;">
          <button class="btn btn-primary solid blank" type="submit" id="postShipmentBtn" name="postShipmentBtn" onClick="postShipmentFunc1()">Post Shipment</button>
          <button type="reset" name="clear_form" id="clear_form" class="btn main_btn" style="display:none;">Clear Message</button>
                                    </div>

                    
                                         
</div>
                     
                    </form>
                                                                       
                             
                            </div>




</div>









							
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
    <!--<script src="./js/styleSwitcher.js"></script>-->
    
    
    
    <script src="js/jquery.bpopups2.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    
    
    
    
    
    
    
    
    
    
    <script language="javascript" type="text/javascript">
    
    
    
$( document ).ready(function() {

	



$('#regForm').on('submit', function(e) {
e.preventDefault();




var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;




//alert(1);

//return  false;





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






var shipper_photo = document.getElementById('shipper_photo').value;
shipper_photo=shipper_photo.replace(/^\s+|\s+$/g,'');
shipper_photo=shipper_photo.replace(/,/g, "");
shipper_photo=shipper_photo.replace(/ /g, "");




if(shipper_photo!=''){
var ext = shipper_photo.substring(shipper_photo.lastIndexOf('.') + 1);

if(ext != "gif" && ext != "GIF" && ext != "JPEG" && ext != "jpeg" && ext != "jpg" && ext != "JPG" && ext != "png" && ext != "PNG")
{
alert("Upload only image file as shipper photo");
document.getElementById('shipper_photo').focus();

return false;
} 

}



var send_shipper_a_mail_selected = 'NO'



var send_shipper_a_mail = document.getElementsByName('send_shipper_a_mail');

var sendAhipperAmailLength = send_shipper_a_mail.length;




for(var s=0; s < sendAhipperAmailLength; s++){ // for loop starts

if(send_shipper_a_mail.item(s).checked == true){
var send_shipper_a_mail_selected = send_shipper_a_mail.item(s).value;
break;
}

} // for loop stops

/*
alert(send_shipper_a_mail_selected);
return false;
*/

// if send_shipper_a_mail is yes starts here

if(send_shipper_a_mail_selected=='YES'){ 

var shipper_mail = document.getElementById('shipper_mail').value;
shipper_mail=shipper_mail.replace(/^\s+|\s+$/g,'');


if(shipper_mail==''){
alert("Please provide message to send to shipper!");
document.getElementById("shipper_mail").focus();
return false;
}


} // if send_shipper_a_mail is yes stops here






// shipper details stops here









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





var send_recipient_a_mail_selected = 'NO'



var send_recipient_a_mail = document.getElementsByName('send_recipient_a_mail');

var sendARecipientAmailLength = send_recipient_a_mail.length;




for(var s=0; s < sendARecipientAmailLength; s++){ // for loop starts

if(send_recipient_a_mail.item(s).checked == true){
var send_recipient_a_mail_selected = send_recipient_a_mail.item(s).value;
break;
}

} // for loop stops

/*
alert(send_recipient_a_mail_selected);
return false;
*/

// if send_recipient_a_mail is yes starts here

if(send_recipient_a_mail_selected=='YES'){ 

var recipient_mail = document.getElementById('recipient_mail').value;
recipient_mail=recipient_mail.replace(/^\s+|\s+$/g,'');


if(recipient_mail==''){
alert("Please provide message to send to receiver!");
document.getElementById("recipient_mail").focus();
return false;
}


} // if send_shipper_a_mail is yes stops here


// receiver details stops here






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






/*
var shipment_travel_description = document.getElementById('shipment_travel_description').value;
shipment_travel_description=shipment_travel_description.replace(/^\s+|\s+$/g,'');

if(shipment_travel_description==''){
alert("Please provide travel description!");
document.getElementById('shipment_travel_description').focus();
return false;
}


*/







$('#postShipmentBtn').attr('disabled', ''); // disable upload button
//show uploading message

				
$('#popUpLoader').bPopup({
modalClose: false,
opacity: 0.6,
positionStyle: 'absolute' //'fixed' or 'absolute'
});
				
$(this).ajaxSubmit({
success:  function(data, status, xhr) {




if(data==0){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
alert("Access denied!");
},400);



setTimeout(function (){
location.reload(true);
},600);




return false;
}




else if(data==1){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
alert("The tracking number your provided, is already existing on the system!");
},400);

return false;
}








else if(data==2){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
alert("Invalid file type");
},400);

return false;
}







else if(data==3){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
alert("Invalid image width, image minimum width must be 100px");
},400);

return false;
}




else if(data==4){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
alert("Invalid image height, image minimum height must be 100px");
},400);

return false;
}





else if(data==5){
setTimeout(function (){
$('#ClosePopLoader').click();
alert("Shipment successfully posted");
},300);

setTimeout(function (){	
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
location.reload(true);
},400);
}





else if(data==6){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
alert("Image file not provided!");
},400);

return false;
}



else if(data==7){
setTimeout(function (){
$('#ClosePopLoader').click();
},300);

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
alert("Form not posted!");

},400);

return false;
}




else{

setTimeout(function (){
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
$('#ClosePopLoader').click();
},300);



setTimeout(function (){
$('#ClosePopLoader').click();
alert("New shipment successfully posted");
},300);

setTimeout(function (){	
$('#postShipmentBtn').removeAttr('disabled'); //enable submit button
location.reload(true);
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



function manageShipmentFunc(shipment_tracking_no){


$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});	
								



var strURL="view_shipment_session.php?shipment_tracking_no="+shipment_tracking_no;

	


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
location ='manage-shipment-details';		
},400);
				
return false;
}


else{

setTimeout(function (){
alert("Shipment not found!");
return false;
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









function getStatesFunc(country_id){


$('#popUpLoader').bPopup({
modalClose: false,
opacity: 0.3,
positionStyle: 'fixed' //'fixed' or 'absolute'
});


if(country_id==''){
document.getElementById('user_state_id').innerHTML='<option value="">--Select Country First--</option>';

setTimeout(function (){
document.getElementById('ClosePopLoader').click();		
},300);

return false;
}




var strURL="get_states_manage.php?country_id="+country_id;

		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						


setTimeout(function (){
document.getElementById('ClosePopLoader').click();		
},300);
					
document.getElementById('user_state_id').innerHTML=req.responseText;

			
				
					
					}
					else {
					setTimeout(function (){	
					document.getElementById('ClosePopLoader').click();
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









function manageUserStatusFunc(shipment_id,shipment_id){



$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});	
								



var strURL="get_member_status.php?shipment_id="+shipment_id+"&shipment_id="+shipment_id;

	


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

document.getElementById('donorClientInfoModalDetails').innerHTML=req.responseText;


$('#donorClientInfoModalLong').modal({
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


















function submitStatusUpdateFunc(){


var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
/*var regPattern = /^[R]+[B]+[0-9]{8}$/;*/

var phonePattern = /^[0-9]+\.{11}$/;
var namePattern = /^[A-Za-z ]+$/;



var user_account_status = document.getElementById('user_account_status').value;
user_account_status=user_account_status.replace(/^\s+|\s+$/g,'');
if(user_account_status==''){
alert("Please select user account activation status!");
document.getElementById("user_account_status").focus();
return false;
}




var dataString = $('#clientStatusForm').serialize();
var strURL="user_status_update_process.php";


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

alert("Client's status successfully updated!");
location.reload(true);

},300);
return false;

}







else {
//alert(req.responseText);
alert("Unable to process your request, please try later!");
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













function gotoNexpage(pageNo){
	
var strURL="get_next_shipment_page.php?pageNo="+pageNo;

$('#transLoader').bPopup({
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
document.getElementById('CloseTransLoader').click();
},500);

if(req.responseText==1){
document.getElementById('displayMsg2').innerHTML="An unknown error occurred";

$('#justMyPopUpAlert').bPopup({
modalClose: false,
opacity: 0.2,
positionStyle: 'absolute' //'fixed' or 'absolute'
}); 

return false;
}


else{
document.getElementById('clientDiv').innerHTML=req.responseText;
}
	

} else {
setTimeout(function (){
document.getElementById('CloseTransLoader').click();
},500);



setTimeout(function (){

document.getElementById('displayMsg2').innerHTML="There was a problem while using XMLHTTP:\n" + req.statusText;
$('#justMyPopUpAlert').bPopup({

modalClose: false,
opacity: 0.2,
positionStyle: 'absolute' //'fixed' or 'absolute'
}); 

return false;

},1000);


}

}				
 }		
req.open("GET", strURL, true);
req.send(null);
}

}








function selectAllFunc(){


var selectAll = document.getElementById('selectAll').checked;


shipment_tracking_nos  = document.getElementsByName('shipment_tracking_nos[]');

var xn =  shipment_tracking_nos.length;
var xc=0;



for(var i = 0; i < xn; i++){ // for loop starts here

shipment_tracking_nos.item(i).checked=selectAll;

if(selectAll==true){
xc++;
}


} // for loop ends here


document.getElementById('checkSelected').value=xc;


}














function deleteSelectedFunc(){


shipment_tracking_nos  = document.getElementsByName('shipment_tracking_nos[]');

var xn =  shipment_tracking_nos.length;
var xc=0;


for(var i = 0; i < xn; i++){ // for loop starts here

if(shipment_tracking_nos.item(i).checked==true){
xc++;
}


} // for loop ends here


if(xc<1){

alert("No Shipment selected!");
return false;

}




if(!confirm("Are you sure that you to delete the selected shipments?")){
return false;
}




var dataString = $('#clientListForm').serialize();
var strURL="delete_selected_shipments_process.php";


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
	
alert("Shipments successfully deleted");

},300);

setTimeout(function (){
location.reload(true);
},500);

return false;

}


else {
//alert("Unable to process your request, please try later!");
alert(req.responseText);
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















function deleteShipmentFunc(shipment_tracking_no){

if(!confirm("Are you sure that you to delete this shipment?")){
return false;
}



$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});	
								



var strURL="delete_shipment_process.php?shipment_tracking_no="+shipment_tracking_no;


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





</script>
</body>
</html>