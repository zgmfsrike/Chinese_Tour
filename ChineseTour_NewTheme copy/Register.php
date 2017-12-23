<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
      include 'module/session.php';
      isNotLogin();
?>
<body>

      <!--Register-->
      <div class="container">
        <div class="row">
          <h3 class="center">Registration</h3>
          <div class="col s12">
            <h4>Account Information</h4>
            <form class="form-horizontal" method="post" action="php_register.php" id="fileForm" role="form">

            <div class="row">
              <div class="input-field col s12 l6">
                <input onkeyup="ValidateUsername(this)" id="username" type="text" name="username" id="username" minlength="3" maxlength="16" required/>
                <label for="username">Username<b class="red-text"> *</b></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" id="inputPassword"/>
                <label for="password">Password<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <input onkeyup="checkPass(); return false;" onfocusout="checkPass(); return false;" type="password" class="form-control inputpass" name="cpassword" minlength="4" maxlength="16" id="cpassword" placeholder="Confirm your password" required>
                <label for="cpassword">Comfirm Password</label>
                <span id="confirmMessage" class="confirmMessage"></span>
              </div>
            </div>

            <h4>Personal Information</h4>
            <div class="row">
              <div class="input-field col s12 l6">
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your Name here" required>
                <label for="firstname">Firstname<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter your Middle Name here">
                <label for="middlename">Middle Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your Surname here" required>
                <label for="lastname">Lastname<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <input type="text" class="datepicker" name="dob" id="dob">
                <label for="dob">Birthday<b class="red-text"> *</b></label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 l6">
                <label>Occupation<b class="red-text"> *</b></label>
                  <select class="browser-default" name="occupation" required>
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
              <div class="col s12 l6">
                <label>Salary<b class="red-text"> *</b></label>
                  <select class="browser-default" name="salary" id="salary" required>
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

            <div class="row">
              <div class="input-field col s12 l6">
                <input onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your Email"  required>
                <label for="email">Email<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s2 l2">
                <input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode" placeholder="Code" value="" required>
                <label for="countrycode">Countrycode<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s10 l4">
              <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone" id="phone" placeholder="Enter your contact no." required>
              <label for="phone">Telephone Number<b class="red-text"> *</b></label>
              </div>
            </div>
            <h5>Address</h5>
            <div class="row">
              <div class="input-field col s10 l6">
                <input required name="address" type="text" class="form-control inputpass" minlength="4" maxlength="50"  id="address" placeholder="Address" />
                <label for="address">Address<b class="red-text"> *</b></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s10 l6">
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city" id="city" placeholder="City" required>
                <label for="city">City<b class="red-text"> *</b></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s10 l6">
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province" id="province" placeholder="Province" required>
                <label for="province">Province<b class="red-text"> *</b></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s10 l6">
                <!--China lenght 6 ,Iran lenght 10-->
                <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode" id="zipcode" placeholder="Zip Code" required>
                <label for="zipcode">Zipcode<b class="red-text"> *</b></label>
              </div>
            </div>

            <div class="row">
              <div class="center col s12">
                <input type="submit" value="Cancel" onclick="window.location.href='Index.php'" class="waves-effect waves-light btn red">
                <input name="submit" type="submit" class="waves-effect waves-light btn amber" value="Sign Up">
              </div>
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
