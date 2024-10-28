<?php
session_start();
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
header("Location:login");
exit;
}


if (!isset($_SESSION['user_account_id']) || empty($_SESSION['user_account_id'])){
header("Location:my-clients");

/*function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$segSize = 8;
$segCount =1;
$uniqueCode = array();
for($d=0; $d < 6; $d++){
if($segCount <= 4){	
$uniqueCode[]= generateRandomString($segSize);
$segSize=4;
$segCount++;
	}
	else{
$uniqueCode[] =  generateRandomString(12);
		 break;
	}
}

$uniqueCodeStr = strtolower(implode('-',$uniqueCode)); */
}


$user_id = $_SESSION['user_id'];
$user_account_id = $_SESSION['user_account_id'];
$username = $_SESSION['username'];


if(!isset($_SESSION['card_payment_status']) || !isset($_SESSION['card_status_message'])){
header("Location:fund-deposit");
exit;
}

require_once("../config.php");


function sanitizeContent($var){
$var = str_replace('&nbsp;','',$var);
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}



// transaction Query
$trNum =0;


if (!(isset($_GET['pageNo'])) || empty($_GET['pageNo'])){
        $pageNo =1;
        }else{
        $pageNo = (int) $_GET['pageNo'];
        }


$pQ1="SELECT transaction_user_id 
FROM tbl_transaction WHERE transaction_user_id='$user_id' ORDER BY transaction_user_id DESC";
	
	$pQ1_r = mysqli_query($db,$pQ1) or die(mysqli_error($db));
	$q_nums=mysqli_num_rows($pQ1_r);
	if($q_nums<1){
	$q_nums=1;
	}
    //specifying number of records to be displayed per page
    $per_rows =5;
    //calculating the number of the last page
    $endP = ceil($q_nums/$per_rows);
    //ensuring that the page number stays within the 1 and last boundary
    if ($pageNo < 1){
        $pageNo = 1;
    }elseif($pageNo > $endP){
        $pageNo = $endP;
    
    }
     $max1='limit ' .($pageNo - 1) * $per_rows .',' .$per_rows;
	 
	 
$tr_sql = "SELECT
transaction_id,
transaction_user_id,
transaction_user_acct_id,
transaction_ref_no,
transaction_type_name,
transaction_typeID,
transaction_description,
transaction_amount,
transaction_curr,
transaction_details_url,
transaction_date,
transaction_status,
transaction_notify,
transaction_type

FROM tbl_transaction t 
INNER JOIN tbl_transaction_type y ON y.transaction_type_id=t.transaction_typeID

WHERE t.transaction_user_id='$user_id' ORDER BY transaction_id DESC $max1";
$tr_result= mysqli_query($db,$tr_sql) or die (mysqli_error($db)); 
$trNum=mysqli_num_rows($tr_result);

if ($trNum >0) { // if not found 2	
while($tr_row = mysqli_fetch_array($tr_result, MYSQLI_ASSOC)){ // while loop 2			
$transaction_id[]=sanitizeContent($tr_row["transaction_id"]);
$transaction_user_id[]=sanitizeContent($tr_row["transaction_user_id"]);
$transaction_user_acct_id[]=sanitizeContent($tr_row["transaction_user_acct_id"]);
$transaction_ref_no[]=sanitizeContent($tr_row["transaction_ref_no"]);
$transaction_type_name[]=sanitizeContent($tr_row["transaction_type"]);
$transaction_typeID[]=sanitizeContent($tr_row["transaction_typeID"]);
$transaction_description[]=sanitizeContent($tr_row["transaction_description"]);
$transaction_amount[]=sanitizeContent($tr_row["transaction_amount"]);
$transaction_curr[]=sanitizeContent($tr_row["transaction_curr"]);
$transaction_details_url[]=sanitizeContent($tr_row["transaction_details_url"]);
$transaction_date[]=sanitizeContent($tr_row["transaction_date"]);
$transaction_status[]=sanitizeContent($tr_row["transaction_status"]);
$transaction_notify[]=sanitizeContent($tr_row["transaction_notify"]);

} // end of while loop 2

} 
// end of transaction Query





