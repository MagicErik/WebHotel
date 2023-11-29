
<?php

    $link = mysql_connect('localhost', 'mysql_user', 'mysql_password');
    if (!$link) {
        die('Verbindung schlug fehl: ' . mysql_error());
    }
    echo 'Erfolgreich verbunden';
    mysql_close($link);
    
?>