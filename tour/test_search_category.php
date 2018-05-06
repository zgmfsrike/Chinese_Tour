<?php
//insert to trm table
$sql ="INSERT INTO tour_round_member('id','tour_roud_id','departure_location','dropoff_location','reference_code','add_on_price')
values('id','tour_roud_id','departure_location','dropoff_location','reference_code','add_on_price')";


// insert to reserve member into trmi table
$sql = "INSERT INTO tour_round_member_info('reference_code','first_name')
values('reference_code','first_name')";


//update member info
$sql = "UPDATE tour_round_member_info trmi SET 'first_name'='$f','last_name'='$l','dob'='$dob','country_code'='$c','phone'='$p','email'='$mail','address'='$a',
'city'='$c','zipcode'='$z','reservation_age'='$r','avoid_food'='$af'";

//delete member
$sql_ = "DELETE FROM tour_round_member_info  WHERE id = '$member_id' AND last_name =''
AND dob ='0000-00-00' AND country_code =0 AND phone =0 AND email='' AND address='' AND city=''
AND province ='' AND zipcode = 0 AND passport_id =0 AND reservation_age =0 AND avoid_food =''
";
//delete tour round
$sql_ = "DELETE FROM tour_round_member  WHERE id = '$member_id' AND reference_code='$reference_code'";








?>
