<?php
    require_once('../php/sessao.php');
    require_once('../../php/database/conexao.php');

    $sql = "SELECT * FROM pacientes";

    $resultado = $mysql->query($sql);

    if($resultado->num_rows > 0){
        $pacientes = array();
        while($row = $resultado->fetch_assoc()){
            $pacientes[] = $row;
        }
        header("Content-Type: application/json");
        echo json_encode($pacientes);
    }else{
        header("Content-Type: application/json");
        echo json_encode(array());
    }
?>