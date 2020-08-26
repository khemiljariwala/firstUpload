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

        $qry = "SELECT * FROM admin_master WHERE aemail = '".$_SESSION['aemail']."'";

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
                      <img alt="image" src="admin_thumbnail/<?php echo $row['apic']; ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $row['afname']." ".$row['alname']; ?></a>
                      </div>
                      <div class="author-box-job">Admin</div>
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
                            <p class="text-muted"><?php echo $row['afname']." ".$row['alname']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['amob']; ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['aemail']; ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Birthday</strong>
                            <br>
                            <p class="text-muted"><?php echo $row['adob']; ?></p>
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
                                <input type="text" class="form-control" name="afname" value="<?php echo $row['afname']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="alname" value="<?php echo $row['alname']; ?>">
                                <div class="invalid-feedback">
                                  Please fill in the last name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-6">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" name="amob" value="<?php echo $row['amob']; ?>">
                              </div>
                              <div class="form-group col-6">
                                <label for="adob">Date Of Birth</label>
                                <input id="adob" type="date" class="form-control" name="adob" value="<?php echo $row['adob']; ?>">
                              </div>
                            </div>
                              <div class="form-group">
                                <label>Update Profile Picture</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="apic">
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

                        if (isset($_POST['update']))
                        {

                          $afname = $_POST['afname'];
                          $alname = $_POST['alname'];
                          $amob = $_POST['amob'];
                          $adob = $_POST['adob'];

                          $apic = $_FILES['apic']['name'];
                          $dst = "./admin_thumbnail/".$apic;


                          if ($apic == "")
                          {

                            $qry1 = "UPDATE admin_master SET afname = '$afname', alname = '$alname', amob = '$amob', adob = '$adob' WHERE aemail = '".$_SESSION['aemail']."'";

                            $q1 = mysqli_query($conn, $qry1);

                            if ($q1)
                            {
                              echo "Data Inserted";
                              header('location: profile.php');
                            }
                            else
                            {
                              echo "Data Not Inserted";
                            }

                          }
                          else
                          {
                            $qry1 = "UPDATE admin_master SET afname = '$afname', alname = '$alname', amob = '$amob', adob = '$adob', apic = '$apic' WHERE aemail = '".$_SESSION['aemail']."'";

                            move_uploaded_file($_FILES['apic']['tmp_name'], $dst);

                            $q1 = mysqli_query($conn, $qry1);

                            if ($q1)
                            {
                              echo "Data Inserted";
                              header('location: profile.php');
                            }
                            else
                            {
                              echo "Data Not Inserted";
                            }

                          }

                        }



                        if (isset($_POST['resetpass']))
                        {

                          if(isset($_SESSION['aemail']))
                          {

                            session_destroy();
                            header('location: auth-forgot-password.php');
                            
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