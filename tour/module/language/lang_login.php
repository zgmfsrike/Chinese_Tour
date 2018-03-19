<?php
$table_name = 'page_login';
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $content = $row[$lang];
        switch($row['name']){
            case 'username':
                $string_login_username = $content;
                break;
            case 'password':
                $string_login_password = $content;
                break;
            case 'login':
                $string_login_login = $content;
                break;
            case 'register':
                $string_login_register = $content;
                break;
            case 'title':
                $title = $content;
                break;

        }
    }
} else {
    //    echo "0 results";
    header('message.php?msg=unknow_request');
}
?>