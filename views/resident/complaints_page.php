<!-- 
    Filename: complaints_page.php
    Description: Where a Resident User submits their complaints or issuing reports
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
        <title>Submit and file a report or issue</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to resident navbar only -->
        <link href="../../css/resident_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
            .wrapper{
                width: 1000px;
                margin: 0 auto;
                padding-top: 100px;
            }
        </style>
    </head>
    <body>
        <!-- Top navbar at resident navbar ONLY -->
        <div class="resident_navbar">
            <center>
                <a href="home_resident.php">News and Announcements</a>
                <a class="active" href="complaints_page.php">Complaints/Reports</a>
                <a href="barangay_details.php">Barangay Details</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>

        <div class="wrapper">

        </div>

        <div class="report-submission-group">
            <h1>Post your issues and reports to barangay</h1>
        </div>

        <div class="review-report-submissions-group">
            <h1>My Reports</h1>
        </div>


    </body>
</html>