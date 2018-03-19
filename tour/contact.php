<?php
include 'module/session.php';
include 'db_config.php';
?>
<!DOCTYPE html>
<html>

    <?php
    $title = "Contact Us";
    include 'component/header.php';
    ?>

    <!--  Body  -->

    <?php
    if(isset($_GET['send_mail'])){
    ?>

    <body>
        <div class="container">
            <br>
            <br><br><br><br><br>
            <h4>Thank you.</h4>
            <br>
            <h5>Email is already sent.</h5>
            <br>
            <button type="button" onclick="window.location.href='index.php'" class="waves-effect waves-light btn amber" value="Back">Go to mainpage</button>
            <br><br><br><br><br>
        </div>
    </body>
    <?php
    }else{
    ?>

    <body>
        <div class="container">
            <br>
            <br>
            <h4>Contact us</h4>
            <br>
            <form action="php_contact.php" method="post">
                <div class="input-field col s12 l6">
                    <input onchange="email_validate(this.value);" type="email" class="form-control" name="email" id="email" placeholder="Enter your Email"  required>
                    <label for="email">Email<b class="red-text"> *</b></label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="text" class="form-control" name="topic" id="firstname" placeholder="Topic" required>
                    <label for="firstname">Topic<b class="red-text"> *</b></label>
                </div>
                <div class="input-field col s12 l6">
                    <textarea id="textarea1" name="content" class="materialize-textarea" placeholder="Content" required></textarea>
                    <label for="content">Content<b class="red-text"> *</b></label>
                </div>

                <input type="submit" class="waves-effect waves-light btn green"  name="submit" value="Submit">
            </form>
            <br>

        </div>
    </body>

    <?php
    }
    ?>

    <!--  End Body  -->

    <?php
    include 'component/footer.php';
    ?>
</html>