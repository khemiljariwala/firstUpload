<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php 
  
  require('conn.php');

?>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
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
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="afname">First Name</label>
                      <input id="afname" type="text" class="form-control" name="afname">
                    </div>
                    <div class="form-group col-6">
                      <label for="alname">Last Name</label>
                      <input id="alname" type="text" class="form-control" name="alname">
                    </div>
                    <div class="form-group col-6">
                      <label for="amob">Mobile Number</label>
                      <input id="amob" type="text" max="10" class="form-control" name="amob" placeholder="+91" required>
                    </div>
                    <div class="form-group col-6">
                      <label for="adob">Date Of Birth</label>
                      <input id="adob" type="date" class="form-control" name="adob">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="aemail">Email</label>
                    <input id="aemail" type="email" class="form-control" name="aemail" required>
                    <div class="invalid-feedback">
                      It's an invalid Email, Try Again!
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Upload Profile Picture</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="apic">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="apass" class="d-block">Password</label>
                      <input id="apass" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="apass" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="acpass" class="d-block">Password Confirmation</label>
                      <input id="acpass" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="acpass" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                  </div>

                 <?php 

                 /*<div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>*/ 

                  ?>

                  <div class="form-group">
                    <button name="register" type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="auth-login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>

<?php 

if(empty($_POST['aemail']))
{
  echo "Email Cant Be Empty";
}
elseif(empty($_POST['apass'] && $_POST['acpass']))
{
  echo "Password is Required!!!";
}
elseif ($_POST['apass'] != $_POST['acpass'])
{
  echo "Your Passwords Do Not Match";
}
else
{
  if (isset($_POST['register']))
  {
    $afname = $_POST['afname'];
    $alname = $_POST['alname'];
    $amob = $_POST['amob'];
    $adob = $_POST['adob'];
    $aemail = $_POST['aemail'];
    $apass = $_POST['apass'];
    $acpass = $_POST['acpass'];

    $apic = $_FILES['apic']['name'];
    $dst = "./admin_thumbnail/".$apic;

    $qry = "SELECT * FROM admin_master WHERE aemail = '$aemail'";

    $q = mysqli_query($conn, $qry);

    $num = mysqli_num_rows($q);

    if ($num == 1)
    {
      echo "Email Already Taken";
    }
    else
    {

      $qry1 = "INSERT INTO admin_master (afname, alname, amob, adob, aemail, apass, acpass, apic) VALUES ('$afname', '$alname', '$amob', '$adob', '$aemail', '$apass', '$acpass', '$apic')";

      move_uploaded_file($_FILES['apic']['tmp_name'], $dst);

      $q1 = mysqli_query($conn, $qry1);

      $qry2 = mail($aemail, "bookmyevents", "Thank You ".$afname." ".$alname." For Becoming Admin to our website");

      header('location: auth-register.php');

    }


  }
}



?>

</body>
</html>
<?php ob_flush(); ?>