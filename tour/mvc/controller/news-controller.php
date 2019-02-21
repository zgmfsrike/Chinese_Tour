<?php
require_once "../../db_config.php";
require_once "../service/news-service.php";


class NewsController
{

  function __construct()
  {
    $this->newsService = new NewsService;
  }

  public function store()
  {
    $languages = array('en','ch','th');
    $result = $this->newsService->insertToNewsTable($languages);
    if($result){
      $last_id = mysqli_insert_id($GLOBALS['conn']);
      $length = 6;
      $this->newsService->uploadImage('newsPicAddtopic',$last_id,$length);
      $this->newsService->uploadPdf('newsPdf',$last_id,$length);
      header("location: ../../message.php?msg=create_news_succ&id=".$last_id);
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }

}
$newsController = new NewsController();
$postAction = $_POST['action'];

switch ($postAction) {
  case 'store':
  $newsController->store();
  break;

  default:
  // code...
  break;
}


?>
