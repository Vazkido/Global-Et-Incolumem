<?php require_once("inc/header.php");?>
   <title> About  - Global Et Incolumem </title>
   <!-- Document Wrapper-->
    <div class="wrapper clearfix" id="wrapperParallax">
      
    <!-- naigation bar -->
    <?php require_once("inc/topNavbar.php");?>
    
	<!-- Loading Popup -->
<div id="loadingPop">
    <input 
        type="button" 
        class="b-close" 
        style="cursor:pointer; position:absolute; right:10px; top:5px; font-size:18px; font-weight:bold; display:none;" 
        id="CloseMeNowLog" 
    />

</div>
 <!-- Start #page-title-->
      <section class="page-title page-title-4 bg-overlay bg-overlay-dark bg-parallax" id="page-title">
        <div class="bg-section"><img src="asset/images/page-titles/10.jpg" alt="Background"/></div>
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="title text-lg-left"> 
                <div class="title-sub-heading">
                  <p>Dedicated Customer Teams &amp; An Agile Services</p>
                </div>
                <div class="title-heading">
                  <h1>Global Logistics Partner To World’s Famous Brands For Over 25 Years!</h1>
                </div>
                <div class="clearfix"></div>
                <ol class="breadcrumb justify-content-lg-start">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">company</a></li>
                  <li class="breadcrumb-item active" aria-current="page">About US</li>
                </ol>
              </div>
              <!-- End .title -->
            </div>
            <!-- End .col-lg-8 -->
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
      <!-- End #page-title-->

