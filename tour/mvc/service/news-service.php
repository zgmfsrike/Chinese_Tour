<?php
require_once "../../db_config.php";


class NewsService
{


  function insertToNewsTable($languages)
  {
    $checkResult = array();
    foreach ($languages as $key => $language) {
      $startDate =  date("Y-m-d");
      $topic = addslashes($_POST['newsAddtopic_'.$language]);
      $description = addslashes($_POST['newsDescription_'.$language]);
      $content = addslashes($_POST['newsContent_'.$language]);

      $tableName = "news_".$language;
      $sql = "INSERT INTO $tableName (create_date, topic, short_description,content)
      VALUES ('$startDate','$topic','$description','$content')";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );
      if($result){
        array_push($checkResult, "pass");
      }else{
        array_push($checkResult, "fail");
      }
    }
    return $checkResult;

  }

  public function insertImageToNewsTable($lastId,$newsImage,$countImg)
  {
    $sql = "INSERT INTO news_image(news_id, news_image,img_index) VALUES ('$lastId','$newsImage','$countImg')";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    return $result;
  }

  public function insertPdfToNewsTable($lastId,$newsPdf,$oldPdfName,$countPdf)
  {
    $sql = "INSERT INTO news_pdf(news_id, news_pdf,pdf_name,pdf_index) VALUES ('$lastId','$newsPdf','$oldPdfName','$countPdf')";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    return $result;
  }


  public function isImageFile($fileType)
  {
    $allowed = array("image/jpeg", "image/gif", "image/png");
    if(!in_array($fileType, $allowed)) {
      header("location: ../../message.php?msg=not_image");
      exit();
    }
  }

  public function isPdfFile($fileType)
  {
    $allowed = array("application/pdf");
    if(!in_array($fileType, $allowed)) {
      header("location: ../../message.php?msg=not_pdf");
      exit();
    }
  }

  public function uploadImage($lastId,$index)
  {
    $imageFile = "newsPicAddtopic";
    if(!isset($_FILES[$imageFile.$index]) || $_FILES[$imageFile.$index]['error'] == UPLOAD_ERR_NO_FILE){
      echo "error upload";
    }else{

      $fileType = $_FILES[$imageFile.$index]['type'];
      $this->isImageFile($fileType);
      $imgPath = "../../images/";
      $img = $_FILES[$imageFile.$index]['tmp_name'];
      $newImageName = 'img_'.$lastId.'_'.$index;
      $dst = $imgPath.$newImageName ;

      if (($img_info = getimagesize($img)) === FALSE){
      }
      $width=1280;
      $height=500;
      switch ($img_info[2]) {
        case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
        case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
        case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
        default : die("Unknown filetype");
      }
      $photoX = ImagesX($src);
      $photoY = ImagesY($src);

      $tmp = imagecreatetruecolor($width, $height);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $photoX, $photoY);
      $success= imagejpeg($tmp, $dst.".jpg");
      if($success == FALSE){
        echo "Cannot upload images";
      }else{
        $newsImage = $newImageName.".jpg";
        return $newsImage;
      }


      // $sql = "INSERT INTO news_image(news_id, news_image,img_index) VALUES ('$lastId','$newsImage','$countImg')";
      // $result = mysqli_query( $GLOBALS['conn'] , $sql );
    }
  }




  public function uploadPdf($lastId,$index)
  {
    $pdfArray = array();

    $pdfFile = "newsPdf";
    if(!isset($_FILES[$pdfFile.$index]) || $_FILES[$pdfFile.$index]['error'] == UPLOAD_ERR_NO_FILE){
      echo "error upload";
    }else {
      $fileType = $_FILES[$pdfFile.$index]['type'];
      $this->isPdfFile($fileType);

      $ext = pathinfo(basename($_FILES[$pdfFile.$index]['name'] ),PATHINFO_EXTENSION);
      $oldPdfName = basename($_FILES[$pdfFile.$index]['name']);
      $newPdfName = 'pdf_'.$lastId.'_'.$index.'.'.$ext;
      $pdfPath = "../../pdf/";
      $uploadPathPdf = $pdfPath.$newPdfName;
      $success = move_uploaded_file($_FILES[$pdfFile.$index]['tmp_name'] ,$uploadPathPdf);
      if($success == FALSE){
        echo "Cannot upload pdf";
      }else{
        $newsPdf = $newPdfName;
        array_push($pdfArray, $newsPdf);
        array_push($pdfArray, $oldPdfName);
        return $pdfArray;
      }



    }

  }



  public function updateNewsTable($languages,$newsId)
  {
    $checkResult = array();
    foreach ($languages as $key => $language) {
      $lastEditDate =  date("Y-m-d");
      $topic = addslashes($_POST['newstopic_'.$language]);
      $description = addslashes($_POST['newsDescription_'.$language]);
      $content = addslashes($_POST['newsContent_'.$language]);
      $tableName = "news_".$language;

      $sql = "UPDATE $tableName SET `last_edit_date`='$lastEditDate',`topic`='$topic',
      `short_description`='$description',`content`='$content' WHERE news_id = $newsId";
      $result = mysqli_query( $GLOBALS['conn'] , $sql );
      if($result){
        array_push($checkResult, "pass");
      }else{
        array_push($checkResult, "fail");
      }
    }
    return $checkResult;

  }

  public function updateExistNewsImage($newsImage,$index,$newsId)
  {
    $sql = "UPDATE `news_image` SET `news_image`='$newsImage',img_index ='$index' WHERE img_index = '$index' AND news_id = '$newsId' ";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
  }

  public function updateImage($newsId,$index)
  {
    $imageFile = "newsPicAddtopic";
    $fileType = $_FILES[$imageFile.$index]['type'];
    $this->isImageFile($fileType);
    $result = $this->isImageExist($newsId,$index);
    if($result > 0){
      echo "exist";
      $newsImage =  $this->uploadImage($newsId,$index);
      $this->updateExistNewsImage($newsImage,$index,$newsId);
    }






  }

  public function isImageExist($newsId,$index)
  {
    $sql = "SELECT * FROM `news_image` WHERE news_id = '$newsId' AND img_index ='$index'";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    return mysqli_num_rows($result);
  }




}

?>
