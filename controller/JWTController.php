<?php 

    class JWTController{

        private $key = "testeste";
    
    
        public function createToken($data){
            // Header - tipo de token e algoritmo
            $header = [
                "alg" => "HS256",
                "typ" => "JWT"

            ];
            //Payload - dados
            $payload = $data;
            // Encodando para json
            $h_json = json_encode($header);
            $p_json = json_encode($payload);

            //Signature - assinatura
            $signature = hash_hmac('SHA256', $this->base64UrlEncode($h_json). "." . $this->base64UrlEncode($p_json),$this->key, true);

            //encodando para base64
            $h_base64 = $this->base64UrlEncode($h_json);
            $p_base64 = $this->base64UrlEncode($p_json);
            $s_base64 = $this->base64UrlEncode($signature);
            
            //token gerado
            $token_jwt = "$h_base64.$p_base64.$s_base64";
            return $token_jwt;
            
            

        }
        public function validateToken($token){
            
            $token_validate = explode(".", $token);
            
            $header = $token_validate[0];
            $payload = $token_validate[1];
            $signature = $token_validate[2];

            $header_json = $this->base64UrlDecode($header);
            $payload_json = $this->base64UrlDecode($payload);
            $signature_json = $this->base64UrlDecode($signature);

            if(json_decode($header_json)->alg == "HS256"){
                $alg = "SHA256";
            }else{
                $alg = json_decode($header_json)->alg;
            }

            $signature_calc = hash_hmac($alg, $header. "." . $payload, $this->key, true);

            //$signature_calc_base64 = $this->base64UrlEncode($signature_calc);
            if($signature_calc == $signature_json){
                return true;
            }else{
                return false;
            }

        }

        public function base64UrlEncode($text){
            return str_replace(
                ['+', '/', '='],
                ['-', '_', ''],
                base64_encode($text)
            );
        }
        public function base64UrlDecode($text){
            return base64_decode(
                str_replace(
                ['-', '_'],
                ['+', '/'],
                $text
                )
            );
        }
    
    }


?>