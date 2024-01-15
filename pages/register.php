<Html>
<?php
include('../scripts/auth/session.php');
?>

<head>

<?php include ('../scripts/load/loadCss.php');
    ?>
    <title>Register</title>
</head>



<body>
    <?php
    include('../scripts/nav/menue.php');

    ?>
    <br><br>
    <div class="box1 container py-5 h-100">
        <form action="" class="forms" method="post" name="signup">
            <div class="forminput">
                <label class="formtext" for="gender">Anrede: </label>
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
require('../scripts/data/user.php');


if (isset($_POST['signup'])) {

    if ($_POST['password'] === $_POST['password2']) {
        signUp();
    }
    else {
        echo '<div class="col-md-2 box container py-5 h-100">passwörter stimmen nicht überein</div>';
    }
}
?>

</Html>