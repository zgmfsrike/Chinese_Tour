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
      <h3>Confirm Information</h3><br/>
      <fieldset>
        <legend>Tour Schedule</legend>
        <!--Day row-->
        <div class="row">
          <div class="col s2 center">
            <ul>
              <li><b>Day 1</b></li>
            </ul>
          </div>
          <div class="col s2 center">
            <ul>
              <li>08.00-11.00</li>
              <li>11.00-13.00</li>
            </ul>
          </div>
          <div class="col s5">
            <ul>
              <li>attraction1</li>
              <li>attraction1</li>
            </ul>
          </div>
        </div>
      <!--End row-->

      <!--Day row-->
      <div class="row">
        <div class="col s2 center">
          <ul>
            <li><b>Day 1</b></li>
          </ul>
        </div>
        <div class="col s2 center">
          <ul>
            <li>08.00-11.00</li>
            <li>11.00-13.00</li>
          </ul>
        </div>
        <div class="col s5">
          <ul>
            <li>attraction1</li>
            <li>attraction1</li>
          </ul>
        </div>
      </div>
    <!--End row-->

      </fieldset>
      <div class="section"></div>
      <fieldset>
        <legend>Tour Group Member</legend>
        <!--Member row-->
        <div class="row">
          <div class="col s2 center">
            <ul>
              <li><b>#1</b></li>
            </ul>
          </div>
          <!--Name-->
          <div class="col s2 center">
            <ul>
              <li>Surasung Jungrai</li>
            </ul>
          </div>
          <!--Email-->
          <div class="col s5">
            <ul>
              <li>5555555@gmail.com</li>
            </ul>
          </div>
        </div>
      <!--End row-->
      </fieldset>
      <div class="section"></div>
      <fieldset>
        <legend>Tour Attribute</legend>
        <div class="col s12">
          <ul>
            <li><b>Tour Type : </b>XXXX</li>
            <li><b>Vehicle : </b>XXXX</li>
            <li><b>Accommodation : </b>XXXX</li>
            <li><b>Departure Location : </b>XXXX</li>
            <li><b>Drop off Location : </b>XXXX</li>
            <li><b>Start Date : </b>XXXX</li>
            <li><b>End Date : </b>XXXX</li>
          </ul>
        </div>
      </fieldset>
    </div>
    <div class="row">
        <div class="section"></div>
      <div class="center col s12">
        <button type="submit" value="Cancel" onclick="window.location.href='index.php'" class="btn red">Cancel</button>
        <button name="submit" type="submit" class="btn amber" value="Sign Up">Submit</button>
      </div>
    </div>
    <div class="section"></div>
  </div>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

    </body>
  </html>
