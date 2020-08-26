<!DOCTYPE html>
<html lang="en">

	
<head>

	<?php

		
		include 'conn.php';
		session_start();

	?>	

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="shortcut icon" href="assets/images/favicon.png">

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

<center>
<body>


		
		 <div class=" col-md-6 offset-md-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Forgot Password</h4>
              </div>
              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST">
                  <div class="form-group">
            
                    Email<input id="email" type="email" class="form-control" name="aemail" tabindex="1" required autofocus>
                  </div>
           
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="forgotpass">
                      Forgot Password
                
                </form>

                 <?php

		            if (isset($_POST['forgotpass']))
		            {
		              $uemail = $_POST['uemail'];
		              $qry = "SELECT upass, ucpass FROM user_master WHERE uemail = '$uemail'";
		              $q = mysqli_query($conn, $qry);
		  
		              $num = mysqli_num_rows($q);
		              $headers  = 'MIME-Version: 1.0' . "\r\n";
		              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		  
		              if ($num == 1)
		              {
		                $link = "<a href='http://localhost/events/user/user-reset-password.php'>link</a>";
		                $_SESSION['uemail'] = $uemail;
		                $qry1 = mail($uemail, "bookyourevents", "Click this ".$link." to change your Password",$headers);
		  
		              }

		              echo "We have sent you a Password Reset Link on your email";
		            }

                ?>

             

     </button>
</div>
</div>
</div>



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
	   </center>
	</html>