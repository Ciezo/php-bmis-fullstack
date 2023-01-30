<!-- 
    Filename: home_resident.php
    Description: The home page of a Resident user upon sucessfully logging in. 
                It is where News or Announcements will be displayed 
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
        <title>View News and Announcements</title>
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
                <a class="active" href="">News and Announcements</a>
                <a href="complaints_page.php">Complaints/Reports</a>
                <a href="barangay_details.php">Barangay Details</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>
        
        <!-- Retrieve all news content from the database -->
        <?php
            // Create a query to fetch all news contents
            $query = "SELECT * FROM NEWS"; 
            $results = mysqli_query($conn, $query); 

            // Begin fetching results as rows
            while ($row = mysqli_fetch_array($results)) {
                echo '<center>';
                    echo '<div class="news-section-repeating">';
                        echo "<h2>" . $row['title'] . "</h2>";
                        echo "<h4>News Category: " . $row['category_name'] . "</h4>";
                        echo "<p>" . $row['date_posted'] . "</p>";
                        echo '<p class="news-body-repeating">'. $row['description'] . '</p>' ;
                    echo '</div>';
                echo '</center>';
            }
            ?>



        <center>
        <div class="news-body-section-repeating">
            <h1>news header</h1>
            <h3>category</h3>
            <div class="news-body">
                <p>Message body</p>
            </div>
        </div>
        </center>
        

    </body>
</html>