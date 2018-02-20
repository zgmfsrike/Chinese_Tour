<?php
include 'module/session.php';
include 'db_config.php';
?>
<!DOCTYPE html>
<html>

    <?php
    include 'component/header.php';
    ?>

    <script>
        function selectEnd(elem){

            var index = elem.getAttribute('datagrp');
            var input = document.getElementById("end"+index).value;

            console.log(index);
            console.log(input);

            document.getElementById("start"+index).setAttribute('max',input);

        }

        function selectStart(elem){

            var index = elem.getAttribute('datagrp');
            var input = document.getElementById("start"+index).value;

            console.log(index);
            console.log(input);

            document.getElementById("end"+index).setAttribute('min',input);

        }
    </script>

    <body>
        Start1:
        <input type="date" name="start1" id="start1" class="start" datagrp="1" onchange="selectStart(this)"/>
        <br>
        <br>End1:
        <input type="date" name="end1" id="end1" class="end"  datagrp="1" onchange="selectEnd(this)"/>
        <hr>
        <br>Start2:
        <input type="date" name="start2" id="start2" class="start"  datagrp="2" onchange="selectStart(this)"/>
        <br>
        <br>End2:
        <input type="date" name="end2" id="end2" class="end" datagrp="2" onchange="selectEnd(this)"/>

        <?php
        include 'component/footer.php';
        ?>
        <script>
            $(document).ready(function(){

                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!

                var yyyy = today.getFullYear();
                if(dd<10){
                    dd='0'+dd;
                } 
                if(mm<10){
                    mm='0'+mm;
                } 
                var date = yyyy+'-'+mm+'-'+dd;

                console.log(date);

                $('.start').attr('min', date);
                $('.end').attr('min', date);

            });
        </script>
    </body>
</html>
