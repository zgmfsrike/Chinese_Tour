<!DOCTYPE html>
  <html>
  <?php
  include('module/session.php');
  // requireLogin();
   ?>
   <?php
      include 'component/adminHeader.php';
      ?>
<body>
      <!--Edit News Here-->

      <div class="container">
        <div class="section"></div>
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
      <div class="container">
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content black-text">
                  <span class="card-title" id="newsTopic">Chiang Mai</span>
                  <ul>
                    <li>
                      Welcome to Chiangmai!
                      The former seat of the Lanna kingdom is a blissfully calm and laid-back place to relax and recharge your batteries. Yes you'll be surrounded by other wide-eyed travellers but that scarcely takes away from the fabulous food and leisurely wandering. Participate in a vast array of activities on offer, or just stroll around the backstreets, and discover a city that is still firmly Thai in its atmosphere, and attitude.
                    </li>
                  </ul>
                </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="right">
          <a href="AdminCreateNews.php" class="btn-large btn-floating tooltipped waves-effect waves-light amber" data-position="top" data-delay="50" data-tooltip="Create News"><i class="material-icons">edit</i></a>
          <a href="#" onclick="warning();" class="btn-large btn-floating tooltipped waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Delete"><i class="material-icons">delete</i></a>
        </div>
      </div>
      </div>

      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

      <!-- ย้ายไปไฟล์ js แยกแล้วใช้ไม่ได้อะ เลยแปะไว้ตรงนี้แทน งง -0- -->
      <script type="text/javascript">
      function warning(){
          swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
      }

      </script>

    </body>
  </html>
