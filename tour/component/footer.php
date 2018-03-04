<?php

switch($lang){
    case 'ch': 
        $string_name = 'Chiangmai Hongthai';
        $string_address = '地址';
        $string_address_cont = '泰国清迈八佛区席东差路 清迈宏泰旅游公司';
        $string_contactus = '联系方式';
        $string_wechat = '微信';
        $string_wechat_cont = '591198421 or HTCE888';
        $string_tel = '电话号码';
        $string_tel_num = '081-025-0351';
        $string_email = '邮箱';
        $string_email_cont = 'chiangmaihongthai@hotmail.com';
        break;
    case 'th': 
        $string_name = 'Chiangmai Hongthai';
        $string_address = 'ที่อยู่';
        $string_address_cont = 'ถนนศรีดอนชัย ตำบลพระสิงห์ อำเภอเมือง จังหวัดเชียงใหม่ ประเทศไทย';
        $string_contactus = 'ติดต่อเรา';
        $string_wechat = 'WeChat';
        $string_wechat_cont = '591198421 or HTCE888';
        $string_tel = 'เบอร์ติดต่อ';
        $string_tel_num = '081-025-0351';
        $string_email = 'Email';
        $string_email_cont = 'chiangmaihongthai@hotmail.com';
        break;
    case 'en':
    default:
        $string_name = 'Chiangmai Hongthai';
        $string_address = 'Address';
        $string_address_cont = 'Sridonchai Road Phrasingha District Aumphoe Mueang Chiangmai Thailand';
        $string_contactus = 'Contact Us';
        $string_wechat = 'WeChat';
        $string_wechat_cont = '591198421 or HTCE888';
        $string_tel = 'Tel';
        $string_tel_num = '081-025-0351';
        $string_email = 'Email';
        $string_email_cont = 'chiangmaihongthai@hotmail.com';
}

?>



<footer class="page-footer red darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text"><?php echo $string_name; ?></h5>
                <p class="grey-text text-lighten-4"><?php echo $string_address; ?><br><?php echo $string_address_cont; ?></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text"><?php echo $string_contactus; ?></h5>
                <ul>
                    <li><a class="modal-trigger white-text tooltipped" data-position="top" data-delay="50" data-tooltip="Click to Scan QR Code" href="#modal1"><?php echo $string_wechat; ?> : <?php echo $string_wechat_cont; ?></a></li>
                    <li><?php echo $string_tel; ?> : <?php echo $string_tel_num; ?></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $link_mail; ?>"><?php echo $string_email; ?> : <?php echo $string_email_cont; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright red darken-4">
        <div class="container">
            © 2017 Copyright CAMT
        </div>
    </div>

    <!-- Modal Trigger -->


    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="col s7 hide-on-med-and-down">
                    <h5 class="black-text center"><b><?php echo $string_wechat; ?> QR Code</b></h5>
                    <img width="100%" src="images/wecharQR.jpg">
                </div>

                <div class="col s12 hide-on-large-only">
                    <h5 class="black-text center"><b><?php echo $string_wechat; ?> QR Code</b></h5>
                    <img width="100%" src="images/wecharQR.jpg">
                </div>

                <div class="col s5 black-text hide-on-med-and-down">
                    <h5 class="center"><?php echo $string_contactus; ?></h5><br>
                    <p><b><?php echo $string_name; ?></b></p>
                    <p><b><?php echo $string_address; ?></b><br>
                        <?php echo $string_address_cont; ?></p>
                    <p><b><?php echo $string_wechat; ?></b><br><?php echo $string_wechat_cont; ?></p>
                    <p><b><?php echo $string_tel; ?></b><br><?php echo $string_tel_num; ?></p>
                    <p><b><?php echo $string_email; ?></b><br><?php echo $string_email_cont; ?></p>
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
