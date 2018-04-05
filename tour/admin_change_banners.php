<?php
include 'module/session.php';
include 'db_config.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}
?>
<!DOCTYPE html>
<html>

    <?php
    $title = "Change Banner";
    include 'component/header.php';
    ?>

    <body>
        <div class="container">

            <form action="php_upload_banner.php" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col s12">
                      <br/>
                      <h3 class="center">Change Banners</h3><br/>
                        <!--  File[] : Image  -->
                        <div class="row">
                            <div class="col s9 l8">
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" onchange="document.getElementById('pic1').src = window.URL.createObjectURL(this.files[0])" name="banner1" id="imgInp">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 1">
                                </div>
                                <div class="hide-on-med-and-down">
                                  <img id="pic1" alt="your image" width="100" height="100" src="images/home1.jpg" />
                                </div>
                              </div>
                            </div>
                            <div class="s3 l4">
                              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner1">Change</button>
                            </div>

                        </div>
                        <!--Banner 2-->
                        <div class="row">
                            <div class="col s9 l8">
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" onchange="document.getElementById('pic2').src = window.URL.createObjectURL(this.files[0])" name="banner2" id="imgInp2">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 2">
                                </div>
                                <div class="hide-on-med-and-down">
                                  <img id="pic2" alt="your image" width="100" height="100" src="images/home2.jpg"/>
                                </div>
                              </div>
                            </div>
                            <div class="s3 l4">
                              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner2">Change</button>
                            </div>
                        </div>
                        <!--Banner 3-->
                        <div class="row">
                            <div class="col s9 l8">
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" onchange="document.getElementById('pic3').src = window.URL.createObjectURL(this.files[0])" name="banner3">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 3">
                                </div>
                                <div class="hide-on-med-and-down">
                                  <img id="pic3" alt="your image" width="100" height="100" src="images/home3.jpg"/>
                                </div>
                              </div>
                            </div>
                            <div class="s3 l4">
                              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner3">Change</button>
                            </div>
                        </div>
                        <!--Banner 4-->
                        <div class="row">
                            <div class="col s9 l8">
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" onchange="document.getElementById('pic4').src = window.URL.createObjectURL(this.files[0])" name="banner4">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 4">
                                </div>
                                <div class="hide-on-med-and-down">
                                  <img id="pic4" alt="your image" width="100" height="100" src="images/home4.jpg"/>
                                </div>
                              </div>
                            </div>
                            <div class="s3 l4">
                              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner4">Change</button>
                            </div>
                        </div>
                        <!--Banner 5-->
                        <div class="row">
                            <div class="col s9 l8">
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" onchange="document.getElementById('pic5').src = window.URL.createObjectURL(this.files[0])" name="banner5">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 5">
                                </div>
                                <div class="hide-on-med-and-down">
                                  <img id="pic5" alt="your image" width="100" height="100" src="images/home5.jpg"/>
                                </div>
                              </div>
                            </div>
                            <div class="s3 l4">
                              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner4">Change</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="section"></div>

        <?php
        include 'component/footer.php';
        ?>

    </body>
</html>
