<?php

require('hash_salt.php');

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
    $hashed_password_salt = $passwordHasher->hashPassword($password);
    //$hashed_password_salt = explode(":",$hashed_password_salt);
    $hashed_password = $hashed_password_salt;
    $salt = $hashed_password_salt[1];

    $query = "INSERT INTO `user`(`email`, `password`,`salt`, `name`) VALUES ('$email','$hashed_password','$salt','$username')";
    mysqli_query($connection, $query);

    echo "It worked";
    $_COOKIE['User'] = $firstname;
    $_SESSION["SignUP"] = true;
}

function login($email, $password)
{
    require('../scripts/data/db_connection.php');

    echo '</br></br></br></br>';
    $sql = "SELECT * FROM user WHERE email=?" ;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    
    $salt = $row['salt'];
    $password_hash = $row['password'];

    echo $salt;
    echo "</br>";
    echo $password_hash;
    echo "</br>";
    echo $row['email'];
    echo "</br>";
    echo $password;
    echo "</br>";
    
    $passwordHasher = new PasswordHasher();
    if ($passwordHasher->verifyPasswordWithSalt($password,$password_hash,$salt)) {
        echo'yes';
    }


    if (($row['email'] == $email) && $passwordHasher->verifyPasswordWithSalt($password,$password_hash,$salt)) {
            $_SESSION["loggedIn"] = true;
            $_SESSION['name'] = $_SESSION['username'];
            header("Location: ../index.php");
            echo "login success";
            return true;
        
    }
    else{
        echo 'login not working';
        echo "</br>";
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