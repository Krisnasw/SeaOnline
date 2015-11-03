<!--start footer-->
    <footer id="footer">
        
        <!--start container-->
        <div class="container clearfix">
        
            <div class="grid_4 gridfooter">
                <h3>SeaOnline</h3>
                <p>Membantu memberikan Informasi - Informasi serta Buku - Buku Terbaru yang di peroleh dari SEAMEO SEAMOLEC secara Online dan mudah di akses di <i>seaonline.seamolec.org</i></p>   
            </div>
    
            <div class="grid_4 gridfooter">
                <h3>Kontak</h3>
                 
                <p>Address: Kompleks Universitas Terbuka Jl. Cabe Raya, Pondok Cabe Pamulang - 15418 Tangerang Selatan, Indonesia
                <br />Phone: (62-21) 7423725<br />Mail: secretariat@seamolec.org</p>
                <p class="socialfooter"><a href="#"><img alt="" src="Includes/images/footer/facebook.jpg" />
                </a><a href="#"><img alt="" src="Includes/images/footer/dribble.jpg" />
                </a><a href="#"><img alt="" src="Includes/images/footer/twitter.jpg" /></a><a href="#">
                <img alt="" src="Includes/images/footer/google.jpg" /></a></p>  
            </div>
    
            <div class="grid_4 gridfooter">
                <h3>TWEET</h3>
                
				<div id="tweets">
					<a class="twitter-timeline" href="https://twitter.com/seamolec" data-widget-id="624704591397978112">Tweets by @seamolec</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>

            </div>
            
        </div>
        <!--end container--> 
        
    </footer>
    <!--end footer-->
	<!--start copyright-->
    <section id="copyright">
        
        <!--start container-->
        <div class="container">
        
            <div class="grid_12">
                <p>© Copyright 2015 by Christiawan Eko Saputro - All Rights Reserved SEAMEO SEAMOLEC</p>   
            </div>
    
        </div>
        <!--end container-->
        
    </section>
    <!--end copyright-->

	<!--Start js-->    
    <script src="includes/js/jquery.min.js"></script> <!--Jquery-->
    <script src="includes/js/jquery-ui.js"></script> <!--Jquery UI-->
    <script src="includes/js/excanvas.js"></script> <!--canvas need for ie-->
    <script src="includes/rs-plugin/js/jquery.themepunch.plugins.min.js"></script> <!--rev slider-->
    <script src="includes/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> <!--rev slider-->
    <script src="includes/js/scroolto.js"></script> <!--Scrool To-->
    <script src="includes/js/jquery.nicescroll.min.js"></script> <!--Nice Scroll-->
    <script src="includes/js/jquery.inview.min.js"></script> <!--inview-->
	<script src="includes/js/menu/hoverIntent.js"></script> <!--superfish-->
	<script src="includes/js/menu/superfish.min.js"></script> <!--superfish-->
    <script src="includes/js/menu/tinynav.min.js"></script> <!--tinynav-->
	<script src="includes/js/twitter/jquery.twitterfeed.min.js"></script> <!--twitter-->
    <script src="includes/js/settings.js"></script> <!--settings-->
    <!--End js-->
    
    <script type="text/javascript" src="includes/showbizpro/js/jquery.themepunch.plugins.min.js"></script> <!--showbiz-->						
	<script type="text/javascript" src="includes/showbizpro/js/jquery.themepunch.showbizpro.min.js"></script> <!--showbiz-->
    <script src="includes/js/jquery.easy-pie-chart.js"></script> <!--Chart-->
    <script src="includes/js/fancybox/jquery.fancybox.js"></script> <!--main fancybox-->
    <script src="includes/js/fancybox/jquery.fancybox-thumbs.js"></script> <!--fancybox thumbs-->

	
	<script type='text/javascript'>
		/* <![CDATA[ */
		//start revolution slider
		var revapis;

		jQuery(document).ready(function() {

			revapis = jQuery('.tp-banner-full-screen').revolution(
			{
				delay:9000,
					startwidth:1170,
					startheight:650,
					hideThumbs:10,
					navigationType:"none",
					fullWidth:"on",
					forceFullWidth:"on"


			});

		});	//ready
		//end revolution slider

		
		/* ]]> */
	</script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		
		
		//start carousel
		jQuery(document).ready(function() {

			jQuery('.showbiz-container').showbizpro({
				dragAndScroll:"on",
				visibleElementsArray:[4,3,2,1]
			});
		   
		});
		
		//start chart
		$(document).ready(function(){
						
			$('.percentagehome').easyPieChart({
				size: 140,
				rotate: 0,
				lineWidth: 10,
				animate: 1000,
				barColor: '#55738F',
				trackColor: 'transparent',
				scaleColor: false,
				lineCap: 'butt',
			});

		});
		//end chart
		
		//start tour
		$(document).ready(function(){

			var qnthometour = $('.hometour').length;
			
			
			setInterval(function(){
				
				i=0;
				
				while ( i < qnthometour ){

					//title and img hometours height
					var titleimghometourheight = $(".hometour-"+i+" .titleimghometour").height();
					var datedayhometourheight = $(".hometour-"+i+" .datedayhometour").height();
			
					$(".hometour-"+i+" .descriptionhometour").css({
					  "height": titleimghometourheight - datedayhometourheight
					});	
	
					//tabshometourheight
					var tabshometourheight = $(".hometour-"+i+" .tabshometour").height();
					var footerhometourheight = $(".hometour-"+i+" .footerhometour").height();
			
					$(".hometour-"+i+" .listhometour").css({
					  "height": tabshometourheight - footerhometourheight
					});
					
					i++;	
				}
			
			}, 0);
			
		});
		//end tour
		
		
		//start tab and tooltip
		$(document).ready(function() {
			$(".hometabs").tabs();
			$( ".hometabs, .tooltip" ).tooltip({ position: { my: "top+0 top-75", at: "center center" } });
		});
		//end tab and tooltip
		
		
		//start scroll
		$(document).ready(function() {
			//description hometour
			$(".descriptionhometour").niceScroll({
				touchbehavior:false,
				cursorcolor:"#EBEEF2",
				cursoropacitymax:0.9,
				cursorwidth:3,
				autohidemode:true,
				cursorborder:"0px solid #2848BE",
				cursorborderradius:"0px"
				
			});
			
			//list home tour
			$(".listhometour, .listarchivedestination").niceScroll({
				touchbehavior:true,
				cursorcolor:"#EBEEF2",
				cursoropacitymax:0.9,
				cursorwidth:3,
				autohidemode:true,
				cursorborder:"0px solid #2848BE",
				cursorborderradius:"0px"
				
			});
		});
		//end scroll
		
		
		//start fancybox
		$(document).ready(function(){
						
			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
			
		});
		//end fancybox
		

		//end map
		/* ]]> */
	</script>
    
	<script>
//   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//   })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

//   ga('create', 'UA-36678297-3', 'newgraphicses.it');
//   ga('send', 'pageview');

	</script>

	
	</body>  
</html>