<?php
ob_start();

$cookie_name = "lang";

if(!isset($_COOKIE[$cookie_name])) {

    $cookie_value = "en";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
    header("Refresh:0");

}

if(isset($_GET['lang']) and isset($_COOKIE[$cookie_name]) and $_GET['lang'] != $_COOKIE[$cookie_name]){
    
    setcookie($cookie_name, $_GET['lang'], time() + (86400 * 30));
    header("Refresh:0");
    
}

if(count($_GET) > 1){
    //    echo 'GET<br>' .var_dump($_GET).'<br>';
    $x = '&';
}else if(count($_GET) == 1 and isset($_GET['lang'])){
    //    echo 'NO GET 1<br>';
    $x = '';
}else if(count($_GET) == 1 and !isset($_GET['lang'])){
    //    echo 'NO GET 2<br>';
    $x = '&';
}else{
    $x = '?';
}

function new_url( $param )
{
    $url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $base_url = strtok($url, '?');              // Get the base url
    $parsed_url = parse_url($url);              // Parse it 
    if(isset($parsed_url['query'])){
        $query = $parsed_url['query'];              // Get the query string
        parse_str( $query, $parameters );           // Convert Parameters into array
        unset( $parameters[$param] );               // Delete the one you want
        $new_query = http_build_query($parameters); // Rebuilt query string
        return '?'.$new_query;            // Finally url is ready
    }else{
        return '';
    }
}

$new_url = new_url('lang');

ob_end_flush();
?>