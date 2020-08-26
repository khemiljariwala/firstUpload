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

		<title>BookYourEvents - Enquire Now</title>
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


		<?php

			$qry = "SELECT * FROM vendor_detail WHERE vendor_is_active = 1 AND vendor_detail_id =".$_GET['vendor_detail_id'];

			$q = mysqli_query($conn, $qry);

			$row = mysqli_fetch_array($q);

		?>


		<!-- breadcrumb-section - start
		================================================== -->
		
		<!-- breadcrumb-section - end
		================================================== -->


<?php

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{

		$qry_user_detail = "SELECT * FROM user_master WHERE uemail = '".$_SESSION['uemail']."'";

		$q_user_detail = mysqli_query($conn, $qry_user_detail);

		$row_user_detail = mysqli_fetch_array($q_user_detail);

	}	

?>


		<!-- contact-section - start
		================================================== -->
		<section id="contact-section" class="contact-section sec-ptb-100 clearfix">
			<div class="container">

				<!-- section-title - start -->
				<div class="section-title mb-50">
					<small class="sub-title">send enquiry</small>
					<h2 class="big-title">Keep in touch <strong>with <?php echo $row['vendor_name'] ?>!!</strong></h2>
				</div>
				<!-- section-title - end -->

				<!-- contact-form - start -->
				<div class="contact-form form-wrapper text-center">
					<form method="post">
						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="text" placeholder="First Name" name= "enquiry_first_name" value="<?php echo (isset($_SESSION['loggedin'])) ? $row_user_detail['ufname'] : "" ; ?>" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="text" placeholder="Last Name" name= "enquiry_last_name" value="<?php echo (isset($_SESSION['loggedin'])) ? $row_user_detail['ulname'] : "" ; ?>" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="email" placeholder="Email Address" name= "enquiry_email" value="<?php echo (isset($_SESSION['loggedin'])) ? $row_user_detail['uemail'] : "" ; ?>" required>
								</div>
								<div class="invalid-feedback">
								       It's an invalid Email, Try Again!
							    </div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-item">
									<input type="tel" placeholder="Phone Number" name= "enquiry_mob" value="<?php echo (isset($_SESSION['loggedin'])) ? $row_user_detail['umob'] : "" ; ?>" required>
								</div>
							</div>

							

							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-item">
									<input type="text" placeholder="Your Budget" name= "enquiry_budget" required>
								</div>
							</div>

							
							<div class="col-lg-12 col-md-12 col-sm-12">
								<textarea placeholder="Your Message" name= "enquiry_msg" required></textarea>
								<button type="submit" class="custom-btn"name= "insert">send enquiry</button>
							</div>
							
						</div>
					</form>
				</div>

				<?php

						if (isset($_POST['insert']))
						{
							date_default_timezone_set('Asia/Kolkata');
							$vendor_detail_id = $_GET['vendor_detail_id'];
							$enquiry_first_name = $_POST['enquiry_first_name'];
							$enquiry_last_name = $_POST['enquiry_last_name'];
							$enquiry_email = $_POST['enquiry_email'];
							$enquiry_mob = $_POST['enquiry_mob'];
							$enquiry_date = date("Y-m-d h:i:s");
							$enquiry_budget = $_POST['enquiry_budget'];
							$enquiry_msg = $_POST['enquiry_msg'];
						
							 $qry1 = "INSERT INTO vendor_enquiry (vendor_detail_id, enquiry_first_name, enquiry_last_name, enquiry_email, enquiry_mob, enquiry_date, enquiry_budget, enquiry_msg) VALUES ('$vendor_detail_id','$enquiry_first_name', '$enquiry_last_name', '$enquiry_email', '$enquiry_mob', '$enquiry_date', '$enquiry_budget', '$enquiry_msg')";

							 $q1 = mysqli_query($conn, $qry1);

							 if ($q1)
							 {
							 	$qry3 = mail($enquiry_email, "bookyourevents", "Thank you ".$enquiry_first_name." ".$enquiry_last_name." For more enquiry");
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
				
				<?php echo $row['vendor_map_location']; ?>

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