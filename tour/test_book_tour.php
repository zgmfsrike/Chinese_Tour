<?php
include('module/session.php');
// $current_time = time();
// $_SESSION['book_tour_expired'] = $current_time+(60*15);

if(!isLoginAs(array('admin','member'))){
    header('Location: message.php?msg=please_login');
}
  include 'db_config.php';
  include 'module/del_book_tour.php';
  if(isset($_GET['tour_round_id']) and isset($_SESSION['login_id'])){
    $member_id = $_SESSION['login_id'];
    $tour_round_id = $_GET['tour_round_id'];

    if(isset($_POST['book'])){
        $amount_people = $_POST['amount_people'];
        $date = $_POST['date'];
        list($start_date,$end_date) = explode("to",$date);
        echo "Start date : ".$start_date;
        echo "<br>End date : ".$end_date;
        echo "<br>Member id : ".$member_id;
        //delete null value
        $sql_delete_null = "DELETE FROM tour_round_member  WHERE id = $member_id AND last_name =''
        AND dob ='0000-00-00' AND country_code =0 AND phone =0 AND email='' AND address='' AND city=''
        AND province ='' AND zipcode = 0 AND passport_id =0 AND reservation_age =0 AND avoid_food =''";
        $result_delete = mysqli_query($conn,$sql_delete_null);

        //add reserve member
        $sql_check_group = "SELECT DISTINCT trm.group_member FROM tour_round_member trm ORDER BY trm.group_member  DESC";
        $result_group = mysqli_query($conn,$sql_check_group);
        if($result_group){
          $data = mysqli_fetch_array($result_group);
          $last_group = $data['group_member'];
          echo "<br> Last group : ".$last_group;
          $group_member = $last_group+1;
          echo "<br> Group member : ".$group_member;
          echo "<br> Amount people :".$amount_people;

          $sql_amount = "SELECT DISTINCT t.max_customer FROM tour t INNER JOIN tour_round tr on t.tour_id = tr.tour_id WHERE tr.tour_round_id = $tour_round_id";
          $result_amount = mysqli_query($conn,$sql_amount);
          if($result_amount){
            $data_amount= mysqli_fetch_array($result_amount);
            $max_customer = $data_amount['max_customer'];

            echo "<br>Max customer : ".$max_customer;


          }
          //customer in tour
          $sql_2 = "SELECT *
          FROM tour_round_member trm INNER JOIN tour_round tr ON trm.tour_round_id = tr.tour_round_id
          INNER JOIN tour t ON tr.tour_id = t.tour_id
          WHERE tr.tour_round_id = $tour_round_id";
          $result_2 = mysqli_query($conn,$sql_2);
          $customer_in_tour = mysqli_num_rows($result_2);
          $total = $amount_people+$customer_in_tour;
          if($max_customer>=$total){
            if($amount_people !==0){
              for($i =1 ;$i <= $amount_people;$i++){
                $reserve_member = "reserve".$i;
                $sql_add_reserve ="INSERT INTO  tour_round_member(id,tour_round_id,first_name,group_member) values('$member_id','$tour_round_id','$reserve_member',$group_member)";
                $result_reserve = mysqli_query($conn,$sql_add_reserve);
                // if($result_reserve){
                //   echo "add ".$reserve_member." success!";
                // }else{
                //   echo "add fail".$reserve_member;
                // }
              }
            }
          }else{
            echo "full";
          }





        }


    }





    //
    // if($current_time>=$_SESSION['tour_round_expired']){
    //   unset($_SESSION['tour_round_expired']);
    //   header('location: message.php?msg=session_expired');
    // }


  }

?><br>
