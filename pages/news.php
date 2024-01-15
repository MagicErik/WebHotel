<!DOCTYPE html>
<?php
include('../scripts/auth/session.php');
?>
<html>

<head>
<?php include_once ('../scripts/load/loadCss.php');
    ?>
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
      if (isset($_POST['btnNewNews'])) {
        echo '
        <form action="news.php" method="post">
        <div class="news-container">
        <div class="news-post">
            <div class="post-title"><input type="text" name="post-titel" placeholder="Titel"></input></div>
            <div class="post-date"><input type="date" name="post-date" placeholder="Datum"></div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </form>
            <input type="text" name="post-image" placeholder="bilder name"></input>
            <div class="post-text">
                <p><input name="post-text" type="text" placeholder="content"></p>
            </div>
            <button type="submit" href="news.php" name="saveNews">Save</button>
        </div>
    </div></form>'
        ;}
        if($_SESSION['role'] == 'admin'){
          echo " <form action='' method='post'>
          <div class='row'>
            <div class='col text-center'>
              <button type='submit' name='btnNewNews'>New NewsPost</button>
            </div>
          </div>
        </form></br>";
        }
      echo loadNews();
     
      if (isset($_POST['saveNews'])) {
        include('../scripts/data/db_connection.php');


        $date =$_POST['post-date'];
        $image = $_POST['post-image'];
        $titel = $_POST['post-titel'];
        $content = $_POST['post-text'];

        $sql = "INSERT INTO `news`(`datum`,`image`, `titel`, `content`) VALUES ('$date','$image','$titel','$content')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("Location: news.php");
      

      }
 
      ?>
      
     
    </div>
  </div>
</body>



</html>