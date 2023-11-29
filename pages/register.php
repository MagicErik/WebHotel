<Html>
<?php
include('../scripts/auth/session.php');
?>

<head>

    <link rel="stylesheet" href="../res/style.css">
    <link rel="stylesheet" href="../res/bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="../res/pictures/vector-hotel-icon-symbol-sign.jpg">
    <title>Register</title>
</head>



<body>
    <?php
    include('../scripts/nav/menue.php');
    ?>
    <br><br>
    <div class="box container py-5 h-100">
        <form action="" class="forms" method="post" name="signup">
            <div class="forminput">
                <label class="formtext" for="anrede">Anrede: </label>
                <input type="radio" id="gender1" name="gender" value="male" required>
                <label for="gender1">Herr</label>

                <input type="radio" id="gender2" name="gender" value="female" required>
                <label for="gender2">Frau</label>

                <input type="radio" id="gender3" name="gender" value="other" required>
                <label for="gender3">Sonstige</label><br><br>
            </div>
            <div class="forminput">
                <div class="forminput1">
                    <label class="formtext" for="vname">Vorname:</label>
                </div>
                <div class="forminput2">
                    <input type="text" id="vname" name="vname" pattern="[A-Z][a-z]*"
                        title="First Letter needs to be capitalized" required>
                </div>
            </div>
            <div class="forminput">
                <div class="forminput1">
                    <label class="formtext" for="lname">Nachname:</label>
                </div>
                <div class="forminput2">
                    <input type="text" id="lname" name="lname" pattern="[A-Z][a-z]*"
                        title="First Letter needs to be capitalized" required>
                </div>
            </div>
            <div class="forminput">
                <div class="forminput1">
                    <label class="formtext" for="email">Email-addresse:</label>
                    <div class="forminput2">
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="forminput">
                    <div class="forminput1">
                        <label class="formtext" for="username">Username:</label>
                    </div>
                    <div class="forminput2">
                        <input type="text" id="username" name="username" required>
                    </div>
                </div>
                <div class="forminput">
                    <div class="forminput1">
                        <label class="formtext" for="password">Password:</label>
                    </div>
                    <div class="forminput2">
                        <input type="password" id="password" name="password" pattern=".{8,}" required>
                    </div>

                    <div class="forminput3">
                        <label class="formtext" for="password2">repeat Password:</label>
                    </div>
                    <div class="forminput4">
                        <input type="password" id="password2" name="password2" pattern=".{8,}" title="" required>
                    </div>
                </div>
                <br>
                <input type="submit" value="Submit" href="#" name="signup">
        </form>
    </div>
</body>
<?php
require_once('../scripts/data/user.php');
if (isset($_POST['signup'])) {

    if ($_POST['password'] === $_POST['password2']) {

        // The submit button was clicked
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['firstname'] = $_POST['vname'];
        $_SESSION['lastname'] = $_POST['lname'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $User = new User($_SESSION['username'], $_SESSION['password'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['email']);
        //write($User);
        echo "It worked";
        $_COOKIE['User'] = $_SESSION['firstname'];
    } else {
        echo '<div class="col-md-2 box container py-5 h-100">passwörter stimmen nicht überein</div>';
    }
    //echo $_SESSION['username'];
}
?>

</Html>