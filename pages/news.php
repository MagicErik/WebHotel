<!DOCTYPE html>
<?php
include('../scripts/auth/session.php');
?>
<html>

<head>
  <?php include_once('../scripts/load/loadCss.php');
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
        <form action="news.php" method="post" enctype="multipart/form-data">
        <div class="news-container">
        <div class="news-post">
            <div class="post-title"><input type="text" name="post-titel" placeholder="Titel"></input></div>
            <div class="post-date"><input type="date" name="post-date" placeholder="Datum"></div>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            
            <div class="post-text">
                <p><input name="post-text" type="text" placeholder="content"></p>
            </div>
            <button type="submit" href="news.php" name="saveNews">Save</button>
        </div>
    </div></form>'
        ;
      }
      if ($_SESSION['role'] == 'admin') {
        echo " <form action='' method='post'>
          <div class='row'>
            <div class='col text-center'>
              <button type='submit' name='btnNewNews'>New NewsPost</button>
            </div>
          </div>
        </form></br>";
      }
      echo loadNews();

      $target_dir = "../res/pictures/news/";

      if (isset($_POST['saveNews'])) {
        include('../scripts/data/db_connection.php');
        $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $date = $_POST['post-date'];
        $image = basename($_FILES['fileToUpload']["name"]);
        $titel = $_POST['post-titel'];
        $content = $_POST['post-text'];

        if (isset($_POST["saveNews"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if ($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
              if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
                } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
                }
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
          
      }


        $sql = "INSERT INTO `news`(`datum`,`image`, `titel`, `content`) VALUES ('$date','$image','$titel','$content')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        imagedestroy($sourceImage);

        header("Location: news.php");


      }

      ?>


    </div>
  </div>
</body>



</html>