<?php 
require "../vendor/autoload.php";

// api/users/1

if($_GET['url']) {

    $url = explode('/',$_GET['url']);

    if($url[0] === 'api') {
        //..
        array_shift($url);
        $service = 'App\Services\\'.ucfirst($url[0]).'Service'; 
        array_shift($url);  


        $method = strtolower($_SERVER['REQUEST_METHOD']);
        
        try {
            
            $response = call_user_func_array(array(new $service, $method), $url);

            print json_encode(array('status' => 'sucess', 'data' => $response));
            exit;
        } catch (\Exception $e) {
            print json_encode(array('status' => 'error', 'data' => "Nenhum usuario encontrado"));
            //parametro adicional para nao quebrar a formatacao dos acentos: JSON_UNESCAPED_UNICODE; 
        }
    }    
}
