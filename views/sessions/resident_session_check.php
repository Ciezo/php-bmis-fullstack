<?php
session_start();
    // Verify if resident is logged in
    if (isset($_SESSION["resident-username"])) {
        if (isset($_SESSION["resident-password"])) {
            // Set cookies for admin
            setcookie("resident_cookie_username", $_SESSION["resident-username"], time() + (86400 * 30));
            setcookie("resident_cookie_password", $_SESSION["resident-password"], time() + (86400 * 30));
            header("location: ../resident/home_resident.php");
            exit();
        }
    }

    else {
        header("location: ../error/error.php");
        exit();
    }
?>