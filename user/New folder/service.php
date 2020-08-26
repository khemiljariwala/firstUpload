<!DOCTYPE html>
<html lang="en">

	
<!-- Mirrored from jthemes.org/html/harmony-event/service.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Feb 2020 06:30:50 GMT -->
<head>
		<?php

		
		require('conn.php');

	    ?>	

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<style>
			#more {display: none;}
		</style>
		<title>Harmoni - Service</title>
		<link rel="shortcut icon" href="assets/images/favicon.png">

		<!-- fraimwork - css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

		<!-- icon css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.css">
		<link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

		<!-- carousel css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
		<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
		<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

		<!-- others css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
		<link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/calendar.css">

		<!-- color switcher css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/colors/style-switcher.css">
		<link id="color_theme" rel="stylesheet" type="text/css" href="assets/css/colors/default.css">

		<!-- custom css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		

	</head>


	<body class="default-header-p">




		
		<!-- backtotop - start -->
		<div id="thetop" class="thetop"></div>
		<div class='backtotop'>
			<a href="#thetop" class='scroll'>
				<i class="fas fa-angle-double-up"></i>
			</a>
		</div>
		<!-- backtotop - end -->

		<!-- preloader - start -->
		<div id="preloader"></div>
		<!-- preloader - end -->




		<!-- header-section - start
		================================================== -->
		
		<?php

			include "header-1.php";
			
		?>
		
		<!-- header-section - end
		================================================== -->





		<!-- altranative-header - start
		================================================== -->
		<div class="header-altranative">
			<div class="container">
				<div class="logo-area float-left">
					<a href="home.php">
						<img src="assets/images/1.site-logo.png" alt="logo_not_found">
					</a>
				</div>

				<button type="button" id="sidebarCollapse" class="alt-menu-btn float-right">
					<i class="fas fa-bars"></i>
				</button>
			</div>

			<!-- sidebar menu - start -->
			<div class="sidebar-menu-wrapper">
				<div id="sidebar" class="sidebar">
					<span id="sidebar-dismiss" class="sidebar-dismiss">
						<i class="fas fa-arrow-left"></i>
					</span>

					<div class="sidebar-header">
						<a href="#!">
							<img src="assets/images/2.site-logo.png" alt="logo_not_found">
						</a>
					</div>

					<!-- sidebar-form - start -->
					<div class="sidebar-form">
						<form action="#">
							<input id="altmenu-sidebar-search" type="search" placeholder="Search">
							<label for="altmenu-sidebar-search"><i class="fas fa-search"></i></label>
						</form>
					</div>
					<!-- sidebar-form - end -->

					<!-- main-pages-links - start -->
					
					<!-- main-pages-links - end -->

					<!-- other-pages-links - start -->
					
					<!-- other-pages-links - end -->

					<!-- inner-pages-links - start -->
					
					<!-- inner-pages-links - end -->

					<!-- login-btn-group - start -->
					
					<!-- login-btn-group - end -->

					<!-- social-links - start -->
					
					<!-- social-links - end -->

					<div class="overlay"></div>
				</div>
			</div>
			<!-- sidebar menu - end -->
		</div>
		<!-- altranative-header - end
		================================================== -->





		<!-- breadcrumb-section - start
		================================================== -->
		
		<!-- breadcrumb-section - end
		================================================== -->





		<!-- service-section - start
		================================================== -->
		<section id="service-section" class="service-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- service-wrapper - start -->
				<div class="service-wrapper">

					<!-- service-item - start -->
					<div class="service-item clearfix">
						<div class="service-image float-left">
							<div class="big-image">
								<img src="assets/images/service/1.image.png" alt="Image_not_found">
							</div>
							<div class="small-image">
								<img src="assets/images/service/1.1.image.png" alt="Image_not_found">
							</div>
						</div>
						<div class="service-content float-right">
							<div class="service-title mb-30">
								<h2 class="title-text"> <strong>Weddings</strong></h2>
								<span class="service-price">Every weddings should be perfect with BYE</span>
							</div>
							<p class="service-description black-color mb-30">
								Lorem ipsum dollor site amet the best  consectuer diam adipiscing elites sed diam nonummy<span id="dots">...</span><span id="more"> nibh the euismod tincidunt ut laoreet dolore magna aliquam erat volutpat insignia the consectuer adipiscing elit.</span> 
							</p><button style="color:red;" onclick="myFunction()" id="myBtn">Read more</button>

										<script>
										function myFunction() {
										  var dots = document.getElementById("dots");
										  var moreText = document.getElementById("more");
										  var btnText = document.getElementById("myBtn");

										  if (dots.style.display === "none") {
										    dots.style.display = "inline";
										    btnText.innerHTML = "Read more"; 
										    moreText.style.display = "none";
										  } else {
										    dots.style.display = "none";
										    btnText.innerHTML = "Read less"; 
										    moreText.style.display = "inline";
										  }
										}
										</script>
										<pre></pre>

							<div class="service-type-list mb-50 clearfix">
								<ul>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										website development
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										online store
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										office meeting
									</li>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										wedsite development
									</li>
									

								</ul>
							</div>
							
						</div>
					</div>
					<!-- service-item - end -->

					<!-- service-item - start -->
					<div class="service-item clearfix">
						<div class="service-image float-right">
							<div class="big-image">
								<img src="assets/images/service/2.image.png" alt="Image_not_found">
							</div>
							<div class="small-image">
								<img src="assets/images/service/2.2.image.png" alt="Image_not_found">
							</div>
						</div>
						<div class="service-content float-left">
							<div class="service-title mb-30">
								<h2 class="title-text">Festival <strong>Musical</strong></h2>
								<span class="service-price">price start from $52.00</span>
							</div>
							<p class="service-description black-color mb-30">
								Lorem ipsum dollor site amet the best  consectuer diam adipiscing elites sed diam nonummy nibh the euismod tincidunt ut laoreet dolore magna aliquam erat volutpat insignia the consectuer adipiscing elit. 
							</p>
							<div class="service-type-list mb-50 clearfix">
								<ul>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										traditional musical
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										personal consert
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										modern musical
									</li>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										traditional musical
									</li>
									

								</ul>
							</div>
							
						</div>
					</div>
					<!-- service-item - end -->

					<!-- service-item - start -->
					<div class="service-item clearfix">
						<div class="service-image float-left">
							<div class="big-image">
								<img src="assets/images/service/3.image.png" alt="Image_not_found">
							</div>
							<div class="small-image">
								<img src="assets/images/service/3.3.image.png" alt="Image_not_found">
							</div>
						</div>
						<div class="service-content float-right">
							<div class="service-title mb-30">
								<h2 class="title-text">Kid’s <strong>Play Ground & Party</strong></h2>
								<span class="service-price">price start from $52.00</span>
							</div>
							<p class="service-description black-color mb-30">
								Lorem ipsum dollor site amet the best  consectuer diam adipiscing elites sed diam nonummy nibh the euismod tincidunt ut laoreet dolore magna aliquam erat volutpat insignia the consectuer adipiscing elit. 
							</p>
							<div class="service-type-list mb-50 clearfix">
								<ul>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										wedsite development
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										online store
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										office meeting
									</li>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										wedsite development
									</li>
									

								</ul>
							</div>
							
						</div>
					</div>                 
					<!-- service-item - end -->

					<!-- service-item - start -->
					
				<!-- service-wrapper - end -->

			</div>
		</section>
		<!-- service-section - end
		================================================== -->





		<!-- special-offer-section - start
		================================================== -->
		
		<!-- special-offer-section - end
		================================================== -->





		<!-- google map - start
		================================================== -->
	
		<!-- google map - end
		================================================== -->





		<!-- default-footer-section - start
		================================================== -->
		
		<?php

			include "footer.php";

		?>

		<!-- default-footer-section - end
		================================================== -->










		<!-- fraimwork - jquery include -->
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- carousel jquery include -->
		<script src="assets/js/slick.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<!-- map jquery include -->
		<script src="assets/js/gmap3.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

		<!-- calendar jquery include -->
		<script src="assets/js/atc.min.js"></script>

		<!-- others jquery include -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/isotope.pkgd.min.js"></script>
		<script src="assets/js/jarallax.min.js"></script>
		<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- gallery img loaded - jqury include -->
		<script src="assets/js/imagesloaded.pkgd.min.js"></script>

		<!-- multy count down - jqury include -->
		<script src="assets/js/jquery.countdown.js"></script>

		<!-- color panal - jqury include -->
		<!-- <script src="assets/js/style-switcher.js"></script> -->

		<!-- custom jquery include -->
		<script src="assets/js/custom.js"></script>





	</body>

<!-- Mirrored from jthemes.org/html/harmony-event/service.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Feb 2020 06:31:37 GMT -->
</html>