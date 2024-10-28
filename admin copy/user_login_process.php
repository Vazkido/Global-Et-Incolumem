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

error_reporting(0);

require_once('../config.php');


$user_account_id=rand(1000000,9999999);
$user_logged_on_date = date("d-m-Y H:i:s A");
$user_last_activity_date = date("Y-m-d H:i:s");
$s_zQueryNums=0;

if(isset($_POST['username'])){	
$username_post=strtolower(sanitize($_POST['username']));
$user_password=$_POST['user_password'];




$sql = "SELECT
user_id,
user_account_id,
user_account_status,
user_tfauth,
user_firstname,
user_lastname,
user_email_address,
username
FROM tbl_user WHERE user_email_address='$username_post' AND user_password='$user_password' OR username='$username_post' AND user_password='$user_password'";
$result= mysqli_query($db,$sql) or die (mysqli_error($db)); 
$s_zQueryNums = mysqli_num_rows($result);

if($s_zQueryNums<1){ // if email is found
echo 2; exit; // this email already exist on the system
} // end of checking if email already exist


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){		
$user_id=$row["user_id"];
$user_account_id=$row["user_account_id"];
$username=$row["username"];
$user_account_status=$row["user_account_status"];
$contact_name=$row["user_firstname"].' '.$row["user_lastname"];
$user_tfauth=$row["user_tfauth"];
$email_address=$row["user_email_address"];
}


if($user_account_status <1){

echo 3; exit;
}


if($user_tfauth<1){ // if two factor is not enabled
$_SESSION['user_id']=$user_id;
$_SESSION['user_account_id']=$user_account_id;
$_SESSION['username']=$username;
$_SESSION['user_account_status']=$user_account_status;


mysqli_query($db,"UPDATE tbl_user SET 
user_logged_on_date='$user_logged_on_date',
user_last_activity_date='$user_last_activity_date',
user_logged_status ='Online'
WHERE user_id='$user_id'")
or die(mysqli_error($db));

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp



echo 1; exit;
} // end of if two factor is not enabled









else{  // if two factor is enabled




}  // end of if two factor is enabled


$one_time_pin=rand(1000000,9999999);

$_SESSION['userIId']=$user_id;
$_SESSION['userAAccount_id']=$user_account_id;
$_SESSION['userName']=$username;
$_SESSION['userAAccount_status']=$user_account_status;
$_SESSION['one_time_pin']=$one_time_pin;






$msgBody= "<p> Dear <strong>$contact_name</strong>,</p>
   <p>&nbsp; &nbsp;</p>
   

 <p> 
A login attempt was recently initiated in your account, to prevent unauthorised access to your account we have a genereated a one time pin for you. 
. Please if this is you, kindly use the below pin code to access your account.

<strong>Important: Do not provide your login and password to anyone!</strong>.
</p>
<p>&nbsp; &nbsp;</p>

<p>
PIN: <strong>$one_time_pin</strong> Please check that you are entering this PIN code at <strong>earnunitcoin.com</strong> web site!: 

 </p>
<p> &nbsp; &nbsp; </p>


<p>
If this login attempt was not made by you, it means someone else is attempting to log into your account. It may be an indication you have been 
the target of a phishing attempt and might want to consider reseting your account password.
</p>";

$subjects="Login Attempt!";
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



mail($email_address,$subjects,$pageDate,join("\r\n", $headers));
echo 5; exit;

}


else{ echo 4; exit;}

?>