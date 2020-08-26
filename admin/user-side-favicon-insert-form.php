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
                    <h4>Insert Your Favicon Image</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group col-12 col-md-6 col-lg-12">
                       <div class="form-group">
                       <label>Favicon Image:</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="favicon">
                      <label class="custom-file-label" for="customFile">Choose file</label>
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

        
          function resizeImage($resourceType,$image_width,$image_height)
          {
            $resizeWidth = 16;
            $resizeHeight = 16;
            $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
            imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
            return $imageLayer;
          }

          if(isset($_POST['insert']))
          {

            $allowTypes = array('jpg','png','jpeg','gif'); 
 
            $fileName = $_FILES['favicon']['name']; 

            if(!empty($fileName))
            { 
      
                $sourceProperties = getimagesize($_FILES['favicon']['tmp_name']);
                $resizeFileName = "favicon";
                $uploadPath = "../user/favicon_thumbnail/";
                $fileExt = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
                $uploadImageType = $sourceProperties[2];
                $sourceImageWidth = $sourceProperties[0];
                $sourceImageHeight = $sourceProperties[1];

                switch ($uploadImageType)
                {
                  case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($_FILES['favicon']['tmp_name']); 
                    $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                    imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                    break;

                  case IMAGETYPE_GIF:
                    $resourceType = imagecreatefromgif($_FILES['favicon']['tmp_name']); 
                    $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                    imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                    break;

                  case IMAGETYPE_PNG:
                    $resourceType = imagecreatefrompng($_FILES['favicon']['tmp_name']); 
                    $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                    imagepng($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                    break;

                  default:
                    $imageProcess = 0;
                    break;
                }

                if(file_exists($resizeFileName))
                {
                  unlink($resizeFileName);
                }

                if(move_uploaded_file($_FILES['favicon']['name'], $uploadPath. $resizeFileName. ".". $fileExt));
                {
                  $imageProcess = 1;
        
                }

                $favicon = $resizeFileName. ".". $fileExt;

                $qry2 = "UPDATE website_details SET favicon = '$favicon' WHERE website_id = 0";

                $q2 = mysqli_query($conn, $qry2);   
      
            }
            else
            { 
              echo 'Please select a file to upload.'; 
            } 
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