<?php 
  function uploader($files, $name = "")
 {
     if (isset($files) && $files['error'] == 0) {
         $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
         $filename = $files["name"];
         $filetype = $files["type"];
         $filesize = $files["size"];

         $ext = pathinfo($filename, PATHINFO_EXTENSION);
         if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

         $maxsize = 5 * 1024 * 1024;
         if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

         // Verify MYME type of the file
         if (in_array($filetype, $allowed)) {

             $dir = ROOT . "public/uploads/";



             move_uploaded_file($files["tmp_name"], $dir . $name . ".jpg");
             return 1;
         } else {
             die("Error: There was a problem uploading your file. Please try again.");
         }
     }
 }

 ?>