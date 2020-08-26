<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php

  session_start();
  require('conn.php');

?>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/bundles/morris/morris.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <!-- Common JS -->
  <script src="assets/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#ddvendortype').on('change', function(){
        var vendorID = $(this).val();
        if(vendorID)
        {
          $.ajax({
            type:'POST',
            url: 'ajaxfillvendordropdown.php',
            data: 'vendor_id='+vendorID,
            success: function(html)
            {
              $('#ddvendorname').html(html);
            }
          });
        }
        else
        {
          $('#ddvendorname').html('<option value="">Select Vendor Type First</option>');
        }
      });



   $('#ddvendorname').on('change', function(){
        var ddvendornameID = $(this).val();
           if(ddvendornameID){
            $.ajax({
                type:'POST',
                url:'ajaxfillvendortable.php',
                data: 'ddvendornameID='+ddvendornameID,
                success:function(data){
                     $('#vendor_enquiry_table').html(data);  
                }
            }); 
        }else{
            $('#vendor_enquiry_table').html(data);  
        }
    });



    });
  </script>
  <script src="assets/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#ddvenuetype').on('change', function(){
        var venueID = $(this).val();
        if(venueID)
        {
          $.ajax({
            type:'POST',
            url: 'ajaxfillvenuedropdown.php',
            data: 'venue_id='+venueID,
            success: function(html)
            {
              $('#ddvenuename').html(html);
            }
          });
        }
        else
        {
          $('#ddvenuename').html('<option value="">Select Venue Type First</option>');
        }
      });



   $('#ddvenuename').on('change', function(){
        var ddvenuenameID = $(this).val();
           if(ddvenuenameID){
            $.ajax({
                type:'POST',
                url:'ajaxfillvenuetable.php',
                data: 'ddvenuenameID='+ddvenuenameID,
                success:function(data){
                     $('#venue_enquiry_table').html(data);  
                }
            }); 
        }else{
            $('#venue_enquiry_table').html(data);  
        }
    });



    });
  </script>
</head>

