<?php
      include 'component/header.php';
      include 'module/session.php';
      noLogin();
?>
<!DOCTYPE html>
<html>
<body>

    <!--Login-->
    <div class="container">
       <div class="row">
       <div class="section"></div><div class="section"></div>
         <div class="col s10  offset-s1 m8 offset-m2 l6 offset-l3 z-depth-1">
             <div class="section"></div>
             <a href="Index.php"><h5 id="title" class="center black-text">Login</h5></a>
             <div class="container">
             <form action="php_login.php" data-toggle="validator" method="post">
               <div class="row">
                 <div class="input-field">
                   <input onkeyup="ValidateUsername(this)" id="username" type="text" name="username" id="username" minlength="3" maxlength="16" required/>
                   <label for="username">Username<b class="red-text"> *</b></label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field">
                   <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" id="inputPassword"/>
                   <label for="password">Password<b class="red-text"> *</b></label>
                 </div>
               </div>
               <div class="row col s12 center">
                 <input type="submit" class="waves-effect waves-light btn orange col s12 l5" name="login" value="Login">
                 <div class="col l2"></div>
                 <input type="button" onclick="window.location.href='Register.php'" class="col s12 l5 waves-effect waves-light btn amber" value="Register">
                 <div class="section"></div>
                 <div class="section"></div>
                 <div class="section"></div>
                 <a href="/password/reset">Forgot Your Password?</a>
               </div>
             </form>
             </div>
           </div>
      </div>
      <div class="section"></div>
  </div>
    </div>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

    </body>
  </html>
