<?php
    $cookie_resident_username = $_SESSION["resident-username"]; 
    $cookie_resident_pw = $_SESSION["resident-password"]; 

    // Set resident username cookies
    setcookie($cookie_resident_username, $cookie_admin_username, time() + (86400 * 30));
    setcookie($cookie_resident_pw, $cookie_admin_pw, time() + (86400 * 30));
?>