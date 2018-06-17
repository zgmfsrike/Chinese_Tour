<?php
include 'db_config.php';
include 'module/session.php';
if(isLoginAs(array('admin','member'))){
  header('Location: message.php?msg=login_already');
}
require 'module/language/init.php';
require 'module/language/lang_register.php';
?>
<!DOCTYPE html>
<html>
<?php
$title = "$string_register_title";
include 'component/header.php';
?>
<body>

  <!--Register-->
  <div class="container">
    <div class="row">
      <div class="section"></div>
      <h3 class="center"><b><?php echo $string_register_title;?></b></h3>
      <div class="col s12">
        <h4><b><?php echo $string_register_account_info;?></b></h4>
        <form class="form-horizontal" method="post" action="php_register.php" id="fileForm" role="form">

          <div class="row">
            <div class="input-field col s12 l6">
              <h5 for="username"><?php echo $string_register_username;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_username;?>" onkeyup="ValidateUsername(this)" id="username" type="text" name="username" id="username" minlength="3" maxlength="16" required/>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 l6">
              <h5 for="password"><?php echo $string_register_password;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_password;?>" onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" id="inputPassword"/>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 l6">
              <h5 for="cpassword"><?php echo $string_register_confirm_password;?></h5>
              <input placeholder="<?php echo $string_register_confirm_password;?>" onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" type="password" class="form-control inputpass" name="cpassword" minlength="4" maxlength="16" id="cpassword" required>
              <span id="confirmMessage" class="confirmMessage"></span>
            </div>
          </div>
          <div class="section">
          </div>
          <h4><b><?php echo $string_register_personal_info;?></b></h4>
          <div class="row">
            <div class="input-field col s12 l6">
              <h5 for="firstname"><?php echo $string_register_first_name;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_first_name;?>" onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="firstname" id="firstname" required>
            </div>
            <div class="input-field col s12 l6">
              <h5 for="middlename"><?php echo $string_register_middle_name;?></h5>
              <input placeholder="<?php echo $string_register_middle_name;?>" onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" id="middlename">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 l6">
              <h5 for="lastname"><?php echo $string_register_last_name;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_last_name;?>" onkeyup="Validate(this)" type="text" class="form-control" name="lastname" id="lastname" required>
            </div>
            <div class="input-field col s12 l6">
              <h5 for="dob"><?php echo $string_register_birth;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_birth;?>" type="date" class="datepicker" name="dob" id="dob">
            </div>
          </div>
          <div class="row">
            <div class="col s12 l6">
              <h5><?php echo $string_register_occupation;?><b class="red-text"> *</b></h5>
              <select class="browser-default" name="occupation" required>
                <option value=""><?php echo $string_register_please_select;?></option>
                <?php
                $sql = "SELECT * FROM occupation WHERE id > 0";
                if($result = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name_' . $_COOKIE['lang']]; ?></option>
                      <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                  } else{
                    header("location: message.php?msg=error");
                  }
                } else{
                  header("location: message.php?msg=error");
                }

                $sql = "SELECT * FROM occupation WHERE id = 0";
                if($result = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name_' . $_COOKIE['lang']]; ?></option>
                      <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                  } else{
                    header("location: message.php?msg=error");
                  }
                } else{
                  header("location: message.php?msg=error");
                }
                ?>
              </select>
            </div>
            <div class="col s12 l6">
              <h5><?php echo $string_register_salary;?><b class="red-text"> *</b></h5>
              <select class="browser-default" name="salary" id="salary" required>
                <option value=""><?php echo $string_register_please_select;?></option>
                <?php
                $sql = "SELECT * FROM salary WHERE id > 0";
                if($result = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name_' . $_COOKIE['lang']]; ?></option>
                      <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                  } else{
                    header("location: message.php?msg=error");
                  }
                } else{
                  header("location: message.php?msg=error");
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12 l6">
              <h5 for="email"><?php echo $string_register_mail;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_mail;?>" onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="input-field col s2 l2">
              <h5 for="countrycode"><?php echo $string_register_country_code;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_country_code;?>" class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode" value="" required>
            </div>
            <div class="input-field col s10 l4">
              <h5 for="phone"><?php echo $string_register_tel;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_tel;?>" onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone" id="phone" required>
            </div>
          </div>
          <div class="section">
          </div>
          <h4><b><?php echo $string_register_address;?></b></h4>
          <div class="row">
            <div class="input-field col s10 l6">
              <h5 for="address"><?php echo $string_register_address;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_address;?>" required name="address" type="text" class="form-control inputpass" minlength="4" maxlength="50"  id="address" />
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10 l6">
              <h5 for="city"><?php echo $string_register_city;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_city;?>" onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city" id="city" required>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10 l6">
              <h5 for="province"><?php echo $string_register_province;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_province;?>" onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province" id="province" required>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10 l6">
              <!--China lenght 6 ,Iran lenght 10-->
              <h5 for="zipcode"><?php echo $string_register_zipcode;?><b class="red-text"> *</b></h5>
              <input placeholder="<?php echo $string_register_zipcode;?>" onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode" id="zipcode" required>
            </div>
          </div>
          <div class="section">
          </div>
          <div class="row">
            <div class="center col s12">
              <button type="submit" value="Cancel" onclick="window.location.href='index.php'" class="btn red"><?php echo $string_register_cancel;?></button>
              <button name="submit" type="submit" class="btn amber" value="Sign Up"><?php echo $string_register_signup;?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!--Footer-->
  <?php
  include 'component/footer.php';
  ?>

</body>
</html>
