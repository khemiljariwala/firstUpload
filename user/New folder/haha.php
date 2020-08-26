<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

	
<head>

	<?php

		require 'conn.php';
		session_start();
	?>

	<?php
		$qryfav = "SELECT * FROM website_details WHERE website_id = 0";
		$qfav = mysqli_query($conn, $qryfav);
		$rowfav = mysqli_fetch_array($qfav);
	?>	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		<title>BookYourEvents - home</title>
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
    $(document).ready(function(){
      $('#ddvenuetype').on('change', function(){
        var venueID = $(this).val();
        if(venueID)
        {
          $.ajax({
            type:'POST',
            url: 'ajaxfillvenuelist.php',
            data: 'venue_id='+venueID,
            success: function(html)
            {
            	console.log(html);
              $('#ddvenuename').html(html);
            }
          	});
        }
        else
        {
          $('#ddvenuename').html('<option value="">Select Venue Type First</option>');
        }
      });

    });
  </script>


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

			include "header.php";

		?>


				<!-- header-section - end
		================================================== -->




		<!-- altranative-header - start
		================================================== -->
		<div class="header-altranative">
			

			<!-- sidebar menu - start -->
			<div class="sidebar-menu-wrapper">
				<div id="sidebar" class="sidebar">
					

					

					<!-- sidebar-form - start -->
					
					<!-- sidebar-form - end -->

					<!-- main-pages-links - start -->
					
					<!-- main-pages-links - end -->

					<!-- other-pages-links - start -->
					
					<!-- other-pages-links - end -->

					<!-- inner-pages-links - start -->
					
					<!-- inner-pages-links - end -->

					<!-- login-btn-group - start -->
					<div class="login-btn-group">
						
						<div>
								<div id="alt-register-modal" class="reglog-modal-wrapper register-modal mfp-hide clearfix" style="background-image: url(assets/images/login-modal-bg.jpg);">
									<div class="overlay-black clearfix">

										<!-- leftside-content - start -->
										<div class="leftside-content">
											<div class="site-logo-wrapper mb-80">
												<a href="#!" class="logo">
													<img src="logo_thumbnail/<?php echo $rowfav['logo_pic']; ?>" alt="logo_not_found">
												</a>
											</div>
											<div class="register-login-link mb-80">
												<ul>
													<li class="active"><a href="#!">Register</a></li>
												</ul>
											</div>
											<div class="copyright-text">
												<p class="m-0">©2020 <a href="#!" class="yellow-color">Book Your Events.com</a> all right reserved, made with <i class="fas fa-heart"></i> by Book Your Events.com </p>
											</div>
										</div>
										<!-- leftside-content - end -->
										<!-- rightside-content - start -->
										<div class="rightside-content text-center">

											<div class="mb-30">
												<h2 class="form-title title-large white-color">Account <strong>Register</strong></h2>
											</div>

											<div class="login-form text-center mb-50">
												<form method="post" id="register" name="register">
													<div class="form-item">
														<input type="text" class="form-control" name="ufname"  placeholder="First Name" required>
													</div>
													<div class="form-item">
														<input type="text" class="form-control" name="ulname" placeholder="Last Name">
													</div>
													<div class="form-item">
														<input type="date" class="form-control" name="udob" placeholder="Date Of Birth">
													</div>
													<div class="form-item">
														<input type="text" class="form-control" name="umob" placeholder="+91">
													</div>
													<div class="form-item">
														<input type="email" class="form-control" name="uemail" placeholder="Email" required>
													<div class="invalid-feedback">
								                      It's an invalid Email, Try Again!
								                    </div>
													</div>
													<div class="form-item">
														<input type="password" class="form-control" name="upass" placeholder="Password" required>
													</div>
													<div class="form-item">
														<input type="password" class="form-control" name="ucpass" placeholder="Repeat Password">
													</div>
													<button type="submit" class="login-btn" name="register">Register</button>
												</form>
											</div>

										</div>	
										<?php

											if(empty($_POST['uemail']))
											{
											  echo "Email Cant Be Empty";
											}
											elseif(empty($_POST['upass'] && $_POST['ucpass']))
											{
											  echo "Password is Required!!!";
											}
											elseif ($_POST['upass'] != $_POST['ucpass'])
											{
											  echo "Your Passwords Do Not Match";
											}
											else
											{
												if (isset($_POST['register']))
												{
													$ufname = $_POST['ufname'];
													$ulname = $_POST['ulname'];
													$udob = $_POST['udob'];
													$umob = $_POST['umob'];
													$uemail = $_POST['uemail'];
													$upass = $_POST['upass'];
													$ucpass = $_POST['ucpass'];


													$qry_register = "SELECT * FROM user_master WHERE uemail = '$uemail'";

	 		 										$q_register = mysqli_query($conn, $qry_register);

											 		$num_register = mysqli_num_rows($q_register);

											 		if ($num_register == 1)
											  		{
											    	echo "Email Already Taken";
											  		}

											        else
											        {

														$qry_insert_register = "INSERT INTO user_master (ufname, ulname, udob, umob, uemail, upass, ucpass) VALUES ('$ufname', '$ulname', '$udob', '$umob',  '$uemail', '$upass','$ucpass')";

														$q_insert_register = mysqli_query($conn, $qry_insert_register);

														$qry_mail_register = mail($uemail, "bookyourevents", "Thank you ".$ufname." ".$ulname." For Registration to our website");

														header('location: home1.php');
			 										}
			                                    }
		                                    } 

										?>

										<!-- rightside-content - end -->

										<a class="popup-modal-dismiss" href="#!">
											<i class="fas fa-times"></i>
										</a>

									</div>
								</div>

								<div id="alt-login-modal" class="reglog-modal-wrapper mfp-hide clearfix" style="background-image: url(assets/images/login-modal-bg.jpg);">
									<div class="overlay-black clearfix">

										<!-- leftside-content - start -->
										<div class="leftside-content">
											<div class="site-logo-wrapper mb-80">
												<a href="#!" class="logo">
													<img src="logo_thumbnail/<?php echo $rowfav['logo_pic']; ?>" alt="logo_not_found">
												</a>
											</div>
											<div class="register-login-link mb-80">
												<ul>
													<li class="active"><a href="#!">Login</a></li>
												</ul>
											</div>
											<div class="copyright-text">
												<p class="m-0">©2020 <a href="#!" class="yellow-color">Book Your Events.com</a> all right reserved, made with <i class="fas fa-heart"></i> by Book Your Events.com </p>
											</div>
										</div>
										<!-- leftside-content - end -->

										<!-- rightside-content - start -->
										<div class="rightside-content text-center">

											<div class="mb-30">
												<h2 class="form-title title-large white-color">Account <strong>Login</strong></h2>
											</div>

											<div class="login-form text-center mb-50">
												<form method="post" id="login" name="login">
													<div class="form-item">
														<input type="email" placeholder="Email" name="uemail" tabindex="1" required autofocus> 
														<div class="invalid-feedback">
									                      Please fill in your email
									                    </div>
													</div>
													<a href="user-forgot-password.php" class="text-small">
							                                   Forgot Password?
							                        </a>
													<div class="form-item">
														<input type="password" placeholder="Password" name="ucpass" tabindex="2" required>	
														 <div class="invalid-feedback">
									                      please fill in your password
									                     </div>
													</div>
													<pre></pre>
													<button type="submit" class="login-btn" name="login">login</button>
													</form>
											</div>

										</div>
										<!-- rightside-content - end -->

											<?php   

												if (isset($_POST['login']))
												{
													$uemail = $_POST['uemail'];
													$ucpass = $_POST['ucpass'];
													
													$qry_login = "SELECT * FROM user_master WHERE uemail = '$uemail'  && ucpass = '$ucpass'";

	 		 										$q_login = mysqli_query($conn, $qry_login);

	 		 										$num_login = mysqli_num_rows($q_login);

													if ($num_login == 1)
												    {
												    	
													    $_SESSION['uemail'] = $uemail;
                                                        header('location: home-1.php');
  
											   	    }
											   	    else
											   	    {
											   	    	echo "Your password should match password";
											   	    }
											   	}    

										    ?>						
										<a class="popup-modal-dismiss" href="#!">
											<i class="fas fa-times"></i>
										</a>

									</div>
								</div>
						</div>

					</div>
					
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

		<?php

			include "slider.php";

		?>
		
		<!-- slide-section - end
		================================================== -->

		

		<!-- about-section - start
		================================================== -->
		<section id="about-section" class="about-section sec-ptb-100 clearfix">
			<div class="container">
				<div class="row">

					<!-- section-title - start -->
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="section-title text-left mb-30">
							<span class="line-style"></span>
							<small class="sub-title">we are <strong>bye</strong> family</small>
							<h2 class="big-title"><strong>No.1</strong> Events Management</h2>
							<p class="black-color mb-50">
								Our team ensures that all the services are delivered as committed services are delivered as committed.
								No need to run around for your any services.
								Book our trusted vendors and venues under one roof.
								We guarantee our prices for venues are reasonable. 
							</p>
							<a href="aboutus.php" class="custom-btn">
								about bye!!
							</a>
						</div>
					</div>
					<!-- section-title - end -->

					<!-- about-item-wrapper - start -->
					<div class="col-lg-8 col-md-12 col-sm-12">
						<div class="about-item-wrapper ul-li">
							<ul>

								<li>
									<a href="" class="about-item">
										<span class="icon">
											<i class="flaticon-handshake"></i>
										</span>
										<strong class="title">Friendly Team</strong>
										<small class="sub-title">More than 200 teams</small>
									</a>
								</li>
								<li>
									<a href="" class="about-item">
										<span class="icon">
											<i class="flaticon-two-balloons"></i>
										</span>
										<strong class="title">Perfect venues</strong>
										<small class="sub-title">Perfect venues</small>
									</a>
								</li>
								<li>
									<a href="" class="about-item">
										<span class="icon">
											<i class="flaticon-cheers"></i>
										</span>
										<strong class="title">Unique Scenario</strong>
										<small class="sub-title">We thinking out of the box</small>
									</a>
								</li>

								<li>
									<a href="" class="about-item">
										<span class="icon">
											<i class="flaticon-clown-hat"></i>
										</span>
										<strong class="title">Unforgettable Time</strong>
										<small class="sub-title">We make you perfect event</small>
									</a>
								</li>
								<li>
									<a href="" class="about-item">
										<span class="icon">
											<i class="flaticon-speech-bubble"></i>
										</span>
										<strong class="title">24/7 Hours Support</strong>
										<small class="sub-title">Anytime Anywhere</small>
									</a>
								</li>
								<li>
									<a href="" class="about-item">
										<span class="icon">
											<i class="flaticon-light-bulb"></i>
										</span>
										<strong class="title">Briliant Idea</strong>
										<small class="sub-title">We have million idea</small>
									</a>
								</li>

							</ul>
						</div>
					</div>
					<!-- about-item-wrapper - end -->
				</div>	
				</div>
		</section>
		<!-- about-section - end
		================================================== -->


		<!-- conference-section - start
		================================================== -->
		<section id="conference-section" class="conference-section clearfix">
			<div class="jarallax" style="background-image: url(assets/images/conference/pexels-photo-262669.jpg);">
				<div class="overlay-black sec-ptb-100">

					<div class="mb-50">
						<div class="container">
							<div class="row">

								<!-- section-title - start -->
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="section-title text-left">
										<span class="line-style"></span>
										<small class="sub-title">Book Your Events venues</small>
										<h2 class="big-title">Rooms & Hotels <strong>& much more </strong></h2>
									</div>
								</div>
								<!-- section-title - end -->

								<!-- conference-location - start -->
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="conference-location ul-li clearfix">
										<ul>

											<?php

											$qry_venue = "SELECT * FROM venue_master";

                      						$q_venue = mysqli_query($conn, $qry_venue);

											?>

											<!-- venue-type - start -->
											<li class="country-select">
												<form>
													<label for="venue_type">Select Venue :</label>
													<select class="custom-select" id="ddvenuetype" name="ddvenuetype">
														<option value="">Select Venue</option>
														<?php

														while($row_venue = mysqli_fetch_array($q_venue))
														{

														?>

														<option value="<?php echo $row_venue['venue_id'];?>"><?php echo $row_venue['venue_type'] ?></option>

														<?php

														}

														?>
													</select>	
												</form>
											</li>
											<!-- venue-type - end -->

											<!-- city-select - start -->

											<!-- city-select - end -->

										</ul>
									</div>
								</div>
								<!-- conference-location - end -->

							</div>
						</div>
					</div>

					<!-- conference-content-wrapper - start -->
					<div class="tab-wrapper">

						<!-- tab-menu - start -->
						<div class="container">
							<div class="row justify-content-lg-start">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="tab-menu">
										<ul class="nav tab-nav mb-50" id="ddvenuename" name="ddvenuename">	

										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- tab-menu - end -->

						<!-- tab-content - start -->
						<div class="tab-content">
							<!-- tab-pane - start -->
						

						<?php


						$query_venue_image = "SELECT * FROM venue_detail WHERE venue_is_active = 1 ORDER BY venue_detail_id DESC";

        				$q_venue_image = mysqli_query($conn, $query_venue_image);
     
        				// Generate HTML of venue name options list 
        				if(mysqli_num_rows($q_venue_image) > 0)
        				{ 
            
            				while($row_venue_image = mysqli_fetch_array($q_venue_image))
            				{

                				$name_venue_image=$row_venue_image['venue_fname'].$row_venue_image['venue_detail_id'];

            			?>

							<div class="tab-pane fade" id="<?php echo $name_venue_image ; ?>" role="tabpanel" aria-labelledby="<?php echo $name_venue_image ; ?>-tab" aria-expanded="true">
								<div class="image">
									<img src="../venue/venue_thumbnail/<?php echo $row_venue_image['venue_pic']; ?>" alt="Image_not_found">
								</div>
							</div>

						<?php

							}

						}

						?>




							<!-- tab-pane - end -->
						</div>
						<!-- tab-content - end -->

					</div>
					<!-- conference-content-wrapper - end -->

				</div>
			</div>
		</section>
		<!-- conference-section - end
		================================================== -->





		<!-- special-offer-section - start
		================================================== -->
		

					<!-- special-offer-content - start -->
					
					<!-- special-offer-content - end -->

					<!-- event-makeing-btn - start -->
					
					<!-- event-makeing-btn - end -->

			
		<!-- special-offer-section - end
		================================================== -->





		<!-- event-section - start
		================================================== -->
		<section id="event-section" class="event-section sec-ptb-100 bg-gray-light clearfix">
			<div class="container">

				<div class="mb-50">
					<div class="row">

						<!-- section-title - start -->
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="section-title text-left">
								<span class="line-style"></span>
								<small class="sub-title">Book Your Events</small>
								<h2 class="big-title"><strong>Vendor</strong> listing</h2>
							</div>
						</div>
						<!-- section-title - end -->

						<!-- event-tab-menu - start -->
						<?php

							$qry_vendor = "SELECT * FROM vendor_master";

                      		$q_vendor = mysqli_query($conn, $qry_vendor);

						?>
						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="event-tab-menu clearfix">
								<ul class="nav">
									<?php

									while ($row_vendor = mysqli_fetch_array($q_vendor))
									{
										$name_vendor_names=$row_vendor['vendor_id'];

									?>


									<li>
										<a data-toggle="tab" href="<?php echo "#".$name_vendor_names ; ?>">
											<strong><?php echo $row_vendor['vendor_type']; ?></strong>
										</a>
									</li>


									<?php
										
									}

									?>
								</ul>
							</div>
						</div>
						<!-- event-tab-menu - end -->

					</div>
				</div>

				<!-- tab-content - start -->
				<div class="tab-content">

					<?php

						$query_vendor_details = "SELECT * FROM vendor_detail WHERE vendor_is_active = 1 ORDER BY vendor_detail_id DESC";

        				$q_vendor_details = mysqli_query($conn, $query_vendor_details);
     
        				// Generate HTML of venue name options list 
        				if(mysqli_num_rows($q_vendor_details) > 0)
        				{ 
            
            				while($row_vendor_details = mysqli_fetch_array($q_vendor_details))
            				{

                				$name_vendor_names=$row_vendor_details['vendor_id'];

            		?>

					<!-- conference-event - start -->
					<div id="<?php echo $name_vendor_names ; ?>" class="tab-pane fade">

						<div class="row">

							<!-- event-item - start -->
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="event-item clearfix">

									<!-- event-image - start -->
									<div class="event-image">
										<img src="../vendor/vendor_thumbnail/<?php echo $row_vendor_details['vendor_pic']; ?>" alt="Image_not_found">
									</div>
									<!-- event-image - end -->

									<!-- event-content - start -->
									<div class="event-content">
										<div class="event-title mb-15">
											<h3 class="title">
												<?php echo $row_vendor_details['vendor_name']; ?>
											</h3>
											<span class="ticket-price yellow-color">Price Starts from <?php echo $row_vendor_details['vendor_per_package_price']; ?></span>
										</div>
										<div class="event-post-meta ul-li-block mb-30">
											<ul>
												<li>
													<span class="icon">
														<i class="far fa-envelope"></i>
													</span>
													<?php echo $row_vendor_details['vendor_email']; ?>
												</li>
												<li>
													<span class="icon">
														<i class="fas fa-map-marker-alt"></i>
													</span>
													<?php echo $row_vendor_details['vendor_address']; ?>
												</li>
											</ul>
										</div>
										<a href="vendor-overview-details.php?vendor_detail_id=<?php echo $row_vendor_details['vendor_detail_id']; ?>" class="tickets-details-btn">
											SEE MORE DETAILS
										</a>
									</div>
									<!-- event-content - end -->

								</div>
							</div>
							<!-- event-item - end -->

							<!-- Paging - start -->
							
							<!-- Paging - end -->

						</div>
					</div>
					<?php

							}

						}

					?>
					<!-- conference-event - end -->

				</div>
				<!-- tab-content - end -->

		</section>
		<!-- event-section - end
		================================================== -->





		<!-- speaker-section - start
		================================================== -->
		
		<!-- speaker-section - end
		================================================== -->





		<!-- advertisement-section - start
		================================================== -->
		
		<!-- advertisement-section - end
		================================================== -->





		<!-- partners-clients-section - start
		================================================== -->
		
		<!-- partners-clients-section - end
		================================================== -->





		<!-- news-update-section - start
		================================================== -->
		
		<!-- news-update-section - end
		================================================== -->




		<?php 

			$qry_gallery = "SELECT * FROM gallery ORDER BY gallery_id DESC LIMIT 5";

			$q_gallery = mysqli_query($conn, $qry_gallery); 
		?>



		<!-- event-gallery-section - start
		================================================== -->
		<section id="event-gallery-section" class="event-gallery-section sec-ptb-100 clearfix">

			<!-- section-title - start -->
			<div class="section-title text-center mb-50">
				<small class="sub-title">BookYourEvents gallery</small>
				<h2 class="big-title">Beautiful & <strong>Unforgettable Times</strong></h2>
			</div>
			<!-- section-title - end -->

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

			<div class="text-center">
				<a href="gallery.php" class="custom-btn">view all gallery</a>
			</div>

			
		</section>
		<!-- event-gallery-section - end
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
<?php ob_flush(); ?>