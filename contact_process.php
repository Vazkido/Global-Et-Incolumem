<?php
date_default_timezone_set("America/Los_Angeles");
$yearDate=date("Y");




error_reporting(0);


if(isset($_POST['name'])){

   

$name=ucwords(strtolower($_POST['name']));
$email=strtolower($_POST['email']);
$message=$_POST['message'];
$phonenumber=$_POST['phonenumber'];
$subject=ucwords(strtolower($_POST['subject']));
$subject="CONTACT FORM: ".$subject;

$message = "Message: ". $message. "\n\n";
$message .= "Name: ". $name. "\n";
$message .= "Email: ". $email. "\n";
$message .= "Phone Number: ". $phonenumber. "\n";
$send="info@mkcargo.net";
$header='From:'. ' '. $name. '<'.$email.'>';


	mail($send,$subject,$message,$header);
	echo 1; exit; 
}

else{
echo 2; exit;
}

?>