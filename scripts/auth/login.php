<?php
class Authentification
{
    function signUp(User $user)
    {

    }
    function login($username, $password_hash)
    {
        $_SESSION["User"] = $username;
    }

    function logout()
    {
    }


}



?>