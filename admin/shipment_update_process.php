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


if(isset($_POST['shipment_id'])){
	
$shipment_id=sanitize($_POST["shipment_id"]);

$shipment_tracking_no = strtoupper($_POST['shipment_tracking_no']);


$shipment_freight = sanitize($_POST['shipment_freight']);
$shipment_content_type = sanitize($_POST['shipment_content_type']);
$shipment_description = sanitize($_POST['shipment_description']);
$shipment_weight = sanitize($_POST['shipment_weight']);
$shipment_status = sanitize($_POST['shipment_status']);
$shipment_take_off_point = sanitize($_POST['shipment_take_off_point']);
$shipment_final_destination = sanitize($_POST['shipment_final_destination']);
$shipment_shipping_date = str_replace('/','-',sanitize($_POST['shipment_shipping_date']));
$shipment_shipping_time = sanitize($_POST['shipment_shipping_time']);
$shipment_expected_delivery_date = str_replace('/','-',sanitize($_POST['shipment_expected_delivery_date']));
$shipment_expected_delivery_time = sanitize($_POST['shipment_expected_delivery_time']);
$shipment_actual_delivery_date = str_replace('/','-',sanitize($_POST['shipment_actual_delivery_date']));
$shipment_actual_delivery_time = sanitize($_POST['shipment_actual_delivery_time']);
$shipment_tracking_no_old = sanitize($_POST['shipment_tracking_no_old']);
$recipient_id = sanitize($_POST['shipment_recipient_id']);


// query to get check if email already exist
$s_zQuery="SELECT shipment_tracking_no FROM tbl_shipment WHERE shipment_tracking_no='$shipment_tracking_no' AND shipment_id!='$shipment_id'"; // query for email
$s_zQueryResults=mysqli_query($db,$s_zQuery) or die(mysqli_error($db));
$s_zQueryNums=mysqli_num_rows($s_zQueryResults);

if($s_zQueryNums>0){ // if email is found
echo 2; exit; // this email already exist on the system
} // end of checking if email already exist







mysqli_query($db,"UPDATE tbl_shipment SET

shipment_tracking_no = '$shipment_tracking_no',
shipment_freight = '$shipment_freight',
shipment_content_type = '$shipment_content_type',
shipment_description = '$shipment_description',
shipment_weight = '$shipment_weight',
shipment_status = '$shipment_status',
shipment_take_off_point = '$shipment_take_off_point',
shipment_final_destination = '$shipment_final_destination',
shipment_shipping_date = '$shipment_shipping_date',
shipment_shipping_time = '$shipment_shipping_time',
shipment_expected_delivery_date = '$shipment_expected_delivery_date',
shipment_expected_delivery_time = '$shipment_expected_delivery_time',
shipment_actual_delivery_date = '$shipment_actual_delivery_date',
shipment_actual_delivery_time = '$shipment_actual_delivery_time'


WHERE shipment_id='$shipment_id'


") or die(mysqli_error($db));



mysqli_query($db,"UPDATE tbl_recipient SET

recipient_shipment_tracking_no = '$shipment_tracking_no'

WHERE recipient_id='$recipient_id'
") or die(mysqli_error($db));




mysqli_query($db,"UPDATE tbl_shipment_travel_history  SET 

shipment_travel_shipment_tracking_no = '$shipment_tracking_no'

WHERE shipment_travel_shipment_tracking_no = '$shipment_tracking_no_old'

") or die(mysqli_error($db));




$_SESSION['shipment_tracking_no'] = $shipment_tracking_no;


echo 1; exit;
}


else{ echo 3; exit;}

?>