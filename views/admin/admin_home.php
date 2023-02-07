<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
session_start();
require("../../database_instance.php");
// Check if admin is logged in.
if (!isset($_SESSION["admin-username"])) {
    // If not logged in, then redirect to log-in page.
    header("location: admin_login_page.php");
}
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
        <style>
            .wrapper {
                width: 750px;
            margin: 0 auto;
            padding-top: 100px;
            }
        </style>
    </head>
    <body>
        <!-- Top navbar at admin navbar ONLY -->
        <div class="admin_navbar">
            <center>
                <a class="active" href="">Create News</a>
                <a href="view_newsFeed.php">News Feed</a>
                <a href="reviewReports.php">Review Reports</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>

            <div class="wrapper">
                <h2>Post News or Announcements</h2>
                <h5><i>Fill up the following form to post news or announcements to resident</i></h5>
                <form action="../../api/news/create.php" method="POST">
                    <label>News Header or Subject</label> <br>
                    <input type="text" class="form-control" name="news-header" placeholder="Write a short news subject to give context" required=""> <br><br>
                    <label>Category</label> <br>
                    <select class="form-control" name="news-category" id="" required="">
                        <option value="Jobs">Jobs</option>
                        <option value="Road Blockage">Road Blockage</option>
                        <option value="Flood Updates">Flood Updates</option>
                        <option value="Crime">Crime</option>
                        <option value="Recreation">Recreation</option>
                        <option value="Sports Event">Sports Event</option>
                    </select>
                    <br><br>
                    <label>News Body</label><br><br>
                    <textarea class="form-control" name="news-body" id="" rows=10 placeholder="Discuss the news or announcement contents here" required=""></textarea>
                    <br><br>
                    <input type="submit" class="btn btn-outline-success" value="Create and post news">
                </form>
            </div>
    </body>
</html>