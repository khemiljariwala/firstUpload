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
                    <h4>Insert Your Venue Details</h4>
                  </div>
                  <div class="card-body">
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

          if (isset($_POST['insert']))
          {

            $venue_type = $_POST['venue_type'];
            $venue_fname = $_POST['venue_fname'];
            $venue_lname = $_POST['venue_lname'];
            $venue_name = $_POST['venue_name'];
            $venue_capacity = $_POST['venue_capacity'];
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
  
            $venue_pic_old_name = $_FILES['venue_pic']['name'];
            $venue_pic_tmp_name = $_FILES['venue_pic']['tmp_name'];
            $venue_pic_size = $_FILES['venue_pic']['size'];
            $venue_pic_error = $_FILES['venue_pic']['error'];
            $venue_pic_type = $_FILES['venue_pic']['type'];
            $venue_pic_ext = explode('.', $venue_pic_old_name);
            $venue_pic_actual_ext = strtolower(end($venue_pic_ext));
            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($venue_pic_actual_ext, $allowed))
            {
              if ($venue_pic_error === 0)
              {
                if ($venue_pic_size < 100000000)
                {
                  $venue_pic = $venue_name."_".date('d-m-Y_his').".".$venue_pic_actual_ext;

                  $dst = "../venue/venue_thumbnail/".$venue_pic;
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

            $qry1 = "SELECT * FROM venue_detail WHERE venue_email = '$venue_email'";

            $q1 = mysqli_query($conn, $qry1);

            $num = mysqli_num_rows($q1);

            if ($num == 1)
            {
              echo "Email Already Taken";
            }
            else
            {

              $qry2 = "INSERT INTO venue_detail (venue_id, venue_fname, venue_lname, venue_name, venue_capacity, venue_mob, venue_dob, venue_doj, venue_email, venue_per_day_price, venue_map_location, venue_address, venue_summary, venue_description, venue_tnc, venue_pass, venue_cpass, venue_is_active, venue_pic) VALUES ('$venue_type', '$venue_fname', '$venue_lname', '$venue_name', '$venue_capacity', '$venue_mob', '$venue_dob', now(), '$venue_email', '$venue_per_day_price', '$venue_map_location', '$venue_address', '$venue_summary', '$venue_description', '$venue_tnc', '$venue_pass', '$venue_cpass', 1, '$venue_pic')";

              $q2 = mysqli_query($conn, $qry2);

              if ($q2)
              {

                $qwe = move_uploaded_file($venue_pic_tmp_name, $dst);
                
              }

              $qry3 = mail($venue_email, "bookmyevents", "Thank You ".$venue_fname." ".$venue_lname." For Becoming Venue to our website");

              header('location: venue-insert-form.php');

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