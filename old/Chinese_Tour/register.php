<?php
include 'module/session.php';
noLogin();
?>
<!------------------------------ HTML ------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>

    <!-- Site Properties -->
    <title>Chiang Mai Hongthai Business and Consultant Enterprise</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">




</head>
    
<body>
  <!-- Navigation -->
  <?php 
    include 'component/header.php';
    ?>
  <!--Register body-->
  <div class="container">
<div class="row">
<div class="col-md-8">
    <h3 class="entry-title"><span><br><br>Account Information</span> </h3>
    <hr>
        <form class="form-horizontal" method="post" action="php_register.php" id="fileForm" role="form">
          <div class="form-group">
            <label class="control-label col-sm-8">Username <span class="text-danger req">*</span></label>
            <div class="col-md-8 col-sm-9">
              <div class="input-group">
                <span class="input-group-addon req"><i class="fa fa-user"></i></span>
                <input onkeyup = "ValidateUsername(this)" id="username" type="text" class="form-control" name="username" id="username" placeholder="Enter your Username here" minlength="3" maxlength="16" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="control-label col-sm-8">Password <span class="text-danger req">*</span></label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon req"><i class="fa fa-lock"></i></span>
                <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="inputPassword" placeholder="Please enter your password" />
              </div>
            </div>
          </div>

      <div class="form-group">
        <label for="password" class="control-label col-sm-8">Confirm Password <span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-lock"></i></span>
            <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" type="password" class="form-control inputpass" name="cpassword" minlength="4" maxlength="16" id="cpassword" placeholder="Confirm your password" required>
          </div>
            <span id="confirmMessage" class="confirmMessage"></span>
        </div>
      </div>

      <h3 class="entry-title"><span><br>Personal Information</span> </h3>
      <hr>

      <div class="form-group">
        <label class="control-label col-sm-8">Name&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your Name here" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8 req">Middle&nbsp;Name</label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter your Middle Name here">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Surname&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your Surname here" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Date&nbsp;of&nbsp;Birth&nbsp;<span class="text-danger">*</span></label>
        <div class="form-inline col-md-8 col-sm-9">
        <input required id="dob" name="dob" class="form-control" type="date" value="2017-10-13"/>
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Occupation&nbsp;<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
              <select name="occupation" class="form-control" required>
        <option value="">Please select</option>
        <option value="1">Business Owner</option>
        <option value="2">Employee</option>
        <option value="3">University Lecturer</option>
        <option value="4">Manager</option>
        <option value="5">Government officer</option>
        <option value="6">Doctor</option>
        <option value="7">Researcher</option>
        <option value="8">Store Owner</option>
        <option value="9">Other</option>
              </select>
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Salary&nbsp;<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
              <select name="salary" class="form-control" required>
                <option value="">Please select</option>
                <option value="1">0&nbsp;-&nbsp;10,000&nbsp;THB/month</option>
                <option value="2">10,001&nbsp;-15,000&nbsp;THB/month</option>
                <option value="3">15,001&nbsp;-20,000&nbsp;THB/month</option>
                <option value="4">20,001&nbsp;-25,000&nbsp;THB/month</option>
                <option value="5">25,001&nbsp;-30,000&nbsp;THB/month</option>
                <option value="6">30,001&nbsp;-35,000&nbsp;THB/month</option>
                <option value="7">35,001&nbsp;-40,000&nbsp;THB/month</option>
                <option value="8">&gt;40,0001&nbsp;THB/month</option>
              </select>
      </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-8">Email&nbsp;<span class="text-danger req">*</span></label>
          <div class="col-sm-8">
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your Email"  required>
            </div>
            </div>
        </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Contact No.&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode" placeholder="Code" value="" required>
          <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone" id="phone" placeholder="Enter your contact no." required>
          </div>
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-8">Address <span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input required name="address" type="text" class="form-control inputpass" minlength="4" maxlength="50"  id="address" placeholder="Address" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">City&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
              <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city" id="city" placeholder="City" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Province&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
              <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province" id="province" placeholder="Province" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Zip&nbsp;Code&nbsp;<span class="text-danger req">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
          <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="5" name="zipcode" id="zipcode" placeholder="Zip Code" required>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-10 float-none">
            <input name="submit" type="submit" class="btn btn-danger btn-md" value="Sign Up">
            <input type="submit" value="Cancel" onclick="window.location.href='Index.php'" class="btn btn-warning">
        </div>
      </div>
    </form>
    </div>
</div>
  </div>
<!--  FOOTER  -->
    <br><br><br><br>
<?php
    include 'component/footer.php';
?>
<!--end Register body-->
    <script src="js/validate.js"></script>
    <script src="js/validate2.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
</body>
</html>
