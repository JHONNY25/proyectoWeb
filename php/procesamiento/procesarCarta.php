<?php
if (isset($_POST['carta'])) {
$errorFormato = 0;
$errorSubida=0;
$random=mt_rand(1,999999);

  $target_dir = "../../upload/cartaLiberacion/";
  $temp = explode(".", $_FILES["cartaLib"]["name"]);
  $newfilename = $nControl.'-cartaLib'." (".$random.').'.end($temp);

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

  if($imageFileType != "pdf" && $imageFileType != "PDF") {
      $uploadOk = 0;
      $errorFormato = 1;
  } else {
    $uploadOk = 1;
    $errorFormato = 0;
  }

  if ($uploadOk == 1) {


    if (move_uploaded_file($_FILES["cartaLib"]["tmp_name"], $target_file)) {
      $errorSubida=0;


      $con = new Conexion();
      $conect = $con->getConexion();

      $stm = $conect->prepare("call obt_carta_lib(?)");

      $stm->bind_param("s",$nControl);
      $stm->execute();
      $stm->store_result();
      $num = $stm->num_rows;
      $stm->bind_result($archivo);
        while ($stm->fetch()) {
        }
      $stm->close();
      if($num >0){
        //---------------------------------------------------------------------->Si el alumno tiene regustrada su carta de libretacion


        try {

          $stm = $conect->prepare("call update_carta_lib(?,?)");
          $stm->bind_param("ss",$newfilename,$nControl);
          $stm->execute();
          $stm->close();
          if (file_exists('../../upload/cartaLiberacion/'.$archivo)) {
            unlink('../../upload/cartaLiberacion/'.$archivo);
          }
        } catch (\Exception $e) {
          echo "ERROR: ";
        }

      }else{
        //---------------------------------------------------------------------->Si NO tiene una carta
        try {

          $stm = $conect->prepare("call insert_carta_lib(?,?)");
          $stm->bind_param("ss",$newfilename,$nControl);
          $stm->execute();
          $stm->close();
        } catch (\Exception $e) {
          echo "ERROR: ";
        }
      }

    } else {
      $errorSubida=1;
    }
  }



}
 ?>
