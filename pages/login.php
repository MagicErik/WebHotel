<!DOCTYPE html>
<?php 
    include('../scripts/auth/session.php');
    ?>
<html>

<head>
    <link rel="stylesheet" href="../res/style.css">
    <link rel="stylesheet" href="../res/bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="../res/pictures/vector-hotel-icon-symbol-sign.jpg">

    <title>Login</title>
</head>
<?php
  include_once('../scripts/auth/login.php');
  if(isset($_POST['login'])){
    echo '<br><br><br><br><br><br><br><br><br><br><br>YOUR INPUT IS '.$_POST['password'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    login($email,$password);
    
    
     
  }

  ?>



<body>
<?php 
  include('../scripts/nav/menue.php');

  ?>
  <br>
  <br>
    <div class="container py-5 h-100">
      <form class="forms" method="post" name="login">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
              
              <button class="btn btn-outline-light btn-lg px-5" name="login" href="../index.php" type="submit">Login</button>
              
              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
      </form>
  </div>


</body>



</html>