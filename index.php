<?php 
    require_once('scripts/auth/session.php');
    ?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>

  <link rel="stylesheet" href="res/bootstrap-5.3.2-dist/css/bootstrap.css">
  <link rel="icon" type="image/jpg" href="res/pictures/vector-hotel-icon-symbol-sign.jpg">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="res/style.css">


</head>

<body>
<?php
require_once('scripts/auth/login.php');
if(isset($_POST['logout'])) {  
    logout();
} 

if($_SESSION['loggedIn'] == true){
    $placeholder=  '<button class="btn btn-dark span" href="index.php" name="logout" type="submit">Logout</button>';
    $fileupload='<li class="nav-item">
    <a class="nav-link" href="pages/upload.php">Upload</a>
</li>';
    $UserProfile= '<li class="nav-item">
    <a class="nav-link" href="pages/profile.php">Profil</a>
</li>';
}
else{
    $placeholder= '<a class="btn btn-dark" href="pages/login.php" role="button">Login</a> <a class="btn btn-outline-secondary" href="pages/register.php" role="button">SignUp</a>';
    $fileupload='';
    $UserProfile= '';
}
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" value="Billton" href="#">'.$_SESSION['name'].'</a>
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
            '.$UserProfile.''.$fileupload.'
            <li class="nav-item">
                <a class="nav-link" href="pages/impressum.php">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/faq.php">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/gallery.php">Pictures</a>
            </li>

        </ul>
        <form class="forms" method="POST" name="logout">
         '.$placeholder.'
          </form>
      
    </div>
</div>
</nav>
';
?>
</body>

</html>