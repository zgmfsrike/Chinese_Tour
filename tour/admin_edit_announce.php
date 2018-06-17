<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}

require 'module/language/init.php';
?>
<!DOCTYPE html>
<html>
    <?php
    $title = "Edit Announcement";
    include 'component/header.php';

    $sql = "SELECT * FROM `page_index` WHERE name = 'announcement_content'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        header("location: message.php");
    }
    $data = mysqli_fetch_array($result);
    $announce_en = $data['english'];
    $announce_ch = $data['chinese'];
    $announce_th = $data['thai'];

    ?>
    <body>

        <!--Edit News Here-->

        <div class="container">
            <div class="row">
              <div class="section"></div>
                <h3 class="center"><b>Edit Announcement</b></h3>
                <form class="col s12" method="post" name="announce" action="php_edit_announce.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <h5 for="textarea1">Announcement (English)</h5>
                            <textarea placeholder="Announcement (English)" id="textarea1" class="materialize-textarea" name="announce_en"><?php echo $announce_en; ?></textarea>
                        </div>
                        <div class="input-field col s12">
                            <h5 for="textarea1">Announcement (Chinese)</h5>
                            <textarea placeholder="Announcement (Chinese)" id="textarea1" class="materialize-textarea" name="announce_ch"><?php echo $announce_ch; ?></textarea>
                        </div>
                        <div class="input-field col s12">
                            <h5 for="textarea1">Announcement (Thai)</h5>
                            <textarea placeholder="Announcement (Thai)" id="textarea1" class="materialize-textarea" name="announce_th"><?php echo $announce_th; ?></textarea>
                        </div>
                    </div>
                    <div class="center">
                      <button value="Cancel" onclick="window.location.href='index.php'" class="btn red">Cancel</button>
                      <button class="btn amber" type="submit" name="save">save</button>
                    </div>
                </form>
            </div>
        </div>

        <!--Footer-->
        <?php
        include 'component/footer.php';
        ?>

    </body>
</html>
