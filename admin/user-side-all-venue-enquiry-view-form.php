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
  <!-- Common JS -->
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
        }
        else
        {
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

      <?php

        $qryvenuetype = "SELECT * FROM venue_master ORDER BY venue_type ASC";

        $qvenuetype = mysqli_query($conn, $qryvenuetype);

      ?>

      <!-- Main Content Starts -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Venue Enquiries</h4>
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