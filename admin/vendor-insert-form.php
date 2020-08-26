<!DOCTYPE html>
<html lang="en">

<?php 

  include 'conn.php'; 

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

      <!-- Header Starts -->
          <?php include 'header.php'; ?>
      <!-- Header Ends -->

      <!-- Main Content Starts -->
      
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <form method="POST" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Insert Your Vendor Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Your Vendor Type</label>
                      <select class="custom-select" name="vendor_type">
                      <?php 

                      $qry = "SELECT * FROM vendor_master";

                      $q = mysqli_query($conn, $qry);

                      while($row = mysqli_fetch_array($q))
                      {
                      ?>

                      <option value="<?php echo $row['vendor_id'];?>"><?php echo $row['vendor_type'] ?></option>

                      <?php
                      }
                      ?>
                      </select>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="vendor_fname">First Name</label>
                      <input id="vendor_fname" type="text" class="form-control" name="vendor_fname">
                    </div>
                    <div class="form-group col-6">
                      <label for="vendor_lname">Last Name</label>
                      <input id="vendor_lname" type="text" class="form-control" name="vendor_lname">
                    </div>
                  </div>
                    <div class="form-group">
                      <label>Your Vendor Name</label>
                      <input type="text" class="form-control" name="vendor_name">
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label>Email</label>
                      <input type="email" class="form-control" name="vendor_email">
                    </div>
                    <div class="form-group col-6">
                      <label>Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="vendor_mob" placeholder="+91">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="vendor_dob">Date Of Birth</label>
                      <input id="vendor_dob" type="date" class="form-control" name="vendor_dob">
                    </div>
                    <div class="form-group col-6">
                      <label>Package Price</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            ₹
                          </div>
                        </div>
                        <input type="text" class="form-control currency" name="vendor_per_package_price">
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
                        <input type="text" class="form-control currency" name="vendor_map_location">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Address Of Vendor</label>
                      <input type="text" class="form-control" name="vendor_address">
                    </div>
                    <div class="form-group">
                      <label>Summary</label>
                      <input type="text" class="form-control" name="vendor_summary">
                    </div>
                    <div class="form-group">
                      <label>Vendor Description</label>
                      <input type="text" class="form-control" name="vendor_description">
                    </div>
                    <div class="form-group">
                      <label>Terms & Conditions</label>
                      <input type="text" class="form-control" name="vendor_tnc">
                    </div>
                    <div class="form-group">
                      <label>Upload Images</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="vendor_pic">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="vendor_pass" class="d-block">Password</label>
                      <input id="vendor_pass" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="vendor_pass" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="vendor_cpass" class="d-block">Confirm Password</label>
                      <input id="vendor_cpass" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="vendor_cpass" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                  </div>
                    <div>
                      <pre></pre>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" name="insert">Submit</button>
                    <button class="btn btn-secondary" type="reset" name="reset">Reset</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </section>

        <?php 

        if(empty($_POST['vendor_email']))
        {
          echo "Email Cant Be Empty";
        }
        elseif(empty($_POST['vendor_pass'] && $_POST['vendor_cpass']))
        {
          echo "Password is Required!!!";
        }
        elseif ($_POST['vendor_pass'] != $_POST['vendor_cpass'])
        {
          echo "Your Passwords Do Not Match";
        }
        else
        {

          if (isset($_POST['insert']))
          {

            $vendor_type = $_POST['vendor_type'];
            $vendor_fname = $_POST['vendor_fname'];
            $vendor_lname = $_POST['vendor_lname'];
            $vendor_name = $_POST['vendor_name'];
            $vendor_mob = $_POST['vendor_mob'];
            $vendor_dob = $_POST['vendor_dob'];
            $vendor_email = $_POST['vendor_email'];
            $vendor_per_package_price = $_POST['vendor_per_package_price'];
            $vendor_map_location = $_POST['vendor_map_location'];
            $vendor_address = $_POST['vendor_address'];
            $vendor_summary = $_POST['vendor_summary'];
            $vendor_description = $_POST['vendor_description'];
            $vendor_tnc = $_POST['vendor_tnc'];
            $vendor_pass = $_POST['vendor_pass'];
            $vendor_cpass = $_POST['vendor_cpass'];
  
            $vendor_pic_old_name = $_FILES['vendor_pic']['name'];
            $vendor_pic_tmp_name = $_FILES['vendor_pic']['tmp_name'];
            $vendor_pic_size = $_FILES['vendor_pic']['size'];
            $vendor_pic_error = $_FILES['vendor_pic']['error'];
            $vendor_pic_type = $_FILES['vendor_pic']['type'];
            $vendor_pic_ext = explode('.', $vendor_pic_old_name);
            $vendor_pic_actual_ext = strtolower(end($vendor_pic_ext));
            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($vendor_pic_actual_ext, $allowed))
            {
              if ($vendor_pic_error === 0)
              {
                if ($vendor_pic_size < 100000000)
                {
                  $vendor_pic = $vendor_name."_".date('d-m-Y_his').".".$vendor_pic_actual_ext;

                  $dst = "../vendor/vendor_thumbnail/".$vendor_pic;
                }
                else
                {
                  echo "Your Image is too big!";
                }
              }
              else
              {
                echo "There was an Error Uploading Your Image!";
              }
            }
            else
            {
              echo "Cannot Upload Images Of This Type";
            } 

            $qry1 = "SELECT * FROM vendor_detail WHERE vendor_email = '$vendor_email'";

            $q1 = mysqli_query($conn, $qry1);

            $num = mysqli_num_rows($q1);

            if ($num == 1)
            {
              echo "Email Already Taken";
            }
            else
            {

              $qry2 = "INSERT INTO vendor_detail (vendor_id, vendor_fname, vendor_lname, vendor_name, vendor_mob, vendor_dob, vendor_doj, vendor_email, vendor_per_package_price, vendor_map_location, vendor_address, vendor_summary, vendor_description, vendor_tnc, vendor_pass, vendor_cpass, vendor_is_active, vendor_pic) VALUES ('$vendor_type', '$vendor_fname', '$vendor_lname', '$vendor_name', '$vendor_mob', '$vendor_dob', now(), '$vendor_email', '$vendor_per_package_price', '$vendor_map_location', '$vendor_address', '$vendor_summary', '$vendor_description', '$vendor_tnc', '$vendor_pass', '$vendor_cpass', 1, '$vendor_pic')";

              $q2 = mysqli_query($conn, $qry2);

              if ($q2)
              {

                $qwe = move_uploaded_file($vendor_pic_tmp_name, $dst);
                
              }

              $qry3 = mail($vendor_email, "bookmyevents", "Thank You ".$vendor_fname." ".$vendor_lname." For Becoming Vendor to our website");

              header('location: vendor-insert-form.php');

            }

          }

        }


        ?>
        <!-- Section Ends -->

        <!-- Setting Starts -->
          <?php include 'setting.php'; ?>
        <!-- Settings Ends -->

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
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


</html>