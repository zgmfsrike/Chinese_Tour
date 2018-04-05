<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <form  action="test.php" method="post">
        <div class="test">

          <input type="text" name="test[]">
          <input type="text"name="test[]">
          <input type="text"name="test[]">

        </div>
        <br>
        <div class="name">
          <input type="text" name="name[]">
          <input type="text" name="name[]">
          <input type="text" name="name[]">
        </div>


        <input type="submit" name="submit" value="submit">
      </form>
    </div>


  </body>
</html>
<?php
if(isset($_POST['submit'])){

  if(isset($_POST['test'])){
    $test = $_POST['test'];

    for ($i=0; $i <4 ; $i++) {
      if($test[$i] !==""){
          echo "test".$test[$i];
      }

    }

  }

  if ($_POST['name']) {
    $test2 = $_POST['name'];

    foreach ($test2 as $key => $value) {
      echo "name".$value."<br>";
    }

  }

}

 ?>
