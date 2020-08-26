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
                    <h4>Insert Your Gallery Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="gallery_title">Title:</label>
                      <input id="gallery_title" type="text" class="form-control" name="gallery_title">
                    </div>
                    <div class="form-group col-6">
                      <label for="gallery_subtitle">Subtitle:</label>
                      <input id="gallery_subtitle" type="text" class="form-control" name="gallery_subtitle">
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="gallery_date">Date:</label>
                      <input id="gallery_date" type="date" class="form-control" name="gallery_date">
                    </div>  
                    <div class="form-group col-6">
                      <label>Upload Image:</label>
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" name="gallery_pic">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                    
                    </div> 
                    
                    <div class="form-group">
                      <label> Upload video link:</label>
                      <input id="gallery_video" type="text" class="form-control" name="gallery_video">
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
            $gallery_title = $_POST['gallery_title'];
            $gallery_subtitle = $_POST['gallery_subtitle'];
            $gallery_date = $_POST['gallery_date'];
            $gallery_video = $_POST['gallery_video'];
         
            $gallery_pic_old_name = $_FILES['gallery_pic']['name'];
            $gallery_pic_tmp_name = $_FILES['gallery_pic']['tmp_name'];
            $gallery_pic_size = $_FILES['gallery_pic']['size'];
            $gallery_pic_error = $_FILES['gallery_pic']['error'];
            $gallery_pic_type = $_FILES['gallery_pic']['type'];
            $gallery_pic_ext = explode('.', $gallery_pic_old_name);
            $gallery_pic_actual_ext = strtolower(end($gallery_pic_ext));
            $allowed = array('jpg', 'jpeg', 'png');
            date_default_timezone_set('Asia/Kolkata');

            if (in_array($gallery_pic_actual_ext, $allowed))
            {
              if ($gallery_pic_error === 0)
              {
                if ($gallery_pic_size < 100000000)
                {
                  $gallery_pic = $gallery_title."_".date('d-m-Y_his').".".$gallery_pic_actual_ext;

                  $dst = "../user/gallery_thumbnail/".$gallery_pic;

                  move_uploaded_file($gallery_pic_tmp_name, $dst);
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

            $qry2 = "INSERT INTO gallery (gallery_title, gallery_subtitle, gallery_date, gallery_pic, gallery_video) VALUES ('$gallery_title', '$gallery_subtitle', '$gallery_date', '$gallery_pic', '$gallery_video')";

            $q2 = mysqli_query($conn, $qry2);   

          }
       //   else
          {
       //     echo "Not Inserted"."<br>";
          //  echo $qry2;
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