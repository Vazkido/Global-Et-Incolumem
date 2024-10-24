<?php

session_start();
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
header("Location:login");
exit;
}


require_once("../config.php");



function sanitizeClean($var){
$var = str_replace('&nbsp;','',$var);
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}


function sanitize($var){
$var=str_replace("’","&rsquo;",$var);
$var=str_replace("'","&rsquo;",$var);
$var=htmlentities($var);
$var=trim($var);
return $var;
}


ini_set('upload_max_filesize', '200m');
ini_set('memory_limit', '128M');
ini_set('max_execution_time', '60');
ini_set('max_input_time', '120');






if(isset($_POST['shipper_refno'])){ // if form is posted

$shipper_refno = $_POST['shipper_refno'];
$old_shipper_photo = $_POST['old_shipper_photo'];


if(isset($_FILES['shipper_photo']) && $_FILES['shipper_photo'] !='') { //if file is uploaded

$old_shipper_photo=$_POST['old_shipper_photo'];

$shipper_photo=$_FILES['shipper_photo'];

$client_test_location='../images/uploads/';

$thumbW = 100;
$thumbH = 100;

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
			die(header("Location:profile-settings")); //output error and exit
	}
	

	list($CurWidth,$CurHeight)=getimagesize($TempSrc);
	
	if($CurWidth < $requiredW ){
	
	echo 2; exit; // invalid width
	
	}
	elseif($CurHeight < $requiredH){
		
	echo 3; exit; // invalid Height
	}
	


	//Get file extension from Image name, this will be re-added after random name
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
  	$ImageExt = str_replace('.','',$ImageExt);
	
	//remove extension from filename
	$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
	
	//Construct a new image name (with random number added) for our new image.
	$NewImageName =$RandomNumber.'.'.$ImageExt;
	//set the Destination Image
	$DestRandImageName 			= $client_test_location.$NewImageName; //Name for Big Image
	
	//Resize image to our Specified Size by calling resizeImage function.
	if(resizeImage($CurWidth,$CurHeight,$thumbW,$thumbH,$DestRandImageName,$CreatedImage,$Quality,$ImageType)){
		}
	
	else{
	echo 4; exit;
	}

} // end of if file is uploaded

else{
	echo 6; exit;
	}	


mysqli_query($db,"UPDATE tbl_shipper 
SET shipper_photo='$NewImageName'
WHERE shipper_refno='$shipper_refno'")
or die(mysqli_error($db));



if($old_shipper_photo !='' && file_exists('../images/uploads/'.$old_shipper_photo)){
unlink('../images/uploads/'.$old_shipper_photo);
}

echo 6;	exit;	


	} // end of if form is posted

else{
	echo 7; exit;
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