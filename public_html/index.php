<?php 
require "../vendor/autoload.php";

// api/users/1

if($_GET['url']) {

    $url = explode('/',$_GET['url']);

    if($url[0] === 'api') {
        //..
        array_shift($url);
        $service = $url[0]; 
        var_dump($url); 
    }    
}
