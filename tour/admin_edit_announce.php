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

    $sql = "SELECT * FROM `announcement` WHERE name = 'announce'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        header("location: message.php");
    }
    $data = mysqli_fetch_array($result);
    $announce = $data['content'];
    ?>
    <body>

        <!--Edit News Here-->

        <div class="container">
            <div class="row">
                <h3>Edit Announcement</h3>
                <form class="col s12" method="post" name="announce" action="php_edit_announce.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" name="announce"><?php echo $announce; ?></textarea>
                            <label for="textarea1">Announcement</label>
                        </div>
                    </div>
                    <button value="Cancel" onclick="window.location.href='index.php'" class="waves-effect waves-light btn red">Cancel</button>
                    <button class="waves-effect waves-light btn amber" type="submit" name="save">save</button>
                </form>
            </div>
        </div>

        <!--Footer-->
        <?php
        include 'component/footer.php';
        ?>

    </body>
</html>
