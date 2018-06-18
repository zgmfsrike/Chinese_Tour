<?php
function isNotLogin(){
  if(isset($_SESSION['login_id'])){
    header('Location: message.php?msg=login_already');
  }
}

// isLoginAs(array('admin','member'))
function isLoginAs($user_type){
  if(!isset($_SESSION['login_id'])){
    // header('Location: message.php?msg=unauthorized');
    return FALSE;
  }
  $lenght = count($user_type);
  if($lenght == 0){
    echo 'no type is set';
    //            return FALSE;
  }
  $i;
  for($i = 0; $i < $lenght; $i++){
    if(isset($_SESSION['user_type']) and strcasecmp($_SESSION['user_type'],$user_type[$i]) == 0){
      return TRUE;
    }
  }
  // header('Location: message.php?msg=unauthorized');
  return FALSE;
}
?>
