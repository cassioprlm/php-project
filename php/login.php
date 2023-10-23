<?php 

require_once 'database/conexao.php';
require_once '../controller/JWTController.php';
session_set_cookie_params(['httpOnly' => true]);
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
        

            $validar = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
            $stmt = $mysql -> prepare($validar);
            if($stmt){
                $stmt -> bind_param("ss", $email, $password);
                //executar a consulta
                $stmt -> execute();
                // Armazenar o resultado
                $stmt->store_result();

                if($stmt->num_rows > 0){

                    header("Content-Type: application/json");
                    echo json_encode(array("success"=>true));
                    $_SESSION['logged'] = true;
                    $_SESSION['email'] = $email;  
                
                }else{
                    // Autenticação falhou, encoda em json a saida "success" para ser validado utilizando xhr
                    header("Content-Type: application/json");
                    echo json_encode(array("success"=>false));

                }

            }else{
                echo "Statement deu errado";
            }

        }else{
            echo "Erro no POST";
        }
    }else{ 
        echo "Method Not Allowed";
    }
   
?>