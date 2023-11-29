<Html>

<head>
    <link rel="stylesheet" href="../res/style.css">
    <link rel="stylesheet" href="res/bootstrap-5.3.2-dist/css/bootstrap.css">
</head>

<body>
    <form action="" class="forms" method="post">
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
            <input type="text" id="username" name="user" required>
            </div>
        </div>
        <div class="forminput">
            <div class="forminput1">
            <label class="formtext" for="password">Password:</label>
            </div>
            <div class="forminput2">
            <input type="password" id="password" name="password" pattern=".{8,}" required>
            </div>
        </div>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
<?php
    include('../scripts/auth/session.php');

    $_SESSION("anrede") = $_POST['gender'];

?>

</Html>