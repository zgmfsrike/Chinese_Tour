<?php
$table_name = 'page_header';
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $content = $row[$lang];
        switch($row['name']){
            case 'home':
                $string_header_index = $content;
                break;
            case 'meeting':
                $string_header_meeting = $content;
                break;
            case 'incentive':
                $string_header_incentive = $content;
                break;
            case 'convention':
                $string_header_convention = $content;
                break;
            case 'exhibition':
                $string_header_exhibition = $content;
                break;
            case 'business':
                $string_header_business = $content;
                break;
            case 'about':
                $string_header_about = $content;
                break;
            case 'login':
                $string_header_login = $content;
                break;
            case 'logout':
                $string_header_logout = $content;
                break;
            case 'register':
                $string_header_register = $content;
                break;
        }
    }
} else {
    //    echo "0 results";
    header('message.php?msg=unknow_request');
}
?>