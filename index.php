<?php 
    require_once('scripts/auth/session.php');
    ?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>

  <link rel="stylesheet" href="res/style.css">
    <link rel="stylesheet" href="res/bootstrap-5.3.2-dist/css/bootstrap.css">   
    <link rel="icon" type="image/jpg" href="../res/pictures/vector-hotel-icon-symbol-sign.jpg">


</head>

<body>
<?php 
require_once('scripts/auth/login.php');
if(isset($_POST['logout'])) {  
    logout();
} 
if($_SESSION['loggedIn'] == true && $_SESSION['role']= 'admin'){
    $users= '<li class="nav-item">
    <a class="nav-link" href="users.php">Users</a>
    </li>';
}
else{
    $users='';
}

if($_SESSION['loggedIn'] == true){
    $placeholder=  '<button class="btn btn-dark span" href="index.php" name="logout" type="submit">Logout</button>';
    $fileupload='<li class="nav-item">
    <a class="nav-link" href="pages/upload.php">Upload</a>
</li>';
    $UserProfile= '<li class="nav-item">
    <a class="nav-link" href="pages/profile.php">Profil</a>
</li>';
    $reservations= ' <li class="nav-item">
    <a class="nav-link" href="pages/reservations.php">Reserv</a>
</li>';

}
else{
    $placeholder= '<a class="btn btn-dark" href="pages/login.php" role="button">Login</a> <a class="btn btn-outline-secondary" href="pages/register.php" role="button">SignUp</a>';
    $fileupload='';
    $UserProfile= '';
    $reservations='';
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
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            '.$UserProfile.''.$fileupload.''.$users.''.$reservations.'
            <li class="nav-item">
                <a class="nav-link" href="pages/impressum.php">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/gallery.php">Pictures</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="pages/news.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/faq.php">Help</a>
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