<?php

class RandomPassword {

    public function generatePassword($length, $count, $characters) {
     
        // $length - the length of the generated password
        // $count - number of passwords to be generated
        // $characters - types of characters to be used in the password
         
        // define variables used within the function    
            $symbols = array();
            $password = '';
            $pass = '';
         
        // an array of different character types    
            $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
            $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $symbols["numbers"] = '1234567890';
            $symbols["special_symbols"] = '!?~@#-_+<>[]{}';

            $symbols_length = strlen($characters) - 1; //strlen starts from 0 so to get number of characters deduct 1
             
            for ($p = 0; $p < $count; $p++) {
                $pass = '';
                for ($i = 0; $i < $length; $i++) {
                    $n = random_int(0, $symbols_length); // get a random character from the string with all characters
                    $pass .= $characters[$n]; // add the character to the password string
                }
                $passwords[] = htmlentities($pass);
                //$password = htmlentities($pass);
           }
             
            return $passwords; // return the generated password
        }
        /**Función characters($chars)
         * Calcula los campos que incluye la selección de checkbox elegidos en el formulario
         * 
         * params $chars: array que contiene los valores del checkbox
         */
        public function characters($chars){
            $characters = "";

            for($i=0; $i<count($chars); $i++){
                if($chars[$i] == 1) $characters .= "1234567890";
                if($chars[$i] == 2) $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                if($chars[$i] == 3) $characters .= "abcdefghijklmnopqrstuvwxyz";
                if($chars[$i] == 4) $characters .= "!?~@#-_+<>[]{}";
            }
            
            return $characters;//devuelve el array que necesita la función randomPassword()
        }
}
?>
