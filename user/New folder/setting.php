<!DOCTYPE html>
<html lang="en">
<head>
		<?php

		require('conn.php');

	    ?>

	    <?php

		$qryfav = "SELECT favicon FROM website_details WHERE website_id = 0";
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

		<title>BookYourEvents - Setting</title>
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





		<!-- event-details-section - start
		================================================== -->
		<section id="event-details-section" class="event-details-section sec-ptb-100 clearfix">
			<div class="container">
				<div class="row">

					<!-- col - event-details - start -->
					<div class="col-lg-8 col-md-12 col-sm-12">

					<!-- event-details - start -->
						<div class="event-details mb-80">
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
											<li><a href="profile.php"><i class="fas fa-arrow-circle-right"></i> About</a></li>
											<li><a  class="active" data-toggle="tab" href="setting.php"><i class="fas fa-arrow-circle-right"></i> Setting</a></li>
										</ul>
										<div class="tab-content">
											<div id="overview" class="tab-pane fade">
												
											</div>

											<?php

												$qry = "SELECT * FROM user_master WHERE uemail = '".$_SESSION['uemail']."'";

												$q = mysqli_query($conn, $qry);

												$row = mysqli_fetch_array($q);

											?>

											<!-- overview start-->
											<div id="setting" class="tab-pane fade in active show">
												<div class="hall-item clearfix">
													<div class="hall-content">
													 <form method="POST" class="needs-validation" enctype="multipart/form-data">
							                            <h4>Edit Profile</h4>
							                           <div class="card-body">
							                            <div class="row">
							                              <div class="form-group col-md-6 col-12">
							                                <label>First Name</label>
							                                <input type="text" class="form-control" name="ufname" value="<?php echo $row['ufname']; ?>">
							                                <div class="invalid-feedback">
							                                  Please fill in the first name
							                                </div>
							                              </div>
							                              <div class="form-group col-md-6 col-12">
							                                <label>Last Name</label>
							                                <input type="text" class="form-control" name="ulname" value="<?php echo $row['ulname']; ?>">
							                                <div class="invalid-feedback">
							                                  Please fill in the last name
							                                </div>
							                              </div>
							                            </div>
							                            <div class="row">
							                              <div class="form-group col-6">
							                                <label>Mobile Number</label>
							                                <input type="text" class="form-control" name="umob" value="<?php echo $row['umob']; ?>">
							                              </div>
							                              <div class="form-group col-6">
							                                <label for="udob">Date Of Birth</label>
							                                <input id="udob" type="date" class="form-control" name="udob" value="<?php echo $row['udob']; ?>">
							                              </div>
							                            </div>
							                          </div>
							                          <div class="row">
							                          <button class="custom-btn" id="update" name="update">Update</button>
													  <pre>   </pre>
													  <button class="custom-btn" id="resetpass" name="resetpass">Reset Password</button>
							                          </div>
							                        </form>
												</div>
											</div>

											<!--Overview end --->

						        <?php
											
									if (isset($_POST['update']))
			                        {

			                        	$ufname = $_POST['ufname'];
			                        	$ulname = $_POST['ulname'];
			                        	$umob = $_POST['umob'];
			                        	$udob = $_POST['udob'];

			                          
			                        	$qry1 = "UPDATE user_master SET ufname = '$ufname', ulname = '$ulname', umob = '$umob',  udob = '$udob' WHERE uemail = '".$_SESSION['uemail']."'";

			                        	$q1 = mysqli_query($conn, $qry1);

			                        	if ($q1)
			                        	{
			                            	echo "Data Inserted";
			                            	header('location: profile.php');
			                        	}
			                        	else
			                        	{
			                            	echo "Data Not Inserted";
			                        	}

			                        }
			                          

			                        
			                        if (isset($_POST['resetpass']))
			                        {

			                        	if(isset($_SESSION['uemail']))
			                        	{

			                          		session_destroy();
			                          		header('location: user-forgot-password.php');
			                            
			                        	}

			                        }
                        
                                 ?>
										
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
			
				<!-- sidebar-section - start -->

					
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
