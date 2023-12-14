<?php

require('../scripts/auth/hash_salt.php');

function signUp()
{
    require('../scripts/data/db_connection.php');
    $connection = $conn;

    // The submit button was clicked
    $gender = $_POST['gender'];
    $firstname = $_POST['vname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $passwordHasher = new PasswordHasher();
    $hashed_password = $passwordHasher->hashPassword($password);
    $salt = $passwordHasher->getSalt();


    $query = "INSERT INTO `user`(`email`, `password`,`salt`, `name`) VALUES ('$email','$hashed_password','$salt','$username')";
    mysqli_query($connection, $query);

    echo "It worked";
    $_COOKIE['User'] = $firstname;
    //echo $_SESSION['username'];
    $_SESSION["SignUP"] = true;
}

function login($email, $password)
{
    require('../scripts/data/db_connection.php');
    $query = "SELECT 'password', salt FROM user WHERE email ='.$email'" ;
    $result = $conn->query($query);

    $passwordHasher = new PasswordHasher();
    $hashed_password = $passwordHasher->hashPassword($result->);

    if ($passwordHasher->verifyPasswordWithSalt($password,$password_hash,$salt)) {

        if (($_SESSION['email'] === $email) && ($_SESSION['password'] === $password)) {

            $_SESSION["loggedIn"] = true;
            $_SESSION['name'] = $_SESSION['username'];
            header("Location: ../index.php");

            return true;
        }

        return false;
    }

}

function logout()
{
    if ($_SERVER['REQUEST_URI'] !== 'index.php') {
        $indexLocation = "Location: ../index.php";
    }

    $_SESSION["loggedIn"] = false;
    $_SESSION['name'] = "Billton";
    header($indexLocation);
}







?>