<!DOCTYPE html>
<html lang="en">
<?php require 'conn.php'; ?>

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

        $qry = "SELECT * FROM venue_detail WHERE venue_email = '".$_SESSION['venue_email']."'";

        $q = mysqli_query($conn, $qry);
        
        $row = mysqli_fetch_array($q);

      ?>

       <?php echo "Hello"." ".$row['venue_fname']; ?>

      <?php

        $qry1 = "SELECT * FROM venue_enquiry WHERE venue_detail_id = ".$row['venue_detail_id'];


         $q1 = mysqli_query($conn, $qry1);

      ?>
      
      <!-- Main Content Starts -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Date</th>
                            <th>Budget</th>
                            <th>Message</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row1 = mysqli_fetch_array($q1))
                          { ?>
                          <tr>
                            <td><?php echo $row1['enquiry_first_name']; ?></td>
                            <td><?php echo $row1['enquiry_last_name']; ?></td>
                            <td><?php echo $row1['enquiry_email']; ?></td>
                            <td><?php echo $row1['enquiry_mob']; ?></td>
                            <td><?php echo $row1['enquiry_date']; ?></td>
                            <td><?php echo $row1['enquiry_budget']; ?></td>
                            <td><?php echo $row1['enquiry_msg']; ?></td> 
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