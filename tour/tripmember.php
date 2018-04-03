<?php
session_cache_limiter('private_no_expire');
error_reporting (E_ALL ^ E_NOTICE);
include 'module/session.php';
include 'db_config.php';

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
      <h4 class="center">Trip Member</h4>
      <form class="form-horizontal" role="form" method="post" action="<?php echo $confirm_page;?>">
        <div class="trip_member">
          <fieldset>
            <legend>Personalia:1</legend>
            <div class="row">
              <div class="input-field col s12 l6">
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" placeholder="Enter your Firstname" name="firstname1" id="firstname1" required>
                <label for="firstname1">Firstname<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename1" placeholder="Enter your Middlename" id="middlename1">
                <label for="middlename1">Middle Name</label>
              </div>
              <div class="input-field col s12 l6">
                <input onkeyup="Validate(this)" type="text" class="form-control" name="lastname1" placeholder="Enter your Lastname" id="lastname1" required>
                <label for="lastname1">Lastname<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <input type="date" class="datepicker" name="dob1" id="dob1">
                <label for="dob1">Birthday<b class="red-text"> *</b></label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 l6">
                <input onkeyup="ValidateUsername(this)"  type="text" name="passport1" id="passport1" minlength="3" maxlength="16" placeholder="Passport Id Here" required/>
                <label for="passport1">Passport ID<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <input onchange="email_validate(this.value);" type="email" class="form-control" name="email1" id="email1" placeholder="Enter your Email"  required>
                <label for="email1">Email<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s2 l2">
                <input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode1" id='countrycode1'  placeholder="Countrycode Number" required>
                <label for="countrycode1">Countrycode<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s10 l4">
              <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone1" id="phone1" placeholder="Your Phone Number Here" required>
              <label for="phone1">Telephone Number<b class="red-text"> *</b></label>
              </div>
              <div class="col s12 l6">
                <label>Reservation Age</label>
                  <select class="browser-default" name="reservation_age1">
                    <option value="" disabled selected>Choose your Reservation age</option>
                    <option value="Adult">Adult</option>
                    <option value="Child">Child</option>
                  </select>
              </div>
            </div>
          </fieldset>

          <div class="section"></div>

          <fieldset>
            <legend>Address:</legend>
            <div class="row">
              <div class="input-field col s12 l6">
                <input required name="address1" type="text" class="form-control inputpass" minlength="4" data-length="50" maxlength="50"  id="address1" placeholder="Address" />
                <label for="address1">Address<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city1" id="city1" placeholder="City1" required>
                <label for="city1">City<b class="red-text"> *</b></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province1" id="province1" placeholder="Province" required>
                <label for="province1">Province<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12 l6">
                <!-- China lenght 6 ,Iran lenght 10 -->
                <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode1" id="zipcode1" placeholder="Zip Code" required>
                <label for="zipcode1">Zipcode<b class="red-text"> *</b></label>
              </div>
              <div class="input-field col s12">
                <input required name="avoidfood1" type="text" class="form-control inputpass" maxlength="140" data-length="140"  id="avoidfood1" placeholder="Avoid Food" />
                <label for="avoidfood1">Avoid Food<b class="red-text"> *</b></label>
              </div>
            </div>
          </fieldset>
          <div class="section"></div>
          <?php
          if(isset($_SESSION['seat'])){
            $counter = 2;
            $seat = $_SESSION['seat'];
            for($i =1 ;$i<$seat;$i++){
              echo ' <div class="trip_member">'.
                '  <div class="section"></div>'.
                '<fieldset>'.
                  '<legend>Personalia:'.$counter.'</legend>'.
                  '<div class="row">'.
                  '  <div class="input-field col s12 l6">'.
                      '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control" placeholder="Enter your Firstname" name="firstname'.$counter.'" id="firstname" required>'.
                      '<label for="firstname'.$counter.'">Firstname<b class="red-text"> *</b></label>'.
                    '</div>'.
                    '<div class="input-field col s12 l6">'.
                    '  <input onkeyup = "Validate(this)" type="text" class="form-control" name="middlename'.$counter.'" placeholder="Enter your Middlename" id="middlename'.$counter.'">'.
                      '<label for="middlename'.$counter.'">Middle Name</label>'.
                    '</div>'.
                    '<div class="input-field col s12 l6">'.
                      '<input onkeyup="Validate(this)" type="text" class="form-control" name="lastname'.$counter.'" placeholder="Enter your Lastname" id="lastname'.$counter.'" required>'.
                      '<label for="lastname'.$counter.'">Lastname<b class="red-text"> *</b></label>'.
                    '</div>'.
                    '<div class="input-field col s12 l6">'.
                    '  <input type="date" class="datepicker" name="dob2" id="dob2">'.
                      '<label for="dob2">Birthday<b class="red-text"> *</b></label>'.
                    '</div>'.
                  '</div>'.

                  '<div class="row">'.
                    '<div class="input-field col s12 l6">'.
                      '<input onkeyup="ValidateUsername(this)" id="passport'.$counter.'" type="text" name="passport'.$counter.'"  minlength="3" maxlength="16" placeholder="Passport Id Here" required/>'.
                      '<label for="passport'.$counter.'">Passport ID<b class="red-text"> *</b></label>'.
                    '</div>'.
                  '  <div class="input-field col s12 l6">'.
                      '<input onchange="email_validate(this.value);" type="email" class="form-control" name="email'.$counter.'" id="email'.$counter.'" placeholder="Enter your Email"  required>'.
                      '<label for="email'.$counter.'">Email<b class="red-text"> *</b></label>'.
                    '</div>'.
                  '  <div class="input-field col s2 l2">'.
                      '<input class="col-sm-3" onkeyup="validatephone(this);" maxlength="3" type="text" name="countrycode'.$counter.'" id="countrycode'.$counter.'" placeholder="Countrycode Number" required>'.
                      '<label for="countrycode'.$counter.'">Countrycode<b class="red-text"> *</b></label>'.
                    '</div>'.
                    '<div class="input-field col s10 l4">'.
                    '<input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="15" name="phone'.$counter.'" id="phone'.$counter.'" placeholder="Your Phone Number Here" required>'.
                    '<label for="phone'.$counter.'">Telephone Number<b class="red-text"> *</b></label>'.
                    '</div>'.
                    '<div class="col s12 l6">'.
                  '    <label>Reservation Age</label>'.
                        '<select class="browser-default" name="reservation_age'.$counter.'">'.
                        '  <option value="" disabled selected>Choose your Reservation age</option>'.
                          '<option value="Adult">Adult</option>'.
                          '<option value="Child">Child</option>'.
                        '</select>'.
                    '</div>'.
                  '</div>'.
                '</fieldset>'.

              '  <div class="section"></div>'.

                '<fieldset>'.
                '  <legend>Address:</legend>'.
                  '<div class="row">'.
                    '<div class="input-field col s12 l6">'.
                      '<input required name="address'.$counter.'" type="text" class="form-control inputpass" minlength="4" data-length="50" maxlength="50"  id="address'.$counter.'" placeholder="Address" />'.
                      '<label for="address'.$counter.'">Address<b class="red-text"> *</b></label>'.
                    '</div>'.
                  '  <div class="input-field col s12 l6">'.
                      '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="city'.$counter.'" id="city'.$counter.'" placeholder="City" required>'.
                      '<label for="city'.$counter.'">City<b class="red-text"> *</b></label>'.
                    '</div>'.
                  '</div>'.
                  '<div class="row">'.
                    '<div class="input-field col s12 l6">'.
                      '<input onkeyup = "Validate(this)" id="txt" type="text" class="form-control inputpass" name="province'.$counter.'" id="province'.$counter.'" placeholder="Province" required>'.
                      '<label for="province'.$counter.'">Province<b class="red-text"> *</b></label>'.
                    '</div>'.
                  '  <div class="input-field col s12 l6">'.
                    '  <input onkeyup="validatephone(this);" type="text" class="form-control phone" maxlength="10" name="zipcode'.$counter.'" id="zipcode'.$counter.'" placeholder="Zip Code" required>'.
                      '<label for="zipcode'.$counter.'">Zipcode<b class="red-text"> *</b></label>'.
                    '</div>'.
                    '<div class="input-field col s12">'.
                      '<input required name="avoidfood'.$counter.'" type="text" class="form-control inputpass" maxlength="140" data-length="140"  id="avoidfood'.$counter.'" placeholder="Avoid Food" />'.
                      '<label for="avoidfood'.$counter.'">Avoid Food<b class="red-text"> *</b></label>'.
                    '</div>'.
                  '</div>'.
                '</fieldset>'.
                '</div>
                <div class="section"></div>';
                $counter++;

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
                  '  <input type="date" class="datepicker" name="dob2" id="dob2">'+
                    '<label for="dob2">Birthday<b class="red-text"> *</b></label>'+
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
                      '<select class="browser-default" name="reservation_age'+counter+'">'+
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
                    '<input required name="avoidfood'+counter+'" type="text" class="form-control inputpass" maxlength="140" data-length="140"  id="avoidfood'+counter+'" placeholder="Avoid Food" />'+
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
