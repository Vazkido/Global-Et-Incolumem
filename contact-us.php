 <?php require_once("inc/header.php");?>
   <title> Contact  - Global Et Incolumem </title>
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
                  <li class="breadcrumb-item"><a href="index">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">company</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact US</li>
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

      <!--
      ============================
      Contact Information Section
      ============================
      -->
      <section class="contact-info"> 
        <div class="container"> 
          <div class="row"> 
            <div class="col-12 col-lg-4">
              <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                  <div class="contact-details"> 
                    <h6>contact details</h6>
                    <ul class="list-unstyled info">
                      <li><span class="fas fa-map-marker-alt"></span><a href="javascript:void(0)">New York 11226 United States.</a></li>
                      <li><span class="fas fa-envelope"></span><a href="mailto::Equita@7oroof.com">Equita@7oroof.com</a></li>
                      <li><span class="fas fa-phone-alt"></span><a href="tel:01061245741">(002) 01061245741</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-12">
                  <div class="opening-hours"> 
                    <h6>opening hours</h6>
                    <ul class="list-unstyled"> 
                      <li> <span>Monday-friday</span><span>10:00 - 18:00</span></li>
                      <li> <span>saturday</span><span>10:00 - 14:00</span></li>
                      <li> <span>sunday</span><span>closed</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-8"> 
              <form class="contactForm" method="post" action="https://demo.zytheme.com/equita/assets/php/contact.php">
                <div class="row"> 
                  <div class="col-12 col-lg-4">
                    <input class="form-control" type="text" name="contact-name" placeholder="name" required=""/>
                  </div>
                  <div class="col-12 col-lg-4"> 
                    <input class="form-control" type="text" name="contact-email" placeholder="email" required=""/>
                  </div>
                  <div class="col-12 col-lg-4"> 
                    <input class="form-control" type="text" name="contact-website" placeholder="website" required=""/>
                  </div>
                  <div class="col-12"> 
                    <textarea class="form-control" name="contact-message" cols="30" rows="2" placeholder="message" required=""></textarea>
                  </div>
                  <div class="col-12">
                    <input class="btn btn--primary" type="submit" value="Submit"/>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
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