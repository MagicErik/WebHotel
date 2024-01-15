<?php
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
        
      }
    if (is_null($_SESSION["loggedIn"])) {
      $_SESSION["loggedIn"] = false;
      $_SESSION['name'] = "Billton";
      $_SESSION['role'] = "unregisterd";
    }
    
    
?>