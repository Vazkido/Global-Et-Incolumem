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


if(isset($_POST['recipient_id'])){
	
$recipient_id=sanitize($_POST["recipient_id"]);

$recipient_full_name=sanitize($_POST['recipient_full_name']);
$recipient_gender=sanitize($_POST['recipient_gender']);
$recipient_phone=sanitize($_POST['recipient_phone']);
$recipient_address=sanitize($_POST['recipient_address']);
$recipient_email=strtolower(sanitize($_POST['recipient_email']));
$recipient_city=sanitize($_POST['recipient_city']);
$recipient_state=sanitize($_POST['recipient_state']);
$recipient_zip_code=sanitize($_POST['recipient_zip_code']);
$recipient_country_name=sanitize($_POST['recipient_country_name']);


mysqli_query($db,"UPDATE tbl_recipient SET

recipient_full_name='$recipient_full_name', 
recipient_gender='$recipient_gender',
recipient_phone='$recipient_phone',
recipient_address='$recipient_address',
recipient_email='$recipient_email',
recipient_city='$recipient_city',
recipient_state='$recipient_state',
recipient_zip_code='$recipient_zip_code',
recipient_country_name='$recipient_country_name'

WHERE recipient_id='$recipient_id'") or die(mysqli_error($db));



echo 1; exit;
}


else{ echo 3; exit;}

?>