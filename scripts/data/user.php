<?php   class User
{
    private $username;
    private $email;
    private $password_hash;
    private $firstname;
    private $lastname;


    function User($username, $password_hash, $firstname, $lastname, $email)
    {
        $this->username = $username;
        $this->password = $password_hash;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }


    public function toJSON()
    {
        $json = array(
            'username' => $this->getUsername(),
            'password_hash' => $this->getPassword_hash(),
            'firstname' => $this->getFirstname(),
            'lastname'=> $this->getLastname(),
            'email'=> $this->getEmail(),
        );

        return json_encode($json);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
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

    private function getEmail(){
        return $this->email;
    }



}
?>
