<?php

    require_once 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $email = $_POST['email'];
        $pass = $_POST['senha'];
        $nome = $_POST['nome_usuario'];

        // Verificar se o email já existe utilizando prepared statements

        $verificar = "SELECT * FROM usuarios WHERE email = ?";
        $resultado = $mysql->prepare($verificar);

        if($resultado === false){
            echo "Erro na preparação";
        }else{
            $resultado->bind_param("s", $email);
            $resultado->execute();
            $resultado->store_result();

            if($resultado->num_rows > 0){
                header("Content-Type: application/json");
                echo json_encode(array("success"=>false));
            }else{

                //encoda em json a saida "success" = true
                header("Content-Type: application/json");
                echo json_encode(array("success"=>true));
                    
                //$sql = "INSERT INTO usuarios (email, senha, nome) VALUES ('$email', '$pass', '$nome')"; 

                $sql = "INSERT INTO usuarios (email, senha, nome) VALUES (?, ?, ?)";
                $stmt = $mysql->prepare($sql);

                if($stmt){
                    //vincular params
                    $stmt -> bind_param("sss", $email, $pass, $nome);
                    //execute a declaração
                    $stmt->execute();

                    // if($stmt->affected_rows > 0){
                    //      header('Location: /login.html');   
                
                    // }
                    // else{
                    //     echo "Erro no cadastro";
                    // }
                    $stmt->close();

                }else{
                    echo "Erro na preparação";
                }
            
            }
        } $resultado -> close();
    }else{
        echo "Method Not Allowed";
    }
?>