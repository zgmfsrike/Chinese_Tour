<!DOCTYPE html>
  <html>
<?php
      include 'component/header.php';
?>
<body>

        <div id="home" class="col s12">
          <div class="slider">
            <ul class="slides">
              <li>
                <img src="images/home5.jpg"> <!-- random image -->
                <div class="caption center-align">
                  <h3>Welcome!</h3>
                  <h5 class="light grey-text text-lighten-3">We're Chiangmai Hong Thai Business Consultant</h5>
                </div>
              </li>
              <li>
                <img src="images/home2.jpg"> <!-- random image -->
                <!-- <div class="caption left-align">
                  <h3>Left Aligned Caption</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div> -->
              </li>
              <li>
                <img src="images/home3.jpg"> <!-- random image -->
                <!-- <div class="caption right-align">
                  <h3>Right Aligned Caption</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div> -->
              </li>
              <li>
                <img src="images/home4.jpg"> <!-- random image -->
                <!-- <div class="caption center-align">
                  <h3>This is our big Tagline!</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div> -->
              </li>
              <li>
                <img src="images/home1.jpg"> <!-- random image -->
                <!-- <div class="caption left-align">
                  <h3>This is our big Tagline!</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div> -->
              </li>
              <a href="AdminChangeBanners.php" class="btn-floating tooltipped halfway-fab waves-effect waves-light red" data-position="left" data-delay="50" data-tooltip="Change Banners"><i class="material-icons">edit</i></a>
            </ul>

          </div>
          <!--Notice-->
          <div class="container row">
            <div class="col s12 m12">
              <div class="row">
                <div class="col s12 m12">
                  <div class="card orange lighten-1">
                    <div class="card-content white-text">
                      <span class="card-title">Announcement <i class="material-icons">announcement</i></span>
                      <blockquote>
                        Welcome to Chiangmai!
                        The former seat of the Lanna kingdom is a blissfully calm and laid-back place to relax and recharge your batteries. Yes you'll be surrounded by other wide-eyed travellers but that scarcely takes away from the fabulous food and leisurely wandering. Participate in a vast array of activities on offer, or just stroll around the backstreets, and discover a city that is still firmly Thai in its atmosphere, and attitude.
                      <div class="section">
                        <a href="AdminEditAnnounce.php" class="btn-floating tooltipped halfway-fab waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Edit Announcement"><i class="material-icons">edit</i></a>
                      </div>
                    </div>
              </div>
            </div>
          </div>
            </div>
          </div>

          <!--News-->
          <div class="container row">
            <h3>News</h3>
          </div>
          <div class="container row">
           <div class="col s12 m4">
             <div class="card small">
               <div class="card-image">
                 <img src="images/home1.jpg">
                 <span class="card-title">News Title</span>
               </div>
               <div class="card-content">
                 <p>I am a very simple card. I am good at containing small bits of information.
                 I am convenient because I require little markup to use effectively.</p>
               </div>
               <div class="card-action">
                 <a href="AdminNews.php">Read More</a>

               </div>
             </div>
           </div>
           <div class="col s12 m4">
             <div class="card small">
               <div class="card-image">
                 <img src="images/home3.jpg">
                 <span class="card-title">News Title</span>
               </div>
               <div class="card-content">
                 <p>I am a very simple card. I am good at containing small bits of information.
                 I am convenient because I require little markup to use effectively.</p>
               </div>
               <div class="card-action">
                 <a href="AdminNews.php">Read More</a>

               </div>
             </div>
           </div>
           <div class="col s12 m4">
             <div class="card small">
               <div class="card-image">
                 <img src="images/home2.jpg">
                 <span class="card-title">News Title</span>
               </div>
               <div class="card-content">
                 <p>I am a very simple card. I am good at containing small bits of information.
                 I am convenient because I require little markup to use effectively.</p>
               </div>
               <div class="card-action">
                 <a href="AdminNews.php">Read More</a>

               </div>
             </div>
           </div>
         </div>
         <div class="container row">
          <div class="col s12 m4">
            <div class="card small">
              <div class="card-image">
                <img src="images/home1.jpg">
                <span class="card-title">News Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="AdminNews.php">Read More</a>

              </div>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="card small">
              <div class="card-image">
                <img src="images/home3.jpg">
                <span class="card-title">News Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="AdminNews.php">Read More</a>

              </div>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="card small">
              <div class="card-image">
                <img src="images/home2.jpg">
                <span class="card-title">News Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="AdminNews.php">Read More</a>

              </div>
            </div>
          </div>
        </div>
        </div>

      </div>


      <!--Footer-->
      <?php
      include 'component/footer.php';
      ?>

    </body>
  </html>
