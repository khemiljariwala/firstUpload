<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<?php

		require 'conn.php' ;
	?>

	<?php
	
		$qryfav = "SELECT favicon FROM website_details WHERE website_id = 0";
		$qfav = mysqli_query($conn, $qryfav);
		$rowfav = mysqli_fetch_array($qfav);
		
	?>	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		<title>BookYourEvents - PrivacyPolicy</title>
		<link rel="shortcut icon" type="image/png" href="favicon_thumbnail/<?php echo $rowfav['favicon']; ?>" height = "16px" width = "16px">

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


	<body class="homepage4">




		
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

			include "header.php";

		?>

		<!-- header-section - end
		================================================== -->





		<!-- altranative-header - start
		================================================== -->
		<div class="header-altranative">
			<div class="container">
				<div class="logo-area float-left">
					<a href="index-1.html">
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





		<!-- slide-section - start
		================================================== -->
		<section id="main-carousel2" class="main-carousel2 clearfix">

			<div class="item" style="background-image: url(assets/images/slider/slider-bg.10.jpg);">
				<div class="overlay-black">
					<div class="container">
						<div class="row">

							<!-- slider-content - start -->
							<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="slider-content">
									<span class="date"></span>
									<h1 class="title-text">
										
									</h1>
									<strong class="bold-text">
										<pre>
										</pre>
									</strong>
									
								</div>
							</div>
							<!-- slider-content - end -->
							
						</div>
					</div>
				</div>
			</div>
		
		</section>
		<!-- slide-section - end
		================================================== -->





		<!-- our-management-section - start
		================================================== -->
		<section id="our-management-section" class="our-management-section bg-gray-light sec-ptb-100 clearfix">
			<div class="container">

				<div class="mb-80">
					<div class="row">

						<!-- section-title - start -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="section-title text-left mb-50">
								<small class="sub-title">we are BYE!!</small>
								<h2 class="big-title"><strong>No.1</strong> Events Management</h2>
							</div>
						</div>
						<!-- section-title - end -->

						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="row">

								<!-- management-item - start -->
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="management-item">
										<div class="item-title">
											<h3 class="title-text">
												our mission
											</h3>
										</div>
										<p class="black-color mb-30">
											Our team ensures that all the services are delivered as committed to ensure a hassle-free experience for you.
										</p>
										<p class="black-color m-0">
											<strong>
												<i>
													No need to run around for your wedding services - Book our trusted vendors under one roof.
												</i>	
											</strong>
										</p>
									</div>
								</div>
								<!-- management-item - end -->

								<!-- management-item - start -->
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="management-item">
										<div class="item-title">
											<h3 class="title-text">
												our vission
											</h3>
										</div>
										<p class="black-color mb-30">
											Surat's Largest Event Company.
											Find, Compare And Book occasion Venues And Services.
										</p>
										<p class="black-color m-0">
											<strong>
												<i>
													Best Prices Guaranteed.
													Find Inspiration, Ideas And Insights For Your events.
												</i>	
											</strong>
										</p>
									</div>
								</div>
								<!-- management-item - end -->

							</div>
						</div>

					</div>
				</div>

				

			</div>
		</section>
		<!-- our-management-section - end
		================================================== -->






		<!-- upcomming-event-section3 - start
		================================================== -->
		<section id="upcomming-event-section3" class="upcomming-event-section3 sec-ptb-100 clearfix">
			<div class="container">

				<!-- section-title - start -->
				<div class="section-title text-center mb-50">
					<small class="sub-title"></small>
					<h2 class="big-title"><strong>our services </strong> and Policies</h2>
					<p class="black-color m-0">
						This Privacy Policy is meant to help you understand what information we collect, why we collect it, and how you can update, manage, export, and delete your information.
					</p>
				</div>
				<!-- section-title - end -->

				<div class="comming-event-item">
					<div class="row justify-content-start">

						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="event-image">
								<div class="big-image">
									<img src="assets/images/event/event_6.jpg" alt="Image_not_found">
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="event-content">

								<!-- event-title - start -->
								<div class="event-title">
									<h3 class="title-text">How policy of BYE <strong>works</strong></h3>
								</div>
								<!-- event-title - end -->

								<p class="black-color mb-30">
									Book Your Events is committed to protecting user privacy and using our technology in the safest way. We understand that all users of our web site are quite rightly concerned to know that their data will not be used for any purpose unintended by them, and will not accidentally fall into the hands of a third party. Our policy is both specific and strict.
								</p>

								<div class="event-info-list ul-li-block mb-30">
									<ul>

										<li>
											<span class="icon">
												<i class="fas fa-arrow-circle-right"></i>
											</span>
											For booking and venues and vendors, 
											users have to register themselves.
										</li>
										<li>
											<span class="icon">
												<i class="fas fa-arrow-circle-right"></i>
											</span>
											User personal details are protected.
										</li>
										<li>
											<span class="icon">
												<i class="fas fa-arrow-circle-right"></i>
											</span>
											BYE follows generally accepted industry standards to protect the personally identifiable information submitted to us, both during transmission and once we receive it. 
										</li>

									</ul>
								</div>

							</div>
						</div>

					</div>
				</div>

			</div>
		</section>
		<!-- upcomming-event-section3 - end
		================================================== -->





		<!-- conference-section - start
		================================================== -->
		
		<!-- conference-section - end
		================================================== -->





		<!-- special-offer-section - start
		================================================== -->
		
		<!-- special-offer-section - end
		================================================== -->





		<!-- google map - start
		================================================== -->
		
		<!-- google map - end
		================================================== -->





		<!-- event-gallery-section - start
		================================================== -->
		
		<!-- event-gallery-section - end
		================================================== -->





		<!-- awesome-event-section - start
		================================================== -->
		
		<!-- awesome-event-section - end
		================================================== -->





		<!-- testimonial5-section - start
		================================================== -->
		
		<!-- testimonial5-section - end
		================================================== -->





		<!-- absolute-sponsor-section - start
		================================================== -->
		
		<!-- absolute-sponsor-section - end
		================================================== -->





		<!-- event-expertise-section - start
		================================================== -->
		
		<!-- event-expertise-section - end
		================================================== -->





		<!-- news-update-section - start
		================================================== -->
		
		<!-- news-update-section - end
		================================================== -->





		<!-- advertisement-section - start
		================================================== -->
		
		<!-- advertisement-section - end
		================================================== -->





		<!-- speaker-section - start
		================================================== -->
		
		<!-- speaker-section - end
		================================================== -->





		<!-- contact-section - start
		================================================== -->
		
		<!-- contact-section - end
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


</html>