<?php
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Billton</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="impressum.php">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="faq.php">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Pictures</a>
            </li>

        </ul>
        <form class="d" >
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#LoginModal">
        Login
      </button>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#SignUpModal">
      Sign Up</button>
        </form>
    </div>
</div>
</nav>
';
?>


<div class="modal" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginModal">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="logreg">
          <form action="/action_page.php" method="post">
            <label for="user">Username</label><br>
            <input type="text"><br>
            <label for="passwort">Passwort</label><br>
            <input type="text" name="passwort" id="passwort"><br><br>

            <input type="submit" name="" id="" value="abschicken"><br>
          </form>
        </div>
        <br>
        <p>Noch kein Kundenkonto?</p>
        <p><a href="Registrierung.html">Zur Registrierung</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="SignUpModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SignUpModal">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="logreg">
          <form action="post" class="forms" action="">
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
                  <input type="email" id="email" name="email" title="It has to be a email address!" required>
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
                  <input type="password" id="password" name="password" pattern=".{8,}" titel="At least 8 characters!" required>
                </div>
              </div>
              <br><br>
              <input type="submit" value="Submit">
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<?php
include('../scripts/auth/session.php');
$_SESSION('gender') = $_POST['gender'];
$_SESSION('firstname') = $_POST['vname'];
$_SESSION('lastname') = $_POST['lname'];
$_SESSION('email') = $_POST['email'];
$_SESSION('username') = $_POST['username'];
$_SESSION('password') = $_POST['password'];
$_SESSION('erik') = "Erik";

?>