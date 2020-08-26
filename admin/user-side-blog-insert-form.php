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
                    <h4>Insert Your Blog Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="blog_date">Event Date:</label>
                      <input id="blog_date" type="date" class="form-control" name="blog_date">
                    </div>
                    <div class="form-group col-6">
                      <label for="blog_title">Event Title:</label>
                      <input id="blog_title" type="text" class="form-control" name="blog_title">
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label>Upload Images:</label>
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" name="blog_pic">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="user_name">User Name:</label>
                      <input id="user_name" type="text" class="form-control" name="user_name">
                    </div>
                    </div> 
                    
                    <div class="form-group">
                      <label> Description:</label>
                      <textarea class="form-control" name="blog_description"></textarea>
                    </div>
                    
                    <div>
                      <pre></pre>
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

          if(isset($_POST['insert']))
          {
            $blog_date = $_POST['blog_date'];
            $blog_title = $_POST['blog_title'];
            $blog_description = $_POST['blog_description'];
            $user_name = $_POST['user_name'];

            $blog_pic_old_name = $_FILES['blog_pic']['name'];
            $blog_pic_tmp_name = $_FILES['blog_pic']['tmp_name'];
            $blog_pic_size = $_FILES['blog_pic']['size'];
            $blog_pic_error = $_FILES['blog_pic']['error'];
            $blog_pic_type = $_FILES['blog_pic']['type'];
            $blog_pic_ext = explode('.', $blog_pic_old_name);
            $blog_pic_actual_ext = strtolower(end($blog_pic_ext));
            $allowed = array('jpg', 'jpeg', 'png');
            date_default_timezone_set('Asia/Kolkata');

            if (in_array($blog_pic_actual_ext, $allowed))
            {
              if ($blog_pic_error === 0)
              {
                if ($blog_pic_size < 100000000)
                {
                  $blog_pic = $blog_title."_".date('d-m-Y_his').".".$blog_pic_actual_ext;

                  $dst = "../user/blog_thumbnail/".$blog_pic;

                  move_uploaded_file($blog_pic_tmp_name, $dst);
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

            $qry2 = "INSERT INTO blog (blog_date, blog_pic, blog_title, blog_description, user_name) VALUES ('$blog_date', '$blog_pic', '$blog_title', '$blog_description', '$user_name')";

            $q2 = mysqli_query($conn, $qry2);   

          }
          else
          {
            echo "Fill Details and Press Submit"."<br>";
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