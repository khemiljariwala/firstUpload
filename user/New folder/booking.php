<!DOCTYPE html>
<html lang="en">
<head>

	<?php

		session_start();

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
  		{

	?>

	<?php

		require 'conn.php';

	?>

	<?php
		$qryfav = "SELECT * FROM website_details WHERE website_id = 0";
		$qfav = mysqli_query($conn, $qryfav);
		$rowfav = mysqli_fetch_array($qfav);
	?>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Harmoni - Booking Event</title>
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





		<!-- booking-timeout-section - start
		================================================== -->
		
		<!-- booking-timeout-section - end
		================================================== -->





		<!-- booking-section - start
		================================================== -->
		<section id="booking-section" class="booking-section bg-gray-light sec-ptb-100 clearfix">
			<div class="container">
				<div class="row">

					<!-- booking-content-wrapper - start -->
					<div class="col-lg-8 col-md-12 col-sm-12">
						<div class="booking-content-wrapper">

							<!-- order-summary - start -->
							<div class="order-summary mb-50">
								<!-- section-title - start -->
								<div class="section-title mb-30">
									<h2 class="big-title">order <strong>summary</strong></h2>
								</div>
								<!-- section-title - end -->
								<div class="order-summary-table table-responsive">

									<table class="table text-center">
										<thead>
											<tr>
												<th scope="col">ticket type</th>
												<th scope="col">price</th>
												<th scope="col">fee</th>
												<th scope="col">quantity</th>
												<th scope="col">subtotal</th>
											</tr>
										</thead>
										<tbody>
											<tr class="bg-gray-light">
												<th scope="row">Harmoni Package 1</th>
												<td>$120.00</td>
												<td>$5.00</td>
												<td><input type="text" value="5"></td>
												<td>$675.00</td>
											</tr>
											<tr>
												<th scope="row">Harmoni Package 2</th>
												<td>$120.00</td>
												<td>$5.00</td>
												<td><input type="text" value="5"></td>
												<td>$675.00</td>
											</tr>
											<tr class="tfooter">
												<th colspan="4" class="text-left">order total</th>
												<td>$2,575.00</td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>
							<!-- order-summary - end -->



							<!-- reg-info - start -->
							<div class="reg-info mb-50">

								<!-- section-title - start -->
								<div class="section-title mb-30">
									<h2 class="big-title">registration <strong>information</strong></h2>
								</div>
								<!-- section-title - end -->

								<!-- row - start -->
								<div class="row">

									<!-- ticket-buying-form - start -->
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="ticket-buying-form form-wrapper">
											<h3 class="form-title">ticket buyer</h3>

											<form action="#">
												<div class="form-item">
													<input type="text" placeholder="First Name">
												</div>
												<div class="form-item">
													<input type="text" placeholder="Last Name">
												</div>
												<div class="form-item">
													<input type="email" placeholder="Email Address">
												</div>
												<div class="form-item">
													<input type="email" placeholder="Confirm Email Address">
												</div>
											</form>

										</div>
									</div>
									<!-- ticket-buying-form - end -->

									<!-- payment-form - start -->
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="payment-form form-wrapper">
											<h3 class="form-title">payment</h3>

											<form action="#">
												<div class="form-item">
													<select class="cradit-card-select">
														<option selected="">Select Credit Card</option>
														<option>option 1</option>
														<option>option 2</option>
														<option>option 3</option>
														<option>option 4</option>
														<option>option 5</option>
													</select>
												</div>
												<div class="form-item">
													<input type="text" placeholder="Card Numbers">
												</div>

												<div class="expired-date-form">
													<h3 class="title-text">expired date</h3>
													<ul>

														<li>
															<div class="form-item">
																<select class="month-select">
																	<option selected="">Month</option>
																	<option>option 1</option>
																	<option>option 2</option>
																	<option>option 3</option>
																	<option>option 4</option>
																	<option>option 5</option>
																</select>
															</div>
														</li>

														<li>
															<div class="form-item">
																<select class="year-select">
																	<option selected="">Year</option>
																	<option>option 1</option>
																	<option>option 2</option>
																	<option>option 3</option>
																	<option>option 4</option>
																	<option>option 5</option>
																</select>
															</div>
														</li>

														<li>
															<div class="form-item">
																<input type="text" placeholder="CSC">
															</div>
														</li>

													</ul>
												</div>
											</form>
										</div>
									</div>
									<!-- payment-form - end -->

								</div>
								<!-- row - end -->

							</div>
							<!-- reg-info - end -->



							<!-- billing-info - start -->
							<div class="billing-info mb-50">

								<!-- section-title - start -->
								<div class="section-title mb-30">
									<h2 class="big-title">billing <strong>information</strong></h2>
								</div>
								<!-- section-title - end -->

								<!-- billing-form - start -->
								<div class="billing-form form-wrapper">
									<form action="#">

										<div class="form-item">
											<select class="country-select">
												<option selected="">Select Country</option>
												<option>option 1</option>
												<option>option 2</option>
												<option>option 3</option>
												<option>option 4</option>
												<option>option 5</option>
											</select>
										</div>
										<div class="form-item">
											<input type="text" placeholder="Address">
										</div>
										<div class="form-item">
											<input type="text" placeholder="Altranative Address">
										</div>

										<!-- form-item-group - start -->
										<div class="form-item-group mb-50">
											<ul>

												<li>
													<div class="form-item">
														<input type="text" placeholder="City">
													</div>
												</li>
												<li>
													<div class="form-item">
														<select class="country-select">
															<option selected="">States</option>
															<option>option 1</option>
															<option>option 2</option>
															<option>option 3</option>
															<option>option 4</option>
															<option>option 5</option>
														</select>
													</div>
												</li>
												<li>
													<div class="form-item">
														<input type="text" placeholder="Zip Code">
													</div>
												</li>
												
											</ul>
										</div>
										<!-- form-item-group - end -->

										<div class="text-center">
											<button type="submit" class="custom-btn">
												pay now
											</button>
										</div>

									</form>
								</div>
								<!-- billing-form - end -->

							</div>
							<!-- billing-info - end -->
							
						</div>
					</div>
					<!-- booking-content-wrapper - end -->

					<!-- sidebar-section - start -->
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="sidebar-section">

							<!-- section-title - start -->
							<div class="section-title mb-30">
								<h2 class="big-title">ticket <strong>info</strong></h2>
							</div>
							<!-- section-title - end -->

							<!-- location-wrapper - start -->
							<div class="location-wrapper bg-white">

								<div class="title-wrapper">
									<small class="up-arrow-icon">
										<i class="fas fa-chevron-circle-up"></i>
									</small>
									<span class="icon">
										<i class="fas fa-map-marker-alt"></i>
									</span>
									<div class="title-content">
										<small>event location</small>
										<h3>vanila hotel</h3>
									</div>
								</div>
								<div class="location-info-list ul-li-block clearfix">
									<span class="area-name">Istanbul Turkey</span>
									<ul>
										<li><i class="fas fa-arrow-circle-right"></i> Bayezid II Mosque and Beyazid Square</li>
										<li><i class="fas fa-arrow-circle-right"></i> Istanbul, IS 240012</li>
										<li><i class="fas fa-arrow-circle-right"></i> Thursday, December 26, 2018</li>
										<li><i class="fas fa-arrow-circle-right"></i> From <strong>15.00 PM</strong> to <strong>20.00 PM</strong> (EST)</li>
									</ul>
								</div>
								<div class="button">
									<a href="#!" class="custom-btn">ADD TO MY CALENDAR</a>
								</div>
								<div class="title-wrapper">
									<small class="up-arrow-icon">
										<i class="fas fa-chevron-circle-up"></i>
									</small>
									<span class="icon">
										<i class="fas fa-link"></i>
									</span>
									<div class="title-content">
										<small>contact information</small>
										<h3>harmoni staff</h3>
									</div>
								</div>
								<div class="contact-links ul-li-block clearfix">
									<p class="black-color mb-30">
										Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant. Proin gravida nibh vel velit auctor aliquet. sollicitudin, lorem quis more...
									</p>
									<ul>
										<li>
											<a href="#!" target="_blank">
												<span class="icon">
													<i class="fab fa-facebook-f"></i>
												</span>
												facebook.com/harmoni
											</a>
										</li>
										<li>
											<a href="#!" target="_blank">
												<span class="icon">
													<i class="fab fa-twitter"></i>
												</span>
												twitter.com@harmoni
											</a>
										</li>
										<li>
											<a href="#!" target="_blank">
												<span class="icon">
													<i class="fas fa-link"></i>
												</span>
												http://www.harmoni.com
											</a>
										</li>
									</ul>
									<a href="#!" class="custom-btn">CONTACT US NOW</a>
								</div>
							</div>
							<!-- location-wrapper - end -->
							
						</div>
					</div>
					<!-- sidebar-section - end -->
					
				</div>
			</div>
		</section>
		<!-- booking-section - end
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
<?php
  }
  else
  {
    header('location: home.php');
  }

?>