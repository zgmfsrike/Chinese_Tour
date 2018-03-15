<?php
include 'db_config.php';
include 'module/session.php';
if(!isLoginAs(array('admin'))){
    header('Location: message.php?msg=unauthorized');
}
?>
<!DOCTYPE html>
<html>
    <?php
    $title = "Manage";
    include 'component/header.php';
    include 'php_profile_func.php';
    ?>
    <body>
        <div class="container">
            <div class="row">
                <div class="section"></div>
                <div class="col s12 l3">
                    <div class="collection">
                        <!-- <a href="profile.php" class="collection-item black-text">Profile</a> -->
                        <a href="#" class="collection-item active amber">Index Management</a>
                        <a href="admin_change_banners.php" class="collection-item black-text">Change Banners</a>
                        <a href="admin_create_news.php" class="collection-item black-text">Create News</a>
                        <a href="admin_edit_announce.php" class="collection-item black-text">Edit Announcesment</a>
                        <a href="admin_edit_about_us.php" class="collection-item black-text">Edit AboutUs</a>

                        <a href="#" class="collection-item active amber">Tour Management</a>
                        <a href="php_search_tour.php" class="collection-item black-text">Search Tour</a>
                        <a href="admin_create_tour.php" class="collection-item black-text">Create Tour</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="section"></div>

        <!-- Footer -->
        <?php
        include 'component/footer.php';
        ?>
    </body>
</html>
