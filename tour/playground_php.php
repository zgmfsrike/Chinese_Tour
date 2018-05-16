<?php

include 'db_config.php';

// check for post request
if(!isset($_POST['save'])){
  header('location: message.php?msg=unknown_request');
}

// get version of feedback
$sql = "SELECT MAX(version) version FROM feedback_question";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

// +1 to version for saving the next version
$version = $row["version"] + 1;

// echo "current version : " . ($version-1);
// echo "<br>";
// echo "next version : " . $version;
// echo "<br>";

// save question into table
for($i = 1; $i <= 15; $i++){

  if(isset($_POST['question_'.$i])){

    $question = $_POST['question_'.$i];
    $enable = isset($_POST['enable_'.$i]) ? 1 : 0;

    // echo "question_". $i . " - isset";
    // echo "<br>";
    // echo "enable : " . $enable;
    // echo "<br>";

    $sql = "INSERT INTO feedback_question (version, question_id, question, enable) ";
    $sql .= "VALUES ($version, $i, '$question', $enable);";
    $result = mysqli_query($conn,$sql);

  }

}

header('location: message.php?msg=edit_feedback_question_complete');


?>
