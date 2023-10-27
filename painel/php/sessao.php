<?php 

    session_set_cookie_params(['httpOnly' => true]);
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
    session_regenerate_id(true);

    if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
        http_response_code(401);
        header("Location: /login.html");
        
        exit();
    }


?>