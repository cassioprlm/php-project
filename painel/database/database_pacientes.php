<?php
    // CREATE TABLE pacientes (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     nome VARCHAR(255) NOT NULL,
    //     idade INT,
    //     peso DECIMAL(7, 2),
    //     imc DECIMAL(7, 2)
    // );
    require_once('../php/sessao.php');
    require_once('../../php/database/conexao.php');

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['email'])){
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $email = $_POST['email'];
            $imc = $peso / ($altura * $altura);
            $imc = number_format($imc, 2, '.', '');

            $email_validation = "SELECT * FROM pacientes WHERE email = ?";
            $stmt = $mysql -> prepare($email_validation);
            if($stmt){
                $stmt -> bind_param("s", $email);
                $stmt -> execute();
                $stmt->store_result();
                if($stmt->num_rows > 0){
                    header("Content-Type: application/json");
                    echo json_encode(array("success"=>false));
                }else{
                    header("Content-Type: application/json");
                    echo json_encode(array("success"=>true));
            
                    $sql = "INSERT INTO pacientes (nome, email, idade, peso, altura, imc) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $mysql -> prepare($sql);
                    if($stmt){
                        $stmt -> bind_param("ssiddd", $nome, $email,$idade, $peso, $altura, $imc);
                        $stmt -> execute();
                        $stmt->store_result();
                    }else{
                        echo "Statement deu errado";
                    }
                }
                mysqli_close($mysql);
            }else{
                echo "Erro no POST";
        }
    }
    
    }else{
        echo "Method Not Allowed";
    }


?>