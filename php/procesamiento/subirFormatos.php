
<?php
if (!empty($_POST)) {
  $noFormato=false;
  $noEjemplo=false;
  $errorDoc = false;
  $errorEj = false;
  $errorVacio = false;
  $exitoFormato = false;
  $exitoEjemplo = false;

  if ($_FILES["formato"]["name"]) {
    $target_dir = "../../upload/formatosAlumnos/formato/";
    $temp = explode(".", $_FILES["formato"]["name"]);

    if (isset($_POST['solicitudSS'])) {
      $newfilenameFormato = 'formato-SolicitudSS'.'.'.end($temp);
    }
    if (isset($_POST['cartaAceptacion'])) {
      $newfilenameFormato = 'formato-Solicitud-prestador-servicio'.'.'.end($temp);
    }
    if (isset($_POST['reportes'])) {
      $newfilenameFormato = 'formato-Carta-compromiso'.'.'.end($temp);
    }

    if (isset($_POST['bimestrales'])) {
      $newfilenameFormato = 'formato-Reportes-bimestrales'.'.'.end($temp);
    }
    if (isset($_POST['final'])) {
      $newfilenameFormato = 'formato-Informe-final'.'.'.end($temp);
    }
    if (isset($_POST['liberacion'])) {
      $newfilenameFormato = 'formato-Carta-de-liberacion'.'.'.end($temp);
    }


    $target_file = $target_dir . $newfilenameFormato;
    $uploadOk = 0;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $check = getimagesize($_FILES["formato"]["tmp_name"]);
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
    if ($_FILES["formato"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if($imageFileType != "doc" && $imageFileType != "docx" &&
    $imageFileType != "DOC" && $imageFileType != "DOCX") {
        $uploadOk = 0;
        $errorDoc = true;
    } else {
      $uploadOk = 1;
    }

    if (($uploadOk == 1) && ($errorDoc == false)) {

      if (move_uploaded_file($_FILES["formato"]["tmp_name"], $target_file)) {
        $exitoFormato=true;

      } else {
      }
    }

  }else {
    $noFormato=true;
  }


  if ($_FILES["ejemplo"]["name"]) {
    $target_dir = "../../upload/formatosAlumnos/ejemplo/";
    $temp = explode(".", $_FILES["ejemplo"]["name"]);

    if (isset($_POST['solicitudSS'])) {
      $newfilenameEjemplo = 'ejemplo-SolicitudSS'.'.'.end($temp);
    }
    if (isset($_POST['cartaAceptacion'])) {
      $newfilenameEjemplo = 'ejemplo-solicitud-prestador-servicio'.'.'.end($temp);
    }
    if (isset($_POST['reportes'])) {
      $newfilenameEjemplo = 'ejemplo-carta-compromiso'.'.'.end($temp);
    }
    if (isset($_POST['bimestrales'])) {
      $newfilenameEjemplo = 'ejemplo-Reportes-bimestrales'.'.'.end($temp);
    }
    if (isset($_POST['final'])) {
      $newfilenameEjemplo = 'ejemplo-Informe-final'.'.'.end($temp);
    }
    if (isset($_POST['liberacion'])) {
      $newfilenameEjemplo = 'ejemplo-Carta-liberacion'.'.'.end($temp);
    }


    $target_file = $target_dir . $newfilenameEjemplo;
    $uploadOk = 0;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $check = getimagesize($_FILES["ejemplo"]["tmp_name"]);
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
    if ($_FILES["ejemplo"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPEG"
  && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "pdf" && $imageFileType != "PDF") {
        $uploadOk = 0;
        $errorEj = true;
    } else {
      $uploadOk = 1;
    }

    if (($uploadOk == 1) && ($errorEj==false)) {

      if (move_uploaded_file($_FILES["ejemplo"]["tmp_name"], $target_file)) {
        $exitoEjemplo=true;
      } else {
      }
    }

  }else {
    $noEjemplo=true;
  }

  if ($noFormato && $noEjemplo) {
    $errorVacio=true;
  }
  }

 ?>
