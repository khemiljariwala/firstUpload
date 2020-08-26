<?php ob_start(); ?>
<?php

  session_start();
  require('conn.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
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

      <?php 

        $qry = "SELECT * FROM venue_detail,venue_master WHERE venue_email = '".$_SESSION['venue_email']."'";

        $q = mysqli_query($conn, $qry);
        $row = mysqli_fetch_array($q);

      ?>

      <!-- Main Content -->
      <div class="main-content">

        <!-- Section Starts -->
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="venue_thumbnail/<?php echo $row['venue_pic']; ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $row['venue_fname']." ".$row['venue_lname']; ?></a>
                      </div>
                      <div class="author-box-job"><?php echo $row['venue_type']; ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_fname']." ".$row['venue_lname']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_mob']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_email']; ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Birthday</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_dob']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>Venue Name</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_name']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Capacity</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_capacity']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Your Per Day Price</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_per_day_price']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Address</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_address']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Summary</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_summary']; ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Description</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_description']; ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Terms And Condition</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['venue_tnc']; ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="POST" class="needs-validation" enctype="multipart/form-data">
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="venue_fname" value="<?php echo $row['venue_fname']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="venue_lname" value="<?php echo $row['venue_lname']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the last name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Venue Name</label>
                                <input type="text" class="form-control" name="venue_name" value="<?php echo $row['venue_name']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Venue Capacity</label>
                                <input type="text" class="form-control" name="venue_capacity" value="<?php echo $row['venue_capacity']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the Capacity
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="venue_email" value="<?php echo $row['venue_email'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                  <label for="venue_mob">Mobile Number</label>
                                  <div class="input-group">
                                  <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                  </div>
                                  </div>
                                  <input type="text" class="form-control phone-number" name="venue_mob" value="<?php echo $row['venue_mob'] ?>" placeholder="+91">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-6">
                                <label for="venue_fname">Date Of Birth</label>
                                <input id="venue_fname" type="date" class="form-control" name="venue_dob" value="<?php echo $row['venue_dob']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label>Per Day Price</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      ₹
                                    </div>
                                  </div>
                                  <input type="text" class="form-control currency" name="venue_per_day_price" value="<?php echo $row['venue_per_day_price']; ?>">
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
                              <input type="text" class="form-control" name="venue_address" value="<?php echo $row['venue_address'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Summary</label>
                              <input type="text" class="form-control" name="venue_summary" value="<?php echo $row['venue_summary'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Venue Description</label>
                              <input type="text" class="form-control" name="venue_description" value="<?php echo $row['venue_description'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Terms & Conditions</label>
                              <input type="text" class="form-control" name="venue_tnc" value="<?php echo $row['venue_tnc'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Update Profile Picture</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="venue_pic">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="card-footer text-right">
                              <button class="btn btn-primary" id="update" name="update">Save Changes</button>
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary" id="resetpass" name="resetpass">Reset Password</button>
                            </div>
                          </div>
                        </form>
                        <?php

                        if(empty($_POST['venue_email']))
                        {
                          echo "Email Cant Be Empty";
                        }
                        else
                        {

                          if (isset($_POST['update']))
                          {

                            $venue_fname = $_POST['venue_fname'];
                            $venue_lname = $_POST['venue_lname'];
                            $venue_name = $_POST['venue_name'];
                            $venue_capacity = $_POST['venue_capacity'];
                            $venue_per_day_price = $_POST['venue_per_day_price'];
                            $venue_map_location = $_POST['venue_map_location'];
                            $venue_mob = $_POST['venue_mob'];
                            $venue_dob = $_POST['venue_dob'];
                            $venue_email = $_POST['venue_email'];
                            $venue_address = $_POST['venue_address'];
                            $venue_summary = $_POST['venue_summary'];
                            $venue_description = $_POST['venue_description'];
                            $venue_tnc = $_POST['venue_tnc'];

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

                            if ($row['venue_email']==$venue_email)
                            {
                              if ($venue_pic == "")
                              {

                                $qry2 = "UPDATE venue_detail SET venue_fname = '$venue_fname', venue_lname = '$venue_lname', venue_name = '$venue_name', venue_capacity = '$venue_capacity', venue_per_day_price = '$venue_per_day_price', venue_map_location = '$venue_map_location', venue_mob = '$venue_mob', venue_dob = '$venue_dob', venue_email = '$venue_email', venue_address = '$venue_address', venue_summary = '$venue_summary', venue_description = '$venue_description', venue_tnc = '$venue_tnc' WHERE venue_email = '".$_SESSION['venue_email']."'";

                                $q2 = mysqli_query($conn, $qry2);

                                if ($q2)
                                {
                                  echo "Data Inserted";
                                  header('location: profile.php');
                                }
                                else
                                {
                                  echo $qry2;
                                  echo "Data Not Inserted";
                                }

                              }

                              else
                              {

                                $qry2 = "UPDATE venue_detail SET venue_fname = '$venue_fname', venue_lname = '$venue_lname', venue_name = '$venue_name', venue_capacity = '$venue_capacity', venue_per_day_price = '$venue_per_day_price', venue_map_location = '$venue_map_location', venue_mob = '$venue_mob', venue_dob = '$venue_dob', venue_email = '$venue_email', venue_address = '$venue_address', venue_summary = '$venue_summary', venue_description = '$venue_description', venue_tnc = '$venue_tnc', venue_pic = '$venue_pic' WHERE venue_email = '".$_SESSION['venue_email']."'";

                                $q2 = mysqli_query($conn, $qry2);

                                if ($q2)
                                {

                                  $qwe = move_uploaded_file($venue_pic_tmp_name, $dst);
                
                                }

                                $qry3 = mail($venue_email, "bookmyevents", "Hey  ".$venue_fname." ".$venue_lname." This mail is sent to notify you about the changes you have made on www.bookyourevents.com as a venue");

                                if ($q2)
                                {
                                  header('location: profile.php');
                                }
                                else
                                {
                                  echo $qry2;
                                  echo "Data Not Inserted";
                                }

                              }

                            }

                            elseif ($num==1)
                            {
                              echo "Email Already Taken";
                            }

                            else
                            {

                              if ($venue_pic == "")
                              {

                                $qry2 = "UPDATE venue_detail SET venue_fname = '$venue_fname', venue_lname = '$venue_lname', venue_name = '$venue_name', venue_capacity = '$venue_capacity', venue_per_day_price = '$venue_per_day_price', venue_map_location = '$venue_map_location', venue_mob = '$venue_mob', venue_dob = '$venue_dob', venue_email = '$venue_email', venue_address = '$venue_address', venue_summary = '$venue_summary', venue_description = '$venue_description', venue_tnc = '$venue_tnc' WHERE venue_email = '".$_SESSION['venue_email']."'";

                                $q2 = mysqli_query($conn, $qry2);

                                if ($q2)
                                {
                                  echo "Data Inserted";
                                  header('location: profile.php');
                                }
                                else
                                {
                                  echo $qry2;
                                  echo "Data Not Inserted";
                                }

                              }
                              else
                              {

                                $qry2 = "UPDATE venue_detail SET venue_fname = '$venue_fname', venue_lname = '$venue_lname', venue_name = '$venue_name', venue_capacity = '$venue_capacity', venue_per_day_price = '$venue_per_day_price', venue_map_location = '$venue_map_location', venue_mob = '$venue_mob', venue_dob = '$venue_dob', venue_email = '$venue_email', venue_address = '$venue_address', venue_summary = '$venue_summary', venue_description = '$venue_description', venue_tnc = '$venue_tnc', venue_pic = '$venue_pic' WHERE venue_email = '".$_SESSION['venue_email']."'";

                                $q2 = mysqli_query($conn, $qry2);

                                if ($q2)
                                {

                                  $qwe = move_uploaded_file($venue_pic_tmp_name, $dst);
                
                                }

                                $qry3 = mail($venue_email, "bookmyevents", "Hey  ".$venue_fname." ".$venue_lname." This mail is sent to notify you about the changes you have made on www.bookyourevents.com as a venue");

                                if ($q2)
                                {
                                  header('location: profile.php');
                                }
                                else
                                {
                                  echo $qry2;
                                  echo "Data Not Inserted";
                                }

                              }

                            }

                          }

                        }



                        if(isset($_POST['resetpass']))
                        {

                          if(isset($_SESSION['venue_email']))
                          {

                            session_destroy();
                            header('location: venue-forgot-password.php');
                            
                          }

                        }


                        ?>
                      </div>
                      <!-- Anything written below this will be seen in both about and edit profile panel -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Section Ends -->

        <!-- Settins Starts -->
          <?php include 'setting.php'; ?>
        <!-- Settings Ends -->

      </div>
      <!-- Main Content Ends -->

      <!-- Footer Starts -->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends -->
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>
<?php ob_start(); ?>