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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Barangay Details</title>
    <!-- Global styling and theming -->
    <link href="../../css/globals.css" rel="stylesheet">
    <!-- Styling to resident navbar only -->
    <link href="../../css/admin_navbar.css" rel="stylesheet">
    <!-- Bootstrap from https://getbootstrap.com/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .wrapper {
            margin: 0 auto;
            width: 750px;
            padding-top: 100px;
        }
    </style>
</head>
<body>
    <!-- Top navbar at admin navbar ONLY -->
    <div class="admin_navbar">
        <center>
            <a href="../../views/admin/admin_home.php">Create News</a>
            <a href="../../views/admin/view_newsFeed.php">News Feed</a>
            <a href="">Review Reports</a>
            <a class="active" href="../../views/admin/barangayDetails.php">Barangay</a>
            <a href="../../components/custom/logout.php">Logout</a>
        </center>
    </div>    

    <div class="wrapper">
        <div class="container">
            f
        </div>
    </div>

</body>
</html>