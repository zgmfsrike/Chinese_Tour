<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="css/materialize.min.css"/>
    <link rel="stylesheet" href="css/materialize.css"/>
    <link rel="stylesheet" href="css/main.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Chinese Tour</title>

    <nav class="nav-extended">
        <div class="nav-wrapper red darken-2">
            <a href="Index.php" class="brand-logo center hide-on-med-and-down"><img src="images/logo400x300.png" width=20% height=20% alt="logo"></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="Index.php" class="show-on-medium-and-down hide-on-large-only">Chiangmai HongThai</a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#">WeChat</a></li>
                <li><a href="#">081-025-0351</a></li>
                <li><a class="grey-text text-lighten-3" href="mailto:chiangmaihongthai@hotmail.com">chiangmaihongthai@hotmail.com</a></li>
            </ul>
        </div>
    </nav>

    <!--  Body  -->

    <?php
    if(isset($_GET['send_mail'])){
    ?>
    
    <div class="container">
        <br>
        <b class="red-text">The website is under construction. Please contact us by the form below.</b>
        <br><br><br><br><br>
        <h4>Thank you.</h4>
        <br>
        <h5>Email is already sent.</h5>
        <br>
        <button type="button" onclick="window.location.href='contact.php'" class="waves-effect waves-light btn amber" value="Back">Back</button>
        <br><br><br><br><br>
    </div>

    <?php    
    }else{
    ?>

    <div class="container">
        <br>
        <b class="red-text">The website is under construction. Please contact us by the form below.</b>
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
    
    <?php  
    }
    ?>

    <!--  End Body  -->












    <footer class="page-footer red darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Address</h5>
                    <p class="grey-text text-lighten-4">Chiangmai HongThai SriDonChai Road PhraSingha District Aumphoe Mueang Chiangmai Thailand</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Contact Us</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Tel : 081-025-0351</a></li>
                        <li><a class="grey-text text-lighten-3" href="mailto:chiangmaihongthai@hotmail.com">Email : chiangmaihongthai@hotmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright red darken-4">
            <div class="container">
                © 2017 Copyright CAMT
            </div>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/materialize.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/main.js"></script>
        <script src="js/validate.js"></script>
        <script src="js/validate2.js"></script>
        <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.1.2/dist/sweetalert2.all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    </footer>