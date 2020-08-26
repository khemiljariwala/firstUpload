<!DOCTYPE html>
<html lang="en">

<?php 

session_start();
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
                <h4>Forgot Password</h4>
              </div>
              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST">
                  <div class="form-group">
                    <label for="aemail">Email</label>
                    <input id="aemail" type="email" class="form-control" name="aemail" tabindex="1" required autofocus>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="forgotpass">
                      Forgot Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <?php

            if (isset($_POST['forgotpass']))
            {
              $aemail = $_POST['aemail'];
              $qry = "SELECT apass, acpass FROM admin_master WHERE aemail = '$aemail'";
              $q = mysqli_query($conn, $qry);
  
              $num = mysqli_num_rows($q);
              $headers  = 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
              if ($num == 1)
              {
                $link = "<a href='http://localhost/events/admin/auth-reset-password.php'>link</a>";
                $_SESSION['aemail'] = $aemail;
                $qry1 = mail($aemail, "bookmyevents", "Click this ".$link." to change your Password",$headers);
  
              }

              echo "We have sent you a Password Reset Link on your email";
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