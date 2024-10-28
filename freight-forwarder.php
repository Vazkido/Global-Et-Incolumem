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
   <!-- Main Content Area -->
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="case-study-entry">
          <div class="entry-content">
            <div class="entry-bio">
              <h5>Overview of Freight Forwarding Services</h5>
              <p>Freight forwarding is the backbone of global trade, helping businesses transport goods across international borders. As an experienced freight forwarder, we coordinate the movement of your cargo by air, sea, and land, ensuring seamless delivery from origin to destination.</p>

              <h5>Why Choose Us as Your Freight Forwarder?</h5>
              <ul>
                <li><strong>Global Network:</strong> Partnerships with carriers, ports, and customs agents across major trade routes.</li>
                <li><strong>Multi-Modal Transport:</strong> Expertise in air, sea, and road freight to meet diverse shipping requirements.</li>
                <li><strong>Customs Expertise:</strong> We handle the complexities of customs clearance to avoid delays.</li>
                <li><strong>End-to-End Visibility:</strong> Track your shipment in real time with our advanced tracking solutions.</li>
                <li><strong>Document Management:</strong> Our team manages essential paperwork, including bills of lading and shipping documentation.</li>
              </ul>

              <h5>Our Freight Forwarding Capabilities</h5>
              <ul>
                <li><strong>Sea Freight Solutions:</strong> Full container load (FCL) and less than container load (LCL) options.</li>
                <li><strong>Air Freight Expertise:</strong> Fast and efficient solutions for urgent shipments.</li>
                <li><strong>Consolidation Services:</strong> Combine smaller shipments to optimize costs.</li>
                <li><strong>Warehouse & Distribution:</strong> Warehousing facilities to store and distribute your goods.</li>
                <li><strong>Dangerous Goods Handling:</strong> Compliance with international standards for hazardous shipments.</li>
              </ul>

              <h5>How Our Freight Forwarding Services Benefit Your Business</h5>
              <ul>
                <li><strong>Time-Saving:</strong> Let us handle the logistics, so you can focus on your core business activities.</li>
                <li><strong>Cost Optimization:</strong> Benefit from our partnerships to get competitive shipping rates.</li>
                <li><strong>Risk Management:</strong> Minimize risks with expert advice on regulations, compliance, and insurance.</li>
                <li><strong>Expand Globally:</strong> Seamlessly access new markets with reliable cross-border logistics.</li>
              </ul>

              <div class="cta text-center mt-4">
                <h5>Partner with Us for Freight Forwarding Success</h5>
                <p>Experience hassle-free logistics with our expert freight forwarding services. From booking to delivery, we manage it all with precision and care.</p>
                <a class="btn btn-primary" href="contact-us">Get a Quote</a>
              </div>
            </div>
          </div>
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