<!-- 
    Filename: barangay_details.php
    Description: This is where the barangay details page are displayed.
 -->


<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
require("../../database_instance.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Barangay Department, Details, and Contacts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to resident navbar only -->
        <link href="../../css/resident_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!-- Top navbar at resident navbar ONLY -->
        <div class="resident_navbar">
            <center>
                <a href="home_resident.php">News and Announcements</a>
                <a href="complaints_page.php">Complaints/Reports</a>
                <a class="active" href="">Barangay Details</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>
    </body>
</html>