<?php
require_once "../../db_config.php";


class NewsService
{


  function insertToNewsTable($languages)
  {
    $checkResult = array();
    foreach ($languages as $key => $language) {
      $startDate =  date("Y-m-d");
      $topic = $_POST['newsAddtopic_'.$language];
      $description = $_POST['newsDescription_'.$language];
      $content = $_POST['newsContent_'.$language];

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
    // var_dump($checkFailure);
    return $checkResult;

  }

  public function uploadImage($imageFile,$lastId,$length)
  {
    $countImg = 0;
    for ($index=1; $index < $length; $index++) {
      if(!isset($_FILES[$imageFile.$index]) || $_FILES[$imageFile.$index]['error'] == UPLOAD_ERR_NO_FILE){
        echo "error upload";
      }else{

        $countImg++;
        // -----Upload PDF-----
        $ext = pathinfo(basename($_FILES[$imageFile.$index]['name'] ),PATHINFO_EXTENSION);
        $fileType = $_FILES[$imageFile.$index]['type'];
        $allowed = array("image/jpeg", "image/gif", "image/png");
        if(!in_array($fileType, $allowed)) {
          header("location: ../../message.php?msg=not_image");
          exit();
        }
        $imgPath = "../../images/";
        $img = $_FILES[$imageFile.$index]['tmp_name'];
        $newImageName = 'img_'.$lastId.'_'.$countImg;
        $dst = $imgPath.$newImageName ;

        if (($img_info = getimagesize($img)) === FALSE){
          exit();
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
          exit();
        }
        $newsImage = $newImageName.".jpg";
        $sql = "INSERT INTO news_image(news_id, news_image,img_index) VALUES ('$lastId','$newsImage','$countImg')";
        $result = mysqli_query( $GLOBALS['conn'] , $sql );
      }
    }
  }


  public function uploadPdf($pdfFile,$lastId,$length)
  {
    $countPdf = 0;
    for($index=1;$index<$length;$index++){
      if(!isset($_FILES[$pdfFile.$index]) || $_FILES[$pdfFile.$index]['error'] == UPLOAD_ERR_NO_FILE){
        echo "error upload";
      }else {
        $fileType = $_FILES[$pdfFile.$index]['type'];

        $allowed = array("application/pdf");
        if(!in_array($fileType, $allowed)) {
          header("location: ../../message.php?msg=not_pdf");
          exit();
        }
        $countPdf++;

        $ext = pathinfo(basename($_FILES[$pdfFile.$index]['name'] ),PATHINFO_EXTENSION);
        $oldPdfName = basename($_FILES[$pdfFile.$index]['name']);
        $newPdfName = 'pdf_'.$lastId.'_'.$countPdf.'.'.$ext;
        $pdfPath = "../../pdf/";
        $uploadPathPdf = $pdfPath.$newPdfName;
        $success = move_uploaded_file($_FILES[$pdfFile.$index]['tmp_name'] ,$uploadPathPdf);
        if($success == FALSE){
          echo "Cannot upload pdf";
          exit();
        }
        $newsPdf = $newPdfName;
        $sql3 = "INSERT INTO news_pdf(news_id, news_pdf,pdf_name,pdf_index) VALUES ('$lastId','$newsPdf','$oldPdfName','$countPdf')";
        $result3 = mysqli_query( $GLOBALS['conn'] , $sql3 );

      }

    }
  }

}

?>
