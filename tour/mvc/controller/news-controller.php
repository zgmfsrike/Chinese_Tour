<?php
require_once "../../db_config.php";
require_once "../service/news-service.php";
session_start();

class NewsController
{

  function __construct()
  {
    $this->newsService = new NewsService;
    $this->languages = array('en','ch','th');
    $this->imagePath = "../../images/";
    $this->pdfPath = "../../pdf/";

  }

  public function store()
  {
    $result = $this->newsService->insertToNewsTable($this->languages);
    if($result){
      $lastId = mysqli_insert_id($GLOBALS['conn']);
      for ($index=1; $index <= 5; $index++) {

        $imageName = $this->newsService->uploadImage($lastId,$index,$this->imagePath,$counter);
        if($imageName !== NULL){
          $this->newsService->insertImageToNewsTable($lastId,$imageName,$index);
        }

        $pdfArray = $this->newsService->uploadPdf($lastId,$index,$this->pdfPath);
        if($pdfArray !== NULL){
          $this->newsService->insertPdfToNewsTable($lastId,$pdfArray[0],$pdfArray[1],$index);
        }


        $counter++;
      }
      header("location: ../../message.php?msg=create_news_succ&id=".$lastId);
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }

  public function update($newsId)
  {
    $counter = 1;
    $this->newsService->updateNewsTable($this->languages,$newsId);
    for ($index=1; $index <=5 ; $index++) {
      //check if no file upload
      $isImageExist = $this->newsService->isImageExist($newsId,$index);
      if($_FILES['newsPicAddtopic'.$index]['name'] == "" ){
        //check delete status
        $image = $this->newsService->getInfoFromNewsImageTable($newsId,$index);
        if(isset($_POST['delete_'.$index]) and $_POST['delete_'.$index] =='1'){

          $isImageDestroy = $this->newsService->destroyFile($image,$this->imagePath,$newsId,$index);
          if($isImageDestroy){
            $this->newsService->deleteInfoFromNewsImageTable($newsId,$index);
            echo "================================================================<br>";
            echo "CHECK COUNT round DELETE :".$image."<br>" ;
            echo "================================================================<br>";

          }


        }else if($index>=$counter and $image!=""){
          $isPreviousImageExist = $this->newsService->isImageExist($newsId,$counter);
          if($index>$counter and $isPreviousImageExist == 0){
            $isRenameFile = $this->newsService->renameFile($image,$this->imagePath,$newsId,$counter);
            $this->newsService->updateExistNewsImageByCounter($image,$counter,$index,$newsId);
            echo "================================================================<br>";
            echo "CHECK COUNT round RENAMEDDDD :".$counter."<br>" ;
            echo "================================================================<br>";
          }
          echo "================================================================<br>";
          echo "CHECK COUNT round RENAME :".$counter."<br>" ;
          echo "================================================================<br>";

          $counter++;







        }


      }else{
        //if the file uploaded



        if($isImageExist > 0){
          //if file exist in db then update
          $newsImage = $this->newsService->uploadImage($newsId,$index,$this->imagePath,$counter);
          $isUpdate = $this->newsService->updateExistNewsImage($newsImage,$index,$newsId,$counter);
          if($isUpdate){
            echo "================================================================<br>";
            echo "NEWS IMAGE :".$newsImage."<br>" ;
            echo "================================================================<br>";
          }
          echo "================================================================<br>";
          echo "CHECK COUNT round FILE EXIST :".$counter."<br>" ;
          echo "================================================================<br>";


        }else{
          //if file not exist then add more
          $imageName = $this->newsService->uploadImage($newsId,$index,$this->imagePath,$counter);
          if($imageName !== ""){
            $this->newsService->insertImageToNewsTable($newsId,$imageName,$counter);
            echo "================================================================<br>";
            echo "CHECK COUNT round INSERT :".$imageName."<br>" ;
            echo "================================================================<br>";
          }

        }
        $counter++;


      }

    }
    // header("location: ../../message.php?msg=edit_news_succ&id=".$newsId);




  }

}
$newsController = new NewsController();
$postAction = $_POST['action'];

switch ($postAction) {
  case 'store':
  $newsController->store();
  break;

  case 'update':
  if(isset($_SESSION['news_id'])){
    $newsController->update($_SESSION['news_id']);
  }

  break;

  default:
  // code...
  break;
}


?>
