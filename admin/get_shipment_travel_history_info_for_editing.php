<?php

date_default_timezone_set("America/Los_Angeles");

require_once("../config.php");

function sanitizeContent($var){
$var = str_replace('&nbsp;','',$var);
$var = str_replace('&nbsp;','',$var);
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}


$hNo =0;

if(isset($_GET['shipment_travel_history_id'])){

$shipment_travel_history_id = $_GET['shipment_travel_history_id'];


// query for shipment history starts


$querys="SELECT * FROM tbl_shipment_travel_history 

 WHERE shipment_travel_history_id='$shipment_travel_history_id'";
 
$results=mysqli_query($db,$querys) or die(mysqli_error($db));

$hNo=mysqli_num_rows($results);


if($hNo>0){
while($rows = mysqli_fetch_array($results, MYSQLI_ASSOC)){

$shipment_travel_history_id=sanitizeContent($rows["shipment_travel_history_id"]);
$shipment_travel_shipment_tracking_no=sanitizeContent($rows["shipment_travel_shipment_tracking_no"]);
$shipment_travel_date=sanitizeContent($rows["shipment_travel_date"]);
$shipment_travel_time=sanitizeContent($rows["shipment_travel_time"]);

$shipment_travel_status=sanitizeContent($rows["shipment_travel_status"]);
$shipment_travel_description=sanitizeContent($rows["shipment_travel_description"]);
$shipment_travel_history_location=sanitizeContent($rows["shipment_travel_history_location"]);

} // shipment history while loop stops here

}

// query for shipment history stops



}
		


if ($hNo >0) { // if not found 2	

?>














<div class="row row-xs">

<div class="col-md-12" style="margin-top:10px;">

<input type="hidden" value="<?php echo $shipment_travel_history_id;?>" id="edit_shipment_travel_history_id" name="shipment_travel_history_id">


                        <div class="form-group form-box">
 <label class="form-label" for="edit_shipment_travel_history_location" style="font-weight:bold; color:#000; font-size:12px;">Shipment Location *</label>
<input class="form-control" value="<?php echo $shipment_travel_history_location;?>" id="edit_shipment_travel_history_location" type="text" name="shipment_travel_history_location" placeholder="Shipment Location">
                        </div>
                        </div>
                               
                                
 



<div class="col-md-6" style="margin-top:10px;">
 <label style="font-weight:bold; color:#000; font-size:12px;" for="edit_shipment_travel_date">Actvity Date (dd-mm-yyyy) *</label>
 
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar text-18"></i></span></div>

<input class="form-control" value="<?php echo $shipment_travel_date;?>"  id="edit_shipment_travel_date" type="text" name="shipment_travel_date" placeholder="Activity Date">
</div>
</div>








<div class="col-md-6" style="margin-top:10px;">
 <label style="font-weight:bold; color:#000; font-size:12px;" for="edit_shipment_travel_time">Actvity Time (hh:mins) *</label>
 
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o text-18"></i></span></div>

<input class="form-control" value="<?php echo $shipment_travel_time;?>"   id="edit_shipment_travel_time" type="text" name="shipment_travel_time" placeholder="Activity Time">
</div>
</div>



 
                
                
                <div class="col-md-12" style="margin-top:10px;">
                        <div class="form-group form-box">
                        <label class="form-label" for="edit_shipment_travel_description" style="font-weight:bold; color:#000; font-size:12px;">Brief Description</label>
<textarea class="form-control" id="edit_shipment_travel_description" name="shipment_travel_description" placeholder="Travel Description"><?php echo $shipment_travel_description;?></textarea>
                        </div>
                        </div>






</div>







<?php }
else { echo 1; exit; }

?>

