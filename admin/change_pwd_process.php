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

$admin_id=$_SESSION['admin_id'];

if(isset($_POST['pf_client_password'])){
		
$password=$_POST['client_password'];


mysqli_query($db,"UPDATE tbl_admin SET 
password='$password'
WHERE admin_id='$admin_id'")
or die(mysqli_error($db));
	
echo 1; exit;
}


else{ echo 2; exit;}

?>