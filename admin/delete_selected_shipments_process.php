<?php
session_start();

require_once('../config.php');



if(isset($_POST['shipment_tracking_nos'])){
		
$shipment_tracking_nos=$_POST['shipment_tracking_nos'];



for($i=0; $i < count($shipment_tracking_nos); $i++){
	
	


mysqli_query($db,"DELETE FROM tbl_shipment WHERE
shipment_tracking_no='$shipment_tracking_nos[$i]'")
or die(mysqli_error($db));


mysqli_query($db,"DELETE FROM tbl_shipment_travel_history WHERE
shipment_travel_shipment_tracking_no='$shipment_tracking_nos[$i]'")
or die(mysqli_error($db));




mysqli_query($db,"DELETE FROM tbl_recipient WHERE
recipient_shipment_tracking_no='$shipment_tracking_nos[$i]'")
or die(mysqli_error($db));





// shipper Query
$cn_num =0;
$cn_sql = "SELECT

shipment_shipper_refno

FROM tbl_shipment WHERE shipment_tracking_no='$shipment_tracking_nos[$i]'";

$cn_result= mysqli_query($db,$cn_sql) or die (mysqli_error($db)); 
$cn_num=mysqli_num_rows($cn_result);

if ($cn_num >0) { // if not found 2	
while($cn_row = mysqli_fetch_array($cn_result, MYSQLI_ASSOC)){ // while loop 2

$shipment_shipper_refno=$cn_row["shipment_shipper_refno"];
}


mysqli_query($db,"DELETE FROM tbl_shipper WHERE
shipper_refno='$shipment_shipper_refno'")
or die(mysqli_error($db));

}

// end of shipper Query


}




echo 1; exit;
}


else{ echo 3; exit;}

?>