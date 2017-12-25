<?php
include 'db_config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // tour
    $sql = "SELECT * FROM `tour` WHERE tour_id = $id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $tour_name = $data['name'];
    $hightlight = $data['highlight'];
    $region = $data['region'];
    $province = $data['province'];
    $price = $data['price'];
    $max_customer = $data['max_customer'];
    $rating = $data['rating'];
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
            if(s < 10){
              s++;
              $(this).before("<input name='image_" + s + "' class='image' type='file' accept='image/*'/><br>");
            }
        });

          // add more tour round
          $('.add_more_tr').click(function(e){
            e.preventDefault();
            $(this).before("<input required name='start_date[]' type='date'/><input required name='end_date[]' type='date'/><br>");
            });
    });
    </script>
</head>
<body>
<div id="wrapper">
<form action="php_edit_tour.php" enctype="multipart/form-data" method="post" name="edit_tour">
<!--  Text : Tour name  -->
    <div id="name" name="tour_name">
        <label>Tour name</label>
        <input required name='tour_name' type='text' value="<?php echo $tour_name; ?>"/>
        <br>
    </div>

<!--  File[] : Image**  -->
    <div id="image">
        <label>Image</label><br>
        <?php
        $sql = "SELECT * FROM `tour_image` WHERE tour_id = $id";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
          $i = 1;
            while($row = mysqli_fetch_array($result)){
                $img_name = $row['img_name'];
                ?>
                <img src="images/tours/<?php echo $img_name;?>" height="200" width="200">
                <input name='image_<?php echo $i ?>' type='file' class='image' accept="image/*"/><br>
                <?php
                $i++;
            }
            // Free result set
            mysqli_free_result($result);
        }
        ?>
        <input type="button" class="add_more_image" value="Add More">
    </div>



<!--  Text : Highlight  -->
  <div id="highlight">
        <label>Highlight</label>
        <input required name='highlight' type='text' value="<?php echo $hightlight; ?>"/>
        <br>
    </div>

<!--  PDF File : Schedule**  -->
  <div id="schedule">
        <label>Schedule</label>
        <input required name='schedule' type='file' value="" accept="application/pdf"/>
        <br>
    </div>

<!--  Region  -->
    <div id="region">
        <label>Region</label>
        <input required name='region' type='text' value="<?php echo $region; ?>"/>
        <br>
    </div>
<!--  Province  -->
    <div id="province">
        <label>Province</label>
        <input required name='province' type='text' value="<?php echo $province; ?>"/>
        <br>
    </div>
<!--  Price sale  -->
    <div id="price">
        <label>Price sale</label>
        <input required name='price' type='number' value="<?php echo $price; ?>"/>
        <br>
    </div>
<!--  Tour type  -->
    <div id="type">
        <label>Tour type</label>
        <?php
            $sql = "SELECT * FROM tour_type";
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <input type="checkbox" name="type[]" value="<?php echo $row['tour_type_id'];?>"  checked><?php echo $row['tour_type'];?></input>
                    <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
//                    echo "No records matching your query were found.";
                }
            } else{
//                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        ?>
        <br>
    </div>
<!--  Vehicel  -->
    <div id="vehicel">
        <label>Vehicel</label>
        <?php
            $sql = "SELECT * FROM vehicle_type";
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo '<input type="checkbox" name="vehicel[]" value="'.$row['vehicle_type_id'].' " checked>'.$row['vehicle_type']. '</input>';
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
//                    echo "No records matching your query were found.";
                }
            } else{
//                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        ?>
        <br>
    </div>
<!--  Accommodation  -->
    <div id="accommodation">
        <label>Accommodation</label>
        <?php
            $sql = "SELECT * FROM accommodation";
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo '<input type="checkbox" name="accommodation[]" value="'.$row['accommodation_id'].'" checked>'.$row['accommodation_level']. '</input>';
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
//                    echo "No records matching your query were found.";
                }
            } else{
//                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        ?>
        <br>
    </div>
<!--  Max # of customer  -->
       <div id="max">
        <label>Max</label>
        <input required name='max' type='number'/>
        <br>
    </div>


<!--  Tour round  -->
    <div id="tour_round">
           <label>Start date</label><label>End date</label><br>
           <input required name='start_date[]' type='date'/>
           <input required name='end_date[]' type='date'/><br>
           <input type="button" class="add_more_tr" value="Add More">
       </div>
    <input type="submit" name="submit"/>
</form>
</div>
</body>
</html>
<?php }else{
  echo "No id provide";
} ?>
