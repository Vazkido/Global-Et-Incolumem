  
  
     <footer class="footer footer-1">
        <div class="footer-top"> 
          <div class="container"> 
            <div class="row"> 
              <div class="col-12 col-lg-3 col-xl-4">
                <div class="footer-logo"><img class="footer-logo" src="logoblack.png" alt="logo"/></div>
              </div>
              <div class="col-12 col-lg-9 col-xl-8">
                <div class="widget-newsletter">
                  <div class="widget-content">
                    <p>Sign up for industry alerts,<br/>insights from Equita.</p>
                    <form class="form-newsletter mailchimp">
                      <input class="form-control" type="email" name="email" placeholder="Your Email Address"/>
                      <input class="btn btn--primary" type="submit" value="sign up!"/>
                      <div class="subscribe-alert"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-center">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-about">
                <div class="footer-widget-title">
                  <h5>about</h5>
                </div>
                <div class="widget-content">
                  <p>Global Et Incolumem is a leading logistics and distribution services company established in 2009. We offer a wide array of express courier and logistic support solutions to our various customers</p>
                  <!-- Start .module-social-->
                  <div class="module module-social"><a class="share-facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a class="share-instagram" href="javascript:void(0)"><i class="fab fa-instagram"></i></a><a class="share-twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i></a></div>
                  <!-- End .module-social-->
                </div>
              </div>
              <!--  End .col-lg-4 -->
              <div class="col-sm-6 col-md-6 col-lg-2 offset-lg-2 footer-widget widget-links">
                <div class="footer-widget-title">
                  <h5>services</h5>
                </div>
                <div class="widget-content">
                  <ul>
                      <li class="nav-item"><a href="international-freight"><span>International Freight</span></a></li>
                       <li class="nav-item"><a href="domestic-freight"><span>Domestic Freight</span></a></li>
                       <li class="nav-item"><a href="freight-forwarder"><span>Freight Forwarding</span></a></li>
                      <li class="nav-item"><a href="freight-consultation"><span>Consultation</span></a></li>
                  </ul>
                </div>
              </div>
              <!--  End .col-lg-2-->
              <div class="col-sm-6 col-md-6 col-lg-2 footer-widget widget-links">
                <div class="footer-widget-title">
                  <h5>Customs</h5>
                </div>
                <div class="widget-content">
                  <ul>
                    <li class="nav-item"><a href="export-import"><span>Export - Import</span></a></li>
                     <li class="nav-item"><a href="importers-logistics-rep"><span>Importer's Rep</span></a></li>
                  </ul>
                </div>
              </div>
              <!--  End .col-lg-2-->
              <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-contact">
                <div class="footer-widget-title">
                  <h5>quick contact</h5>
                </div>
                <div class="widget-content">
                  <p>If you have any questions or need help, feel free to contact with our team.</p>
                  <ul> 
                    <li class="phone"><a href="tel:+01061245741"><i class="fas fa-phone-alt"></i> 01061245741</a></li>
                    <li class="address"><a href="javascript:void(0)">2307 Beverley Rd Brooklyn, New York 11226 United States.</a></li>
                  </ul>
                </div>
              </div>
              <!--  End .col-lg-2-->
            </div>
            <div class="clearfix"></div>
          </div>
          <!--  End .container-->
        </div>
        <!--  End .footer-center-->
        <div class="footer-bottom">
          <div class="row">
            <div class="col-md-12 col-md-12 text--center footer-copyright">
              <div class="copyright"><span>&copy; Global Et Incolumem, With Love by</span><a href="https://1.envato.market/kP9BV"> Zytheme.com</a></div>
            </div>
          </div>
          <!--  End .row-->
        </div>
        <!--  End .footer-bottom-->
      </footer>
      <div class="backtop" id="back-to-top"><i class="fas fa-chevron-up"></i></div>
    </div>
  
  <!--  Footer Scripts==
    -->
    <script src="asset/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="asset/js/vendor.min.js"></script>
    <script src="asset/js/functions.js"></script>
  <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

<!-- Mirrored from demo.zytheme.com/equita/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 10:10:45 GMT -->
</html>