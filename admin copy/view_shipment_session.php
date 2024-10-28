<?php
session_start();

if(isset($_GET['shipment_tracking_no'])){

$shipment_tracking_no = $_GET['shipment_tracking_no'];

$_SESSION['shipment_tracking_no']= $shipment_tracking_no;

echo 1;

exit;
}

else{
echo 2; exit;
}





?>



