<?php
include('module/session.php');
if(!isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=please_login');
}
 ?>
 <!DOCTYPE html>
   <html>
 <?php
       include 'component/header.php';
 ?>
 <body>
   <div class="container">
     <div class="section"></div>
     <div class="row">
       <div class="col s12 l3">
         <div class="collection">
           <a href="Profile.php" class="collection-item active amber">Profile</a>
           <a href="Purchase.php" class="collection-item black-text">Purchase</a>
           <a href="Record.php" class="collection-item black-text">Record</a>
         </div>
       </div>
       <div class="col s12 l9">

           <h3>Change Email</h3>
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
                 <input type="submit" class="btn waves-effect waves-light green" value="save" name ="save">
                 <input type="button" value="Cancel" onclick="window.location.href='Profile.php'" class="btn waves-effect waves-light red">
               </div>
             </div>
           </form>

       </div>
     </div>
   </div>

    <?php
    include 'component/footer.php';
    ?>
</body>
</html>
