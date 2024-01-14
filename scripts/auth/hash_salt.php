<?php

class PasswordHasher {
    private $saltLength = 16;
    private $salt;

    public function hashPassword($password) {
        // Generate a random salt
        //$salt = $this->generateSalt();

        // Return password hash
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPasswordWithSalt($input_password, $stored_hash) {

        // Hash the input password with the provided salt
        //$hashed_input_password = password_hash($input_password, PASSWORD_DEFAULT);
        //$hashed_input_password = password_hash($input_password, PASSWORD_DEFAULT);

        echo '<br>input pass';
        echo $input_password;
        echo '<br> store hash';
        echo $stored_hash;
        echo '<br>';
        // Compare the hashed input password with the stored hash
        return password_verify($input_password,$stored_hash);
    }

    public function getSalt() {
        return base64_encode($this->salt);
    }

    private function generateSalt() {
        return random_bytes($this->saltLength);
    }
}


?>