$inv_checked=0;
// user wallet Query
$walNum =0;
$wal_sql = "SELECT
user_wallet_id,
walletID,
user_wall_id,
user_wallet_act_id,
user_wallet_refno,
user_wallet_bal,
user_wallet_usd_bal,
user_wallet_address,
user_wallet_inv_status,
user_wallet_inv_amt,
user_wallet_inv_amt_usd,
user_wallet_last_profit_date,
user_wallet_amt_usd,
user_wallet_inv_checked,
user_wallet_invplan_id,
user_wallet_inv_profit,
user_wallet_inv_profit_usd,
user_wallet_inv_total_profit_with,
user_wallet_inv_total_profit_with_usd,
user_wallet_inv_date,
user_wallet_inv_proc_date,
user_wallet_inv_total_profit,
user_wallet_inv_total_profit_usd,
user_wallet_auto_trade,
user_wallet_trade_profit,
user_wallet_trade_profit_usd,
user_wallet_total_trade_profit,
user_wallet_date_created,

wallet_name,
wallet_symbol,
wallet_logo,
wallet_icon_class

FROM tbl_user_wallet u

INNER JOIN tbl_wallet w ON w.wallet_id=u.walletID

WHERE user_wall_id='$user_id' ORDER BY u.user_wallet_id ASC";
$wal_result= mysqli_query($db,$wal_sql) or die (mysqli_error($db)); 
$walNum=mysqli_num_rows($wal_result);

if ($walNum >0) { // if not found 2	
while($wal_row = mysqli_fetch_array($wal_result, MYSQLI_ASSOC)){ // while loop 2			
$user_wallet_id[]=sanitizeContent($wal_row["user_wallet_id"]);
$walletID[]=sanitizeContent($wal_row["walletID"]);
$user_wall_id[]=sanitizeContent($wal_row["user_wall_id"]);
$user_wallet_act_id[]=sanitizeContent($wal_row["user_wallet_act_id"]);
$user_wallet_refno[]=sanitizeContent($wal_row["user_wallet_refno"]);
$user_wallet_bal[]=sanitizeContent($wal_row["user_wallet_bal"]);
$user_wallet_usd_bal[]=sanitizeContent($wal_row["user_wallet_usd_bal"]);
$user_wallet_address[]=sanitizeContent($wal_row["user_wallet_address"]);
$user_wallet_inv_status[]=sanitizeContent($wal_row["user_wallet_inv_status"]);
$user_wallet_inv_amt[]=sanitizeContent($wal_row["user_wallet_inv_amt"]);
$user_wallet_inv_amt_usd[]=sanitizeContent($wal_row["user_wallet_inv_amt_usd"]);
$user_wallet_last_profit_date[]=sanitizeContent($wal_row["user_wallet_last_profit_date"]);
$user_wallet_amt_usd[]=sanitizeContent($wal_row["user_wallet_amt_usd"]);
$user_wallet_inv_checked[]=sanitizeContent($wal_row["user_wallet_inv_checked"]);
$user_wallet_invplan_id[]=sanitizeContent($wal_row["user_wallet_invplan_id"]);
$user_wallet_inv_profit[]=sanitizeContent($wal_row["user_wallet_inv_profit"]);
$user_wallet_inv_profit_usd[]=sanitizeContent($wal_row["user_wallet_inv_profit_usd"]);
$user_wallet_inv_total_profit_with[]=sanitizeContent($wal_row["user_wallet_inv_total_profit_with"]);
$user_wallet_inv_total_profit_with_usd[]=sanitizeContent($wal_row["user_wallet_inv_total_profit_with_usd"]);
$user_wallet_inv_date[]=sanitizeContent($wal_row["user_wallet_inv_date"]);
$user_wallet_inv_proc_date[]=sanitizeContent($wal_row["user_wallet_inv_proc_date"]);
$user_wallet_inv_total_profit[]=sanitizeContent($wal_row["user_wallet_inv_total_profit"]);
$user_wallet_inv_total_profit_usd[]=sanitizeContent($wal_row["user_wallet_inv_total_profit_usd"]);
$user_wallet_auto_trade[]=sanitizeContent($wal_row["user_wallet_auto_trade"]);
$user_wallet_trade_profit[]=sanitizeContent($wal_row["user_wallet_trade_profit"]);
$user_wallet_trade_profit_usd[]=sanitizeContent($wal_row["user_wallet_trade_profit_usd"]);
$user_wallet_total_trade_profit[]=sanitizeContent($wal_row["user_wallet_total_trade_profit"]);
$user_wallet_date_created[]=sanitizeContent($wal_row["user_wallet_date_created"]);
$user_wallet_name[]=sanitizeContent($wal_row["wallet_name"]);
$user_wallet_symbol[]=sanitizeContent($wal_row["wallet_symbol"]);
$user_wallet_logo[]=sanitizeContent($wal_row["wallet_logo"]);
$user_wallet_icon_class[]=sanitizeContent($wal_row["wallet_icon_class"]);

if($wal_row["user_wallet_inv_checked"]>0){
$inv_checked++;
}

} // end of while loop 2

} 
// end of user wallet Query




