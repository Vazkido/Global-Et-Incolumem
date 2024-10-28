<?php
session_start();

require_once('../config.php');



if(isset($_GET['shipment_travel_history_id'])){
		
$shipment_travel_history_id=$_GET['shipment_travel_history_id'];



mysqli_query($db,"DELETE FROM tbl_shipment_travel_history WHERE
shipment_travel_history_id='$shipment_travel_history_id'")
or die(mysqli_error($db));





echo 1; exit;
}


else{ echo 3; exit;}

?>