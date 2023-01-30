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
        <title>Create and Post News Contents</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to resident navbar only -->
        <link href="../../css/admin_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!-- Top navbar at admin navbar ONLY -->
        <div class="admin_navbar">
            <center>
                <a class="active" href="">Create News</a>
                <a href="view_newsFeed.php">News Feed</a>
                <a href="reviewReports.php">Review Reports</a>
                <a href="barangayDetails.php">Barangay</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>

        <center>
            <h2>Post News or Announcements</h2>
            <h5><i>Fill up the following form to post news or announcements to resident</i></h5>
            <form action="../../api/news/create.php" method="POST">
                <label>News Header or Subject</label> <br>
                <input type="text" name="news-header" placeholder="" required=""> <br><br>
                <label>Category</label> <br>
                <select name="news-category" id="" required="">
                    <option value="Jobs">Jobs</option>
                    <option value="Road Blockage">Road Blockage</option>
                    <option value="Flood Updates">Flood Updates</option>
                    <option value="Crime">Crime</option>
                    <option value="Recreation">Recreation</option>
                    <option value="Sports Event">Sports Event</option>
                </select>
                <br><br>
                <label>News Body</label><br><br>
                <textarea name="news-body" id="" cols="30" rows="10" required=""></textarea>
                <br><br>
                <input type="submit" class="submit-news-btn" value="Create and post news">
            </form>

        </center>

    </body>
</html>