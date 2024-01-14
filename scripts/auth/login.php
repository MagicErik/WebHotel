<?php

require('hash_salt.php');

function signUp()
{
    //methode um den User zu regestrieren

    //datenverbindung wird aufgebaut
    require('../scripts/data/db_connection.php');
    $connection = $conn;

    //alle Wer des Forms zur regestrierung werden zu Variablen gesetzt.
    $gender = $_POST['gender'];
    $firstname = $_POST['vname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //neue instanz von PasswordHasehr wird angelegt.
    $passwordHasher = new PasswordHasher();
    $hashed_password = $passwordHasher->hashPassword($password);
   
    $query = "INSERT INTO `user`(`email`, `password`,`salt`, `name`) VALUES ('$email','$hashed_password','skibid','$username')";
    mysqli_query($connection, $query);

    echo "It worked";
    $_COOKIE['User'] = $firstname;
    $_SESSION["SignUP"] = true;
}

function login($email, $input_password)
{
    require('../scripts/data/db_connection.php');

    //echo '</br></br></br></br>PASSWORD'.$input_password;
    $sql = "SELECT * FROM user WHERE email=?" ;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    
    $password_hash = $row['password'];

    
    $passwordHasher = new PasswordHasher();
    if ($passwordHasher->verifyPasswordWithSalt($input_password,$password_hash)) {
        echo'login worked';
    }
    if(($row['name'] == 'admin')){
        $_SESSION['role'] = 'admin';
    }

    if ($passwordHasher->verifyPasswordWithSalt($input_password,$password_hash)) {
            $_SESSION["loggedIn"] = true;
            $_SESSION['name'] = $_SESSION['username'];
            header("Location: http://localhost/Projekt/");
            echo "login success";
            return true;
    }
    else{
        echo "login didn't work";
        echo "</br>";
        return false;
    }

}

function logout()
{
    if ($_SERVER['REQUEST_URI'] !== 'index.php') {
        
        $indexLocation = "Location: http://localhost/Projekt/";
    }
    $_SESSION['role'] = null;
    $_SESSION["loggedIn"] = false;
    $_SESSION['name'] = "Billton";
    header($indexLocation);
}







?>