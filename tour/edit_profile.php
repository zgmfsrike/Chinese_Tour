<?php
include 'db_config.php';
include('module/session.php');
if(!isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=please_login');
}

require 'module/language/init.php';
require 'module/language/lang_edit_profile.php';

//requireLogin();
$id = $_SESSION['login_id'];
//---------------------- DB Value----------------------
$sql_db =  "SELECT * FROM `member` WHERE id=$id" ;
$result2 = mysqli_query($conn,$sql_db);
$data = mysqli_fetch_array($result2);
$firstname_db = $data['first_name'];
$middlename_db = $data['middle_name'];
$lastname_db = $data['last_name'];
$phone_db = $data['phone'];
$email_db = $data['email'];
$salary_db = $data['salary'];
$occupation_db = $data['occupation'];
$date_of_birth = $data['dob'];
$address_db = $data['address'];
$city_db = $data['city'];
$province_db = $data['province'];
$zipcode_db = $data['zipcode'];
$country_code = $data['country_code'];
//--------------------Link to another page -----------------------------------
$edit_func = 'php_edit_func.php';
$profile_page = "window.location.href='profile.php'";

?>
<!DOCTYPE html>
<html>
    <?php
    $title = "Edit Profile";
    include 'component/header.php';
    ?>
    <body>
        <div class="container"><div class="section"></div>
            <div class="row">
                <div class="col s12 l3">
                    <div class="collection">
                        <a href="profile.php" class="collection-item active amber"><?php echo $string_edit_profile_profile; ?></a>
                        <!-- <a href="#" class="collection-item black-text">Purchase</a>
                        <a href="#" class="collection-item black-text">Record</a> -->
                    </div>
                </div>
                <div class="col s12 l9">
                    <h3><?php echo $string_edit_profile_account_info; ?></h3>
                    <form action="<?php echo $edit_func; ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12 l6">
                                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="firstname" id="firstname" value= "<?php echo $firstname_db ?>" required>
                                <label for="firstname"><?php echo $string_edit_profile_first_name; ?><b class="red-text"> *</b></label>
                            </div>
                            <div class="input-field col s12 l6">
                                <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $middlename_db ?>">
                                <label for="middlename"><?php echo $string_edit_profile_middle_name; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l6">
                                <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname_db ?>" required>
                                <label for="lastname"><?php echo $string_edit_profile_last_name; ?><b class="red-text"> *</b></label>
                            </div>
                            <div class="input-field col s12 l6">
                                <input required name='dob' type='date' class="datepicker" value='<?php echo $date_of_birth; ?>'/>
                                <label for="dob"><?php echo $string_edit_profile_birth; ?><b class="red-text"> *</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l6">
                                <label><?php echo $string_edit_profile_occupation; ?><b class="red-text"> *</b></label>
                                <select class="browser-default" name="occupation" required>
                                  <option value=""><?php echo $string_edit_profile_please_select;?></option>
                                  <?php
                                  $sql = "SELECT * FROM occupation WHERE id > 0";
                                  if($result = mysqli_query($conn, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                      while($row = mysqli_fetch_array($result)){
                                        ?>
                                        <option value="<?php echo $row['id']; ?>" <?php if($occupation_db == $row['id']) echo "selected"; ?>><?php echo $row['name_' . $_COOKIE['lang']]; ?></option>
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
                                <label><?php echo $string_edit_profile_salary;?><b class="red-text"> *</b></label>
                                <select class="browser-default" name="salary" id="salary" required>
                                  <option value=""><?php echo $string_edit_profile_please_select;?></option>
                                  <?php
                                  $sql = "SELECT * FROM salary WHERE id > 0";
                                  if($result = mysqli_query($conn, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                      while($row = mysqli_fetch_array($result)){
                                        ?>
                                        <option value="<?php echo $row['id']; ?>" <?php if($salary_db == $row['id']) echo "selected"; ?>><?php echo $row['name_' . $_COOKIE['lang']]; ?></option>
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
                            <div class="input-field col s2 l2">
                                <input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode" placeholder="Code" value="<?php echo  $country_code; ?>" required>
                                <label for="countrycode"><?php echo $string_edit_profile_country_code; ?><b class="red-text"> *</b></label>
                            </div>
                            <div class="input-field col s10 l4">
                                <input onkeyup="validatephone(this);" type="text" maxlength="15" name="phone" id="phone" value="<?php echo $phone_db; ?>" required>
                                <label for="phone"><?php echo $string_edit_profile_tel; ?><b class="red-text"> *</b></label>
                            </div>
                        </div>

                        <h3><?php echo $string_edit_profile_address; ?></h3>
                        <div class="row">
                            <div class="input-field col s12">
                                <input required name="address" type="text" minlength="4" maxlength="50"  id="address" value="<?php echo $address_db; ?>" />
                                <label for="address"><?php echo $string_edit_profile_address; ?><b class="red-text"> *</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input onkeyup = "Validate(this)" id="txt" type="text" name="city" id="city" value="<?php echo $city_db; ?>" required>
                                <label for="city"><?php echo $string_edit_profile_city; ?><b class="red-text"> *</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input onkeyup = "Validate(this)" id="txt" type="text" name="province" id="province" value="<?php echo $province_db; ?>" required>
                                <label for="province"><?php echo $string_edit_profile_province; ?><b class="red-text"> *</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <!--China lenght 6 ,Iran lenght 10-->
                                <input onkeyup="validatephone(this);" type="text" maxlength="10" name="zipcode" id="zipcode" value="<?php echo $zipcode_db; ?>" required>
                                <label for="zipcode"><?php echo $string_edit_profile_zipcode; ?><b class="red-text"> *</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 center">
                                <button name="cancel" type="button" value="Cancel" onclick=<?php echo $profile_page; ?> class="btn red"><?php echo $string_edit_profile_cancel; ?></button>
                                <button type="submit" class="btn green" value="Save" name='save'><?php echo $string_edit_profile_save; ?></button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- /.container -->
        <?php
        include 'component/footer.php';
        ?>
    </body>
</html>
