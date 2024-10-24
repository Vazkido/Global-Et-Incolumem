<?php
date_default_timezone_set("America/Los_Angeles");


function sanitizeHeader($var){
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}

$user_id = $_SESSION['user_id'];
$user_account_id = $_SESSION['user_account_id'];



$user_ip_address = $_SERVER['REMOTE_ADDR'];

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
user_withdrawal_allowed,
user_withdrawal_allowed_msg,
user_withdrawal_disabled_msg,
user_dob,
user_account_balance,
user_date_registered

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
$pf_user_dob=sanitizeHeader($pf_row["user_dob"]);
$pf_user_address=trim(sanitizeHeader($pf_row["user_address"]),',');
$pf_user_city=trim(sanitizeHeader($pf_row["user_city"]),',');
$pf_user_state=trim(sanitizeHeader($pf_row["user_state"]),',');
$user_wallet_auto_trader=sanitizeHeader($pf_row["user_wallet_auto_trader"]);
$user_withdrawal_allowed=sanitizeHeader($pf_row["user_withdrawal_allowed"]);
$user_withdrawal_allowed_msg=sanitizeHeader($pf_row["user_withdrawal_allowed_msg"]);
$user_withdrawal_disabled_msg=sanitizeHeader($pf_row["user_withdrawal_disabled_msg"]);
$pf_user_tfauth=sanitizeHeader($pf_row["user_tfauth"]);
$pf_user_account_status=sanitizeHeader($pf_row["user_account_status"]);
$pfUserPix=sanitizeHeader($pf_row["user_pix"]);
$pf_user_date_registered = sanitizeHeader($pf_row["user_date_registered"]);
$pf_user_account_balance = sanitizeHeader($pf_row["user_account_balance"]);





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


$user_acct_bal_usd=array('0');
$user_acct_bal_usd_commission = array('0');
$user_inv_profit= array('0');
$walNum =0;
$walNo=0;
// user wallet Query


$wal_s = "SELECT
user_wallet_act_id FROM tbl_user_wallet

WHERE user_wallet_act_id='$user_account_id'";

$wal_rs= mysqli_query($db,$wal_s) or die (mysqli_error($db)); 
$walNo=mysqli_num_rows($wal_rs);



if($walNo>0){
$wal_sq1 = "SELECT

user_wallet_trade_profit_usd AS user_trade_profit,
user_wallet_usd_bal AS user_acct_bal,
user_wallet_inv_profit_usd AS user_inv_profit,
user_wallet_mine_profit AS user_mine_profit,
user_wallet_mine_profit_usd AS user_mine_profit_usd,
user_wallet_inv_amt_usd AS user_active_deposit_usd,
user_wallet_type

FROM tbl_user_wallet

WHERE user_wallet_act_id='$user_account_id'";

$wal_r= mysqli_query($db,$wal_sq1) or die (mysqli_error($db)); 
$walNum=mysqli_num_rows($wal_r);



if ($walNum >0) { // if not found 2	
while($wal_row = mysqli_fetch_array($wal_r, MYSQLI_ASSOC)){ // while loop 2			

if($wal_row["user_wallet_type"] == 'Investment'){
$user_acct_bal_usd[]=sanitizeHeader($wal_row["user_acct_bal"]);
$user_inv_profit[]=sanitizeHeader($wal_row["user_inv_profit"]);
$user_trade_profit[]=sanitizeHeader($wal_row["user_trade_profit"]);
$user_active_deposit_usd[]=sanitizeHeader($wal_row["user_active_deposit_usd"]);

}

elseif($wal_row["user_wallet_type"] == 'Affiliate'){
$user_acct_bal_usd_commission[]=sanitizeHeader($wal_row["user_acct_bal"]);
}


} // end of while loop 2

} 


// end of user wallet Query
}





$total_inv_bal = array_sum($user_acct_bal_usd);

$total_commission_bal = array_sum($user_acct_bal_usd_commission);

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

