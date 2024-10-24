<?php
session_start();


$yearDate=date("Y");

function sanitize($var){
$var=str_replace("’","&rsquo;",$var);
$var=str_replace("'","&rsquo;",$var);
$var=htmlentities($var);
$var=trim($var);
return $var;
}



require_once('../config.php');


if(isset($_POST['shipment_travel_history_id'])){
	
$shipment_travel_history_id = strtoupper($_POST['shipment_travel_history_id']);
$shipment_travel_history_location = sanitize($_POST['shipment_travel_history_location']);


$shipment_travel_date = str_replace('/','-',sanitize($_POST['shipment_travel_date']));
$shipment_travel_time = sanitize($_POST['shipment_travel_time']);
$shipment_travel_description = sanitize($_POST['shipment_travel_description']);






mysqli_query($db,"UPDATE tbl_shipment_travel_history SET 

shipment_travel_date = '$shipment_travel_date',
shipment_travel_time = '$shipment_travel_time',
shipment_travel_description = '$shipment_travel_description',
shipment_travel_history_location = '$shipment_travel_history_location'

WHERE shipment_travel_history_id='$shipment_travel_history_id'

") or die(mysqli_error($db));



echo 1; exit;
}


else{ echo 3; exit;}

?>