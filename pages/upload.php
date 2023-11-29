<?php
include('../scripts/auth/session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>FAQ</title>
    <link rel="stylesheet" href="../res/style.css">
    <link rel="stylesheet" href="../res/bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="../res/pictures/vector-hotel-icon-symbol-sign.jpg">


</head>

<body>

    <?php
    include('../scripts/nav/menue.php');
    ?>
    <div class="box1">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>

    <?php
    $target_dir = "../res/pictures/gallery/";
    if (isset($_POST["submit"])) {
        $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    }
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
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
    }

    ?>

</body>