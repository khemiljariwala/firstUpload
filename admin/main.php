<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>PHP Multiple File Upload</title>
</head>
<body>

  <form method="POST" enctype="multipart/form-data">

    <input type="file" name="vendor_gallery[]" id="vendor_gallery[]" multiple="">

    <input type="submit" name="insert"></input>
    
  </form>

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
                  move_uploaded_file($file_array[$i]['tmp_name'], "files/".$file_array[$i]['name']);
                  ?>
                  <div class="alert alert-success">
                    <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']] ; ?>
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




    <script src="bootstrap/jquery/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
