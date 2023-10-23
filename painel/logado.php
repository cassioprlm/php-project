<?php

session_set_cookie_params(['httpOnly' => true]);
session_start();
session_regenerate_id(true);
    if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
        http_response_code(401);
        header("Location: ../login.html");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        alert(document.cookie);
    </script>
    
</body>
</html>