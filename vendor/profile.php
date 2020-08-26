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

        $qry = "SELECT * FROM vendor_detail,vendor_master WHERE vendor_email = '".$_SESSION['vendor_email']."'";

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
                      <img alt="image" src="vendor_thumbnail/<?php echo $row['vendor_pic']; ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $row['vendor_fname']." ".$row['vendor_lname']; ?></a>
                      </div>
                      <div class="author-box-job"><?php echo $row['vendor_type']; ?></div>
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
                            <p class="text-muted"><?php echo $row['vendor_fname']." ".$row['vendor_lname']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_mob']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_email']; ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Birthday</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_dob']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>Vendor Name</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_name']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Your Per Package Price</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_per_package_price']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Address</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_address']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Summary</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_summary']; ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Description</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_description']; ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Terms And Condition</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['vendor_tnc']; ?></p>
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
                                <input type="text" class="form-control" name="vendor_fname" value="<?php echo $row['vendor_fname']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="vendor_lname" value="<?php echo $row['vendor_lname']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the last name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Vendor Name</label>
                                <input type="text" class="form-control" name="vendor_name" value="<?php echo $row['vendor_name']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="vendor_email" value="<?php echo $row['vendor_email'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                  <label for="vendor_mob">Mobile Number</label>
                                  <div class="input-group">
                                  <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                  </div>
                                  </div>
                                  <input type="text" class="form-control phone-number" name="vendor_mob" value="<?php echo $row['vendor_mob'] ?>" placeholder="+91">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-6">
                                <label for="vendor_fname">Date Of Birth</label>
                                <input id="vendor_fname" type="date" class="form-control" name="vendor_dob" value="<?php echo $row['vendor_dob']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label>Package Price</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      ₹
                                    </div>
                                  </div>
                                  <input type="text" class="form-control currency" name="vendor_per_package_price" value="<?php echo $row['vendor_per_package_price']; ?>">
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
                              <input type="text" class="form-control" name="vendor_address" value="<?php echo $row['vendor_address'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Summary</label>
                              <input type="text" class="form-control" name="vendor_summary" value="<?php echo $row['vendor_summary'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Vendor Description</label>
                              <input type="text" class="form-control" name="vendor_description" value="<?php echo $row['vendor_description'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Terms & Conditions</label>
                              <input type="text" class="form-control" name="vendor_tnc" value="<?php echo $row['vendor_tnc'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Update Profile Picture</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="vendor_pic">
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

                        if(empty($_POST['vendor_email']))
                        {
                          echo "Email Cant Be Empty";
                        }
                        else
                        {

                          if (isset($_POST['update']))
                          {

                            $vendor_fname = $_POST['vendor_fname'];
                            $vendor_lname = $_POST['vendor_lname'];
                            $vendor_name = $_POST['vendor_name'];
                            $vendor_per_package_price = $_POST['vendor_per_package_price'];
                            $vendor_map_location = $_POST['vendor_map_location'];
                            $vendor_mob = $_POST['vendor_mob'];
                            $vendor_dob = $_POST['vendor_dob'];
                            $vendor_email = $_POST['vendor_email'];
                            $vendor_address = $_POST['vendor_address'];
                            $vendor_summary = $_POST['vendor_summary'];
                            $vendor_description = $_POST['vendor_description'];
                            $vendor_tnc = $_POST['vendor_tnc'];

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

                            if ($row['vendor_email']==$vendor_email)
                            {
                              if ($vendor_pic == "")
                              {

                                $qry2 = "UPDATE vendor_detail SET vendor_fname = '$vendor_fname', vendor_lname = '$vendor_lname', vendor_name = '$vendor_name', vendor_per_package_price = '$vendor_per_package_price', vendor_map_location = '$vendor_map_location', vendor_mob = '$vendor_mob', vendor_dob = '$vendor_dob', vendor_email = '$vendor_email', vendor_address = '$vendor_address', vendor_summary = '$vendor_summary', vendor_description = '$vendor_description', vendor_tnc = '$vendor_tnc' WHERE vendor_email = '".$_SESSION['vendor_email']."'";

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

                                $qry2 = "UPDATE vendor_detail SET vendor_fname = '$vendor_fname', vendor_lname = '$vendor_lname', vendor_name = '$vendor_name', vendor_per_package_price = '$vendor_per_package_price', vendor_map_location = '$vendor_map_location', vendor_mob = '$vendor_mob', vendor_dob = '$vendor_dob', vendor_email = '$vendor_email', vendor_address = '$vendor_address', vendor_summary = '$vendor_summary', vendor_description = '$vendor_description', vendor_tnc = '$vendor_tnc', vendor_pic = '$vendor_pic' WHERE vendor_email = '".$_SESSION['vendor_email']."'";

                                $q2 = mysqli_query($conn, $qry2);

                                if ($q2)
                                {

                                  $qwe = move_uploaded_file($vendor_pic_tmp_name, $dst);
                
                                }

                                $qry3 = mail($vendor_email, "bookmyevents", "Hey  ".$vendor_fname." ".$vendor_lname." This mail is sent to notify you about the changes you have made on www.bookyourevents.com as a vendor");

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

                              if ($vendor_pic == "")
                              {

                                $qry2 = "UPDATE vendor_detail SET vendor_fname = '$vendor_fname', vendor_lname = '$vendor_lname', vendor_name = '$vendor_name', vendor_per_package_price = '$vendor_per_package_price', vendor_map_location = '$vendor_map_location', vendor_mob = '$vendor_mob', vendor_dob = '$vendor_dob', vendor_email = '$vendor_email', vendor_address = '$vendor_address', vendor_summary = '$vendor_summary', vendor_description = '$vendor_description', vendor_tnc = '$vendor_tnc' WHERE vendor_email = '".$_SESSION['vendor_email']."'";

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

                                $qry2 = "UPDATE vendor_detail SET vendor_fname = '$vendor_fname', vendor_lname = '$vendor_lname', vendor_name = '$vendor_name', vendor_per_package_price = '$vendor_per_package_price', vendor_map_location = '$vendor_map_location', vendor_mob = '$vendor_mob', vendor_dob = '$vendor_dob', vendor_email = '$vendor_email', vendor_address = '$vendor_address', vendor_summary = '$vendor_summary', vendor_description = '$vendor_description', vendor_tnc = '$vendor_tnc', vendor_pic = '$vendor_pic' WHERE vendor_email = '".$_SESSION['vendor_email']."'";

                                $q2 = mysqli_query($conn, $qry2);

                                if ($q2)
                                {

                                  $qwe = move_uploaded_file($vendor_pic_tmp_name, $dst);
                
                                }

                                $qry3 = mail($vendor_email, "bookmyevents", "Hey  ".$vendor_fname." ".$vendor_lname." This mail is sent to notify you about the changes you have made on www.bookyourevents.com as a vendor");

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

                          if(isset($_SESSION['vendor_email']))
                          {

                            session_destroy();
                            header('location: vendor-forgot-password.php');
                            
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