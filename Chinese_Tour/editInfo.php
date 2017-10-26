<?php
ob_start();
session_cache_expire(30);
error_reporting (E_ALL ^ E_NOTICE);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "db_config.php";
// include "db_configNB.php";
include "module/hashing.php";
//----------------------------Wait for session---------------------------------------------//
session_start();
//----------------------------Show value-----------------------------------------------//
$id = $_SESSION['login_id'];



?>



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
  <nav class="navbar fixed-top navbar-light navbar-expand-md bg-danger justify-content-center">
      <a href="index.php" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="collapsingNavbar3">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Create your own tour&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pick a Tour
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.php">Meeting</a>
                <a class="dropdown-item" href="portfolio-2-col.php">Incentive</a>
                <a class="dropdown-item" href="portfolio-3-col.php">Conferences</a>
                <a class="dropdown-item" href="portfolio-4-col.php">Events</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">About Us</a>
            </li>
        </ul>

          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="Register.php"><i class="fa fa-user-plus">&nbsp;&nbsp;</i>Sing up&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a class="nav-link" href="Login.php"><i class="fa fa-user">&nbsp;&nbsp;</i>Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item">
              <span class="nav-link text-dark" id="nav-chatservice"><i class="fa fa-comments">&nbsp;&nbsp;</i>Chat Service</span>
              <span class="nav-link text-dark" id="nav-contactservice"><i class="fa fa-phone">&nbsp;&nbsp;</i>+66-xxx-xxxx</span>
            </li>
            <li>

            </li>
          </ul>
      </div>
  </nav>
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
        <form action='editinfo.php' method="post">
          <?php
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
          $date_of_birth = $data['date_of_birth'];

           ?>
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
            <input required name="address" type="text" class="form-control inputpass" minlength="4" maxlength="50"  id="address" placeholder="Address" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">City <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
          <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="city" id="city" placeholder="City" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Province <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
            <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="province" id="province" placeholder="Province" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Zip Code <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon req"><i class="fa fa-home"></i></span>
          <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="5" name="zipcode" id="zipcode" placeholder="Zip Code" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-8 float-none">
          <input type="submit" class="btn btn-danger btn-md" value="Save" name='save'>
          <input name="Submit" type="submit" value="Cancel" onclick="window.location.href='Profile.php'" class="btn btn-warning">
        </div>
      </div>
      </form>
    </div>
    <!-- /.row -->

  </div>
</div>
  <!-- /.container -->

<!--end side menu body-->
<script src="js/validate.js"></script>
<?php
//-----------------------------Variable----------------------------------------------------//

if(isset($_SESSION['login_id'])){
$id = $_SESSION['login_id'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$surname = $_POST['surname'];
$occupation =  $_POST['Occupation'];
$salary = $_POST['salary'];
$dob = $_POST['dob'];
$phone = $_POST['contactnum'];


$location = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];

$address = $location." ".$city." ".$province." ".$zipcode;
$dob_format = $dob ;
//-----------------------------Edit fucntion----------------------------------------------------//
if($_POST['save']){

    $sql= "UPDATE `member` SET `first_name`='$firstname', `middle_name`='$middlename',`last_name`='$surname',`address`='$address',
                                `phone`='$phone',`occupation`='$occupation',`salary`='$salary',`date_of_birth`='$dob' WHERE id = $id ";
    $result = mysqli_query( $GLOBALS['conn'] , $sql );
      header("location: profile.php");
      ob_end_flush();


}
}


?>
</body>
</html>
