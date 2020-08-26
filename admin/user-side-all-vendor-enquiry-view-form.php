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
</head>

<body>
  
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <!-- Header Starts -->
          <?php include 'header.php'; ?>
      <!-- Header Ends -->

      <?php

        $qryvendortype = "SELECT * FROM vendor_master ORDER BY vendor_type ASC";

        $qvendortype = mysqli_query($conn, $qryvendortype);

      ?>

      <!-- Main Content Starts -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Vendor Enquiries</h4>
                  </div>
                  <div class="card-body">
                    <!-- Vendor Type Dropdown -->
                    <div class="form-group">
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