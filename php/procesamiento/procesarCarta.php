<?php
if (isset($_POST['carta'])) {
$errorFormato = 0;
$errorSubida=0;

  $target_dir = "../../upload/cartaLiberacion/";
  $temp = explode(".", $_FILES["cartaLib"]["name"]);
  $newfilename = '-cartaLib'.'.'.end($temp);

  $target_file = $target_dir . $newfilename;
  $uploadOk = 0;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      $check = getimagesize($_FILES["cartaLib"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }

  // Check if file already exists
  if (file_exists($target_file)) {
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["cartaLib"]["size"] > 500000) {
      $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPEG"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "pdf" && $imageFileType != "PDF") {
      $uploadOk = 0;
      $errorFormato = 1;
  } else {
    $uploadOk = 1;
    $errorFormato = 0;
  }

  if ($uploadOk == 1) {
    if (file_exists('../../upload/cartaLiberacion/'.'-cartaLib.pdf')) {
      unlink('../../upload/cartaLiberacion/'.'-cartaLib.pdf');
    }
    if (file_exists('../../upload/cartaLiberacion/'.'-cartaLib.png')) {
      unlink('../../upload/cartaLiberacion/'.'-cartaLib.png');
    }
    if (file_exists('../../upload/cartaLiberacion/'.'-cartaLib.jpg')) {
      unlink('../../upload/cartaLiberacion/'.'-cartaLib.jpg');
    }

    if (move_uploaded_file($_FILES["cartaLib"]["tmp_name"], $target_file)) {
      $errorSubida=0;
    } else {
      $errorSubida=1;
    }
  }



}
 ?>
