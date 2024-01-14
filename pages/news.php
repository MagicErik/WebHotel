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
      //header("refresh: 3;");
      echo loadNews();
      if (isset($_POST['btnNewNews'])) {
        echo '
        <form action="#" method="post">
        <div class="news-container">
        <div class="news-post">
            <div class="post-title"><input type="text" name="post-titel" placeholder="Titel"></input></div>
            <div class="post-date"><input type="date" name="post-date" placeholder="Datum"></div>
            <input type="text" name="post-image" placeholder="bilder name"></input>
            <div class="post-text">
                <p><input name="post-text" type="text" placeholder="content"></p>
            </div>
            <button type="submit" name="saveNews">Save</button>
        </div>
    </div></form>'
        ;
      }
      if (isset($_POST['saveNews'])) {
        include('../scripts/data/db_connection.php');


        $date =$_POST['post-date'];
        $image = $_POST['post-image'];
        $titel = $_POST['post-titel'];
        $content = $_POST['post-text'];

        $sql = "INSERT INTO `news`(`datum`,`image`, `titel`, `content`) VALUES ('$date','$image','$titel','$content')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

      }
      if($_SESSION['role'] == 'admin'){
        echo " <form action='' method='post'>
        <div class='row'>
          <div class='col text-center'>
            <button type='submit' name='btnNewNews'>New NewsPost</button>
          </div>
        </div>
      </form>";
      }
      ?>
      
     
    </div>
  </div>
</body>



</html>