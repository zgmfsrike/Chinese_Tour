<?php
$table_name = "page_footer";
$sql= "SELECT name,$lang FROM $table_name";
$result = mysqli_query( $GLOBALS['conn'] , $sql );

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $content = $row[$lang];
        switch($row['name']){
            case 'name':
                $string_footer_name = $content;
                break;
            case 'contact':
                $string_footer_contactus = $content;
                break;
            case 'wechat':
                $string_footer_wechat = $content;
                break;
            case 'wechat_qr':
                $string_footer_wechat_qr = $content;
                break;
            case 'tel':
                $string_footer_tel = $content;
                break;
            case 'email':
                $string_footer_email = $content;
                break;
            case 'address':
                $string_footer_address = $content;
                break;
            case 'address_cont':
                $string_footer_address_cont = $content;
                break;
        }
    }
} else {
    //    echo "0 results";
    header('message.php?msg=unknow_request');
}
?>