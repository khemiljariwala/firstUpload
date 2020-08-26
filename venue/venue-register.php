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
                  <div class="form-group">
                      <label>Your Venue Type</label>
                      <select class="custom-select" name="venue_type">
                      <?php 

                      $qry = "SELECT * FROM venue_master";

                      $q = mysqli_query($conn, $qry);

                      while($row = mysqli_fetch_array($q))
                      {
                      ?>

                      <option value="<?php echo $row['venue_id'];?>"><?php echo $row['venue_type'] ?></option>

                      <?php
                      }
                      ?>
                      </select>
                    </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="venue_fname">First Name</label>
                      <input id="venue_fname" type="text" class="form-control" name="venue_fname">
                    </div>
                    <div class="form-group col-6">
                      <label for="venue_lname">Last Name</label>
                      <input id="venue_lname" type="text" class="form-control" name="venue_lname">
                    </div>
                  </div>
                    <div class="form-group">
                      <label>Your Venue Name</label>
                      <input type="text" class="form-control" name="venue_name">
                    </div>
                    <div class="form-group">
                      <label>Capacity</label>
                      <input type="text" class="form-control" name="venue_capacity">
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label>Email</label>
                      <input type="email" class="form-control" name="venue_email">
                    </div>
                    <div class="form-group col-6">
                      <label>Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="venue_mob" placeholder="+91">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="venue_dob">Date Of Birth</label>
                      <input id="venue_dob" type="date" class="form-control" name="venue_dob">
                    </div>
                    <div class="form-group col-6">
                      <label>Per Day Price</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            ₹
                          </div>
                        </div>
                        <input type="text" class="form-control currency" name="venue_per_day_price">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12 col-md-6 col-lg-12">
                      <label>Google Map Embedded iframe Link:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i data-feather="map-pin"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control currency" name="venue_map_location">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Address Of Venue</label>
                      <input type="text" class="form-control" name="venue_address">
                    </div>
                    <div class="form-group">
                      <label>Summary</label>
                      <input type="text" class="form-control" name="venue_summary">
                    </div>
                    <div class="form-group">
                      <label>Venue Description</label>
                      <input type="text" class="form-control" name="venue_description">
                    </div>
                    <div class="form-group">
                      <label>Terms & Conditions</label>
                      <input type="text" class="form-control" name="venue_tnc">
                    </div>
                    <div class="form-group">
                      <label>Upload Images</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="venue_pic">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="venue_pass" class="d-block">Password</label>
                      <input id="venue_pass" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="venue_pass" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="venue_cpass" class="d-block">Confirm Password</label>
                      <input id="venue_cpass" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="venue_cpass" required>
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
                Already Registered? <a href="venue-login.php">Login</a>
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

if(empty($_POST['venue_email']))
{
  echo "Email Cant Be Empty";
}
elseif(empty($_POST['venue_pass'] && $_POST['venue_cpass']))
{
  echo "Password is Required!!!";
}
elseif ($_POST['venue_pass'] != $_POST['venue_cpass'])
{
  echo "Your Passwords Do Not Match";
}
else
{
  if (isset($_POST['register']))
  {
    $venue_type = $_POST['venue_type'];
    $venue_fname = $_POST['venue_fname'];
    $venue_lname = $_POST['venue_lname'];
    $venue_name = $_POST['venue_name'];
    $venue_mob = $_POST['venue_mob'];
    $venue_dob = $_POST['venue_dob'];
    $venue_email = $_POST['venue_email'];
    $venue_per_day_price = $_POST['venue_per_day_price'];
    $venue_map_location = $_POST['venue_map_location'];
    $venue_address = $_POST['venue_address'];
    $venue_summary = $_POST['venue_summary'];
    $venue_description = $_POST['venue_description'];
    $venue_tnc = $_POST['venue_tnc'];
    $venue_pass = $_POST['venue_pass'];
    $venue_cpass = $_POST['venue_cpass'];

    $venue_pic = $_FILES['venue_pic']['name'];
    $dst = "./venue_thumbnail/".$venue_pic;

    $qry1 = "SELECT * FROM venue_detail WHERE venue_email = '$venue_email'";

    $q1 = mysqli_query($conn, $qry1);

    $num = mysqli_num_rows($q1);

    if ($num == 1)
    {
      echo "Email Already Taken";
    }
    else
    {

      $qry2 = "INSERT INTO venue_detail (venue_id, venue_fname, venue_lname, venue_name, venue_mob, venue_dob, venue_doj, venue_email, venue_per_day_price, venue_map_location, venue_address, venue_summary, venue_description, venue_tnc, venue_pass, venue_cpass, venue_pic) VALUES ('$venue_type', '$venue_fname', '$venue_lname', '$venue_name', '$venue_mob', '$venue_dob', now(), '$venue_email', '$venue_per_day_price', '$venue_map_location', '$venue_address', '$venue_summary', '$venue_description', '$venue_tnc', '$venue_pass', '$venue_cpass', '$venue_pic')";


      echo $qry2;


      move_uploaded_file($_FILES['venue_pic']['tmp_name'], $dst);

      $q2 = mysqli_query($conn, $qry2);


      $qry3 = mail($venue_email, "bookmyevents", "Thank You ".$venue_fname." ".$venue_lname." For Becoming venue to our website");

      header('location: venue-register.php');

    }


  }
}



?>

</body>
</html>
<?php ob_flush(); ?>