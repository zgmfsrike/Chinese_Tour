<!DOCTYPE html>
<html>
<?php
require 'module/language/init.php';

include 'component/header.php';
?>
<body>
  <?php
  include "php_active_mail.php";
  ?>

  <!--login body-->
  <div class="container">
    <div class="row col s12">
      <?php
      function msg($msg){
        ?>
        <div class="seciton"></div>
        <?php
        echo $msg;
        ?>
        <div class="seciton"></div>
      </div>
      <div class="rol col s12 l3 center">
        <button type="button" onclick="window.location.href='index.php'" class="col btn amber" value="Go back to Home page">Go back to Home page</button>
      </div>
    </div>
    <?php
  }
  ?>


  <!-- Footer -->
  <?php
  include 'component/footer.php';
  ?>
</body>
</html>
