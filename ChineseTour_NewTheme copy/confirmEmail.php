<!DOCTYPE html>
  <html>
  <?php
  include('module/session.php');
  requireLogin();
   ?>
   <?php
      include 'component/header.php';
      ?>
<body>
  <!-- body -->

<div class="container">
  <form class="form-horizontal" data-toggle="validator">
      <div class="row">
        <h3>Thank you!</h3>
        <h5>Your account has been actived</h5>
        <hr>
      </div>
      <div class="row">
        <input type="button" onclick="window.location.href='Index.php'" class="col s12 l5 waves-effect waves-light btn amber" value="Go back to Home page">
      </div>
  </form>
</div>

    <!-- Footer -->
    <?php
    include 'component/footer.php';
    ?>

  </body>
</html>
