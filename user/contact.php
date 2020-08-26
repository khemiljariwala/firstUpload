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

		<title>Harmoni - Contact Us</title>
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




		<!-- breadcrumb-section - start
		================================================== -->
		
		<!-- breadcrumb-section - end
		================================================== -->


<?php

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{

		$qry = "SELECT * FROM user_master WHERE uemail = '".$_SESSION['uemail']."'";

		$q = mysqli_query($conn, $qry);

		$row = mysqli_fetch_array($q);

	}	

?>


		<!-- contact-section - start
		================================================== -->
		<section id="contact-section" class="contact-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- section-title - start -->
				<div class="section-title mb-50">
					<small class="sub-title">contact us</small>
					<h2 class="big-title">Keep in touch <strong>with Book Your Events !!!</strong></h2>
				</div>
				<!-- section-title - end -->
				
				<!-- contact-form - start -->
				<div class="contact-form form-wrapper text-center">
					<form method="post">
						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="text" placeholder="First Name" name= "user_fname" value="<?php echo (isset($_SESSION['loggedin'])) ? $row['ufname'] : "" ; ?>" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="text" placeholder="Last Name" name= "user_lname" value="<?php echo (isset($_SESSION['loggedin'])) ? $row['ulname'] : "" ; ?>" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="email" placeholder="Email Address" name= "user_email" value="<?php echo (isset($_SESSION['loggedin'])) ? $row['uemail'] : "" ; ?>" required>
								</div>
								<div class="invalid-feedback">
								       It's an invalid Email, Try Again!
							    </div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="tel" placeholder="Phone Number" name= "user_mob" value="<?php echo (isset($_SESSION['loggedin'])) ? $row['umob'] : "" ; ?>" required>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">
								<textarea placeholder="Your Message" name= "user_msg" required></textarea>
								<button type="submit" class="custom-btn"name= "insert">send mail</button>
							</div>
							
						</div>
					</form>
				</div>

				<?php

					if(empty($_POST['user_email']))
					{
					   echo "Email Cant Be Empty";
					}
					else
					{
						if (isset($_POST['insert']))
						{
							$user_fname = $_POST['user_fname'];
							$user_lname = $_POST['user_lname'];
							$user_email = $_POST['user_email'];
							$user_mob = $_POST['user_mob'];
							$user_msg = $_POST['user_msg'];
						
							 $qry1 = "INSERT INTO contact_us (user_fname, user_lname, user_email, user_mob, user_msg) VALUES ('$user_fname', '$user_lname', '$user_email', '$user_mob', '$user_msg')";

							 $q1 = mysqli_query($conn, $qry1);

							 $qry3 = mail($user_email, "bookyourevents", "Thank you ".$user_fname." ".$user_lname." For contact us");

														  
			 			}
	 
			        }
		                                    

			    ?>
							

				<!-- contact-form - end -->

			</div>
		</section>
		<!-- contact-section - end
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


</html>