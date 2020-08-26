<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/dropzonejs/dropzone.css">
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
                      
                        <input type="file" name="vendor_gallery[]" id="vendor_gallery[]" multiple="">
                      
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
        
        $phpFileUploadErrors = array
        (
          0 => 'There is no error, the file uploaded with success',
          1 => 'The uploaded file exceeds the upload_max_filesize directive in php ini',
          2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
          3 => 'The upleaded file was only partially uploaded',
          4 => 'No file was uploaded',
          6 => 'Missing a temporary folder',
          7 => 'Failed to write file to disk',
          8 => 'A PHP extension stopped the file upload. ',
        );

          if (isset($_FILES['vendor_gallery']))
          {

            $file_array = reArrayFiles($_FILES['vendor_gallery']);
            //pre_r($file_array);

            for ($i=0;$i<count($file_array);$i++)
            { 
              if ($file_array[$i]['error'])
              {
                ?>
                <div class="alert alert-danger">
                  <?php
                  echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                  ?>
                </div>
                <?php
              }
              else
              {
                $extensions = array('jpg', 'png', 'gif', 'jpeg');
                $file_ext = explode('.', $file_array[$i]['name']);
                $file_ext = end($file_ext);

                if (!in_array($file_ext, $extensions))
                {
                  ?>
                  <div class="alert alert-danger">
                    <?php
                      echo "{$file_array[$i]['name']} - Invalid File Extension";
                    ?>
                  </div>
                  <?php
                  
                }
                else
                {
                  $xyz = rand(100,999)."xyz123.".$file_ext;
                  move_uploaded_file($file_array[$i]['tmp_name'], "files/".$xyz);

                  echo $file_array[$i]['tmp_name'];
                  echo $file_array[$i]['name'];
                  ?>
                  <div class="alert alert-success">
                    <?php echo $xyz.' - '.$phpFileUploadErrors[$file_array[$i]['error']] ; ?>
                  </div>
                  <?php
                }

              }
            }

          }

          function reArrayFiles ( $file_post )
          { $file_ary = array();
            $file_count = count ($file_post['name']);
            $file_keys = array_keys ($file_post);

            for ($i=0; $i<$file_count; $i++)
            { 
              foreach ($file_keys as $key)
              { 
                $file_ary[$i][$key] = $file_post[$key][$i];
              }
            }

            return $file_ary;
          }



          function pre_r($array)
          {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
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
  <!-- JS Libraies -->
  <script src="assets/bundles/dropzonejs/min/dropzone.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/multiple-upload.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


</html>