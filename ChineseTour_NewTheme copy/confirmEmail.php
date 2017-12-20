<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>
  <!-- body -->
<div class="container">
  <form class="form-horizontal" data-toggle="validator">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h1>Thank you!</h1>
        <h3>Your account has been actived</h3>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <input type="button" onclick="window.location.href='index.php'" class="btn btn-warning btn-sm" value="Go back to Home page">
      </div>
    </div>
  </form>
</div>

    <!-- Footer -->
    <?php
    include 'component/footer.php';
    ?>

  </body>
</html>
