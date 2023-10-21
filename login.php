<?php 
require_once 'php/database/conexao.php';
require_once 'controller/JWTController.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $pass = $_POST['password'];
    }

    $validar = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $mysql -> prepare($validar);
    if($stmt){
        $stmt -> bind_param("ss", $email, $pass);
        //executar a consulta
        $stmt -> execute();
        // Armazenar o resultado
        $stmt->store_result();

        if($stmt->num_rows > 0){
            header('Location: painel/logado.html');

            // Cria o JWT token referente a conta que logou
            $jwt = new JWTController();
            
            if(isset($_COOKIE['session']) and !empty($_COOKIE['session'])){
                $token = $jwt -> validateToken($_COOKIE['session']);
                if($token){
                    
                }else{
                    
                }
                
            }else{

                $token = $jwt -> createToken(array('email'=>$_POST['email'],'nome'=>$_POST['password']));
                setcookie('session',$token,time()+36000);
            }
        }else{
            // Autenticação falhou, exiba um alerta com SweetAlert2
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">';
            echo 'Swal.fire({';
            echo '    icon: "error",';
            echo '    title: "Credenciais Inválidas",';
            echo '    text: "Por favor, verifique seu email e senha e tente novamente.",';
            echo '    confirmButtonColor: "#d33"';
            echo '});';
            echo '</script>';

            //header('Location: login.html');
            ;
            
        }
    }
?>