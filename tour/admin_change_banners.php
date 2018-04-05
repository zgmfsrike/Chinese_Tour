<?php
include 'db_config.php';
include 'module/session.php';
include 'db_config.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';
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
                      <h3 class="center">Change Banners</h3>
                        <!--  File[] : Image  -->
                        <div class="row">
                            <div class="col s9 l8">
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" onchange="readURL(this);" name="banner1">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 1">
                                </div>
                                <!-- <div class="hide-on-med-and-down">
                                  <img id="pic1" src="#" alt="your image" />
                                </div> -->
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
                                  <input type="file" onchange="readURL(this);" name="banner2">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 2">
                                </div>
                                <!-- <div class="hide-on-med-and-down">
                                  <img id="pic2" src="#" alt="your image" />
                                </div> -->
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
                                  <input type="file" onchange="readURL(this);" name="banner3">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 3">
                                </div>
                                <!-- <div class="hide-on-med-and-down">
                                  <img id="pic3" src="#" alt="your image" />
                                </div> -->
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
                                  <input type="file" onchange="readURL(this);" name="banner4">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 4">
                                </div>
                                <!-- <div class="hide-on-med-and-down">
                                  <img id="pic4" src="#" alt="your image" />
                                </div> -->
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
                                  <input type="file" onchange="readURL(this);" name="banner5">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload Picture for Index Banner 5">
                                </div>
                                <!-- <div class="hide-on-med-and-down">
                                  <img id="pic5" src="#" alt="your image" />
                                </div> -->
                              </div>
                            </div>
                            <div class="s3 l4">
                              <button type="submit" class="waves-effect waves-light btn green" value="Change" name="changeBanner4">Change</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            </form>
        </div>
        <div class="section"></div>

        <?php
        include 'component/footer.php';
        ?>
        <!-- <script>
            function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pic1')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pic2')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

        </script> -->
    </body>
</html>