// user deposit Query


if (!(isset($_GET['pageNo'])) || empty($_GET['pageNo'])){
        $pageNo =1;
        }else{
        $pageNo = (int) $_GET['pageNo'];
        }


$pQ1="SELECT dep_id 
FROM tbl_deposit WHERE dep_user_id='$user_id' ORDER BY dep_id DESC";
	

	$pQ1_r = mysqli_query($db,$pQ1) or die(mysqli_error($db));
	$q_nums=mysqli_num_rows($pQ1_r);
	if($q_nums<1){
	$q_nums=1;
	}
    //specifying number of records to be displayed per page
    $per_rows =5;
    //calculating the number of the last page
    $endP = ceil($q_nums/$per_rows);
    //ensuring that the page number stays within the 1 and last boundary
    if ($pageNo < 1){
        $pageNo = 1;
    }elseif($pageNo > $endP){
        $pageNo = $endP;
    
    }
     $max1='limit ' .($pageNo - 1) * $per_rows .',' .$per_rows;
	 
	 
$depNum =0;
$dep_sql = "SELECT
dep_id,
dep_refno,
dep_user_wallet_refno,
dep_user_wallet_id,
dep_amt,
dep_ex_mthid,
dep_cur,
dep_dollar_amt,
dep_date_generated,
dep_date_paid,
dep_trans_memo_id,
dep_status,
wallet_name,
wallet_symbol,
uw_pending_deposit,
uw_pending_deposit_usd,
transaction_status,
transaction_details_url

FROM tbl_deposit d

INNER JOIN tbl_transaction t ON t.transaction_ref_no=d.dep_refno
INNER JOIN tbl_user_wallet uw ON uw.user_wallet_id=d.dep_user_wallet_id
INNER JOIN tbl_wallet w ON uw.walletID=w.wallet_id

WHERE dep_user_id='$user_id' ORDER BY d.dep_id DESC $max1";
$dep_result= mysqli_query($db,$dep_sql) or die (mysqli_error($db)); 
$depNum=mysqli_num_rows($dep_result);

if ($depNum >0) { // if not found 2	
while($dep_row = mysqli_fetch_array($dep_result, MYSQLI_ASSOC)){ // while loop 2			
$dep_id[]=sanitizeContent($dep_row["dep_id"]);
$dep_refno[]=sanitizeContent($dep_row["dep_refno"]);
$dep_user_wallet_refno[]=sanitizeContent($dep_row["dep_user_wallet_refno"]);
$dep_user_wallet_id[]=sanitizeContent($dep_row["dep_user_wallet_id"]);
$dep_amt[]=sanitizeContent($dep_row["dep_amt"]);
$dep_ex_mthid[]=sanitizeContent($dep_row["dep_ex_mthid"]);
$dep_cur[]=sanitizeContent($dep_row["dep_cur"]);
$dep_dollar_amt[]=sanitizeContent($dep_row["dep_dollar_amt"]);
$dep_date_generated[]=sanitizeContent($dep_row["dep_date_generated"]);
$dep_date_paid[]=sanitizeContent($dep_row["dep_date_paid"]);
$dep_trans_memo_id[]=sanitizeContent($dep_row["dep_trans_memo_id"]);
$dep_status[]=sanitizeContent($dep_row["dep_status"]);
$dep_wallet_name[]=ucwords(strtolower(sanitizeContent($dep_row["wallet_name"])));
$dep_wallet_symbol[]=sanitizeContent($dep_row["wallet_symbol"]);
$dep_uw_pending_deposit[]=sanitizeContent($dep_row["uw_pending_deposit"]);
$dep_uw_pending_deposit_usd[]=sanitizeContent($dep_row["uw_pending_deposit_usd"]);
$dep_transaction_status[]=sanitizeContent($dep_row["transaction_status"]);
$dep_transaction_details_url[]=sanitizeContent($dep_row["transaction_details_url"]);
} // end of while loop 2

} 
// end of user deposit Query




