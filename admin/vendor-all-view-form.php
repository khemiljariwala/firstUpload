<!DOCTYPE html>
<html lang="en">
<?php include 'conn.php'; ?>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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

        $vendor_type_query = $_GET['vendor_id'];


        $qry = "SELECT * FROM vendor_detail WHERE vendor_is_active = 1 AND vendor_id = ".$vendor_type_query;


        $q = mysqli_query($conn, $qry);

      ?>
      
      <!-- Main Content Starts -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Vendor Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Vendor Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = mysqli_fetch_array($q))
                          { ?>
                          <tr>
                            <td><?php echo $row['vendor_name']; ?></td>
                            <td><?php echo $row['vendor_email']; ?></td>
                            <td><?php echo $row['vendor_mob']; ?></td>
                            <td><?php echo $row['vendor_per_package_price']; ?></td>
                            <td><img src="../vendor/vendor_thumbnail/<?php echo $row['vendor_pic']; ?>" width="50px" height="50px"></td>
                            <td><?php echo $row['vendor_address']; ?></td>
                            <td>
                              <a href='vendor-update-form.php?vendor_detail_id=<?php echo $row['vendor_detail_id']?>&vendor_fname=<?php echo $row['vendor_fname']?>&vendor_lname=<?php echo $row['vendor_lname']?>&vendor_name=<?php echo $row['vendor_name']?>&vendor_email=<?php echo $row['vendor_email'] ?>&vendor_mob=<?php echo $row['vendor_mob'] ?>&vendor_dob=<?php echo $row['vendor_dob'] ?>&vendor_doj=<?php echo $row['vendor_doj'] ?>&vendor_per_package_price=<?php echo $row['vendor_per_package_price'] ?>&vendor_map_location=<?php echo $row['vendor_map_location'] ?>&vendor_pic=<?php echo $row['vendor_pic'] ?>&vendor_address=<?php echo $row['vendor_address'] ?>&vendor_summary=<?php echo $row['vendor_summary'] ?>&vendor_description=<?php echo $row['vendor_description'] ?>&vendor_tnc=<?php echo $row['vendor_tnc'] ?>&vendor_is_active=<?php echo $row['vendor_is_active'] ?>&vendor_pass=<?php echo $row['vendor_pass'] ?>&vendor_cpass=<?php echo $row['vendor_cpass'] ?>' class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>

                              <a href='vendor-is-active-2.php?vendor_detail_id=<?php echo $row['vendor_detail_id']?>' class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                            </td> 
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>

</body>


</html>