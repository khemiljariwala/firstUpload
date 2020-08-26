<!DOCTYPE html>
<html lang="en">
<?php include 'conn.php'; ?>

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
                    <h4>Insert Your Slider Images</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group col-12 col-md-6 col-lg-12">
                      <div class="form-group col-6">
                      <label for="slider_text_1">Slider-1-Text</label>
                      <input id="slider_text_1" type="text" class="form-control" name="slider_text_1">
                    </div>
                    <div class="form-group col-6">
                      <label for="slider_text_2">Slider-2-Text</label>
                      <input id="slider_text_2" type="text" class="form-control" name="slider_text_2">
                    </div>
                    <div class="form-group col-6">
                      <label for="slider_text_3">Slider-2-Text</label>
                      <input id="slider_text_3" type="text" class="form-control" name="slider_text_3">
                    </div>
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

        if (isset($_POST['insert']))
        {

          $slider_text_1 = $_POST['slider_text_1'];
          $slider_text_2 = $_POST['slider_text_2'];
          $slider_text_3 = $_POST['slider_text_3'];    

          $qry = "UPDATE website_details SET slider_text_1 = '$slider_text_1', slider_text_2 = '$slider_text_2',  slider_text_3 = '$slider_text_3' WHERE website_id = 0";


          $q = mysqli_query($conn, $qry);
          
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