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


$user_account_id=rand(1000000,9999999);

$s_zQueryNums=0;

if(isset($_POST['user_email_address'])){	
$user_email_address=strtolower(sanitize($_POST['user_email_address']));




$sql = "SELECT
user_firstname,
user_lastname,
username,
user_password
FROM tbl_user WHERE user_email_address='$user_email_address'";
$result= mysqli_query($db,$sql) or die (mysqli_error($db)); 
$s_zQueryNums = mysqli_num_rows($result);

if($s_zQueryNums<1){ // if email is found
echo 2; exit; // this email already exist on the system
} // end of checking if email already exist


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){		
$username=$row["username"];
$contact_name=$row["user_firstname"].' '.$row["user_lastname"];
$user_password=$row["user_password"];
}




$msgBody= "<p> Dear <strong>$contact_name</strong>,</p>
   <p>&nbsp; &nbsp;</p>
   

 <p> 
You recently request for your password recovery, if this request was not made by you kindly contact support immediately

<strong>Important: Do not provide your login and password to anyone!</strong>.
</p>
<p>&nbsp; &nbsp;</p>

<p>
Username: <strong>$username</strong><br> 
Password: <strong>$user_password</strong><br>
 

 </p>
<p> &nbsp; &nbsp; </p>
";

$subjects="Password Recovery!";
$headers = array();
	$headers[]= 'MIME-Version: 1.0';
	$headers[]= 'Content-type: text/html; charset=iso-8859-1';
	$headers[]= 'Content-Transfer-Encoding: 7bit';
	$headers[]='From: Multitrack Cargo Express <support@earnunitcoin.com>';
$mesg ="$msgBody"."\n";
$mesg = wordwrap($mesg, 70);




$pageDate = <<<HEREDOC_NAME
   <html><body style="font-family: Helvetica,Arial,sans-serif;
	line-height: 1.5em;
	margin: 0px 0px 0px 0px;
	font-size: 12px;
	color: #333;">



<div style="padding:20px 10px 30px 10px;">$mesg</div>


</body></html>
	
HEREDOC_NAME;



mail($user_email_address,$subjects,$pageDate,join("\r\n", $headers));
echo 1; exit;

}


else{ echo 3; exit;}

?>