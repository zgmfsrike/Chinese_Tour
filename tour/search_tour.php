<?php
include 'module/session.php';
?>
<!DOCTYPE html>
<html>
    <?php
     $title = "Search Tour";
      include 'component/header.php';
?>
<body>
    <div class="container">
      <!--Search Part 1-->
      <div class="row">
        <div class="section"></div>
        <h4 class="center">Search Tour</h4>
        <ul class="collection">
          <li class="collection-item">Tour Type
            <form class="secondary-content" method="post">
              <input type="checkbox" id="tourtype1" />
              <label for="tourtype1">Type A</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="tourtype2" />
              <label for="tourtype2">Type B</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="tourtype3" />
              <label for="tourtype3">Type C</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="tourtype4" />
              <label for="tourtype4">Type D</label>
            </form>
          </li>
          <li class="collection-item">Accommodation
            <form class="secondary-content"method="post">
              <input type="checkbox" id="accommodation1" />
              <label for="accommodation1">1 Star</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="accommodation2" />
              <label for="accommodation2">2 Stars</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="accommodation3" />
              <label for="accommodation3">3 Stars</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="accommodation4" />
              <label for="accommodation4">4 Stars</label>
            </form>
          </li>
          <li class="collection-item">Vehicle
            <form class="secondary-content"method="post">
              <input type="checkbox" id="vehicle1" />
              <label for="vehicle1">2 Seats</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="vehicle2" />
              <label for="vehicle2">4 Seats</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="vehicle3" />
              <label for="vehicle3">6 Stats</label>
            </form>
          </li>
          <li class="collection-item">Region
            <form class="secondary-content"method="post">
              <input type="checkbox" id="region1" />
              <label for="region1">Northern</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="region2" />
              <label for="region2">Central</label>
            </form>
          </li>

          <li class="collection-item">Province
            <div class="secondary-content">
              <form method="post">
                <input type="checkbox" id="Chiangmai" />
                <label for="Chiangmai">Chiangmai</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Lamphun" />
                <label for="Lamphun">Lamphun</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Lampang" />
                <label for="Lampang">Lampang</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Chiangrai" />
                <label for="Chiangrai">Chiangrai</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Phayao" />
                <label for="Phayao">Phayao</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Phrae" />
                <label for="Phrae">Phrae</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Nan" />
                <label for="Nan">Nan</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Maehongson" />
                <label for="Maehongson">Maehongson</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <input type="checkbox" id="Uttaradit" />
                <label for="Uttaradit">Uttaradit</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;

              </form>
            </div>

          </li>
        </ul>
      </div>

      <!--Search Part2-->
      <div class="row card">
        <div class="input-field col s1">
          <select>
            <option value="" disabled selected>Rating</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="input-field col s2">
          <select>
            <option value="" disabled selected>Popularity</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="input-field col s2">
          <select>
            <option value="" disabled selected>Alphabet</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="input-field col s1">
          <select>
            <option value="" disabled selected>Price</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="col s12 l5">
          Price range
          <div class="input-field inline">
            <input type="number" class="validate" min="0" onkeyup="validatephone(this);">
            <label></label>
          </div>
          -
          <div class="input-field inline">
            <input type="number" class="validate" min="0" onkeyup="validatephone(this);">
            <label></label>
          </div>
        </div>
        <div class="col s1">
          <br/>
          <button class="btn-floating red" type="button" name="button">GO</button>
        </div>
      </div>

      <!--Result Part-->
      <div class="row collection">
      <div class="row">
            <div class="col s12 l4">
              <img class="materialboxed" width="250" src="images/wechatQR.jpg">
            </div>
            <div class="col s12 l4">
              <br/>
              <h5><a href="#">Tour1</a></h5>
              <h6>Tour Type : XXXX</h6>
              <h6>Accommodation : XXXX</h6>
              <h6>Vehicle : XXXX</h6>
            </div>
            <div class="col s12 l3 right-align">
              <br/><br/>
              <h5>฿ XXXX</h5>
              <h6>XXXX people selected</h6><br/>
              <button type="button" class="btn " name="button">Select</button>
            </div>
      </div>
      <div class="divider"></div>
      <div class="row">
            <div class="col s12 l4">
              <img class="materialboxed" width="250" src="images/wechatQR.jpg">
            </div>
            <div class="col s12 l4">
            <br/>
              <h5><a href="#">Tour2</a></h5>
              <h6>Tour Type : XXXX</h6>
              <h6>Accommodation : XXXX</h6>
              <h6>Vehicle : XXXX</h6>
            </div>
            <div class="col s12 l3 right-align">
              <br/><br/>
              <h5>฿ XXXX</h5>
              <h6>XXXX people selected</h6><br/>
              <button type="button" class="btn " name="button">Select</button>
            </div>
      </div>
      <div class="divider"></div>
      <div class="row">
            <div class="col s12 l4">
              <img class="materialboxed" width="250" src="images/wechatQR.jpg">
            </div>
            <div class="col s12 l4">
              <br/>
              <h5><a href="#">Tour3</a></h5>
              <h6>Tour Type : XXXX</h6>
              <h6>Accommodation : XXXX</h6>
              <h6>Vehicle : XXXX</h6>
            </div>
            <div class="col s12 l3 right-align">
              <br/><br/>
              <h5>฿ XXXX</h5>
              <h6>XXXX people selected</h6><br/>
              <button type="button" class="btn " name="button">Select</button>
            </div>
      </div>
    </div>
    <!--Pages-->
      <div class="right-align">
        <ul class="pagination">
          <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
          <li class="active"><a href="#!">1</a></li>
          <li class="waves-effect"><a href="#!">2</a></li>
          <li class="waves-effect"><a href="#!">3</a></li>
          <li class="waves-effect"><a href="#!">4</a></li>
          <li class="waves-effect"><a href="#!">5</a></li>
          <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
      </div>
      <br/>
    </div>

      <!--Footer-->

      <?php
      include 'component/footer.php';
      ?>

</body>
</html>
