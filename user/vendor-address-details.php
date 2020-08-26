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

	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		#more {display: none;}
		</style>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>BookYourEvents - Address</title>
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


		<script src="assets/jquery.min.js"></script>
		<script>

    	function AddReadMore()
    	{
        	//This limit you can set after how much characters you want to show Read More.
        	var carLmt = 180;
        	// Text to show when text is collapsed
        	var readMoreTxt = " ... Read More";
        	// Text to show when text is expanded
        	var readLessTxt = " Read Less";


        	//Traverse all selectors with this class and manupulate HTML part to show Read More
        	$(".addReadMore").each(function()
        	{
            	if ($(this).find(".firstSec").length)
            	{
            		return;
            	}
                

            	var allstr = $(this).text();

            	if (allstr.length > carLmt)
            	{
                	var firstSet = allstr.substring(0, carLmt);
                	var secdHalf = allstr.substring(carLmt, allstr.length);
                	var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
                	$(this).html(strtoadd);
            	}

        	});

        	//Read More and Read Less Click Event binding
        	$(document).on("click", ".readMore,.readLess", function()
        	{
            	$(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
        	});
    	}

    	$(function()
    	{
        	//Calling function after Page Load
        	AddReadMore();
    	});

    	</script>

    	<style>

    	.addReadMore.showlesscontent .SecSec,
    	.addReadMore.showlesscontent .readLess
    	{
        	display: none;
    	}

    	.addReadMore.showmorecontent .readMore
    	{
        	display: none;
    	}

    	.addReadMore .readMore,
    	.addReadMore .readLess
    	{
        	font-weight: bold;
        	margin-left: 2px;
        	color: red;
        	cursor: pointer;
    	}

    	.addReadMoreWrapTxt.showmorecontent .SecSec,
    	.addReadMoreWrapTxt.showmorecontent .readLess
    	{
        	display: block;
    	}

    </style>
		

	</head>
	<body>

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


		<?php 

			$qry = "SELECT * FROM vendor_detail INNER JOIN vendor_master ON vendor_detail.vendor_id = vendor_master.vendor_id WHERE vendor_is_active = 1 AND vendor_detail_id =".$_GET['vendor_detail_id'];

			$q = mysqli_query($conn, $qry);

			$row = mysqli_fetch_array($q);
                       					
		 ?>

		 <?php

		 	$qry_images = "SELECT * FROM vendor_gallery WHERE vendor_detail_id =".$_GET['vendor_detail_id'];

		 	$q_images = mysqli_query($conn, $qry_images);

		 	$row_images = mysqli_fetch_array($q_images);

		 ?>




		<!-- event-details-section - start
		================================================== -->
		<section id="event-details-section" class="event-details-section sec-ptb-100 clearfix">
			<div class="container">
				<div class="row">

					<!-- col - event-details - start -->
					<div class="col-lg-8 col-md-12 col-sm-12">

					<!-- event-details - start -->
						<div class="event-details mb-80">

							<div class="event-title mb-30">
								<pre>
									
								</pre>
								<h2 class="event-title">Book Your <strong>Vendor</strong></h2>
							</div>

							<div id="event-details-carousel" class="event-details-carousel owl-carousel owl-theme">

								<?php

									if (!empty($row_images['vendor_images']))
                                	{

                                		$image = $row_images['vendor_images'];
                                		$image_list = explode(',',$image);

                                		for($i=0;$i<count($image_list)-1;$i++)
                                		{
                                	
                                	                            
                                ?>

                                    <div class="item">
                                        
                                        <img src="../vendor/vendor_gallery/<?php echo $image_list[$i]; ?>" alt="Image_not_found">
                                        
                                    </div>

                                <?php

                                		}

                                	}
                                	else
                                	{

                                ?>
                                		<div class="item">
                                        
                                        	<img src="../vendor/vendor_gallery/novendorphoto.jpg" alt="Image_not_found">
                                        
                                    	</div>
                                <?php
                                	}

                                ?>

							</div>

							
							
							<div class="section-title text-left mb-30">
								<h2 class="big-title">About <?php echo $row['vendor_name']; ?></h2>
							</div>
							<p class="black-color mb-30">
								<p class="addReadMore showlesscontent">
									<?php echo $row['vendor_description']; ?>
								</p>
							</p>

								
						</div>
						<!-- event-details - end -->

						<!-- event-schedule - start -->
						<div class="event-schedule mb-80">

							<!-- schedule-wrapper - start -->
							<div class="schedule-wrapper">
								

								<div class="tab-content">
									<!-- day 1 - start -->
									<div id="day1" class="tab-pane fade in active show">
										<ul class="nav hotal-menu">
											<li><a  href="vendor-overview-details.php?vendor_detail_id=<?php echo $row['vendor_detail_id']?>"><i class="fas fa-arrow-circle-right"></i> Overview</a></li>
											<li><a  class="active" data-toggle="tab" href="vendor-address-details.php?vendor_detail_id=<?php echo $row['vendor_detail_id']?>"><i class="fas fa-arrow-circle-right"></i> Address</a></li>
											<li><a  href="vendor-price-details.php?vendor_detail_id=<?php echo $row['vendor_detail_id']?>"><i class="fas fa-arrow-circle-right"></i> Price</a></li>
											<li><a  href="vendor-review-details.php?vendor_detail_id=<?php echo $row['vendor_detail_id']?>"><i class="fas fa-arrow-circle-right"></i> Review</a></li>
										</ul>
										<div class="tab-content">
											<div id="overview" class="tab-pane fade">
												
											</div>



											<!-- overview start-->
											<div id="day1hall2" class="tab-pane fade in active show">
												<div class="hall-item clearfix">
													<div class="hall-content">
														<h3 class="event-title title-large mb-15">Address </h3>

													   
														<div class="event-info-list ul-li clearfix">
															<ul>
																<li>
																	<span class="icon">
																		<i class="fas fa-map-marker-alt"></i>
																	</span>
																	<div class="event-content">
																		<small class="event-title">Vendor Location</small>
																		<h3 class="event-date"><?php echo $row['vendor_address']; ?></h3>
																	</div>
																</li>
																<br>
																<pre> </pre>
																<li>
																	<span class="icon">
																		<i class="fas fa-phone"></i>
																	</span>
																	<div class="event-content">
																		<small class="event-title">Phone Number</small>
																		<h3 class="event-date"><?php echo $row['vendor_mob']; ?></h3>
																	</div>
																</li>
																<br>
																<pre> </pre>
																<li>
																	<span class="icon">
																		<i class="fas fa-envelope"></i>
																	</span>
																	<div class="event-content">
																		<small class="event-title">Email</small>
																		<h3 class="event-date"><?php echo $row['vendor_email']; ?></h3>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<!--Overview end --->

										
										</div>
									</div>
									<!-- day 1 - end -->

									<!-- day 2 - start -->
								
									<!-- day 2 - end -->

									<!-- day 3 - start -->
									
									<!-- day 3 - end -->
								</div>
							</div>
							<!-- schedule-wrapper - end -->

						</div>
						<!-- event-schedule - end -->	


				</div>
			
			
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


				<!-- sidebar-section - start -->

					<div class="col-lg-4 col-md-12 col-sm-12">
						<pre>     </pre>
						<pre>     </pre>
						<div class="sidebar-section">

							<!-- Add to Calendar - start -->
							
							<!-- Add to Calendar - end -->

							<!-- map-wrapper - start -->
							
								<div class="map-wrapper mb-30">

								<!-- section-title - start -->
								<div class="section-title mb-30">
									<h2 class="big-title">event <strong>location</strong></h2>
								</div>
								<!-- section-title - end -->

								<div class="map">
									<?php echo $row['vendor_map_location']; ?>
								</div>

							</div>

							<!-- map-wrapper - end -->

							<!-- location-wrapper - start -->
							<pre>        </pre>

							<div class="location-wrapper mb-30">
								<div class="title-wrapper">

									<?php 

										$qry_web_details = "SELECT * FROM website_details WHERE website_id = 0";

										$q_web_details = mysqli_query($conn, $qry_web_details);

										$row_web_details = mysqli_fetch_array($q_web_details);
                       					
									?>
									
									<span class="icon">
										<i class="fas fa-link"></i>
									</span>
									<div class="title-content">
										<small>Contact Information</small>
										<h3>Book Your Events</h3>
									</div>
								</div>
								<div class="contact-links ul-li-block clearfix">
									<p class="black-color mb-30">
										We touch people mostly without touching them: We touch them with our words, with our smile, with our eyes, with our courage, with our madness, with millions of different ways! What are we? We are contacting beings without contacting...
									</p>
									<ul>
										<li>
											<a href="<?php echo $row_web_details['facebook']; ?>" target="_blank">
												<span class="icon">
													<i class="fab fa-facebook-f"></i>
												</span>
												facebook.com
											</a>
										</li>
										<li>
											<a href="<?php echo $row_web_details['instagram']; ?>" target="_blank">
												<span class="icon">
													<i class="fab fa-instagram"></i>
												</span>
												instagram.com
											</a>
										</li>
										<li>
											<a href="<?php echo $row_web_details['email_id']; ?>" target="_blank">
												<span class="icon">
													<i class="fas fa-envelope"></i>
												</span>
												mail
											</a>
										</li>
									</ul>
									<a href="contact.php" class="custom-btn">CONTACT US NOW</a>
								</div>
							</div>
							<!-- location-wrapper - end -->

							<!-- faq-wrapper - start -->

							<div class="faq-wrapper mb-30">
									<!-- section-title - start -->
									<div class="section-title mb-30">
										<h2 class="big-title">General <strong>information</strong></h2>
									</div>
									<!-- section-title - end -->
									<div id="faq-accordion" class="faq-accordion">
										<div class="card">
											<div class="card-header" id="headingone">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
													Why to choose Book Your Events?
												</button>
											</div>
											<div id="collapseone" class="collapse show" aria-labelledby="headingone" data-parent="#faq-accordion">
												<div class="card-body">
													Our team ensures that all the services are delivered as committed services are delivered as committed.<br>
												    No need to run around for your any services.<br>
												    Book our trusted vendors and venues under one roof.<br>
												    We guarantee our prices for venues are reasonable.
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingtwo">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">
													How Book Your Events works?
												</button>
											</div>
											<div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#faq-accordion">
												<div class="card-body">
													Input your requirements & see our recommendations & prices.<br>
													Visit venues on your own or with our venue expert.<br>
													Get final quotes and book your venue.<br>
													Meet our trusted vendors and book them at your ease.
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingthree">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
													How to become our client?
												</button>
											</div>
											<div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#faq-accordion">
												<div class="card-body">
													Do registered yourself with some important instructions.<br>
													Then get login to our website then, choose your favourite venues and vendors.<br>
												 	<strong>None of your personal details are leaked.</strong>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingfour">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
													How to make a new event?
												</button>
											</div>
											<div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#faq-accordion">
												<div class="card-body">
													To make a new event make sure that you are registered yourself then choose your
													venue and vendors for the event under one roof.
												</div>
											</div>
										</div>
									</div>
								</div>
							<!-- faq-wrapper - end -->

							<!-- spacial-event-wrapper - start -->
							
							<!-- spacial-event-wrapper - end -->
							
						</div>
					</div>
					<!-- sidebar-section - end -->

					</div>
		</div>
		</section>
		<!-- event-details-section - end
		================================================== -->









		<!-- footer-section2 - start
		================================================== -->

		<?php   

			include "footer.php";

		?>
		
		<!-- footer-section2 - end
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
