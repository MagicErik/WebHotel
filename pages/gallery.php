<!DOCTYPE html>
<?php 
    include('../scripts/auth/session.php');
    ?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gallery</title>
    <link rel="stylesheet" href="../res/bootstrap-5.3.2-dist/css/bootstrap.css">
  <link rel="icon" type="image/jpg" href="../res/pictures/vector-hotel-icon-symbol-sign.jpg">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../res/style.css">

</head>
<body>
    <?php
    include('../scripts/nav/menue.php');
    include('../scripts/load/loadPictures.php');
    ?>
      
        <?php
        echo'<div class="box1">'.
            beliefmedia_grid_gallery().'</div>';
        ?>

    
</body>
</html>