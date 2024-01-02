<?php

class PasswordHasher {
    private $saltLength = 16;
    private $salt;

    public function hashPassword($password) {
        // Generate a random salt
        $salt = $this->generateSalt();

        // Combine the password and salt
        $hashed_password = password_hash($password . $salt, PASSWORD_DEFAULT);

        // Return the hashed password with salt
        return $hashed_password . ':' . base64_encode($salt);
    }

    public function verifyPasswordWithSalt($input_password, $stored_hash, $stored_salt) {
        $decoded_salt = base64_decode($stored_salt);

        // Hash the input password with the provided salt
        $hashed_input_password = password_hash($input_password . $decoded_salt  , PASSWORD_DEFAULT);
        echo '<br>';
        echo $input_password;
        echo '<br>';
        echo $decoded_salt;
        echo '<br>';
        echo $hashed_input_password;
        echo '<br>';
        // Compare the hashed input password with the stored hash
        return password_verify($input_password,$hashed_input_password);
    }

    public function getSalt() {
        return base64_encode($this->salt);
    }

    private function generateSalt() {
        return random_bytes($this->saltLength);
    }
}


?>