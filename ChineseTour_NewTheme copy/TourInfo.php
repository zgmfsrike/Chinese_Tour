<?php
include 'module/session.php';
?>
<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>

    <!--tour body-->
    <div class="container">
      <div class="section"></div><div class="section"></div>
      <div class="row">
        <div class="col s12 l6">
          <div class="slider">
            <ul class="slides">
              <li>
                <img src="images/home1.jpg">
              </li>
              <li>
                <img src="images/home2.jpg">
              </li>
              <li>
                <img src="images/home3.jpg">
              </li>
              <li>
                <img src="images/home4.jpg">
              </li>
              <li>
                <img src="images/home5.jpg">
              </li>
            </ul>
          </div>
        </div>
        <div class="col s12 l6">
          <div class="card"><br/>
            <h5 class="center-align">Sale Price : ฿xx,xxx</h5>
            <p class="center-align">Satisfaction xx% from xxxx people</p>
            <p class="center-align">xxxx people travelled</p><br/>
          </div>

          <ul>
            <li>Tour type : Business Tour</li>
            <li>Vehicle : xxxx</li>
            <li>Accommodation : xxxx</li>
          </ul>
          <form method="post">
            <label>Departure Location</label>
              <select class="browser-default" name="depart" required>
                <option value="">Please select</option>
                <option value="1">Chiangmai</option>
                <option value="2">Bangkok</option>
                <option value="3">Nar More</option>
                <option value="4">Lung More</option>
                <option value="5">Suandork</option>
                <option value="6">Khu Mueang</option>
              </select>
          </form>
          <form method="post">
            <label>Drop off Location</label>
              <select class="browser-default" name="dropOff" required>
                <option value="">Please select</option>
                <option value="1">Chiangmai</option>
                <option value="2">Bangkok</option>
                <option value="3">Nar More</option>
                <option value="4">Lung More</option>
                <option value="5">Suandork</option>
                <option value="6">Khu Mueang</option>
              </select>
          </form>
          <div class="section"></div>
          <div class="col s12 l6">
            <label for="datepicker">Start Date</label>
            <input type="text" id="datepicker">
          </div>
          <div class="col s12 l6">
            <label for="datepicker">End Date</label>
            <input type="text" id="datepicker2">
          </div>
          <div class="center col s12">
            <input type="submit" class="waves-effect waves-light btn orange" name="book" value="Book">
          </div>
        </div>
      </div>
      <div class="section"></div>
      <div class="row card">
        <div class="col s12">
          <h5>Schedule</h5><hr/>
          <div class="col s2 l2">
            <ul>
              <li>Day 1</li>
            </ul>
          </div>
          <div class="col s10 l10">
            <ul>
              <li><blockquote>
                I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.
              </blockquote></li>
            </ul>
          </div>
          <div class="col s2 l2">
            <ul>
              <li>Day 2</li>
            </ul>
          </div>
          <div class="col s10 l10">
            <ul>
              <li><blockquote>
                I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.
              </blockquote></li>
            </ul>
          </div>
          <div class="col s2 l2">
            <ul>
              <li>Day 3</li>
            </ul>
          </div>
          <div class="col s10 l10">
            <ul>
              <li><blockquote>
                I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.
              </blockquote></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="section"></div>
      <div class="row card">
        <div class="col s12">
          <h5>Comment</h5><hr/>
          <div class="col s6 left">
            <h4>XXX%</h4>
            <p>Satisfaction from xxx people</p>
          </div>
          <div class="col s6 right-align">
            <ul>
              <li>Tour: xx%</li>
              <li>Guide: xx%</li>
              <li>Location: xx%</li>
              <li>Service: xx%</li>
            </ul>
          </div>
        </div>
        <div class="col s12">
          <ul>
            <li><div class="chip">niranam@gmail.com</div> <span>: ...</span> </li>
            <li><div class="chip">ana@gmail.com</div>: ggez</li>
            <li><div class="chip">noburaz@gmail.com</div>: salt</li>
            <li><div class="chip">longcomment@gmail.com</div>:I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.
            </li>
          </ul>
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
