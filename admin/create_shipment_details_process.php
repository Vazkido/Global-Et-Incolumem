<?php
session_start();

if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
echo 0;
exit;
}





//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';






//error_reporting(0);

require_once("../config.php");


function sanitize($var){
$var=str_replace("’","&rsquo;",$var);
$var=str_replace("'","&rsquo;",$var);
$var=htmlentities($var);
$var=strtolower($var);
$var=ucwords($var);
$var=trim($var);
return $var;
}




function sanitizeClean($var){
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}



ini_set('upload_max_filesize', '200m');
ini_set('memory_limit', '128M');
ini_set('max_execution_time', '60');
ini_set('max_input_time', '120');






if(isset($_POST['postShipment'])){
	
$shipper_full_name=sanitize($_POST['shipper_full_name']);
$shipper_gender=sanitize($_POST['shipper_gender']);
$shipper_phone=sanitize($_POST['shipper_phone']);
$shipper_address=sanitize($_POST['shipper_address']);
$shipper_email=strtolower(sanitize($_POST['shipper_email']));
$shipper_city=sanitize($_POST['shipper_city']);
$shipper_state=sanitize($_POST['shipper_state']);
$shipper_zip_code=sanitize($_POST['shipper_zip_code']);
$shipper_country_name=sanitize($_POST['shipper_country_name']);
$shipper_refno = md5(date("Ymdhis").rand());


$send_shipper_a_mail=sanitize($_POST['send_shipper_a_mail']);
$shipper_mail=sanitize($_POST['shipper_mail']);






$shipment_date_created = date("d-m-Y h:i:s A");

$recipient_full_name=sanitize($_POST['recipient_full_name']);
$recipient_gender=sanitize($_POST['recipient_gender']);
$recipient_phone=sanitize($_POST['recipient_phone']);
$recipient_address=sanitize($_POST['recipient_address']);
$recipient_email=strtolower(sanitize($_POST['recipient_email']));
$recipient_city=sanitize($_POST['recipient_city']);
$recipient_state=sanitize($_POST['recipient_state']);
$recipient_zip_code=sanitize($_POST['recipient_zip_code']);
$recipient_country_name=sanitize($_POST['recipient_country_name']);


$send_recipient_a_mail=sanitize($_POST['send_recipient_a_mail']);
$recipient_mail=sanitize($_POST['recipient_mail']);


//$recipient_refno = md5(date("Ymdhis").rand());	
	
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
$shipment_travel_date = str_replace('/','-',sanitize($_POST['shipment_travel_date']));
$shipment_travel_time = sanitize($_POST['shipment_travel_time']);
$shipment_travel_description = sanitize($_POST['shipment_travel_description']);
$shipment_travel_history_location = sanitize($_POST['shipment_travel_history_location']);



// tracking number check

$traNum =0;

$trQ = "SELECT shipment_tracking_no FROM tbl_shipment WHERE shipment_tracking_no='$shipment_tracking_no'";

$trQ_r= mysqli_query($db,$trQ) or die (mysqli_error($db));

$traNum=mysqli_num_rows($trQ_r);
 
if($traNum>0){ // while loop 2		
	
echo 1; exit; // tracking number already exists

} // end of while loop 2




//$receiver_notice=sanitize($_POST['receiver_notice']);

//$receiver_notice=1;

$msgBody=sanitize($_POST['shipper_mail']).'<br>';

$msgBody='Dear '.$shipper_full_name.'<br>';

//$msgBody.=sanitize($_POST['rec_msg']);

$msgBody.= 'Please find your shipment details below. Thank you for choosing Multitrack Cargo Express.';







if(isset($_FILES['shipper_photo']) && $_FILES['shipper_photo'] !='') { //if file is uploaded

$shipper_photo=$_FILES['shipper_photo'];

$article_pix_loc='../images/uploads/';



$requiredW 		= 100; // Imaeg width
$requiredH 		= 100; //Image height

$Quality 				= 90;

// Random number for both file, will be added after image name
$RandomNumber 	= rand(0, 9999999999); 

// Elements (values) of $_FILES['shipper_photoBanner'] array
	//let's access these values by using their index position
	$ImageName 		= str_replace(array(' ', '[', ']', '\''), '',strtolower($_FILES['shipper_photo']['name'])); 
	$ImageSize 		= $_FILES['shipper_photo']['size']; // Obtain original image size
	$TempSrc	 	= $_FILES['shipper_photo']['tmp_name']; // Tmp name of image file stored in PHP tmp folder
	$ImageType	 	= $_FILES['shipper_photo']['type']; //Obtain file type, returns "image/png", image/jpeg, text/plain etc.

	//Let's use $ImageType variable to check wheather uploaded file is supported.
	//We use PHP SWITCH statement to check valid image format, PHP SWITCH is similar to IF/ELSE statements 
	//suitable if we want to compare the a variable with many different values
	
	switch(strtolower($ImageType)){
		case 'image/png':
			$CreatedImage =  imagecreatefrompng($_FILES['shipper_photo']['tmp_name']);
			break;
		case 'image/gif':
			$CreatedImage =  imagecreatefromgif($_FILES['shipper_photo']['tmp_name']);
			break;			
		case 'image/jpeg':
		case 'image/jpg':
			$CreatedImage = imagecreatefromjpeg($_FILES['shipper_photo']['tmp_name']);
			break;
		default:
			echo 2; exit; //invalid image type
	}
	

	list($CurWidth,$CurHeight)=getimagesize($TempSrc);
	
	if($CurWidth < $requiredW ){
	
	echo 3; exit; // invalid width
	
	}
	
	
	
	
	
	elseif($CurHeight < $requiredH){
		
	echo 4; exit;  // invalid Height
	
	}
	


	//Get file extension from Image name, this will be re-added after random name
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
  	$ImageExt = str_replace('.','',$ImageExt);
	
	//remove extension from filename
	$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
	
	//Construct a new image name (with random number added) for our new image.
	$NewImageName =$RandomNumber.'.'.$ImageExt;
	//set the Destination Image
	$DestRandImageName 			= $article_pix_loc.$NewImageName; //Name for Big Image
	
	
	
	
	//Resize image to our Specified Size by calling resizeImage function.
		if(resizeImage($CurWidth,$CurHeight,$requiredW,$requiredH,$DestRandImageName,$CreatedImage,$Quality,$ImageType)){
		}

	else{
	$NewImageName=''; // unable to upload image
	}

} // end of if file is uploaded

else{ $NewImageName='';} // image file not provided






mysqli_query($db,"INSERT INTO tbl_shipper SET

shipper_refno = '$shipper_refno',
shipper_photo='$NewImageName', 
shipper_full_name='$shipper_full_name', 
shipper_gender='$shipper_gender',
shipper_phone='$shipper_phone',
shipper_address='$shipper_address',
shipper_email='$shipper_email',
shipper_city='$shipper_city',
shipper_state='$shipper_state',
shipper_zip_code='$shipper_zip_code',
shipper_country_name='$shipper_country_name'") or die(mysqli_error($db));




mysqli_query($db,"INSERT INTO tbl_recipient SET

recipient_shipment_tracking_no = '$shipment_tracking_no',
recipient_shipper_refno = '$shipper_refno',
recipient_full_name='$recipient_full_name', 
recipient_gender='$recipient_gender',
recipient_phone='$recipient_phone',
recipient_address='$recipient_address',
recipient_email='$recipient_email',
recipient_city='$recipient_city',
recipient_state='$recipient_state',
recipient_zip_code='$recipient_zip_code',
recipient_country_name='$recipient_country_name'") or die(mysqli_error($db));



mysqli_query($db,"INSERT INTO tbl_shipment SET
shipment_current_location='$shipment_travel_history_location',
shipment_tracking_no = '$shipment_tracking_no',
shipment_shipper_refno = '$shipper_refno',
shipment_date_created = '$shipment_date_created',
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
shipment_actual_delivery_time = '$shipment_actual_delivery_time'") or die(mysqli_error($db));


mysqli_query($db,"INSERT INTO tbl_shipment_travel_history SET 

shipment_travel_shipment_tracking_no = '$shipment_tracking_no',
shipment_travel_date = '$shipment_travel_date',
shipment_travel_time = '$shipment_travel_time',
shipment_travel_history_location='$shipment_travel_history_location',
shipment_travel_description = '$shipment_travel_description'
") or die(mysqli_error($db));






if($send_shipper_a_mail=='YES'){ // sending message to shipper


$subjects='Your Shipment';

$msgBody.= "<p>Tracking ID: $shipment_tracking_no</p>
   <p>&nbsp; &nbsp;</p>
   

 <p> 
Activity Date: $shipment_travel_date
</p>
<p>&nbsp; &nbsp;</p>



 <p> 
Time: $shipment_travel_time
</p>
<p>&nbsp; &nbsp;</p>

 <p> 
Status: $shipment_status
</p>
<p>&nbsp; &nbsp;</p>



 <p> 
Description : $shipment_travel_description
</p>
<p>&nbsp; &nbsp;</p>



<p>
Regars, <br></br>
Multitrack Cargo Express<br></br>
</p>
<p> &nbsp; &nbsp; </p>";







$headers = array();
	$headers[]= 'MIME-Version: 1.0';
	$headers[]= 'Content-type: text/html; charset=iso-8859-1';
	$headers[]= 'Content-Transfer-Encoding: 7bit';
	$headers[]='From: Multitrack Cargo Express <info@mkcargo.net>';
$mesg ="$msgBody"."\n";
$mesg = wordwrap($mesg, 70);






$pageDate = <<<HEREDOC_NAME
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>

					
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><style>
.ReadMsgBody { width: 100%; background-color: #ffffff; }
.ExternalClass { width: 100%; background-color: #ffffff; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
html { width: 100%; }
body, p{ -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; font-family:Verdana, Geneva, sans-serif !important; font-size:12px; line-height:18px; }
table { border-spacing: 0; table-layout: fixed; margin: 0 auto; }
table table table { table-layout: auto; }
img { display: block !important; overflow: hidden !important; }
.yshortcuts a { border-bottom: none !important; }
a { color: #e4e401; text-decoration: none; }
img:hover { opacity:0.9 !important;}
.textbutton a { font-family: Verdana, Geneva, sans-serif !important;}
.btn-link-1 a { color: #FFFFFF !important; }
.btn-link-2 a { color: #4a4a4a !important; }
td[class="hide"] { height: 5px !important; max-height: 5px !important; }

/*Responsive*/
@media only screen and (max-width: 640px) {
body { width: auto !important; font-family:Verdana, Geneva, sans-serif !important; }
table[class="table-inner"] { width: 90% !important; }
*.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important; } 
/* image */
img[class="img1"] { width: 100% !important; height: auto !important; }
}

@media only screen and (max-width: 479px) {
body { width: auto !important; font-family:Verdana, Geneva, sans-serif !important; }
table[class="table-inner"] { width: 90% !important; text-align: center !important;}
*.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important; } 
/* image */
img[class="img1"] { width: 100% !important; height: auto !important; }
}
</style>

					
				</head><body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" offset="0" topmargin="0" leftmargin="0"><table data-thumb="header.png" data-module="header" data-bgcolor="Main BG" class="" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#000000" align="center">
    <tr>
      <td data-bgcolor="Header" data-bg="Header" style="background-size: cover; background-position: center center; background-image:url(https://mkcargo.net/images/header-bg.png)" bgcolor="#514F4F" background="header-bg.png" align="center">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
          <tr>
            <td style="background-color:#000000;" align="center">
              <table class="table-full" style="max-width:600px;" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
                <tr>
                  <td height="15"></td>
                </tr>
                <tr>
                  <td>
                    <!--logo-->
                    <table class="table-full" cellspacing="0" cellpadding="0" border="0" align="left">
                      <tr>
                        <td style="line-height: 0px;" align="center"><img src="https://mkcargo.net/images/logo.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="image" data-crop="false" edit="correo-1-1" width="131"></td>
                      </tr>
                    </table>
                    <!--end logo-->
                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                    <!--Space-->
                    <table width="25" cellspacing="0" cellpadding="0" border="0" align="left">
                      <tr>
                        <td height="10"></td>
                      </tr>
                    </table>
                    <!--End Space-->
                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                    <!--social-->
                    <table class="table-full" cellspacing="0" cellpadding="0" border="0" align="right">
                      <tr>
                        <td height="10"></td>
                      </tr>
                      
                    </table>
                    <!--end social-->
                  </td>
                </tr>
                <tr>
                  <td height="15"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr>
      <td height="20"></td>
    </tr>
  </table>
 
  
  
  
  
  
  
  
  <table data-thumb="" data-module="1-2-left" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="1/2 left" class="" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F8F8F8" align="center">
    <tr>
      <td align="center">
        <table class="table-full" style="max-width: 600" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
          <tr>
            <td height="20"></td>
          </tr>
          <tr>
            <td align="center">
              <table data-bgcolor="Panel" data-border-color="Panel Border" class="table-inner" style="border:1px solid #E4E4E4;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tr>
                  <td height="15"></td>
                </tr>
                <tr>
                
                  <td align="left" style="padding:10px 20px;">
                  $mesg
                  </td>
                  
                  
                  
                  
                </tr>
                <tr>
                  <td height="31"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td height="20"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  
  
  
  
  
  
  
  
  
  
  
  
  <table data-module="footer" data-bgcolor="Main BG" class="" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f9f9f9" align="center">
    <tr>
      <td data-bgcolor="Footer" bgcolor="#4a4a4a" align="center">
        <table cellspacing="0" cellpadding="0" border="0" align="center">
          <tr>
            <td width="600" align="center">
              <table class="table-inner" width="90%" cellspacing="0" cellpadding="0" border="0" align="center">
                <tr>
                  <td height="35"></td>
                </tr>
                <!--title-->
                <tr align="center">
                  <td data-color="Footer Text" data-size="Title" mc:edit="correo-1-64" style="font-family: 'Century gothic', Arial, sans-serif; color:#ffffff; font-size:22px;font-weight:bold;">
                    <singleline label="title">Multitrack Cargo Express</singleline>
                  </td>
                </tr>
                <!--end title-->
                <tr>
                  <td height="15"></td>
                </tr>
                <!--content-->
                <tr align="center">
                  <td data-color="Footer Text" data-size="Content" mc:edit="correo-1-65" style="font-family: 'Open sans', Arial, sans-serif; color:#999999; font-size:12px; line-height: 18px;">
                    <multiline label="content"> 
Multitrack Cargo Express is a leading logistics and distribution services, offering a wide array of express courier and logistic support solutions to our various customers worldwide.
 </multiline>
                  </td>
                </tr>
                <!--end content-->
                <tr>
                  <td height="15"></td>
                </tr>
                <!--social-->
                <tr>
                  <td align="center">
                    <table cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/fb-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-1" data-crop="false" edit="correo-1-66" width="32"></a>
                        </td>
                        <td width="15"></td>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/tw-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-2" data-crop="false" edit="correo-1-67" width="33"></a>
                        </td>
                        <td width="15"></td>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/gg-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-3" data-crop="false" edit="correo-1-68" width="32"></a>
                        </td>
                        <td width="15"></td>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/in-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-4" data-crop="false" edit="correo-1-69" width="33"></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <!--end social-->
                <tr>
                  <td height="15"></td>
                </tr>
                <!--preference-->
                <!--end preference-->
                <tr>
                  <td height="25"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table><div id="edit_link" class="hidden" style="display: none;">

						<!-- Close Link -->
						<div class="close_link"></div>

						<!-- Edit Link Value -->
						<input id="edit_link_value" class="createlink" placeholder="Your URL" type="text">

						<!-- Change Image Wrapper-->
						<div id="change_image_wrapper">

							<!-- Change Image Tooltip -->
							<div id="change_image">

								<!-- Change Image Button -->
								<p id="change_image_button">Change &nbsp; <span class="pixel_result"></span></p>

							</div>

							<!-- Change Image Link Button -->
							<input value="" id="change_image_link" type="button">

							<!-- Remove Image -->
							<input value="" id="remove_image" type="button">

						</div>

						<!-- Tooltip Bottom Arrow-->
						<div id="tip"></div>

					</div></body></html>
	
HEREDOC_NAME;






//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.mkcargo.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@mkcargo.net';                     //SMTP username
    $mail->Password   = 'siteAdmin@!321';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@mkcargo.net', 'Multitrack Cargo Express');
    $mail->addAddress($shipper_email, $shipper_full_name);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@mkcargo.net', 'Multitrack Cargo Express');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com'); 

    //Attachments
	
	
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('clientarea/resume/id/'.$id_front, 'ID Front');    //Optional name
	

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subjects;
    $mail->Body    = $mesg; // $pageDate html body
    $mail->AltBody = strip_tags($mesg); // $pageDate Plain Body

    $mail->send();
	
	$_SESSION = array();
    session_destroy();


    //echo 1; exit; //'Message has been sent';
} catch (Exception $e) {
	
	//echo 1; exit; 
	
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; exit;
	
	
	//echo 3; exit;



} // php mailer stops here


//mail($receiver_email,$subjects,$mesg,join("\r\n", $headers));


} // end of sending message to shipper













if($send_recipient_a_mail=='YES'){ // sending message to recipient


$subjects_rec='Your Shipment';

$msgBody_rec.= "<p>Tracking ID: $shipment_tracking_no</p>
   <p>&nbsp; &nbsp;</p>
   

 <p> 
Activity Date: $shipment_travel_date
</p>
<p>&nbsp; &nbsp;</p>



 <p> 
Time: $shipment_travel_time
</p>
<p>&nbsp; &nbsp;</p>

 <p> 
Status: $shipment_status
</p>
<p>&nbsp; &nbsp;</p>



 <p> 
Description : $shipment_travel_description
</p>
<p>&nbsp; &nbsp;</p>



<p>
Regars, <br></br>
Multitrack Cargo Express<br></br>
</p>
<p> &nbsp; &nbsp; </p>";





$headers_rec = array();
	$headers_rec[]= 'MIME-Version: 1.0';
	$headers_rec[]= 'Content-type: text/html; charset=iso-8859-1';
	$headers_rec[]= 'Content-Transfer-Encoding: 7bit';
	$headers_rec[]='From: Multitrack Cargo Express <info@mkcargo.net>';
$mesg_rec ="$msgBody_rec"."\n";
$mesg_rec = wordwrap($mesg_rec, 70);






$pageDate_rec = <<<HEREDOC_NAME
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>

					
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><style>
.ReadMsgBody { width: 100%; background-color: #ffffff; }
.ExternalClass { width: 100%; background-color: #ffffff; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
html { width: 100%; }
body, p{ -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; font-family:Verdana, Geneva, sans-serif !important; font-size:12px; line-height:18px; }
table { border-spacing: 0; table-layout: fixed; margin: 0 auto; }
table table table { table-layout: auto; }
img { display: block !important; overflow: hidden !important; }
.yshortcuts a { border-bottom: none !important; }
a { color: #e4e401; text-decoration: none; }
img:hover { opacity:0.9 !important;}
.textbutton a { font-family: Verdana, Geneva, sans-serif !important;}
.btn-link-1 a { color: #FFFFFF !important; }
.btn-link-2 a { color: #4a4a4a !important; }
td[class="hide"] { height: 5px !important; max-height: 5px !important; }

/*Responsive*/
@media only screen and (max-width: 640px) {
body { width: auto !important; font-family:Verdana, Geneva, sans-serif !important; }
table[class="table-inner"] { width: 90% !important; }
*.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important; } 
/* image */
img[class="img1"] { width: 100% !important; height: auto !important; }
}

@media only screen and (max-width: 479px) {
body { width: auto !important; font-family:Verdana, Geneva, sans-serif !important; }
table[class="table-inner"] { width: 90% !important; text-align: center !important;}
*.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important; } 
/* image */
img[class="img1"] { width: 100% !important; height: auto !important; }
}
</style>

					
				</head><body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" offset="0" topmargin="0" leftmargin="0"><table data-thumb="header.png" data-module="header" data-bgcolor="Main BG" class="" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#000000" align="center">
    <tr>
      <td data-bgcolor="Header" data-bg="Header" style="background-size: cover; background-position: center center; background-image:url(https://mkcargo.net/images/header-bg.png)" bgcolor="#514F4F" background="header-bg.png" align="center">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
          <tr>
            <td style="background-color:#000000;" align="center">
              <table class="table-full" style="max-width:600px;" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
                <tr>
                  <td height="15"></td>
                </tr>
                <tr>
                  <td>
                    <!--logo-->
                    <table class="table-full" cellspacing="0" cellpadding="0" border="0" align="left">
                      <tr>
                        <td style="line-height: 0px;" align="center"><img src="https://mkcargo.net/images/logo.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="image" data-crop="false" edit="correo-1-1" width="131"></td>
                      </tr>
                    </table>
                    <!--end logo-->
                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                    <!--Space-->
                    <table width="25" cellspacing="0" cellpadding="0" border="0" align="left">
                      <tr>
                        <td height="10"></td>
                      </tr>
                    </table>
                    <!--End Space-->
                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                    <!--social-->
                    <table class="table-full" cellspacing="0" cellpadding="0" border="0" align="right">
                      <tr>
                        <td height="10"></td>
                      </tr>
                      
                    </table>
                    <!--end social-->
                  </td>
                </tr>
                <tr>
                  <td height="15"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr>
      <td height="20"></td>
    </tr>
  </table>
 
  
  
  
  
  
  
  
  <table data-thumb="" data-module="1-2-left" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="1/2 left" class="" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F8F8F8" align="center">
    <tr>
      <td align="center">
        <table class="table-full" style="max-width: 600" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
          <tr>
            <td height="20"></td>
          </tr>
          <tr>
            <td align="center">
              <table data-bgcolor="Panel" data-border-color="Panel Border" class="table-inner" style="border:1px solid #E4E4E4;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tr>
                  <td height="15"></td>
                </tr>
                <tr>
                
                  <td align="left" style="padding:10px 20px;">
                  $mesg_rec
                  </td>
                  
                  
                  
                  
                </tr>
                <tr>
                  <td height="31"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td height="20"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  
  
  
  
  
  
  
  
  
  
  
  
  <table data-module="footer" data-bgcolor="Main BG" class="" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f9f9f9" align="center">
    <tr>
      <td data-bgcolor="Footer" bgcolor="#4a4a4a" align="center">
        <table cellspacing="0" cellpadding="0" border="0" align="center">
          <tr>
            <td width="600" align="center">
              <table class="table-inner" width="90%" cellspacing="0" cellpadding="0" border="0" align="center">
                <tr>
                  <td height="35"></td>
                </tr>
                <!--title-->
                <tr align="center">
                  <td data-color="Footer Text" data-size="Title" mc:edit="correo-1-64" style="font-family: 'Century gothic', Arial, sans-serif; color:#ffffff; font-size:22px;font-weight:bold;">
                    <singleline label="title">Multitrack Cargo Express</singleline>
                  </td>
                </tr>
                <!--end title-->
                <tr>
                  <td height="15"></td>
                </tr>
                <!--content-->
                <tr align="center">
                  <td data-color="Footer Text" data-size="Content" mc:edit="correo-1-65" style="font-family: 'Open sans', Arial, sans-serif; color:#999999; font-size:12px; line-height: 18px;">
                    <multiline label="content"> 
Multitrack Cargo Express is a leading logistics and distribution services, offering a wide array of express courier and logistic support solutions to our various customers worldwide.
 </multiline>
                  </td>
                </tr>
                <!--end content-->
                <tr>
                  <td height="15"></td>
                </tr>
                <!--social-->
                <tr>
                  <td align="center">
                    <table cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/fb-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-1" data-crop="false" edit="correo-1-66" width="32"></a>
                        </td>
                        <td width="15"></td>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/tw-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-2" data-crop="false" edit="correo-1-67" width="33"></a>
                        </td>
                        <td width="15"></td>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/gg-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-3" data-crop="false" edit="correo-1-68" width="32"></a>
                        </td>
                        <td width="15"></td>
                        <td style="line-height:0px;" align="center">
                          <a href="javascript:void(0)"><img src="https://mkcargo.net/in-2.png" alt="img" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="social-4" data-crop="false" edit="correo-1-69" width="33"></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <!--end social-->
                <tr>
                  <td height="15"></td>
                </tr>
                <!--preference-->
                <!--end preference-->
                <tr>
                  <td height="25"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table><div id="edit_link" class="hidden" style="display: none;">

						<!-- Close Link -->
						<div class="close_link"></div>

						<!-- Edit Link Value -->
						<input id="edit_link_value" class="createlink" placeholder="Your URL" type="text">

						<!-- Change Image Wrapper-->
						<div id="change_image_wrapper">

							<!-- Change Image Tooltip -->
							<div id="change_image">

								<!-- Change Image Button -->
								<p id="change_image_button">Change &nbsp; <span class="pixel_result"></span></p>

							</div>

							<!-- Change Image Link Button -->
							<input value="" id="change_image_link" type="button">

							<!-- Remove Image -->
							<input value="" id="remove_image" type="button">

						</div>

						<!-- Tooltip Bottom Arrow-->
						<div id="tip"></div>

					</div></body></html>
	
HEREDOC_NAME;







//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.mkcargo.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@mkcargo.net';                     //SMTP username
    $mail->Password   = 'siteAdmin@!321';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@mkcargo.net', 'Multitrack Cargo Express');
    $mail->addAddress($recipient_email, $recipient_full_name);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@mkcargo.net', 'Multitrack Cargo Express');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com'); 

    //Attachments
	
	
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('clientarea/resume/id/'.$id_front, 'ID Front');    //Optional name
	

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subjects_rec;
    $mail->Body    = $mesg_rec; // $pageDate html body
    $mail->AltBody = strip_tags($mesg_rec); // $pageDate Plain Body

    $mail->send();
	
	$_SESSION = array();
    session_destroy();


    //echo 1; exit; //'Message has been sent';
} catch (Exception $e) {
	
	//echo 1; exit; 
	
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; exit;
	
	
	//echo 3; exit;



} // php mailer stops here


//mail($receiver_email,$subjects_rec,$mesg_rec,join("\r\n", $headers_rec));


} // end of sending message to recipient









echo 5; exit; // shipment successfully posted	


	} // end of if form is posted

else{
		echo 6; exit; // form not posted
	}






// This function will proportionally resize image 


function resizeImage($CurWidth,$CurHeight,$MaxSize,$MaxHite,$DestFolder,$SrcImage,$Quality,$ImageType)
{
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//Construct a proportional size of new image
	$ImageScale      	= min($MaxSize/$CurWidth, $MaxHite/$CurHeight); 
	$NewWidth  			= ceil($ImageScale*$CurWidth);
	$NewHeight 			= ceil($ImageScale*$CurHeight);
	$NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
	
	// Resize Image
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;
	}

}

//This function corps image to create exact square images, no matter what its original size!
function cropImage($CurWidth,$CurHeight,$iSize,$iSizeH,$DestFolder,$SrcImage,$Quality,$ImageType)
{	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
	//http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
	if($CurWidth>$CurHeight)
	{
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	
	$NewCanves 	= imagecreatetruecolor($iSize, $iSizeH);	
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSizeH, $square_size, $square_size))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;

	}
	  
}