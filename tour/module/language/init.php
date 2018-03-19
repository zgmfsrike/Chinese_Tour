<?php
$lang = $_COOKIE['lang'];
switch($lang){
    case 'en': 
        $lang = 'english';
        break;
    case 'ch': 
        $lang = 'chinese';
        break;
    case 'th': 
        $lang = 'thai';
        break;
    default:
        $lang = 'english';
}
?>