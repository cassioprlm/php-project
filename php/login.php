<?php 

require_once 'database/conexao.php';
session_set_cookie_params(['httpOnly' => true]);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            //JUST FOR FUN
           // $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
           // $resultado = $mysql->query($sql);
           // -------------------------------------------------------------------------------

            $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
            $stmt = $mysql -> prepare($sql);
            if($stmt){
                $stmt -> bind_param("ss", $email, $password);
                $stmt -> execute();
                $stmt->store_result();

                if($stmt->num_rows > 0){
                //if($resultado->num_rows > 0){
                    // Autenticação bem sucedida, encoda em json a saida "success" = true
                    header("Content-Type: application/json");
                    echo json_encode(array("success"=>true));
                    session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['email'] = $email;
                
                }else{
                    // Autenticação falhou, encoda em json a saida "success" = false
                    header("Content-Type: application/json");
                    echo json_encode(array("success"=>false));

                }
                mysqli_close($mysql);

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