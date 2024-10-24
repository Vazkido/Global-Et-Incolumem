<?php
date_default_timezone_set("America/Los_Angeles");


function sanitizeHeader($var){
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}

$user_id = $_SESSION['user_id'];
$user_account_id = $_SESSION['user_account_id'];

require_once("../config.php");

// personal Profile Query
$pFound =0;
$pf_sql = "SELECT
user_firstname,
user_lastname,
user_email_address,
user_password,
user_pix,
user_gender,
user_phone,
user_country_id,
country_name,
user_address,
user_city,
user_wallet_auto_trader,
user_state,
user_tfauth,
user_account_status,
user_withdrawal_allowed
FROM tbl_user u
INNER JOIN tbl_country c ON u.user_country_id=c.country_id
WHERE user_id='$user_id'";
$pf_result= mysqli_query($db,$pf_sql) or die (mysqli_error($db)); 
$pf_num=mysqli_num_rows($pf_result);

if ($pf_num >0) { // if not found 2	
while($pf_row = mysqli_fetch_array($pf_result, MYSQLI_ASSOC)){ // while loop 2			
$pf_user_firstname=ucwords(strtolower(sanitizeHeader($pf_row["user_firstname"])));
$pf_user_lastname=ucwords(strtolower(sanitizeHeader($pf_row["user_lastname"])));
$pf_user_email_address=strtolower(sanitizeHeader($pf_row["user_email_address"]));
$pf_user_password=sanitizeHeader($pf_row["user_password"]);
$pf_user_pix=sanitizeHeader($pf_row["user_pix"]);
$pf_user_gender=sanitizeHeader($pf_row["user_gender"]);
$pf_user_phone=sanitizeHeader($pf_row["user_phone"]);
$pf_user_country_id=sanitizeHeader($pf_row["user_country_id"]);
$pf_user_country_name=sanitizeHeader($pf_row["country_name"]);
$pf_user_gender=sanitizeHeader($pf_row["user_gender"]);
$pf_user_address=trim(sanitizeHeader($pf_row["user_address"]),',');
$pf_user_city=trim(sanitizeHeader($pf_row["user_city"]),',');
$pf_user_state=trim(sanitizeHeader($pf_row["user_state"]),',');
$user_wallet_auto_trader=sanitizeHeader($pf_row["user_wallet_auto_trader"]);
$user_withdrawal_allowed=sanitizeHeader($pf_row["user_withdrawal_allowed"]);
$pf_user_tfauth=sanitizeHeader($pf_row["user_tfauth"]);
$pf_user_account_status=sanitizeHeader($pf_row["user_account_status"]);
$pfUserPix=sanitizeHeader($pf_row["user_pix"]);
} // end of while loop 2

if($pf_user_pix!='' && file_exists('../dashboard/images/profilepix/'.$pf_user_pix)){
$pf_user_pix=$pf_user_pix;
}

else{
if($pf_user_gender=='Male'){
$pf_user_pix='avatar5.png';
}
else{
$pf_user_pix='avatar2.png';
}

}

} 
// end of personal Profile Query




// user wallet Query
$walNum =0;
$wal_sql = "SELECT
SUM(user_wallet_trade_profit_usd) AS user_trade_profit,
SUM(user_wallet_usd_bal) AS user_acct_bal,
SUM(user_wallet_inv_profit_usd) AS user_inv_profit,
SUM(user_wallet_mine_profit) AS user_mine_profit,
SUM(user_wallet_mine_profit_usd) AS user_mine_profit_usd,
SUM(user_wallet_inv_amt_usd) AS user_active_deposit_usd


FROM tbl_user_wallet 
WHERE user_wall_id='$user_id'";
$wal_result= mysqli_query($db,$wal_sql) or die (mysqli_error($db)); 
$walNum=mysqli_num_rows($wal_result);

if ($walNum >0) { // if not found 2	
while($wal_row = mysqli_fetch_array($wal_result, MYSQLI_ASSOC)){ // while loop 2			
$user_acct_bal_usd=sanitizeHeader($wal_row["user_acct_bal"]);
$user_inv_profit=sanitizeHeader($wal_row["user_inv_profit"]);
$user_trade_profit=sanitizeHeader($wal_row["user_trade_profit"]);
$user_mine_profit=sanitizeHeader($wal_row["user_mine_profit"]);
$user_mine_profit_usd=sanitizeHeader($wal_row["user_mine_profit_usd"]);
$user_active_deposit_usd=sanitizeHeader($wal_row["user_active_deposit_usd"]);
} // end of while loop 2

} 
// end of user wallet Query


$active_deposits = array('0.00');


$pending_deposits = array('0.00');

