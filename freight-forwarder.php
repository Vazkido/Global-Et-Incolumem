<?php require_once("inc/header.php");?>
   <title> Freight Forwarder - Global Et Incolumem </title>
   <!-- Document Wrapper-->
    <div class="wrapper clearfix" id="wrapperParallax">
      
    <!-- navigation bar -->
    <?php require_once("inc/topNavbar.php");?>
     <section class="page-title page-title-3 bg-overlay bg-overlay-dark bg-parallax" id="page-title">
        <div class="bg-section"><img src="asset/images/page-titles/5.jpg" alt="Background"/></div>
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
              <div class="title text-center">
                <div class="title-heading">
                  <h1>Freight Forwarder </h1>
                </div>
               
              <!-- End .title -->
            </div>
            <!-- End .col-lg-8 -->
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
	<!-- Loading Popup -->
<div id="loadingPop">
    <input 
        type="button" 
        class="b-close" 
        style="cursor:pointer; position:absolute; right:10px; top:5px; font-size:18px; font-weight:bold; display:none;" 
        id="CloseMeNowLog" 
    />

</div>

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

      <section class="service-single case-study case-study-2 pb-70" id="service-single">
        <div class="container">
          <div class="row">
            <!-- 
            ============================
            Sidebar Area
            ============================
            -->
            <div class="col-sm-12 col-md-12 col-lg-4 order-2 order-lg-0">
              <div class="sidebar sidebar-case-study">
                <!-- Start .widget-categories-->
                <div class="widget widget-categories">
                  <div class="widget-title">
                    <h5>transport services</h5>
                  </div>
                  <div class="widget-content">
                    <ul class="list-unstyled">
                      
                      <li><a href="international-freight">Air freight</a></li>
                      <li><a href="domestic-freight">Domestic freight</a></li>
                      <li><a href="freight-forwarder">Freight Forwarding</a></li>
                      <li><a href="freight-consultation">Freight-consultation</a></li> 
                    </ul>
                  </div>
                </div>
                <!-- End .widget-categories -->


                <!-- Start .widget-reservation-->
                <div class="widget widget-reservation"><img src="asset/images/blog/sidebar/reservation.jpg" alt="Background Image"/>
                  <div class="widget-content">
                    <h5>Dedicated Customer Teams &  Agile Services</h5>
                    <p>Our worldwide presence ensures the timeliness, cost efficiency compliance adherence required to ensure your production timelines are met.</p><a class="btn btn--transparent btn--inverse btn--block" href="contact-us">Schedule An Appointment</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- End .col-lg-4 -->
            <div class="col-sm-12 col-md-12 col-lg-8">
              <!-- Start .case-study-entry-->
              <div class="case-study-entry">
                <div class="entry-content">
                  <div class="entry-bio">
                    <h5>overview</h5>
                    <p>We offer Fast Worldwide Delivery and We have the freight management expertise, the infrastructure and the global network to move your cargo wherever you need it to go, via air, road and sea.</p>
                    <p>With comprehensive air, ocean, road and intermodal freight solutions that can meet any import and export requirements, we offer customers in the US fully integrated global and domestic freight services. Freight Right offers full-service global forwarding in over 180 countries and 900,000 origins, with any mode and commodity.</p>
                    <p>We, as being a licensed Freight Forwarder for Domestic (DOT) & International (FMC & IATA) shipping, not only act on behalf of them in arranging transportation services but also facilitate documentation & other related services required by them to complete their sales transaction.</p>
                  </div>

                  <div class="entry-bio entry-bio-2">
                    <h5>stats &amp; charts </h5>
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <p>Our mix of company-owned and contractor asset allows us to retain optimal levels of control whilst expanding our reach to over 96% of towns in Australia. With 40 years of LTL experience, we are now a trusted LTL freight provider for shippers of all sizes and commodity types.</p>
                        <p>
                           Our LTL service extends to all states and territories, and includes multiple per-week services to places many others only serve occasionally, including Darwin, Alice Springs, Newman, Mt. Isa, Launceston and Burnie.</p>
                        <p>
                           We pride ourselves on providing the best transport and shipping services currently available in Australia. Our skilled personnel, utilising the latest communications, tracking and processing software, combined with decades of experience, ensure all freight is are shipped.</p>
                      </div>
                      <div class="col-12 col-lg-6"> <img class="entry-chart" src="asset/images/chart/chart-2.png" alt="Chart image"/></div>
                    </div>
                  </div>

				<!-- Why Us -->
                  <div class="entry-why">
                    <div class="entry-bio">
                      <h5>why us!</h5>
                      <p>We continue to pursue that same vision in today's complex, uncertain world, working every day to earn our customers’ trust! During that time, we’ve become expert in freight transportation by air and all its related services. We work closely with all major airlines around the world.</p>
                    </div>
                    <div class="row"> 
                      <div class="col-12 col-lg-6">
                        <div class="entry-bio entry-topic"> <i class="fas fa-check"></i>
                          <div class="entry-topic-body">
                            <h5>Quality Control System</h5>
                            <p>We enhance our industry operations by relieving you of the worries associated with freight forwarding.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-6">
                        <div class="entry-bio entry-topic"> <i class="fas fa-check"></i>
                          <div class="entry-topic-body">
                            <h5>Highly Professional Staf</h5>
                            <p>We are one of the Nations largest automotive parts recyclers and a widely recognized leader utilizing  </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-6">
                        <div class="entry-bio entry-topic"> <i class="fas fa-check"></i>
                          <div class="entry-topic-body">
                            <h5>Satisfaction Guarantee</h5>
                            <p>An integrated approach to providing engineering services allows our clients to benefit from the commercial</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-6">
                        <div class="entry-bio entry-topic"> <i class="fas fa-check"></i>
                          <div class="entry-topic-body">
                            <h5>Accurate Processes</h5>
                            <p>We’ll work with you on your project, large or small. Together we’ll fine-tune your new construction</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!--  End Why Us -->


            </div>
            <!-- End .col-lg-8-->
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>



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