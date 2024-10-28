<?php
date_default_timezone_set("America/Los_Angeles");


function sanitizeHeader($var){
$var=html_entity_decode($var);
$var=trim($var);
return $var;
}





$admin_ip_address = $_SERVER['REMOTE_ADDR'];

require_once("../config.php");


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
            	<img src="./favicon.ico" alt="">
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

 <strong>Your IP Address:</strong> <?php echo $admin_ip_address;?>


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
					<img src="images/profilepix/user.png" alt="">

					<h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> Admin</h5>
					<p class="mb-0 fs-14 font-w400" style="color:#4a8cda;"></p>
				</div>
				<ul class="metismenu" id="menu">
				
				
				                    
                    
                  <li><a href="admin-index" class="ai-icon" aria-expanded="false">
							<i class="flaticon-096-dashboard"></i>
							
							<span class="nav-text">Admin Dashboard</span>
						</a>
					</li> 
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					 <li><a href="manage-shipment" class="ai-icon" aria-expanded="false">
							<i class="flaticon-032-briefcase"></i>
							<span class="nav-text">Manage Shipment</span>
						</a>
					</li>
					
					
					
					
					
				                  
                  


                    





                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Settings</span>
						</a>
                        <ul aria-expanded="false">
					  <li><a href="change-admin-password">Change Password</a></li>
                      
                      
                     
						</ul>

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
		