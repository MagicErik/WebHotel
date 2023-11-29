<?php
    //include("../data/connection.php");

    function signUp()
    {
        $_SESSION["SignUP"] = true;
    }
    function login($email, $password)
    {
        
            if(($_SESSION['email'] === $email) && ($_SESSION['password'] === $password))
            {
                
                $_SESSION["loggedIn"] = true;
                $_SESSION['name']= $_SESSION['username'];
                header("Location: ../index.php");

                return true;
            }

            return false;
        
    }

    function logout()
    {
        if ($_SERVER['REQUEST_URI'] !== 'index.php') {
            $indexLocation = "Location: ../index.php";
        }
        
        $_SESSION["loggedIn"] = false;
        $_SESSION['name']="Billton";
        header($indexLocation);
    }
        






?>