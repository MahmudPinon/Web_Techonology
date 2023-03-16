<?php

include '../model/Model.php';
function checkingprofile($target_file,$imageFileType)
{
    $target_dir = "../data/";
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      $error="File is not an image.";
      $uploadOk = 0;
      return $error;
      
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    $error="Sorry, file already exists.";
    $uploadOk = 0;
    return $error;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 400000) {
    $error="Sorry, your file is too large.";
    $uploadOk = 0;
    return $error;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    $error="Sorry, only JPG, JPEG, PNG  files are allowed.";
    $uploadOk = 0;
    return $error;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $error="Sorry, your file was not uploaded.";
    return $error;
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $error="ok";
        return $error;
    } else {
        $error="Sorry, there was an error uploading your file.";
      return $error;
    }
  }
}

function CheckUsername($username){
    $data =readData();
      if(empty($data))
      {
          return FALSE;
      }
      else
      {
        foreach($data as $row)
        {
  
          if($row['username']==$username)
          {
            return TRUE;
            
          }
        } 
      }
   
  }




?>