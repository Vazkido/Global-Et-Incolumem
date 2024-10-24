<?php 
session_start(); 

if( !isset($_POST['shipment_tracking_no']) or empty($_POST['shipment_tracking_no'])){ 

echo 1; exit;
}

require_once('config.php');

$shipment_tracking_no=$_POST['shipment_tracking_no'];


$sql = "SELECT shipment_tracking_no FROM tbl_shipment 
WHERE shipment_tracking_no='$shipment_tracking_no'";


$result= mysqli_query($db,$sql) or die (mysqli_error($db)); 

$num=mysqli_num_rows($result);

if ($num < 1) { echo 1;exit(); } // accno does not exist, continue with processing 

elseif($num >0){
	
$_SESSION['shipmentTrackingNo']=$shipment_tracking_no;

echo 3; 
exit; //goto next page
}


else{
	echo 4; 
	exit; // An unkonwn error occurred, try again!
}


?>