<?php

session_start();
//error_reporting(0);
require_once('../config.php');

function sanitize($var){
$var=str_replace("’","&rsquo;",$var);
$var=str_replace("'","&rsquo;",$var);
$var=htmlentities($var);
$var=trim($var);
return $var;
}



function sanitizeClean1($var){
$var = str_replace('&nbsp;','',$var);
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}



if(isset($_POST['applicant_LogCheck'])){  // if form is posted
$partner_LogCheck = $_POST['applicant_LogCheck'];
$username = sanitize($_POST['username']);
$password = sanitize($_POST['password']);


if(empty($username) || $username =='' || empty($password) || $password == ''){ // if empty field is posted
echo 1; exit;
} // end of if empty field is posted


$sql = "SELECT
admin_id,
Authentication,
username,
status

FROM tbl_admin WHERE username='$username' AND password='$password'";
$result= mysqli_query($db,$sql) or die (mysqli_error($db)); 
$num=mysqli_num_rows($result);
if ($num < 1) { echo 1;exit; } // accno does not exist


else{ // if accno exists
	
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){		
$admin_id=$row["admin_id"];
$Authentication=$row["Authentication"];
$username=$row["username"];
$admin_status=$row["status"];
}

if($Authentication!='YES'){
echo 2;exit; // Denied Login Access
}

else { // if authenticated
$_SESSION['admin_id']=$admin_id;
$_SESSION['Authentication']=$Authentication;
$_SESSION['admin_status']=$admin_status;
$_SESSION['admin_username']=$username;
echo 3; exit;

} // end of if authenticated


} // end of if accno exists


} // end of if form is posted


else { // if form is not posted
 echo 1;exit;  // accno does not exist
}