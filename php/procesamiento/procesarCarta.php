<?php
if (
  isset($_POST['liberacion']) || isset($_POST['compromiso']) || isset($_POST['presentacion']) || isset($_POST['aceptacion']) ||
  isset($_POST['terminacion']) || isset($_POST['solicitudServSoc']) || isset($_POST['prestaServ'])
) {
$errorFormato = 0;
$errorSubida=0;
$random=mt_rand(1,999999);

if (isset($_POST['solicitudServSoc']) ) {
  $target_dir = "../../upload/documentos/solicitudServicioSocial/";
  $file="solServSoc";
  $documento="1";
}
if (isset($_POST['prestaServ']) ) {
  $target_dir = "../../upload/documentos/solicitudPrestadorServicio/";
  $file="solPrestaServ";
  $documento="2";
}
if (isset($_POST['compromiso']) ) {
  $target_dir = "../../upload/documentos/cartaCompromiso/";
  $file="cartaCompr";
  $documento="3";
}
if (isset($_POST['presentacion']) ) {
  $target_dir = "../../upload/documentos/cartaPresentacion/";
  $file="cartaPrese";
  $documento="7";
}
if (isset($_POST['aceptacion']) ) {
  $target_dir = "../../upload/documentos/cartaAceptacion/";
  $file="cartaAcept";
  $documento="8";
}
if (isset($_POST['terminacion']) ) {
  $target_dir = "../../upload/documentos/cartaTerminacion/";
  $file="cartaTerm";
  $documento="10";
}
if (isset($_POST['liberacion']) ) {
  $target_dir = "../../upload/documentos/cartaLiberacion/";
  $file="cartaLib";
  $documento="12";
}

  $temp = explode(".", $_FILES[$file]["name"]);
  $newfilename = $nControl.'-'.$file." (".$random.').'.end($temp);

  $target_file = $target_dir . $newfilename;
  $uploadOk = 0;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      $check = getimagesize($_FILES[$file]["tmp_name"]);
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
  if ($_FILES["$file"]["size"] > 500000) {
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


    if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
      $errorSubida=0;


      $con = new Conexion();
      $conect = $con->getConexion();

      $stm = $conect->prepare("call obt_carta_lib(?,?)");

      $stm->bind_param("ss",$nControl,$documento);
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

          $stm = $conect->prepare("call update_carta_lib(?,?,?)");
          $stm->bind_param("sss",$newfilename,$documento,$nControl);
          $stm->execute();
          $stm->close();
          if (file_exists($target_dir.$archivo)) {
            unlink($target_dir.$archivo);
          }
        } catch (\Exception $e) {
          echo "ERROR: ";
        }

      }else{
        //---------------------------------------------------------------------->Si NO tiene una carta
        try {

          $stm = $conect->prepare("call insert_carta_lib(?,?,?)");
          $stm->bind_param("sss",$newfilename,$documento,$nControl);
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


if (isset($_POST['tresReportes'])) {

  $errorFormato=0;
  $documento = 9;
  $errorEnlace=0;
  $con = new Conexion();
  $conect = $con->getConexion();

  $newfilenameX = htmlentities($_POST['reportes']);
  $newfilename = mysqli_real_escape_string($conect,$newfilenameX);

  if (strlen($newfilename)>49) {
    $errorEnlace=1;
  }else{
    $errorEnlace=0;
  }
  if ($errorEnlace==0) {
    // code...


  $stm = $conect->prepare("call obt_carta_lib(?,?)");

  $stm->bind_param("ss",$nControl,$documento);
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

      $stm = $conect->prepare("call update_carta_lib(?,?,?)");
      $stm->bind_param("sss",$newfilename,$documento,$nControl);
      $stm->execute();
      $stm->close();
    } catch (\Exception $e) {
      echo "ERROR: ";
    }

  }else{
    //---------------------------------------------------------------------->Si NO tiene una carta
    try {

      $stm = $conect->prepare("call insert_carta_lib(?,?,?)");
      $stm->bind_param("sss",$newfilename,$documento,$nControl);
      $stm->execute();
      $stm->close();
    } catch (\Exception $e) {
      echo "ERROR: ";
    }
  }
  }
}
 ?>
