<?php 
    require_once('scripts/auth/session.php');
    ?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>

  <?php 
  include("scripts/load/loadCss.php");
  ?>


</head>

<body>
<?php 
require_once('scripts/auth/login.php');
if(isset($_POST['logout'])) {  
    logout();
} 
$fileupload='';
$UserProfile= '';
$reservations='';
$users='';

if($_SESSION['loggedIn'] == true){
    $placeholder=  '<button class="btn btn-dark span" href="index.php" name="logout" type="submit">Logout</button>';
    
    $UserProfile= '<li class="nav-item">
    <a class="nav-link" href="pages/profile.php">Profil</a>
</li>';
    $reservations= ' <li class="nav-item">
    <a class="nav-link" href="pages/reservations.php">Reserv</a>
</li>';

}
else{
    $placeholder= '<a class="btn btn-dark" href="pages/login.php" role="button">Login</a> <a class="btn btn-outline-secondary" href="pages/register.php" role="button">SignUp</a>';
    
}

if($_SESSION['loggedIn'] == true && $_SESSION['role']== 'admin'){
    $users= '<li class="nav-item">
    <a class="nav-link" href="pages/users.php">Users</a>
    </li>';
    $fileupload='<li class="nav-item">
    <a class="nav-link" href="pages/upload.php">Upload</a>
</li>'; 
$reservations= ' <li class="nav-item">
<a class="nav-link" href="pages/reservations_admin.php">Reserv</a>
</li>';

}


echo '

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
<div class="container-fluid">
<a class="navbar-brand" value="Billton" href="#">Billton</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
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