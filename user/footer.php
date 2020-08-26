

		<?php
          
        	$qry = "SELECT * FROM website_details WHERE website_id = 0";

        	$q = mysqli_query($conn, $qry);

        	$row = mysqli_fetch_array($q);

      	?>
       
<!-- footer-section2 - start
		================================================== -->
		<footer id="footer-section" class="footer-section footer-section2 clearfix">

			<!-- footer-top - start -->
			<div class="footer-top sec-ptb-100 clearfix">
				<div class="container">
					<div class="row">

						<!-- about-wrapper - start -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="about-wrapper">

								<!-- site-logo-wrapper - start -->
								<div class="site-logo-wrapper mb-30">
									<a href="home.php" class="logo">
										<img src="logo_thumbnail/<?php echo $row['logo_pic']; ?>" alt="logo_not_found" height = "50px" width = "214px">
									</a>
								</div>
								<!-- site-logo-wrapper - end -->
                       				
								<!-- basic-info - start -->
								<div class="basic-info ul-li-block mb-50">
									<ul>
										<li>
											<i class="fas fa-map-marker-alt"></i>
											<?php echo $row['address']; ?>
										</li>
										<li>
											<i class="fas fa-envelope"></i>
											<a href="#!"><?php echo $row['email_id']; ?></a>
										</li>
										<li>
											<i class="fas fa-phone"></i>
											<a href="#!"><?php echo $row['phone_number']; ?></a>
										</li>
									</ul>
								</div>

								<!-- basic-info - end -->

								<!-- social-links - start -->
								<div class="social-links ul-li">
									<h3 class="social-title">network</h3>
									<ul>
										<li>
											<a href="<?php echo $row['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
										</li>
								<!--	<li>
											<a href="#!"><i class="fab fa-twitter"></i></a>
										</li>  
										<li>   
											<a href="#!"><i class="fab fa-twitch"></i></a>
										</li>    -->
										<li>
											<a href="<?php echo $row['email_id']; ?>"><i class="fas fa-envelope"></i></a>
										</li>
										<li>
											<a href="<?php echo $row['instagram']; ?>"><i class="fab fa-instagram"></i></a>
										</li>
									</ul>
								</div>
								
								
								<!-- social-links - end -->
								
							</div>
						</div>


						<!-- about-wrapper - end -->

						<!-- usefullinks-wrapper - start -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="usefullinks-wrapper ul-li-block">
								<h3 class="footer-item-title">
									useful <strong>links</strong>
								</h3>
								<ul>
									<li><a href="aboutus.php">About BookYourEvents</a></li>
									<li><a href="contact.php">Contact us</a></li>
									<li><a href="privacy-policy.php">Privacy policy</a></li>
								</ul>
								
							</div>
						</div>
						<!-- usefullinks-wrapper - end -->

						<!-- instagram-wrapper - start -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="instagram-wrapper ul-li">
								<h3 class="footer-item-title">
									BookYourEvents <strong>instagram</strong>
								</h3>
								<ul>
									<li class="image-wrapper">
										<img src="assets/images/footer/instagram/img1.png" alt="Image_not_found">
										<a href="#!"><i class="fab fa-instagram"></i></a>
									</li>
									<li class="image-wrapper">
										<img src="assets/images/footer/instagram/img2.png" alt="Image_not_found">
										<a href="#!"><i class="fab fa-instagram"></i></a>
									</li>
									<li class="image-wrapper">
										<img src="assets/images/footer/instagram/img3.png" alt="Image_not_found">
										<a href="#!"><i class="fab fa-instagram"></i></a>
									</li>
									<li class="image-wrapper">
										<img src="assets/images/footer/instagram/img4.png" alt="Image_not_found">
										<a href="#!"><i class="fab fa-instagram"></i></a>
									</li>
									<li class="image-wrapper">
										<img src="assets/images/footer/instagram/img5.png" alt="Image_not_found">
										<a href="#!"><i class="fab fa-instagram"></i></a>
									</li>
									<li class="image-wrapper">
										<img src="assets/images/footer/instagram/img6.png" alt="Image_not_found">
										<a href="#!"><i class="fab fa-instagram"></i></a>
									</li>
								</ul>
								<h4 class="followus-link">
									Follow Our Instagram <a href="#!">#BookYourEvents</a>
								</h4>
							</div>
						</div>
						<!-- instagram-wrapper - end -->

					</div>
				</div>
			</div>
			<!-- footer-top - end -->

			<div class="footer-bottom">
				<div class="container">
					<div class="row">

						<!-- copyright-text - start -->
						<div class="col-lg-7 col-md-12 col-sm-12">
							<div class="copyright-text">
								<p class="m-0">©2020 <a href="#!" class="site-link">BookYourEvents.in</a> all right reserved, made with <i class="fas fa-heart"></i> by <a href="#!" class="author-link"><strong>Events</strong></a></p>
							</div>
						</div>
						<!-- copyright-text - end -->

						<!-- footer-menu - start -->
						<div class="col-lg-5 col-md-12 col-sm-12">
							<div class="footer-menu">
								<ul>
									<li><a href="contact.php">Contact us</a></li>
									<li><a href="aboutus.php">About us</a></li>
									<li><a href="#!">Site map</a></li>
									<li><a href="privacy-policy.php">Privacy policy</a></li>
								</ul>
							</div>
						</div>
						<!-- footer-menu - end -->

					</div>
				</div>
			</div>

		</footer>
		<!-- footer-section2 - end
		================================================== -->