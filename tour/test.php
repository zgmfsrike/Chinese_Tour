<?php
$hash_text = time();
$hash_text2 = time()+2;
$reference_code = hash("crc32", $hash_text);
$reference_code2 = hash("crc32", $hash_text2);
echo $reference_code."<br />";
echo $reference_code2."<br />";

 ?>
 <li><b>Tour type </b>
   <?php
   $sql = "SELECT * FROM `tour_tour_type` INNER JOIN `tour_type` ON tour_tour_type.tour_type_id=tour_type.tour_type_id WHERE tour_id = $id";
   $result = mysqli_query($conn, $sql);
   ?>
   <select class="browser-default" name="tour_type" required>
     <option value="">Please select</option>
     <?php
     if(mysqli_num_rows($result) > 0){
       while($row = mysqli_fetch_array($result)){
         $type = $row['tour_type'];
         $tour_type_value = 0 ;

         switch ($type) {
           case 'Casual':
           $tour_type_value = 1;
           break;

           case 'Meeting':
           $tour_type_value = 2;
           break;

           case 'Incentive':
           $tour_type_value = 3;
           break;

           case 'Convention':
           $tour_type_value = 4;
           break;

           case 'Exhibition':
           $tour_type_value = 5;
           break;

           case 'Business':
           $tour_type_value = 6;
           break;

           default:
           // code...
           break;
         }

         ?>
         <option value="<?php echo $tour_type_value; ?>"><?php echo $type; ?></option>
         <?php
       }
       // Free result set
       mysqli_free_result($result);
     }
     ?>
   </select>
 </li>
