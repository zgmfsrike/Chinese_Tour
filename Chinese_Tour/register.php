<?php
include "db_config.php";
include "module/hashing.php";

// check connection
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
// If submit button clicked from form
if(isset($_POST['submit'])){
   register();
}
// ** If user is already login, redirect to welcome.html
// if(isset()){
//     header('welcome.html');
// }

// register method
function register(){

    $username = $_POST["username"];
    $password = hashPassword(''.$_POST["password"].'');
    $firstName = $_POST["firstname"];
    $middleName = $_POST["middlename"];
    $lastName = $_POST["lastname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $dob = date('Y-m-d',strtotime($_POST["yyyy"] . "-" . $_POST["mm"] . "-" . $_POST["dd"]));
    $salary = $_POST["salary"];
    $occupation = $_POST["occupation"];

    $check = check_available($username,$email);
    if($check){
        // prepare SQL statement
        $sql = "INSERT INTO member (username, password, first_name, middle_name, last_name, address, phone, email, date_of_birth, occupation, salary) VALUES ('$username', '$password', '$firstName', '$middleName', '$lastName', '$address', '$phone', '$email', '$dob', '$occupation', '$salary')";

        // execute
        $result = mysqli_query( $GLOBALS['conn'] , $sql );
        if ($result){
            $last_id = $GLOBALS['conn']->insert_id;

            // confirmation url
            $url = "http://localhost/tourjean/active_account.php?id=" . $last_id . "&u=" . md5($username);

            // ***** Sent confirmation email
            $ToEmail = $email;
            $EmailSubject = 'Email confirmation';
            $MESSAGE_BODY = "Dear, ".$username."<br>";
            $MESSAGE_BODY .= "Click here to confirm your email:<br>";
            $MESSAGE_BODY .= $url;

            echo $MESSAGE_BODY;
            mail($ToEmail, $EmailSubject, $MESSAGE_BODY);

            // please confirmation by email

        }else{
            echo "error: " . mysqli_error( $GLOBALS['conn'] );
            header("login.html");
        }
    }
}

function check_available($username,$email){

    $msg = "";

    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    echo $count;
    if( $count >= 1 ){
        $msg .= "Username is already used.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        return false;
    }

    $query = "SELECT * FROM member WHERE email = '$email'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $count = mysqli_num_rows($result);
    if( $count >= 1 ){
        $msg .= "E-mail is already used.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        return false;
    }

    return true;
}

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
  <nav class="navbar fixed-top navbar-light navbar-expand-md bg-danger justify-content-center">
      <a href="index.html" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="collapsingNavbar3">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Create your own tour&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pick a Tour
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html">Meeting</a>
                <a class="dropdown-item" href="portfolio-2-col.html">Incentive</a>
                <a class="dropdown-item" href="portfolio-3-col.html">Conferences</a>
                <a class="dropdown-item" href="portfolio-4-col.html">Events</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">About Us</a>
            </li>
        </ul>

          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="Register.html"><i class="fa fa-user-plus">&nbsp;&nbsp;</i>Sing up&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a class="nav-link" href="Login.html"><i class="fa fa-user">&nbsp;&nbsp;</i>Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
  <!--Register body-->
  <div class="container">
<div class="row">
<div class="col-md-8">
    <h3 class="entry-title"><span><br><br>Account Information</span> </h3>
    <hr>
        <form class="form-horizontal" method="post" action="register.php">
          <div class="form-group">
            <label class="control-label col-sm-8">Username <span class="text-danger">*</span></label>
            <div class="col-md-8 col-sm-9">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="inputUsername" placeholder="Username" name="username" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-8">Password <span class="text-danger">*</span></label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
              </div>
            </div>
          </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Confirm Password <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password" required>
          </div>
        </div>
      </div>


      <h3 class="entry-title"><span><br>Personal Information</span> </h3>
      <hr>

      <div class="form-group">
        <label class="control-label col-sm-8">Name <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your Name here" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Middle Name</label>
        <div class="col-sm-8">
          <div class="input-group">
            <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter your Middle Name here">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-8">Surname <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <input type="text" class="form-control" name="lastname" id="surname" placeholder="Enter your Surname here" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Date of Birth <span class="text-danger">*</span></label>
        <div class="col-md-8 col-sm-9">
          <div class="form-inline">
            <div class="form-group">
              <select name="dd" class="form-control" required>
                <option value="">Date</option>
                <option value="1" >1 </option><option value="2" >2 </option><option value="3" >3 </option><option value="4" >4 </option><option value="5" >5 </option><option value="6" >6 </option><option value="7" >7 </option><option value="8" >8 </option><option value="9" >9 </option><option value="10" >10 </option><option value="11" >11 </option><option value="12" >12 </option><option value="13" >13 </option><option value="14" >14 </option><option value="15" >15 </option><option value="16" >16 </option><option value="17" >17 </option><option value="18" >18 </option><option value="19" >19 </option><option value="20" >20 </option><option value="21" >21 </option><option value="22" >22 </option><option value="23" >23 </option><option value="24" >24 </option><option value="25" >25 </option><option value="26" >26 </option><option value="27" >27 </option><option value="28" >28 </option><option value="29" >29 </option><option value="30" >30 </option><option value="31" >31 </option>                </select>
            </div>
            <div class="form-group">
              <select name="mm" class="form-control" required>
                <option value="">Month</option>
                <option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>                </select>
            </div>
            <div class="form-group" >
              <select name="yyyy" class="form-control" required>
                <option value="">Year</option>
                <option value="1955" >1955 </option><option value="1956" >1956 </option><option value="1957" >1957 </option><option value="1958" >1958 </option><option value="1959" >1959 </option><option value="1960" >1960 </option><option value="1961" >1961 </option><option value="1962" >1962 </option><option value="1963" >1963 </option><option value="1964" >1964 </option><option value="1965" >1965 </option><option value="1966" >1966 </option><option value="1967" >1967 </option><option value="1968" >1968 </option><option value="1969" >1969 </option><option value="1970" >1970 </option><option value="1971" >1971 </option><option value="1972" >1972 </option><option value="1973" >1973 </option><option value="1974" >1974 </option><option value="1975" >1975 </option><option value="1976" >1976 </option><option value="1977" >1977 </option><option value="1978" >1978 </option><option value="1979" >1979 </option><option value="1980" >1980 </option><option value="1981" >1981 </option><option value="1982" >1982 </option><option value="1983" >1983 </option><option value="1984" >1984 </option><option value="1985" >1985 </option><option value="1986" >1986 </option><option value="1987" >1987 </option><option value="1988" >1988 </option><option value="1989" >1989 </option><option value="1990" >1990 </option><option value="1991" >1991 </option><option value="1992" >1992 </option><option value="1993" >1993 </option><option value="1994" >1994 </option><option value="1995" >1995 </option><option value="1996" >1996 </option><option value="1997" >1997 </option><option value="1998" >1998 </option><option value="1999" >1999 </option><option value="2000" >2000 </option><option value="2001" >2001 </option><option value="2002" >2002 </option><option value="2003" >2003 </option><option value="2004" >2004 </option><option value="2005" >2005 </option><option value="2006" >2006 </option>                </select>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Occupation<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
              <select name="occupation" class="form-control" required>
        <option value="">Store Owner</option>
        <option value="1">Business Owner</option>
        <option value="2">Employee</option>
        <option value="3">University Lecturer</option>
        <option value="4">Manager</option>
        <option value="5">Government officer</option>
        <option value="6">Doctor</option>
        <option value="7">Researcher</option>
        <option value="18">Other</option>
              </select>
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Salary<span class="text-danger"> *</span></label>
        <div class="form-inline col-md-8 col-sm-9">
              <select name="salary" class="form-control" required>
                <option value="">0&nbsp;-&nbsp;10,000&nbsp;THB/month</option>
                <option value="1">10,001&nbsp;-15,000&nbsp;THB/month</option>
                <option value="2">15,001&nbsp;-20,000&nbsp;THB/month</option>
                <option value="3">20,001&nbsp;-25,000&nbsp;THB/month</option>
                <option value="4">25,001&nbsp;-30,000&nbsp;THB/month</option>
                <option value="5">30,001&nbsp;-35,000&nbsp;THB/month</option>
                <option value="6">35,001&nbsp;-40,000&nbsp;THB/month</option>
                <option value="7">&gt;40,0001&nbsp;THB/month</option>
              </select>
      </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-8">Email ID <span class="text-danger">*</span></label>
          <div class="col-sm-8">
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control" name="email" id="emailid" placeholder="Enter your Email ID"  required>
            </div>
            </div>
        </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Contact No. <span class="text-danger">*</span></label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
          <input type="text" class="form-control" name="phone" id="contactnum" placeholder="Enter your contact no."  required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-8">Address <span class="text-danger">*</span></label>
        <textarea class="form-control" rows="5" id="address" name="address" required></textarea>
      </div>
      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-10 float-none">
          <input type="submit" class="btn btn-danger btn-md" value="Sign Up" name="submit">
          <input name="Submit" type="submit" value="Cancel" onclick="window.location.href='Index.html'" class="btn btn-warning">
        </div>
      </div>
    </form>
</div>
</div>
  </div>
<!--end Register body-->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

</body>
</html>
