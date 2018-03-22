<?php
include 'module/session.php';

?>
<!DOCTYPE html>
<html>
    <?php
     $title = "Trip Member";
      include 'component/header.php';
?>
<body>

  <div class="container">
    <div class="row">
      <div class="section"></div>
      <h4 class="center">Trip Member</h4>
      <form class="form-horizontal" role="form" method="post" action="">

        <fieldset>
          <legend>Personalia:</legend>
          <div class="row">
            <div class="input-field col s12 l6">
              <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" placeholder="Enter your Firstname" name="firstname" id="firstname" required>
              <label for="firstname">Firstname<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12 l6">
              <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename" placeholder="Enter your Middlename" id="middlename">
              <label for="middlename">Middle Name</label>
            </div>
            <div class="input-field col s12 l6">
              <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname" placeholder="Enter your Lastname" id="lastname" required>
              <label for="lastname">Lastname<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12 l6">
              <input type="date" class="datepicker" name="dob" id="dob">
              <label for="dob">Birthday<b class="red-text"> *</b></label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12 l6">
              <input onkeyup="ValidateUsername(this)" id="passport" type="text" name="passport" id="passport" minlength="3" maxlength="16" placeholder="Passport Id Here" required/>
              <label for="passport">Passport ID<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12 l6">
              <input onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your Email"  required>
              <label for="email">Email<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s2 l2">
              <input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode" placeholder="Countrycode Number" required>
              <label for="countrycode">Countrycode<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s10 l4">
            <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone" id="phone" placeholder="Your Phone Number Here" required>
            <label for="phone">Telephone Number<b class="red-text"> *</b></label>
            </div>
            <div class="col s12 l6">
              <label>Reservation Age</label>
                <select class="browser-default" name="reservation_age">
                  <option value="" disabled selected>Choose your Reservation age</option>
                  <option value="1">Adult</option>
                  <option value="2">Child</option>
                </select>
            </div>
          </div>
        </fieldset>

        <div class="section"></div>

        <fieldset>
          <legend>Address:</legend>
          <div class="row">
            <div class="input-field col s12 l6">
              <input required name="address" type="text" class="form-control inputpass" minlength="4" data-length="50" maxlength="50"  id="address" placeholder="Address" />
              <label for="address">Address<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12 l6">
              <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city" id="city" placeholder="City" required>
              <label for="city">City<b class="red-text"> *</b></label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 l6">
              <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province" id="province" placeholder="Province" required>
              <label for="province">Province<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12 l6">
              <!--China lenght 6 ,Iran lenght 10-->
              <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode" id="zipcode" placeholder="Zip Code" required>
              <label for="zipcode">Zipcode<b class="red-text"> *</b></label>
            </div>
            <div class="input-field col s12">
              <input required name="avoidfood" type="text" class="form-control inputpass" maxlength="140" data-length="140"  id="avoidfood" placeholder="Avoid Food" />
              <label for="avoidfood">Avoid Food<b class="red-text"> *</b></label>
            </div>
          </div>
        </fieldset>



      <div class="section"></div>

      <div class="row">
        <div class="center col s12">
          <button type="submit" value="Cancel" onclick="window.location.href='index.php'" class="btn red">Cancel</button>
          <button name="submit" type="submit" class="btn amber" value="Sign Up">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

    </body>
  </html>
