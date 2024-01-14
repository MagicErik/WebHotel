<!DOCTYPE html>
<?php 
    include('../scripts/auth/session.php');
    ?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gallery</title>
    <?php include_once ('../scripts/load/loadCss.php');
    ?>

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