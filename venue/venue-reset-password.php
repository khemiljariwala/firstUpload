<!DOCTYPE html>
<html lang="en">

<?php 

  session_start();

  if (isset($_SESSION['venue_email']))
  {
?>


<?php 

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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Reset Password</h4>
              </div>
              <div class="card-body">
                <p class="text-muted">Enter Your New Password</p>
                <form method="POST">
                  <div class="form-group">
                    <label for="venue_pass" class="d-block">New Password</label>
                    <input id="venue_pass" name="venue_pass" type="password" class="form-control pwstrength" data-indicator="pwindicator" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="venue_cpass" class="d-block">Confirm New Password</label>
                    <input id="venue_cpass" name="venue_cpass" type="password" class="form-control pwstrength" data-indicator="pwindicator" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="resetpass" name="resetpass">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <?php 

              if(empty($_POST['venue_pass'] && $_POST['venue_cpass']))
              {
                echo "Password is Required!!!";
              }
              elseif ($_POST['venue_pass'] != $_POST['venue_cpass'])
              {
                echo "Your Passwords Do Not Match";
              }
              else
              {

                if (isset($_POST['resetpass']))
                {

                  $venue_pass = $_POST['venue_pass'];
                  $venue_cpass = $_POST['venue_cpass'];



                  $qry = "SELECT venue_pass, venue_cpass FROM venue_detail WHERE venue_email = '".$_SESSION['venue_email']."'";

                  $q = mysqli_query($conn, $qry);

                  $qry1 = "UPDATE venue_detail SET venue_pass = '$venue_pass', venue_cpass = '$venue_cpass' WHERE venue_email = '".$_SESSION['venue_email']."'";

                  $q1 = mysqli_query($conn, $qry1);

                  if ($q1)
                  {
                    header('location: home.php');
                  }
                  else
                  {
                    echo "Please Try Again!!!";
                  }

                }
              }

              
            ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
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