<?php
session_start();

require_once('../config.php');



if(isset($_POST['shipment_travel_history_ids'])){
		
$shipment_travel_history_ids=$_POST['shipment_travel_history_ids'];


for($i=0; $i < count($shipment_travel_history_ids); $i++){

mysqli_query($db,"DELETE FROM tbl_shipment_travel_history WHERE
shipment_travel_history_id='$shipment_travel_history_ids[$i]'")
or die(mysqli_error($db));

}




echo 1; exit;
}


else{ echo 3; exit;}

?>