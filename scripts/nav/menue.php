<?php


require_once('../scripts/auth/login.php');
if(isset($_POST['logout'])) {  
    logout();
} 
if($_SESSION['loggedIn'] == true){
    $placeholder=  '<button class="btn btn-dark span" href="../index.php" name="logout" type="submit">Logout</button>';
    $UserProfile= '<li class="nav-item">
    <a class="nav-link" href="profile.php">Profil</a>
</li>';
    $reservations= ' <li class="nav-item">
    <a class="nav-link" href="reservations.php">Reserv</a>
</li>';

}
else{
    $placeholder= '<a class="btn btn-dark" href="login.php" role="button">Login</a> <a class="btn btn-outline-secondary" href="register.php" role="button">SignUp</a>';
    $fileupload='';
    $UserProfile= '';
    $reservations='';
}

if($_SESSION['loggedIn'] == true && $_SESSION['role']== 'admin'){
    $users= '<li class="nav-item">
    <a class="nav-link" href="users.php">Users</a>
    </li>';
    $fileupload='<li class="nav-item">
    <a class="nav-link" href="upload.php">Upload</a>
</li>';
$reservations= ' <li class="nav-item">
<a class="nav-link" href="reservations_admin.php">Reserv</a>
</li>';
}
else{
    $users='';
    $fileupload='';
    
}


echo '<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" value="Billton" href="#">Billton</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            '.$UserProfile.''.$fileupload.''.$users.''.$reservations.'
            <li class="nav-item">
                <a class="nav-link" href="impressum.php">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Pictures</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="news.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="faq.php">Help</a>
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
