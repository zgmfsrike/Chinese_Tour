<?php
$table_name = "page_about";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $content = $row[$lang];
        switch($row['name']){
            case 'title':
                $title = $content;
                break;
            case 'name':
                $string_aboutus_name = $content;
                break;
            case 'contact':
                $string_aboutus_contactus = $content;
                break;
            case 'wechat':
                $string_aboutus_wechat = $content;
                break;
            case 'tel':
                $string_aboutus_tel = $content;
                break;
            case 'email':
                $string_aboutus_email = $content;
                break;
        }
    }
} else {
    //    echo "0 results";
    header('message.php?msg=unknow_request');
}
?>