$last_withdrawal_amt  = array();
$last_withdrawal_date = array();

// user deposit Query
$mn_depNo =0;
$mnDepQ = "SELECT
dep_dollar_amt,
dep_status
FROM tbl_deposit 
WHERE dep_user_id='$user_id'";
$mnDepQ_r= mysqli_query($db,$mnDepQ) or die (mysqli_error($db)); 
$mn_depNo=mysqli_num_rows($mnDepQ_r);

if ($mn_depNo >0) { // if not found 2	
while($dp_row = mysqli_fetch_array($mnDepQ_r, MYSQLI_ASSOC)){ // while loop 2

if($dp_row["dep_status"] == 'Confirmed'){		
$active_deposits [] = $dp_row["dep_dollar_amt"];
}
else{
$pending_deposits [] = $dp_row["dep_dollar_amt"];
}


} // end of while loop 2

} 
// end of user deposit Query







// user withdrawal Query

$confirmed_withdrawal_amt = array('0.00');


$unconfirmed_withdrawal_amt = array('0.00');


$u_wNo =0;
$u_wQ = "SELECT
withdrawal_amt,
withdrawal_status,
withdrawal_date
FROM tbl_withdrawal 
WHERE withdrawal_user_id='$user_id'";
$u_wQ_r= mysqli_query($db,$u_wQ) or die (mysqli_error($db)); 
$u_wNo=mysqli_num_rows($wal_result);

if ($u_wNo >0) { // if not found 2	
while($wrow = mysqli_fetch_array($u_wQ_r, MYSQLI_ASSOC)){ // while loop 2			
$last_withdrawal_amt [] = $wrow["withdrawal_amt"];
$last_withdrawal_date [] = $wrow["withdrawal_date"];

if($wrow["withdrawal_status"] == 'Confirmed'){		
$confirmed_withdrawal_amt [] = $wrow["withdrawal_amt"];
}
else{
$unconfirmed_withdrawal_amt [] = $wrow["withdrawal_amt"];
}



} // end of while loop 2

} 
// end of user withdrawal Query













// user wallet Query
$hm_walNum =0;
$hm_wal_sql = "SELECT
user_wallet_id,
walletID,
user_wall_id,
user_wallet_act_id,
user_wallet_refno,
user_wallet_bal,
user_wallet_usd_bal,
user_wallet_date_created,
wallet_name,
wallet_symbol,
wallet_icon_class

FROM tbl_user_wallet u

INNER JOIN tbl_wallet w ON w.wallet_id=u.walletID

WHERE user_wall_id='$user_id' ORDER BY u.user_wallet_id ASC";
$hm_wal_result= mysqli_query($db,$hm_wal_sql) or die (mysqli_error($db)); 
$hm_walNum=mysqli_num_rows($hm_wal_result);

if ($hm_walNum >0) { // if not found 2	
while($wal_row = mysqli_fetch_array($hm_wal_result, MYSQLI_ASSOC)){ // while loop 2			
$hm_user_wallet_id[]=sanitizeHeader($wal_row["user_wallet_id"]);
$hm_walletID[]=sanitizeHeader($wal_row["walletID"]);
$hm_user_wall_id[]=sanitizeHeader($wal_row["user_wall_id"]);
$hm_user_wallet_act_id[]=sanitizeHeader($wal_row["user_wallet_act_id"]);
$hm_user_wallet_refno[]=sanitizeHeader($wal_row["user_wallet_refno"]);
$hm_user_wallet_bal[]=sanitizeHeader($wal_row["user_wallet_bal"]);
$hm_user_wallet_usd_bal[]=sanitizeHeader($wal_row["user_wallet_usd_bal"]);
$hm_user_wallet_date_created[]=sanitizeHeader($wal_row["user_wallet_date_created"]);
$hm_user_wallet_name[]=sanitizeHeader($wal_row["wallet_name"]);
$hm_user_wallet_symbol[]=sanitizeHeader($wal_row["wallet_symbol"]);
$hm_user_wallet_icon_class[]=sanitizeHeader($wal_row["wallet_icon_class"]);

} // end of while loop 2

} 



// end of user wallet Query
$wchkc = 0;
if(isset($_GET['w_c'])){
$w_c1 = base64_decode($_GET['w_c']);

$wchkc++;
}
?>





<div id="transLoader">
  <input type="button" class="b-close" style="cursor:pointer;
    position:absolute;
    right:10px;
    top:5px; font-size:18px; font-weight:bold; display:none;" id="CloseTransLoader">
            
    <div id="Loadingtransactions"><i class="fa fa-spin fa-refresh" style="font-size:50px;"></i><br><h3>Loading transactions...</h3></div>          
            
            </div>
            
                  
            
            
            
            
            
            

