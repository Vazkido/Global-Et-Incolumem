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

$user_id = $_SESSION['user_id'];
$user_account_id = $_SESSION['user_account_id'];

require_once('../config.php');




if(isset($_POST['old_pwd'])){
	
$user_password=$_POST["user_password"];

mysqli_query($db,"UPDATE tbl_user SET user_password='$user_password' WHERE user_id='$user_id'")
or die(mysqli_error($db));


echo 1; exit;
}


else{ echo 3; exit;}

?>