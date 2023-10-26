<?php 

    //CREATE DATABASE phpweb;
    //USE phpweb;
   //CREATE TABLE usuarios (
    //id INT AUTO_INCREMENT PRIMARY KEY,
   // nome VARCHAR(50) NOT NULL,
    //email VARCHAR(100) NOT NULL,
   // senha VARCHAR(255) NOT NULL
   // );
    

    $usuario = 'root';
    $senha = 'cassinho15';
    $database = 'phpweb';
    $host = 'localhost';

    $mysql = new mysqli($host, $usuario, $senha, $database);

    if($mysql -> error){
        die("Falha ao tentar se autenticar no MySql" . $mysql -> error);


    }

?>