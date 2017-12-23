<?php
include('module/session.php');
isLogin();

 ?>
 <!DOCTYPE html>
   <html>
 <?php
       include 'component/header.php';
 ?>
 <body>

  <!-- Page Content -->
  <div class="container">
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="list-group admin-menu">
          <hr>
          <a href="Profile.php" class="list-group-item list-group-item-danger active text-white"><i class="fa fa-user fa-fw"></i>Profile</a>
          <a href="Purchase.php" class="list-group-item list-group-item-danger text-white"><i class="fa fa-shopping-cart fa-fw"></i>Purchase</a>
          <a href="Record.php" class="list-group-item list-group-item-danger text-white"><i class="fa fa-clipboard fa-fw"></i>Record</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h3 class="entry-title"><span><br>Change Email</span> </h3>

        <hr>
        <form action="php_change_mail.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-8">Email  <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input onkeyup="checkMail(); return false;" onfocusout="checkMail(); return false;" onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your new Email" required>
                  </div>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-sm-8">Confirm Email <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input onkeyup="checkMail(); return false;" onfocusout="checkMail(); return false;" onchange="email_validate(this.value);" type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="confirm your Email"  required>
                    </div>
                    <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                </div>

          <div class="form-group">
            <div class="col-xs-offset-3 col-sm-9 float-none"><br>
              <input type="submit" class="btn btn-danger btn-md" value="save" name ="save">
              <input type="button" value="Cancel" onclick="window.location.href='Profile.php'" class="btn btn-warning">
            </div>
          </div>
        </form>
    </div>
    <!-- /.row -->

  </div>
</div>
    <?php
    include 'component/footer.php';
    ?>
</body>
</html>
