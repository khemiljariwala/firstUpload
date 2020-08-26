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
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
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
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="vendor_email">Email</label>
                    <input id="vendor_email" type="email" class="form-control" name="vendor_email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="vendor-forgot-password.php" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="vendor_cpass" type="password" class="form-control" name="vendor_cpass" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="login" name="login">
                      Login
                    </button>
                  </div>
                </form>
                
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="vendor-register.php">Create One</a>
            </div>
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

  <?php

    if (isset($_POST['login']))
    {
      error_reporting(1);
      $vendor_email = $_POST['vendor_email'];
      $vendor_cpass = $_POST['vendor_cpass'];
  
      $qry = "SELECT * FROM vendor_detail WHERE vendor_email = '$vendor_email' AND vendor_cpass = '$vendor_cpass'";
  
      $q = mysqli_query($conn, $qry);
  
      $num = mysqli_num_rows($q);

      $qry1 = "SELECT * FROM vendor_detail WHERE vendor_email = '$vendor_email' AND vendor_cpass = '$vendor_cpass' AND vendor_is_active = 1";
  
      $q1 = mysqli_query($conn, $qry1);
  
      $num1 = mysqli_num_rows($q1);

      $qry2 = "SELECT * FROM vendor_detail WHERE vendor_email = '$vendor_email' AND vendor_cpass = '$vendor_cpass' AND vendor_is_active = 2";

      $q2 = mysqli_query($conn, $qry2);
  
      $num2 = mysqli_num_rows($q2);


  
      if ($num == 1)
      {
  
        $_SESSION['vendor_email'] = $vendor_email;

        if ($num1 == 1)
        {
          header('location: home.php');
        }
        elseif ($num2 == 1)
        {
          header('location: home2.php');
        }
        else
        {
          header('location: home1.php');
        }
        
  
      }
      else
      {
    
           echo "Password Should Match Email";
  
      }
    }
    

  ?>
</body>
</html>