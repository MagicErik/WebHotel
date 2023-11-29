<?php
    //include("../data/connection.php");

    function login($email, $password)
    {
        
            if(($_SESSION['email'] === $email) && ($_SESSION['password'] === $password))
            {
                $_SESSION["loggedIn"] = true;
                $_SESSION['name']= $_SESSION['username'];
                return true;
            }

            return false;
        
    }

    function logout()
    {
        $_SESSION["loggedIn"] = false;
        $name="Bilton";
    }






?>