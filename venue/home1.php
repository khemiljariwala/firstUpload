<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
 
  session_start();

  if(isset($_SESSION['venue_email']))
  {

  	require('conn.php');

?>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      

      <!-- Main Content Starts-->
      <div class="main-content">

      <!-- Section Starts -->
        <section class="section">
        </section>
      <!-- Section Ends -->


<?php

	$qry = "SELECT * FROM venue_detail WHERE venue_email = '".$_SESSION['venue_email']."'";

    $q = mysqli_query($conn, $qry);

    $row = mysqli_fetch_array($q);

	echo "Hello"." ".$row['venue_fname']." Thank You For Registering!";
	echo "<br>";
	echo "Wait Until Admin Verifies your Details and Register you as Active";
	echo "<br>";
	echo "Try Logging In Again, to check you are Active Or Not!";
	echo "<br>";

?>

		<a href="logout.php"> Login Again?</a>

		<!-- Setting Starts -->
            <?php include 'setting.php'; ?>
        <!-- Setting Ends -->


      </div>
      <!-- Main Content Ends -->

      <!-- Footer Start -->
          <?php include 'footer.php'; ?>
      <!-- Footer End -->

    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>
<?php
  }
  else
  {
    header('location: venue-login.php');
  }

?>
<?php ob_flush(); ?>