<?php
session_start();
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id']) || ($_SESSION['Authentication'])!="YES"){
$_SESSION = array();
session_destroy();
header("Location:login");
exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Login Admin  - Global Et Incolumem </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./logowhite.png">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="./vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    
    
    
    
    <div id="main-wrapper">
          
          
          <!-- header starts --->
          
          <?php require_once("admin-header.php");?>
          
          <!-- header stops --->
        
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				
				
				
				<div class="form-head mb-sm-3 mb-3 d-flex flex-wrap align-items-center breadcrumb">
					
					
					<h4 class="font-w600 mb-2 mr-auto ">
					<i class="flaticon-141-home"></i>
					Dashboard
					</h4>

						
				</div>
				
				
				
			

                  <div class="row mb-sm-3 mt-5">	
	
	
	
	<div class="col-xl-12 mt-2">
								<div class="card">
									<div class="card-header d-sm-flex d-block pb-0 border-0" style="margin-bottom:0px;">
										<div>
											<h4 class="fs-20 text-danger">Welcome, Dear Admin</h4>
										</div>
										
									</div>
									<div class="card-body" style="padding-top:0px; margin-top:0px;">
										
										<div class="row">
										<div class="col-lg-12">
										<p style="font-size:13px;">
										Your personal information are NOT shared with a third party, we have a zero tolerance to spam. 
										If you notice any unauthorised access to your account, please don't hesitate to contact your webmaster 
										regarding such issues. Please do not share your login details with a third party.										</p>
										
										
										</div>					
										
									</div>
									</div>
								</div>
							</div>
	
	
	
	</div>








             									
									
									
									
									
									
							</div>
		</div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php require_once("footer.php");?>
                <!--**********************************
            Footer end
        ***********************************-->
		
		
		
		
		
		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>

    
    
        <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="./vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script> <!-- theme settings file -->
    <script src="./js/demo.js"></script>
    <!--<script src="./js/styleSwitcher.js"></script>-->
    

        
    
    </body>
</html>