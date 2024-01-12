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

<body>
  <?php
  include('../scripts/nav/menue.php');
  include('../scripts/load/loadNews.php');
  ?>
  <div class="box1 align-items-center">
    <div class="container">
      <?php
      echo loadNews();
      echo '<div class="news-container">
      <div class="news-post">
          <div class="post-title"><input type="text" placeholder="Titel"></input></div>
          <div class="post-date"><input type="date" placeholder="Datum"></div>
          <img class="post-image" alt="Bildbeschreibung">
          <div class="post-text">
              <p><input type="text" placeholder="content"></p>
          </div>
      </div>
      
  </div>';
      if(isset($_POST['btnNewNews'])){
        echo 'es geht';
        echo '<div class="news-container">
        <div class="news-post">
            <div class="post-title"><input type="text" placeholder="Titel"></input></div>
            <div class="post-date"><input type="date" placeholder="Datum"></div>
            <img class="post-image" alt="Bildbeschreibung">
            <div class="post-text">
                <p><input type="text" placeholder="content"></p>
            </div>
        </div>
        
    </div>';
      }
      ?>
      <div class="row">
        <div class="col text-center">
            <button type="submit" name="btnNewNews">Click Me!</button>
        </div>
      </div>
    </div>
  </div>
</body>



</html>