<div id="popUpLoader">
  <input type="button" class="b-close" style="cursor:pointer;
    position:absolute;
    right:10px;
    top:5px; font-size:18px; font-weight:bold; display:none;" id="ClosePopLoader" />
            
    <div id="processing"><i class="fa fa-spin fa-refresh" style="font-size:90px;"></i><br /><h3>Processing...</h3></div>          
            
            </div>
            
            

<!--justMyPopUpAlert Begins here--> <div id="justMyPopUpAlert" style="text-align:center"> 
        <div style="background:#FFF; min-width:400px; padding:0px 0px 5px 0px;"> 
         <table width="100%" border="0">
  <tr style="background:#FC3; height:20px;">
    <td style="padding:10px; text-align:left; color:#069; font-weight:bold;">
    <img src="images/s_attention.png" width="16" height="16" style="float:left; margin-right:5px;" />Message Alert!
    <span style="display:inline-block; clear:both;"></span>
    </td>
  </tr>
  <tr>
    <td id="displayMsg2" style="padding:5px;font-style:italic; font-size:12px; font-weight:bold;">&nbsp;</td>
  </tr>
</table>

        <input type="button" value="ok" name="ok_button2" id="ok_button2" class="b-close btn btn-primary" style="cursor:pointer; width:70px; padding:2px 7px;" />
       </div>  
       
       </div> <!--justMyPopUpAlert ends here-->




<!--justMyPopUp Begins here--> <div id="justMyPopUp" style="text-align:center"> 
        <div style="background:#FFF; min-width:400px; padding:0px 0px 5px 0px;"> 
         <table width="100%" border="0">
  <tr style="background:#FC3; height:20px;">
    <td style="padding:10px; text-align:left; color:#069; font-weight:bold;">
    <img src="images/s_attention.png" width="16" height="16" style="float:left; margin-right:5px;" />Message Alert!
    <span style="display:inline-block; clear:both;"></span>
    </td>
  </tr>
  <tr>
    <td id="displayMsg" style="padding:5px 10px; font-size:12px; font-style:italic; font-weight:bold;">&nbsp;</td>
  </tr>
</table>
        <input type="button" value="ok" name="ok_button" id="ok_button" class="b-close btn btn-primary" style="cursor:pointer;" onClick="reloadPage()" />
       </div>  
       
       </div> <!-- JustMyPopUp Ends Here -->
       
       
       
       
       

<div id="loadingPop">
  <input type="button" class="b-close" style="cursor:pointer;
    position:absolute;
    right:10px;
    top:5px; font-size:18px; font-weight:bold; display:none;" id="CloseMeNowLog" />
            <img src="images/360.gif" /></div>
 
 
 <div id="myNewRegPop_up">
  <input type="button" class="b-close" style="cursor:pointer;
    position:absolute;
    right:10px;
    top:5px; font-size:12px; font-weight:bold; display:none;" id="CloseMeNowPlease" />
            <img src="images/ajaxloading.gif" style="float:left; margin-right:10px;" /> processing... </div>
            






<div class="navbar navbar-default navbar-fixed-top menu-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="../" class="navbar-brand"></a>
				</div>
				<div class="navbar-collapse collapse">
					<nav>
						<ul class="nav navbar-nav navbar-right">
		<li><a href="./"> Dashboard</a></li>
      <li><a href="crypto-wallets" style="font-size:11px;"> Wallets</a> </li>
      <li><a href="fund-deposit" style="font-size:11px;"> Deposit</a></li>
      <li><a href="fund-withdrawal" style="font-size:11px;"> Withdrawal</a></li>
      <li><a href="live-trading" style="font-size:11px;"> Trading</a></li>
      <li><a href="investments" style="font-size:11px;"> Investments</a> </li>
      <li><a href="crypto-mining" style="font-size:11px;"> Mining</a></li>
      <li><a href="currency-exchange" style="font-size:11px;"> Currency Exchange </a></li>
      <li><a href="2fa" style="font-size:11px;">2FA</a></li>
      <li><a href="profile-settings" style="font-size:11px;"> Profile</a></li>
      <li><a href="../logout" style="font-size:11px;"> Sign Out </a></li>
							                            						</ul>
					</nav>
				</div> 
			</div>
		</div>
        
        
        
        
      <!--  <div class="social">
  <a href="https://join.skype.com/" target="_blank" class="twitter"><i class="fa fa-skype"></i></a>
  <a href="https://t.me/" target="_blank" class="telegram"><i class="fa fa-paper-plane"></i></a>
</div> -->       
<!--<a href="../paidout" class="proof" target="_blank"><i class="pe-7s-note2"></i> Payment Proof</a>--> 


