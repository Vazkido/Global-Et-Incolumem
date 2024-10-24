<div class="col-md-4">
     <div class="userbox animate" data-anim-type="fadeInUp" data-anim-delay="100">
     <?php
	 if($pfUserPix!='' && file_exists('../dashboard/images/profilepix/'.$pfUserPix)){?>
     <img src="../dashboard/images/profilepix/<?php echo $pf_user_pix;?>" class="img-circle img-rounded img-responsive" style="max-width:50px; float:left; margin-right:10px;" />
    <?php } else{ echo '<i class="pe-7s-user user"></i>';} ?>
     <div class="info"><h4><?php echo $username;?></h4>
     <span>E-mail: <?php echo $pf_user_email_address;?></span>
    
     </div> <a href="profile-settings" class="edit"><i class="pe-7s-config"></i> Edit account</a>
     
    </div>
    
    <div>
     <ul class="usermenu animate" data-anim-type="fadeInUp" data-anim-delay="300">
      <li><a href="./"><i class="pe-7s-display1 hvr-pop"></i> Dashboard</a></li>
      <li><a href="crypto-wallets"><i class="pe-7s-wallet hvr-pop"></i>My Crypto Wallets</a></li>
      <li><a href="fund-deposit"><i class="pe-7s-cash hvr-pop"></i>Fund Deposit</a></li>
      <li><a href="fund-withdrawal"><i class="pe-7s-cash hvr-pop"></i>Fund Withdrawal</a></li>
      <li><a href="live-trading"><i class="pe-7s-display1 hvr-pop"></i>Live Trading</a></li>
      <li><a href="investments"><i class="pe-7s-safe hvr-pop"></i>Investments</a></li>
      <li><a href="crypto-mining"><i class="pe-7s-anchor hvr-pop"></i>Crypto Mining</a></li>
      <li><a href="currency-exchange"><i class="pe-7s-credit hvr-pop"></i> Currency Exchange </a></li>
      <li><a href="2fa"><i class="pe-7s-shield hvr-pop"></i> 2FA </a></li>
      <li><a href="profile-settings"><i class="pe-7s-config hvr-pop"></i> Edit Account</a></li>
     </ul>
    </div>
    </div>