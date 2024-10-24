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


if(isset($_POST['shipper_refno'])){
	
$shipper_refno=sanitize($_POST["shipper_refno"]);

$shipper_full_name=sanitize($_POST['shipper_full_name']);
$shipper_gender=sanitize($_POST['shipper_gender']);
$shipper_phone=sanitize($_POST['shipper_phone']);
$shipper_address=sanitize($_POST['shipper_address']);
$shipper_email=strtolower(sanitize($_POST['shipper_email']));
$shipper_city=sanitize($_POST['shipper_city']);
$shipper_state=sanitize($_POST['shipper_state']);
$shipper_zip_code=sanitize($_POST['shipper_zip_code']);
$shipper_country_name=sanitize($_POST['shipper_country_name']);









mysqli_query($db,"UPDATE tbl_shipper SET

shipper_full_name='$shipper_full_name', 
shipper_gender='$shipper_gender',
shipper_phone='$shipper_phone',
shipper_address='$shipper_address',
shipper_email='$shipper_email',
shipper_city='$shipper_city',
shipper_state='$shipper_state',
shipper_zip_code='$shipper_zip_code',
shipper_country_name='$shipper_country_name'

WHERE shipper_refno='$shipper_refno'") or die(mysqli_error($db));



echo 1; exit;
}


else{ echo 3; exit;}

?>