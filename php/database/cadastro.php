<?php

    require_once 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $email = $_POST['email'];
        $pass = $_POST['senha'];
        $nome = $_POST['nome_usuario'];

        $verificar = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $mysql->query($verificar);

        if($resultado->num_rows > 0){
            echo "Este Email já esta em uso. Por favor, tente outro Email";
        }else{
            //$sql = "INSERT INTO usuarios (email, senha, nome) VALUES ('$email', '$pass', '$nome')"; 

            $sql = "INSERT INTO usuarios (email, senha, nome) VALUES (?, ?, ?)";
            $stmt = $mysql->prepare($sql);

            if($stmt){
                //vincular params
                $stmt -> bind_param("sss", $email, $pass, $nome);
                //execute a declaração
                $stmt->execute();

                if($stmt->affected_rows > 0){
                    sleep(5);
                    header('Location: /login.html');   
            
                }else{
                    echo "Erro no cadastro";
                }
                $stmt->close();

            }else{
                echo "Erro na preparação";
            }
        
        }
    }
?>