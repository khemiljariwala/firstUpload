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

	<title>BookYourEvents - Blogs</title>
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

<pre>
	
</pre>





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


		<!-- blog-section - start
			================================================== -->
			<section id="blog-section" class="blog-section sec-ptb-100 clearfix">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
							<!-- blog-wrapper - start -->
							<div class="blog-wrapper">
								
									<!-- grid-layout - start -->
									
									<!-- grid-layout - end -->

									<!-- list-layout - start -->
									
									<!-- list-layout - end -->

									<!-- big-layout - start -->

									<?php 

										$qry = "SELECT * FROM blog ORDER BY blog_id DESC";

										$q = mysqli_query($conn, $qry);

                        				while ($row = mysqli_fetch_array($q))
                       					{ 
									?>
									

										<!-- blog-big-item - start -->
										<div class="blog-big-item clearfix">

											<div class="blog-image">
												<img src="../user/blog_thumbnail/<?php echo $row['blog_pic']; ?>" alt="Image_not_found">
												<div class="event-date">
													<?php echo $row['blog_date']; ?>
												</div>
											</div>

											<div class="blog-content">
												<a href="#!" class="tag">
													Our Client: <?php echo $row['user_name']; ?>
												</a>
												<h4 class="blog-title"><?php echo $row['blog_title']; ?></h4>

												<p class="mb-15">
													
												    <p class="addReadMore showlesscontent">
														<?php echo $row['blog_description']; ?>
												    </p>
												</p>
											</div>

										</div>


											<?php
                        						}
                        					?>
										<!-- blog-big-item - end -->



										<!-- blog-big-item - start -->
										
										<!-- blog-big-item - end -->

										<!-- blog-big-item - start -->
										
										<!-- blog-big-item - end -->

										<!-- blog-big-item - start -->
										
										<!-- blog-big-item - end -->

										<!-- blog-big-item - start -->
										
										<!-- blog-big-item - end -->

										<!-- pagination - start -->
										
										<!-- pagination - end -->
									
									<!-- big-layout - end -->

								
							</div>
							<!-- blog-wrapper - end -->
						</div>







						<!-- sidebar-section - start -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="sidebar-section">

								
								

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
		<!-- blog-section - end
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