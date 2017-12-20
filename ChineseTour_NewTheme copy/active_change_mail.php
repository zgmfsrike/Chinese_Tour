<!DOCTYPE html>
  <html>
<?php
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
        <input type="button" onclick="window.location.href='Index.php'" class="col waves-effect waves-light btn amber" value="Go back to Home page">
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
