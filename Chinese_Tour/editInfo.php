<!---------------------------------HTML --------------------------------- -->
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
    include 'php_edit_func.php' ;
    ?>
  <br><br>
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
        <h3 class="entry-title"><span><br>Account Information</span> </h3>
        <hr>
        <!-- <form action='php_edit_func.php' method="post"> -->
        <form action='editInfo.php' method="post">
      <div class="form-group">
        <label class="control-label col-sm-8">Name <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="firstname" id="firstname" value= "<?php echo $firstname_db ?>"required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Middle Name</label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $middlename_db ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Surname <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input onkeyup = "Validate(this)" type="text" class="form-control" name="surname" id="surname" value="<?php echo $lastname_db ?>" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Date of Birth <span class="text-danger">*</span></label>
        <div class="col-md-8 col-sm-9">
          <div class="form-inline">
            <div class="form-group">
            <input required id="dob" name="dob" class="form-control" type="date" value="<?php echo $date_of_birth ?>"/>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Occupation<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
          <select name="Occupation" class="form-control"  required >
    <option value="">Please select</option>
    <option value="1" <?php if($occupation_db == 1) echo "selected"; ?>>Business Owner</option>
    <option value="2" <?php if($occupation_db == 2) echo "selected"; ?>>Employee</option>
    <option value="3" <?php if($occupation_db == 3) echo "selected"; ?> >University Lecturer</option>
    <option value="4" <?php if($occupation_db == 4) echo "selected"; ?> >Manager</option>
    <option value="5" <?php if($occupation_db == 5) echo "selected"; ?> >Government officer</option>
    <option value="6" <?php if($occupation_db == 6) echo "selected"; ?> >Doctor</option>
    <option value="7" <?php if($occupation_db == 7) echo "selected"; ?> >Researcher</option>
    <option value="8" <?php if($occupation_db == 8) echo "selected"; ?> >Store Owner</option>
    <option value="9" <?php if($occupation_db == 9) echo "selected"; ?> >Other</option>
          </select>
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Salary<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
          <select name="salary" class="form-control" required>
            <option value="">Please select</option>
            <option value="1" <?php if($salary_db == 1) echo "selected"; ?> >0&nbsp;-&nbsp;10,000&nbsp;THB/month</option>
            <option value="2" <?php if($salary_db == 2) echo "selected"; ?> >10,001&nbsp;-15,000&nbsp;THB/month</option>
            <option value="3" <?php if($salary_db == 3) echo "selected"; ?> >15,001&nbsp;-20,000&nbsp;THB/month</option>
            <option value="4" <?php if($salary_db == 4) echo "selected"; ?> >20,001&nbsp;-25,000&nbsp;THB/month</option>
            <option value="5" <?php if($salary_db == 5) echo "selected"; ?> >25,001&nbsp;-30,000&nbsp;THB/month</option>
            <option value="6" <?php if($salary_db == 6) echo "selected"; ?> >30,001&nbsp;-35,000&nbsp;THB/month</option>
            <option value="7" <?php if($salary_db == 7) echo "selected"; ?> >35,001&nbsp;-40,000&nbsp;THB/month</option>
            <option value="8" <?php if($salary_db == 8) echo "selected"; ?> >&gt;40,0001&nbsp;THB/month</option>
          </select>
      </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-8">Contact No. <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone">&nbsp;&nbsp;66</i></span>
          <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="9" name="contactnum" id="contactnum" value="<?php echo $phone_db ?>" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Address <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input required name="address" type="text" class="form-control inputpass" minlength="4" maxlength="50" value="<?php echo $address_db ?>" id="address" placeholder="Address" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">City <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
          <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="city" id="city" value="<?php echo $city_db ?>" placeholder="City" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Province <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="province" id="province" value="<?php echo $province_db ?>" placeholder="Province" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Zip Code <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
          <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="5" name="zipcode" value="<?php echo $zipcode_db ?>" id="zipcode" placeholder="Zip Code" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-8 float-none">
          <input type="submit" class="btn btn-danger btn-md" value="Save" name='save'>
          <input name="Submit" type="button" value="Cancel" onclick="window.location.href='Profile.php'" class="btn btn-warning">
        </div>
      </div>
      </form>
    </div>
    <!-- /.row -->

  </div>
</div>
  <!-- /.container -->
<?php
    include 'component/footer.php';
    ?>
<!--end side menu body-->
<script src="js/validate.js"></script>

</body>
</html>
