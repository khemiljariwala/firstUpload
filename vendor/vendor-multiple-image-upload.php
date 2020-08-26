<!DOCTYPE html>
<html lang="en">

<?php 
  
  require('conn.php');

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
  <link rel="stylesheet" href="assets/toastr.min.css">
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

        <!-- Section Starts -->
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Multiple Upload</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="mydropzone">
                      <!-- some problem with this div with class fallback else working fine -->
                      
                        <input type="file" name="vendor_images[]" id="vendor_images" multiple="">
                      
                  </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit" name="insert">Submit</button>
                        <button class="btn btn-secondary" type="reset" name="reset">Reset</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php

$qry = "SELECT * FROM vendor_detail WHERE vendor_email = '".$_SESSION['vendor_email']."'";

$q = mysqli_query($conn, $qry);

$row = mysqli_fetch_array($q);

$qry1 = "SELECT * FROM vendor_gallery WHERE vendor_detail_id = '".$row['vendor_detail_id']."'";

$q1 = mysqli_query($conn, $qry1);

$num = mysqli_num_rows($q1);

if ($num == 1)
{
  function resizeImage($resourceType,$image_width,$image_height)
  {
    $resizeWidth = 1280;
    $resizeHeight = 720;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
  }

  if(isset($_POST['insert']))
  {

    $insertValuesSQL='';
    $allowTypes = array('jpg','png','jpeg','gif'); 
 
    $fileName = array_filter($_FILES['vendor_images']['name']); 

    if(!empty($fileName))
    { 
      $i=0;
      foreach($_FILES['vendor_images']['name'] as $key=>$val)
      {

        $i+=1;
        $sourceProperties = getimagesize($_FILES['vendor_images']['tmp_name'][$key]);
        date_default_timezone_set('Asia/Kolkata');
        $resizeFileName = $row['vendor_detail_id']."_".$i;
        $uploadPath = "vendor_gallery/";
        $fileExt = pathinfo($_FILES['vendor_images']['name'][$key], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType)
        {
          case IMAGETYPE_JPEG:
            $resourceType = imagecreatefromjpeg($_FILES['vendor_images']['tmp_name'][$key]); 
            $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
            imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
            break;

          case IMAGETYPE_GIF:
            $resourceType = imagecreatefromgif($_FILES['vendor_images']['tmp_name'][$key]); 
            $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
            imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
            break;

          case IMAGETYPE_PNG:
            $resourceType = imagecreatefrompng($_FILES['vendor_images']['tmp_name'][$key]); 
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

        if(move_uploaded_file($_FILES['vendor_images']['name'][$key], $uploadPath. $resizeFileName. ".". $fileExt));
        {
          $imageProcess = 1;
          $insertValuesSQL .= $resizeFileName.".".$fileExt.",";
        }

      }

      if(!empty($insertValuesSQL))
      { 

        $qry2 = "UPDATE vendor_gallery SET vendor_images ='".$insertValuesSQL."' WHERE vendor_detail_id = '".$row['vendor_detail_id']."'";

        $q2 = mysqli_query($conn, $qry2);   
      }
    }
    else
    { 
      $statusMsg = 'Please select a file to upload.'; 
    } 
  }
}
else
{
  function resizeImage($resourceType,$image_width,$image_height)
  {
    $resizeWidth = 1280;
    $resizeHeight = 720;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
  }

  if(isset($_POST['insert']))
  {

    $insertValuesSQL='';
    $allowTypes = array('jpg','png','jpeg','gif'); 
 
    $fileName = array_filter($_FILES['vendor_images']['name']); 

    if(!empty($fileName))
    {
      $i=0; 
      foreach($_FILES['vendor_images']['name'] as $key=>$val)
      { 

        $i+=1;
        $sourceProperties = getimagesize($_FILES['vendor_images']['tmp_name'][$key]);
        date_default_timezone_set('Asia/Kolkata');
        $resizeFileName = $row['vendor_detail_id']."_".$i;
        $uploadPath = "vendor_gallery/";
        $fileExt = pathinfo($_FILES['vendor_images']['name'][$key], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType)
        {
          case IMAGETYPE_JPEG:
            $resourceType = imagecreatefromjpeg($_FILES['vendor_images']['tmp_name'][$key]); 
            $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
            imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
            break;

          case IMAGETYPE_GIF:
            $resourceType = imagecreatefromgif($_FILES['vendor_images']['tmp_name'][$key]); 
            $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
            imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
            break;

          case IMAGETYPE_PNG:
            $resourceType = imagecreatefrompng($_FILES['vendor_images']['tmp_name'][$key]); 
            $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
            imagepng($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
            break;

          default:
            $imageProcess = 0;
            break;
        }

        if(move_uploaded_file($_FILES['vendor_images']['name'][$key], $uploadPath. $resizeFileName. ".". $fileExt));
        {
          $imageProcess = 1;
          $insertValuesSQL .= $resizeFileName.".".$fileExt.",";
        }
      }

      if(!empty($insertValuesSQL))
      { 
        $qry2 = "INSERT INTO vendor_gallery (vendor_detail_id, vendor_images) VALUES ({$row['vendor_detail_id']}, '".$insertValuesSQL."')";

        $q2 = mysqli_query($conn, $qry2);   
      } 
    }
    else
    { 
      $statusMsg = 'Please select a file to upload.'; 
    } 
  }
}

?>


        <!-- Section Ends -->

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
  <!-- Page Specific JS File -->
  <script src="assets/toastr.min.js"></script>
  <script src="assets/js/page/multiple-upload.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>
<?php

if(isset($statusMsg)){
  echo "<script>
  
  toastr.options = {
    'closeButton': false,
    'debug': false,
    'newestOnTop': false,
    'progressBar': false,
    'preventDuplicates': true,
    'onclick': null,
    'showDuration': '100',
    'hideDuration': '1000',
    'timeOut': '5000',
    'positionClass': 'toast-bottom-right',
    'extendedTimeOut': '1000',
    'showEasing': 'swing',
    'hideEasing': 'linear',
    'showMethod': 'show',
    'hideMethod': 'hide'
};
  
    toastr.warning('".$statusMsg."')
  </script>";
}

?>

       
<script type="text/javascript">

$('#vendor_images').change(function (e) {

  if ($("#vendor_images")[0].files.length > 5) {
        
        toastr.options = {
          'closeButton': false,
          'debug': false,
          'newestOnTop': false,
          'progressBar': false,
          'preventDuplicates': true,
          'onclick': null,
          'showDuration': '100',
          'hideDuration': '1000',
          'timeOut': '5000',
          'positionClass': 'toast-bottom-right',
          'extendedTimeOut': '1000',
          'showEasing': 'swing',
          'hideEasing': 'linear',
          'showMethod': 'show',
          'hideMethod': 'hide'
        };
        toastr.error("You can select upto 5 images");

        $("#vendor_images").val(null);
        var fName="Choose file";
        $(this).next('.custom-file-label').html(fName);
   
      }
      else
      {
          var fileName = $(this)[0].files.length;
          var fName=" Files Selected";
          var fn = fileName + fName;
          //replace the "Choose a file" label
          $(this).next('.custom-file-label').html(fn);
          //Upto 5 Files Select
 
      }
});

</script>