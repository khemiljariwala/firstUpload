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

		<title>BookYourEvents - Gallery</title>
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
		
		<!-- altranative-header - end
		================================================== -->





		<!-- breadcrumb-section - start
		================================================== -->
		
		<!-- breadcrumb-section - end
		================================================== -->

		<?php 

			$qry_gallery = "SELECT * FROM gallery ORDER BY gallery_id DESC";

			$q_gallery = mysqli_query($conn, $qry_gallery); 
		?>



		<!-- event-gallery-section - start
		================================================== -->
		<section id="event-gallery-section" class="event-gallery-section sec-ptb-100 clearfix">
			<div class="container">

				<div class="button-group filters-button-group mb-30">
					<button class="button is-checked" data-filter="*">
						<i class="fas fa-star"></i>
						<strong>all</strong> gallery
					</button>
					<button class="button" data-filter=".photo-gallery">
						<i class="far fa-image"></i>
						<strong>photo</strong> gallery
					</button>
					<button class="button" data-filter=".video-gallery">
						<i class="fas fa-play-circle"></i>
						<strong>video</strong> gallery
					</button>
				</div>

				<div class="grid zoom-gallery clearfix mb-80" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">
					<?php 
						while($row_gallery = mysqli_fetch_array($q_gallery))
						{
							if ($row_gallery['gallery_video'] =='')
							{
					?>
							<div class="grid-item photo-gallery " data-category="photo-gallery">
								<a class="popup-link" href="../user/gallery_thumbnail/<?php echo $row_gallery['gallery_pic']; ?>">
								<img src="../user/gallery_thumbnail/<?php echo $row_gallery['gallery_pic']; ?>" alt="Image_not_found">
								</a>
									<div class="item-content">
									<h3> <?php echo $row_gallery['gallery_title']; ?></h3>
									<span><?php echo $row_gallery['gallery_subtitle']; ?>, <?php echo $row_gallery['gallery_date']; ?></span>
									</div>
							</div>
					<?php
							}
							else
							{
					?>
							<div class="grid-item video-gallery " data-category="video-gallery">
								<a class="popup-youtube" href="https://youtu.be/nSDgHBxUbVQ">
								<img src="../user/gallery_thumbnail/<?php echo $row_gallery['gallery_pic']; ?>" alt="Image_not_found">
								</a>
									<div class="item-content">
									<h3> <?php echo $row_gallery['gallery_title']; ?></h3>
									<span><?php echo $row_gallery['gallery_subtitle']; ?>, <?php echo $row_gallery['gallery_date']; ?></span>
									</div>
								</div>
					<?php
							}
					}
					?>
			</div>

			</div>
		</section>
		<!-- event-gallery-section - end
		================================================== -->





		<!-- special-offer-section - start
		================================================== -->
		

					<!-- special-offer-content - start -->
				
					<!-- special-offer-content - end -->

					<!-- event-makeing-btn - start -->
					
					<!-- event-makeing-btn - end -->

				
		<!-- special-offer-section - end
		================================================== -->



		<style>
			
			.map  {
				position: relative;
				padding-bottom: 400px;
				padding-top: 0px;
				height: 0;
				overflow: hidden;
				}
			.map iframe {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 400px;
				}


		</style>





		<!-- google map - start
		================================================== -->
		<section id="map-section" class="map-section clearfix">	

			<div class="map">
				
				<?php

					$qrymap = "SELECT * FROM website_details WHERE website_id = 0";

        			$qmap = mysqli_query($conn, $qrymap);

        			$rowmap = mysqli_fetch_array($qmap);

				?>
				<?php echo $rowmap['map']; ?>

			</div>
				
		</section>
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

<!-- Mirrored from jthemes.org/html/harmony-event/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Feb 2020 06:29:35 GMT -->
</html>