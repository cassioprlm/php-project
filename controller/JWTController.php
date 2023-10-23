<?php 

require_once ('../vendor/autoload.php');

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

    class JWTController{

        private $key = "testeste";
    
    
        public function createToken($data){
           
            $payload = $data;
            $token = JWT::encode($payload, $this->key, 'HS256');
            return $token;
        }
        public function validateToken($token){
        
            try{
                $decoded = JWT::decode($token, new Key($this->key, 'HS256'));
                //token valido
                return $decoded;
                
            }catch(Exception $e){
                // 1 token invalido
                header('HTTP/1.0 401 Unauthorized');
                exit;

            }
            
        }
    }
?>