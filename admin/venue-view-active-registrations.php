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

        $qry = "SELECT * FROM venue_detail INNER JOIN venue_master ON venue_detail.venue_id = venue_master.venue_id WHERE venue_is_active = 1";


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
                    <h4>Venue Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Venue Name</th>
                            <th>Venue Type</th>
                            <th>Email</th>
                            <th>Capacity</th>
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
                            <td><?php echo $row['venue_name']; ?></td>
                            <td><?php echo $row['venue_type']; ?></td>
                            <td><?php echo $row['venue_email']; ?></td>
                            <td><?php echo $row['venue_capacity']; ?></td>
                            <td><?php echo $row['venue_mob']; ?></td>
                            <td><?php echo $row['venue_per_day_price']; ?></td>
                            <td><img src="../venue/venue_thumbnail/<?php echo $row['venue_pic']; ?>" width="50px" height="50px"></td>
                            <td><?php echo $row['venue_address']; ?></td>
                            <td>
                              <a href='venue-update-form.php?venue_detail_id=<?php echo $row['venue_detail_id']?>&venue_fname=<?php echo $row['venue_fname']?>&venue_lname=<?php echo $row['venue_lname']?>&venue_name=<?php echo $row['venue_name']?>&venue_type=<?php echo $row['venue_type']?>&venue_email=<?php echo $row['venue_email'] ?>&venue_capacity=<?php echo $row['venue_capacity']?>&venue_mob=<?php echo $row['venue_mob'] ?>&venue_dob=<?php echo $row['venue_dob'] ?>&venue_doj=<?php echo $row['venue_doj'] ?>&venue_per_day_price=<?php echo $row['venue_per_day_price'] ?>&venue_map_location=<?php echo $row['venue_map_location'] ?>&venue_pic=<?php echo $row['venue_pic'] ?>&venue_address=<?php echo $row['venue_address'] ?>&venue_summary=<?php echo $row['venue_summary'] ?>&venue_description=<?php echo $row['venue_description'] ?>&venue_tnc=<?php echo $row['venue_tnc'] ?>&venue_is_active=<?php echo $row['venue_is_active'] ?>&venue_pass=<?php echo $row['venue_pass'] ?>&venue_cpass=<?php echo $row['venue_cpass'] ?>' class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>

                              <a href='venue-is-active-2.php?venue_detail_id=<?php echo $row['venue_detail_id']?>' class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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