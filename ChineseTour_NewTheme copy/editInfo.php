<?php
    include('module/session.php');
    include 'db_config.php';
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
?>
<!DOCTYPE html>
  <html>
   <?php
      include 'component/header.php';
      ?>
<body>
  <div class="container"><div class="section"></div>
    <div class="row">
      <div class="col s12 l3">
        <div class="collection">
          <a href="Profile.php" class="collection-item active amber">Profile</a>
          <a href="Purchase.php" class="collection-item black-text">Purchase</a>
          <a href="Record.php" class="collection-item black-text">Record</a>
        </div>
      </div>
      <div class="col s12 l9">
        <h3>Account Information</h3>
        <form action='php_edit_func.php' method="post">
          <div class="row">
            <div class="input-field col s12 l6">
              <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="firstname" id="firstname" value= "<?php echo $firstname_db ?>" required>
              <label for="firstname">Firstname<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12 l6">
              <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $middlename_db ?>">
              <label for="middlename">Middle Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 l6">
              <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname_db ?>" required>
              <label for="lastname">Lastname<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12 l6">
              <input required name='dob' type='date' class="datepicker" value='<?php echo $date_of_birth; ?>'/>
              <label for="dob">Birthday<b class="red-text"> *</b></label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 l6">
              <label>Occupation<b class="red-text"> *</b></label>
                <select class="browser-default" name="occupation" required>
                  <option value="">Please select</option>
                  <option value="1" <?php if($occupation_db == 1) echo "selected"; ?>>Business Owner</option>
                  <option value="2" <?php if($occupation_db == 2) echo "selected"; ?>>Employee</option>
                  <option value="3" <?php if($occupation_db == 3) echo "selected"; ?>>University Lecturer</option>
                  <option value="4" <?php if($occupation_db == 4) echo "selected"; ?>>Manager</option>
                  <option value="5" <?php if($occupation_db == 5) echo "selected"; ?>>Government officer</option>
                  <option value="6" <?php if($occupation_db == 6) echo "selected"; ?>>Doctor</option>
                  <option value="7" <?php if($occupation_db == 7) echo "selected"; ?>>Researcher</option>
                  <option value="8" <?php if($occupation_db == 8) echo "selected"; ?>>Store Owner</option>
                  <option value="9" <?php if($occupation_db == 9) echo "selected"; ?>>Other</option>
                </select>
            </div>
            <div class="col s12 l6">
              <label>Salary<b class="red-text"> *</b></label>
                <select class="browser-default" name="salary" id="salary" required>
                  <option value="">Please select</option>
                  <option value="1" <?php if($salary_db == 1) echo "selected"; ?>>0&nbsp;-&nbsp;10,000&nbsp;THB/month</option>
                  <option value="2" <?php if($salary_db == 2) echo "selected"; ?>>10,001&nbsp;-15,000&nbsp;THB/month</option>
                  <option value="3" <?php if($salary_db == 3) echo "selected"; ?>>15,001&nbsp;-20,000&nbsp;THB/month</option>
                  <option value="4" <?php if($salary_db == 4) echo "selected"; ?>>20,001&nbsp;-25,000&nbsp;THB/month</option>
                  <option value="5" <?php if($salary_db == 5) echo "selected"; ?>>25,001&nbsp;-30,000&nbsp;THB/month</option>
                  <option value="6" <?php if($salary_db == 6) echo "selected"; ?>>30,001&nbsp;-35,000&nbsp;THB/month</option>
                  <option value="7" <?php if($salary_db == 7) echo "selected"; ?>>35,001&nbsp;-40,000&nbsp;THB/month</option>
                  <option value="8" <?php if($salary_db == 8) echo "selected"; ?>>&gt;40,0001&nbsp;THB/month</option>
                </select>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s2 l2">
              <input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode" placeholder="Code" value="<?php echo  $country_code; ?>" required>
              <label for="countrycode">Countrycode<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s10 l4">
            <input onkeyup="validatephone(this);" type="text" maxlength="15" name="phone" id="phone" value="<?php echo $phone_db; ?>" required>
            <label for="phone">Telephone Number<b class="red-text"> *</b></label>
            </div>
          </div>

          <h3>Address</h3>
          <div class="row">
            <div class="input-field col s12">
              <input required name="address" type="text" minlength="4" maxlength="50"  id="address" value="<?php echo $address_db; ?>" />
              <label for="address">Address<b class="red-text"> *</b></label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input onkeyup = "Validate(this)" id="txt" type="text" name="city" id="city" value="<?php echo $city_db; ?>" required>
              <label for="city">City<b class="red-text"> *</b></label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input onkeyup = "Validate(this)" id="txt" type="text" name="province" id="province" value="<?php echo $province_db; ?>" required>
              <label for="province">Province<b class="red-text"> *</b></label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <!--China lenght 6 ,Iran lenght 10-->
              <input onkeyup="validatephone(this);" type="text" maxlength="10" name="zipcode" id="zipcode" value="<?php echo $zipcode_db; ?>" required>
              <label for="zipcode">Zipcode<b class="red-text"> *</b></label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 center">
              <input type="submit" class="waves-effect waves-light btn green" value="Save" name='save'>
              <input name="Submit" type="button" value="Cancel" onclick="window.location.href='Profile.php'" class="waves-effect waves-light btn red">
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