$confirmed_withdrawal_amt = array(0);


$unconfirmed_withdrawal_amt = array(0);


$u_wNo =0;
$u_wQ = "SELECT
withdrawal_amt,
withdrawal_status,
withdrawal_date
FROM tbl_withdrawal 
WHERE withdrawal_user_id='$user_id'";
$u_wQ_r= mysqli_query($db,$u_wQ) or die (mysqli_error($db)); 
$u_wNo=mysqli_num_rows($u_wQ_r);

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







$total_confirmed_withdrawal_amt = array_sum($confirmed_withdrawal_amt);








// user wallet Query
$hm_walNum =0;
$hm_wal_sql = "SELECT
user_wallet_id,
user_wall_id,
user_wallet_act_id,
user_wallet_refno,
user_wallet_bal,
user_wallet_usd_bal,
user_wallet_date_created,
user_wallet_type

FROM tbl_user_wallet


WHERE user_wall_id='$user_id' ORDER BY user_wallet_id ASC";
$hm_wal_result= mysqli_query($db,$hm_wal_sql) or die (mysqli_error($db)); 
$hm_walNum=mysqli_num_rows($hm_wal_result);

if ($hm_walNum >0) { // if not found 2	
while($wal_row = mysqli_fetch_array($hm_wal_result, MYSQLI_ASSOC)){ // while loop 2			
$hm_user_wallet_id[]=sanitizeHeader($wal_row["user_wallet_id"]);
$hm_user_wall_id[]=sanitizeHeader($wal_row["user_wall_id"]);
$hm_user_wallet_act_id[]=sanitizeHeader($wal_row["user_wallet_act_id"]);
$hm_user_wallet_refno[]=sanitizeHeader($wal_row["user_wallet_refno"]);
$hm_user_wallet_bal[]=sanitizeHeader($wal_row["user_wallet_bal"]);
$hm_user_wallet_usd_bal[]=sanitizeHeader($wal_row["user_wallet_usd_bal"]);
$hm_user_wallet_date_created[]=sanitizeHeader($wal_row["user_wallet_date_created"]);

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
            
    <div id="Loadingtransactions"><i class="fa fa-spin fa-spinner"></i><br><h3>Loading transactions...</h3></div>          
            
            </div>
            
       
            
            

<div id="popUpLoader">
  <input type="button" class="b-close" style="cursor:pointer;
    position:absolute;
    right:10px;
    top:5px; font-size:18px; font-weight:bold; display:none;" id="ClosePopLoader" />
            
    <div id="processing"><i class="fa fa-spin fa-spinner"></i><br /><h3>Processing...</h3></div>          
            
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
            <i class="fa fa-spin fa-spinner"></i>
                        </div>
 
 
 <div id="myNewRegPop_up">
  <input type="button" class="b-close" style="cursor:pointer;
    position:absolute;
    right:10px;
    top:5px; font-size:12px; font-weight:bold; display:none;" id="CloseMeNowPlease" />
            <i class="fa fa-spin fa-spinner"></i> processing... </div>









<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="admin-index" class="brand-logo">
                <img src="images/logo-text.png" class="img-fluid">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        
                        &nbsp;
							                     
                      </div>
							                        
							                        
                        <ul class="navbar-nav header-right main-notification">
                        
                        
                        
                        
                        
                        
                        <li class="nav-item dropdown notification_dropdown">
                                <span style="font-size:12px;">
                                   
                                   

      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF4C41" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>

 <strong>Your IP Address:</strong> <?php echo $user_ip_address;?>


                                </span>
															</li>

                        
                        
                        
                        
                        
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="images/profilepix/user.png" width="20" alt=""/>
									<div class="header-info">
										<span>Hi, Admin</span>
										<small></small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                                                       
                                    <a href="logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                    
                                    
                                                                      
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll"> 
				<div class="main-profile">
					<img src="../dashboard/images/profilepix/<?php echo $pf_user_pix;?>" alt="">
					<a href="profile-settings"><i class="fa fa-cog" aria-hidden="true"></i></a>
					
					<p class="mb-0 fs-20" style="font-size:14px;">
					 <?php echo "$pf_user_firstname $pf_user_lastname";?>
					</p>

					
					<p class="mb-0 fs-14 font-w400" style="color:#4a8cda;"><?php echo $pf_user_country_name;?></p>
				</div>
				<ul class="metismenu" id="menu">
				
				
				
				
				
				
				
				
				<li><a href="admin-index" class="ai-icon" aria-expanded="false">
							<i class="flaticon-096-dashboard"></i>
							
							<span class="nav-text">Admin Dashboard</span>
						</a>
					</li> 
					
					
					
					
					
					
					
					
				                  
                  <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-153-user"></i>
							<span class="nav-text">My Clients</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="my-clients">All Clients</a></li>
							<!--
                      <li><a href="logged-clients">Logged Clients</a></li>
                      -->
						</ul>

                    </li>


                    





                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Settings</span>
						</a>
                        <ul aria-expanded="false">
					  <li><a href="change-admin-password">Change Admin Password</a></li>
                      <li><a href="payment-methods">Payment Method</a></li>
                       <li><a href="investment-plans">Package Plans</a></li>
                      <li><a href="site-info">Site Info</a></li>
                                            <!--

                      <li><a href="exchange-rate">Exchange Rate</a></li>
                      <li><a href="manage-team-members">Team Members</a></li>

                     
                       <li><a href="crypto-addresses">Crypto Addresses</a></li>
                      
                       <li><a href="mining-contract-plans">Mining Contract Plans</a></li>
                       <li><a href="payout-history">Payout History</a></li>
                        -->
                       <!--<li><a href="latest-deposit">Latest Deposit</a></li>-->

						</ul>

                    </li>
                  
                  
                  
                  
                  
                  <li style="background:#D7584A; color:#fff; font-size:12px; text-align:center">
                  
                  Client's navigation starts below
                  
					</li>
					
				
				
				                    
                    
                  <li><a href="./" class="ai-icon" aria-expanded="false">
							<i class="flaticon-144-layout"></i>
							<span class="nav-text">Client Dashboard</span>
						</a>
					</li> 
                    





                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Account</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="profile-settings">Profile Settings</a></li>
							<li><a href="withdrawal-settings">My Wallet <span style="font-size:12px;">(Withdrawal Settings)</span></a></li>
							<li><a href="2fa">2FA</a></li>
							<li><a href="profile-verification">Profile Verification</a></li>
						</ul>

                    </li>
                    
                    
                    
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Money</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="fund-deposit">Fund Deposit</a></li>
							<li><a href="fund-withdrawal">Fund Withdrawal</a></li>
							<li><a href="internal-fund-transfer">Internal Fund Transfer</a></li>
						</ul>

                    </li>
                    
                    
                    
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-077-menu-1"></i>
							<span class="nav-text">Trading</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="add-new-investment">Add New Investment</a></li>
							<li><a href="my-investment">My Investment</a></li>
							         </ul>
                    </li>
                    
                    
                    
                    
                    <li><a href="my-transactions" class="ai-icon" aria-expanded="false">
							<i class="flaticon-049-copy"></i>
							<span class="nav-text">Transactions</span>
						</a>
					</li>
                    
                    
                    
                    <li><a href="logoff" class="ai-icon" aria-expanded="false">
							<i class="flaticon-059-log-out"></i>
							<span class="nav-text">Sign Out</span>
						</a>
					</li>                    
                    
                                    </ul>
				<div class="copyright">
					<p><strong> Copyright &copy; </strong>Multitrack Cargo Express <?php echo date("Y");?></p>
					<p class="fs-12" style="text-align:center;"><span class="heart"></span>All Rights Reserved</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		