<body>

  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <!-- Header Starts -->
          <?php include 'header.php'; ?>
      <!-- Header Ends -->

      <!-- Main Content Starts-->
      <div class="main-content">

      <!-- Section Starts -->
        <section class="section">
        </section>
      <!-- Section Ends -->

      <!-- php code for fetching admin details -->
      <?php 

        $qry = "SELECT * FROM admin_master WHERE aemail = '".$_SESSION['aemail']."'";

        $q = mysqli_query($conn, $qry);

        $row = mysqli_fetch_array($q);

      ?>

        <?php echo 'Hello'." ".$row['afname']; ?>

        <!-- php code for fetching new Registered Vendors -->
        <?php 

          $qry0 = "SELECT count(vendor_detail_id) AS total0 FROM vendor_detail WHERE vendor_is_active = 0";

          $q0 = mysqli_query($conn, $qry0);

          $values0 = mysqli_fetch_assoc($q0);

          $num_rows0 = $values0['total0'];

       ?>

       <!-- php code for fetching Active Vendors -->
        <?php 

          $qry1 = "SELECT count(vendor_detail_id) AS total1 FROM vendor_detail WHERE vendor_is_active = 1";

          $q1 = mysqli_query($conn, $qry1);

          $values1 = mysqli_fetch_assoc($q1);

          $num_rows1 = $values1['total1'];

       ?>

       <!-- php code for fetching unactive Registered Vendors -->
        <?php 

          $qry2 = "SELECT count(vendor_detail_id) AS total2 FROM vendor_detail WHERE vendor_is_active = 2";

          $q2 = mysqli_query($conn, $qry2);

          $values2 = mysqli_fetch_assoc($q2);

          $num_rows2 = $values2['total2'];

       ?>

       <!-- php code for Total Number Of Vendors -->
        <?php 

          $qry3 = "SELECT count(vendor_detail_id) AS total3 FROM vendor_detail";

          $q3 = mysqli_query($conn, $qry3);

          $values3 = mysqli_fetch_assoc($q3);

          $num_rows3 = $values3['total3'];

       ?>


        <!-- Vendor Cards Starts -->
        <div class="row">

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="vendor-view-new-registrations.php">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-purple">
                <i class="fas fa-user-plus"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows0 ; ?>
                    </h3>
                    <span class="text-muted">New Registered Vendors</span>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="vendor-view-active-registrations.php">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-green">
                <i class="fas fa-user-check"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows1 ; ?>
                    </h3>
                    <span class="text-muted">Active Vendors</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="vendor-view-unactive-registrations.php">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-cyan">
                <i class="fas fa-user-slash"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows2 ; ?>
                    </h3>
                    <span class="text-muted">Unactive Vendors</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-orange">
                <i class="fas fa-users"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows3 ; ?>
                    </h3>
                    <span class="text-muted">Total Number Of Vendors</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- Vendor Cards Ends -->

        <!-- php code for fetching new Registered Venues -->
        <?php 

          $qry0 = "SELECT count(venue_detail_id) AS total0 FROM venue_detail WHERE venue_is_active = 0";

          $q0 = mysqli_query($conn, $qry0);

          $values0 = mysqli_fetch_assoc($q0);

          $num_rows0 = $values0['total0'];

       ?>

       <!-- php code for fetching Active Venues -->
        <?php 

          $qry1 = "SELECT count(venue_detail_id) AS total1 FROM venue_detail WHERE venue_is_active = 1";

          $q1 = mysqli_query($conn, $qry1);

          $values1 = mysqli_fetch_assoc($q1);

          $num_rows1 = $values1['total1'];

       ?>

       <!-- php code for fetching new Registered Venues -->
        <?php 

          $qry2 = "SELECT count(venue_detail_id) AS total2 FROM venue_detail WHERE venue_is_active = 2";

          $q2 = mysqli_query($conn, $qry2);

          $values2 = mysqli_fetch_assoc($q2);

          $num_rows2 = $values2['total2'];

       ?>

       <!-- php code for Total Number Of Venues -->
        <?php 

          $qry3 = "SELECT count(venue_detail_id) AS total3 FROM venue_detail";

          $q3 = mysqli_query($conn, $qry3);

          $values3 = mysqli_fetch_assoc($q3);

          $num_rows3 = $values3['total3'];

       ?>

        <!-- Venue Cards Ends -->
        <div class="row">

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="venue-view-new-registrations.php">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-purple">
                <i class="fas fa-user-plus"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows0 ; ?>
                    </h3>
                    <span class="text-muted">New Registered Venues</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="venue-view-active-registrations.php">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-green">
                <i class="fas fa-user-check"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows1 ; ?>
                    </h3>
                    <span class="text-muted">Active Venues</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="venue-view-unactive-registrations.php">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-cyan">
                <i class="fas fa-user-slash"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows2 ; ?>
                    </h3>
                    <span class="text-muted">Unactive Venues</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-orange">
                <i class="fas fa-users"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> <?php echo $num_rows3 ; ?>
                    </h3>
                    <span class="text-muted">Total Number Of Venues</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- Venue Cards Ends -->


        <!-- php code for vendor type % in donut chart -->
        <?php 

          $vendor_query = "SELECT vendor_type, COUNT(vendor_detail.vendor_detail_id) AS totalvendortype FROM vendor_detail, vendor_master WHERE vendor_detail.vendor_id = vendor_master.vendor_id GROUP BY vendor_detail.vendor_id";
          $vendor_result = mysqli_query($conn, $vendor_query);
          $data = array();
          
          while($row1 = mysqli_fetch_array($vendor_result))
          {
            $data[] = array('label'  => $row1["vendor_type"], 'value'  => $row1["totalvendortype"]);    
          }
           
          $data = json_encode($data);

        ?>

        <!-- php code for vendor type % in donut chart -->
        <?php 

          $venue_query = "SELECT venue_type, COUNT(venue_detail.venue_detail_id) AS totalvenuetype FROM venue_detail, venue_master WHERE venue_detail.venue_id = venue_master.venue_id GROUP BY venue_detail.venue_id";
          $venue_result = mysqli_query($conn, $venue_query);
          $data2 = array();
          
          while($row2 = mysqli_fetch_array($venue_result))
          {
            $data2[] = array('label'  => $row2["venue_type"], 'value'  => $row2["totalvenuetype"]);    
          }
           
          $data2 = json_encode($data2);

        ?>


        
        <!-- Chart Code Starts -->
            <div class="row">

              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Vendor Type Analysis</h4>
                  </div>
                  <div class="card-body">
                    <div id="donut_chart_vendor" class="graph"></div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Venue Type Analysis</h4>
                  </div>
                  <div class="card-body">
                    <div id="donut_chart_venue" class="graph"></div>
                  </div>
                </div>
              </div>

            </div>
        <!-- Chart Code Ends -->

        <!-- Revenue Code Starts -->

          <div class="row">

            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h4>Vendor Revenue</h4>
                </div>
                <div class="card-body">
                    <!-- Vendor Type Dropdown -->
                    <div class="form-group">
                      <?php

                        $qryvendortype = "SELECT * FROM vendor_master ORDER BY vendor_type ASC";

                        $qvendortype = mysqli_query($conn, $qryvendortype);

                      ?>
                      <label>Your Vendor Type</label>
                      <select class="custom-select" id="ddvendortype" name="ddvendortype">
                        <option value="">Select Vendor</option>
                      <?php 
                      if (mysqli_num_rows($qvendortype) > 0)
                      {
                        while($rowvendortype = mysqli_fetch_array($qvendortype))
                        {
                      
                     
                      ?>

                        <option value="<?php echo $rowvendortype['vendor_id'];?>"><?php echo $rowvendortype['vendor_type'] ?></option>

                      <?php
                        }
                      }
                      else
                      {
                      ?>

                        <option value="">Vendor Not Available!!!</option>

                      <?php
                        
                      }
                      ?>
                      </select>
                    </div>
                    <!-- Vendor Name Dropdown -->
                    <div class="form-group">
                      <?php

                        $qryvenuetype = "SELECT * FROM venue_master ORDER BY venue_type ASC";

                        $qvenuetype = mysqli_query($conn, $qryvenuetype);

                      ?>
                      <label>Your Vendor Name</label>
                      <select class="custom-select" id="ddvendorname" name="ddvendorname">

                        <option value="">Select Vendor First</option>
                      
                      </select>
                    </div>

                   
                 
                    <div id="vendor_enquiry_table">
    
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h4>Venue Revenue</h4>
                </div>
                <div class="card-body">
                    <!-- Venue Type Dropdown -->
                    <div class="form-group">
                      <label>Your Venue Type</label>
                      <select class="custom-select" id="ddvenuetype" name="ddvenuetype">
                        <option value="">Select Venue</option>
                      <?php 
                      if (mysqli_num_rows($qvenuetype) > 0)
                      {
                        while($rowvenuetype = mysqli_fetch_array($qvenuetype))
                        {
                      
                     
                      ?>

                        <option value="<?php echo $rowvenuetype['venue_id'];?>"><?php echo $rowvenuetype['venue_type'] ?></option>

                      <?php
                        }
                      }
                      else
                      {
                      ?>

                        <option value="">Venue Not Available!!!</option>

                      <?php
                        
                      }
                      ?>
                      </select>
                    </div>
                    <!-- Venue Name Dropdown -->
                    <div class="form-group">
                      <label>Your Venue Name</label>
                      <select class="custom-select" id="ddvenuename" name="ddvenuename">

                        <option value="">Select Venue First</option>
                      
                      </select>
                    </div>

                   
                 
                    <div id="venue_enquiry_table">
    
                    </div>
                  </div>
              </div>
            </div>

          </div>

        <!-- Revenue Code Ends -->        

        <!-- Setting Starts -->
            <?php include 'setting.php'; ?>
        <!-- Setting Ends -->


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
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <script src="assets/bundles/morris/morris.min.js"></script>
  <script src="assets/bundles/morris/raphael-min.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
    <script>
    Morris.Donut({
            element: 'donut_chart_vendor',
            data: <?php echo $data; ?>,
            colors: ['rgb(255, 206, 86)', 'rgb(65, 196, 216)', 'rgb(109, 109, 109)', 'rgb(255, 99, 132)', 'rgb(75, 192, 192)', 'rgb(215, 17, 192)', 'rgb(215, 192, 12)', 'rgb(25, 92, 12)', 'rgb(15, 19, 192)', 'rgb(205, 102, 112)'],
            
        });

    Morris.Donut({
            element: 'donut_chart_venue',
            data: <?php echo $data2; ?>,
            colors: ['rgb(241, 194, 125)', 'rgb(65, 196, 216)', 'rgb(109, 109, 109)', 'rgb(255, 99, 132)', 'rgb(75, 192, 192)', 'rgb(215, 17, 192)', 'rgb(215, 192, 12)', 'rgb(25, 92, 12)', 'rgb(15, 19, 192)', 'rgb(205, 102, 112)'],
        });
  </script>
</body>

</html>
<?php ob_flush(); ?>