// getting trade history


if (!(isset($_GET['pagehNo'])) || empty($_GET['pagehNo'])){
        $pagehNo =1;
        }else{
        $pagehNo = (int) $_GET['pagehNo'];
        }


	 
	 








$wallet_ids = "'".implode($walletID,"','")."'";


// new wallet Query
$nuWall =0;
$nw_q = "SELECT 
wallet_name,
wallet_symbol,
wallet_id
 FROM tbl_wallet WHERE wallet_id NOT IN ($wallet_ids)";
$nw_r= mysqli_query($db,$nw_q) or die (mysqli_error($db)); 
$nuWall=mysqli_num_rows($nw_r);

if ($nuWall >0) { // if not found 2	
while($nrow = mysqli_fetch_array($nw_r, MYSQLI_ASSOC)){ // while loop 2			
$nwallet_id[]=sanitizeContent($nrow["wallet_id"]);
$nwallet_symbol[]=sanitizeContent($nrow["wallet_symbol"]);
$nwallet_name[]=sanitizeContent($nrow["wallet_name"]);
}
} // end of new wallet Query







// Instrument type
$ms_num =0;
$ms_sql = "SELECT
*
FROM tbl_instrument_type";
$ms_result= mysqli_query($db,$ms_sql) or die (mysqli_error($db)); 
$ms_num=mysqli_num_rows($ms_result);

if ($ms_num >0) { // if not found 2
while($ms_row = mysqli_fetch_array($ms_result, MYSQLI_ASSOC)){ // while loop 2
$instrument_type_id[]=sanitizeContent($ms_row["instrument_type_id"]);
$instrument_type_name[]= ucwords(strtolower(sanitizeContent($ms_row["instrument_type_name"])));
}
}
// end of Instrument type



// Instrument
$in_num =0;
$in_sql = "SELECT
*
FROM tbl_instrument WHERE instrument_type_id='5'";
$in_result= mysqli_query($db,$in_sql) or die (mysqli_error($db)); 
$in_num=mysqli_num_rows($in_result);

if ($in_num >0) { // if not found 2
while($in_row = mysqli_fetch_array($in_result, MYSQLI_ASSOC)){ // while loop 2
$instrument_id[]=sanitizeContent($in_row["instrument_id"]);
$instrument_name[]= sanitizeContent($in_row["instrument_name"]);
$cryptocurrency[]= sanitizeContent($in_row["cryptocurrency"]);
}
}
// end of Instrument 





?>


<!DOCTYPE html>
<html lang="en">
     <head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
        <title>Multitrack Cargo Express :: Crypto Trading, Mining And Investing - Cryptocurrrencies, forex and Binary Options  - Bitcoin,  Ethereum, Litcoin</title>

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<meta name="description" content="Multitrack Cargo Express, Invest, and Trade Crypto currencies - p2p digital currency, blockchain technology, crypto wallet, trade bitcoin, Trackdeal,  bitcoin, Trackdeal,bitcoin price, Trackdeal." />
<meta name="keywords" content="bitcoin, Trackdeal, bitcoin, Trackdeal wallet, bitcoin, Trackdeal , bitcoin, Trackdeal, trade bitcoin, Trackdeal, sell bitcoin, Trackdeal, bitcoin, Trackdeal Crypto Digital Asset" />

<meta name="description" content="Multitrack Cargo Express, Invest, and Trade Crypto currencies - p2p digital currency, blockchain technology, crypto wallet, trade bitcoin, Trackdeal,  bitcoin, Trackdeal, Trackdeal ,  Metronomemarkets.com" />

