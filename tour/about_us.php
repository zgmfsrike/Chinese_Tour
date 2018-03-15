<?php
include 'db_config.php';
include 'module/session.php';
require 'module/language/init.php';
require 'module/language/lang_aboutus.php';
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        include 'component/header.php';
        ?>
        <!--About Us-->
        <div class="container">
            <div class="row col s12">
                <div class="section"></div>
                <h4 class="center"><?php echo $string_aboutus_name;?></h4><hr/>
                <p>We are proud to serve our customers with the past experience of our knowledge as long as personal relationship with other also with the expertise, dedication and experience of our dynamic professional team to ensure our customer in dealing with competitive and cost effective rates as well as to assure our customers in order to perform every task with care also to maintain the highest standard services.</p>
            </div>
            <div class="row">
                <div class="col s12 l8">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.Lorem ipsum fugiat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.
                </div>
                <div class="col s12 l4">
                    <div class="card">
                        <div class="card-image">
                            <img class="activator" src="images/home3.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col s12 l6">
                    <div class="section"></div>
                    <div id="map_canvas" style="width:100%;height:400px"></div>
                </div>
                <div class="col s12 l1">

                </div>
                <div class="col s12 l4 show-on-medium-and-up hide-on-small-only">
                    <ul>
                        <div class="section"></div><div class="section"></div><div class="section"></div><div class="section"></div>
                        <li><h5><?php echo $string_aboutus_contactus;?></h5></li>
                        <li><?php echo $string_aboutus_wechat;?></li>
                        <li><?php echo $string_aboutus_tel;?></li>
                        <li><a href="mailto:chiangmaihongthai@hotmail.com"><?php echo $string_aboutus_email;?></a></li>
                    </ul>
                </div>
                <div class="col s12 l4 show-on-small hide-on-med-and-up">
                    <ul>
                        <li><h5><?php echo $string_aboutus_contactus;?></h5></li>
                        <li><?php echo $string_aboutus_wechat;?></li>
                        <li><?php echo $string_aboutus_tel;?></li>
                        <li><a href="mailto:chiangmaihongthai@hotmail.com"><?php echo $string_aboutus_email;?></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--Footer-->
        <?php
        include 'component/footer.php';
        ?>

        <script src="http://api.map.baidu.com/api?v=1.2"></script>
        <script>
            var map = new BMap.Map('map_canvas');
            map.centerAndZoom(new BMap.Point(98.993963,18.781326),20);
        </script>

    </body>
</html>
