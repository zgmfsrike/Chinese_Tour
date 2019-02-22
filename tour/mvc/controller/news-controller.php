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
  }

  public function store()
  {
    $result = $this->newsService->insertToNewsTable($this->languages);
    if($result){
      $lastId = mysqli_insert_id($GLOBALS['conn']);
      for ($index=1; $index <= 5; $index++) {

        $imageName = $this->newsService->uploadImage($lastId,$index);
        if($imageName !== NULL){
          $this->newsService->insertImageToNewsTable($lastId,$imageName,$index);
        }

        $pdfArray = $this->newsService->uploadPdf($lastId,$index);
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
    $this->newsService->updateNewsTable($this->languages,$newsId);
    for ($index=1; $index <=5 ; $index++) {
      // code...
      if($_FILES['newsPicAddtopic'.$index]['name'] == ""){

      }else{
        $result = $this->newsService->updateImage($newsId,$index);

      }

    }
    header("location: ../../message.php?msg=edit_news_succ&id=".$newsId);




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
