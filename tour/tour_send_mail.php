<?php
include 'module/session.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';

error_reporting (E_ALL ^ E_NOTICE);
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";

// include('module/session.php');



if(isset($_SESSION['login_id'])){

//-----------------------------Search fucntion----------------------------------------------------//
if($_GET['member_id'] != ""){
    $member_id = $_GET['member_id'];
    $sql= "SELECT  email FROM tour_round_member WHERE tour_round_member_id = $member_id ";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
    $show = mysqli_fetch_array($result);
    $email = $show['email'];
    $_SESSION['email'] = $email;

}
}



 ?>

 <!DOCTYPE html>
   <html>
 <?php
 $title = "Send mail to tour member";
       include 'component/header.php';
 ?>
 <body>
   <div class="container">
     <div class="row">
       <div class="col s12">
         <h3>Send E-Mail</h3>
       </div><hr>
     </div>
     <div class="row">
       <form action="php_send_mail.func.php?tour_round_id=<?php echo $tour_round_id; ?>" method="post">
         <div class="col s12 l6">
           <p>To : <?php echo $email; ?></p>
             Subject :
             <div class="input-field inline">
               <input name="subject" id="subject"  placeholder="Subject Here" required>
             </div>
         </div>
       </div>
       <div class="row">
         <div class="col s12">
             <h5>Description</h5>
             <div class="input-field col s12">
               <textarea id="textarea1" class="materialize-textarea" name = 'description' required></textarea>
               <label for="textarea1">Textarea</label>
             </div>
         </div>
       </div>
       <div class="row s12 center">
         <button type="reset" value ="Reset" name ="reset" class="waves-effect waves-light btn amber"/>Reset</button>
         <button type="submit" value ="Send" name ="send" class="waves-effect waves-light btn green"/>Send</button>
       </div>
         <br>
       </form>
 </div>
  <!-- Page Content -->

    <?php
    include 'component/footer.php';
    ?>
</body>
</html>
