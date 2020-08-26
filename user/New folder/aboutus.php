<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

		<?php 

			require 'conn.php' ;

		?>

		<?php

			$qryfav = "SELECT * FROM website_details WHERE website_id = 0";
			$qfav = mysqli_query($conn, $qryfav);
			$rowfav = mysqli_fetch_array($qfav);

		?>	


		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>BookYourEvents - About Us</title>
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
					<div class="overlay"></div>
				</div>
			</div>
			<!-- sidebar menu - end -->
		</div>
		<!-- altranative-header - end
		================================================== -->

		<?php

        	$qry1 = "SELECT * FROM about_us";


        	$q1 = mysqli_query($conn, $qry1);


         ?>


		<!-- service-section - start
		================================================== -->

		<section id="service-section" class="service-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- service-wrapper - start -->
				<div class="service-wrapper">
					<?php
                        while ($row = mysqli_fetch_array($q1))
                    { ?>
					<!-- service-item - start -->
					<div class="service-item clearfix">
						<div class="service-image float-left">
							<div class="big-image">
								<img src="aboutus_thumbnail/<?php echo $row['img_1']; ?>" alt="Image_not_found">
							</div>
							<div class="small-image">
								<img src="aboutus_thumbnail/<?php echo $row['img_2']; ?>" alt="Image_not_found">
							</div>
						</div>
						<div class="service-content float-right">
							<div class="service-title mb-30">
								<h2 class="title-text"><strong><?php echo $row['title']; ?></strong></h2>
								<span class="service-price"><?php echo $row['price']; ?></span>
							</div>
							<p class="service-description black-color mb-30">
								<?php echo $row['description']; ?>
							</p>
							<div class="service-type-list mb-50 clearfix">
								<ul>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										<?php echo $row['list_1']; ?>
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										<?php echo $row['list_2']; ?>
									</li>
									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										<?php echo $row['list_3']; ?>
									</li>

									<li>
										<span class="icon">
											<i class="fas fa-arrow-circle-right"></i>
										</span>
										<?php echo $row['list_4']; ?>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<?php
                        }
                    ?>
					
					<!-- service-item - end -->


					<!-- service-item - start -->
					
					
					<!-- service-item - end -->

					

					<!-- service-item - start -->
					
					
					
					<!-- service-item - end -->

					<!-- service-item - start -->
					
					<!-- service-item - end -->

				</div>
				<!-- service-wrapper - end -->

			</div>
		</section>

		<!-- service-section - end
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