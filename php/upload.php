<?php
$target_dir = "../gallery/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$result = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && $result != 0) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $result = 1;
  } else {
    $result = 0;
    $error = "File is not an image";
  }
}

// Check if file already exists
if (file_exists($target_file) && $result != 0) {
  $result = 0;
  $error = "File already exists";
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 100000000 && $result != 0) {
  $result = 0;
  $error = "File too big";
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $result != 0) {
  $result = 0;
  $error = "Wrong file format, only allowed jpg,png,jpeg,gif";
}

// Check if $result is set to 0 by an error
if ($result == 0) {
    header("Location: ../confirmation/index.php?result=$result&error=$error");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header("Location: ../confirmation/index.php?result=$result");
  } else {
    $result = 0;
    header("Location: ../confirmation/index.php?result=$result");
  }
}
?>