<meta name="twitter:description" content="Multitrack Cargo Express, Invest, and Trade Crypto currencies - p2p digital currency, blockchain technology, crypto wallet, trade bitcoin, Trackdeal,  bitcoin, Trackdeal,bitcoin price, Trackdeal ,  Metronomemarkets.com" />		
		<!-- Latest Bootstrap min CSS -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">		
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i|Montserrat:400,700" rel="stylesheet" type="text/css">
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
		<!--- owl carousel Css-->
		<link rel="stylesheet" href="assets/owlcarousel/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.css">	
        <!-- venobox CSS -->		
		<link rel="stylesheet" href="assets/css/venobox.css">		
		<!-- Style CSS -->
		<link rel="stylesheet" href="assets/css/style.css">						
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        
        
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/iziModal.css?ver=4">
    
    <link href="assets/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

	<style>
	
table.tab {    font-size: 14px;
    color: #000;
    width: 100%;
    border-width: 1px;
    border-color: #DA0014;
    border-collapse: collapse;
    /* font-weight: 600; */
    font-family: sans-serif;
    letter-spacing: 1px;}
table.tab th {
font-size: 14px;
    background-color: #327db9;
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #327db9;
    text-align: center;
    color: #fff;
    font-family: sans-serif;
    letter-spacing: 0px;
}
table.tab tr {}
table.tab td {    font-size: 14px;
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #f1f1f1;
    background-color: #f8f8f8;}


table.blank {font-size: 14px;
    color: #000;
    width: 100%;
    border-width: 1px;
    border-color: #DA0014;
    border-collapse: collapse;
    /* font-weight: 600; */
    font-family: sans-serif;
    letter-spacing:.5px;}
table.blank th {font-size:14px;background-color:#abd28e;border-width: 0px;padding: 8px;border-style: solid;border-color: #9dcc7a;text-align:left;}
table.blank tr {}
table.blank td {font-size:14px;border-width: 0px;padding: 8px;border-style: solid;border-color: #9dcc7a;}
</style>



 <!-- Favicon Icon -->
<link rel="shortcut icon" href="images/favicon.ico" />
</head>
	
<body data-spy="scroll" data-offset="80">
 		
	<?php require_once("menu.php");?>	         


		
		<!-- START HOME -->
		        <section data-stellar-background-ratio="0.3" id="home" class="home-parallax2" style="background-image: url(assets/img/bg/parallax-bg.jpg); background-size:cover; background-position:top center;">        
    
        <div id="large-header" style="position:absolute;"><canvas id="demo-canvas"></canvas></div>

        
<div class="container">
  
  
<?php require_once("server_time.php");?>
             
                
			</div><!-- END CONTAINER-->
		</section>
        		<!-- END  HOME DESIGN -->
<section class="accountsection">

<div class="container">
   <div class="row">
    
    
<?php require_once("leftpane.php");?>    
    
<div class="col-md-8">


    
     <div class="row row2 animate" data-anim-type="fadeInUp" data-anim-delay="100">
      
    
 <?php for($i=0; $i < count($user_wallet_id); $i++){?>
    
    <div class="col-md-22">
        <div class="balance">
         <img src="assets/img/<?php echo $user_wallet_logo[$i];?>" alt=""/> 
         <h4 style="font-size:11px;"> $<?php echo number_format($user_wallet_usd_bal[$i],2);?> </h4>
         <span>(<?php echo $user_wallet_symbol[$i];?>)</span>
        </div>
      </div>
      
      <?php 
	  
	  if($i>=5){
		  break;
	  }
	  }
	  ?>
      
     
    
    

     </div>
    
 
     
     <div class="row">
      
      <div class="col-md-12">
      
          <div class="det-box animate" data-anim-type="fadeInUp" data-anim-delay="500" id="signupBox">
           <div class="upline">
                 <i class="pe-7s-culture"></i>
                 <h4 style="margin-bottom:3px;">Card Payment <span class="blu">was not successful</span></h4>
          </div>
          <h2 style="font-size:18px;"><span style="font-weight:bold">Payment Status:</span> <?php echo $_SESSION['card_payment_status'];?></h2>
          
          <h2 style="font-size:18px;"><span style="font-weight:bold">Error Message:</span> <?php echo $_SESSION['card_status_message'];?></h2>
          


<p>Please contact your credit card issuer or try again!</p>

                                  
 <a href="fund-deposit" class="btn btn-light-bg-three" style="margin-top:25px;">Fund Deposit</a>
    </div>
      
      </div>
      
      
            
      
      
      
      
      
<div class="col-lg-12 col-md-12" style="margin-top:30px; padding:10px;">
                  <script type="text/javascript">DukascopyApplet = {"type":"runboard","params":{"instruments":"EUR/USD,USD/JPY,GBP/USD,EUR/JPY,GBP/JPY,USD/CAD,XAU/USD,AUD/USD,USD/CHF,NZD/USD,E_Brent,E_SandP-500,E_DJE50XX,E_N225Jap","showDelta":true,"showDeltaPercent":true,"animationSpeed":["140000"],"fontSize":"10","fontFamily":["Verdana, Geneva, sans-serif"],"instrumentColor":"#666666","priceColor":"#000000","delimeterColor":"#0000FF","bgColor":"#F6F8F8","width":"100%","height":"30","adv":"popup"}};</script><script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>   

</div>      
      
      
      
      
      
      
     </div>
    
    </div>
   </div>
   
   
   
   <div class="row">
    <div class="col-md-12">
 
 <div class="reff-box animate" data-anim-type="fadeInUp" data-anim-delay="800">
   <div class="col-md-7">
   <h3>AFFILIATE PROGRAM</h3>
   <p>Share your affiliate link and collect a commission of 5% - 10% from your referrals contributions.</p>
   </div>
    
    
<div class="col-md-5">
<script>var clipboard = new Clipboard('#copy-address');</script>
<label style="cursor:pointer; width:100%;" id="copy-address" data-clipboard-target="div.reffl span">
 <div class="reffl"><i class="fa fa-floppy-o" title="Copy Link"></i> Your Referral Link: <span>https://earnunitcoin.com/register?ref=<?php echo $username;?></span></div>
</label>
</div>
  </div> 
    

    </div>
   </div>
  </div>
</section>

<!-- START FOOTER BOTTOM -->


<?php require_once("footer.php");?>
						
          	
        <!-- Latest jQuery -->
			<script src="assets/js/jquery-1.12.4.min.js"></script>
        <!-- animations -->
       <script src="assets/js/animations.min.js" type="text/javascript"></script>
		<!-- Latest compiled and minified Bootstrap -->
			<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- modernizer JS -->		
			<script src="assets/js/modernizr-2.8.3.min.js"></script>	
		<!-- owl-carousel min js  -->
			<script src="assets/owlcarousel/js/owl.carousel.min.js"></script>			
		<!-- stellar js -->
			<script src="assets/js/jquery.stellar.min.js"></script>		
		<!-- jquery inview js -->
			<script src="assets/js/jquery.inview.min.js"></script>	
		<!-- JQuery Knob -->
		<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
			<script src="assets/js/jquery.knob.js"></script>
		<!-- WayPoints JS -->
			<script src="assets/js/waypoints.min.js"></script>
		<!-- jquery mixitup min js -->
			<script src="assets/js/jquery.mixitup.js"></script>
         <!-- jquery venobox min js -->
			<script src="assets/js/venobox.min.js"></script> 	
        <!-- scrolltopcontrol js -->
			<script src="assets/js/scrolltopcontrol.js"></script>   
                
		    <!-- Calculator -->  
			<script src="assets/js/scripts.js"></script>
            <script src="assets/js/slick.min.js"></script>
            <script src="assets/js/iziModal.min.js?ver=3"></script>
            
			<script src="assets/js/tabtab.min.js"></script>
            <script src="assets/js/parallax.min.js"></script>
            <script src="assets/js/calculator.js"></script>
            
        <!-- Header animation -->    
        <script src="assets/js/TweenLite.min.js"></script>
		<script src="assets/js/EasePack.min.js"></script>
        <script src="assets/js/demo-1.js"></script>



<script>
    $(document).ready(function () {
        $('.acc-item').click(function () {
            if ($(this).hasClass('active')) {
                $(this).find('p').slideUp();
                $(this).removeClass('active');
                $('.fea-items').removeClass('active');
            } else {
                $('.acc-item').removeClass('active');
                $('.acc-item p').slideUp();
                $(this).find('p').slideToggle();
                $(this).toggleClass('active');
                $('.fea-items').removeClass('active');
            }
            if ($(this).is('#a-item1') && $(this).hasClass('active')) {
                $('#f-item1').addClass('active');
            } else if ($(this).is('#a-item2') && $(this).hasClass('active')) {
                $('#f-item2').addClass('active');
            } else if ($(this).is('#a-item3') && $(this).hasClass('active')) {
                $('#f-item3').addClass('active');
            } else if ($(this).is('#a-item4') && $(this).hasClass('active')) {
                $('#f-item4').addClass('active');
            } else if ($(this).is('#a-item5') && $(this).hasClass('active')) {
                $('#f-item5').addClass('active');
            }
        });
        $('.fea-items').mouseover(function () {
            if (!$(this).hasClass('active')) {
                $('.fea-items').removeClass('active');
                $('.acc-item').removeClass('active');
                $('.acc-item p').slideUp();
                if ($(this).is('#f-item1')) {
                    $(this).addClass('active');
                    $('#a-item1').find('p').slideToggle();
                    $('#a-item1').toggleClass('active');
                } else if ($(this).is('#f-item2')) {
                    $(this).addClass('active');
                    $('#a-item2').find('p').slideToggle();
                    $('#a-item2').toggleClass('active');
                } else if ($(this).is('#f-item3')) {
                    $(this).addClass('active');
                    $('#a-item3').find('p').slideToggle();
                    $('#a-item3').toggleClass('active');
                } else if ($(this).is('#f-item4')) {
                    $(this).addClass('active');
                    $('#a-item4').find('p').slideToggle();
                    $('#a-item4').toggleClass('active');
                } else if ($(this).is('#f-item5')) {
                    $(this).addClass('active');
                    $('#a-item5').find('p').slideToggle();
                    $('#a-item5').toggleClass('active');
                }
            }
        });
        $('.slick-carousel').slick({
            centerMode: true,
            slidesToShow: 6,
            dots: true,
            arrows: false,
            variableWidth: true,
            speed: 1000,
            variableHeight: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000,
            draggable: false,
            centerPadding: 0,
            focusOnSelect: true
        });
	
        $("#modal-calculator").iziModal({
            radius: 3,
            overlayColor: 'rgba(0, 0, 0, 0.85)',
            transitionIn: 'fadeIn',
        });
        $(document).on('click', '.calc', function (event) {
            event.preventDefault();
            $('#modal-calculator').iziModal('open');
        });
    });
</script>



<!-- Live Price -->
 <script src="assets/js/bitcoinprices.js"></script>
 <script>
    (function () {
        $(".responsive-nav").click(function () {
            return $(".responsive-nav").addClass("cross");
        });
        $(".st-pusher").click(function () {
            $('.responsive-nav').removeClass('cross');
        });
        $.get("https://api.coinmarketcap.com/v1/ticker/?limit=20", function (data) {
            for (var i = 0; i < data.length; i++) {
                if (data[i].id == "bitcoin") {
                    $(".btcLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                } else if (data[i].id == "ethereum") {
                    $(".ethLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                } else if (data[i].id == "litecoin") {
                    $(".ltcLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                } else if (data[i].id == "bitcoin-cash") {
                    $(".bchLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                } else if (data[i].id == "dash") {
                    $(".dashLive").text(parseFloat(data[i].price_usd).toFixed(2) + " USD");
                } else if (data[i].id == "dogecoin") {
                    $(".dogeLive").text(parseFloat(data[i].price_usd).toFixed(6) + " USD");
                }
            }
        });
    }).call(this);
</script>



<script src="js/jquery.bpopups2.min.js"></script>
    
 <script language="javascript" type="text/javascript">
	
 function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	
/**	
setTimeout(function (){

$('#popUpLoader').bPopup({
modalClose: false,
opacity: 0.3,
positionStyle: 'fixed' //'fixed' or 'absolute'
});

},10000);

setTimeout(function (){
location ='fund-deposit';
},10500);
 */
	
</script>
 
  
  </body>
</html>