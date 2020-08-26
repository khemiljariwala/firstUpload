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
                      <div class="form-group">
                       <label>slider image 1:</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="slider_img_1">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                    <div class="form-group">
                       <label>slider image 2:</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="slider_img_2">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                    <div class="form-group">
                       <label>slider image 3:</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="slider_img_3">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
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
            $resizeWidth = 1382;
            $resizeHeight = 806;
            $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
            imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
            return $imageLayer;
          }

          if(isset($_POST['insert']))
          {

            $allowTypes = array('jpg','png','jpeg','gif'); 
 
            $fileName1 = $_FILES['slider_img_1']['name'];
            $fileName2 = $_FILES['slider_img_2']['name'];
            $fileName3 = $_FILES['slider_img_3']['name'];

            if(!empty($fileName1))
            { 
      
              $sourceProperties = getimagesize($_FILES['slider_img_1']['tmp_name']);
              $resizeFileName = "slider_img_1";
              $uploadPath = "../user/slider_thumbnail/";
              $fileExt = pathinfo($_FILES['slider_img_1']['name'], PATHINFO_EXTENSION);
              $uploadImageType = $sourceProperties[2];
              $sourceImageWidth = $sourceProperties[0];
              $sourceImageHeight = $sourceProperties[1];

              switch ($uploadImageType)
              {
                case IMAGETYPE_JPEG:
                  $resourceType = imagecreatefromjpeg($_FILES['slider_img_1']['tmp_name']); 
                  $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                  imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                  break;

                case IMAGETYPE_GIF:
                  $resourceType = imagecreatefromgif($_FILES['slider_img_1']['tmp_name']); 
                  $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                  imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                  break;

                case IMAGETYPE_PNG:
                  $resourceType = imagecreatefrompng($_FILES['slider_img_1']['tmp_name']); 
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

              if(move_uploaded_file($_FILES['slider_img_1']['name'], $uploadPath. $resizeFileName. ".". $fileExt));
              {
                $imageProcess = 1;
      
              }

              $slider_img_1 = $resizeFileName. ".". $fileExt;

              $qry2 = "UPDATE website_details SET slider_img_1 = '$slider_img_1' WHERE website_id = 0";

              $q2 = mysqli_query($conn, $qry2);   
      
            }
            else
            { 
              echo 'Please select slider image 1 file to upload.'.'<br>'; 
            }


            if(!empty($fileName2))
            { 
      
              $sourceProperties = getimagesize($_FILES['slider_img_2']['tmp_name']);
              $resizeFileName = "slider_img_2";
              $uploadPath = "../user/slider_thumbnail/";
              $fileExt = pathinfo($_FILES['slider_img_2']['name'], PATHINFO_EXTENSION);
              $uploadImageType = $sourceProperties[2];
              $sourceImageWidth = $sourceProperties[0];
              $sourceImageHeight = $sourceProperties[1];

              switch ($uploadImageType)
              {
                case IMAGETYPE_JPEG:
                  $resourceType = imagecreatefromjpeg($_FILES['slider_img_2']['tmp_name']); 
                  $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                  imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                  break;

                case IMAGETYPE_GIF:
                  $resourceType = imagecreatefromgif($_FILES['slider_img_2']['tmp_name']); 
                  $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                  imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                  break;

                case IMAGETYPE_PNG:
                  $resourceType = imagecreatefrompng($_FILES['slider_img_2']['tmp_name']); 
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

              if(move_uploaded_file($_FILES['slider_img_2']['name'], $uploadPath. $resizeFileName. ".". $fileExt));
              {
                $imageProcess = 1;
      
              }

              $slider_img_2 = $resizeFileName. ".". $fileExt;

              $qry2 = "UPDATE website_details SET slider_img_2 = '$slider_img_2' WHERE website_id = 0";

              $q2 = mysqli_query($conn, $qry2);   
      
            }
            else
            { 
              echo 'Please select slider image 2 file to upload.'.'<br>'; 
            }



            if(!empty($fileName3))
            { 
      
              $sourceProperties = getimagesize($_FILES['slider_img_3']['tmp_name']);
              $resizeFileName = "slider_img_3";
              $uploadPath = "../user/slider_thumbnail/";
              $fileExt = pathinfo($_FILES['slider_img_3']['name'], PATHINFO_EXTENSION);
              $uploadImageType = $sourceProperties[2];
              $sourceImageWidth = $sourceProperties[0];
              $sourceImageHeight = $sourceProperties[1];

              switch ($uploadImageType)
              {
                case IMAGETYPE_JPEG:
                  $resourceType = imagecreatefromjpeg($_FILES['slider_img_3']['tmp_name']); 
                  $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                  imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                  break;

                case IMAGETYPE_GIF:
                  $resourceType = imagecreatefromgif($_FILES['slider_img_3']['tmp_name']); 
                  $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                  imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                  break;

                case IMAGETYPE_PNG:
                  $resourceType = imagecreatefrompng($_FILES['slider_img_3']['tmp_name']); 
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

              if(move_uploaded_file($_FILES['slider_img_3']['name'], $uploadPath. $resizeFileName. ".". $fileExt));
              {
                $imageProcess = 1;
      
              }

              $slider_img_3 = $resizeFileName. ".". $fileExt;

              $qry2 = "UPDATE website_details SET slider_img_3 = '$slider_img_3' WHERE website_id = 0";

              $q2 = mysqli_query($conn, $qry2);   
      
            }
            else
            { 
              echo 'Please select slider image 3 file to upload.'.'<br>'; 
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