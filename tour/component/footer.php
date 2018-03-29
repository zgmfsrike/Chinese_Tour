<footer class="page-footer red darken-3">
    <?php
    require 'module/language/lang_footer.php';
    require 'module/string/string_footer.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text"><?php echo $string_footer_name; ?></h5>
                <p class="grey-text text-lighten-4"><?php echo $string_footer_address; ?><br><?php echo $string_footer_address_cont; ?></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text"><?php echo $string_footer_contactus; ?></h5>
                <ul>
                    <li><a class="modal-trigger white-text tooltipped" data-position="top" data-delay="50" data-tooltip="Click to Scan QR Code" href="#modal1"><?php echo $string_footer_wechat; ?></a></li>
                    <li><?php echo $string_footer_tel; ?></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $link_mail;?>"><?php echo $string_footer_email; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright red darken-4">
        <div class="container">
            <?php echo $string_copyright;?>
        </div>
    </div>

    <!-- Modal Trigger -->


    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="col s7 hide-on-med-and-down">
                    <h5 class="black-text center"><b><?php echo $string_footer_wechat_qr; ?></b></h5>
                    <img width="100%" src="images/wechatQR.jpg">
                </div>

                <div class="col s12 hide-on-large-only">
                    <h5 class="black-text center"><b><?php echo $string_footer_wechat_qr; ?></b></h5>
                    <img width="100%" src="images/wechatQR.jpg">
                </div>

                <div class="col s5 black-text hide-on-med-and-down">
                    <h5 class="center"><?php echo $string_footer_contactus; ?></h5><br>
                    <p><b><?php echo $string_footer_name; ?></b></p>
                    <p><?php echo $string_footer_address; ?><br>
                        <?php echo $string_footer_address_cont; ?></p>
                    <p><?php echo $string_footer_wechat; ?></p>
                    <p><?php echo $string_footer_tel; ?></p>
                    <p><?php echo $string_footer_email; ?></p>
                </div>
            </div>

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
