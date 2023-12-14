<?php   
class User
{
    private $username;
    private $email;
    private $password_hash;
    private $salt;
    private $password;
    private $firstname;
    private $lastname;


    function User($username, $firstname, $lastname, $email)
    {
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }


    private function getUsername(){
        return $this->username;
    }

    private function getPassword_hash(){
        return $this->password_hash;
    }

    private function getFirstname(){
        return $this->firstname;
    }

    private function getLastname(){
        return $this->lastname;
    }

    
    public function getSalt(){
        return $this->salt;
    }

    private function getEmail(){
        return $this->email;
    }


    private function hashPassword($password) {
        // Generate a random salt
        $salt = random_bytes(16);
        $this -> salt = $salt;

        // Combine the password and salt
        $hashed_password = password_hash($password . $salt, PASSWORD_BCRYPT);

        // Store the hashed password with the salt
        $this->password_hash = $hashed_password . ':' . base64_encode($salt);
    }

    public function setPassword($password) {
        // Call the private method to hash the password with salt
        $this->hashPassword($password);
    }

    public function getPasswordHash() {
        // Return the hashed password with salt
        return $this->password_hash;
    }



}
?>