<!-- Tracking Section -->
<section class="ft1-tracking-section py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <!-- Tracking Column -->
            <div class="tracking-column col-lg-7 col-md-12 mb-4 mb-lg-0">
                <div class="card shadow-sm p-4 border-0">
                    <!-- Tracking Form -->
                    <div class="tracking-form">
                        <h4 class="mb-4 text-center">Track Your Shipment</h4>
                        <form 
                            method="post" 
                            class="search-form" 
                            id="frmTrack" 
                            name="frmTrack" 
                            action="" 
                            onsubmit="return false"
                        >
                            <div class="form-group input-group">
                                <input 
                                    type="search" 
                                    id="shipment_tracking_no" 
                                    name="shipment_tracking_no" 
                                    class="form-control" 
                                    value="" 
                                    placeholder="Enter Your Tracking Number" 
                                    required
                                />
                                <div class="input-group-append">
                                    <button 
                                        class="btn btn-primary" 
                                        name="submitTrackNo" 
                                        onclick="trackNowFunc()"
                                    >
                                        Track & Trace 
                                        <span class="fas fa-angle-double-right ml-2"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Featured Column -->
            <div class="featured-column col-lg-5 col-md-12">
                <div class="row">
                    <!-- Feature Block 1 -->
                    <div class="feature-block col-6 mb-4">
                        <div class="card h-100 text-center p-4 shadow-sm border-0">
                            <div class="icon mb-3">
                                <i class="flaticon-discount" style="font-size: 2rem; color: #ff6f61;"></i>
                            </div>
                            <h6>Affordable Premium Shipping</h6>
                        </div>
                    </div>

                    <!-- Feature Block 2 -->
                    <div class="feature-block col-6 mb-4">
                        <div class="card h-100 text-center p-4 shadow-sm border-0">
                            <div class="icon mb-3">
                                <i class="flaticon-shield-2" style="font-size: 2rem; color: #28a745;"></i>
                            </div>
                            <h6>Safe & Reliable Courier Services</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="about about-4" id="about-4">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-5">
              <div class="about-img about-img-left">
                <div class="about-img-warp bg-overlay">
                  <div class="bg-section"><img class="img-fluid" src="asset/images/about/1.jpg" alt="about Image"/></div>
                </div>
                <div class="counter">
                  <div class="counter-icon"> <i class="flaticon-018-packaging"></i></div>
                  <div class="counter-num"> <span class="counting">9,612</span>
                    <p>m</p>
                  </div>
                  <div class="counter-name">
                    <h6>delivered goods</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-7">
              <div class="heading heading-3">
                <p class="heading-subtitle">Providing Full Range Of Transportation Worldwide.</p>
                <h2 class="heading-title">Reliable Logistic & Transport Solutions Saves Your Time!</h2>
              </div>
              <div class="about-block"> 
                <div class="row">
                  <div class="col-12 col-lg-7">
                    <div class="block-left"> 
                      <p>Equita Group is a representative logistics operator providing full range of service in the sphere of customs clearance transportation worldwide for any cargo</p>
                      <p>We pride ourselves on providing the best transport and shipping services available allover the world. Our skilled personnel, utilising the latest communications, tracking and combined with experience through integrated supply chain solutions!</p>
                    </div>
                  </div>
                  <div class="col-12 col-lg-5">
                    <div class="block-right">
                      <div class="detail"> 
                        <h6>quality </h6>
                        <p>Following the quality of our service thus having gained trust of our many clients.</p>
                      </div>
                      <div class="detail"> 
                        <h6>rellability</h6>
                        <p>We provide with cargo safety throughout all the stages of our delivery process..</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="signature-block">
                <div class="signature-body"> 
                  <h6>john peter</h6>
                  <p>founder</p>
                </div><img src="asset/images/signature/1.png" alt="signature"/>
              </div>
            </div>
            <!-- End .col-lg-6-->
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
      <!--
      ============================
      CTA #3 Section
      ============================
      -->
      <section class="cta cta-3 bg-theme" id="cta-3">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-5">
              <div class="heading heading-2 heading-light">
                <p class="heading-subtitle">Directions, That Matter!</p>
                <h2 class="heading-title">Digital Freight That Saves Your Time!</h2>
              </div>
            </div>
            <!--End .col-lg-5-->
            <div class="col-12 col-lg-6 offset-lg-1">
              <div class="prief-set">
                <p>We pride ourselves on providing the best transport and shipping services available allover the world. Our skilled personnel, utilising communications, tracking and processing software, combined with decades of experience! Through integrated supply chain solutions, Equita drives sustainable competitive advantages to some of Australia's largest companies.</p>
                <ul class="advantages-list">
                  <li><i class="fas fa-check-circle"></i> Quality Control System</li>
                  <li><i class="fas fa-check-circle"></i> Unrivalled workmanship</li>
                  <li><i class="fas fa-check-circle"></i> 100% Satisfaction Guarantee</li>
                  <li><i class="fas fa-check-circle"></i> Accurate Testing Processes</li>
                  <li><i class="fas fa-check-circle"></i> Highly Professional Staff</li>
                  <li><i class="fas fa-check-circle"></i> Professional and Qualified</li>
                </ul>
              </div>
            </div>
            <!--End .col-lg-6-->
          </div>
          <!-- End .row-->
          <div class="action-panels"> 
            <div class="row no-gutters">
              <div class="col-12 col-lg-6"> 
                <div class="action-panel"> 
                  <div class="action-panel-img">
                    <div class="bg-section"><img src="asset/images/cta/2.jpg" alt="image"/></div>
                  </div>
                  <div class="action-panel-content">
                    <div class="panel-icon"><i class="flaticon-015-scale"></i></div>
                    <div class="panel-heading"> 
                      <h3>Affordable Price, Certified Forwarders</h3>
                    </div><a href="logistics"><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6"> 
                <div class="action-panel"> 
                  <div class="action-panel-img">
                    <div class="bg-section"><img src="asset/images/cta/3.jpg" alt="Image"/></div>
                  </div>
                  <div class="action-panel-content inverted">
                    <div class="panel-icon"><i class="flaticon-017-pallet"></i></div>
                    <div class="panel-heading"> 
                      <h3>Affordable Price, Certified Forwarders</h3>
                    </div><a href="logistics"><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
      <!--
      ============================
      Cases & Clients #2 Section
      ============================
      -->
      <section class="cases-clients cases-clients-2 bg-parllax" id="cases-clients-2">
        
        <div class="clients clients-carousel clients-1 pt-0">
          <div class="container">
            <div class="row"> 
              <div class="col-12 col-lg-8 offset-lg-2">
                <div class="heading heading-5 text-center">
                  <p class="heading-subtitle">join us today</p>
                  <h2 class="heading-title">our partners</h2>
                  <p class="heading-desc">Our skilled personnel, utilising the latest communications, tracking and processing software, combined with decades of experience! Through integrated supply chain solutions, Equita drives sustainable competitive advantages to some of Australia's largest companies.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="carousel owl-carousel" data-slide="6" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="3000">
                  <div class="client"><img src="asset/images/clients/1.png" alt="client"/></div>
                  <div class="client"><img src="asset/images/clients/2.png" alt="client"/></div>
                  <div class="client"><img src="asset/images/clients/3.png" alt="client"/></div>
                  <div class="client"><img src="asset/images/clients/4.png" alt="client"/></div>
                  <div class="client"><img src="asset/images/clients/5.png" alt="client"/></div>
                  <div class="client"><img src="asset/images/clients/6.png" alt="client"/></div>
                </div>
              </div>
            </div>
            <!-- End .row-->
          </div>
          <!-- End .container-->
        </div>
      </section>
</div>

<?php require_once("inc/footer.php");?>

	<script src="asset/js/jquery.min.js"></script>
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
	
        
        
function trackNowFunc(){

var accPattern = /^[0-9._-]{5,11}$/;

var shipment_tracking_no = document.getElementById('shipment_tracking_no').value;

shipment_tracking_no=shipment_tracking_no.replace(/^\s+|\s+$/g,'');


if(shipment_tracking_no==''){
alert ("Please enter your tracking number");
document.getElementById("shipment_tracking_no").focus();
return false;
}





var dataString = $('#frmTrack').serialize();

		$('#loadingPop').bPopup({
				modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
				});
		
		
		var strURL="tracking_process.php";
		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					
					
					if (req.status == 200) {


setTimeout(function (){

document.getElementById('CloseMeNowLog').click();

if(req.responseText==1){
alert("Error 201: Invalid Tracking Number");
return false;
}



else if (req.responseText==2){
alert("Error 203:  Tracking Number Not Authenticated");
return false;

}

else if (req.responseText==3){

location='tracking-details';

}



else {
alert("An unknown error occurred, please try agian");
//alert(req.responseText);
return false;
}




},1000);										
					} else {
						setTimeout(function (){	
					document.getElementById('CloseMeNowLog').click();
					},300);
						setTimeout(function (){	
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
						},400);
					}
				}				
			}		
			req.open("POST", strURL, true);
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
			req.send(dataString);
		}



}


</script>

