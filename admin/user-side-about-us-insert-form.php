<!DOCTYPE html>
<html lang="en">

<?php 

  include 'conn.php'; 

?>

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
                    <h4>Insert About Us Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Upload Image 1:</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="img_1">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Upload Image 2:</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="img_2">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class=" form-group col-6">
                        <label>Starting Prices:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              ₹
                            </div>
                          </div>
                          <input type="text" class="form-control currency" name="price">
                        </div>
                      </div>
                      <div class="form-group col-6">
                      <label for="title">Title:</label>
                      <input id="title" type="text" class="form-control" name="title">
                    </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Description:</label>
                        <textarea class="form-control" name="description"></textarea>
                      </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="list_1">Service 1:</label>
                      <input id="list_1" type="text" class="form-control" name="list_1">
                    </div>
                    <div class="form-group col-6">
                      <label for="list_2">Service 2:</label>
                      <input id="list_2" type="text" class="form-control" name="list_2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="list_3">Service 3:</label>
                      <input id="list_3" type="text" class="form-control" name="list_3">
                    </div>
                    <div class="form-group col-6">
                      <label for="list_4">Service 4:</label>
                      <input id="list_4" type="text" class="form-control" name="list_4">
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
           
            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $list_1 = $_POST['list_1'];
            $list_2 = $_POST['list_2'];
            $list_3 = $_POST['list_3'];
            $list_4 = $_POST['list_4'];

            $img_1 = $_FILES['img_1']['name'];
            $dst1 = "../user/aboutus_thumbnail/".$img_1;
            $img_2 = $_FILES['img_2']['name'];
            $dst2 = "../user/aboutus_thumbnail/".$img_2;
            
            $qry ="INSERT INTO about_us (title, img_1, img_2, price, description, list_1, list_2, list_3, list_4) VALUES ('$title', '$img_1', '$img_2', '$price', '$description', '$list_1', '$list_2', '$list_3', '$list_4' )";

            move_uploaded_file($_FILES['img_1']['tmp_name'], $dst1);
            move_uploaded_file($_FILES['img_2']['tmp_name'], $dst2);

            $q = mysqli_query($conn, $qry);

          }    

         ?>





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