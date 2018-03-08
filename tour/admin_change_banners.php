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
                      <h3 class="center">Change Banners</h3>
                        <!--  File[] : Image  -->
                        <div class="col s12">
                            <div class="section"></div>
                            <div id="image">
                                <label for="image"><b>Images</b></label>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Upload image</span>
                                        <input name='image_1' class='image' type='file' accept="image/*"/>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Image here">
                                    </div>
                                </div>
                                <input type="button" class="add_more_image btn amber right" value="Add More Image">
                                <span class="right" id="limit" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="center">
                            <button class="waves-effect waves-light btn amber" type="submit" name="submit">Submit</button>
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
        <script>
            $(document).ready(function(){
                // add more image
                $('.add_more_image').click(function(e){
                    e.preventDefault();
                    var e = document.getElementsByTagName('input');
                    var i;
                    var s = 0;
                    for(i=0; i < e.length; i++) {
                        if(e[i].type== "file" && e[i].className=="image" ) {
                            s++;
                        }
                    }
                    if(s < 5){
                        s++;
                        $(this).before("<div class='file-field input-field'><div class='btn'><span>Upload image</span><input name='image_" + s + "' class='image' type='file' accept='image/*'/></div><div class='file-path-wrapper'><input class='file-path validate' type='text' placeholder='Image here'></div></div>");
                    }else{
                        document.getElementById('limit').innerHTML = "<br/>Can not add more image.";
                    }
                });

            });

        </script>
    </body>
</html>
