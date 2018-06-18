<?php
session_cache_limiter('private_no_expire');
error_reporting (E_ALL ^ E_NOTICE);
include 'module/session.php';
include 'db_config.php';
require 'module/language/init.php';

if(isset($_SESSION['tour_round'])){
  $tour_round_id = $_SESSION['tour_round'];

}
if(isset($_SESSION['result_price'])){
  $result_price = $_SESSION['result_price'];
}



?>
<!DOCTYPE html>
<html>
<?php
$title = "Trip Member";
include 'component/header.php';
$confirm_page = 'php_book_tour_info.php';
?>
<body>

  <div class="container">
    <div class="row">
      <div class="section"></div>
      <h3 class="center"><b>Trip Member(s)</b></h3>
      <form class="form-horizontal" role="form" method="post" action="<?php echo $confirm_page;?>">
        <div class="trip_member">
          <h4><b>Member : 1</b></h4>
          <fieldset class="yellow lighten-5">
            <div class="row">
              <div class="input-field col s12 l6">
                <h5 for="firstname1">Firstname<b class="red-text"> *</b></h5>
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" placeholder="Enter your Firstname" name="firstname1" id="firstname1" required>
              </div>
              <div class="input-field col s12 l6">
                <h5 for="middlename1">Middle Name</h5>
                <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename1" placeholder="Enter your Middlename" id="middlename1">

              </div>
              <div class="input-field col s12 l6">
                <h5 for="lastname1">Lastname<b class="red-text"> *</b></h5>
                <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname1" placeholder="Enter your Lastname" id="lastname1" required>

              </div>
              <div class="input-field col s12 l6">
                <h5 for="dob1">Birthday<b class="red-text"> *</b></h5>
                <input placeholder="Birthday" required type="date" class="datepicker" name="dob1" id="dob1">

              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 l6">
                <h5 for="passport1">Passport ID<b class="red-text"> *</b></h5>
                <input onkeyup="ValidateUsername(this)"  type="text" name="passport1" id="passport1" minlength="3" maxlength="16" placeholder="Passport Id Here" required/>

              </div>
              <div class="input-field col s12 l6">
                <h5 for="email1">Email<b class="red-text"> *</b></h5>
                <input onchange="email_validate(this.value);" type="email" class="form-control" name="email1" id="email1" placeholder="Enter your Email"  required>

              </div>
              <div class="input-field col s3 l3">
                <h5 for="countrycode1">Country Code<b class="red-text"> *</b></h5>
                <input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode1" id='countrycode1'  placeholder="Country Code Number" required>

              </div>
              <div class="input-field col s9 l3">
                <h5 for="phone1">Telephone Number<b class="red-text"> *</b></h5>
                <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone1" id="phone1" placeholder="Phone Number Here" required>

              </div>
              <div class="col s12 l6">
                <h5>Reservation Age</h5>
                <select required class="browser-default yellow lighten-5" name="reservation_age1">
                  <option value="" disabled selected>Choose your Reservation age</option>
                  <option value="Adult">Adult</option>
                  <option value="Child">Child</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <h5 for="address1">Address<b class="red-text"> *</b></h5>
                <input required name="address1" type="text" class="form-control inputpass" minlength="4" data-length="50" maxlength="50"  id="address1" placeholder="Address" />

              </div>
              <div class="input-field col s12 l6">
                <h5 for="city1">City<b class="red-text"> *</b></h5>
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city1" id="city1" placeholder="City1" required>

              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <h5 for="province1">Province<b class="red-text"> *</b></h5>
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province1" id="province1" placeholder="Province" required>

              </div>
              <div class="input-field col s12 l6">
                <!-- China lenght 6 ,Iran lenght 10 -->
                <h5 for="zipcode1">Zipcode<b class="red-text"> *</b></h5>
                <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode1" id="zipcode1" placeholder="Zip Code" required>

              </div>
              <div class="input-field col s12">
                <h5 for="avoidfood1">Avoid Food</h5>
                <input  name="avoidfood1" type="text" class="form-control inputpass" maxlength="140" data-length="140"  id="avoidfood1" placeholder="Avoid Food" />

              </div>
            </div>
          </fieldset>
          <div class="section"></div>
          <?php
          if(isset($_SESSION['seat'])){
            $seat = $_SESSION['seat'];
            for($i =2 ;$i<=$seat;$i++){
              echo ' <div class="trip_member">'.
              '  <div class="section"></div>'.
              '<h4><b>Member : '.$i.'</b></h4>'.
              '<fieldset class="yellow lighten-5">'.
              '<div class="row">'.
              '  <div class="input-field col s12 l6">'.
              '<h5 for="firstname'.$i.'">Firstname<b class="red-text"> *</b></h5>'.
              '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" placeholder="Enter your Firstname" name="firstname'.$i.'" id="firstname" required>'.
              '</div>'.
              '<div class="input-field col s12 l6">'.
              '<h5 for="middlename'.$i.'">Middle Name</h5>'.
              '  <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename'.$i.'" placeholder="Enter your Middlename" id="middlename'.$i.'">'.

              '</div>'.
              '<div class="input-field col s12 l6">'.
              '<h5 for="lastname'.$i.'">Lastname<b class="red-text"> *</b></h5>'.
              '<input onkeyup="Validate(this)" type="text" class="form-control" name="lastname'.$i.'" placeholder="Enter your Lastname" id="lastname'.$i.'" required>'.

              '</div>'.
              '<div class="input-field col s12 l6">'.
              '<h5 for="dob'.$i.'">Birthday<b class="red-text"> *</b></h5>'.
              '  <input placeholder="Birthday" required type="date" class="datepicker" name="dob'.$i.'" id="dob'.$i.'">'.

              '</div>'.
              '</div>'.

              '<div class="row">'.
              '<div class="input-field col s12 l6">'.
              '<h5 for="passport'.$i.'">Passport ID<b class="red-text"> *</b></h5>'.
              '<input onkeyup="ValidateUsername(this)" id="passport'.$i.'" type="text" name="passport'.$i.'"  minlength="3" maxlength="16" placeholder="Passport Id Here" required/>'.

              '</div>'.
              '  <div class="input-field col s12 l6">'.
              '<h5 for="email'.$i.'">Email<b class="red-text"> *</b></h5>'.
              '<input onchange="email_validate(this.value);" type="email" class="form-control" name="email'.$i.'" id="email'.$i.'" placeholder="Enter your Email"  required>'.

              '</div>'.
              '  <div class="input-field col s2 l2">'.
              '<h5 for="countrycode'.$i.'">Countrycode<b class="red-text"> *</b></h5>'.
              '<input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode'.$i.'" id="countrycode'.$i.'" placeholder="Countrycode Number" required>'.

              '</div>'.
              '<div class="input-field col s10 l4">'.
              '<h5 for="phone'.$i.'">Telephone Number<b class="red-text"> *</b></h5>'.
              '<input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone'.$i.'" id="phone'.$i.'" placeholder="Your Phone Number Here" required>'.

              '</div>'.
              '<div class="col s12 l6">'.
              '    <h5>Reservation Age</h5>'.
              '<select required class="browser-default yellow lighten-5" name="reservation_age'.$i.'">'.
              '  <option value="" disabled selected>Choose your Reservation age</option>'.
              '<option value="Adult">Adult</option>'.
              '<option value="Child">Child</option>'.
              '</select>'.
              '</div>'.
              '</div>'.
              '<div class="row">'.
              '<div class="input-field col s12 l6">'.
              '<h5 for="address'.$i.'">Address<b class="red-text"> *</b></h5>'.
              '<input required name="address'.$i.'" type="text" class="form-control inputpass" minlength="4" data-length="50" maxlength="50"  id="address'.$i.'" placeholder="Address" />'.

              '</div>'.
              '  <div class="input-field col s12 l6">'.
              '<h5 for="city'.$i.'">City<b class="red-text"> *</b></h5>'.
              '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city'.$i.'" id="city'.$i.'" placeholder="City" required>'.

              '</div>'.
              '</div>'.
              '<div class="row">'.
              '<div class="input-field col s12 l6">'.
              '<h5 for="province'.$i.'">Province<b class="red-text"> *</b></h5>'.
              '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province'.$i.'" id="province'.$i.'" placeholder="Province" required>'.

              '</div>'.
              '  <div class="input-field col s12 l6">'.
              '<h5 for="zipcode'.$i.'">Zipcode<b class="red-text"> *</b></h5>'.
              '  <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode'.$i.'" id="zipcode'.$i.'" placeholder="Zip Code" required>'.

              '</div>'.
              '<div class="input-field col s12">'.
              '<h5 for="avoidfood'.$i.'">Avoid Food</h5>'.
              '<input  name="avoidfood'.$i.'" type="text" class="form-control inputpass" maxlength="140" data-length="140"  id="avoidfood'.$i.'" placeholder="Avoid Food" />'.

              '</div>'.
              '</div>'.
              '</fieldset>'.
              '</div>
              <div class="section"></div>';

            }


          }



          ?>

        </div>








        <div class="row">
          <div class="center col s12">
            <button type="button" value="Cancel" onclick="window.location.href='tour.php?id=<?php echo $_SESSION['tour_id'];?>'" class="btn red">Cancel</button>
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
  <script>
  $(document).ready(function(){
    $('.add_more_member').click(function(e){
      e.preventDefault();
      var e = document.getElementsByClassName('trip_member');
      var i;
      var counter = 1;
      for(i=0; i <e.length; i++) {
        if(e[i].className=="trip_member") {
          counter++;
        }
      }
      if(counter <= <?php echo $amount_people;?>){
        $(this).before(' <div class="section"></div><div class="trip_member"'+
        '  <div class="section"></div>'+
        '<fieldset>'+
        '<legend>Personalia:'+counter+'</legend>'+
        '<div class="row">'+
        '  <div class="input-field col s12 l6">'+
        '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" placeholder="Enter your Firstname" name="firstname'+counter+'" id="firstname" required>'+
        '<label for="firstname'+counter+'">Firstname<b class="red-text"> *</b></label>'+
        '</div>'+
        '<div class="input-field col s12 l6">'+
        '  <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename'+counter+'" placeholder="Enter your Middlename" id="middlename'+counter+'">'+
        '<label for="middlename'+counter+'">Middle Name</label>'+
        '</div>'+
        '<div class="input-field col s12 l6">'+
        '<input onkeyup="Validate(this)" type="text" class="form-control" name="lastname'+counter+'" placeholder="Enter your Lastname" id="lastname'+counter+'" required>'+
        '<label for="lastname'+counter+'">Lastname<b class="red-text"> *</b></label>'+
        '</div>'+
        '<div class="input-field col s12 l6">'+
        '  <input required type="date" class="datepicker" name="dob2" id="dob2">'+
        '<label for="dob'+counter+'">Birthday<b class="red-text"> *</b></label>'+
        '</div>'+
        '</div>'+

        '<div class="row">'+
        '<div class="input-field col s12 l6">'+
        '<input onkeyup="ValidateUsername(this)" id="passport'+counter+'" type="text" name="passport'+counter+'"  minlength="3" maxlength="16" placeholder="Passport Id Here" required/>'+
        '<label for="passport'+counter+'">Passport ID<b class="red-text"> *</b></label>'+
        '</div>'+
        '  <div class="input-field col s12 l6">'+
        '<input onchange="email_validate(this.value);" type="email" class="form-control" name="email'+counter+'" id="email'+counter+'" placeholder="Enter your Email"  required>'+
        '<label for="email'+counter+'">Email<b class="red-text"> *</b></label>'+
        '</div>'+
        '  <div class="input-field col s2 l2">'+
        '<input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode'+counter+'" id="countrycode'+counter+'" placeholder="Countrycode Number" required>'+
        '<label for="countrycode'+counter+'">Countrycode<b class="red-text"> *</b></label>'+
        '</div>'+
        '<div class="input-field col s10 l4">'+
        '<input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone'+counter+'" id="phone'+counter+'" placeholder="Your Phone Number Here" required>'+
        '<label for="phone'+counter+'">Telephone Number<b class="red-text"> *</b></label>'+
        '</div>'+
        '<div class="col s12 l6">'+
        '    <label>Reservation Age</label>'+
        '<select required class="browser-default" name="reservation_age'+counter+'">'+
        '  <option value="" disabled selected>Choose your Reservation age</option>'+
        '<option value="Adult">Adult</option>'+
        '<option value="Child">Child</option>'+
        '</select>'+
        '</div>'+
        '</div>'+
        '</fieldset>'+

        '  <div class="section"></div>'+

        '<fieldset>'+
        '  <legend>Address:</legend>'+
        '<div class="row">'+
        '<div class="input-field col s12 l6">'+
        '<input required name="address'+counter+'" type="text" class="form-control inputpass" minlength="4" data-length="50" maxlength="50"  id="address'+counter+'" placeholder="Address" />'+
        '<label for="address'+counter+'">Address<b class="red-text"> *</b></label>'+
        '</div>'+
        '  <div class="input-field col s12 l6">'+
        '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city'+counter+'" id="city'+counter+'" placeholder="City" required>'+
        '<label for="city'+counter+'">City<b class="red-text"> *</b></label>'+
        '</div>'+
        '</div>'+
        '<div class="row">'+
        '<div class="input-field col s12 l6">'+
        '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province'+counter+'" id="province'+counter+'" placeholder="Province" required>'+
        '<label for="province'+counter+'">Province<b class="red-text"> *</b></label>'+
        '</div>'+
        '  <div class="input-field col s12 l6">'+
        '  <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode'+counter+'" id="zipcode'+counter+'" placeholder="Zip Code" required>'+
        '<label for="zipcode'+counter+'">Zipcode<b class="red-text"> *</b></label>'+
        '</div>'+
        '<div class="input-field col s12">'+
        '<input name="avoidfood'+counter+'" type="text" class="form-control inputpass" maxlength="140" data-length="140"  id="avoidfood'+counter+'" placeholder="Avoid Food" />'+
        '<label for="avoidfood'+counter+'">Avoid Food<b class="red-text"> *</b></label>'+
        '</div>'+
        '</div>'+
        '</fieldset>'+
        '</div>'
      );

    }



  });
});




</script>

</body>
</html>
