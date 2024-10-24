<?php
session_start();

if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
header("Location:login");
exit;
}



require_once("../config.php");



function sanitizeContent($var){
$var = str_replace('&nbsp;','',$var);
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}





// clients Query





if (!(isset($_GET['pageNo'])) || empty($_GET['pageNo'])){
        $pageNo =1;
        }else{
        $pageNo = (int) $_GET['pageNo'];
        }



$pQ1="SELECT shipment_id 
FROM tbl_shipment ORDER BY shipment_id DESC";



	
	$pQ1_r = mysqli_query($db,$pQ1) or die(mysqli_error($db));
	$q_nums=mysqli_num_rows($pQ1_r);
	if($q_nums<1){
	$q_nums=1;
	}
    //specifying number of records to be displayed per page
    $per_rows =50;
    //calculating the number of the last page
    $endP = ceil($q_nums/$per_rows);
    //ensuring that the page number stays within the 1 and last boundary
    if ($pageNo < 1){
        $pageNo = 1;
    }elseif($pageNo > $endP){
        $pageNo = $endP;
    
    }
     $max1='limit ' .($pageNo - 1) * $per_rows .',' .$per_rows;






$usNo =0;

$usQ = "SELECT

shipment_id,
shipment_tracking_no,
shipment_status,
shipment_shipping_date,
shipment_date_created,
shipper_full_name,
shipper_phone,
shipper_refno,
shipper_email,
recipient_full_name,
recipient_phone,
recipient_email


FROM tbl_shipment m

INNER JOIN  tbl_shipper p ON p.shipper_refno=m.shipment_shipper_refno
INNER JOIN  tbl_recipient r ON r.recipient_shipment_tracking_no=m.shipment_tracking_no

ORDER BY shipment_id DESC $max1";

$usQ_r= mysqli_query($db,$usQ) or die (mysqli_error($db)); 
$usNo=mysqli_num_rows($usQ_r);

if ($usNo >0) { // if not found 2	
while($rows = mysqli_fetch_array($usQ_r, MYSQLI_ASSOC)){ // while loop 2

$shipment_id[]=$rows["shipment_id"];
$shipment_tracking_no[]=$rows["shipment_tracking_no"];
$shipment_status[]=$rows["shipment_status"];
$shipment_shipping_date[]=$rows["shipment_shipping_date"];
$shipment_date_created[]=$rows["shipment_date_created"];


$shipper_full_name[]=$rows["shipper_full_name"];
$shipper_phone[]=$rows["shipper_phone"];
$shipper_email[]=$rows["shipper_email"];
$shipper_refno[] = $rows["shipper_refno"];

$recipient_full_name[]=$rows["recipient_full_name"];
$recipient_phone[]=$rows["recipient_phone"];
$recipient_email[]=$rows["recipient_email"];


}
}

// end of clients Query








?>





             

<table class="table table-striped">
                                <thead style="background:#322740; color:#fff;">
                                    <tr role="row">
                                    
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase" colspan="2">Tracking No</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Shipper</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Receiver</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase">Date Created</th>
                                    <th style="font-size:12px; font-weight:bold;text-transform:uppercase; text-align:center" colspan="2"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                     
                                    
                          
<tr style="background:#f5f7fa;">

<td colspan="7" style="padding:0 10px;">

<input type="hidden" id="checkSelected" name="checkSelected" value="0">

<label style="padding:10px 0px;">
<input type="checkbox" name="selectAll" id="selectAll" value="1" onclick="selectAllFunc()"><span style="color:#069; font-size:16px;">
Select All
</span>

</label>


<button style="margin-left:20px;" class="btn btn-danger" type="button" name="deleteSelected" id="deleteSelected" onclick="deleteSelectedFunc()">Delete Selected Shipments</button>
</td>

</tr>



<?php for($x=0; $x < count($shipment_id); $x++){?>

   <tr style="font-size:13px;">
   
   
<td style="border-right:none" colspan="2">
<label>
<input type="checkbox" name="shipment_tracking_nos[]" id="shipment_tracking_no<?php echo $shipment_id[$x];?>" value="<?php echo $shipment_tracking_no[$x];?>">
<?php echo $shipment_tracking_no[$x];?>

  </label>
</td>


<td><?php echo "$shipper_full_name[$x]" ;?></td>

 <td><?php echo "$recipient_full_name[$x]" ;?></td>
 
 
 
  
    <td>
    
     <?php echo $shipment_date_created[$x]?>
    </td>
   
   

<td style="border-left:none">
 <a href="javascript:;" onclick="manageShipmentFunc('<?php echo $shipment_tracking_no[$x];?>')" title="Click to view / manage shipment!">
 <i class="fa fa-edit"></i>
 </a>
 </td>  
                                  
   <td style="border-left:none">
 <a href="javascript:;" onclick="deleteShipmentFunc('<?php echo $shipment_tracking_no[$x];?>')" title="Click to delete this shipment!">
 <i class="fa fa-trash"></i>
 </a>
 </td>                                     
             
   
    
    
    
                                    </tr>
                                    
                   <?php
                   
}?>                 
                                    
                                
                
                
                                                                    
                                                                        
                                    
                                    
                                    </tbody>
                                
                            </table>
                            
                            
                            
                            
                            
                            
                            
       <?php if($q_nums > $per_rows){?>                                            
<div class="modal-footer no-margin-top">
<!--<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
<i class="ace-icon fa fa-times"></i>
Close
</button>-->




<nav>
                                    <ul class="pagination">
                                        <li class="page-item page-indicator">
                                            <a class="page-link" href="javascript:void(0)" onClick="gotoNexpage('<?php echo $pageNo-1;?>')">
                                                <i class="la la-angle-left"></i></a>
                                        </li>
                                        
                                        
                                        
                                        <?php for($p=0; $p < $endP; $p++){?>
<li class="page-item <?php echo $p+1 == $pageNo ? 'active' : ''; ?>"><a class="page-link" href="javascript:void(0)"  onClick="gotoNexpage('<?php echo $p+1;?>')"><?php echo $p+1;?></a>
                                        </li>
                                        <?php }?>
                                        
                                        
                                        
                                        <li class="page-item page-indicator">
                                            <a class="page-link" href="javascript:void(0)" onClick="gotoNexpage('<?php echo $pageNo+1;?>')">
                                                <i class="la la-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>




 </div>                                              
<?php } else{}?>              
                            
                            
                            
                            
                            
                            
                         