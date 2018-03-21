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
      <div class="section"></div>
      <h4 class="center">Search Tour</h4>
      <form class="" method="post">
      <!--Search box1-->
      <div class="row collection">
        <div class="col s12 l6">
          <br/>
          <label>Tour Type</label>
          <select class="browser-default">
            <option value="" disabled selected>Choose your Tour Type</option>
            <option value="1">Casual</option>
            <option value="2">Meeting</option>
            <option value="3">Incentive</option>
            <option value="4">Convention</option>
            <option value="5">Exhibition</option>
            <option value="6">Business</option>
          </select>

          <label>Vehical</label>
          <select class="browser-default">
            <option value="" disabled selected>Choose your Vehical</option>
            <option value="1">4-seat</option>
            <option value="2">9-seat</option>
            <option value="3">14-seat</option>
            <option value="4">VIP</option>
          </select>

          <label>Accommodation</label>
          <select class="browser-default">
            <option value="" disabled selected>Choose your Accommodation</option>
            <option value="1">1-star</option>
            <option value="2">2-stars</option>
            <option value="3">3-stars</option>
            <option value="4">4-stars</option>
            <option value="5">5-stars</option>
          </select>

          <br/>
        </div>

        <div class="col s12 l6"><br class="hide-on-med-and-down"/>
          <h6>Province</h6>
          <ul>
            <div class="col s12 l3">
              <li>
                <input type="checkbox" id="Chiangmai" />
                <label for="Chiangmai">Chiangmai</label>
              </li>
              <li>
                <input type="checkbox" id="Lamphun" />
                <label for="Lamphun">Lamphun</label>
              </li>
              <li>
                <input type="checkbox" id="Lampang" />
                <label for="Lampang">Lampang</label>
              </li>
            </div>
            <div class="col s12 l3">
              <li>
                <input type="checkbox" id="Chiangrai" />
                <label for="Chiangrai">Chiangrai</label>
              </li>
              <li>
                <input type="checkbox" id="Phayao" />
                <label for="Phayao">Phayao</label>
              </li>
              <li>
                <input type="checkbox" id="Phrae" />
                <label for="Phrae">Phrae</label>
              </li>
            </div>
            <div class="col s12 l3">
              <li>
                <input type="checkbox" id="Nan" />
                <label for="Nan">Nan</label>
              </li>
              <li>
                <input type="checkbox" id="Maehongson" />
                <label for="Maehongson">Maehongson</label>
              </li>
              <li>
                <input type="checkbox" id="Uttaradit" />
                <label for="Uttaradit">Uttaradit</label>
              </li>
            </div>
          </ul>
        </div>
        <div class="col s12 l6">
          <br/>
          <h6>Region</h6>
          <ul class="col s12 l6">
            <li><input type="checkbox" id="region1" />
                <label for="region1">Northern</label>
                &emsp;&nbsp;
                <input type="checkbox" id="region2" />
                <label for="region2">Central</label>
            </li>
          </ul>
        </div>
      </div>
      </form>
      <!--Search Box2-->
      <form class=""  method="post">
      <div class="row ">
        <div class="collection">
          <br class="hide-on-med-and-down" />
        <div class="col s12 l2">
          <label class="show-on-medium-and-down hide-on-large-only">Rating</label>
          <select class="browser-default">
            <option value="" disabled selected>Rating</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="col s12 l2">
          <label class="show-on-medium-and-down hide-on-large-only">Popularity</label>
          <select class="browser-default">
            <option value="" disabled selected>Popularity</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="col s12 l2">
          <label class="show-on-medium-and-down hide-on-large-only">Alphabet</label>
          <select class="browser-default">
            <option value="" disabled selected>Alphabet</option>
            <option value="1">A to Z</option>
            <option value="2">Z to A</option>
          </select>
        </div>
        <div class="col s12 l1">
          <label class="show-on-medium-and-down hide-on-large-only">Price</label>
          <select class="browser-default">
            <option value="" disabled selected>Price</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <br class="hide-on-med-and-down" />
        </div>

        <div class="col s12 l4">
            <div class="input-field inline">
              <text class="left">Price range&emsp;</text>
              <input type="number" class="validate browser-default col s3" min="0" onkeyup="validatephone(this);" placeholder="1000">
              <span class="col s1">-</span>
              <input type="number" class="validate browser-default col s3" min="0" onkeyup="validatephone(this);" placeholder="9000">
            </div>
        </div>
          <div class="col s12 l1 center">
            <button class="btn-floating red" type="button" name="button">GO</button>
            <br/><br/>
          </div>
        </div>
      </div>
      </form>
      <!--Desktop-->
      <div class="row collection hide-on-med-and-down">
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
            <div class="col s12 l3">
              <div class="right-align">
                <br/><br/>
                <h5>฿ XXXX</h5>
                <h6>XXXX people selected</h6><br/>
                <button type="button" class="btn " name="button">Select</button>
              </div>
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

    <!--Mobile-->
    <div class="row collection show-on-medium-and-down hide-on-large-only">
    <div class="row center">
            <img class="materialboxed" width="250em" style="margin: auto;width: 50%;padding: 10px;" src="images/wechatQR.jpg">
            <br/>
            <h5><a href="#">Tour1</a></h5>
            <h6>Tour Type : XXXX</h6>
            <h6>Accommodation : XXXX</h6>
            <h6>Vehicle : XXXX</h6>
              <br/>
              <h5>฿ XXXX</h5>
              <h6>XXXX people selected</h6><br/>
              <button type="button" class="btn " name="button">Select</button>
          </div>
          <div class="divider"></div>

          <div class="row center">
                  <img class="materialboxed" width="250em" style="margin: auto;width: 50%;padding: 10px;" src="images/wechatQR.jpg">
                  <br/>
                  <h5><a href="#">Tour2</a></h5>
                  <h6>Tour Type : XXXX</h6>
                  <h6>Accommodation : XXXX</h6>
                  <h6>Vehicle : XXXX</h6>
                    <br/>
                    <h5>฿ XXXX</h5>
                    <h6>XXXX people selected</h6><br/>
                    <button type="button" class="btn " name="button">Select</button>
                </div>
                <div class="divider"></div>
    </div>

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
  </div>

      <!--Footer-->

      <?php
      include 'component/footer.php';
      ?>

</body>
</html>
